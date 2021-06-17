<html>
<body>
<?php
$endpoint = "https://dev.driveitag.com/user/";
$username = "sample_api";
$password = "GVBjPMm9s8qf8CZd";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$endpoint);
curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);  

$result = curl_exec($ch);
if (curl_errno($ch)) {
echo 'Error:' . curl_error($ch);
}
curl_close($ch);

$lines = explode("{", $result);

$lines = str_replace(array('}','"',']'),"",$lines);

$stri = implode("\n", $lines);
$vals = substr($stri,strpos($stri,"[")+1,strlen($stri));
$vals = explode(',', $vals);
$holder = array();
$JSON = array();
$i = 0;
foreach($vals as &$va){
	++$i;
	switch($i){
	case 1:
		$holder["id"] = substr($va,strpos($va,":")+1);
		break;
	case 2:
		$holder["email"] = substr($va,strpos($va,":")+1);
		break;
	case 3:
		$holder["first_name"] = substr($va,strpos($va,":")+1);
		break;
	case 4:
		$holder["last_name"] = substr($va,strpos($va,":")+1);
		break;
	case 5:
		$holder["avatar"] = substr($va,strpos($va,":")+1);
		$i = 0;
		array_push($JSON, $holder);
		break;

	}
}
$myJSON = json_encode($JSON, JSON_UNESCAPED_SLASHES);
echo $myJSON;

?>
    <p>This page demonstrates using React with no build tooling.</p>
    <p>React is loaded as a script tag.</p>

    <!-- Load React. -->
    <!-- Note: when deploying, replace "development.js" with "production.min.js". -->
    <script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>	<div id="root"></div>
 <script src="react.js"></script>
  <base href="/">

<app-root></app-root>
<script src="javascript/runtime.79076186781d830136aa.js" defer></script><script src="javascript/polyfills.283d969cb3048cafd68a.js" defer></script><script src="javascript/main.c82c5af71ab0aab14021.js" defer></script>

</body>
</head>