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
    'nazwa', 'kosztCalkowity','terminRealizacji','customer_id','status_id'
  ];
  // public function typ()
  // {
  //   return $this->belongsTo('App\ProductType','productType_id');
  //
  // }
  public function klient()
  {
    return $this->belongsTo('App\Customer', 'customer_id');

  }
  public function status()
  {
    return $this->belongsTo('App\OrderStatus', 'status_id');

  }
}
