<?php

namespace App\Validation\Rules;

use App\Models\UsersModel;
use Respect\Validation\Rules\AbstractRule;

class EmailAvailable extends AbstractRule
{
  public function validate($input)
  {
    return UsersModel::where('mail', $input)->count() === 0;
  }
}
