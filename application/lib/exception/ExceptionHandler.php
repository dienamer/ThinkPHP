<?php

namespace  app\lib\exception;


use think\Config;
use Exception;
use think\exception\Handle;
use think\Log;
use think\Request;

class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;
    // 需要返回客户端当前请求的url路径
    public function render(Exception $e)
    {
        // 用户异常
        if ($e instanceof BaseException) {
            // 如果是自定义的异常

            $this->code = $e->getParam('code');
            $this->msg = $e->getParam('msg');
            $this->errorCode = $e->getParam('errorCode');
        }
        else
        {

            if (Config::get('app_debug'))
            {
                //TODO return ddefault error page
                // 还原 默认的tp方法通过调用父类的方法
                return parent::render($e);
            }
            else
            {
                $this->code = 500;
                $this->msg = '服务器内部错误';
                $this->errorCode = 999;
                $this->recordErrorLog($e);
            }
        }
        $request = Request::instance();

        $result = [
            'msg' => $this->msg,
            'request_url' => $request->url(),
            'error_code' => $this->errorCode,
        ];
        return json($result,$this->code);
    }
    private function recordErrorLog(Exception $e)
    {

        Log::record($e->getMessage(),'error');
    }
}