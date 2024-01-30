<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>管理画面</title>
</head>

<body>
    <header>
        <h1>管理画面</h1>
    </header>
    <main>
        <section class="search">
            <h2>検索</h2>
            <form action="" method="post">
                <input type="text" name="name" placeholder="名前">
                <input type="text" name="email" placeholder="メールアドレス">
                <select name="gender">
                    <option value="">性別</option>
                    <option value="男性">男性</option>
                    <option value="女性">女性</option>
                    <option value="その他">その他</option>
                </select>
                <select name="inquiry_type">
                    <option value="">お問い合わせ種類</option>
                    <option value="お問い合わせ">お問い合わせ</option>
                    <option value="ご意見・ご要望">ご意見・ご要望</option>
                    <option value="その他">その他</option>
                </select>
                <input type="date" name="start_date" placeholder="開始日">
                <input type="date" name="end_date" placeholder="終了日">
                <input type="submit" value="検索">
                <input type="reset" value="リセット">
            </form>
        </section>
        <section class="list">
            <h2>お問い合わせ一覧</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>名前</th>
                        <th>メールアドレス</th>
                        <th>性別</th>
                        <th>お問い合わせ種類</th>
                        <th>お問い合わせ内容</th>
                        <th>作成日時</th>
</tr>
<main\>
    <body\>