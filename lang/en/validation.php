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

    'accepted' => 'يجب قبول :attribute.',
    'active_url' => ':attribute ليس عنوان URL صالحًا.',
    'after' => ':attribute يجب أن يكون تاريخًا بعد :date.',
    'after_or_equal' => ':attribute يجب أن يكون تاريخًا بعد أو يساوي :date.',
    'alpha' => ':attribute قد يحتوي فقط على أحرف.',
    'alpha_dash' => ':attribute قد يحتوي فقط على أحرف وأرقام وشرطات وشرطات سفلية.',
    'alpha_num' => ':attribute قد يحتوي فقط على أحرف وأرقام.',
    'array' => ':attribute يجب أن يكون مصفوفة.',
    'before' => ':attribute يجب أن يكون تاريخًا قبل :date.',
    'before_or_equal' => ':attribute يجب أن يكون تاريخًا قبل أو يساوي :date.',
    'between' => [
        'numeric' => ':attribute يجب أن يكون بين :min و :max.',
        'file' => ':attribute يجب أن يكون بين :min و :max كيلوبايت.',
        'string' => ':attribute يجب أن يكون بين :min و :max حرفًا.',
        'array' => ':attribute يجب أن يكون بين :min و :max عنصرًا.',
    ],
    'boolean' => 'يجب أن يكون حقل :attribute صحيحًا أو خطأ.',
    'confirmed' => 'تأكيد :attribute غير متطابق.',
    'date' => ':attribute ليس تاريخًا صالحًا.',
    'date_equals' => ':attribute يجب أن يكون تاريخًا مساويًا لـ :date.',
    'date_format' => ':attribute لا يتطابق مع الشكل :format.',
    'different' => ':attribute و :other يجب أن يكونا مختلفين.',
    'digits' => ':attribute يجب أن يحتوي على :digits أرقام.',
    'digits_between' => ':attribute يجب أن يكون بين :min و :max أرقام.',
    'dimensions' => ':attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => ':attribute يحتوي على قيمة مكررة.',
    'email' => ':attribute يجب أن يكون عنوان بريد إلكتروني صالح.',
    'ends_with' => ':attribute يجب أن ينتهي بأحد القيم التالية: :values.',
    'exists' => ':attribute المحدد غير صالح.',
    'file' => ':attribute يجب أن يكون ملفًا.',
    'filled' => ':attribute يجب أن يحتوي على قيمة.',
    'gt' => [
        'numeric' => ':attribute يجب أن يكون أكبر من :value.',
        'file' => ':attribute يجب أن يكون أكبر من :value كيلوبايت.',
        'string' => ':attribute يجب أن يكون أكبر من :value حرفًا.',
        'array' => ':attribute يجب أن يحتوي على أكثر من :value عنصر.',
    ],
    'gte' => [
        'numeric' => ':attribute يجب أن يكون أكبر من أو يساوي :value.',
        'file' => ':attribute يجب أن يكون أكبر من أو يساوي :value كيلوبايت.',
        'string' => ':attribute يجب أن يكون أكبر من أو يساوي :value حرفًا.',
        'array' => ':attribute يجب أن يحتوي على :value عنصر أو أكثر.',
    ],
    'image' => ':attribute يجب أن يكون صورة.',
    'in' => ':attribute المحدد غير صالح.',
    'in_array' => ':attribute الحقل غير موجود في :other.',
    'integer' => ':attribute يجب أن يكون عددًا صحيحًا.',
    'ip' => ':attribute يجب أن يكون عنوان IP صالحًا.',
    'ipv4' => ':attribute يجب أن يكون عنوان IPv4 صالحًا.',
    'ipv6' => ':attribute يجب أن يكون عنوان IPv6 صالحًا.',
    'json' => ':attribute يجب أن يكون سلسلة JSON صالحة.',
    'lt' => [
        'numeric' => ':attribute يجب أن يكون أقل من :value.',
        'file' => ':attribute يجب أن يكون أقل من :value كيلوبايت.',
        'string' => ':attribute يجب أن يكون أقل من :value حرفًا.',
        'array' => ':attribute يجب أن يحتوي على أقل من :value عنصر.',
    ],
    'lte' => [
        'numeric' => ':attribute يجب أن يكون أقل من أو يساوي :value.',
        'file' => ':attribute يجب أن يكون أقل من أو يساوي :value كيلوبايت.',
        'string' => ':attribute يجب أن يكون أقل من أو يساوي :value حرفًا.',
        'array' => ':attribute يجب ألا يحتوي على أكثر من :value عنصر.',
    ],
    'max' => [
        'numeric' => ':attribute قد لا يكون أكبر من :max.',
        'file' => ':attribute قد لا يكون أكبر من :max كيلوبايت.',
        'string' => ':attribute قد لا يكون أكبر من :max حرفًا.',
        'array' => ':attribute قد لا يحتوي على أكثر من :max عنصر.',
    ],
    'mimes' => ':attribute يجب أن يكون ملفًا من النوع: :values.',
    'mimetypes' => ':attribute يجب أن يكون ملفًا من النوع: :values.',
    'min' => [
        'numeric' => ':attribute يجب أن يكون على الأقل :min.',
        'file' => ':attribute يجب أن يكون على الأقل :min كيلوبايت.',
        'string' => ':attribute يجب أن يكون على الأقل :min حرفًا.',
        'array' => ':attribute يجب أن يحتوي على الأقل :min عنصرًا.',
    ],
    'multiple_of' => ':attribute يجب أن يكون مضاعفًا لـ :value',
    'not_in' => ':attribute المحدد غير صالح.',
    'not_regex' => 'تنسيق :attribute غير صالح.',
    'numeric' => ':attribute يجب أن يكون رقمًا.',
    'password' => 'كلمة المرور غير صحيحة.',
    'present' => 'يجب أن يكون الحقل :attribute موجودًا.',
    'regex' => 'تنسيق :attribute غير صالح.',
    'required' => 'حقل :attribute مطلوب.',
    'required_if' => 'حقل :attribute مطلوب عندما :other يكون :value.',
    'required_unless' => 'حقل :attribute مطلوب ما لم يكن :other في :values.',
    'required_with' => 'حقل :attribute مطلوب عندما يكون :values موجودًا.',
    'required_with_all' => 'حقل :attribute مطلوب عندما يكون :values موجودًا.',
    'required_without' => 'حقل :attribute مطلوب عندما لا يكون :values موجودًا.',
    'required_without_all' => 'حقل :attribute مطلوب عندما لا يكون أي من :values موجودًا.',
    'same' => ':attribute و :other يجب أن يتطابقا.',
    'size' => [
        'numeric' => ':attribute يجب أن يكون :size.',
        'file' => ':attribute يجب أن يكون :size كيلوبايت.',
        'string' => ':attribute يجب أن يكون :size حرفًا.',
        'array' => ':attribute يجب أن يحتوي على :size عنصر.',
    ],
    'starts_with' => ':attribute يجب أن يبدأ بأحد القيم التالية: :values.',
    'string' => ':attribute يجب أن يكون نصًا.',
    'timezone' => ':attribute يجب أن يكون منطقة صالحة.',
    'unique' => ':attribute تم أخذه بالفعل.',
    'uploaded' => ':attribute فشل في التحميل.',
    'url' => 'تنسيق :attribute غير صالح.',
    'uuid' => ':attribute يجب أن يكون UUID صالحًا.',

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
