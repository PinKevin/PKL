<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AllDokumenChecked implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $arrayForCheck = ['PPJB', 'AJB', 'SKMHT', 'APHT', 'PH', 'SHT', 'IMB', 'Sertipikat', 'PK', 'CN'];
        $diff = array_diff($arrayForCheck, $value);
        if (!empty($diff)) {
            $fail('Seluruh dokumen harus dipilih!');
        }
    }
}
