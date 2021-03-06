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
    'required' => 'Pole :attribute jest wymagane.',
    'unique' => 'Taki wpis w polu :attribute już istnieje. Proszę wpisać inny.',
    'numeric' => 'Pole :attribute musi być liczbą. Proszę użyć kropki zamiast przecinka.',
    'min' => [        
        'string'  => 'Pole :attribute musi mieć co najmniej :min znaków.',
    ],
    'confirmed' => 'Pole :attribute nie pasuje z potwierdzeniem.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name' => 'Nazwa prduktu',
        'slug' => 'Unikalny URL',
        'description' => 'Opis prduktu',
        'prices.*.name' => 'Nazwa ceny',
        'prices.*.value' => 'Wartość ceny',
        'prices.*.unit' => 'Jednostka ceny',
        'email' => 'E-mail',
        'password' => 'Hasło',
        'old_password' => 'Stare hasło',
        'new_password' => 'Nowe hasło',        
    ],

];
