<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * [$table description]
     * @var string
     */
    protected $table = 'events';

    /**
     * [$filable description]
     * @var [type]
     */
    protected $fillable = [
      'title', 'start','end','typ'
    ];
}
