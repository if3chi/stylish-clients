<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::firstOrCreate( 
            [
                'firstname' => 'Ama' , 
                'lastname' => 'Favor', 
                'clientImage' => 'client.jpg', 
                'phone' => '0209372019',
                'email' => 'amafavor@email.com', 
                'dob' => '2001-08-09', 
                'address' => '35 Akaa rd, Jah-love - santamaria, Accra, Ghana.',
                'type' => 'New',
         ]
        );
        Client::firstOrCreate( 
            [
                'firstname' => 'Lovelyn' , 
                'lastname' => 'Favor', 
                'clientImage' => 'client2.jpg', 
                'phone' => '0209372019',
                'email' => 'lovelynfavor@email.com', 
                'dob' => '1998-01-09', 
                'address' => '350 Akaa rd, Accra, Ghana.',
                'type' => 'Dada',
         ]
        );
    }
}
