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
}
