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
        Schema::create('menus', function (Blueprint $table) {
            $table->id('id_menu');
            $table->string('icone', 128);
            $table->string('chave', 128);
            $table->string('valor', 128);
            $table->tinyInteger('numero_ordenacao');
            $table->tinyInteger('submenu');
            $table->tinyInteger('submenugroup');
            $table->tinyInteger('issubmenu');
            $table->tinyInteger('global');
            $table->tinyInteger('visible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
};
