<?php
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    $arquivo = fopen('arquivo.hd', 'a');//pesquisar more about fopen() e seus parametros, o q ele é capaz 

   $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);

    $texto = $titulo. ' # '. $categoria. ' # '. $descricao. PHP_EOL;

    /* $texto = preg_replace('/#/', '-', implode($_POST));*/
    
   echo $texto ;

   //para escrever meus arquivos no hd
   //recebe dois parametros um é o que quero escrever e o outro é na onde quero fazer isso
   fwrite($arquivo, $texto);
   // depois de abrir eu preciso sempre fechar
   //recebe um parametro que é onde está o fopen()
   fclose($arquivo);

   header('location: abrir_chamado.php');
?>