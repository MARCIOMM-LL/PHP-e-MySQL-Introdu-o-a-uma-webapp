<?php

require_once "config.php";
require_once 'src/Artigo.php';

$artigo = new Artigo($mysql);
$artigos = $artigo->exibirTodos();

// $arr = ["primeiro valor", "segundo valor", "terceiro valor"]; 
// 	echo "valor incial da minha array é:<br>";
//  	print_r($arr);
// 	echo "<br/><br/>";
  
// 	$arr[] = 'quarto valor';
// 	$arr[] = 'quinto valor';
  
// 	echo "Agora a nossa array é:<br/>";
//   	print_r($arr);
// 	echo "<br/>";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">
        <h1>Meu Blog</h1>
        <?php foreach ($artigos as $artigo) : ?>
            <h2>
                <a href="artigo.php?id=<?php echo $artigo['id'] ?>">
                    <?php echo $artigo['titulo'] ?>
                </a>
            </h2>
            <p>
                <?php echo $artigo['conteudo'] ?>  
            </p>
        <?php endforeach; ?>
    </div>
</body>

</html>