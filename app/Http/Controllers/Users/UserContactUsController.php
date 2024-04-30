<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserContactUsController extends Controller
{
    public function user() {
        $contact = ContactUs::orderBy('id','ASC')->first();
        return response()->view('user.settings.contactus',compact('contact'));
    }
    public function create() {

    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer', 
            'subject' => 'required|string|max:255', 
            'message' => 'required|string',
        ]);
        
        if ($validator->fails()) {
            // Handle validation failure
            return response()->json(['errors' => $validator->errors()], 400);
        }

        else{

            $InquiryStore = new Inquiry();

            $InquiryStore->user_id = $request->user_id;
            $InquiryStore->subject = $request->subject;
            $InquiryStore->message = $request->message;

            $save = $InquiryStore->save();
            return redirect()->back()->with('success','your message sent successfully');

        }
        			
    }
    public function edit() {}
    public function update() {}
    public function destroy() {}

    //
}
