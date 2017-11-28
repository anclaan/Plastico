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
    'nazwa', 'productType_id'
    ];

    public function typy()
    {
      return $this->hasMany('App\EventType');
    }
    public function getProductType()
    {
      return 666;
     // return ProductType::where('id',$this->productType_id);
    }
}
