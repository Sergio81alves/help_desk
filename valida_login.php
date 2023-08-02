<?php

$usuario_autenticado = false;
//usuarios do sistema
$usuarios_app = array(
    array('email' => 'adm@teste.com.br', 'senha' => '123456'),
    array('email' => 'user@teste.com.br', 'senha' => 'abcd')
);

/*echo "<pre>";
    print_r($usuarios_app);
echo "</pre>";*/
foreach($usuarios_app as $user){
     //testar se o formulario esta igual o post

     if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha'] ){
        $usuario_autenticado = true;
     }

    if($usuario_autenticado){
        echo "Usuário autenticado";
    } else{
        header('location: index.php?login=erro');
    }
     
   
}


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