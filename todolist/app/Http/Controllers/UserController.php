<?PHP

declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterPostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User as UserModel;

class UserController extends Controller
{
    /**
     * トップページ を表示する
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user.register');
    }

     /**
     * ユーザの新規登録
     */
    public function register(UserRegisterPostRequest $request)
    {
        // validate済みのデータの取得
        $datum = $request->validated();
        $datum['password'] = Hash::make($datum['password']);

        // テーブルへのINSERT
        try {
            $r = UserModel::create($datum);
        } catch(\Throwable $e) {
            // XXX 本当はログに書く等の処理をする。今回は一端「出力する」だけ
            echo $e->getMessage();
            exit;
        }

        // ユーザ登録成功
        $request->session()->flash('front.user_register_success', true);

        // リダイレクト
        return redirect('/');
    }
      
}