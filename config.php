<?php

#Conexão com o banco
$mysql = new mysqli('localhost', 'root', '123456', 'blog'); 
$mysql->set_charset('utf8');

if($mysql == FALSE){
    echo "Erro de conexão";
}