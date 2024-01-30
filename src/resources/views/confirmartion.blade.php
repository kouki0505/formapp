<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォーム</title>
</head>

<body>
    <header>
        <h1>お問い合わせフォーム</h1>
    </header>
    <main>
        <section class="form">
            <h2>確認画面</h2>
            <table>
                <tr>
                    <th>姓</th>
                    <td>{{ $contact->last_name }}</td>
                </tr>
                <tr>
                    <th>名</th>
                    <td>{{ $contact->first_name }}</td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>{{ $contact->gender }}</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>{{ $contact->email }}</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>{{ $contact->phone_number }}</td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>{{ $contact->address }}</td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td>{{ $contact->category->name }}</td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td>{{ $contact->content }}</td>
                </tr>
            </table>
            <p>
                内容に誤りがないかご確認ください。
            </p>
            <a href="/">修正する</a>
            <input type="submit" value="送信">
        </section>
    </main>
</body>

</html>