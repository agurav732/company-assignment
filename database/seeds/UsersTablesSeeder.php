<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\User;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'    => 'test',
            'email'    => 'admin@admin.com',
            'password'   =>  Hash::make('password'),
            'remember_token' =>  Str::random(10),
        ]);
    }
}
