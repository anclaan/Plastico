<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  /**
   * [$table description]
   * @var string
   */
  protected $table = 'customers';

  /**
   * [$filable description]
   * @var [type]
   */
  protected $fillable = [
    'imie', 'nazwisko','adres','telefon','email','nip','kod','poczta'
  ];


}
