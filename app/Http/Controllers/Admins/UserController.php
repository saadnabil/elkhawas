<?php

namespace App\Http\Controllers\Admins;

use App\Exports\UserExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Imports\UserImport;
use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Stmt\Return_;

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


    public function importUser(Request $request)
    {
        // Check if the file exists in the request
        $file = $request->file('file');
        
        if ($file) {
            try {
                // Specify the file type explicitly if needed (e.g., 'Csv', 'Xlsx', 'Xls')
                Excel::import(new UserImport, $file, null, 'Csv');
                
                return redirect()->back()->with('success', 'File imported successfully!');
            } catch (\Exception $e) {
                // Handle the exception and return an error message
                return redirect()->back()->with('error', 'Error importing file: ' . $e->getMessage());
            }
        } else {
            return redirect()->back()->with('error', 'No file provided.');
        }
    }
    


public function exportUser (Request $request){
   
     return Excel::download(new UserExport, 'users.xlsx');

}



public function inactive(){
    return view('admin.inActive_Admin');
}


public function forgotpassword(){
    return view('layout.auth.forgot-password');
}


    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $delete = $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }


    //
}
