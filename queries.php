<?php

function instanciaPdo(){
    $port = '3306';
    $dbname = 'marmitapp';
    $ip = getenv('IP');
    $user = getenv('C9_USER');
    
    $pdo = new PDO("mysql:host=$ip;port=$port;dbname=$dbname;charset=utf8",$user,"");
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
function cadastraUsuario($email, $senha, $nome, $fbId){
    //cadastro do site
    if($senha!=null){
        $dados = array($email, $senha, $nome);
        $sql = "INSERT INTO usuarios(email, senha, nome) VALUES (?,?,?)";
    }
    //cadastro do fb
    else{
        if(procuraFbId($fbId)){
            return;
        }
        
        if($email!=null){
            $dados = array($email, $nome, $fbId);
            $sql = "INSERT INTO usuarios(email, nome, fbId) VALUES (?,?,?)";
        }
        else{
            $dados = array($nome, $fbId);
            $sql = "INSERT INTO usuarios(nome, fbId) VALUES (?,?,?)";
        }
    }
    executaInsercao($sql, $dados);
}

function cadastrarRestaurante($id_usuario, $nome_restaurante, $cnpj, $come_local, $entrega_meio, $entraga_fim, $aceita_cartao, $foto){
    $dados = array($id_usuario, $nome_restaurante, $cnpj, $come_local, $entrega_meio, $entraga_fim, $aceita_cartao, $foto);
    $sql="INSERT INTO restaurante(id_usuario, nome, cnpj, come_local, entrega_meio, entrega_em_casa, aceita_cartao, foto) VALUES (?,?,?,?,?,?,?,?)";
    executaInsercao($sql, $dados);
}

function login($email, $senha){
    $dados = array($email, $senha);
    $sql="SELECT id
        FROM usuarios
        WHERE email =? 
        AND senha = ? ";
    return executaQueryPrimeiraLinha($sql,$dados);
}
///////////////////// RESTAURANTES  ////////////////////////////////
//cria um prato pro restaurante
function criaPratoRestaurante($id_usuario, $nomePrato,$foto, $ingrediente, $preco ){
    $dados = array($id_usuario, $nomePrato,$foto, $ingrediente, $preco) ;
    $sql = "INSERT INTO prato(id_restaurante, nome, foto, ingredientes, preco) VALUES (?,?,?,?,?)";
    executaInsercao($sql,$dados);
}

//checa se o usuario tem restaurante
function temRestaurante($id_usuario){
    $dados = array($id_usuario);
    $sql = "SELECT id_usuario 
            FROM restaurante
            WHERE id_usuario =?";
    if(executaQueryPrimeiraLinha($sql,$dados)){
        return true;
    } else {
        return false;
    }
}

//retorna todos os id do usuario(restaurante), nome e foto
function consultaRestaurantes($entrega_em_casa, $entrega_meio, $come_local, $aceita_cartao){
    $dados = array($entrega_em_casa, $entrega_meio, $come_local,$aceita_cartao);
    $sql="SELECT id_usuario AS restaurante, nome AS nome, foto AS foto
        FROM restaurante 
        WHERE entrega_em_casa =?
        AND entrega_meio =?
        AND come_local =?
        AND aceita_cartao =?";
    
    return executaQueryTodasLinhas($sql, $dados);
}

function consultaTodosRestaurantes(){
    $dados = array();
    $sql="SELECT id_usuario AS restaurante, nome AS nome, foto AS foto
        FROM restaurante";
    
    return executaQueryTodasLinhas($sql, $dados);
}

//pega infos do restaurante
function consultaNomeRestaurante($id_restaurante){
    $dados = array($id_restaurante);
    $sql="SELECT nome
        FROM restaurante
        WHERE id_usuario =?";
    return  executaQueryPrimeiraLinha($sql, $dados);
}

//consutla todos os pratos (não pega ingredientes) de um determinado restaurante
function pratosPorRestaurante($id_restaurante){
    $dados = array($id_restaurante);
    $sql="SELECT id AS id_prato, nome, foto, preco, ingredientes
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
    $data = date("yyyy/mm/dd");
    $dados = array($id_comprador, $id_restaurante, $comentario, $nota, $comentario, $nota, $data);
    

    $sql = 'INSERT INTO comentario_restaurante (id_comprador, id_restaurante, comentario, nota, data)
            VALUES (?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE
            comentario=?, nota=?';
    
    executaInsercao($sql,$dados);
}

//retorna todos os comentarios e notas de um restaurante
function consultaComentariosRestaurante($id_restaurante){
    
    $dados = array($id_restaurante);
    $sql="SELECT comentario, nota, data
        FROM comentario_restaurante
        WHERE id_restaurante =?";
    return executaQueryTodasLinhas($sql,$dados);
}


//////////////////////////////////AMIGOS
function consultaAmigosNoRestaurante($id_usuario,$id_restaurante){
    $dados= array($id_usuario,$id_restaurante);
    $sql="SELECT distinct id_amigo, u.nome
        FROM amigos a
        INNER JOIN venda ON id_amigo = id_comprador
        LEFT JOIN usuarios u ON id_amigo = u.id
        WHERE a.id_usuario = ?
        AND id_restaurante = ?";
    return executaQueryTodasLinhas($sql,$dados);
}

function procuraFbId($fbId){
    $dados= array($fbId);
    $sql = "SELECT * FROM usuarios WHERE fbId = ?";
    if(executaQueryPrimeiraLinha($sql,$dados)){
        return true;
    } else {
        return false;
    }
    
}





?>