<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use App\Product;

class HomeController extends Controller
{
    protected $product;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        //$this->middleware('auth');
        $this->product = $product;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Index(Request $request)
    {
        $product = $this->product->getListProductHome();
        if($request->ajax())
        {
            return Response::json(['data' => view('frontend.partials.index-pagination', compact('product'))->render()], 200);
        }
        return view('frontend.pages.index', compact('product'));
    }
}
