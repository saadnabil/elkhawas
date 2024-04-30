<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactUsRequest;
use App\Models\ContactUs;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminContactUsController extends Controller
{
    public function index()
    {

        $data = ContactUs::latest()->paginate(8);

        $contact = new ContactUs();

        return response()->view('admin.settings.contactUs', compact('data','contact'));
    }
    public function create()
    {
    }
    public function store(ContactUsRequest $contactUsRequest)
    {
        try {
            $validatedData = $contactUsRequest->validated();
            
            $storeContact = ContactUs::findOrFail($validatedData);
    
            if ($storeContact) {
                session()->flash('success', 'Information created successfully');
                return redirect()->route('ContactUs.index');
            } else {
                return redirect()->back()->withErrors(['message' => 'Failed to create.'])->withInput();
            }
        } catch (\Exception $e) {
            Log::error('Error creating contact: ' . $e->getMessage());
            return redirect()->back()->withErrors(['message' => 'An unexpected error occurred. Please try again.'])->withInput();
        }
    }


    public function edit($id)
    {
        $contact = ContactUs::findOrFail(8);
        // This will print the ID and stop the execution

        return view('contactus.edit', compact('contact'));
    }

public function update(ContactUsRequest $contactUsRequest, )
{
    
        // Retrieve validated data from the request
        $validatedData = $contactUsRequest->validated();
        
        // Find the existing ContactUs record by ID from the request
        $contact = ContactUs::findOrFail(8);

        // Update the ContactUs record with the validated data
        $contact->update($validatedData);

        // Flash a success message and redirect to the index route
        session()->flash('success', 'Information updated successfully');
        return redirect()->route('ContactUs.index');
   
    
}

    public function destroy(Request $request,$id)
    {
        $contact = ContactUs::findOrFail($id);
        $delete = $contact->delete();
        session()->flash('success', ' Deleted successfully');
        return redirect()->route('ContactUs.index');
    }

   
    

    
    //
    
}
