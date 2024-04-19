<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(8);
        return response()->view('admin.users.index', compact('users'));
    }
    public function create()
    {
        $action = route('users.store');
        $users = new User();

        $langs = availableLanguages();
        return response()->view('admin.users.form', compact('langs', 'action','users'));
    }
    public function store(UserRequest $userRequest)
    {
        // Validate user input
        $validatedData = $userRequest->validated();

        // Remove 'confirmpassword' from the data array
        unset($validatedData['confirmpassword']);

        // Handle image upload
        if ($userRequest->hasFile('image')) {
            $file = $userRequest->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $validatedData['image'] = $fileName;
        }

        // Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Create user
        $user = User::create($validatedData);

        // Check if user was created successfully
        if ($user) {
            session()->flash('success', 'User created successfully');
            return redirect()->route('users.index');
        } else {
            return redirect()->back()->withErrors(['message' => 'Failed to create user.'])->withInput();
        }
    }




    public function edit(Request $request, $id)
    {

        $method = true;
        $langs = availableLanguages();
        $action = route('users.update', $id);
        $users = User::findOrFail($id);
        return response()->view('admin.users.form', compact('users', 'langs', 'action', 'method'));
    }
    public function update(UserRequest $userRequest, $id)
    {
        // Validate user input
        $validatedData = $userRequest->validated();

        // Remove 'confirmpassword' from the data array
        unset($validatedData['confirmpassword']);

        // Retrieve the user from the database
        $user = User::findOrFail($id);

        // Handle image upload
        if ($userRequest->hasFile('image')) {
            $file = $userRequest->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $validatedData['image'] = $fileName;
        }

        // Hash the password if provided
        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            // If password is not provided, keep the existing password
            unset($validatedData['password']);
        }

        // Update user attributes
        $user->update($validatedData);

        // Check if user was updated successfully
        if ($user) {
            session()->flash('success', 'User updated successfully');
            return redirect()->route('users.index');
        } else {
            return redirect()->back()->withErrors(['message' => 'Failed to update user.'])->withInput();
        }
    }





    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $delete = $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }


    //
}
