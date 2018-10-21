<?php
/**
 * Created by PhpStorm.
 * User: 水主沉浮!
 * Date: 2018/10/13
 * Time: 21:54
 * Q  Q: 3401889728
 */

namespace Cplife;


use Alipay\AopClient;
use Alipay\Request\AlipayOpenAuthTokenAppRequest;
use Alipay\Request\AlipaySystemOauthTokenRequest;
use think\Request;

class Token extends Base
{

    //沙箱环境
    public function indexNomal()
    {
        $app_id = '2016091700536086';     //沙箱appid
        //$app_id = '2018081461050418';       //正式服务器
        //$redirect_uri = 'http://121.196.213.50/CompanyPro/smartcom/public/index.php/admin/Auth/index';
        $redirect_uri = 'https://www.smart.wuhdajun.top/index.php/Index/token/TestGetAlipayOopenAuthTokenApp';
        //第三步：应用授权URL拼装
        echo "第三步：应用授权URL拼装<br>";
        //沙箱测试
        //$url = "<a title='' href= 'https://openauth.alipaydev.com/oauth2/appToAppAuth.htm?app_id=";
        $url = "<a title='' target='_blank'  href= '";
        $url .= "https://openauth.alipaydev.com/oauth2/appToAppAuth.htm";       //沙箱
        //$url .= "https://openauth.alipay.com/oauth2/appToAppAuth.htm";      //正式环境
        
        $url .= "?app_id=";
        $url .= $app_id;
        $url .= "&redirect_uri=";
        $url .= $redirect_uri;
        $url .= "'>";
        $url .= "第三步：使用沙箱测试获取app_auth_code和app_id</a>";
        /*$url = "<a title='' href= 'https://openauth.alipaydev.com/oauth2/appToAppAuth.htm?app_id=2016091400507149&redirect_uri=http://121.196.213.50/smartcom/public/index.php/admin/Auth/index'>
     第三步：字符串拼接客服验证</a>";*/
        echo $url;
        echo "<br>";


    }


    /**使用app_auth_code换取授权访问令牌app_auth_token
     * @param $app_auth_code        //授权码，用户对应用授权后得到。
     * @param string $grant_type    //值为authorization_code时，代表用code换取；值为refresh_token时，代表用refresh_token换取
     */

    public function TestGetAlipayOopenAuthTokenApp(Request $request)
    {
        //echo "TestGetAlipayOopenAuthTokenApp";die;

        $input = $request->param();
        $this->show_bug($input);
        $app_auth_code = $input['app_auth_code'];

        $this->show_bug($app_auth_code);
        //调用getAlipayOopenAuthTokenApp()函数
        $aopVal = new getAopClientValue();
        $result = $this->getAlipayOopenAuthTokenApp($app_auth_code, $aopVal,'authorization_code');

    }

    public function getAlipayOopenAuthTokenApp($app_auth_code, $aopVal, $grant_type='authorization_code')
    {
        $aop = new AopClient ();
        //设置默认参数
        $aopObject = new SetAopClientValue($aop, $aopVal);
        $aopObject = NULL;  //清空new SetAopClientValue($aop)的$aop局部变量

        //初始化换取app_auth_token接口
        $request = new AlipayOpenAuthTokenAppRequest();

        //请求的必传信息
        $array = array(
            'grant_type'=>$grant_type,
            'code'=>$app_auth_code,
        );


        $request->setBizContent(json_encode($array));
        $result = $aop->execute ( $request );

        $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";

        //echo "<hr>";
        //$this->show_bug($result->sign);
        //$this->show_bug($result->$responseNode);die;

        $resultCode = $result->$responseNode->code;
        if(!empty($resultCode)&&$resultCode == 10000){
            //echo "成功";
            $this->show_bug($result);

            echo "123<hr>";
            //$res = $this->object_to_array($result);
            $res = $this->object_to_array($result);
            $this->show_bug($res);


        } else {
            //echo "失败";
            $this->show_bug($result);
        }
    }

    public function requestResponse($result, $request)
    {
        
    }

