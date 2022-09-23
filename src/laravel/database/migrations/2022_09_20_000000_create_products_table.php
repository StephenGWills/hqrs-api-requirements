<?php
/**
 * Created by PhpStorm.
 * User: swills
 * Date: 9/21/22
 * Time: 8:15 PM
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
  /**
   * Run migrations
   *
   * { "products": [
   *  { "sku": "000001", "name": "Full coverage insurance",  "category": "insurance", "price":  89000 },
   *  { "sku": "000002", "name": "Compact Car X3",           "category": "vehicle",   "price":  99000 },
   *  { "sku": "000003", "name": "SUV Vehicle, high end",    "category": "vehicle",   "price": 150000 },
   *  { "sku": "000004", "name": "Basic coverage",           "category": "insurance", "price":  20000 },
   *  { "sku": "000005", "name": "Convertible X2, Electric", "category": "vehicle",   "price": 250000 }
   * ] }
   *
   *
   *
   * @return void
   */
  public function up()
  {
      Schema::create('products', function(Blueprint $table){
          $table->id();
          $table->string('sku');
          $table->string('name');
          $table->string('category');
          $table->decimal('price');
          $table->timestamps();
      });

    DB::table('products')->insert(
      array(
          ["sku" => "000001", "name" => "Full coverage insurance",  "category" => "insurance", "price" => 89000 ],
          ["sku" => "000002", "name" => "Compact Car X3",           "category" => "vehicle",   "price" => 99000 ],
          ["sku" => "000003", "name" => "SUV Vehicle, high end",    "category" => "vehicle",   "price" =>150000 ],
          ["sku" => "000004", "name" => "Basic coverage",           "category" => "insurance", "price" => 20000 ],
          ["sku" => "000005", "name" => "Convertible X2, Electric", "category" => "vehicle",   "price" =>250000 ]
      )
    );
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::dropIfExists('products');
  }
}