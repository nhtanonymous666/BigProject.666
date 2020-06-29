<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Category;
use App\Product;

class CategoryController extends Controller
{
	protected $product;
	protected $category;
	/**
	 * [__construct description]
	 * @param Product  $product  [description]
	 * @param Category $category [description]
	 */
	public function __construct(Product $product, Category $category)
	{
		$this->product = $product;
		$this->category = $category;
	}

	/**
	 * [Category description]
	 * @param Request $request [description]
	 * @param [type]  $cateurl [description]
	 * @param [type]  $cateid  [description]
	 */
	public function show(Request $request, $cateurl, $cid)
    {
    	$barCategory = $this->category->getLeftBarCategory();
    	$category = $this->category->getCategory($cid);
    	$categoryAll = $this->product->getListProductCategory($cid);
		if($request->ajax())
		{
			return Response::json(['data' => view('frontend.partials.category-pagination', compact('categoryAll'))->render()], 200);
		}
		return view('frontend.pages.category', compact('categoryAll', 'category', 'barCategory'));
    }
}
