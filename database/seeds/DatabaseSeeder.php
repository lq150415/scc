<?php

use sccventas\User;
use sccventas\Cliente;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('ClientesTableSeeder');
        $this->command->info('User table seeded!');

        Model::reguard();
    }
}

class UserTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'NOM_USU' => 'Luis Felipe',
            'APA_USU' => 'Quisbert',
            'AMA_USU' => 'Quispe',
            'NIC_USU' => '7074342',
            'NIV_USU' => '0',
            'password' =>bcrypt('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon:: now()
        ]);
        User::create([
            'NOM_USU' => 'Wilson',
            'APA_USU' => 'Yujra',
            'AMA_USU' => 'G',
            'NIC_USU' => '9959333',
            'NIV_USU' => '0',
            'password' =>bcrypt('abc123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon:: now()
        ]);
    }

}
class ClientesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->delete();

        Cliente::create([
            'NOM_CLI' => 'Erick',
            'APA_CLI' => 'Moscoso',
            'AMA_CLI' => 'Zamora',
            'TEL_CLI' => '76207622',
            'DIR_CLI' => 'LA PAZ',
            'EMA_CLI' => 'erick.moscoso.zamora@hotmail.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon:: now()
        ]);
        Cliente::create([
            'NOM_CLI' => 'Libreria',
            'APA_CLI' => 'Zamar',
            'AMA_CLI' => ' ',
            'TEL_CLI' => '2317178',
            'DIR_CLI' => 'LA PAZ',
            'EMA_CLI' => ' ',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon:: now()
        ]);
        Cliente::create([
            'NOM_CLI' => 'Flora',
            'APA_CLI' => 'Llimona',
            'AMA_CLI' => ' ',
            'TEL_CLI' => '2203760',
            'DIR_CLI' => 'LA PAZ',
            'EMA_CLI' => ' ',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon:: now()
        ]);
        Cliente::create([
            'NOM_CLI' => 'Marcelo',
            'APA_CLI' => 'Mamani',
            'AMA_CLI' => 'Diaz',
            'TEL_CLI' => '71933510',
            'DIR_CLI' => 'LA PAZ',
            'EMA_CLI' => 'marce.mamani365@gmail.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon:: now()
        ]);
    }

}
