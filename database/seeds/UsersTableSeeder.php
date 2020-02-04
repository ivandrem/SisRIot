<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
        	[
        		'dni' => 'AR',
	            'name' => 'Administrador',
	            'email' => 'admin@domain.com',
	            'password' => Hash::make('A1d2m3i4n5'),
	            'visible' => false
	        ],
	    	[
	    		'dni' => 'DR',
	    		'name' => 'Developer',
	            'email' => 'dev@domain.com',
	            'password' => Hash::make('D-1e_2v.3'),
	            'visible' => false
    		],
    		[
	    		'dni' => 'TR',
	    		'name' => 'Tester',
	            'email' => 'tester@domain.com',
	            'password' => Hash::make('T1e2s3t4e5r6'),
	            'visible' => true
    		]
    	]);
    }
}