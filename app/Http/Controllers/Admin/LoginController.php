<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\loginAdminPost;
use App\Models\Admin;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $data['login_fail'] = $request->session()->get('login_fail'); //$data['login_fail'] = $_SESSION['login_fail'];
        return view('admin.login.index', $data);
    }

    public function login(loginAdminPost $request, Admin $admin)
    {
        // dd($request->all());
        $username = $request->input('username');
        $username = strip_tags($username);
        $password = $request->input('password');
        $password = strip_tags($password);
        
        // validation

        // check login
        $infoAdmin = $admin->checkLoginAdmin($username, $password);

        if($infoAdmin){
            // session         
            $request->session()->put('admin.id', $infoAdmin->id); // $_SESSION['admin']['id'] = $infoAdmin->id;
            $request->session()->put('admin.username', $infoAdmin->username);
            $request->session()->put('admin.first_name', $infoAdmin->first_name);
            $request->session()->put('admin.email', $infoAdmin->email);
            $request->session()->put('admin.role', $infoAdmin->role);

            // session([
            //     'admin.id' => $infoAdmin->id,
            //     'admin.username' => $infoAdmin->username,
            //     'admin.first_name' => $infoAdmin->first_name,
            //     'admin.email' => $infoAdmin->email,
            //     'admin.role' => $infoAdmin->role
            // ]);
            // dd($request->session()->all());
            
            // update field last_login
            $admin->updateLastLogin($infoAdmin->id);

            return redirect()->route('admin.dashboard.index');
        }
        return back()->with('login_fail', 'Username hoặc Password không đúng');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin'); // unset($_SESSION['admin']);
        // $request->session()->flush();

        return redirect()->route('admin.login.index');
    }
}
