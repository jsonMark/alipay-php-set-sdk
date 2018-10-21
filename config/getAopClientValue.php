<?php
/**
 * Created by PhpStorm.
 * User: 水主沉浮!
 * Date: 2018/10/17
 * Time: 18:25
 * Q  Q: 3401889728
 */

namespace Cplife;


class getAopClientValue extends Base
{
    //应用id
    public $appId = '2016091700536086';
    //支付宝私钥
    public $rsaPrivateKey = 'MIIEpAIBAAKCAQEAuTjPX1TlPJCs4dv6J71H6kynSgSY1ggmptLVwZRctafpBJoPrE0sMDNa2m5UMsqfpiHQoEr2M9wqXhGmC2TURH0IHs+mLoVeZdu8CCPMMbrCm/DRoXCEOarrrmPCPkM4Z7FSVB74Gi44l9PQkJo/0zlHwyFuLEMZpiQHNSEN+Y/gtNyqDdmq+1GRmGF4dQmXMoeo36yQORdSpHz0HHbuPFcz0wkJxcn805pu0DLt+8TUDfvnCc6IMZ1jCa/Rv2n2K7Txkb8bByBWGMiTbJLcDeHem8Qk3+7dfKSX5DGor864mP02B5MRlfGox+piSjhimEYUxJN6+1YGhh2ItWnXGQIDAQABAoIBAQCa950I9c6VzbXXgmTZutPghCGzHAWDjW5JRTzyqV6n3cRnxT43upmt+kmZV5W6qSzJoqEae51h5mLMMZfrEIFIjBOvM6ymX4+LST0Y0lqVgNwx/Fpn5+u5E/f8ABsUXMlkeEeZeg+6V9GhteZaFbQw1UvlRqMXBU0AZERjfzRiBz/nfnz4pSmFCRke5819rFIZCTrIMBPfCg7nOWhfmWOoFUboLKRkS9TNUY8QfZ1kB9v4ToJzvwIBEY598bdzht3fYnJeirmDrAhTgAlEyL2aasK5vGdVDf173SSPA/mraBv9HLQl0IKfNXpgEDbTmWUDrzZYqEp4WKod6VFXnfnBAoGBAPTZVOld8zZ2cUgMdS93ufc+RwHzb+NAnuUoDewXSplnTLLkp0mahF+ZEHOrkvNdJCiWwW4oc2USLtB18/MXmdk6bkPwL7UJIMHssJswTPywL67LsOoyeoiugszM2j8PvQxNdV3hVCVP5YCGkKeb/VLxXUZuDhscVCjWSJTlewOXAoGBAMGoSwAAC1joJDLzFKPzGxx0nErPWg0wgXnhY/o7slRgimV0AVPsTEt2kZ4OYSpYiJ24UZRI9ZeBpaESRraqgpEl3TE/3WxZaAeDOwT8nk6n1cH7QZ0NRVUh+LSy51IY7UJYQ4/TwRZU4An5vNM9SCsUszLZQQIxdmNLypKMG5DPAoGAEXCZd7XVaP+uue8JOcRRXqb079KjGZC0wKXFuBdAnQSalfNrZva2jwib/2EtKmBr/ugeBvaioYRWCUsdgSchMjPTPsuQ2lg4GRf+zE74bNcvzkd75nKJ/8pOTsAYm31HfeTWg0VVdQLn2eu7yfR2ar3+YtHb91phNDdvHAvsYykCgYEAmqAtgkqGxO5WOPguOtoZg5b4VCNL28wnFZIJqfuQYB7VYjxF8yRxpq99hZ4lpxIZwxUwzh2TOu2hugJFxARRTGPXQUOlIKYikh0OOuUZ4ePQoZpkwWmfOmJtmppeaQbOKnMfPu/s9E/AszZctq3vubZFfwxJA99Kj+4sSObl+7ECgYBqX16xcc48Q3V1boW90r1H7PsClFbgMDiRd/096XyWWW2myu0jAu18LQYc4XY2HX5Jt1SUvZtqapuLmM7tmHyrNj+PiMFVmJcltIJ7F7K9oAh3xE5SmzERLh8vrFtxMDnb34vKUhK95pNRaNJiUZwltenWzfeD0vmWPW6vVbOd5A==';
    //支付宝公钥，通过【应用公钥】获取【支付宝公钥】
    public $alipayrsaPublicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAvnEv0XMpLEc1XsQDyyLkWVo5v0TlJULsOW9xBWVrzyjJVKPgA3Iu7ELR6CX0qM7lcDY04mfB5KeSwtxm/zWvxo40klOZCKN7S/O5CROZ53aobdEliigsdSwElOD2l5JAXJaNieHBzROYdHfuCeSECRt5KMgiE6ML/WLELLyUVf+AbSmGHYiA9IVVQQbROs2EkOkPBZp9ptoq1XYlyXQ2TrSvDqclz/i6+Y9bnFt7IMmYxLs7HZVjfWo4LaM3Q9by0Fj3Zj3td5100vPfY/k/3D0rpfZOITcmIcZ/+qV//jP/X365dvCWAWKQjM/bvYhjHYfsSEyKMDxbpSrwsMgPuwIDAQAB';

    public $gatewayUrl = 'https://openapi.alipaydev.com/gateway.do';    //沙箱网关
    //public $gatewayUrl = 'https://openapi.alipay.com/gateway.do';    //正式网关

    public $apiVersion = '1.0';
    public $signType = 'RSA2';
    public $postCharset='utf-8';
    public $format='json';


    public function __construct($appId='',$rsaPrivateKey='',$alipayrsaPublicKey='',$gatewayUrl='',$signType='',$format='', $postCharset='',$apiVersion='')
    {
        if (!empty($appId)){
            $this->appId = $appId;
        }
        if (!empty($gatewayUrl)){
            $this->gatewayUrl = $gatewayUrl;
        }
        if (!empty($rsaPrivateKey)){
            $this->rsaPrivateKey = $rsaPrivateKey;
        }
        if (!empty($alipayrsaPublicKey)){
            $this->alipayrsaPublicKey = $alipayrsaPublicKey;
        }
        if (!empty($signType)){
            $this->signType = $signType;
        }
        if (!empty($format)){
            $this->format = $format;
        }
        if (!empty($postCharset)){
            $this->postCharset = $postCharset;
        }
        if (!empty($apiVersion)){
            $this->apiVersion = $apiVersion;
        }
    }
}