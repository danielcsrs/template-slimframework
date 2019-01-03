<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersModel extends Model {
  use SoftDeletes;

  protected $table = 'users';
  protected $fillable = [
    'name',
    'mail',
    'password',
    'cellphone',
    'mail_confirmed',
    'permission_type',
    'created_at',
    'updated_at'
  ];

  protected $dates = ['deleted_at'];
}
