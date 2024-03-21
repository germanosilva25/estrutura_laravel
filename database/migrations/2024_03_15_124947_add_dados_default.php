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
        DB::table('menus')->insert([
            'icone' => 'bi-person-lines-fill',
            'chave' => 'profile-edit',
            'valor' => 'Meu Perfil',
            'numero_ordenacao' => 1,
            'submenu' => 0,
            'submenugroup' => 0,
            'issubmenu' => 0,
            'global' => 0,
            'visible' => 1,
        ]);
        

        DB::table('grupos')->insert([
            'nome_grupo' => 'Admin',
        ]);

        DB::table('grupos_menus')->insert([
            'id_menu' => 1,
            'id_grupo' => 1,
        ]);

        // menu de configurações
        DB::table('menus')->insert([
            'icone' => 'bi-gear-wide-connected',
            'chave' => 'configuracoes',
            'valor' => 'Configurações',
            'numero_ordenacao' => 99,
            'submenu' => 1,
            'submenugroup' => 0,
            'issubmenu' => 0,
            'global' => 0,
            'visible' => 1,
        ]);
        DB::table('grupos_menus')->insert([
            'id_menu' => 2,
            'id_grupo' => 1,
        ]);
        //submenus de configuração - menus
        DB::table('menus')->insert([
            'icone' => 'bi-calendar2-minus-fill',
            'chave' => 'menus',
            'valor' => 'Menus',
            'numero_ordenacao' => 1,
            'submenu' => 0,
            'submenugroup' => 2,
            'issubmenu' => 0,
            'global' => 0,
            'visible' => 1,
        ]);
        DB::table('grupos_menus')->insert([
            'id_menu' => 3,
            'id_grupo' => 1,
        ]);
        //submenus de configuração - grupos
        DB::table('menus')->insert([
            'icone' => 'bi-calendar2-minus-fill',
            'chave' => 'grupos',
            'valor' => 'Grupos',
            'numero_ordenacao' => 1,
            'submenu' => 0,
            'submenugroup' => 2,
            'issubmenu' => 0,
            'global' => 0,
            'visible' => 1,
        ]);
        DB::table('grupos_menus')->insert([
            'id_menu' => 4,
            'id_grupo' => 1,
        ]);
        //submenus de configuração - grupos menus
        DB::table('menus')->insert([
            'icone' => 'bi-collection-fill',
            'chave' => 'grupos-menus',
            'valor' => 'Grupos menus',
            'numero_ordenacao' => 1,
            'submenu' => 0,
            'submenugroup' => 2,
            'issubmenu' => 0,
            'global' => 0,
            'visible' => 1,
        ]);
        DB::table('grupos_menus')->insert([
            'id_menu' => 5,
            'id_grupo' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
