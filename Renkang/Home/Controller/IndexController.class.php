<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public $textConf;
    public $tuwenConf;
    public function __construct(){
      $this->textConf = C('textConf');
      $this->tuwenConf = C('tuwenConf');
	  }

    public function index(){
       //获得参数 signature nonce token timestamp echostr
  		$nonce = $_GET['nonce'];
  		$token = C('renkang');
  		$timestamp = $_GET['timestamp'];
      $echostr =  $_GET['echostr'];

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
      $template = $this->textConf['textModel'];
      if (strtolower($postObj->MsgType) == 'event') {
        //如果是关注subscribe事件
        if (strtolower($postObj->Event) == 'subscribe') {
          //回复用户消息
          $msgType = 'text';
          $content = '欢迎关注我们的微信公众号';
          $info = sprintf($template, $toUser, $fromUser, $createTime, $msgType, $content);
          echo $info;
        }
      }

      if (strtolower($postObj->MsgType) == 'text') {
          $key = trim($postObj->Content);
          //文本消息自动回复
          $textKeyToContent = $this->textConf['textKeyToContent'];
          if (isset($textKeyToContent[$key])) {
            $content = $textKeyToContent[$key];
            $msgType = 'text';
            $info = sprintf($template, $toUser, $fromUser, $createTime, $msgType, $content);
            echo $info;
          }

          //图文消息自动回复
          $tuwenKeyToContent = $this->tuwenConf['tuwenKeyToContent'];
          if (isset($tuwenKeyToContent[$key])) {
            $contentItem = $tuwenKeyToContent[$key];
            $tuwenItem = $this->tuwenConf['tuwenItem'];
            $item = '';
            foreach ($contentItem as $key => $value) {
              $itemPart = sprintf($tuwenItem,$value['title'],$value['description'],$value['picurl'],$value['url']);
              $item .= $itemPart;
            }
            $tuwenModel = $this->tuwenConf['tuwenModel'];
            $articleCount = count($contentItem);
            $msgType = 'news';
            $info = sprintf($tuwenModel,$toUser,$fromUser,$createTime,$msgType,$articleCount,$item);
            echo $info;
          }
      }
    }
}