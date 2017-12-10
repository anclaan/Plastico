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
    'nazwa', 'kosztCalkowity','terminRealizacji','dataRealizacji','customer_id'
  ];
  public function typ()
  {
    return $this->belongsTo('App\ProductType','productType_id');

  }
}
