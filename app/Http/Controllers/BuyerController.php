<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\RateChart;

class BuyerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:2');
    }

    public function index()
    {
        $sellers = DB::table('users')->where('roll_id', '1')->get();

        return view('buyer.home')->with('sellers', $sellers);
    }

    public function viewProfile($id)
    {
        // dd($id);
        $sellerProfile = DB::table('users')->where('id', $id)->first();

        $ratecharts = RateChart::where('user_id', $sellerProfile->id)->get();

        return view('buyer.viewProfile', compact('sellerProfile', 'ratecharts'));
    }
}
