<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:1');
    }

    public function index()
    {
        return view('seller.home');
    }

    public function getProfile()
    {
        // $seller = User::where('roll_id', Auth::id())->get();

        return view('seller.profile');
    }

    public function update(Request $request , $id)
    { 
        // dd($request->all());

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();  
       
        $request->image->move(public_path('images'), $imageName);

        $user = User::where('id', $id)->first();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
            'image' => $imageName,
            'updated_at' => now()
        ]);

        return redirect()->route('seller')
                        ->with('success','Profile updated successfully');
    }
}
