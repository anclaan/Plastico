<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    public function klienci()
    {
      return $this->hasMany('App\Customer');
    }
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
      'customer_id','title', 'start','end','eventType_id','opis'
    ];
}
