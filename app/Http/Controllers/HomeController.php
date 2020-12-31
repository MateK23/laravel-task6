<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['product' => Product::get()]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        Product::create([
            'title' => $request->input('title'),
            'user_id' => Auth::user()->id,
            'description' => $request->input('description')
        ]);
        return redirect()->route('home');
    }

    public function delete(Request $request)
    {
        Product::where("id", $request->input("id"))->delete();
        return redirect()->back();
    }
}
