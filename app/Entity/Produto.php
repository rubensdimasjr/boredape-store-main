<?php

namespace App\Entity;

use App\Db\Database;
use \PDO;

class Produto
{

  public $id_produto;

  public $nome_produto;

  public $preco_produto;

  public $imagem_produto;

  public $favoritos;

  public function cadastraProduto()
  {

    /* TRABALHANDO COM A IMAGEM */
    $pasta = "./images/";
    $nomeDoArquivo = $this->imagem_produto['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    /* UPLOAD IMAGEM */
    if ($extensao != 'jpg' && $extensao != 'png')
      die("Tipo de arquivo não aceito!");

    $adicionadaImg = move_uploaded_file($this->imagem_produto['tmp_name'], $pasta . $novoNomeDoArquivo . "." . $extensao);

    if ($adicionadaImg) {
      $link_arquivo = "$novoNomeDoArquivo" . ".$extensao";
      $preco = str_replace([','], '.', $this->preco_produto);

      /* Insere vaga no banco */
      $obDatabase = new Database('produtos');

      /* Atribuir o ID da vaga */
      $this->id = $obDatabase->insert([
        'nome_produto' => $this->nome_produto,
        'preco_produto' => $preco,
        'nome_img' => $link_arquivo,
        'favoritos' => $this->favoritos
      ]);

      /* Retorna sucesso */
      return true;
    } else {
      echo "Falha ao adicionar imagem!";
    }
  }

  public function atualizarProduto()
  {

    if ($this->imagem_produto['name'] != $this->imagem_produto) {
      echo "É diferente";
    }

    if (!$this->imagem_produto) {
      echo "não tem imagem";
    }

    exit;

    /*     return (new Database('usuario'))->update('id = ' . $this->id, [
      'email' => $this->email,
      'nome' => $this->nome,
      'senha' => $this->senha
    ]); */
  }

  public static function getProduto($where = null, $order = null, $limit = null)
  {
    return (new Database('produtos'))->select($where, $order, $limit)
      ->fetchAll(PDO::FETCH_CLASS, self::class);
  }

  public static function getProdutoId($id)
  {
    return (new Database('produtos'))->select('id_produto = ' . $id)
      ->fetchObject(self::class);
  }
}
