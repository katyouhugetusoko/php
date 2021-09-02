<?php

declare(strict_types=1);

require_once dirname(__FILE__) . '/functions.php';

// メインルーチン
try {
    if (!isset($_POST['password']) || trim($_POST['password']) === '') {
        return;
    }

    $pdo = connect();
    $statement = $pdo->prepare("SELECT * FROM login WHERE id = :id ");
    $statement->bindValue(':id', $_POST['id'], PDO::PARAM_STR);
    // sqlの実行
    $statement->execute();

} catch (PDOException $e) {
    echo $e;
}
//statementにはsqlからの検索結果が入っている。　fetchでphpの配列に変換する。
$row = $statement->fetch(PDO::FETCH_ASSOC);
//データベースからのPASSとPOSTで受け取ったPASSを比較する。
// ===は完全一致なので、型が合わないとfalseになる

if ($row['password'] == $_POST['password']){
    echo "ログイン名　$_POST[id]さん。　ログインが完了しました。";
} else {
    echo "不正なログインです";
}
?>

