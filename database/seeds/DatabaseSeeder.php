<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    }
}
class UserTableSeeder extends Seeder 
{
    public function run()
    {
        DB::table('users')->delete();
    }    
}
class KaryaTableSeeder extends Seeder 
{
    public function run()
    {
        DB::table('karya')->delete();
    }    
}