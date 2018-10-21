<?php
/**
 * Created by PhpStorm.
 * User: 水主沉浮!
 * Date: 2018/10/19
 * Time: 7:13
 * Q  Q: 3401889728
 */

namespace Cplife;

use Alipay\AopClient;

/**物业缴费请求基类
 * Class CommonCplife
 * @package Cplife
 */
class CommonCplife extends Base
{
    public function __construct()
    {
        parent::__construct();
    }

    public function SendRequest($aopVal, $request, $data=array(),$app_auth_token)
    {
        $aop = new AopClient ();
        //设置默认参数
        $aopObject = new SetAopClientValue($aop, $aopVal);
        $aopObject = NULL;  //清空new SetAopClientValue($aop)的$aop局部变量

        //发送请求
        $request->setBizContent(json_encode($data));

        //通过判断$app_auth_token是否为空来判断是第三方应用还是自研型应用
        if (!empty($app_auth_token)){   //第三方应用
            $result = $aop->execute ( $request, NULL, $app_auth_token );
        }else{  //自研型应用
            $result = $aop->execute ( $request );
        }

        //将对象转化成数组
        $res = $this->switchReturnToArray($result,$request);
        return $res;
    }

    /**
     * @param $result   必填传入参数  接口返回结果
     * @param $request  必填传入参数  对应对象
     * @return array    返回数组
     */
    public function switchReturnToArray($result,$request)
    {
        $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
        $res = $this->object_to_array($result->$responseNode);
        $res['sign'] = $result->sign;
        return $res;
    }

}