<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class UserContactUsController extends Controller
{
    public function user() {
        $contact = ContactUs::orderBy('id','ASC')->first();
        return response()->view('user.settings.contactus',compact('contact'));
    }
    public function create() {}
    public function store() {}
    public function edit() {}
    public function update() {}
    public function destroy() {}

    //
}
