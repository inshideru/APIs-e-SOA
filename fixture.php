<?php
require_once 'bootstrap.php';
try {
    $conexao = new \PDO(DSN, DBUSER, DBPASS);
} catch (\PDOException $e) {
    die("Error código: " . $e->getCode() . ": " . $e->getMessage());
}

$sql = 'DROP TABLE IF EXISTS `produto`;';

$stmt = $conexao->prepare($sql);
$stmt->execute();

$sql = "
    create table produto (
     id int primary key auto_increment,
     nome varchar(50),
     descricao text,
     valor real )";

$stmt = $conexao->prepare($sql);
$stmt->execute();

echo "Tabela produto criada.\n";

$sql = <<< 'EOT'
INSERT INTO produto
    (nome, descricao, valor)
VALUES
    ('Caneta', 'Caneta esferográfica comum', 2.5),
    ('Lápis', 'Lápis preto nº 2', 1.5),
    ('Caneta marca-texto', 'Caneta marca-texto verde', 4.5),
    ('Borracha', 'Borracha especial anti-manchas', 5.5)
EOT;

//$sql = utf8_decode($sql);

$stmt = $conexao->prepare($sql);
$stmt->execute();

echo $sql . "\n\n";
echo 'Fixture executada com sucesso!';