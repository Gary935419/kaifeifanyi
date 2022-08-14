<?php

/**
 * 必应翻译
 * @des 使用Azure平台Key调用必应翻译API
 * @param string $inputStr  待翻译的文本
 * @param string $fromLanguage 文本原语言
 * @param string $toLanguage 文本要翻译的语言
 * @return string 译文
 */
class BingTranslate
{
	function tocurl($url, $header, $content){
		$ch = curl_init();
		if(substr($url,0,5)=='https'){
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在
			curl_setopt($ch, CURLOPT_SSLVERSION, 1);
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		if (is_array($header)) {
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		}
		curl_setopt($ch, CURLOPT_POST, true);
		if (!empty($content)) {
			if (is_array($content)) {
				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($content));
			} else if (is_string($content)) {
				curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
			}
		}
		$response = curl_exec($ch);
		$error=curl_error($ch);
		//var_dump($error);
		if($error){
			die($error);
		}
		$header = curl_getinfo($ch);

		curl_close($ch);
		$data = array('header' => $header,'body' => $response);
		return $data;
	}

	function xfyun($text,$from,$to) {
		//在控制台-我的应用-机器翻译获取
		$app_id = "261c8a95";
		//在控制台-我的应用-机器翻译获取
		$api_sec = "ZDE2NDFkN2M2NTc4NjdiYTJlYzIwZTAw";
		//在控制台-我的应用-机器翻译获取
		$api_key = "7f91981b60519a8eed02df259ddf1c95";
		// 机器翻译接口地址
		$url = "https://itrans.xfyun.cn/v2/its";

		//body组装
		$body = json_encode($this->getBody($app_id, $from, $to, $text));

		// 组装http请求头
		$date =gmdate('D, d M Y H:i:s') . ' GMT';

		$digestBase64  = "SHA-256=".base64_encode(hash("sha256", $body, true));
		$builder = sprintf("host: %s
date: %s
POST /v2/its HTTP/1.1
digest: %s", "itrans.xfyun.cn", $date, $digestBase64);
		// echo($builder);
		$sha = base64_encode(hash_hmac("sha256", $builder, $api_sec, true));

		$authorization = sprintf("api_key=\"%s\", algorithm=\"%s\", headers=\"%s\", signature=\"%s\"", $api_key,"hmac-sha256",
			"host date request-line digest", $sha);

		$header = [
			"Authorization: ".$authorization,
			'Content-Type: application/json',
			'Accept: application/json,version=1.0',
			'Host: itrans.xfyun.cn',
			'Date: ' .$date,
			'Digest: '.$digestBase64
		];
		$response = $this->tocurl($url, $header, $body);
		return $response['body'];
	}

	function getBody($app_id, $from, $to, $text) {
		$common_param = [
			'app_id'   => $app_id
		];

		$business = [
			'from' => $from,
			'to'   => $to,
		];

		$data = [
			"text" => base64_encode($text)
		];

		return $body = [
			'common' => $common_param,
			'business' => $business,
			'data' => $data
		];
	}
}
