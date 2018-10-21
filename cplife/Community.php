<?php
/**
 * Created by PhpStorm.
 * User: 水主沉浮!
 * Date: 2018/10/13
 * Time: 21:52
 * Q  Q: 3401889728
 */
/**
 * 小区Community操作类
 */
namespace Cplife;

use Alipay\AopClient;
use Alipay\Request\AlipayEcoCplifeCommunityCreateRequest;
use Alipay\Request\AlipayEcoCplifeCommunityModifyRequest;
use Alipay\Request\AlipayEcoCplifeCommunityBatchqueryRequest;
use Alipay\Request\AlipayEcoCplifeCommunityDetailsQueryRequest;

/**物业小区信息
 * Class Community
 * @package
 */
class Community extends Base
{
    /**创建物业小区
     * @param $aopVal  传入参数      必填        参数配置对象
     * @param $data    传入参数      必填        小区配置信息二维数组
     * @param $app_auth_token    传入参数      选填        $app_auth_token
     * @return array    返回二维数组参数
     */
    public function communityCreate($aopVal, $data, $app_auth_token)
    {
        $request = new AlipayEcoCplifeCommunityCreateRequest ();
        $CommonCplife = new CommonCplife();
        $result = $CommonCplife->SendRequest($aopVal, $request, $data, $app_auth_token);
        return $result;
    }

    /**变更物业小区信息
     * @param $aopVal  传入参数      必填        参数配置对象
     * @param $data    传入参数      必填        小区配置信息二维数组
     * @param $app_auth_token    传入参数      选填        $app_auth_token
     * @return array    返回二维数组参数
     */
    public function communityModify($aopVal, $data, $app_auth_token)
    {
        $request = new AlipayEcoCplifeCommunityModifyRequest();
        $CommonCplife = new CommonCplife();
        $result = $CommonCplife->SendRequest($aopVal, $request, $data, $app_auth_token);
        return $result;
    }

    /**批量查询支付宝小区编号
     * @param $aopVal  传入参数      必填        参数配置对象
     * @param $data    传入参数      必填        小区配置信息二维数组
     * @param $app_auth_token    传入参数      选填        $app_auth_token
     * @return array    返回二维数组参数
     */
    public function communityBatchQuery($aopVal, $data, $app_auth_token)
    {
        $request = new AlipayEcoCplifeCommunityBatchqueryRequest();
        $CommonCplife = new CommonCplife();
        $result = $CommonCplife->SendRequest($aopVal, $request, $data, $app_auth_token);
        return $result;
    }

    /**查询单个物业小区信息
     * @param $aopVal  传入参数      必填        参数配置对象
     * @param $data    传入参数      必填        小区配置信息二维数组
     * @param $app_auth_token    传入参数      选填        $app_auth_token
     * @return array    返回二维数组参数
     */
    public function communityDetailsQuery($aopVal, $data, $app_auth_token)
    {
        $request = new AlipayEcoCplifeCommunityDetailsQueryRequest();
        $CommonCplife = new CommonCplife();
        $result = $CommonCplife->SendRequest($aopVal, $request, $data, $app_auth_token);
        return $result;
    }


    /**创建物业小区
     * @param $app_auth_token
     * @param array $data                   传入参数要创建的小区信息array()
     * @return array|\SimpleXMLElement[]    成功返回对应的请求数据(对象类型)，失败返回错误编码类型(一位数组格式)，包括错误编码和msg
     */
    public function communityCreate20181019($app_auth_token, $aopVal, $data=array())
    {
        $aop = new AopClient ();
        //设置默认参数
        $aopObject = new SetAopClientValue($aop, $aopVal);
        $aopObject = NULL;  //清空new SetAopClientValue($aop)的$aop局部变量


        //创建业务接口
        $request = new AlipayEcoCplifeCommunityCreateRequest();
        //$request = new AlipayEcoCplifeCommunityCreateRequest ();


        $request->setBizContent(json_encode($data));
        $result = $aop->execute ( $request, NULL, $app_auth_token );

        $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";

        $resultCode = $result->$responseNode->code;
        if(!empty($resultCode)&&$resultCode == 10000){      //操作成功
            //$this->show_bug($result);die;
            return $result;
          /*  return array(
                'msg'=>$result->$responseNode->msg,
                'code'=>$resultCode,
                'community_id'=>$result->$responseNode->community_id,       //社区物业平台中的小区统一编号。
                'status'=>$result->$responseNode->status,    //PENDING_ONLINE 待上线    ONLINE - 上线     MAINTAIN - 维护中  OFFLINE - 下线
                'next_action'=>$result->$responseNode->next_action,
            );*/



        } else {      //操作失败,拼接错误信息
            return $result;
            //$this->show_bug($result);die;
            $sub_msg = isset($result->$responseNode->sub_msg) ? $result->$responseNode->sub_msg : 0;
            $sub_code = isset($result->$responseNode->sub_code) ? $result->$responseNode->sub_code : 0;
          /*  return array(
                'code'=>$resultCode,
                'msg'=>$result->$responseNode->msg,
                'sub_msg'=>$sub_msg,
                'sub_code'=>$sub_code,
            );*/
        }
    }
}