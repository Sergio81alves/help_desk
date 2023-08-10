<?php
 session_start();
 if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'Sim'){
    //ai eu faço o redirecionamento para index erro2
    header('location: index.php?login=erro2');
 }


$usuarios_app = [
    array('email' => 'adm@teste.com.br', 'senha' => '123456'),
    array('email' => 'user@teste.com.br', 'senha' => 'abcd')
];
$usuario_autenticado = false;


/*echo "<pre>";
    print_r($usuarios_app);
echo "</pre>";*/
foreach($usuarios_app as $user){

    echo '<br />';
    if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
        $usuario_autenticado = true;
        
    }
    
    if($usuario_autenticado){
        echo"Usuario autenticado";
        $_SESSION['autenticado'] = 'Sim';
        header('location: home.php');
    }else{
        $_SESSION['autenticado'] = 'Não';
        header('location: index.php?login=erro');
    }


}

     //testar se o formulario esta igual o post

    


/*print_r($_GET);

echo '<br />';
echo $_GET['email'];
echo '<br />';
echo $_GET['senha'];

echo '<hr />';
print_r($_POST);

echo '<br />';
echo $_POST['email'];
echo '<br />';
echo $_POST['senha'];*/

?>