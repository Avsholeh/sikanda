<?php

namespace Database\Seeders;

use App\Models\Dinas;
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
                'file' => base64_encode(file_get_contents(storage_path('\app\sample-spp.pdf')))
            ])
            ->hasSpm(1, [
                'file' => base64_encode(file_get_contents(storage_path('\app\sample-spm.pdf')))
            ])
            ->hasSp2d(1, [
                'file' => base64_encode(file_get_contents(storage_path('\app\sample-sp2d.pdf')))
            ])
            ->hasPendukung(2, [
                'file' => base64_encode(file_get_contents(storage_path('\app\sample-pendukung.pdf')))
            ])
            ->create([
                'status' => 'S',
                'tahun' => 2021
            ]);

        Dokumen::factory(20)
            ->hasSpp(1, [
                'file' => base64_encode(file_get_contents(storage_path('\app\sample-spp.pdf')))
            ])
            ->hasSpm(1, [
                'file' => base64_encode(file_get_contents(storage_path('\app\sample-spm.pdf')))
            ])
            ->create([
                'status' => 'B',
                'tahun' => 2021
            ]);

    }
}
