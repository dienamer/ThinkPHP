<?php

namespace app\lib\exception;

use think\Exception;

class BaseException extends Exception
{
    private $information = [
        'code' => 0,
        'msg' => "params error",
        'errorCode' => 10000
    ];
    public function __construct($code,$msg,$errorCode)
    {
        $this->information['code'] = $code;
        $this->information['msg'] = $msg;
        $this->information['errorCode']= $errorCode;
    }

    //获取参数
    public function getParam($param)
    {
        return $this->information[$param];
    }
    //设置参数
    public function setParam($param,$value)
    {
        $this->information[$param] = $value;
    }
}