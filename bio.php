<?php
$user = $_GET['user'];
if($user){
function get_web_page( $url ){
	$options = array(
		CURLOPT_RETURNTRANSFER => true,     
		CURLOPT_HEADER         => false,    
		CURLOPT_FOLLOWLOCATION => true,     
		CURLOPT_ENCODING       => "",       
		CURLOPT_USERAGENT      => "XoneTeam", 
		CURLOPT_AUTOREFERER    => true,     
		CURLOPT_CONNECTTIMEOUT => 120,      
		CURLOPT_TIMEOUT        => 120,      
		CURLOPT_MAXREDIRS      => 10,       
		CURLOPT_SSL_VERIFYPEER => false     
	);

	$ch      = curl_init( $url );
	curl_setopt_array( $ch, $options );
	$content = curl_exec( $ch );
	$err     = curl_errno( $ch );
	$errmsg  = curl_error( $ch );
	$header  = curl_getinfo( $ch );
	curl_close( $ch );

	$header['errno']   = $err;
	$header['errmsg']  = $errmsg;
	$header['content'] = $content;
	return $header;
}

$url = 'https://t.me/'.$user;
$data = get_web_page($url);

$data_content = $data['content'];

preg_match('/<div class="tgme_page_description ">([^<]+)<\/div>/i', $data_content, $matches);
$bio = $matches[1];
echo $bio;
}else{
echo "<h1>User Not Found</h1>";
}