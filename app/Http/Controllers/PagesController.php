<?php
namespace App\Http\Controllers;

use  App\Product;
use  App\ProductType;
use  App\more_images;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function getDetails(Request $req){
		$product = Product::where('id',$req->id)->first();
		$more_images = more_images::where('product_id',$req->id)->get();
		return view('page.details_product',compact('product','more_images'));
	}

	
	public function getListAllProducts(){
		$products = Product::all();
		$categories = ProductType::all();
		return view('page.list_products',compact('products','categories'));
	}
}
?>