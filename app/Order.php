<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  /**
   * [$table description]
   * @var string
   */
  protected $table = 'orders';

  /**
   * [$filable description]
   * @var [type]
   */
  protected $fillable = [
    'nazwa', 'kosztCalkowity','terminRealizacji','customer_id'
  ];
  // public function typ()
  // {
  //   return $this->belongsTo('App\ProductType','productType_id');
  //
  // }
  public function typ()
  {
    return $this->belongsToMany('App\Order', 'orderproduct', 'product_id', 'order_id');

  }
}
