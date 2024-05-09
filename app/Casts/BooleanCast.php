<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class BooleanCast implements CastsAttributes
{
    public function get($model, $key, $value, $attributes) {
        return (bool) $value;
    }

    public function set($model, $key, $value, $attributes) {
        return $value === 'true' ? 1 : 0;
    }
}
