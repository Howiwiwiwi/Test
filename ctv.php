<?php
$number='01226714143';
$password='Yassen_@0123';
$url6="https://services.orange.eg/GetToken.svc/GenerateToken";
$data6='{"appVersion":"2.9.8","channel":{"ChannelName":"MobinilAndMe","Password":"ig3yh*mk5l42@oj7QAR8yF"},"dialNumber":"'.$number.'","isAndroid":true,"password":"'.$password.'"}';
$headers6[]='Accept: application/json';
$headers6[]='Content-type: application/json';
$headers6[]='User-Agent: okhttp/3.10.0';
$headers6[]='Host: services.orange.eg';
$headers6[]='Content-Length: '.strlen($data6).'';
$ch777 = curl_init();
curl_setopt($ch777, CURLOPT_URL,$url6);
curl_setopt($ch777, CURLOPT_POST, 1);
curl_setopt($ch777, CURLOPT_POSTFIELDS,$data6);
curl_setopt($ch777, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch777, CURLOPT_HTTPHEADER,$headers6);
curl_setopt($ch777, CURLOPT_SSL_VERIFYPEER, false);
$output666= curl_exec ($ch777);
$jsonw=json_decode($output666,true);
curl_close($ch777);
$ctv=$jsonw["GenerateTokenResult"]["Token"];
$htv=strtoupper(hash('sha256',$ctv.',{.c][o^uecnlkijh*.iomv:QzCFRcd;drof/zx}w;ls.e85T^#ASwa?=(lk'));
echo'{"Status":"Ok","ctv":"'.$ctv.'","htv":"'.$htv.'"}';
?>