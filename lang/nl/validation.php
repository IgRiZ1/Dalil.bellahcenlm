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

    'accepted' => ':attribute moet geaccepteerd worden.',
    'accepted_if' => ':attribute moet geaccepteerd worden wanneer :other :value is.',
    'active_url' => ':attribute is geen geldige URL.',
    'after' => ':attribute moet een datum na :date zijn.',
    'after_or_equal' => ':attribute moet een datum na of gelijk aan :date zijn.',
    'alpha' => ':attribute mag alleen letters bevatten.',
    'alpha_dash' => ':attribute mag alleen letters, cijfers, streepjes en underscores bevatten.',
    'alpha_num' => ':attribute mag alleen letters en cijfers bevatten.',
    'array' => ':attribute moet een array zijn.',
    'ascii' => ':attribute mag alleen alfanumerieke single-byte karakters en symbolen bevatten.',
    'before' => ':attribute moet een datum voor :date zijn.',
    'before_or_equal' => ':attribute moet een datum voor of gelijk aan :date zijn.',
    'between' => [
        'array' => ':attribute moet tussen :min en :max items bevatten.',
        'file' => ':attribute moet tussen :min en :max kilobytes zijn.',
        'numeric' => ':attribute moet tussen :min en :max zijn.',
        'string' => ':attribute moet tussen :min en :max karakters zijn.',
    ],
    'boolean' => ':attribute veld moet true of false zijn.',
    'can' => ':attribute veld bevat een ongeautoriseerde waarde.',
    'confirmed' => ':attribute bevestiging komt niet overeen.',
    'current_password' => 'Het wachtwoord is incorrect.',
    'date' => ':attribute is geen geldige datum.',
    'date_equals' => ':attribute moet een datum gelijk aan :date zijn.',
    'date_format' => ':attribute komt niet overeen met het formaat :format.',
    'decimal' => ':attribute moet :decimal decimale plaatsen hebben.',
    'declined' => ':attribute moet geweigerd worden.',
    'declined_if' => ':attribute moet geweigerd worden wanneer :other :value is.',
    'different' => ':attribute en :other moeten verschillend zijn.',
    'digits' => ':attribute moet :digits cijfers zijn.',
    'digits_between' => ':attribute moet tussen :min en :max cijfers zijn.',
    'dimensions' => ':attribute heeft ongeldige image afmetingen.',
    'distinct' => ':attribute veld heeft een dubbele waarde.',
    'doesnt_end_with' => ':attribute mag niet eindigen met een van de volgende: :values.',
    'doesnt_start_with' => ':attribute mag niet beginnen met een van de volgende: :values.',
    'email' => ':attribute moet een geldig e-mailadres zijn.',
    'ends_with' => ':attribute moet eindigen met een van de volgende: :values.',
    'enum' => 'De geselecteerde :attribute is ongeldig.',
    'exists' => 'De geselecteerde :attribute is ongeldig.',
    'extensions' => ':attribute veld moet een van de volgende extensies hebben: :values.',
    'file' => ':attribute moet een bestand zijn.',
    'filled' => ':attribute veld moet een waarde hebben.',
    'gt' => [
        'array' => ':attribute moet meer dan :value items hebben.',
        'file' => ':attribute moet groter zijn dan :value kilobytes.',
        'numeric' => ':attribute moet groter zijn dan :value.',
        'string' => ':attribute moet meer dan :value karakters hebben.',
    ],
    'gte' => [
        'array' => ':attribute moet :value items of meer hebben.',
        'file' => ':attribute moet groter dan of gelijk zijn aan :value kilobytes.',
        'numeric' => ':attribute moet groter dan of gelijk zijn aan :value.',
        'string' => ':attribute moet :value karakters of meer hebben.',
    ],
    'hex_color' => ':attribute veld moet een geldige hexadecimale kleur zijn.',
    'image' => ':attribute moet een afbeelding zijn.',
    'in' => 'De geselecteerde :attribute is ongeldig.',
    'in_array' => ':attribute veld bestaat niet in :other.',
    'integer' => ':attribute moet een geheel getal zijn.',
    'ip' => ':attribute moet een geldig IP adres zijn.',
    'ipv4' => ':attribute moet een geldig IPv4 adres zijn.',
    'ipv6' => ':attribute moet een geldig IPv6 adres zijn.',
    'json' => ':attribute moet een geldige JSON string zijn.',
    'list' => ':attribute veld moet een lijst zijn.',
    'lowercase' => ':attribute veld moet kleine letters zijn.',
    'lt' => [
        'array' => ':attribute moet minder dan :value items hebben.',
        'file' => ':attribute moet kleiner zijn dan :value kilobytes.',
        'numeric' => ':attribute moet kleiner zijn dan :value.',
        'string' => ':attribute moet minder dan :value karakters hebben.',
    ],
    'lte' => [
        'array' => ':attribute mag niet meer dan :value items hebben.',
        'file' => ':attribute moet kleiner dan of gelijk zijn aan :value kilobytes.',
        'numeric' => ':attribute moet kleiner dan of gelijk zijn aan :value.',
        'string' => ':attribute mag niet meer dan :value karakters hebben.',
    ],
    'mac_address' => ':attribute veld moet een geldig MAC adres zijn.',
    'max' => [
        'array' => ':attribute mag niet meer dan :max items hebben.',
        'file' => ':attribute mag niet groter zijn dan :max kilobytes.',
        'numeric' => ':attribute mag niet groter zijn dan :max.',
        'string' => ':attribute mag niet meer dan :max karakters hebben.',
    ],
    'max_digits' => ':attribute veld mag niet meer dan :max cijfers hebben.',
    'mimes' => ':attribute moet een bestand zijn van het type: :values.',
    'mimetypes' => ':attribute moet een bestand zijn van het type: :values.',
    'min' => [
        'array' => ':attribute moet minstens :min items hebben.',
        'file' => ':attribute moet minstens :min kilobytes zijn.',
        'numeric' => ':attribute moet minstens :min zijn.',
        'string' => ':attribute moet minstens :min karakters hebben.',
    ],
    'min_digits' => ':attribute veld moet minstens :min cijfers hebben.',
    'missing' => ':attribute veld moet ontbreken.',
    'missing_if' => ':attribute veld moet ontbreken wanneer :other :value is.',
    'missing_unless' => ':attribute veld moet ontbreken tenzij :other :value is.',
    'missing_with' => ':attribute veld moet ontbreken wanneer :values aanwezig is.',
    'missing_with_all' => ':attribute veld moet ontbreken wanneer :values aanwezig zijn.',
    'multiple_of' => ':attribute moet een veelvoud zijn van :value.',
    'not_in' => 'De geselecteerde :attribute is ongeldig.',
    'not_regex' => ':attribute formaat is ongeldig.',
    'numeric' => ':attribute moet een nummer zijn.',
    'password' => [
        'letters' => ':attribute veld moet minstens één letter bevatten.',
        'mixed' => ':attribute veld moet minstens één hoofdletter en één kleine letter bevatten.',
        'numbers' => ':attribute veld moet minstens één cijfer bevatten.',
        'symbols' => ':attribute veld moet minstens één symbool bevatten.',
        'uncompromised' => 'De gegeven :attribute is verschenen in een datalek. Kies alstublieft een ander :attribute.',
    ],
    'present' => ':attribute veld moet aanwezig zijn.',
    'present_if' => ':attribute veld moet aanwezig zijn wanneer :other :value is.',
    'present_unless' => ':attribute veld moet aanwezig zijn tenzij :other :value is.',
    'present_with' => ':attribute veld moet aanwezig zijn wanneer :values aanwezig is.',
    'present_with_all' => ':attribute veld moet aanwezig zijn wanneer :values aanwezig zijn.',
    'prohibited' => ':attribute veld is verboden.',
    'prohibited_if' => ':attribute veld is verboden wanneer :other :value is.',
    'prohibited_unless' => ':attribute veld is verboden tenzij :other in :values staat.',
    'prohibits' => ':attribute veld verbiedt :other om aanwezig te zijn.',
    'regex' => ':attribute formaat is ongeldig.',
    'required' => ':attribute veld is verplicht.',
    'required_array_keys' => ':attribute veld moet vermeldingen bevatten voor: :values.',
    'required_if' => ':attribute veld is verplicht wanneer :other :value is.',
    'required_if_accepted' => ':attribute veld is verplicht wanneer :other geaccepteerd is.',
    'required_unless' => ':attribute veld is verplicht tenzij :other in :values staat.',
    'required_with' => ':attribute veld is verplicht wanneer :values aanwezig is.',
    'required_with_all' => ':attribute veld is verplicht wanneer :values aanwezig zijn.',
    'required_without' => ':attribute veld is verplicht wanneer :values niet aanwezig is.',
    'required_without_all' => ':attribute veld is verplicht wanneer geen van :values aanwezig zijn.',
    'same' => ':attribute en :other moeten overeenkomen.',
    'size' => [
        'array' => ':attribute moet :size items bevatten.',
        'file' => ':attribute moet :size kilobytes zijn.',
        'numeric' => ':attribute moet :size zijn.',
        'string' => ':attribute moet :size karakters zijn.',
    ],
    'starts_with' => ':attribute moet beginnen met een van de volgende: :values.',
    'string' => ':attribute moet een string zijn.',
    'timezone' => ':attribute moet een geldige tijdzone zijn.',
    'unique' => ':attribute is al in gebruik.',
    'uploaded' => ':attribute kon niet geüpload worden.',
    'uppercase' => ':attribute veld moet hoofdletters zijn.',
    'url' => ':attribute moet een geldige URL zijn.',
    'ulid' => ':attribute veld moet een geldige ULID zijn.',
    'uuid' => ':attribute veld moet een geldige UUID zijn.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "rule.attribute". This makes it quick to specify a specific
    | custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'aangepast-bericht',
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
        'name' => 'naam',
        'username' => 'gebruikersnaam',
        'email' => 'e-mailadres',
        'password' => 'wachtwoord',
        'password_confirmation' => 'wachtwoord bevestiging',
        'title' => 'titel',
        'content' => 'inhoud',
        'image' => 'afbeelding',
        'description' => 'beschrijving',
        'question' => 'vraag',
        'answer' => 'antwoord',
        'subject' => 'onderwerp',
        'message' => 'bericht',
        'phone' => 'telefoonnummer',
        'birthday' => 'geboortedatum',
        'about_me' => 'over mij',
        'profile_photo' => 'profielfoto',
    ],

];