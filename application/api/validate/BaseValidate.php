<?php

namespace app\api\validate;


use app\lib\exception\ParameterException;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck()
    {
        $params = Request::instance()->param();
        $result = $this->batch()->check($params);
        if(!$result)
        {

            $e = new ParameterException('400',$this->error,10000);
            throw $e;
        }
        else
        {
            return true;
        }
    }

    public function isPostiveInterger($value,$rule='',$data='',$field='')
    {
        if(is_numeric($value) && is_int($value+0) && ($value+0) > 0)
        {
            return true;
        }
        else
        {
            return $field."必须是整数";
        }
    }
}