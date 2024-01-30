<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ログインページ</title>
</head>

<body>
    <header>
        <a href="/login">ログイン</a>
    </header>
    <main>
        <h1>新規登録</h1>
        <form action="/register" method="post">
            @csrf
            <input type="text" name="name" placeholder="お名前">
            <input type="email" name="email" placeholder="メールアドレス">
            <input type="password" name="password" placeholder="パスワード">
            <input type="submit" value="登録">
        </form>
    </main>
</body>

</html>