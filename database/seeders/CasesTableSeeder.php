<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Cases;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = Country::all();

        foreach ($countries as $country) {

            $responsedata = Http::get('https://api.covid19api.com/total/dayone/country/' . $country['slug']);

            $responsedata = json_decode($responsedata, true);

            foreach ($responsedata as $data) {

                $case = new Cases();
                $case->country_id = $country['id'];
                $case->active = $data['Active'];
                $case->confirmed = $data['Confirmed'];
                $case->deaths = $data['Deaths'];
                $case->recovered = $data['Recovered'];
                $case->date = Carbon::parse($data['Date']);
                $case->save();
            }
           
            
        }
    }
}
