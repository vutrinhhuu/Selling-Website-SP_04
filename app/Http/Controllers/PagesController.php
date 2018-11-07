<?php
namespace App\Http\Controllers;

use  App\Product;
use  App\ProductType;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function getDetails(Request $req){
		$product = Product::where('id',$req->id)->first();
		return view('page.details_product',compact('product'));
	}

	
	public function getListAllProducts(){
		$products = Product::all();
		$categories = ProductType::all();
		return view('page.list_products',compact('products','categories'));
	}
}
?>