    public function TestGetAlipayOopenAuthTokenApp1_2(Request $request)
    {
        //echo "TestGetAlipayOopenAuthTokenApp";die;

        $input = $request->param();
        $this->show_bug($input);
        $app_auth_code = $input['app_auth_code'];

        $this->show_bug($app_auth_code);

        $aop = new AopClient ();
        //$aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
        $aop->gatewayUrl = 'https://openapi.alipaydev.com/gateway.do';    //沙箱网关
        $aop->appId = '2016091700536086';

        $aop->rsaPrivateKey = 'MIIEpAIBAAKCAQEAuTjPX1TlPJCs4dv6J71H6kynSgSY1ggmptLVwZRctafpBJoPrE0sMDNa2m5UMsqfpiHQoEr2M9wqXhGmC2TURH0IHs+mLoVeZdu8CCPMMbrCm/DRoXCEOarrrmPCPkM4Z7FSVB74Gi44l9PQkJo/0zlHwyFuLEMZpiQHNSEN+Y/gtNyqDdmq+1GRmGF4dQmXMoeo36yQORdSpHz0HHbuPFcz0wkJxcn805pu0DLt+8TUDfvnCc6IMZ1jCa/Rv2n2K7Txkb8bByBWGMiTbJLcDeHem8Qk3+7dfKSX5DGor864mP02B5MRlfGox+piSjhimEYUxJN6+1YGhh2ItWnXGQIDAQABAoIBAQCa950I9c6VzbXXgmTZutPghCGzHAWDjW5JRTzyqV6n3cRnxT43upmt+kmZV5W6qSzJoqEae51h5mLMMZfrEIFIjBOvM6ymX4+LST0Y0lqVgNwx/Fpn5+u5E/f8ABsUXMlkeEeZeg+6V9GhteZaFbQw1UvlRqMXBU0AZERjfzRiBz/nfnz4pSmFCRke5819rFIZCTrIMBPfCg7nOWhfmWOoFUboLKRkS9TNUY8QfZ1kB9v4ToJzvwIBEY598bdzht3fYnJeirmDrAhTgAlEyL2aasK5vGdVDf173SSPA/mraBv9HLQl0IKfNXpgEDbTmWUDrzZYqEp4WKod6VFXnfnBAoGBAPTZVOld8zZ2cUgMdS93ufc+RwHzb+NAnuUoDewXSplnTLLkp0mahF+ZEHOrkvNdJCiWwW4oc2USLtB18/MXmdk6bkPwL7UJIMHssJswTPywL67LsOoyeoiugszM2j8PvQxNdV3hVCVP5YCGkKeb/VLxXUZuDhscVCjWSJTlewOXAoGBAMGoSwAAC1joJDLzFKPzGxx0nErPWg0wgXnhY/o7slRgimV0AVPsTEt2kZ4OYSpYiJ24UZRI9ZeBpaESRraqgpEl3TE/3WxZaAeDOwT8nk6n1cH7QZ0NRVUh+LSy51IY7UJYQ4/TwRZU4An5vNM9SCsUszLZQQIxdmNLypKMG5DPAoGAEXCZd7XVaP+uue8JOcRRXqb079KjGZC0wKXFuBdAnQSalfNrZva2jwib/2EtKmBr/ugeBvaioYRWCUsdgSchMjPTPsuQ2lg4GRf+zE74bNcvzkd75nKJ/8pOTsAYm31HfeTWg0VVdQLn2eu7yfR2ar3+YtHb91phNDdvHAvsYykCgYEAmqAtgkqGxO5WOPguOtoZg5b4VCNL28wnFZIJqfuQYB7VYjxF8yRxpq99hZ4lpxIZwxUwzh2TOu2hugJFxARRTGPXQUOlIKYikh0OOuUZ4ePQoZpkwWmfOmJtmppeaQbOKnMfPu/s9E/AszZctq3vubZFfwxJA99Kj+4sSObl+7ECgYBqX16xcc48Q3V1boW90r1H7PsClFbgMDiRd/096XyWWW2myu0jAu18LQYc4XY2HX5Jt1SUvZtqapuLmM7tmHyrNj+PiMFVmJcltIJ7F7K9oAh3xE5SmzERLh8vrFtxMDnb34vKUhK95pNRaNJiUZwltenWzfeD0vmWPW6vVbOd5A==';
        //$aop->alipayrsaPublicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAuTjPX1TlPJCs4dv6J71H6kynSgSY1ggmptLVwZRctafpBJoPrE0sMDNa2m5UMsqfpiHQoEr2M9wqXhGmC2TURH0IHs+mLoVeZdu8CCPMMbrCm/DRoXCEOarrrmPCPkM4Z7FSVB74Gi44l9PQkJo/0zlHwyFuLEMZpiQHNSEN+Y/gtNyqDdmq+1GRmGF4dQmXMoeo36yQORdSpHz0HHbuPFcz0wkJxcn805pu0DLt+8TUDfvnCc6IMZ1jCa/Rv2n2K7Txkb8bByBWGMiTbJLcDeHem8Qk3+7dfKSX5DGor864mP02B5MRlfGox+piSjhimEYUxJN6+1YGhh2ItWnXGQIDAQAB';
        $aop->alipayrsaPublicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAvnEv0XMpLEc1XsQDyyLkWVo5v0TlJULsOW9xBWVrzyjJVKPgA3Iu7ELR6CX0qM7lcDY04mfB5KeSwtxm/zWvxo40klOZCKN7S/O5CROZ53aobdEliigsdSwElOD2l5JAXJaNieHBzROYdHfuCeSECRt5KMgiE6ML/WLELLyUVf+AbSmGHYiA9IVVQQbROs2EkOkPBZp9ptoq1XYlyXQ2TrSvDqclz/i6+Y9bnFt7IMmYxLs7HZVjfWo4LaM3Q9by0Fj3Zj3td5100vPfY/k/3D0rpfZOITcmIcZ/+qV//jP/X365dvCWAWKQjM/bvYhjHYfsSEyKMDxbpSrwsMgPuwIDAQAB';

        $aop->apiVersion = '1.0';
        $aop->signType = 'RSA2';
        $aop->postCharset='utf-8';
        $aop->format='json';


        //初始化换取app_auth_token接口
        $request = new AlipayOpenAuthTokenAppRequest();
        //请求的必传信息
        $array = array(
            'grant_type'=>'authorization_code',
            'code'=>$app_auth_code,
        );
        $request->setBizContent(json_encode($array));
        $result = $aop->execute ( $request );

        $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
        $resultCode = $result->$responseNode->code;
        if(!empty($resultCode)&&$resultCode == 10000){
            //echo "成功";
            $this->show_bug($result);
        } else {
            //echo "失败";
            $this->show_bug($result);
        }
    }
    
