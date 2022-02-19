<?php
// redireciona para o url desejado (pagina)
function redireciona(string $url)

{
  header("Location: $url");
  die();
}
