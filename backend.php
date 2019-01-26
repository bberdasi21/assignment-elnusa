<?php 
if(isset($_POST['submit']) && $_POST['submit']=="login"){
	$login = login($_POST['username'],$_POST['password']);
	echo json_encode($login);
} else if(isset($_POST['submit']) && $_POST['submit']=="logout"){
	session_start();
	session_destroy();
	echo json_encode(1);
} else if(isset($_POST['submit']) && $_POST['submit']=="register"){
	$register = register($_POST['username'],$_POST['email'],$_POST['nama'],$_POST['password']);
	echo json_encode($register);
}
function login($username,$pass){
	$user = array();
	$file = file('user.txt');
	foreach ($file as $i => $line) {
	    $splitLine = explode('|',trim($line));
	    array_push($user,$splitLine);
	}

	foreach ($user as $u) {
		if($u[0]==$username && $u[3]==$pass){
			session_start();
			$_SESSION['username'] = $u[0];
			$_SESSION['nama'] = $u[1];
			$_SESSION['email'] = $u[2];
			return 1;
		}
	}
	return 0;
}
function register($username,$email,$nama,$pass){
	$user = array();
	$file = file('user.txt');
	foreach ($file as $i => $line) {
	    $splitLine = explode('|',trim($line));
	    array_push($user,$splitLine);
	}

	foreach ($user as $u) {
		if($u[0]==$username){
			return 0;
		}
	}

	$context = stream_context_create(array(
	  'http'=>array(
	    'method'=>"GET",
	    'header'=>"Accept-language: en\r\n" .
	              "Cookie: foo=bar\r\n"
	  )
	));

	$file = file_get_contents('user.txt', false, $context);

	$userfile = fopen("user.txt", 'w+');
	
	fwrite($userfile, $file."\r\n".$username."|".$nama."|".$email."|".$pass);
	fclose($userfile);

	return 1;
}
?>