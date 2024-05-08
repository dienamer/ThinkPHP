<?php

namespace app\api\validate;

class TestVaildate extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPostiveInterger',
    ];
}