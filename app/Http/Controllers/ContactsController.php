<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Contact;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
// use Path\To\SyncObject;

class ContactsController extends Controller
{
    public function index(): View
    {
        $contacts = Contact::all();
        return view('contact', ['contacts' => $contacts]);
    }

    public function destroy(Contact $contact): JsonResponse
    {
        $contact->delete();

        return response()->json(['message' => 'Contact deleted successfully']);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts|max:255',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip' => 'required|string|max:255',
        ]);


        $contact = Contact::create($validated);

        // Salesforce Implementation:

/*        SyncObject::objectName('Contact')
            ->id($contact->id)
            ->pushFields([
                'FirstName' => $validated['first_name'],
                'LastName' => $validated['last_name'],
                'Email' => $validated['email'],
                'Street' => $validated['street'],
                'City' => $validated['city'],
                'State' => $validated['state'],
                'PostalCode' => $validated['zip'],
            ])
            ->push();*/

        return response()->json(['message' => 'Contact created successfully', 'contact' => $contact]);
    }
}
