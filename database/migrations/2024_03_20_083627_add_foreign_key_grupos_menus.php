<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grupos_menus', function (Blueprint $table) {
                $table->foreign('id_menu')->constrained()->references('id_menu')->on('menus')->restrictOnDelete()->restrictOnUpdate();
                $table->foreign('id_grupo')->constrained()->references('id_grupo')->on('grupos')->restrictOnDelete()->restrictOnUpdate();
        });
    }

    public function down()
    {
        Schema::table('grupos_menus', function (Blueprint $table) {
            
        });
    }
};
// composer require doctrine/dbal

