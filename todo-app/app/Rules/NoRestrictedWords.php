<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoRestrictedWords implements ValidationRule
{
    protected $restrictedWords = ['фейк', 'чушь', 'мусор'];

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        foreach ($this->restrictedWords as $word) {
            if (stripos($value, $word) !== false) {
                $fail('Поле :attribute содержит запрещенные слова.');
            }
        }
    }
}