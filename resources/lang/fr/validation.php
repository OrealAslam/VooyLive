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

    'accepted'             => 'L’attribut :doit être accepté.',
    'active_url'           => 'L’attribut :n’est pas une URL valide.',
    'after'                => 'L’attribut :doit être une date après :d ate.',
    'after_or_equal'       => 'L’attribut :doit être une date postérieure ou égale à :d ate.',
    'alpha'                => 'L’attribut :ne peut contenir que des lettres.',
    'alpha_dash'           => 'L’attribut :ne peut contenir que des lettres, des chiffres et des tirets.',
    'alpha_num'            => 'L’attribut :ne peut contenir que des lettres et des chiffres.',
    'array'                => 'L’attribut :doit être un tableau.',
    'before'               => 'L’attribut :doit être une date avant :d ate.',
    'before_or_equal'      => 'L’attribut :doit être une date avant ou égale à :d ate.',
    'between'              => [
        'numeric' => 'L’attribut :doit être compris entre :min et :max.',
        'file'    => 'L’attribut :doit être compris entre :min et :max kilo-octets.',
        'string'  => 'L’attribut :doit se trouver entre les caractères :min et :max.',
        'array'   => 'L’attribut :doit avoir des éléments entre :min et :max.',
    ],
    'boolean'              => 'Le champ :attribute doit être true ou false.',
    'confirmed'            => 'La confirmation de l’attribut :ne correspond pas.',
    'date'                 => 'L’attribut :n’est pas une date valide.',
    'date_format'          => 'L’attribut :ne correspond pas au format :format.',
    'different'            => 'L’attribut :et :other doivent être différents.',
    'digits'               => 'L’attribut :doit être :d igits chiffres.',
    'digits_between'       => 'L’attribut :doit se trouver entre les chiffres :min et :max.',
    'dimensions'           => 'L’attribut :a des dimensions d’image non valides.',
    'distinct'             => 'Le champ :attribute a une valeur en double.',
    'email'                => 'L’attribut :doit être une adresse e-mail valide.',
    'exists'               => 'L’attribut :sélectionné n’est pas valide.',
    'file'                 => 'L’attribut :doit être un fichier.',
    'filled'               => 'Le champ :attribute doit avoir une valeur.',
    'image'                => 'L’attribut :doit être une image.',
    'in'                   => 'L’attribut :sélectionné n’est pas valide.',
    'in_array'             => 'Le champ :attribute n’existe pas dans :other.',
    'integer'              => 'L’attribut :doit être un entier.',
    'ip'                   => 'L’attribut :doit être une adresse IP valide.',
    'ipv4'                 => 'L’attribut :doit être une adresse IPv4 valide.',
    'ipv6'                 => 'L’attribut :doit être une adresse IPv6 valide.',
    'json'                 => 'L’attribut :doit être une chaîne JSON valide.',
    'max'                  => [
        'numeric' => 'L’attribut :ne peut pas être supérieur à :max.',
        'file'    => 'L’attribut :ne peut pas être supérieur à :max kilo-octets.',
        'string'  => 'L’attribut :ne peut pas être supérieur aux caractères :max.',
        'array'   => 'L’attribut :ne peut pas avoir plus de :max items.',
    ],
    'mimes'                => 'L’attribut :doit être un fichier de type : :values.',
    'mimetypes'            => 'L’attribut :doit être un fichier de type : :values.',
    'min'                  => [
        'numeric' => 'L’attribut :doit être au moins :min.',
        'file'    => 'L’attribut :doit être d’au moins :min kilo-octets.',
        'string'  => 'L’attribut :doit être au moins des caractères :min.',
        'array'   => 'L’attribut :doit avoir au moins des éléments :min.',
    ],
    'not_in'               => 'L’attribut :sélectionné n’est pas valide.',
    'numeric'              => 'L’attribut :doit être un nombre.',
    'present'              => 'Le champ :attribute doit être présent.',
    'regex'                => 'Le format :attribute n’est pas valide.',
    'required'             => 'Le champ :attribute est requis.',
    'required_if'          => 'Le champ :attribute est requis lorsque :other est :value.',
    'required_unless'      => 'Le champ :attribute est requis, sauf si :other est dans :values.',
    'required_with'        => 'Le champ :attribute est requis lorsque :values est présent.',
    'required_with_all'    => 'Le champ :attribute est requis lorsque :values est présent.',
    'required_without'     => 'Le champ :attribute est requis lorsque :values n’est pas présent.',
    'required_without_all' => 'Le champ :attribute est requis lorsqu’aucune des valeurs :n’est présente.',
    'same'                 => 'Les attributs :et :other doivent correspondre.',
    'size'                 => [
        'numeric' => 'L’attribut :doit être :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'L’attribut :doit être des caractères :size.',
        'array'   => 'L’attribut :doit contenir des éléments :size.',
    ],
    'string'               => 'L’attribut :doit être une chaîne.',
    'timezone'             => 'L’attribut :doit être une zone valide.',
    'unique'               => 'L’attribut :a déjà été pris.',
    'uploaded'             => 'L’attribut :n’a pas pu être téléchargé.',
    'url'                  => 'Le format :attribute n’est pas valide.',

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
            'rule-name' => 'message personnalisé',
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

    'attributes' => [],

];
