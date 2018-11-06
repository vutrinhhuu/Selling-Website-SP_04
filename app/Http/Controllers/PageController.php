<?php
namespace App\Http\Controllers;

use  App\Product;

use Illuminate\Http\Request;

class PageController extends Controller
{
	public function getDetails(Request $req){
		$product = Product::where('id',$req->id)->first();

		return view('page.details_product',compact('product'));
	}
}
?>