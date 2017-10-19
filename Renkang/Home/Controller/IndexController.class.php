<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    const TEMPLATE = "<xml>
                  <ToUserName><![CDATA[%s]]></ToUserName>
                  <FromUserName><![CDATA[%s]]></FromUserName>
                  <CreateTime>%s</CreateTime>
                  <MsgType><![CDATA[%s]]></MsgType>
                  <Content><![CDATA[%s]]></Content>
                  </xml>";
    public function __construct(){	
	  }

    public function index(){
       //获得参数 signature nonce token timestamp echostr
  		$nonce = $_GET['nonce'];
  		$token = 'renkang';
  		$timestamp = $_GET['timestamp'];
      $echostr = $_GET['echostr'];

      //形成数组，按字典排序  
      $signature = $_GET["signature"];
  		$tmpArr = array($token, $timestamp, $nonce);
  		sort($tmpArr, SORT_STRING);
  		$tmpStr = implode( $tmpArr );
  		$tmpStr = sha1( $tmpStr );
  		if ( $tmpStr == $signature && $echostr) {
  			echo $echostr;
  			exit;
  		}else{
        $this->reponeseMsg();
      }
    }

    public function reponeseMsg(){
      //1.获取到微信推送过来post数据，(xml格式)
    	$postArr = $GLOBALS['HTTP_RAW_POST_DATA'];

      $postObj = simplexml_load_string($postArr);
      //$postObj->ToUserName = '';
      //$postObj->FromUserName = '';
      //$postObj->CreateTime = '';
      //$postObj->MsgType = '';
      //$postObj->Event = '';
      //判断该数据包是否是订阅的事件推送
      $toUser = $postObj->FromUserName;
      $fromUser = $postObj->ToUserName;
      $createTime = time();
      $template = self::TEMPLATE;
      if (strtolower($postObj->MsgType) == 'event') {
        //如果是关注subscribe事件
        if (strtolower($postObj->Event) == 'subscribe') {
          //回复用户消息
          
          $msgType = 'text';
          $content = '欢迎关注我们的微信公众号';
          // $template = "<xml>
          //             <ToUserName><![CDATA[%s]]></ToUserName>
          //             <FromUserName><![CDATA[%s]]></FromUserName>
          //             <CreateTime>%s</CreateTime>
          //             <MsgType><![CDATA[%s]]></MsgType>
          //             <Content><![CDATA[%s]]></Content>
          //             </xml>";
          

          $info = sprintf($template, $toUser, $fromUser, $createTime, $msgType, $content);
          echo $info;
        }
      }

      if (strtolower($postObj->MsgType) == 'text') {
        switch (trim($postObj->Content)) {
          case 1:
            $content = "您输入的数字是1";
            break;
          case 2:
            $content = "您输入的数字是2";
            break;
          case 3:
            $content = "您输入的数字是3";
            break;
          case 'tuwen':
            $content = "<a href='http://www.baidu.com'>百度</a>";
            break;
          default:
            break;
        }
        $msgType = 'text';
        $info = sprintf($template, $toUser, $fromUser, $createTime, $msgType, $content);
          echo $info;
      }
    }
}