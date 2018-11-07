<?php
namespace App\Http\Controllers;

use  App\Product;
use  App\ProductType;
use  App\more_images;
use  App\size_colors;
use Illuminate\Http\Request;

class PagesController extends Controller
{

	public function getDetails(Request $req){
		$product = Product::where('id',$req->id)->first();
		
		$more_images = more_images::where('product_id',$req->id)->get();
		$size_colors = size_colors::where('product_id',$req->id)->get();
		
		$sizes=array();

		// organize the array by cusip
		foreach($size_colors as $attr){
        	if(!in_array($attr->size, $sizes)){
        		$sizes[]=$attr->size;
        	}
    	}

		return view('page.details_product',compact('product','more_images','size_colors','sizes'));
	}

	
	public function getListAllProducts(){
		$products = Product::all();
		$categories = ProductType::all();
		return view('page.list_products',compact('products','categories'));
	}
}
?>