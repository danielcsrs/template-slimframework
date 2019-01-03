<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CitiesModel extends Model {
  use SoftDeletes;

  protected $table = 'cities';
  protected $fillable = [
    'state',
    'name',
    'created_at',
    'updated_at'
  ];

  protected $dates = ['deleted_at'];
}