    public function TestGetAlipayOopenAuthTokenApp2(Request $request)
    {
        //echo "TestGetAlipayOopenAuthTokenApp";die;

        $input = $request->param();
        $this->show_bug($input);
        $app_auth_code = $input['app_auth_code'];

        $this->show_bug($app_auth_code);

        //die;

        $result = $this->getAlipayOopenAuthTokenApp($app_auth_code, $grant_type='authorization_code');
        $this->show_bug($result);

    }


    
    public function getAlipayOopenAuthTokenApp2_1($app_auth_code, $grant_type='authorization_code'){


        /* $arr = $this->getAopClientValue();   //调用对应参数
         $aop = new \AopClient ();
         $aop->gatewayUrl = $arr['gatewayUrl'];//沙箱网关
         $aop->appId = $arr['appId'];
         //沙箱应用私钥匙
         $aop->rsaPrivateKey =$arr['rsaPrivateKey'];
         //沙箱支付宝公钥
         $aop->alipayrsaPublicKey=$arr['alipayrsaPublicKey'];

         $aop->apiVersion = $arr['apiVersion'];
         $aop->signType = $arr['signType'];
         $aop->postCharset=$arr['postCharset'];
         $aop->format=$arr['format'];*/

        $aop = new AopClient();
        //$aop = new \AopClient ();

        //$aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';    //正式网关
        $aop->gatewayUrl = 'https://openapi.alipaydev.com/gateway.do';    //沙箱网关

        $aop->appId = '	2016091700536086';
        $aop->rsaPrivateKey = 'MIIEowIBAAKCAQEAv9rYZoTMIuPI/BL2cPJ7AHvLsXGCM7m5Kj/llQchKRLNP89iGBnRWdEu2+cKVE8B6BQQOcEcbrnOyDDUNhHla/eaJFy8LJ/PEyCyQ6JPxujmXHaUYGohMzred4E7TdrIy9R5OBdKyiucxUBQdR1A4mZDn+F0qSuoR7sJ9EAOucVYj6bo8sKyM47ovGbjLvP6yU87wwWSN4ai8/o++OBjmU6GT70TDT+1RHrY0fHTJ96+IgveGCwT5ON7t6fFrSsE/Mv7Jes8mo3gwWYUK/u7PwDJ+/N5VeJ6BgxEHc4GJNfgwCWBcN3NnICVCmO07vCRuv+K6Sjh3TsMdpgFV8stDQIDAQABAoIBAAtxfTjYMOjf10wZwXNJM0b7G1IxKAf3yvCXMRVrgHHXukBVGU/Asnj9/iKFrFsM/1sdXz5io1SDZq8QIog7FwkSkrIaierLeWl1qMxZ8RI3MA5R0FXT3rkUiNJt9eCV7SYjPTu4P/DBGy+0v1fM7+LRILV3mCLDBN2KbXSRIY+4+Dc2kw6n8TtM2ujBWhoFhhDry20+p3TOQrpkWwjCTEbw1b41DOtNSoS93DvQ3vxsZlto6/ZaHWm70v5S6PuzszeH4qBQU8re939HlYRhLij7ig9xhVwE8M53TMk9TKJtnKk/e0KDSEG6K/rqpGl6wQ3NFtForU+iiiHsc6Rfzk0CgYEA4ZuuzTYKpTGzSBRma//JNuYIj6Zkek6FrFa3ZwLHckbZaws/f48yKcdVvi9X5hjvQMhBkFbS7fNL+ioNPqFopzL7nT/k5i3h516MQCDQcPQ2df/oaS3aWHOdTEUMoQotdrQR8ipnP54cnb+YgmVoYz72BNTUlmd92St7sp7GRQ8CgYEA2bMl3joh0whmtuICPj/Csi0oZKjnQK4lmkvaCCeFQrXdIAuoqQP3SkI+pY94q4yV2S4XGVhtqXUUeok43KqokZNimG73mGziToHBvceJsPg6LpdIHNN285JLpw/1NKjT/pZhuKpMuMIL1fO3h2d3YZiEFI2Exo98gvbaNO+shCMCgYEApvkKDmcIyepWveobQ6Mz0KW/gFGt27dxx3MGmf68jh9Rmp/ghw/8GF+nXfK8I1gg+tk7bRBVXDbM7IFi/A+J3PUms+MuDg23O/4F3xBqNK8J/5s+71k4WG545JHWHvnhXBE5lvk7ISJsG3RJ83gKIine+wRpskc2JRzBmBlatJECgYBugXygcJvI1sPk45bF6HG5JikR55bzgzK9PvGfIAiKE2z6nlBv8v5tKHFKcyiK1CMgij/ZcsS/txm9FbjScqJ8uvbab8GpEuRRe5ZP8mDXfzlxewN09na0LzfNxtDueSCbY9SY+4FUa9O8OCmaRxAXb2bkU+3pKN7IT+v14Q+ORwKBgHI9lR/tjYnbEHS/ofcVyM20g/aUmAPShYAVKN8MtC18ObN4M/Vc6j0Onii1xdDCg0vv1dz1BjvFEIwcg4a67YeviERg/La+4TXNriukpfI/dFKsQXpnQeKfs7JnPpSzNpTLzHxOGCZdBQrMBE8lyYcBQX40nTsLwy0HtOpszkUW';
        $aop->alipayrsaPublicKey='MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAv9rYZoTMIuPI/BL2cPJ7AHvLsXGCM7m5Kj/llQchKRLNP89iGBnRWdEu2+cKVE8B6BQQOcEcbrnOyDDUNhHla/eaJFy8LJ/PEyCyQ6JPxujmXHaUYGohMzred4E7TdrIy9R5OBdKyiucxUBQdR1A4mZDn+F0qSuoR7sJ9EAOucVYj6bo8sKyM47ovGbjLvP6yU87wwWSN4ai8/o++OBjmU6GT70TDT+1RHrY0fHTJ96+IgveGCwT5ON7t6fFrSsE/Mv7Jes8mo3gwWYUK/u7PwDJ+/N5VeJ6BgxEHc4GJNfgwCWBcN3NnICVCmO07vCRuv+K6Sjh3TsMdpgFV8stDQIDAQAB';
        $aop->apiVersion = '1.0';
        $aop->signType = 'RSA2';
        $aop->postCharset='utf-8';
        $aop->format='json';



        //初始化换取app_auth_token接口
        $request = new AlipayOpenAuthTokenAppRequest();
        //请求的必传信息
        $array = array(
            'grant_type'=>$grant_type,
            'code'=>$app_auth_code,
        );
        $request->setBizContent(json_encode($array));

        $result = $aop->execute ( $request );


        $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";

        /* return array(
             'code'=>$result->$responseNode->code,
             'msg'=>$result->$responseNode->msg,
             'app_auth_token'=>$result->$responseNode->app_auth_token,
             'user_id'=>$result->$responseNode->user_id,
             'expires_in'=>$result->$responseNode->expires_in,
             're_expires_in'=>$result->$responseNode->re_expires_in,
             'grant_type'=>'authorization_code',
             'app_refresh_token'=>$result->$responseNode->app_refresh_token,
         );*/

        //return $result->$responseNode;
        //输出结果
        echo "code:".$result->$responseNode->code."</br>";
        echo "msg:".$result->$responseNode->msg."</br>";
        echo "商户授权令牌:".$result->$responseNode->app_auth_token."</br>";
        echo "授权商户的ID:".$result->$responseNode->user_id."</br>";
        echo "刷新令牌有效期:".$result->$responseNode->expires_in."</br>";
        echo "商户授权令牌:".$result->$responseNode->re_expires_in."</br>";
        echo "刷新令牌时使用:".$result->$responseNode->app_refresh_token."</br>";
    }






}