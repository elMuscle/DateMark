<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Event;
use App\Models\Tpoll;
use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Tpoll::factory(3)
            ->has(Event::factory()->count(5)->hasAttached(
                        Member::factory()->count(6),
                        new Sequence(
                            ['verfuegbarkeit' => 0 ],
                            ['verfuegbarkeit' => 1 ],
                            ['verfuegbarkeit' => 2 ],
                            ['verfuegbarkeit' => 3 ]
                        )
            ))
            ->create();
    }
}
