<?php
/**
 * Created by PhpStorm.
 * User: 水主沉浮!
 * Date: 2018/10/19
 * Time: 20:08
 * Q  Q: 3401889728
 */

namespace app\index\controller;

use Cplife\getAopClientValue;
use Cplife\Roominfo;

class Testroominfo extends Base
{
    /**
     * 上传物业小区内部房屋信息
     */
    public function TestRoomInfoUpload()
    {
        $data  = array(
            'batch_id'=>'20160427110001006778440720',        //请求批次号，由商户自定义，在商户系统内唯一标示一次业务请求。
            'community_id'=>'AMLJJVEZH4201',                //业主所在物业小区ID(支付宝平台唯一小区ID标示)
            'room_info_set'=>[
                array(
                    'out_room_id'=>'26',                   //商户系统小区房屋唯一ID标示.
                    'group'=>'三期',                          //房屋所在的组团名称。例如“一期”，“东区”，“香桂苑”等
                    'building'=>'2栋',                       //房屋所在楼栋名称。例如“1栋”，“1幢”等
                    'unit'=>'二单元',                        //房屋所在单元名称。例如“一单元”，“二单元”等
                    'room'=>'1108室',                           //房屋所在房号。例如“1101室”，“11B室”等
                    'address'=>'三期2栋2单元1108室',          //房间的完整门牌地址
                ),
                array(
                    'out_room_id'=>'27',                   //商户系统小区房屋唯一ID标示.
                    'group'=>'三期',                          //房屋所在的组团名称。例如“一期”，“东区”，“香桂苑”等
                    'building'=>'2栋',                       //房屋所在楼栋名称。例如“1栋”，“1幢”等
                    'unit'=>'二单元',                        //房屋所在单元名称。例如“一单元”，“二单元”等
                    'room'=>'1109室',                           //房屋所在房号。例如“1101室”，“11B室”等
                    'address'=>'三期2栋2单元1109室',          //房间的完整门牌地址
                ),
            ]
        );


       /* foreach ($result as $key=>$value){
            $data[] =array(
                'out_room_id'=>$value['out_room_id'],                   //商户系统小区房屋唯一ID标示.
                //'group'=>$value['group'],                          //房屋所在的组团名称。例如“一期”，“东区”，“香桂苑”等
                'building'=>$value['building'],                       //房屋所在楼栋名称。例如“1栋”，“1幢”等
                'unit'=>$value['unit'],                        //房屋所在单元名称。例如“一单元”，“二单元”等
                'room'=>$value['room'],                           //房屋所在房号。例如“1101室”，“11B室”等
                'address'=>$value['address'],          //房间的完整门牌地址
            );
        }*/

        $app_auth_token = '201810BBb7dfdaa1d0de47eab10c661ce05eaX03';
        $aopVal = new getAopClientValue();

        $roominfo = new Roominfo();
        $result = $roominfo->roomInfoUpload($aopVal, $data, $app_auth_token);
        $this->show_bug($result);
    }

    /**
     * 删除物业小区房屋信息
     */
    public function TestRoomInfoDelete()
    {
        $community_id = 'AMLJJVEZH4201';
        $batch_id = '201604271100010067784407100';
        $array = array('28', '29');
        $data  = array(
            'batch_id'=>$batch_id,        //请求批次号，由商户自定义，在商户系统内唯一标示一次业务请求。
            'community_id'=>$community_id,                //业主所在物业小区ID(支付宝平台唯一小区ID标示)
            //就是out_room_id待删除的商户房间列表，一次API调用至多传入200条待删除的房间ID(房间在商户系统的唯一ID标识)
            'out_room_id_set'=>$array,
        );

        $app_auth_token = '201810BBb7dfdaa1d0de47eab10c661ce05eaX03';
        $aopVal = new getAopClientValue();

        $roominfo = new Roominfo();
        $result = $roominfo->roomInfoDelete($aopVal, $data, $app_auth_token);
        $this->show_bug($result);
    }


    /**
     * 查询小区房屋信息列表
     */
    public function TestRoomInfoQuery()
    {
        $community_id = 'AMLJJVEZH4201';
        $page_num='1';                        //分页查询的页码数，分页从1开始计数。该参数不传入的时候，默认为1
        $page_size='100';                    //分页查询的每页最大数据条数。默认为200
        $data  = array(
            'community_id'=>$community_id,    //传入该小区在支付宝社区物业平台中的唯一编号，通过小区创建和查询接口获取。
            'page_num'=>$page_num,                        //分页查询的页码数，分页从1开始计数。该参数不传入的时候，默认为1
            'page_size'=>$page_size,                     //分页查询的每页最大数据条数。默认为200
        );

        $app_auth_token = '201810BBb7dfdaa1d0de47eab10c661ce05eaX03';
        $aopVal = new getAopClientValue();

        $roominfo = new Roominfo();
        $result = $roominfo->roomInfoQuery($aopVal, $data, $app_auth_token);
        $this->show_bug($result);
    }



}