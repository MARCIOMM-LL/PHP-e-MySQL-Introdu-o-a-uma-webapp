<?php
class Artigo
{
    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    #Adicionar conteúdo
    public function adicionar(string $titulo, string $conteudo): void
    {
        $insereArtigo = $this->mysql->prepare('INSERT INTO artigos (titulo, conteudo) VALUES(?,?);');
        $insereArtigo->bind_param('ss', $titulo, $conteudo);
        $insereArtigo->execute();
    }

    #Remover conteúdo
    public function remove(string $id): void
    {
        $removerArtigo = $this->mysql->prepare('DELETE FROM artigos WHERE id = ?');
        $removerArtigo->bind_param('s', $id);
        $removerArtigo->execute();
    }

    #Exibir conteúdo
    public function exibirTodos(): array
    {

        $resultado = $this->mysql->query('SELECT id, titulo, conteudo FROM artigos');
        $artigos = $resultado->fetch_all(MYSQLI_ASSOC);

        return $artigos;
    }

    #Encontrar conteúdo por id
    public function encontrarPorId(string $id): array
    {
        $selecionaArtigo = $this->mysql->prepare("SELECT id, titulo, conteudo FROM artigos WHERE id = ?");
        $selecionaArtigo->bind_param('s', $id);
        $selecionaArtigo->execute();
        $artigo = $selecionaArtigo->get_result()->fetch_assoc();
        return $artigo;
    }

    #Editar conteúdo
    public function editar(string $id, string $titulo, string $conteudo): void
    {
        $editaArtigo = $this->mysql->prepare("UPDATE artigos SET titulo = ?, conteudo = ? WHERE id = ?");
        $editaArtigo->bind_param('sss', $titulo, $conteudo, $id);
        $editaArtigo->execute();
    }
        
}