<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
  /**
   * [$table description]
   * @var string
   */
  protected $table = 'eventtypes';

  /**
   * [$filable description]
   * @var [type]
   */
  protected $fillable = [
    'nazwa'
  ];
}
