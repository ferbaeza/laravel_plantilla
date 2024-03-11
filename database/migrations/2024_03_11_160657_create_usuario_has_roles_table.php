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
        Schema::create('usuario_has_roles', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('fk_usuario_id');
            $table->uuid('fk_role_id');
            $table->string('usuario')->nullable();
            $table->string('role')->nullable();

            $table->foreign('fk_usuario_id')
            ->references('id')
                ->on('usuarios')
                ->onDelete('restrict');


            $table->foreign('fk_role_id')
            ->references('id')
                ->on('roles')
                ->onDelete('restrict');




            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_has_roles');
    }
};
