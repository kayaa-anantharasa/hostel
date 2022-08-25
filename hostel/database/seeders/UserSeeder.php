<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
  public function run()
    {
        User::create([
            'name' => 'warden',
            'email' => 'warden@gmail.com',
            'gender' => 'm',
            'address' => 'jaffna',
            'mobilenumber' => 0773456567,
            'role' => 'warden',
            'password' => Hash::make('password')
             
        ]);
    }
}
