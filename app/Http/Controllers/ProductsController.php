<?php
namespace App\Http\Controllers;
use  App\Product;
use  App\Category;
use  App\MoreImages;
use  App\SizeColors;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
  public function getDetails(Request $req){
    $product = Product::where('id',$req->id)->first();

    $more_images = MoreImages::where('product_id',$req->id)->get();
    $size_colors = SizeColors::where('product_id',$req->id)->get();

    $sizes = array();
    $colors = array();

    // organize the array by cusip
    foreach($size_colors as $attr){
      if(!in_array($attr->size, $sizes)){
        $sizes[] = $attr->size;
      }

      if(!in_array($attr->color, $colors)){
        $colors[] = $attr->color;
      }
    }
    return view('product.details_product',compact('product', 'more_images', 'size_colors', 'sizes', 'colors'));
  }

  public function getListAllProducts(){
    $products = Product::all();
    $categories = Category::all();
    return view('product.list_products',compact('products','categories'));
  }

  public function search(Request $request)
  {
    $keyword = $request->keyword;

    $product = Product::where('name', 'like', '%$keyword%')
                      ->take(30);

    return view('product.list_products', ['product' => $searched_product, 'keyword' => $keyword]);
  }
}
?>
