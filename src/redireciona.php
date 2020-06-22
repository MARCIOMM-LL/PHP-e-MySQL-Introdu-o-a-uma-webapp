<?php

#Função para realizar o endereçamento de páginas
function redireciona(string $url): void
{
    header("Location: $url");
    die();
}

?>    