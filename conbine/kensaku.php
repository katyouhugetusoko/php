<?php

declare(strict_types=1);

require_once dirname(__FILE__) . '/functions.php';

// メインルーチン
try {
    if (!isset($_GET['name']) || trim($_GET['name']) === '') {
        return;
    }
    $pdo = connect();
    $statement = $pdo->prepare("SELECT * FROM syouhin WHERE name = :name ");
    $statement->bindValue(':name', $_GET['name'], PDO::PARAM_STR);
    // sqlの実行
    $statement->execute();

} catch (PDOException $e) {
    echo '商品の検索に失敗しました。';
    echo $e;
    return;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SELECTの実行 - honkaku</title>
</head>
<body>
    <h3>「<?=escape($_GET['name'])?>」を含む商品の検索結果</h3>
    <table border="1">
        <tr>
            <th>商品名</th>
            <th>価格</th>
            
        </tr>
        <!-- // sqlの実行結果がstatementに入ってる fetchで取り出す -->

        <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?=escape($row['name'])?></td>
                <td><?=escape(number_format($row['price']))?>円</td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>