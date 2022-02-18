<?php

class Artigo
{

  private $mysql;

  public function __construct(mysqli $mysql)
  {

    $this->mysql = $mysql;
  }

  public function adicionar(string $titulos, string $conteudo):void
  {
  
    $insereArtigo = $this->mysql->prepare('INSERT INTO artigos (titulo, conteudo) VALUES (?,?);');
    $insereArtigo->bind_param('ss', $titulos, $conteudo); // metodo vincula o valor para p '?'
    $insereArtigo->execute();

  }

  public function exibirTodos(): array
  {

    $resultado = $this->mysql->query('SELECT id, titulo, conteudo FROM artigos');
    $artigos = $resultado->fetch_all(MYSQLI_ASSOC);

    return $artigos;
  }

  public function encontrarPorId(string $id)
  {
    $selecionaArtigo = $this->mysql->prepare("SELECT id, titulo, conteudo FROM artigos WHERE id = ?");
    $selecionaArtigo->bind_param('s', $id); //metodo vincula o valor para p '?'
    $selecionaArtigo->execute();
    $artigo = $selecionaArtigo->get_result()->fetch_assoc();
    return $artigo;
  }
}
