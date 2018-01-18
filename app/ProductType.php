<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
  /**
   * [$table description]
   * @var string
   */
  protected $table = 'producttypes';

  /**
   * [$filable description]
   * @var [type]
   */
  protected $fillable = [
    'nazwa'
  ];

}
