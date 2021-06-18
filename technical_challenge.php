<html>
<head>
    <!-- Load React. -->
    <!-- Note: when deploying, replace "development.js" with "production.min.js". -->
    <script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>

<link rel="stylesheet" href="/css/style.css">
</head>
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
$holder = array();	//temporary holder for each instance of person
$JSON = array();	//associative array holding person information
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

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css"/>


 <!--<script type="module" src="react.js"></script>-->
<style>
</style>
<div class = "container">
<h1>Endpoint Response</h1>
<p>
<?php echo $myJSON; ?>
</p>
</div>
<div id="JSON_Response"></div>
    <div id="users"></div>

    <script type="text/babel">

      ReactDOM.render(
	<?php 
	echo '<div className="ui grid">';
	foreach($JSON as &$person){
		printf('	<div className="column">
        <div className="ui card">
	<div className="image"><img src="%s" /></div>
	<div className="content">
		<div className="header">%s %s</div>
		<div className="description">%s</div>
	</div>
	</div>
	</div>', $person['avatar'], $person['first_name'], $person['last_name'], $person['email']);
	}	

	echo '</div>';
?>
,
        document.getElementById('users')
      );


    </script>
</body>
</head>