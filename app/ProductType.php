<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
  /**
   * [$table description]
   * @var string
   */
  protected $table = 'producttype';

  /**
   * [$filable description]
   * @var [type]
   */
  protected $fillable = [
    'nazwa','productMainType_id','opis'
  ];
}
