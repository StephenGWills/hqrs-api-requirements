<?php
/**
 * Created by PhpStorm.
 * User: swills
 * Date: 9/21/22
 * Time: 3:40 PM
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductAPIController extends Controller
{

  /**
   * list a collection of products
   */
  public function index(Request $request) {


    $aProduct = [];
    $productList = Products::all();

    // (optional) Can be filtered by price as a query string parameter, this filter applies before discounts are applied.
    if($request->has('price')){
      $productList = $productList->where('price',$request->price);
    }

    //Can be filtered by category as a query string parameter
    if($request->has('category')  && $request->category === 'insurance'){
      $productList = $productList->where('category',$request->category);
    }

    foreach($productList as $aProduct)
    {
      $aProduct['price'] = $aProduct->applyDiscounts($aProduct);
      echo json_encode($aProduct) . PHP_EOL;
    }
  }
}