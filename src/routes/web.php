<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);



Route::get('/', function () {
    return view('register');
});

Route::post('/register', function (Request $request) {
    // バリデーション
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|string|min:8|max:255',
    ]);

    // ユーザーを作成
    $user = new App\Models\User();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = bcrypt($request->input('password'));
    $user->roles = ['admin'];
    $user->save();

    // ログイン画面に遷移
    return redirect('/login');
});



Route::get('/', function () {
    return view('admin');
});

Route::post('/', function (Request $request) {
    // 検索条件を取得
    $name = $request->input('name');
    $email = $request->input('email');
    $gender = $request->input('gender');
    $inquiry_type = $request->input('inquiry_type');
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');

    // 検索を実行
    $inquiries = Inquiry::where(function ($query) use ($name, $email, $gender, $inquiry_type, $start_date, $end_date) {
        if ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }
        if ($email) {
            $query->where('email', 'like', '%' . $email . '%');
        }
        if ($gender) {
            if ($gender === '全て') {
            } else {
                $query->where(
                    'gender',
                    $gender
                );
            }
        }
        if ($inquiry_type) {
            $query->where('inquiry_type', $inquiry_type);
        }
        if ($start_date && $end_date) {
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }
    })
        ->orderBy('created_at', 'desc')
        ->paginate(7);

    return view('admin', compact('inquiries'));
});

Route::get('/inquiry/detail/{id}', function ($id) {

    $inquiry = Inquiry::findOrFail($id);

    // モーダルウィンドウの表示
    return view('admin.inquiry.detail', compact('inquiry'));
});

Route::delete('/inquiry/{id}', function ($id) {

    Inquiry::destroy($id);


    return redirect('/');
});


Route::get('/', function () {
    return view('contact');
});

Route::post('/', function (Request $request) {
    // バリデーション
    $request->validate([
        'last_name' => 'required|string',
        'first_name' => 'required|string',
        'gender' => 'required|in:男性,女性,その他',
        'email' => 'required|email',
        'phone_number' => 'required|digits:5',
        'address' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'content' => 'required|string|max:120',
    ]);


    $contact = new Contact();
    $contact->last_name = $request->input('last_name');
    $contact->first_name = $request->input('first_name');
    $contact->gender = $request->input('gender');
    $contact->email = $request->input('email');
    $contact->phone_number = $request->input('phone_number');
    $contact->address = $request->input('address');
    $contact->category_id = $request->input('category_id');
    $contact->content = $request->input('content');
    $contact->save();

    // 確認画面に遷移
    return redirect('/confirm');
});

Route::get('/', function () {
    return view('contact');
});

Route::post('/', function (Request $request) {
    // バリデーション
    $request->validate([
        'last_name' => 'required|string',
        'first_name' => 'required|string',
        'gender' => 'required|in:男性,女性,その他',
        'email' => 'required|email',
        'phone_number' => 'required|digits:5',
        'address' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'content' => 'required|string|max:120',
    ]);


    $contact = new Contact();
    $contact->last_name = $request->input('last_name');
    $contact->first_name = $request->input('first_name');
    $contact->gender = $request->input('gender');
    $contact->email = $request->input('email');
    $contact->phone_number = $request->input('phone_number');
    $contact->address = $request->input('address');
    $contact->category_id = $request->input('category_id');
    $contact->content = $request->input('content');
    $contact->save();

    // 確認画面に遷移
    return redirect('/confirm');
});

Route::get('/confirm', function () {
    // お問い合わせデータを取得
    $contact = Contact::findOrFail(session('contact_id'));

    // 確認画面の表示
    return view('confirm', compact('contact'));
});

Route::post('/confirm', function (Request $request) {

    $contact = Contact::findOrFail(session('contact_id'));
    $contact->last_name = $request->input('last_name');
    $contact->first_name = $request->input('first_name');
    $contact->gender = $request->input('gender');
    $contact->email = $request->input('email');
    $contact->phone_number = $request->input('phone_number');
    $contact->address = $request->input('address');
    $contact->category_id = $request->input('category_id');
    $contact->content = $request->input('content');
    $contact->save();

    // サンクスページに遷移
    return redirect('/thanks');
});

Route::get('/thanks', function () {
    // サンクスページの表示
    return view('thanks');
});





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ContactController::class, 'index']);
