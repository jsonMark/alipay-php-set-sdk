<?php
/**
 * Created by PhpStorm.
 * User: 水主沉浮!
 * Date: 2018/10/19
 * Time: 7:48
 * Q  Q: 3401889728
 */

namespace app\index\controller;

class Test extends Base
{
    /**
     *测试创建物业小区
     */
    public function TestCommunityCreate()
    {
        $data  = array(
            'community_name'=>'武昌站',    //community_id = AMLJJVEZH4201
            'community_address'=>'武昌区中山路574号',
            'district_code'=>'420106',      //武昌区
            'city_code'=>'420100',          //武汉市
            'province_code'=>'420000',      //湖北省
            'community_locations'=>['114.317662|30.528563'],
            'associated_pois'=>['B02F37VVFP','B0FFFQB4Y4'],
            'hotline'=>'027-87817508',
            'out_community_id'=>'1',
        );
        $app_auth_token = '201810BBb7dfdaa1d0de47eab10c661ce05eaX03';
        $aopVal = new getAopClientValue();

        $community = new Community();
        $result = $community->communityCreate($aopVal, $data, $app_auth_token);
        $this->show_bug($result);
    }
    /**
     *变更物业小区信息
     */
    public function TestCommunityModify()
    {
     /*   $data  = array(
            'community_name'=>'武昌站',    //community_id = AMLJJVEZH4201
            'community_address'=>'武昌区中山路574号',
            'district_code'=>'420106',      //武昌区
            'city_code'=>'420100',          //武汉市
            'province_code'=>'420000',      //湖北省
            'community_locations'=>['114.317662|30.528563'],
            'associated_pois'=>['B02F37VVFP','B0FFFQB4Y4'],
            'hotline'=>'027-87817508',
            'out_community_id'=>'1',
        );*/

        $data  = array(
            'community_id'=>'AMLJJVEZH4201',        //支付宝社区小区统一编号，必须在物业账号名下存在
            'community_name'=>'武昌站22',            //小区名称，最长不超过32个字符。
            'community_address'=>'武昌区中山路574号',      //小区主要详细地址，不需要包含省市区名称。
            'district_code'=>'420106',              //区县编码，国标码，详见国家统计局数据 点此下载。
            'city_code'=>'420100',                  //地级市编码，国标码，详见国家统计局数据 点此下载。
            'province_code'=>'420000',              //省份编码，国标码，详见国家统计局数据 点此下载。
            //小区所在的经纬度列表（注：需要是高德坐标系），每对经纬度用"|"分隔，经度在前，纬度在后，经纬度小数点后不超过6位。
            //注：若新建的小区覆盖多个片区，最多包含5组经纬度，其中第一组作为主经纬度。
            'community_locations'=>['114.317662|30.528563'],
            //associated_pois若开发者录入的物业小区需要精确对应地图上多个小区（比如物业系统中的小区包含类似一期二期、或东区西区的组团结构），
            //以便后续线上推广时覆盖到对应小区的住户，可以指定关联的高德地图中住宅、住宿或地名地址等小区相关类型的POI（地图兴趣点）ID列表。
            //若传入该参数且参数值合法，则该参数的优先级高于传入的地理位置经纬度。
            'associated_pois'=>['B02F37VVFP','B0FFFQB4Y4'],
            'hotline'=>'0571-87654321',     //需要提供物业服务热线或联系电话，便于用户在需要时联系物业。
            'out_community_id'=>'1',    //小区在物业系统中的唯一编号。
        );

        $app_auth_token = '201810BBb7dfdaa1d0de47eab10c661ce05eaX03';
        $aopVal = new getAopClientValue();

        $community = new Community();
        $result = $community->communityModify($aopVal, $data, $app_auth_token);
        $this->show_bug($result);
    }

    /**
     * 批量查询支付宝小区编号
     */
    public function TestCommunityBatchQuery()
    {
        $page_num=1;
        $page_size=200;
        $data  = array(
            //status如传入该参数，则返回指定状态的小区，支持的状态值：PENDING_ONLINE 待上线 ONLINE - 上线 MAINTAIN - 维护中OFFLINE - 下线//不传该值则默认返回所有状态的小区。
            //'status'=>$status,
            //page_num分页查询的当前页码数，分页从1开始计数。该参数不传入的时候，默认为1。
            'page_num'=>$page_num,
            //page_size分页查询的每页最大数据条数，取值范围1-500。不传该参数默认为200。
            'page_size'=>$page_size,
        );
        $app_auth_token = '201810BBb7dfdaa1d0de47eab10c661ce05eaX03';
        $aopVal = new getAopClientValue();

        $community = new Community();
        $result = $community->communityBatchQuery($aopVal, $data, $app_auth_token);
        $this->show_bug($result);
    }
    /**
     * 查询单个物业小区信息
     */
    public function TestCommunityDetailsQuery()
    {
        $community_id = 'AMLJJVEZH4201';
        $data  = array(
            'community_id'=>$community_id,    //支付宝社区小区统一编号，必须在物业账号名下存在。
        );
        $app_auth_token = '201810BBb7dfdaa1d0de47eab10c661ce05eaX03';
        $aopVal = new getAopClientValue();

        $community = new Community();
        $result = $community->communityBatchQuery($aopVal, $data, $app_auth_token);
        $this->show_bug($result);
    }

    public function TestCommunityCreate20181019()
    {
        //echo "TestCommunityCreate";die;
        //$data = array();
        $data  = array(
            //'community_name'=>'太阳系我们火星人来了哈',
            'community_name'=>'武昌站社区',
            'community_address'=>'武昌区中山路574号',
            'district_code'=>'420106',      //硚口区
            'city_code'=>'420100',          //武汉市
            'province_code'=>'420000',      //湖北省
            //114.347425,30.504415
            //'community_locations'=>['114.347425|30.504415'],    //星光时代
            'community_locations'=>['114.317662|30.528563'],
            //114.289679,30.626387
            //'associated_pois'=>['B02F37VVFP','B0FFFQB4Y4'],
            'hotline'=>'027-87817508',
            'out_community_id'=>'1',
        );
        $app_auth_token = '201810BBb7dfdaa1d0de47eab10c661ce05eaX03';
        $aopVal = new getAopClientValue();
        $requestObj = 'AlipayEcoCplifeCommunityCreateRequest';


        $request = new AlipayEcoCplifeCommunityCreateRequest ();

        $CommonCplife = new CommonCplife();
        $result = $CommonCplife->SendRequest($aopVal, $request, $data, $app_auth_token);
        //$result = CommonCplife::SendRequest($aopVal, $request, $data, $app_auth_token);
        $this->show_bug($result);
    }
}