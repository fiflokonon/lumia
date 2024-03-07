<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;


class AtLeastOneCorrectAnswer implements Rule
{
    public function passes($attribute, $value)
    {
        // Vérifie si au moins un des éléments du tableau est vrai (réponse correcte)
        return in_array(true, $value);
    }

    public function message()
    {
        return 'Chaque question doit avoir au moins une réponse correcte.';
    }
}
