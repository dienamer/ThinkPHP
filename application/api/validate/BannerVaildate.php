<?php

namespace app\api\validate;

class BannerVaildate extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPostiveInterger',
        'num' => 'in 1,2,3'
    ];
}