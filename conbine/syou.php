<?php

declare(strict_types=1);


require_once dirname(__FILE__) . '/functions.php';

try {
    // if (!isset($_GET['name']) || trim($_GET['name']) === '') {
    //     return;
    // }
    $pdo = connect();
    $statement = $pdo->prepare('INSERT INTO syouhin( name, price) VALUES(:name, :price)');
    $statement->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
    $statement->bindValue(':price',$_POST['price'] , PDO::PARAM_INT);
    $statement->execute();

} catch (PDOException $e) {
    echo '新しい商品の登録に失敗しました。';
    echo $e;
    return;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>INSERTの実行 - conbine</title>
</head>
<body>
登録が完了しました。
</body>
</html>