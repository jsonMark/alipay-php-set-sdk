<?php
/**
 * Created by PhpStorm.
 * User: 水主沉浮!
 * Date: 2018/10/13
 * Time: 21:51
 * Q  Q: 3401889728
 */

namespace Cplife;

class Base
{
    public function __construct()
    {
        parent::__construct();
    }

    /**错误调试函数
     * @param $msg
     */
    function show_bug($msg){
        echo"<pre style='color:red'>";
        var_dump($msg);
        echo "</pre>";
    }

    /**
     * 数组 转 对象
     * @param array $arr 数组
     * @return object
     */
    function array_to_object($arr) {
        if (gettype($arr) != 'array') {
            return;
        }
        foreach ($arr as $k => $v) {
            if (gettype($v) == 'array' || getType($v) == 'object') {
                $arr[$k] = $this->array_to_object($v);
            }
        }
        return (object)$arr;
    }


    /**
     * 对象 转 数组
     * @param object $obj 对象
     * @return array
     */
    function object_to_array($obj) {
        $obj = (array)$obj;
        foreach ($obj as $k => $v) {
            if (gettype($v) == 'resource') {
                return;
            }
            if (gettype($v) == 'object' || gettype($v) == 'array') {
                $obj[$k] = $this->object_to_array($v);
            }
        }
        return $obj;
    }


}