<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klient extends Model
{
  /**
   * [$table description]
   * @var string
   */
  protected $table = 'klients';

  /**
   * [$filable description]
   * @var [type]
   */
  protected $fillable = [
    'imie', 'nazwisko','adres','telefon','email'
  ];
}
