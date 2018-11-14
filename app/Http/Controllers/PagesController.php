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
		$sizes_colors_quan = array();
		// organize the array by cusip
		foreach($size_colors as $attr){
        	if(!in_array($attr->size, $sizes)){
        		$sizes[]=$attr->size;
        		$sizes_colors_quan[$attr->size] = array(); 
        	}
    	}

    	foreach($size_colors as $attr){
        	if(array_key_exists($attr->size, $sizes_colors_quan)){
        		if (!in_array($attr->color, $sizes_colors_quan[$attr->size]) )
        			$sizes_colors_quan[$attr->size][$attr->color] = $attr->quantity; 
        	}
    	}
   

		return view('page.details_product',compact('product','more_images','size_colors','sizes','sizes_colors_quan'));

	}

	
	public function getListAllProducts(){
		$products = Product::all();
		$categories = ProductType::all();
		return view('page.list_products',compact('products','categories'));
	}
}
?>