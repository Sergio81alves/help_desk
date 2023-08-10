<?php 
   session_start();
   if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'Sim'){
    //ai eu faço o redirecionamento para index erro2
    header('location: index.php?login=erro2');
 }
?>