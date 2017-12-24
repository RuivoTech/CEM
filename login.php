<?php 
require("conecta.php");
  $login = $_POST['usuario'];
  $entrar = $_POST['Entrar'];
  $senha = ($_POST['password']);
    if (isset($entrar)) {
            
      $verifica = mysql_query("SELECT * FROM usuario WHERE usuario = '$login' AND password = '$senha'") or die("erro ao selecionar");
        if (mysql_num_rows($verifica)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.php';</script>";
          die();
        }else{
          setcookie("login",$login);
          header("Location:home.php");
        }
    }
?>
