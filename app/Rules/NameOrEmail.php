<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;

class NameOrEmail implements Rule
{
    public function passes($attribute, $value)
    {
        return filter_var($value,FILTER_VALIDATE_EMAIL) || is_string($value);
    }
    public function message()
    {
        return 'Please enter the valid Email or Ph-number';
    }
}
