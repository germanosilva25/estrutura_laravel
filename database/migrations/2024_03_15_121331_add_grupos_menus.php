
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
        Schema::create('grupos_menus', function (Blueprint $table) {
            $table->id('id_grupos_menus');
            $table->unsignedBigInteger('id_grupo');
            $table->unsignedBigInteger('id_menu');
            $table->timestamps();

            // $table->foreign('id_menu')->references('id_menu')->on('menus')->onDelete('restrict');
            // $table->foreign('id_grupo')->references('id_menu')->on('id_grupo')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos_menus');
    }
};


