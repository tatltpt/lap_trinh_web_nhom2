<?php


namespace Modules\Admin\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function getLogin()
    {
        return view('admin::auth.login');
    }
    public function postLogin(Request $request)
    {
        $data = $request->only('email', 'password');

        if (Auth::guard('admins')->attempt($data)) {
            return redirect()->route('admin.home');
        }
        else {
            Session::flash('error', 'Email hoặc mật khẩu không đúng!Mời nhập lại!');
            return redirect()->route('admin.login');
        }

    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
