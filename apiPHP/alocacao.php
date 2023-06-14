<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

// GET == recebe informações
// POST == envia informações
// PUT == edita informações "update"
// DELETE == deleta informações
// OPTIONS == relações de metodos disponiveis para uso

header('Access-Control-Allow-Headers: Content-Type');

include 'conexao.php';

//ROTA PARA OBTER TODOS OS LIVROS

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // criando comando de select para consultar o banco
    $stmt = $conn->prepare('SELECT * FROM alocacao');

    //executando o select
    $stmt->execute();

    //recebdno dados do banco com PDO
    $alocacao = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // tranformando dados em JSON
    echo json_encode($alocacao);
}


if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit;
}

if($_SERVER['REQUEST_METHOD'] === 'PUT' && isset($_GET['id'])){
    parse_str(file_get_contents("php://input"), $_PUT);

    $id = $_GET['id'];
    $novoTitulo = $_PUT['titulo'];
    $novoAutor = $_PUT['autor'];
    $novoAno = $_PUT['ano_publicacao'];
    //add novos campos se necessario

    $stmt = $conn->prepare("UPDATE livros SET titulo = :titulo, autor = :autor, ano_publicacao = :ano_publicacao WHERE id = :id");

    $stmt->bindParam(':titulo', $novoTitulo);
    $stmt->bindParam(':autor', $novoAutor);
    $stmt->bindParam(':ano_publicacao', $novoAno);
    $stmt->bindParam(':id', $id);
    //add novos campos se necessario

    if($stmt->execute()){
        echo "Livro atualizado com sucesso";
    } else {
        echo "Erro ao atualizar o Livro";
    }
}