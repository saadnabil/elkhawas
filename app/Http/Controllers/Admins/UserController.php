<?php

namespace App\Http\Controllers\Admins;

use App\Exports\UserExport;
use App\Helpers\FileHelper;
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
    function __construct()
    {
         $this->middleware('permission:user-list', ['only' => ['index']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
         $this->middleware('permission:user-export', ['only' => ['export']]);
    }

    public function index()
    {
        $users = User::latest()->paginate(8);
        return response()->view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $action = route('users.store');
        $user = new User();
        $langs = availableLanguages();
        return response()->view('admin.users.form', compact('langs', 'action','user'));
    }


    public function store(UserRequest $userRequest)
    {
        // Validate user input
        $validatedData = $userRequest->validated();

        // Remove 'confirmpassword' from the data array
        unset($validatedData['confirmpassword']);

        // Handle image upload
        if(isset($validatedData['image'])){
            $validatedData['image'] = FileHelper::upload_file('users', $validatedData['image']);
        }

        // Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);

        $validatedData['usercode'] = generate_code_unique();

        // Create user
        User::create($validatedData);

        session()->flash('success', 'User created successfully');
        return redirect()->route('users.index');

    }


    public function edit(Request $request, User $user)
    {
        $method = true;
        $langs = availableLanguages();
        $action = route('users.update', $user);
        return response()->view('admin.users.form', compact('user', 'langs', 'action', 'method'));
    }
    public function update(UserRequest $userRequest, User $user)
    {
        // Validate user input
        $validatedData = $userRequest->validated();

        // Remove 'confirmpassword' from the data array
        unset($validatedData['confirmpassword']);

       // Handle image upload
       if(isset($validatedData['image'])){
            $validatedData['image'] = FileHelper::update_file('users', $validatedData['image'], $user->image);
        }

        // Hash the password if provided
        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }
        unset($validatedData['password']);

        // Update user attributes
        $user->update($validatedData);

        session()->flash('success', 'User updated successfully');

        return redirect()->route('users.index');

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

    public function destroy(Request $request, User $user)
    {
        $user->delete();
        session()->flash('success', __('translation.Item deleted successfully'));
        return redirect()->route('users.index');
    }

}
