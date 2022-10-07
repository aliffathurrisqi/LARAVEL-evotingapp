<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Candidate;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $jmlCandidate = 3;
        $jmlSuara = 27;

        User::create([
            'username' => "admin",
            'name' => "Aliffathur Risqi Hidayat",
            'password' => Hash::make("31032000Alif"),
            'isAdmin' => true
            ]);

        Candidate::factory($jmlCandidate)->create();

        User::factory($jmlSuara)->create();
        // Vote::factory(20)->create();

        for($i = 2; $i<= $jmlSuara+1 ; $i++){
            Vote::create([
                'candidate_id' => mt_rand(1, $jmlCandidate ),
                'user_id' => $i
            ]);
        }

    }
}
