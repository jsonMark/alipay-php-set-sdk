<?php
/**
 * Created by PhpStorm.
 * User: 水主沉浮!
 * Date: 2018/10/19
 * Time: 21:25
 * Q  Q: 3401889728
 */

namespace app\index\controller;

use Cplife\getAopClientValue;
use Cplife\Bill;

class Testbill extends Base
{
    /**
     * 上传物业小区内部房屋信息
     */
    public function TestBillBatchUpload()
    {
        $batch_id = '';
        $community_id = '';
        $array[]  =  array(
            'bill_entry_id'=>'15000120160701',      // 物业费账单应收明细条目ID，在同一小区内必须唯一，不同小区不做唯一性要求。
            'out_room_id'=>'26',        //物业系统端房屋编号，必须事先通过房屋信息上传接口上传到支付宝社区物业平台。
            'room_address'=>'三期2栋2单元1108室',       //对应的房屋门牌地址。若开发者之前通过上传物业小区内部房屋信息接口中的address参数已上传，可不传。
            'cost_type'=>'物业管理费',          //费用类型名称，根据物业系统定义传入，支付宝除参数最大长度外不做限定。
            'bill_entry_amount'=>'99',  //应收金额，单位为元，精确到小数点后两位，取值范围[0.01,100000000]
            'acct_period'=>'2018年07月',        //明细条目所归属的账期，用于归类和向用户展示，具体参数值由物业系统自行定义，除参数最大长度外支付宝不做限定。
            'release_day'=>'201808024',        //出账日期，格式固定为YYYYMMDD
            'deadline'=>'201808025',           //缴费截止日期，格式固定为YYYYMMDD。不能早于调用接口时的当前实际日期（北京时间）和出账日期。
            //'relate_id'=>'',          //缴费明细条目关联ID。若物业系统业务约束上传的多条明细条目必须被一次同时支付，则对应的明细条目需传入同样的relate_id。
            // 'remark_str'=>'',         //缴费支付确认页显示给用户的提示确认信息，除房间名外的第二重校验信息，预防用户错缴。建议传入和缴费户相关的信息例如，可传入脱敏后的物业系统中的业主姓名，或其他相关信息。可选参数，不传则不展示。账单明细合并支付时，若部分账单明细的remark_str不同，则默认取第一条有remark_str值的账单明细进行展示。
        );
        $data  = array(
            //batch_id 每次上传物业费账单，都需要提供一个批次号。对于每一个合作伙伴，传递的每一个批次号都必须保证唯一性，同时对于批次号内的账单明细数据必须保证唯一性；
            //建议格式为：8位当天日期+流水号（3～24位，流水号可以接受数字或英文字符，建议使用数字）。
            'batch_id'=>$batch_id,
            //支付宝社区小区统一编号，必须在物业账号名下存在。
            'community_id'=>$community_id,
            //bill_set 账单应收条目明细集合，同一小区内条目明细不允许重复；一次接口请求最多支持1000条明细。
            'bill_set'=>$array,
        );

        $app_auth_token = '201810BBb7dfdaa1d0de47eab10c661ce05eaX03';
        $aopVal = new getAopClientValue();

        $bill = new Bill();
        $result = $bill->billBatchUpload($aopVal, $data, $app_auth_token);
        $this->show_bug($result);
    }

    /**
     * 修改已上传的物业费账单数据
     */
    public function TestBillModify()
    {
        $array[]  =  array(
            'bill_entry_id'=>'15000120160701',      // 物业费账单应收明细条目ID，在同一小区内必须唯一，不同小区不做唯一性要求。
            'out_room_id'=>'26',        //物业系统端房屋编号，必须事先通过房屋信息上传接口上传到支付宝社区物业平台。
            'room_address'=>'三期2栋2单元1108室',       //对应的房屋门牌地址。若开发者之前通过上传物业小区内部房屋信息接口中的address参数已上传，可不传。
            'cost_type'=>'物业管理费',          //费用类型名称，根据物业系统定义传入，支付宝除参数最大长度外不做限定。
            'bill_entry_amount'=>'99',  //应收金额，单位为元，精确到小数点后两位，取值范围[0.01,100000000]
            'acct_period'=>'2018年07月',        //明细条目所归属的账期，用于归类和向用户展示，具体参数值由物业系统自行定义，除参数最大长度外支付宝不做限定。
            'release_day'=>'201808024',        //出账日期，格式固定为YYYYMMDD
            'deadline'=>'201808025',           //缴费截止日期，格式固定为YYYYMMDD。不能早于调用接口时的当前实际日期（北京时间）和出账日期。
            //'relate_id'=>'',          //缴费明细条目关联ID。若物业系统业务约束上传的多条明细条目必须被一次同时支付，则对应的明细条目需传入同样的relate_id。
            // 'remark_str'=>'',         //缴费支付确认页显示给用户的提示确认信息，除房间名外的第二重校验信息，预防用户错缴。建议传入和缴费户相关的信息例如，可传入脱敏后的物业系统中的业主姓名，或其他相关信息。可选参数，不传则不展示。账单明细合并支付时，若部分账单明细的remark_str不同，则默认取第一条有remark_str值的账单明细进行展示。
        );
        $data  = array(
            'community_id'=>'',    //传入该小区在支付宝社区物业平台中的唯一编号，通过小区创建和查询接口获取。
            'bill_entry_list'=>$array,                        //分页查询的页码数，分页从1开始计数。该参数不传入的时候，默认为1
            //分页查询的每页最大数据条数。默认为200
        );

        $app_auth_token = '201810BBb7dfdaa1d0de47eab10c661ce05eaX03';
        $aopVal = new getAopClientValue();

        $bill = new Bill();
        $result = $bill->billModify($aopVal, $data, $app_auth_token);
        $this->show_bug($result);
    }

    /**
     * 删除已上传的物业费账单数据
     */
    public function TestBillDelete()
    {
        $community_id = '';
        $bill_entry_id_list = array();
        $data  = array(
            'community_id'=>$community_id,    //传入该小区在支付宝社区物业平台中的唯一编号，通过小区创建和查询接口获取。
            'bill_entry_id_list'=>$bill_entry_id_list,  //指定小区下待删除的物业费账单应收明细条目ID列表，一次最多删除1000条，如果明细条目已被支付或在支付中，则无法被删除。接口会返回无法删除的明细条目ID列表。
        );

        $app_auth_token = '201810BBb7dfdaa1d0de47eab10c661ce05eaX03';
        $aopVal = new getAopClientValue();

        $bill = new Bill();
        $result = $bill->billDelete($aopVal, $data, $app_auth_token);
        $this->show_bug($result);
    }

}