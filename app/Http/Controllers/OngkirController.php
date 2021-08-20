<?php

namespace App\Http\Controllers;

use App\Exceptions\ErrorCekOngkir;
use App\Http\Resources\CityResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\City;
use App\Models\Province;

class OngkirController extends Controller
{
    public function index(Request $request)
    {
        try {
            $origin = '';
            $destination = '';
            $weight = '';
            $courier = '';
            $results = [];

            if ($request->origin && $request->destination && $request->weight && $request->courier) {
                $origin = $request->origin;
                $destination = $request->destination;
                $weight = $request->weight;
                $courier = $request->courier;

                $params = [
                    'origin' => $origin,
                    'destination' => $destination,
                    'weight' => $weight,
                    'courier' => $courier,
                ];

                $response = Http::asForm()->withHeaders([
                    'key' => 'aa8e37a4d877ecdf7af0807dafde9670'
                ])->post('https://api.rajaongkir.com/starter/cost', $params);

                $results = $response['rajaongkir']['results'][0]['costs'];
            } else {
                // throw new ErrorCekOngkir('Data tidak tersedia' . $request);
            }
        } catch (\Exception $exception) {
            // dd($exception->getMessage());
            return view('404');
        }

        $provinces = Province::all();

        return view('index')->with([
            'provinces' => $provinces,
            'results' => $results
        ]);
    }

    public function ajax($id)
    {
        $cities = City::where('province_id', '=', $id)->pluck('city_name', 'id');

        return json_encode($cities);

        // return (new CityResource($cities));
    }
}
