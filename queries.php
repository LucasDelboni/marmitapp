<?php

function instanciaPdo(){
    $port = '3306';
    $dbname = 'c9';
    $ip = getenv('IP');
    $user = getenv('C9_USER');
    
    
    $pdo = new PDO("mysql:host=$ip;port=$port;dbname=$db;charset=utf8",$user,"");
    // define para que o PDO lance exceções caso ocorra erros
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $pdo;
}

function executaQueryTodasLinhas($sql, $dados){
    $pdo = instanciaPdo();
    $consulta = $pdo->prepare($sql);
    $consulta->execute($dados);
    return $consulta->fetchAll(PDO::FETCH_ASSOC);
}

function executaQueryPrimeiraLinha($sql, $dados){
    $pdo = instanciaPdo();
    $consulta = $pdo->prepare($sql);
    $consulta->execute($dados);
    return $consulta->fetch(PDO::FETCH_ASSOC);
}

//retorna quantas linhas foram alteradas
function executaInsercao($sql,$dados){
    $pdo = instanciaPdo();
    $stmt = $pdo->prepare($sql);
    $stmt->execute($dados);
    return $stmt->rowCount();
}

///////////////////// USUARIOS  ///////////////////////////////////
function cadastraUsuario($email, $senha, $nome){
    $dados = array($email, $senha);
    $sql = "INSERT INTO usuarios(id, email, senha) VALUES (?,?,?)";
    
    $pdo = instanciaPdo();
    $stmt = $pdo->prepare($sql);
    $dbh->beginTransaction(); 
    $stmt->execute($dados);
    $dbh->commit();
    
    $id_usuario = $dbh->lastInsertId(); ;
    $dados = array($id_usuario, $nome);
    $sql = "INSERT INTO comprador(id_usuario, nome) VALUES (?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($dados);
}

function cadastrarRestaurante($id_usuario, $nome_restaurante, $cnpj, $come_local, $entrega_meio, $entraga_fim, $aceita_cartao, $foto){
    $dados = array($id_usuario, $nome_restaurante, $cnpj, $come_local, $entrega_meio, $entraga_fim, $aceita_cartao, $foto);
    $sql="INSERT INTO restaurante(id_usuario, nome, cnpj, come_local, entrega_meio, entrega_em_casa, aceita_cartao, foto) VALUES (?,?,?,?,?,?,?,?)";
    executaInsercao();
}

///////////////////// RESTAURANTES  ////////////////////////////////

//retorna todos os id do usuario(restaurante), nome e foto
function consultaRestaurantes($entrega_em_casa, $entrega_meio, $come_local, $aceita_cartao){
    $dados = array($entrega_em_casa, $entrega_meio, $come_local,$aceita_cartao);
    $sql="SELECT id_usuario AS restaurante, nome AS nome, foto AS foto
        FROM restaurante 
        WHERE entrega_em_casa =:?
        AND entrega_meio =?
        AND come_local =:?
        AND aceita_cartao =?";
    
    return executaQueryTodasLinhas($sql, $dados);
}

//consutla todos os pratos (não pega ingredientes) de um determinado restaurante
function pratosPorRestaurante($id_restaurante){
    $dados = array($id_restaurante);
    $sql="SELECT id AS id_prato, nome, foto, preco
        FROM prato
        WHERE id_restaurante =?";
    return executaQueryTodasLinhas($sql,$dados);
}

//consutla todas informacoes do prato (incluindo ingrediente)
function conultaPrato($id_prato){
    $dados = array($id_prato);
    $sql="SELECT id AS id_prato, id_restaurante AS id_restaurante, nome AS nome, foto AS foto, ingredientes AS ingredientes, preco AS preco
        FROM prato
        WHERE id =?";
    return executaQueryPrimeiraLinha();
}

///////////////////// COMENTARIOS E NOTAS - RESTAURANTE /////////////////////////////////////
//insere comentario e nota em um determinado restaurante()
function insereComentarioNota($id_comprador, $id_restaurante, $comentario, $nota){
    $dados = array($id_comprador, $id_restaurante, $comentario, $nota);
    $sql="UPDATE  venda 
        SET  comentario =  ?, nota =  ? 
        WHERE  id_comprador=? and id_restaurante=?";
    
    $executaInsercao($sql,$dados);
}

//retorna todos os comentarios e notas de um restaurante
function consultaComentariosRestaurante($id_restaurante){
    $dados = array($id_restaurante);
    $sql="SELECT comentario, nota
        FROM venda
        WHERE id_restaurante =?";
    return executaQueryTodasLinhas($sql,$dados);
}




?>