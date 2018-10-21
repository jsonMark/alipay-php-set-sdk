<?php
/**
 * Created by PhpStorm.
 * User: 水主沉浮!
 * Date: 2018/10/21
 * Time: 13:19
 * Q  Q: 3401889728
 */

namespace app\demo\controller;


class Base
{
    function show_bug($msg){
        echo"<pre style='color:red'>";
        var_dump($msg);
        echo "</pre>";
    }
}