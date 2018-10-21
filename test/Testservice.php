<?php
/**
 * Created by PhpStorm.
 * User: 水主沉浮!
 * Date: 2018/10/19
 * Time: 19:53
 * Q  Q: 3401889728
 */

class Testservice extends Base
{
    /**
     * 初始化小区物业基础服务
     */
    public function TestBasicServiceInitialize()
    {
        $community_id = 'AMLJJVEZH4201';
        $service_type='PROPERTY_PAY_BILL_MODE';
        $external_invoke_address='https://www.smart.wuhdajun.top/index.php/Index/TestBasicServiceInitialize';
        $data  = array(
            'community_id'=>$community_id,    //支付宝社区小区统一编号，必须在物业账号名下存在。
            //service_type基础服务类型，目前支持的类型值为：PROPERTY_PAY_BILL_MODE - 物业缴费账单上传模式
            'service_type'=>$service_type,
            //external_invoke_address由开发者系统提供的，支付宝根据基础服务类型在特定业务环节调用的外部系统服务地址，
            //开发者需要确保外部地址的准确性。在线上环境需要使用HTTPS协议，会检查ssl证书，要求证书为正规的证书机构签发，不支持自签名证书。
            //对于PROPERTY_PAY_BILL_MODE服务类型，该地址表示用户缴费支付完成后开发者系统接受支付结果通知的回调地址。
            // 	若服务类型为物业缴费账单模式，每个小区默认的收款账号为授权物业的支付宝账号，默认不用传该参数。
            'external_invoke_address'=>$external_invoke_address,
            // 'account_type'=>$account_type,
            // 'account'=>$account,
            // 'service_expires'=>$service_expires,   //若本服务有预期的过期时间（如在物业服务合同中约定），开发者按标准时间格式：yyyy-MM-dd HH:mm:ss传入。
        );

        $app_auth_token = '201810BBb7dfdaa1d0de47eab10c661ce05eaX03';
        $aopVal = new getAopClientValue();

        $service = new Service();
        $result = $service->communityBatchQuery($aopVal, $data, $app_auth_token);
        $this->show_bug($result);
    }

    /**
     * 修改小区物业基础服务信息
     */
    public function TestBasicServiceModify()
    {
        $community_id = 'AMLJJVEZH4201';
        $service_type='PROPERTY_PAY_BILL_MODE';
        $external_invoke_address='https://www.smart.wuhdajun.top/index.php/Index/TestBasicServiceInitialize';
        $data  = array(
            'community_id'=>$community_id,    //支付宝社区小区统一编号，必须在物业账号名下存在。
            //service_type基础服务类型，目前支持的类型值为：PROPERTY_PAY_BILL_MODE - 物业缴费账单上传模式
            'service_type'=>$service_type,
            //external_invoke_address由开发者系统提供的，支付宝根据基础服务类型在特定业务环节调用的外部系统服务地址，
            //开发者需要确保外部地址的准确性。在线上环境需要使用HTTPS协议，会检查ssl证书，要求证书为正规的证书机构签发，不支持自签名证书。
            //对于PROPERTY_PAY_BILL_MODE服务类型，该地址表示用户缴费支付完成后开发者系统接受支付结果通知的回调地址。
            // 	若服务类型为物业缴费账单模式，每个小区默认的收款账号为授权物业的支付宝账号，默认不用传该参数。
            'external_invoke_address'=>$external_invoke_address,
            // 'account_type'=>$account_type,
            // 'account'=>$account,
            // 'service_expires'=>$service_expires,   //若本服务有预期的过期时间（如在物业服务合同中约定），开发者按标准时间格式：yyyy-MM-dd HH:mm:ss传入。
        );

        $app_auth_token = '201810BBb7dfdaa1d0de47eab10c661ce05eaX03';
        $aopVal = new getAopClientValue();

        $service = new Service();
        $result = $service->communityBatchQuery($aopVal, $data, $app_auth_token);
        $this->show_bug($result);
    }
}

