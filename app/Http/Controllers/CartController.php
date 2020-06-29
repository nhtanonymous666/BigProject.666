<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Cart;
use App\CartProduct;
use App\Product;

class CartController extends Controller
{
	protected $cart;
	protected $cartproduct;
	protected $product;
	/**
	 * [__construct description]
	 */
	public function __construct(Cart $cart, CartProduct $cartproduct, Product $product)
    {
        $this->cart = $cart;
        $this->cartproduct = $cartproduct;
        $this->product = $product;
    }

    public function listCartHeader(Request $request)
    {
    	if ($request->ajax())
		{
            if (Auth::check()) {
            	$user_id = Auth::user()->user_id;
                $numListCartHeader = $this->cart->numListCart($user_id);
                $ListCartHeader = $this->cart->listCart($user_id)->take(6)->get();
            } else {
                $numListCartHeader = '0';
                $ListCartHeader = 'Vui lòng đăng nhập';
            }
			return Response::json(['data' => view('frontend.partials.list-cart-header', compact('ListCartHeader', 'numListCartHeader'))->render()], 200);
		}
		return response()->json('error', 500);
    }

    public function show()
    {
    	if (Auth::check()) {
    		$user_id = Auth::user()->user_id;
    		$listCart = $this->cart->listCart($user_id)->get();
    		$numListCart = $this->cart->numListCart($user_id);
    		$totalPrice = $this->cart->totalPrice($user_id);
    		$subTotalPrice = $this->cart->subTotalPrice($user_id);
    		$discountPrice = $this->cart->discountPrice($user_id);
    		return view('frontend.pages.cart', compact('listCart', 'numListCart', 'totalPrice', 'subTotalPrice', 'discountPrice'));
    	} else {
    		return redirect()->back();
    	}
    }

    public function addcart($prodid)
    {
    	if (Auth::check()) {
    		$user_id = Auth::user()->user_id;
	    	$cart_id = $this->cart->where('user_id', $user_id);
	    	if (count($cart_id->get()) < 1) {
	    		$this->cart->user_id = $user_id;
				$this->cart->save();
	    	}
	    	$price = $this->product->where('prod_id', $prodid)->firstOrFail();
	    	if ($price->prod_sale_price > 0) {
	    		$price = $price->prod_sale_price;
	    	} else {
	    		$price = $price->prod_price;
	    	}
	    	$check_prod = $this->cartproduct->where('cart_id', $cart_id->firstOrFail()->cart_id)->where('prod_id', $prodid);
	    	if (count($check_prod->get()) > 0) {
	    		$this->cartproduct->where('prod_id', $prodid)
	    						  ->where('cart_id', $cart_id->firstOrFail()->cart_id)
	    						  ->update(['cp_quantity' => $check_prod->firstOrFail()->cp_quantity + 1, 'cp_price' => $check_prod->firstOrFail()->cp_price + $price]);
		    	return response()->json('success');
	    	} else {
	    		$this->cartproduct->prod_id = $prodid;
		    	$this->cartproduct->cart_id = $cart_id->firstOrFail()->cart_id;
		    	$this->cartproduct->cp_quantity = 1;
		    	$this->cartproduct->cp_price = $price;
			    $this->cartproduct->save();
		    	return  response()->json('success');
	    	}
		} else {
			return response()->json('redirect-login');
		}
    }

}
