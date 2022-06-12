<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('https://api.covid19api.com/countries');

        $responsedata = $response->json();

        foreach ($responsedata as $data) {
            $country = new Country();
            $country->country = $data['Country'];
            $country->slug = $data['Slug'];
            $country->ISO2 = $data['ISO2'];
            $country->save();
        }
    }
}
