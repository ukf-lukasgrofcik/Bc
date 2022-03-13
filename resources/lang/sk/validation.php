<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Pole :attribute musí byť akceptované.',
    'accepted_if' => 'Pole :attribute musí byť akceptované ak pole :other má hodnotu :value.',
    'active_url' => 'Pole :attribute nie je validná URL.',
    'after' => 'Pole :attribute musí byť dátum po :date.',
    'after_or_equal' => 'Pole :attribute musí byť dátum po alebo sa rovnať :date.',
    'alpha' => 'Pole :attribute musí obsahovať iba písmená.',
    'alpha_dash' => 'Pole :attribute musí obsahovať iba písmená, čísla, pomlčky alebo podtržníky.',
    'alpha_num' => 'Pole :attribute musí obsahovať iba písmená alebo čísla.',
    'array' => 'Pole :attribute musí byť pole.',
    'before' => 'Pole :attribute musí byť dátum pred :date.',
    'before_or_equal' => 'Pole :attribute musí byť dátum pred alebo sa rovnať :date.',
    'between' => [
        'numeric' => 'Pole :attribute musí byť v intervale :min - :max.',
        'file' => 'Pole :attribute musí mať :min až :max kilobajtov.',
        'string' => 'Pole :attribute musí mať :min až :max znakov.',
        'array' => 'Pole :attribute musí mať :min až :max položiek.',
    ],
    'boolean' => 'Pole :attribute musí byť pravda alebo nepravda.',
    'confirmed' => 'Pole :attribute nebolo správne potvrdené.',
    'current_password' => 'Heslo je nesprávne.',
    'date' => 'Pole :attribute nie je validný dátum.',
    'date_equals' => 'Pole :attribute musí byť dátum :date.',
    'date_format' => 'Pole :attribute musí byť vo formáte :format.',
    'different' => 'Polia :attribute a :other nesmú byť rovnaké.',
    'digits' => 'Pole :attribute musí mať :digits číslic.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'Pole :attribute musí byť validná e-mailová adresa.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'Hodnota poľa :attribute nie je validná.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'Pole :attribute musí byť celé číslo.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute must not be greater than :max.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'string' => 'Pole :attribute nesmie byť vačšie ako :max znakov.',
        'array' => 'The :attribute must not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'Pole :attribute je povinné.',
    'required_if' => 'Pole :attribute je povinné ak je pole :other :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'Pole :attribute je povinné ak nie sú vyplnené polia :values.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'Pole :attribute musí byť textový reťazec.',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute must be a valid URL.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'Meno/Názov',
        'surname' => 'Priezvisko',
        'email' => 'E-mail',
        'password' => 'Heslo',
        'owner_id' => 'Majiteľ firmy',
        'study_programme_id' => 'Študíjny program',
        'address' => 'Adresa',
        'text' => 'Komentár',
        'academic_year' => 'Akademický rok',
        'type_id' => 'Typ zmluvy',
        'tutor_id' => 'Profesor',
        'subject_id' => 'Predmet',
        'worker_id' => 'Zamestnanec',
        'company_id' => 'Spoločnosť',
        'company.name' => 'Názov',
        'company.address' => 'Adresa',
        'company.email' => 'E-mail',
    ],

];
