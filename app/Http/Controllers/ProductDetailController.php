<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductDetailController extends Controller
{
	protected $product;
	protected $category;
	protected $subcategory;
	
	/**
	 * [__construct description]
	 * @param Product $product [description]
	 */
    public function __construct(Product $product)
	{
		$this->product = $product;
	}

	/**
	 * [show description]
	 * @param  [type] $pid [description]
	 * @return [type]      [description]
	 */
    public function show($prodname, $pid)
    {
    	$product = $this->product->getProductDetail($pid);
    	return view('frontend.pages.product-detail', compact('product'));
    }
}
