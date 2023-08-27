<?php
 session_start();

 if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'Sim'){
    //ai eu faço o redirecionamento para index erro2
    header('location: index.php?login=erro2');
 }
$usuario_autenticado = false;
$usuario_id = null;
$usuario_perfil_id = null;
$perfis = array(1 => 'Adiministrativo', 2 => 'Usuário');


$usuarios_app = [
    array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
    array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
    array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
    array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
];



/*echo "<pre>";
    print_r($usuarios_app);
echo "</pre>";*/
foreach($usuarios_app as $user){

    echo '<br />';
    if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
        $usuario_autenticado = true;
        $usuario_id = $user['id']; 
        $usuario_perfil_id = $user['perfil_id'];
    }
    
    if($usuario_autenticado){
        echo"Usuario autenticado ";
        $_SESSION['autenticado'] = 'Sim';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
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