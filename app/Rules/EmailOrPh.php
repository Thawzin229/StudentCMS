<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class EmailOrPh implements Rule
{
 
    public function passes($attribute, $value)
    {
        return filter_var($value,FILTER_VALIDATE_EMAIL) || preg_match('/^(?:\+?95(?:09|01)\d{7,9}|09\d{7,9}|01\d{7,9})$/',$value);
    }
    public function message()
    {
        return 'Please enter the valid Email or Ph-number';
    }
}
