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

    'accepted' => ' :attribute debe ser aceptada.',
    'active_url' => ' :attribute no es una URL valida.',
    'after' => ' :attribute debe ser una fecha despues de :date.',
    'after_or_equal' => ' :attribute debe ser una fecha igual o despues de :date.',
    'alpha' => ' :attribute solo puede contener letras.',
    'alpha_dash' => ' :attribute solo puede contener letras, numeros, dashes y underscores.',
    'alpha_num' => '  :attribute solo puede contener letras y numeros.',
    'array' => ' :attribute debe ser un array.',
    'before' => ' :attribute debe ser una fecha antes de :date.',
    'before_or_equal' => ' :attribute debe ser una fecha anterior o igual a :date.',
    'between' => [
        'numeric' => ' :attribute debe ser entre :min y :max.',
        'file' => 'The :attribute debe ser entre :min y :max kilobytes.',
        'string' => 'The :attribute debe ser entre :min y :max caracteres.',
        'array' => 'The :attribute debe tener entre :min y :max items.',
    ],
    'boolean' => ' El campo :attribute  debe ser verdadero o falso.',
    'confirmed' => 'La :attribute de confirmacion no coincide.',
    'date' => ' :attribute no es una fecha valida.',
    'date_equals' => ' :attribute debe ser fecha igual a :date.',
    'date_format' => ' :attribute no coincide con el formato :format.',
    'different' => ' :attribute y :other deben ser diferentes.',
    'digits' => ' :attribute debe ser :digits digitos.',
    'digits_between' => ' :attribute debe ser entre :min y :max digitos.',
    'dimensions' => ' :attribute has invalid image dimensions.',
    'distinct' => ' El campo :attribute tiene un valor duplicado.',
    'email' => ' :attribute debe ser un email valido.',
    'ends_with' => ' :attribute debe terminar con uno de los siguientes valores: :values.',
    'exists' => 'El :attribute seleccionado es no valido.',
    'file' => ' :attribute debe ser un archivo.',
    'filled' => 'El campo :attribute debe tener un valor.',
    'gt' => [
        'numeric' => ' :attribute debe ser mayor que :value.',
        'file' => ' :attribute debe ser mayor que :value kilobytes.',
        'string' => ' :attribute debe ser mayor que :value characters.',
        'array' => ' :attribute debe tener mas de :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => ' :attribute debe ser una imagen.',
    'in' => ' :attribute seleccionado es no valido.',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer' => ' :attribute debe ser un integer.',
    'ip' => ' :attribute must be a valid IP address.',
    'ipv4' => ' :attribute must be a valid IPv4 address.',
    'ipv6' => ' :attribute must be a valid IPv6 address.',
    'json' => ' :attribute must be a valid JSON string.',
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
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ' :attribute debe tener al menos :min.',
        'file' => ' :attribute debe tener al menos :min kilobytes.',
        'string' => ' :attribute debe tener al menos :min caracteres.',
        'array' => ' :attribute debe tener al menos :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'usuario' => 'El usuario es incorrecto.',
    'clave' => 'La clave es incorrecta.',
    'password' => 'El password es incorrecto.',
    'present' => 'El campo :attribute debe estar presente.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'El campo :attribute es requerido.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => ' :attribute debe ser un valor cadena.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'El atributo :attribute ya ha sido tomado.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute formato URL es no valido.',
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

    'attributes' => [],

];
