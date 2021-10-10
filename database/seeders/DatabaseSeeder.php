<?php

namespace Database\Seeders;

use App\Models\Dokumen;
use App\Models\Spp;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Dokumen::factory(20)
            ->hasSpp(1, [
                'file' => base64_encode(file_get_contents(__DIR__ . 'docs/sample-spp.pdf'))
            ])
            ->create();

    }
}
