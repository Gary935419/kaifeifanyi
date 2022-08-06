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
	const key = "";//必应Azure平台KEY,必须项
	const appid = "";//必应Azure平台APPID,必须项
	public function getTranslate($inputStr,$fromLanguage,$toLanguage)
	{
		$azure_key = self::key;
		$azure_appId = self::appid;
		$accessToken = self::getAzureToken($azure_key);
		$params = "text=" . urlencode($inputStr) . "&to=" . $toLanguage . "&from=" . $fromLanguage . "&appId=Bearer" . $accessToken;
		$translateUrl = "http://api.microsofttranslator.com/v2/Http.svc/Translate?$params";
		$curlResponse = self::curlRequest($translateUrl);
		$translatedStr = simplexml_load_string($curlResponse,'SimpleXMLElement', LIBXML_NOCDATA);
		$translatedStr = json_encode($translatedStr);
		$translatedStr = json_decode($translatedStr,true);
		return $translatedStr[0];
	}

	public  function getAzureToken($key)
	{
		$url = 'https://api.cognitive.microsoft.com/sts/v1.0/issueToken';
		$ch = curl_init();
		$data_string = json_encode('{body}');
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($data_string),
				'Ocp-Apim-Subscription-Key: ' . $key
			)
		);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$Response = curl_exec($ch);
		curl_close($ch);
		return $Response;
	}
	public function curlRequest($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: text/xml"));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, False);
		$curlResponse = curl_exec($ch);
		curl_close($ch);
		return $curlResponse;
	}
}
