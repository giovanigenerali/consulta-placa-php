<?php

  if (isset($_GET["placa"]) && $_GET["placa"] !== "") {

    $url_sinesp = "http://sinespcidadao.sinesp.gov.br/sinesp-cidadao/ConsultaPlacaNovo";
    $placa   = $_GET["placa"];
    $token = hash_hmac('sha1', $placa, 'shienshenlhq', false);
    $random_ip = (string)mt_rand(1,255).".".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255);
    $latitude = (( 20000/111000.0 * sqrt(rand(1,1000)) ) * cos(2 * 3.141592654 * rand(1,1000)) + -15.7942287);
    $longitude = (( 20000/111000.0 * sqrt(rand(1,1000)) ) * sin(2 * 3.141592654 * rand(1,1000)) + -47.8821658);

    $request = '<?xml version="1.0" encoding="utf-8" standalone="yes" ?>'
      . '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">'
      . '<soap:Header>'
      . '<dispositivo>GT-S1312L</dispositivo>'
      . '<nomeSO>Android</nomeSO>'
      . '<versaoAplicativo>1.1.1</versaoAplicativo>'
      . '<versaoSO>5.1.1</versaoSO>'
      . '<aplicativo>aplicativo</aplicativo>'
      . '<ip>'. $random_ip .'</ip>'
      . '<token>'. $token .'</token>'
      . '<latitude>'. $latitude .'</latitude>'
      . '<longitude>'. $longitude .'</longitude>'
      . '</soap:Header>'
      . '<soap:Body>'
      . '<webs:getStatus xmlns:webs="http://soap.ws.placa.service.sinesp.serpro.gov.br/">'
      . '<placa>'. $placa .'</placa>'
      . '</webs:getStatus>'
      . '</soap:Body>'
      . '</soap:Envelope>';

    $header = array(
      "Content-type: application/x-www-form-urlencoded; charset=UTF-8",
      "Accept: text/plain, */*; q=0.01",
      "Cache-Control: no-cache",
      "Pragma: no-cache",
      "x-wap-profile: http://wap.samsungmobile.com/uaprof/GT-S7562.xml",
      "Content-length: ". strlen($request),
      "User-Agent: Mozilla/5.0 (Linux; U; Android 5.1.1; pt-br; GT-S1162L Build/IMM76I) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30",
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $url_sinesp);
    curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($soap_do, CURLOPT_TIMEOUT, 10);
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($soap_do, CURLOPT_POST, true );
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $res = curl_exec($soap_do);

    // error
    if ($res === false) {
      $err = 'Error: '. curl_error($soap_do);
      echo $err;
    } else {
      // return xml
      if (isset($_GET['type']) and $_GET['type'] !== "") {
        if ($_GET['type'] == "xml") {       
          header('Content-Type: text/xml; charset=UTF-8');
          $xml = new SimpleXMLElement($res);
          print $xml->asXML();
        } 
        // return json
        else if($_GET["type"] == "json") {
          header('Content-type: application/json; charset=UTF-8');
          $response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $res);
          $xml = new SimpleXMLElement($response);
          $body = $xml->xpath('//return')[0];
          print json_encode((array)$body);
        }
      } 
        // return default
        else {
        $response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $res);
        $xml = new SimpleXMLElement($response);
        $body = $xml->xpath('//return')[0];
        $array = json_decode(json_encode((array)$body), true); 
        foreach ($array as $key => $val) {
          print $key ." = ". $val ."<br>";
        }
      }
    }
    curl_close($soap_do);
  } else {
    header("location: https://github.com/wgenial/placa-sinesp");
    exit;
  }

?>