<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\inqueryAdminMessage;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageInquiresController extends Controller
{

    public function indexMessage($user_id, $message_id){
        
        $messageIncrease = Inquiry::findOrFail($message_id);
        
        // Mark the message as read
        $messageIncrease->is_read = 1;
        $messageIncrease->save();



        $messages = Inquiry::where('user_id', auth()->id())
        ->orderBy('created_at', 'desc')
        ->get();

        $inqueryMessage = Inquiry::orderBy('id','ASC')->first();

        $message = Inquiry::with('user')
        ->where('user_id', $user_id)
        ->where('id', $message_id)
        ->first();

        return view('admin.settings.InqueryMessageAdmin', compact('messages','inqueryMessage','message'));
    }


    public function NavbarMessage()
{
    $inqyey = Inquiry::latest()->paginate(6);
    // Fetch the current user's messages. Adjust the query based on your database schema.
    $messages = Inquiry::where('user_id', auth()->id())
        ->orderBy('created_at', 'desc')
        ->get();

    // Pass the messages to the view
    return view('admin.home', compact('messages','inqyey'));
}


public function RepleyMessageToUser(Request $request,$userId) {
    $validator = Validator::make($request->all(), [
        'admin_id' => 'required|integer', 
        'user_id' => 'required|integer', // Assuming you have user_id in the request
        'subject' => 'required|string|max:255', 
        'message' => 'required|string',
    ]);
    
    if ($validator->fails()) {
        $userMessages = InqueryAdminMessage::where('user_id', $userId)->get();

        // Handle validation failure
        return response()->json(['errors' => $validator->errors()], 400);
    }
    
    else {
        $inquiryStore = new InqueryAdminMessage(); // I corrected the class name to follow conventions
        
        $inquiryStore->admin_id = $request->admin_id;
        $inquiryStore->user_id = $request->user_id; // Storing the user_id who sent the message
        $inquiryStore->subject = $request->subject;
        $inquiryStore->message = $request->message;
        
        $inquiryStore->save();
    
    
        return redirect()->back()->with('success','your message sent successfully');

    }
                
}




public function deleteAllReadMessages(Request $request) {
    Inquiry::where('is_read', 1)->delete();
    
    // Return a JSON response or a view redirect as needed
    return redirect()->back()->with('success','Read Message Is Deleted');
}





}
