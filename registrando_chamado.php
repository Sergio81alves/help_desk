<?php
   session_start();

   
   echo "<pre>";
    print_r($_POST);
   echo "</pre>";

   $titulo =str_replace('#', '-', $_POST['titulo']);
   $categoria = str_replace('#', '-',$_POST['categoria']) ;
   $descricao = str_replace('#', '-',$_POST['descricao']);

   $texto = $_SESSION['id']. '#'. $titulo. ' # '. $categoria. ' # '. $descricao;

   $arquivo = fopen('arquivo.hd', 'a');
    //pesquisar more about fopen() e seus parametros, o q ele é capaz 

   


    /* $texto = preg_replace('/#/', '-', implode($_POST));*/
    
    fwrite($arquivo, $texto .PHP_EOL);
    //fwrite() o primeiro parametro como string
   //para escrever meus arquivos no hd
   //recebe dois parametros um é o que quero escrever e o outro é na onde quero fazer isso
   fclose($arquivo);
   // depois de abrir eu preciso sempre fechar
   //recebe um parametro que é onde está o fopen()
   
/**A sequuencia é importante primeiro abrir um arquivo fopen() depois colocar ele como variavel e passar ele para o fwrite() que vai escrever no arquivo depois eu preciso fechar fclose() */
   header('location: abrir_chamado.php')
?>