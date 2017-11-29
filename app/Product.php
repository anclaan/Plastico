<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  /**
   * [$table description]
   * @var string
   */


   protected $table = 'products';

  /**
   * [$filable description]
   * @var [type]
   */
   protected $fillable = [
    'nazwa','opis', 'productType_id'
    ];

    public function typy()
    {
      return $this->hasMany('App\EventType');
    }
    public function typ()
    {
      return $this->belongsTo('App\ProductType','productType_id');

    }

}
