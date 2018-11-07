<?php
namespace App\Http\Controllers;

use  App\Product;

use Illuminate\Http\Request;

class PageController extends Controller
{
	public function getDetails(Request $req){
		$product = Product::where('id',$req->id)->first();
		//return view('page.details_product',compact('product'));
		return view('page.details_product',compact('product'));
	}

	public function getListProductsByType($type){
		$list_products_by_type = Product::where('id_type',$type)->get();
		//return view('page.details_product',compact('product'));
		return view('page.list_products_by_type',compact('products'));
	}
}
?>