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

    'accepted' => 'Ви повинні прийняти :attribute',
    'accepted_if' => 'Поле :attribute повинен бути прийнятий, коли :other відповідає :value.',
    'active_url' => ' Поле :attribute не є дійсною URL-адресою.',
    'after' => 'В полі :attribute повинна бути дата більше :date.',
    'after_or_equal' => 'В полі :attribute дата повинна бути більшою або рівною :date.',
    'alpha' => 'Поле :attribute може містити тільки букви.',
    'alpha_dash' => 'Поле :attribute може містити тільки букви, цифри, тире і нижнє підкреслення.',
    'alpha_num' => 'Поле :attribute може містити тільки букви і цифри.',
    'array' => 'Поле :attribute повинно бути масивом.',
    'before' => 'В полі :attribute повинна бути дата раніше :date.',
    'before_or_equal' => 'В полі :attribute повинна бути дата раніше або рівнятись :date.',
    'between' => [
        'numeric' => 'Поле :attribute повинно бути між :min і :max.',
        'file' => 'Розмір файла в полі :attribute повинен бути між :min і :max кілобайт(а).',
        'string' => 'Кількість символів в полі :attribute повинно бути між :min і :max.',
        'array' => 'Кількість елементів в полі :attribute повинно бути між :min і :max.',
    ],
    'boolean' => 'Поле :attribute повинно містити значення логічного типу.',
    'confirmed' => 'Поле :attribute не співпадає з підтвердженим.',
    'current_password' => 'Поле password не вірне.',
    'date' => 'Поле :attribute не є датою.',
    'date_equals' => 'Поле :attribute повинно бути датою рівною :date.',
    'date_format' => 'Поле :attribute не відповідає формату :format.',
    'different' => 'Поле :attribute і :other повинні відрізнятись.',
    'digits' => 'Довжина цифрового поля :attribute повинна бути :digits.',
    'digits_between' => 'Довжина цифрового поля :attribute повинна бути між :min і :max.',
    'dimensions' => 'Поле :attribute має неприпустимі розміри зображення.',
    'distinct' => 'Поле :attribute містить повторюване значення.',
    'email' => 'Поле :attribute повинно бути дійсною електронною адресою.',
    'ends_with' => 'Поле :attribute повинно закінчуватись одним із слідуючих значень following: :values.',
    'exists' => 'Обране значення для :attribute не коректно.',
    'file' => 'Поле :attribute повинно бути файлом.',
    'filled' => 'Поле :attribute обов\'язкове для заповнення.',
    'gt' => [
        'numeric' => 'Поле :attribute повинно бути більшим ніж :value.',
        'file' => 'Поле :attribute повинно бути більшим ніж :value кілобайт(а).',
        'string' => 'В полі :attribute кількість символів повинно бути більшим ніж :value.',
        'array' => 'Кількість елементів в полі :attribute повинно бути більшим ніж :value.',
    ],
    'gte' => [
        'numeric' => 'Поле :attribute повинно бути більшим або рівним :value.',
        'file' => 'Розмір файла в полі :attribute повинно бути більшим або рівним :value кілобайт(а).',
        'string' => 'Кількість символів в полі :attribute повинно бути :value або більшим.',
        'array' => 'Кількість елементів в полі :attribute повинно бути :value items або більшим.',
    ],
    'image' => 'Поле :attribute повинно бути зображенням.',
    'in' => 'Вибраний :attribute є не дійсний.',
    'in_array' => 'Поле :attribute не існує в :other.',
    'integer' => 'Поле :attribute повинно бути цілим числом.',
    'ip' => 'Поле :attribute повинно мати дійсну IP адресу.',
    'ipv4' => 'Поле :attribute повинно мати дійсну IPv4 адресу.',
    'ipv6' => 'Поле :attribute повинно мати дійсну IPv6 адресу.',
    'json' => 'Поле :attribute повинен бути дійсним JSON рядком.',
    'lt' => [
        'numeric' => 'Поле :attribute повинно бути менше ніж :value.',
        'file' => 'Розмір файла в полі :attribute повинен бути менше :value кілобайт(а).',
        'string' => 'Кількість символів в полі :attribute повинно бути менше ніж :value.',
        'array' => 'Кількість елементів в полі :attribute повинно бути менше ніж :value.',
    ],
    'lte' => [
        'numeric' => 'Поле :attribute повинно бути :value або менше.',
        'file' => 'Розмір файла в полі :attribute повинен бути :value кілобайт(а) або менше.',
        'string' => 'Кількість символів в полі :attribute повинно бути :value або менше.',
        'array' => 'Кількість елементів в полі :attribute повинно бути :value або менше.',
    ],
    'max' => [
        'numeric' => 'Поле :attribute не може бути більше ніж :max.',
        'file' => 'Розмір файла в полі :attribute не може бути більшим ніж :max кілобайт(а).',
        'string' => 'Кількість символів в полі :attribute не може перевищувати :max.',
        'array' => 'Кількість елементів в полі :attribute не може перевищувати :max.',
    ],
    'mimes' => 'Поле :attribute повинно бути файлом типу: :values.',
    'mimetypes' => 'Поле :attribute повинно бути файлом типу: :values.',
    'min' => [
        'numeric' => 'Поле :attribute повинно бути не менше ніж :min.',
        'file' => 'Розмір файла в полі :attribute повинен бути не менше ніж :min кілобайт(а).',
        'string' => 'Кількість символів в полі :attribute повинно бути не менше ніж :min.',
        'array' => 'Кількість елементів в полі :attribute повинно бути не менше ніж :min.',
    ],
    'multiple_of' => 'Значення поля :attribute повинно бути кратним :value.',
    'not_in' => 'Обране значення для :attribute помилкове.',
    'not_regex' => 'Обраний формат для :attribute помилковий.',
    'numeric' => 'Поле :attribute повинно бути числом.',
    'password' => 'Невірний пароль.',
    'present' => 'Поле :attribute повинно бути вказаним.',
    'regex' => 'Поле :attribute має помилковий формат.',
    'required' => 'Поле :attribute обов\'язкове для заповнення.',
    'required_if' => 'Поле :attribute обов\'язкове для заповнення, коли :other рівне :value.',
    'required_unless' => 'Поле :attribute обов\'язкове для заповнення, коли :other не рівно :values.',
    'required_with' => 'Поле :attribute обов\'язкове для заповнення, коли :values вказано.',
    'required_with_all' => 'Поле :attribute обов\'язкове для заповнення, коли :values вказано.',
    'required_without' => 'Поле :attribute обов\'язкове для заповнення, коли :values не вказано.',
    'required_without_all' => 'Поле :attribute обов\'язкове для заповнення, коли ні один з :values не вказано.',
    'prohibited' => 'Поле :attribute заборонено.',
    'prohibited_if' => 'Поле :attribute заборонено, коли :other рівно :value.',
    'prohibited_unless' => 'Поле :attribute заборонено, якщо :other не входить в :values.',
    'prohibits' => 'Поле :attribute забороняє присутність :other.',
    'same' => 'Значення полів :attribute і :other повинні співпадати.',
    'size' => [
        'numeric' => 'Поле :attribute повинно бути рівним :size.',
        'file' => 'Розмір файла в полі :attribute повинен бути рівним :size кілобайт(а).',
        'string' => 'Кількість символів в полі :attribute повинно бути рівним :size.',
        'array' => 'Кількість елементів в полі :attribute повинно бути рівним :size.',
    ],
    'starts_with' => 'Поле :attribute повинно починатись з одного з наступних значень: :values.',
    'string' => 'Поле :attribute повинно бути рядком.',
    'timezone' => 'Поле :attribute повинно бути дійсним часовим поясом.',
    'unique' => 'Таке значення поля :attribute вже існує.',
    'uploaded' => 'Поле :attribute не вдалось завантажити.',
    'url' => 'Поле :attribute має помилковий формат URL.',
    'uuid' => 'Поле :attribute повинно бути коректним UUID.',

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
