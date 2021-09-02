<?php

declare(strict_types=1);


require_once dirname(__FILE__) . '/functions.php';

try {
    // if (!isset($_GET['name']) || trim($_GET['name']) === '') {
    //     return;
    // }
    $pdo = connect();
    $statement = $pdo->prepare('INSERT INTO login ( id, password) VALUES(:id, :password)');
    $statement->bindValue(':id', $_POST['id'], PDO::PARAM_STR);
    $statement->bindValue(':password',$_POST['password'] , PDO::PARAM_INT);
    $statement->execute();

} catch (PDOException $e) {
    echo '新規登録に失敗しました。';
    echo $e;
    return;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>実行</title>
</head>
<body>
登録が完了しました。
</body>
</html>