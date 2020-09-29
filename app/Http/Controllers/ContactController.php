<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ContactRequest;

use App\Models\Contact;

class ContactController extends Controller
{
    public function submit(ContactRequest $req) {
      // $validation = $req->validate([
      //   'name' => 'required|min:2|max:20',
      //   'message' => 'required|min:10|max:500'
      // ]);
      // dd($req->input('message'));
      $contact = new Contact();
      $contact->name = $req->input('name');
      $contact->email = $req->input('email');
      $contact->message = $req->input('message');
      $contact->save();
      return redirect()->route('feedback')->with('succes', 'Отзыв отправлен');
    }

    public function allData() {
      $messages = new Contact;
      return view('messages', ['data' => $messages
        ->orderBy('id')->get()
      ]);
    }

    public function showOneMessage($id) {
      $messages = new Contact;
      return view('onemessage', ['data' => $messages
        ->find($id)
      ]);
    }
}
