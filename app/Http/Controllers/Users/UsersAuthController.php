<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\ValidateUserLogin;
use App\Services\Users\UserAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersAuthController extends Controller
{
    protected $userAuthService;

    public function __construct(UserAuthService $userAuthService)
    {
        $this->userAuthService = $userAuthService;
    }

    public function showloginform(){
        $route = route('user.login');
        return view('layout.auth.login', compact('route'));
    }

    public function login(ValidateUserLogin $request){
        $credentials = $request->validated();
        $response = $this->userAuthService->makeLogin($credentials);
        // Authentication failed...
        if(isset($response['error'])){
            return redirect()->route('user.showloginform')->withErrors(['login' => $response['error']])->withInput($request->only('login'));
        }
        return redirect()->route('user.items.index');
    }


    public function UserShowPassword(){
        return response()->view('user.settings.changepassword');

    }

    public function UserChangePassword(Request $request)
    {
        $user = auth()->guard('web')->user();
    
        // Validate user input
        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|different:current_password',
            'confirm_password' => 'required|string|min:6|same:new_password',
            'image' => 'nullable|image|mimes:png,jpg,gif,svg|max:2048',
        ]);
    
        // Check if the current password matches the one provided
        if (!Hash::check($validatedData['current_password'], $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.'])->withInput();
        }
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
    
            // Move the file to the 'images' directory
            if ($file->move(public_path('images'), $fileName)) {
                // Store the image file name in the validated data
                $validatedData['image'] = $fileName;
            } else {
                // If the file upload fails, redirect back with an error message
                return redirect()->back()->withErrors(['image' => 'Failed to upload image. Please try again.'])->withInput();
            }
        }
    
        // Update the user's password
        $user->password = Hash::make($validatedData['new_password']);
    
        // If image was uploaded, update the user record
        if (isset($validatedData['image'])) {
            $user->image = $validatedData['image'];
        }
    
        // Save the user record
        $user->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Password changed successfully.');
    }
    





    public function deactivatedAccount(){
        return response()->view('user.inactive-account');
    }



    public function logout(Request $request){
        auth()->logout();
        return redirect()->route('user.showloginform');
    }

}
