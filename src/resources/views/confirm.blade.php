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
            <form action="" method="post">
                @csrf
                <input type="text" name="last_name" placeholder="姓" required>
                <input type="text" name="first_name" placeholder="名" required>
                <select name="gender" required>
                    <option value="">性別</option>
                    <option value="男性">男性</option>
                    <option value="女性">女性</option>
                    <option value="その他">その他</option>
                </select>
                <input type="email" name="email" placeholder="メールアドレス" required>
                <input type="text" name="phone_number" placeholder="電話番号" required>
                <input type="text" name="address" placeholder="住所" required>
                <select name="category_id" required>
                    <option value="">選択してください</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <textarea name="content" placeholder="お問い合わせ内容" required></textarea>
                <input type="submit" value="確認画面へ">
            </form>
        </section>
    </main>
</body>

</html>