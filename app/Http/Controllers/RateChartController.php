<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RateChart;
use Illuminate\Support\Facades\Auth;

class RateChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratecharts = RateChart::where('user_id', Auth::id())->get();

        return view('ratechart.index')->with('ratecharts', $ratecharts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ratechart.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'rate' => 'required',
        ]);

        // $user_id = Auth::id();

        // $request->user_id = $user_id;
      
        RateChart::create($request->all());
       
        return redirect()->route('ratecharts')
                        ->with('success','Ratechart added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ratechart = RateChart::where('id', $id)->first();

        return view('ratechart.edit',compact('ratechart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'item_name' => 'required',
            'rate' => 'required',
        ]);

        $ratechart = RateChart::where('id', $id)->first();
      
        $ratechart->update($request->all());
      
        return redirect()->route('ratecharts')
                        ->with('success','Ratechart updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ratechart = RateChart::where('id', $id)->first();

        $ratechart->delete();

        return redirect()->route('ratecharts')
                        ->with('success','Item deleted successfully');
    }
}
