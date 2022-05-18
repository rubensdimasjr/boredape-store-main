<?php

namespace App\Entity;

use App\Db\Database;
use \PDO;

class Usuario
{

  public $id;

  public $email;

  public $nome;

  public $senha;

  public function cadastrar()
  {

    /* Insere vaga no banco */
    $obDatabase = new Database('usuario');

    /* Atribuir o ID da vaga */
    $this->id = $obDatabase->insert([
      'email' => $this->email,
      'nome' => $this->nome,
      'senha' => $this->senha
    ]);

    /* Retorna sucesso */
    return true;
  }

  public function atualizar()
  {

    return (new Database('usuario'))->update('id = ' . $this->id, [
      'email' => $this->email,
      'nome' => $this->nome,
      'senha' => $this->senha
    ]);
  }

  public function excluir()
  {
    return (new Database('usuario'))->delete('id = ' . $this->id);
  }

  public static function getUsuario($where = null, $order = null, $limit = null)
  {
    return (new Database('usuario'))->select($where, $order, $limit)
      ->fetchAll(PDO::FETCH_CLASS, self::class);
  }

  public static function getUsuarioId($id)
  {
    return (new Database('usuario'))->select('id = ' . $id)
      ->fetchObject(self::class);
  }
}
