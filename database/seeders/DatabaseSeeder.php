<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
	protected static ?string $password;
    public function run(): void
    {
		$this->call([
			CustomerSeeder::class,
		]);
    }
}
