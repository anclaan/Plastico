<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
  /**
   * [$table description]
   * @var string
   */
  protected $table = 'orderstatus';

  /**
   * [$filable description]
   * @var [type]
   */
  protected $fillable = [
    'nazwa','idProces'
  ];
}
