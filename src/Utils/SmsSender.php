<?php
namespace Zzld\Foundation\Utils;

class SmsSender{
    public static function viaLuosimao($tel, $content){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://sms-api.luosimao.com/v1/send.json");

        curl_setopt($ch, CURLOPT_HTTP_VERSION  , CURL_HTTP_VERSION_1_0 );
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 8);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_HTTPAUTH , CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD  , 'api:key-e35b4e45e020d6ee3ed5295cff248027');

        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array('mobile' => $tel, 'message' => $content.'【米诺锦盛】'));

        $res = curl_exec( $ch );
        curl_close( $ch );
        //$res  = curl_error( $ch );
        return $res;
    }
}