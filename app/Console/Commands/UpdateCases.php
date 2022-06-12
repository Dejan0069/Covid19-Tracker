<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Cases;
use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;


class UpdateCases extends Command 
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cases:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates cases table in DB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $countries = Country::all();
        $caseS = Cases::all();

        foreach ($countries as $country) {

            if ($caseS) {

                $responsedata = Http::get('https://api.covid19api.com/total/dayone/country/' . $country['slug']);

                $responsedata = json_decode($responsedata, true);

                foreach ($responsedata as $data) {
                    if (is_array($data)) {

                        $case = Cases::firstOrNew(
                            ['country_id' => $country['id']],
                            [
                                'active' => $data['Active'],
                                'confirmed' => $data['Confirmed'],
                                'deaths' => $data['Deaths'],
                                'recovered' => $data['Recovered'],
                                'date' => Carbon::parse($data['Date']) 
                            ]);
                        // $case->save();
                        sleep(1);
                         set_time_limit(360);
                    }
                }
            }
        }
        $this->line('table updated');
    }
}


