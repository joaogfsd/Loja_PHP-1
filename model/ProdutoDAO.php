<?php

namespace model;
require 'conexao.php';
use Conexao;
use PDOException;

class ProdutoDAO
{
    public function salvar($produto)
    {
        try{
        $conexao = new Conexao();
        $connection = $conexao->getConnection();

        $stmt = $connection->prepare('INSERT INTO produto(nome, categoria, valor) VALUES(:nome, :categoria, :valor) ');
        $stmt->bindParam(':nome', $produto->getNome());
        $stmt->bindParam(':categoria', $produto->getCategoria());
        $stmt->bindParam(':valor', $produto->getValor());

        $stmt->execute();
        return 'Produto cadastrado com sucesso!';
        } catch(PDOException $error){
            return $error->getMessage();
        }
    }

    public function atualizar($produto){
        $conexao = new Conexao();
        $connection = $conexao->getConnection();

        $stmt = $connection->prepare('UPDATE produto set nome = :nome, categoria = :categoria, valor = :valor where codigo = :codigo');
        $stmt->bindParam(':nome', $produto->getNome());
        $stmt->bindParam(':codigo', $produto->getCodigo());
        $stmt->bindParam(':valor', $produto->getValor());

        $stmt->execute();
        return 'Atualizado com sucesso!';
    }

   
}
