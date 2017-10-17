<?php
include('queries.php');

session_set_cookie_params(3600);
session_start();

if(isset($_SESSION[email])) $email_usuario = $_SESSION[email];
if(isset($_SESSION[senha])) $senha_usuario = $_SESSION[senha];

$data = login($email_usuario, $senha_usuario);
print_r($data, true);
// die();

if(!(empty($email_usuario) OR empty($senha_usuario))){
    if(isset($data[id])){
        $_SESSION[id_usuario]=$data[id];
        // echo 'logado';
    } else {
        session_unset();
	    session_destroy();
    }

} else {
    session_unset();
	session_destroy();
}

?>