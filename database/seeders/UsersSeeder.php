<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'utente';
        $user->email = 'utente@gmail.com';
        $user->password = Hash::make('12341234');
        $user->api_token = 'r0DoxUsH6KkThRxyPs3GmskW8hhfdm5hLHpEWuXzAin18qayTlKIuQrdZSuy54dND1I0nX2cRBdaUum6DT2w4sUG';
        $user->save();
    }
}
