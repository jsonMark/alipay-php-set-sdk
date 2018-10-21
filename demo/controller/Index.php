<?php
namespace app\demo\controller;

class Index
{
    public function index()
    {
        echo "jsonmark/alipay-php-set-sdk 测试demo代码";
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
