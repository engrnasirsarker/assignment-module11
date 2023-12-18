<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class MainController extends Controller
{
    function dashboard(){
                            
        $todaySale = DB::table('transactions')
                        ->whereDate('date', '=',  Carbon::today())
                        ->sum('total');

        $yesterdaySale = DB::table('transactions')
                            ->whereDate('date', Carbon::yesterday())
                            ->sum('total');

        $thisMonthSale = DB::table('transactions')
                            ->whereMonth('date', date('m'))
                            ->sum('total');

        $lastMonthSale = DB::table('transactions')
                            ->whereMonth('date', Carbon::now()
                            ->subMonth()->month)
                            ->sum('total');


        // $todaySale = DB::table('transactions')
        //             ->where('date', '=', date('Y-m-d'))
        //             ->sum('total');

        // $yesterdaySale = DB::table('transactions')
        //                 ->where('date', '=', date('Y-m-d', strtotime('-1 day')))
        //                 ->sum('total');

        // $thisMonthSale = DB::table('transactions')
        //                 ->where('date', '>=', date('Y-m-01'))
        //                 ->sum('total');

        // $lastMonthSale = DB::table('transactions')
        //                 ->where('date', '>=', date('Y-m-01', strtotime('-1 month')))
        //                 ->where('date', '<', date('Y-m-01'))
        //                 ->sum('total');

        return view('dashboard',compact(
            'todaySale','yesterdaySale','thisMonthSale','lastMonthSale'
        ));
    }
}
