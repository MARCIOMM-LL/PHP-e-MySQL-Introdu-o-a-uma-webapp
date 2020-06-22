<?php

class Artigo
{

    private $mysql;

    #Iniciando o banco sempre que a página index.php for acessada
    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    #Adiciona conteúdo no banco
    public function adicionar(string $titulo, string $conteudo): void
    {
        $insereArtigo = $this->mysql->prepare('INSERT INTO artigos (titulo, conteudo) VALUES (?, ?)');
        $insereArtigo->bind_param('ss', $titulo, $conteudo);
        $insereArtigo->execute();
    }

    #Remover conteúdo no banco
    public function remove(string $id): void
    {
        $removeArtigo = $this->mysql->prepare('DELETE FROM artigos WHERE id = ?');
        $removeArtigo->bind_param('s', $id);
        $removeArtigo->execute();
    }

    #Trazendo as colunas id e titulo
    public function exibirTodos(): array
    {

        #Trazendo conteúdo do banco
        $resultado = $this->mysql->query('SELECT id, conteudo, titulo FROM artigos');
        $artigos = $resultado->fetch_all(MYSQLI_ASSOC);

        return $artigos;
    }

    #Trazendo a coluna com o conteúdo
    public function encontrarPorId(string $id)
    {
        $selecionaArtigo = $this->mysql->prepare("SELECT id, conteudo, titulo FROM artigos WHERE id = ?");
        $selecionaArtigo->bind_param('s', $id);
        $selecionaArtigo->execute();
        $artigo = $selecionaArtigo->get_result()->fetch_assoc();
        return $artigo;
    }
        
}