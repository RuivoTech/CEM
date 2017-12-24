<?php
ob_start();

// deletando o cookie
setcookie("login", "", time()-3600);
echo "Obrigado por acessar o Sistema de Membros CEM, volte sempre.";
echo "<meta http-equiv='refresh' content='3;url=./'>";
?>