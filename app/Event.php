<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $klienci = Klient::all();
    public function klienci()
    {
      return $this->hasMany('App\Klient');
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
      'title', 'start','end','typ'
    ];
}
