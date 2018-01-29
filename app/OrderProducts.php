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
  public function typ()
  {
    return $this->belongsToMany('App\Product', 'product_id');

  }
}
