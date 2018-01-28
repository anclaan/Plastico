<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParamValues extends Model
{
  /**
   * [$table description]
   * @var string
   */
  protected $table = 'paramvalue';

  /**
   * [$filable description]
   * @var [type]
   */
  protected $fillable = [
    'value', 'orderProduct_id','producttypeparam_id','opis'
  ];
  // public function typ()
  // {
  //   return $this->belongsTo('App\ProductType','productType_id');
  //
  // }
}
