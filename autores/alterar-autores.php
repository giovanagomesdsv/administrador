<?php 
include "../conexao-banco/conexao.php";

$dado = $_GET['id'];


$nome = $_POST['nome'];
$slug = $_POST['slug']; 
$biografia = $_POST['biografia'];
$imagem = $_POST['imagem'];

$consulta = "UPDATE escritor SET nome='$nome', slug='$slug',biografia='$biografia', foto_url='$imagem' WHERE id_escritor='$dado'";

if ($resp = mysqli_query($conn,$consulta)) {
    echo '
       <script>
          window.alert("Dados atualizados com sucesso!");
          location.href="autores.php";
       </script>  
    ';
} else {
    echo '
    <script>
       window.alert("Erro na inserção!");
       location.href="altera-formulario-autores.php";
    </script>  
 ';
}

?>