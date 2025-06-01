<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminContactUsController extends Controller
{
    public function index()
    {
        $contacts = \App\Models\ContactUs::latest()->get();
        return view('admin.contact-us.index', compact('contacts'));
    }

    public function destroy($id)
    {
        $contact = \App\Models\ContactUs::findOrFail($id);
        $contact->delete();

        return redirect()->back()->withToastSuccess('Contact message deleted successfully.');
    }
}
