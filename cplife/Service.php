<?php
/**
 * Created by PhpStorm.
 * User: 水主沉浮!
 * Date: 2018/10/19
 * Time: 19:49
 * Q  Q: 3401889728
 */

namespace Cplife;
/**
 * 初始服务BasicService操作类
 */

use Alipay\Request\AlipayEcoCplifeBasicserviceInitializeRequest;
use Alipay\Request\AlipayEcoCplifeBasicserviceModifyRequest;

class Service extends Base
{
    /**初始化小区物业基础服务
     * @param $aopVal  传入参数      必填        参数配置对象
     * @param $data    传入参数      必填        小区配置信息二维数组
     * @param $app_auth_token    传入参数      选填        $app_auth_token
     * @return array    返回二维数组参数
     */
    public function basicServiceInitialize($aopVal, $data, $app_auth_token)
    {
        $request = new AlipayEcoCplifeBasicserviceInitializeRequest();
        $CommonCplife = new CommonCplife();
        $result = $CommonCplife->SendRequest($aopVal, $request, $data, $app_auth_token);
        return $result;
    }


    /**修改小区物业基础服务信息
     * @param $aopVal  传入参数      必填        参数配置对象
     * @param $data    传入参数      必填        小区配置信息二维数组
     * @param $app_auth_token    传入参数      选填        $app_auth_token
     * @return array    返回二维数组参数
     */
    public function basicServiceModify($aopVal, $data, $app_auth_token)
    {
        $request = new AlipayEcoCplifeBasicserviceModifyRequest();
        $CommonCplife = new CommonCplife();
        $result = $CommonCplife->SendRequest($aopVal, $request, $data, $app_auth_token);
        return $result;
    }



}