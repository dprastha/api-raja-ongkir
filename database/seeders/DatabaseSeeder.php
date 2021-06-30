<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::withHeaders([
            'key' => 'aa8e37a4d877ecdf7af0807dafde9670'
        ])->get('https://api.rajaongkir.com/starter/city');
        return $response->body();
    }
}
