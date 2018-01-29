<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
  /**
   * [$table description]
   * @var string
   */
  protected $table = 'orderproducts';

  /**
   * [$filable description]
   * @var [type]
   */
  protected $fillable = [
    'cenaProduktu', 'order_id','product_id','opis'
  ];
  public function produkt()
  {
    return $this->belongsTo('App\Product', 'product_id');

  }
}
