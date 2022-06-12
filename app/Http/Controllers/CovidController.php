<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cases;
use App\Models\Country;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class CovidController extends Controller
{
  public function allcases()
  {

    $date = Cases::all('date')->last();
    $cases = Cases::all()->where('date', $date['date']);
    $active = Cases::all()->where('date', $date['date'])->sum('active');
    $deaths = Cases::all()->where('date', $date['date'])->sum('deaths');
    $recovered = Cases::all()->where('date', $date['date'])->sum('recovered');
    $confirmed = Cases::all()->where('date', $date['date'])->sum('confirmed');


  //  Daily
  $all = Cases::select(DB::raw("sum(active) as Activecases,sum(deaths) as Deathcases,sum(recovered) as Recoveredcases,sum(confirmed) as Confirmedcases"))
  ->where('date', $date['date'])->get();

  $daybefore = Cases::all('date')->whereNotIn('date', $date)->last();

  $daybeforeCases = Cases::select(DB::raw('SUM(deaths) as yesterdaydeaths,SUM(active) as yesterdayactive,SUM(recovered) as yesterdayrecovered, SUM(confirmed) as yesterdayconfirmed'))
  ->where('date', $daybefore['date'])->get();

  $allCases = $all[0];
  $Cases = $daybeforeCases[0];

    $dailyActive = $allCases['Activecases'] - $Cases['yesterdayactive'];
    $dailyDeaths = $allCases['Deathcases'] - $Cases['yesterdaydeaths'];
    $dailyRecovered = $allCases['Recoveredcases'] - $Cases['yesterdayrecovered'];
    $dailyConfirmed = $allCases['Confirmedcases'] - $Cases['yesterdayconfirmed'];


  // Мonthly
  $month = Carbon::now()->subMonth()->format('Y-m-d');
  $monthlyConfirmed = Cases::all()->where('date', $month)->sum('confirmed');
  $monthlyRecovered = Cases::all()->where('date', $month)->sum('recovered');
  $monthlyDeaths = Cases::all()->where('date', $month)->sum('deaths');

   $monthlyConfirmedCases = ($confirmed - $monthlyConfirmed);
   $monthlyRecoveredCases = ($recovered - $monthlyRecovered);
   $monthlyDeathsCases = ($deaths - $monthlyDeaths);

  //  Тhree Мonths

  $threeMonths = Carbon::now()->subMonth(3)->format('Y-m-d');
  $threeMonthsConfirmed = Cases::all()->where('date', $threeMonths)->sum('confirmed');
  $threeMonthsRecovered = Cases::all()->where('date', $threeMonths)->sum('recovered');
  $threeMonthsDeaths = Cases::all()->where('date', $threeMonths)->sum('deaths');

  $threeMonthsConfirmedCases = ($confirmed - $threeMonthsConfirmed);
   $threeMonthsRecoveredCases = ($recovered - $threeMonthsRecovered);
   $threeMonthsDeathsCases = ($deaths - $threeMonthsDeaths);

    return view('home', compact('active', 'deaths', 'recovered', 'confirmed',
     'dailyActive', 'dailyDeaths', 'dailyRecovered', 'dailyConfirmed',
     'monthlyConfirmedCases', 'monthlyRecoveredCases', 'monthlyDeathsCases',
      'threeMonthsConfirmedCases', 'threeMonthsRecoveredCases', 'threeMonthsDeathsCases'
    ));
  }

  public function update()
  {
    \Artisan::call('cases:update');
    
    return redirect('/');
  }
}


 // $result = [];
    // $count = 15;
    // while ($count > 1) {
    //   $first_date = date('Y-m-d', strtotime('-' . $count . ' days'));
    //   $second_date = date('Y-m-d', strtotime('-' . $count + 1 . ' days'));
    //   $first_sum = Cases::where('date', 'like', $first_date . '%')->sum('confirmed');
    //   $second_sum = Cases::where('date', 'like', $second_date . '%')->sum('confirmed');
    //   $result[$first_date] = $second_sum - $first_sum;
    //   $count--;
    // }