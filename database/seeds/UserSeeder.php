<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::where('email','priya@gmail.com')->get()->first();
        if(!$user){
        	User::create([
        		'name'=>'Priya',
        		'email'=>'priya@gmail.com',
        		'password'=>Hash::make('abcd1234'),
        		'role'=>'admin'
        	]);
        }else{
        	$user->update(['role'=>'admin']);
        }

        User::create([
        		'name'=>'Anshul',
        		'email'=>'anshul@gmail.com',
        		'password'=>Hash::make('abcd1234'),
        		'role'=>'author'
        	]);

        User::create([
        		'name'=>'Devansh',
        		'email'=>'devansh@gmail.com',
        		'password'=>Hash::make('abcd1234'),
        		'role'=>'author'
        	]);

        User::create([
        		'name'=>'Krisha',
        		'email'=>'krisha@gmail.com',
        		'password'=>Hash::make('abcd1234'),
        		'role'=>'author'
        	]);

        User::create([
        		'name'=>'Neha',
        		'email'=>'neha@gmail.com',
        		'password'=>Hash::make('abcd1234'),
        		'role'=>'author'
        	]);
    }
}
