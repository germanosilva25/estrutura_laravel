<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert([
            'name' => 'Germano Silva',
            'documento' => '08761377708',
            'celular' => '21984523461',
            'email' => 'germanosilva@yahoo.com.br',
            'password' => Hash::make('1!Qazxcvbn'), // Assuming you're using bcrypt for password hashing
            'id_grupo' => 1,
            'matricula' => 3825,
            'cargo' => 'Desenvolvedor',
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