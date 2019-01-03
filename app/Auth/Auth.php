<?php

namespace App\Auth;
use App\Models\UsersModel;

class Auth
{
  public function user()
  {
    if(isset($_SESSION['user'])) {
      return UsersModel::find($_SESSION['user']);
    }
  }

  public function userID()
  {
    if(isset($_SESSION['user'])) {
      return $_SESSION['user'];
    }
  }

  public function roleGroup()
  {
    if(isset($_SESSION['user'])) {
      return UsersModel::find($_SESSION['user'])->permission_type;
    }
  }

  public function check()
  {
    return isset($_SESSION['user']);
  }

  public function permissionTypeAuthorized($profile) 
  {
    return $this->user()->permission_type == $profile;
  }

  public function mailConfirmed()
  {
    return $this->user()->mail_confirmed;
  }

  public function attempt($email, $password)
  {
    $user = UsersModel::where('mail', $email)->first();

    if(!$user) {
      return false;
    } else if(password_verify($password, $user->password)){
  
      $_SESSION['user'] = $user->id;
      return true;
    }

    return false;
  }

  public function logout()
  {
    unset($_SESSION['user']);
  }
}
