<?php
/**
 * Created by PhpStorm.
 * User: swills
 * Date: 9/21/22
 * Time: 8:10 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function applyDiscounts($oneProduct)
    {

      $discount_percentage = 0;
      $price_array = [
         "original" => $oneProduct['price'],
         "final" => $oneProduct['price'],
         "discount_percentage" => null,
         "currency" => "EUR"
         ];

      //Products in the "insurance" category have a 30% discount
      if($oneProduct['category'] === "insurance"){
        $price_array['discount_percentage'] = "30%";
        $price_array['final'] = $oneProduct['price'] = $oneProduct['price'] - ($oneProduct['price'] * .3);
        
      }

      //The product with sku = 000003 has a 15% discount.
      if($oneProduct['sku'] == "000003" ){
        $price_array['discount_percentage'] = "15%" ;
        $price_array['final'] = $oneProduct['price'] = $oneProduct['price'] - ($oneProduct['price'] * .15);
      }

      return $price_array;
    }
}