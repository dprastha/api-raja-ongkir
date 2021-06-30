<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::withHeaders([
            'key' => 'aa8e37a4d877ecdf7af0807dafde9670'
        ])->get('https://api.rajaongkir.com/starter/province');

        $provinces = $response['rajaongkir']['results'];

        foreach ($provinces as $province) {
            $data_province[] = [
                'id' => $province['province_id'],
                'province' => $province['province']
            ];
        }

        Province::insert($data_province);
    }
}
