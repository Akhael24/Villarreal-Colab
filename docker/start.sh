#!/bin/bash

# Esperar a que la base de datos esté disponible (si es necesario)
echo "Iniciando aplicación Laravel..."

# Generar APP_KEY si no existe
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "base64:" ]; then
    echo "Generando APP_KEY..."
    php artisan key:generate --force
fi

# Limpiar cachés
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Crear cachés optimizados para producción
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Ejecutar migraciones (solo en producción)
if [ "$APP_ENV" = "production" ]; then
    echo "Ejecutando migraciones..."
    php artisan migrate --force
fi

# Optimizar aplicación
php artisan optimize

echo "Aplicación Laravel iniciada correctamente"

# Iniciar Apache
apache2-foreground
