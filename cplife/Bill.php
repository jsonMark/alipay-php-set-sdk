<?php
/**
 * Created by PhpStorm.
 * User: 水主沉浮!
 * Date: 2018/10/19
 * Time: 20:31
 * Q  Q: 3401889728
 */

namespace app\index\controller;

use Alipay\Request\AlipayEcoCplifeBillBatchUploadRequest;
use Alipay\Request\AlipayEcoCplifeBillModifyRequest;
use Alipay\Request\AlipayEcoCplifeBillDeleteRequest;
use Alipay\Request\AlipayEcoCplifeBillBatchqueryRequest;

/**物业费账单
 * Class Bill
 * @package
 */

class Bill extends Base
{
    /**批量上传待缴物业费账单
     * @param $aopVal  传入参数      必填        参数配置对象
     * @param $data    传入参数      必填        小区配置信息二维数组
     * @param $app_auth_token    传入参数      选填        $app_auth_token
     * @return array    返回二维数组参数
     */
    public function billBatchUpload($aopVal, $data, $app_auth_token)
    {
        $request = new AlipayEcoCplifeBillBatchUploadRequest();
        $CommonCplife = new CommonCplife();
        $result = $CommonCplife->SendRequest($aopVal, $request, $data, $app_auth_token);
        return $result;
    }

    /**修改已上传的物业费账单数据
     * @param $aopVal  传入参数      必填        参数配置对象
     * @param $data    传入参数      必填        小区配置信息二维数组
     * @param $app_auth_token    传入参数      选填        $app_auth_token
     * @return array    返回二维数组参数
     */
    public function billModify($aopVal, $data, $app_auth_token)
    {
        $request = new AlipayEcoCplifeBillModifyRequest();
        $CommonCplife = new CommonCplife();
        $result = $CommonCplife->SendRequest($aopVal, $request, $data, $app_auth_token);
        return $result;
    }

    /**删除已上传的物业费账单数据
     * @param $aopVal  传入参数      必填        参数配置对象
     * @param $data    传入参数      必填        小区配置信息二维数组
     * @param $app_auth_token    传入参数      选填        $app_auth_token
     * @return array    返回二维数组参数
     */
    public function billDelete($aopVal, $data, $app_auth_token)
    {
        $request = new AlipayEcoCplifeBillDeleteRequest();
        $CommonCplife = new CommonCplife();
        $result = $CommonCplife->SendRequest($aopVal, $request, $data, $app_auth_token);
        return $result;
    }

    /**物业费账单数据批量查询
     * @param $aopVal  传入参数      必填        参数配置对象
     * @param $data    传入参数      必填        小区配置信息二维数组
     * @param $app_auth_token    传入参数      选填        $app_auth_token
     * @return array    返回二维数组参数
     */
    public function billBatchQuery($aopVal, $data, $app_auth_token)
    {
        $request = new AlipayEcoCplifeBillBatchqueryRequest();
        $CommonCplife = new CommonCplife();
        $result = $CommonCplife->SendRequest($aopVal, $request, $data, $app_auth_token);
        return $result;
    }

}