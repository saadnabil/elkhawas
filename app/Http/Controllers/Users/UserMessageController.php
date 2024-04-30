<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\inqueryAdminMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserMessageController extends Controller
{

    public function indexMessageUser($admin_id, $message_id){
        
        $messageIncrease = inqueryAdminMessage::findOrFail($message_id);
        
        // Mark the message as read
        $messageIncrease->is_read = 1;
        $messageIncrease->save();



        $messages = inqueryAdminMessage::where('admin_id', auth()->id())
        ->orderBy('created_at', 'desc')
        ->get();
        
        $inqueryMessage = inqueryAdminMessage::orderBy('id','ASC')->first();

        $message = inqueryAdminMessage::with('admin')
        ->where('admin_id', $admin_id)
        ->where('id', $message_id)
        ->first();
        
        return view('user.settings.inqueryUserMessage',compact('messages','inqueryMessage','message'));
    }

    // public function NavbarMessage()
    // {
    //     $messages = inqueryAdminMessage::where('admin_id', auth()->id())
    //         ->orderBy('created_at', 'desc')->get();
    //     return view('user.home', compact('messages'));
    // }


    // public function storMessage(Request $request){
    //     $validator = Validator::make($request->all(), [
    //         'admin_id' => 'required|integer', 
    //         'subject' => 'required|string|max:255', 
    //         'message' => 'required|string',
    //     ]);
        
    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 400);
    //     }

    //     else{

    //         $InquiryStore = new inqueryAdminMessage();

    //         $InquiryStore->admin_id = $request->admin_id;
    //         $InquiryStore->subject = $request->subject;
    //         $InquiryStore->message = $request->message;

    //         $save = $InquiryStore->save();
    //         return redirect()->back()->with('success','your message sent successfully');

    //     }
    // }


    
public function deleteAllReadMessages(Request $request) {
    inqueryAdminMessage::where('is_read', 1)->delete();
    
    // Return a JSON response or a view redirect as needed
    return redirect()->back()->with('success','Read Message Is Deleted');
}


    
    //
}
