<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\ValidateAdminLogin;
use App\Services\Admins\AdminAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminsAuthController extends Controller
{
    protected $adminAuthService;
    public function __construct(AdminAuthService $adminAuthService)
    {
        $this->adminAuthService = $adminAuthService;
    }
    public function showloginform(){
        $route = route('admin.login');
        return view('layout.auth.login', compact('route'));
    }
    public function login(ValidateAdminLogin $request){
        $credentials = $request->validated();
        $response = $this->adminAuthService->makeLogin($credentials);
        // Authentication failed...
        if(isset($response['error'])){
            return redirect()->route('admin.showloginform')->withErrors(['login' => $response['error']])->withInput($request->only('login'));
        }
        return redirect()->route('admindashboard.index');
    }
    public function logout(Request $request){
        auth('admin')->logout();
        return redirect()->route('admin.showloginform');
    }
}
