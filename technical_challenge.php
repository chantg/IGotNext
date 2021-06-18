<html>
<head>
    <!-- Load React. -->
    <!-- Note: when deploying, replace "development.js" with "production.min.js". -->
    <script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css"/>
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

$lines = explode("{", $result);		//remove outer starting bracket

$lines = str_replace(array('}','"',']'),"",$lines);	//remove outer brackets get just data

$stri = implode("", $lines);
$vals = substr($stri,strpos($stri,"[")+1,strlen($stri));	//get string from first square bracket to end
$vals = explode(',', $vals);	//each entry in vals contains one en
$holder = array();	//temporary holder for each instance of person
$JSON = array();	//associative array holding person information

foreach($vals as &$va){
	$holder[substr($va,0,strpos($va,":"))] = substr($va,strpos($va,":")+1);		//holder key = data before the :, value is everything after the :
	if(substr($va,0,strpos($va,":"))=="avatar"){
		array_push($JSON, $holder);	//avatar is last entry for a person
	}
}
$myJSON = json_encode($JSON, JSON_UNESCAPED_SLASHES);	

?>

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