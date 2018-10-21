<?php
/**
 * Created by PhpStorm.
 * User: 水主沉浮!
 * Date: 2018/10/19
 * Time: 20:06
 * Q  Q: 3401889728
 */

namespace Cplife;

use Alipay\Request\AlipayEcoCplifeRoominfoUploadRequest;
use Alipay\Request\AlipayEcoCplifeRoominfoDeleteRequest;
use Alipay\Request\AlipayEcoCplifeRoominfoQueryRequest;

/**物业小区内部房屋信息
 * Class Roominfo
 * @package
 */
class Roominfo
{
    /**上传物业小区内部房屋信息
     * @param $aopVal  传入参数      必填        参数配置对象
     * @param $data    传入参数      必填        小区配置信息二维数组
     * @param $app_auth_token    传入参数      选填        $app_auth_token
     * @return array    返回二维数组参数
     */
    public function roomInfoUpload($aopVal, $data, $app_auth_token)
    {
        $request = new AlipayEcoCplifeRoominfoUploadRequest();
        $CommonCplife = new CommonCplife();
        $result = $CommonCplife->SendRequest($aopVal, $request, $data, $app_auth_token);
        return $result;
    }

    /**删除物业小区房屋信息
     * @param $aopVal  传入参数      必填        参数配置对象
     * @param $data    传入参数      必填        小区配置信息二维数组
     * @param $app_auth_token    传入参数      选填        $app_auth_token
     * @return array    返回二维数组参数
     */
    public function roomInfoDelete($aopVal, $data, $app_auth_token)
    {
        $request = new AlipayEcoCplifeRoominfoDeleteRequest();
        $CommonCplife = new CommonCplife();
        $result = $CommonCplife->SendRequest($aopVal, $request, $data, $app_auth_token);
        return $result;
    }

    /**查询小区房屋信息列表
     * @param $aopVal  传入参数      必填        参数配置对象
     * @param $data    传入参数      必填        小区配置信息二维数组
     * @param $app_auth_token    传入参数      选填        $app_auth_token
     * @return array    返回二维数组参数
     */
    public function roomInfoQuery($aopVal, $data, $app_auth_token)
    {
        $request = new AlipayEcoCplifeRoominfoQueryRequest();
        $CommonCplife = new CommonCplife();
        $result = $CommonCplife->SendRequest($aopVal, $request, $data, $app_auth_token);
        return $result;
    }

}