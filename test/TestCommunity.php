<?php
/**
 * Created by PhpStorm.
 * User: 水主沉浮!
 * Date: 2018/10/18
 * Time: 9:36
 * Q  Q: 3401889728
 */

namespace app\index\controller;


class TestCommunity extends Base
{
    public function TestCommunityCreate()
    {
        echo "TestCommunityCreate";die;
        //$data = array();
        $data  = array(
            //'community_name'=>'太阳系我们火星人来了哈',
            'community_name'=>'鸿玺公馆',
            'community_address'=>'硚口金桥怡景苑',
            'district_code'=>'420106',      //硚口区
            'city_code'=>'420100',          //武汉市
            'province_code'=>'420000',      //湖北省
            //114.347425,30.504415
            //'community_locations'=>['114.347425|30.504415'],    //星光时代
            'community_locations'=>['114.326189|30.550896'],
            //114.289679,30.626387
            'associated_pois'=>['B02F37VVFP','B0FFFQB4Y4'],
            'hotline'=>'027-87817508',
            'out_community_id'=>'1',
        );
        $app_auth_token = '201810BBb7dfdaa1d0de47eab10c661ce05eaX03';
        $aopVal = new getAopClientValue();
        $requestObj = 'AlipayEcoCplifeCommunityCreateRequest';
        $result = CommonCplife::SendRequest($app_auth_token, $aopVal,$requestObj, $data);
        $this->show_bug($result);
    }
    public function TestCommunityCreate2()
    {
        $app_auth_token = '';

        //show_bug($houseOne);die;
        /*$data  = array(
            //'community_name'=>'太阳系我们火星人来了哈',
            'community_name'=>$houseOne['house_name'],
            'community_address'=>$houseOne['community_address'],
            'district_code'=>$houseOne['district_code'],      //硚口区
            'city_code'=>$houseOne['city_code'],          //武汉市
            'province_code'=>$houseOne['province_code'],      //湖北省
            //114.347425,30.504415
            //'community_locations'=>['114.347425|30.504415'],    //星光时代
            'community_locations'=>[$houseOne['community_locations']],
            'associated_pois'=>['B02F37VVFP','B0FFFQB4Y4'],
            'hotline'=>$houseOne['hotline'],
            'out_community_id'=>$houseOne['house_id'],
        );*/
        $data  = array(
             //'community_name'=>'太阳系我们火星人来了哈',
             'community_name'=>'鸿玺公馆',
             'community_address'=>'硚口金桥怡景苑',
             'district_code'=>'420106',      //硚口区
             'city_code'=>'420100',          //武汉市
             'province_code'=>'420000',      //湖北省
             //114.347425,30.504415
             //'community_locations'=>['114.347425|30.504415'],    //星光时代
             'community_locations'=>['114.326189|30.550896'],
             //114.289679,30.626387
             'associated_pois'=>['B02F37VVFP','B0FFFQB4Y4'],
             'hotline'=>'027-87817508',
             'out_community_id'=>'1',
         );
        $result =$this->communityCreate($app_auth_token,$data);
        show_bug($result);die;
    }
}