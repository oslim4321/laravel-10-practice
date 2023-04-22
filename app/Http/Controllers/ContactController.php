<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        $contact = Contact::all();
        return response()->json([
            'contact' => $contact,
            'message' => 'contact listing',
            'code' => '200',
        ]);
    }
    public function getContact($id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            return response()->json($contact);
        } else {
            return response()->json([
                'message' => "contact with this id ($id) does not exist",
            ]);
        }
    }
    public function saveContact(Request $request)
    {
        try {
            Contact::create([
                "name" =>  $request->name,
                "email" =>  $request->email,
                "designation" =>  $request->designation,
                "contact_no" =>  $request->contact_no,
            ]);
            return response()->json([
                'message' => 'contact created successfully',
                'res' => $request,
                'code' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json('error');
        }
    }

    public function updateContact($id, Request $request)
    {
        try {
            $contact  = Contact::where('id', $id)->first();
            if ($contact) {
                $contact->name = $request->name;
                $contact->email = $request->email;
                $contact->designation = $request->designation;
                $contact->contact_no = $request->contact_no;
                $contact->save();
                return response()->json([
                    'message' => 'contact update successfully',
                    'code' => 200
                ]);
            } else {
                return response()->json([
                    'message' => 'no data found with this id'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'server error'
            ]);
        }
    }

    public function deleteContact($id)
    {
        try {
            $contact = Contact::find($id);
            if ($contact) {
                $contact->delete();
                return response()->json([
                    'message' => 'contact deleted successfully',
                    'code' => 200,
                ]);
            } else {
                return response()->json([
                    'message' => "contact with this id ($id) does not exist",
                    'code' => 200,
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json();
        }
    }
}
