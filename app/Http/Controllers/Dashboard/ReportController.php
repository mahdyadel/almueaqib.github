<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Report;


class ReportController extends Controller
{
    public function index(Request $request){
        $orders = Order::where(function($q) use($request){
            if($request->input('search')){
                $q->where('status' , $request->search);
            }

            if($request->input('start')){
                $q->where('created_at','>=',$request->start);
            }

            if($request->input('end')){
                $q->where('created_at' , '=<'  ,$request->end);
            }
        })->latest()->paginate(5);
        //return auth()->user()->roles()->first()->permissions;

        $reports = Report::all();
        //$orders = Order::all();


    return view('dashboard.reports.index' , compact('orders','reports'));
    }

}
