<?php
/**
 * Created by PhpStorm.
 * User: 水主沉浮!
 * Date: 2018/10/19
 * Time: 20:52
 * Q  Q: 3401889728
 */

namespace Cplife;

use Alipay\Request\AlipayEcoCplifePayResultQueryRequest;

/**费交易关联账单详情
 * Class Pay
 * @package
 */
class Pay extends Base
{
    /**查询单笔物业费交易关联账单详情
     * @param $aopVal  传入参数      必填        参数配置对象
     * @param $data    传入参数      必填        小区配置信息二维数组
     * @param $app_auth_token    传入参数      选填        $app_auth_token
     * @return array    返回二维数组参数
     */
    public function payResultQuery($aopVal, $data, $app_auth_token)
    {
        $request = new AlipayEcoCplifePayResultQueryRequest();
        $CommonCplife = new CommonCplife();
        $result = $CommonCplife->SendRequest($aopVal, $request, $data, $app_auth_token);
        return $result;
    }
}