<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function __construct(){
		
	}

    public function index(){
	echo "weixintest";
       //获得参数 signature nonce token timestamp echostr
		$nonce = $_GET['nonce'];
		$token = 'imooc';
		$timestamp = $_GET['timestamp'];
    	$echostr = $_GET['echostr'];

       //形成数组，按字典排序
       //
       	$signature = $_GET["signature"];
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );

		if ( $tmpStr == $signature ) {
			return $echostr;
		}else{
			return false;
		}
    }

    public function show(){
    	echo "show function";
    }
}
