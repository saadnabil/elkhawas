<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactUsRequest;
use App\Models\ContactUs;
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

            $storeContact = ContactUs::create($validatedData);

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


    public function edit(Request $request, $id)
{
    try {
        $contact = ContactUs::findOrFail($id);
        return view('admin.settings.contactUs', compact('contact'));
    } catch (\Exception $e) {
        Log::error('Error fetching contact: ' . $e->getMessage());
        return redirect()->back()->withErrors(['message' => 'Contact not found.'])->withInput();
    }
}

    public function update(ContactUsRequest $contactUsRequest,$id)
    {
        try {
            $validatedData = $contactUsRequest->validated();

            // Fetch the existing contact record
            $contact = ContactUs::findOrFail($id);

            // Update the attributes with the validated data
            $contact->update($validatedData);

            session()->flash('success', 'Information updated successfully');
            return redirect()->route('ContactUs.index');
        } catch (\Exception $e) {
            Log::error('Error updating contact: ' . $e->getMessage());
            return redirect()->back()->withErrors(['message' => 'An unexpected error occurred. Please try again.'])->withInput();
        }

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
