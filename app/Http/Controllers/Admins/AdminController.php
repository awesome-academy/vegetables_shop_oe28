<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Models\Category;
use App\Models\ImportBill;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        $c_product = Product::count();
        $c_post = Post::count();
        $c_supplier = Supplier::count();
        $c_category = Category::count();
        $c_order = Order::count();
        $c_importBill = ImportBill::count();
        return view('admin.dashboard', compact(['c_product', 'c_post', 'c_supplier', 'c_category', 'c_order', 'c_importBill']));
    }

    public function switchLanguage($locale)
    {
        Session::put('locale', $locale);

        return redirect()->back();
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(AdminLoginRequest $request)
    {
        $role_admin = config('role.admin');
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => $role_admin,
        ];
        if (Auth::attempt($login)) {
            return redirect()->route('dashboard')->with('success', trans('messages.login_success'));
        } else {
            return redirect()->back()->with('status', trans('messages.login_fail'));
        }
    }

    public function getLogout()
    {
        Auth::logout();

        return redirect()->route('admin.get_login')->with('success', trans('messages.logout_success'));
    }
}
