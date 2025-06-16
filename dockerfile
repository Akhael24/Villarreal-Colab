FROM php:8.2-apache

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    libpq-dev \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensiones PHP necesarias para Laravel
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    pdo_pgsql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip

# Habilitar mod_rewrite para Apache
RUN a2enmod rewrite

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Configurar directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos de configuración primero
COPY composer.json composer.lock ./

# Instalar dependencias PHP (pre-copia)
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copiar el resto del código
COPY . .

# Diagnóstico: mostrar contenido de la carpeta auth
RUN echo "🔍 Listando archivos en views/auth:" && ls -l resources/views/auth || echo "❌ Carpeta no encontrada"

# Reinstalar dependencias
RUN composer install --no-dev --optimize-autoloader

# Limpiar cachés (Laravel)
RUN php artisan config:clear && php artisan view:clear

# Crear directorios necesarios y configurar permisos
RUN mkdir -p storage/logs storage/framework/cache storage/framework/sessions storage/framework/views \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Configurar Apache
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

# Exponer puerto 80
EXPOSE 80

# Script de inicio
COPY docker/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

CMD ["/usr/local/bin/start.sh"]
