<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Category;
use App\SubCategory;
use App\Product;

class SubCategoryController extends Controller
{
	protected $product;
	protected $category;
	protected $subcategory;
	/**
	 * [__construct description]
	 * @param Product  $product  [description]
	 * @param Category $category [description]
	 */
    public function __construct(Product $product, Category $category, SubCategory $subcategory)
	{
		$this->product = $product;
		$this->category = $category;
		$this->subcategory = $subcategory;
	}

	/**
	 * [SubCategory description]
	 * @param Request $request [description]
	 * @param [type]  $cateid  [description]
	 * @param [type]  $subid   [description]
	 */
	public function show(Request $request, $subcateurl, $cid, $sid)
    {
    	$barCategory = $this->category->getLeftBarCategory();
    	$subCategory =  $this->subcategory->getSubCategory($sid);
    	$subcategoryAll = $this->product->getListProductSubCategory($cid, $sid);
    	//$category = Category::find($cateid);
    	//$subCategory = $category->SubCategory()->find($subid);
    	//$subcategoryAll = $category->SubCategory()->find($subid)->Product()->paginate(9);
    	if($request->ajax())
		{
			return Response::json(['data' => view('frontend.partials.subcategory-pagination', compact('subcategoryAll'))->render()], 200);
		}
		return view('frontend.pages.subcategory', compact('subcategoryAll', 'subCategory', 'barCategory'));
    }
}
