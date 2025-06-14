<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('facultad')->after('email');
            $table->string('escuela')->after('facultad');
            $table->string('ciclo')->after('escuela');
            $table->enum('rol', ['estudiante', 'tutor'])->default('estudiante')->after('ciclo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['facultad', 'escuela', 'ciclo', 'rol']);
        });
    }
};
