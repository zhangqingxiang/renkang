<?php

$config = array();

$config['textModel'] = "<xml>
	                  <ToUserName><![CDATA[%s]]></ToUserName>
	                  <FromUserName><![CDATA[%s]]></FromUserName>
	                  <CreateTime>%s</CreateTime>
	                  <MsgType><![CDATA[%s]]></MsgType>
	                  <Content><![CDATA[%s]]></Content>
	                  </xml>";
$config['tuwenModel'] = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[news]]></MsgType>
					<ArticleCount>%s</ArticleCount>
					<Articles>%s
					</Articles>
					</xml>";
$config['tuwenItem'] = "<item>
						<Title><![CDATA[%s]]></Title> 
						<Description><![CDATA[%s]]></Description>
						<PicUrl><![CDATA[%s]]></PicUrl>
						<Url><![CDATA[%s]]></Url>
						</item>";
// $config['keyWord'] = array(1,2,3,4,'tuwen');
$config['keyTocontent'] = array(
		'1' => "您输入的数字是1",
		'2' => "您输入的数字是2",
		'3' => "您输入的数字是3",
		'4' => "<a href='http://www.baidu.com'>百度</a>",
		'tuwen'=>array(
			array(
				'title'       => 'baidu',
				'description' => 'first',
				'picurl'      => 'https://image.baidu.com/search/detail?ct=503316480&z=0&ipn=d&word=%E7%99%BE%E5%BA%A6logo%E5%9B%BE%E7%89%87&step_word=&hs=2&pn=36&spn=0&di=173034246000&pi=0&rn=1&tn=baiduimagedetail&is=0%2C0&istype=0&ie=utf-8&oe=utf-8&in=&cl=2&lm=-1&st=undefined&cs=2329748201%2C1389850387&os=2909922686%2C2331530311&simid=3176133400%2C3928236777&adpicid=0&lpn=0&ln=1958&fr=&fmq=1508309752627_R&fm=&ic=undefined&s=undefined&se=&sme=&tab=0&width=undefined&height=undefined&face=undefined&ist=&jit=&cg=&bdtype=0&oriquery=&objurl=http%3A%2F%2Fwww.pc6.com%2Fup%2F2014-1%2F2014120145247.png&fromurl=ippr_z2C%24qAzdH3FAzdH3Fooo_z%26e3Brvm_z%26e3Bv54AzdH3FwzAzdH3Fl8ccc_z%26e3Bip4s&gsm=0&rpstart=0&rpnum=0',
				'url'         => 'www.baidu.com'
			),
			array(
				'title'       => 'google',
				'description' => 'two',
				'picurl'      => 'http://image.baidu.com/search/detail?ct=503316480&z=0&ipn=d&word=googlelogo&step_word=&hs=2&pn=0&spn=0&di=178286312490&pi=0&rn=1&tn=baiduimagedetail&is=0%2C0&istype=0&ie=utf-8&oe=utf-8&in=&cl=2&lm=-1&st=undefined&cs=3286849333%2C2097404388&os=766724521%2C345696252&simid=6312279%2C706913685&adpicid=0&lpn=0&ln=1921&fr=&fmq=1508309991704_R&fm=&ic=undefined&s=undefined&se=&sme=&tab=0&width=undefined&height=undefined&face=undefined&ist=&jit=&cg=&bdtype=0&oriquery=&objurl=http%3A%2F%2Fwww.72swk.com%2Fdata%2Fuploads%2F2015%2F09%2F16%2F93694430855f90d70004fd.jpg&fromurl=ippr_z2C%24qAzdH3FAzdH3Fq7wg_z%26e3B6jgo7yt_z%26e3Bv54AzdH3Fdbc9AzdH3Fip-n908_z%26e3Bip4s&gsm=0&rpstart=0&rpnum=0',
				'url'         => 'https://www.google.com.hk/'

			)
		),
	);