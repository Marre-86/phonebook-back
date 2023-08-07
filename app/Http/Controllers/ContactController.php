<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        return Contact::all();
    }

    public function show(Contact $contact)
    {
        return $contact;
    }

    public function store(Request $request)
    {
        try {
            $contact = Contact::create($request->all());
        } catch (\Illuminate\Database\QueryException $exception) {
            return response()->json([
                'message' => 'Bad request. Probably not enough of required fields'
            ], 400);
        }

        return response()->json($contact, 201);
    }

    public function update(Request $request, Contact $contact)
    {
        $contact->update($request->all());

        return response()->json($contact, 200);
    }

    public function delete(Contact $contact)
    {
        $contact->delete();

        return response()->json(null, 204);
    }
}
