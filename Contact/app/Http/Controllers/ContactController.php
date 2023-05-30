<?php

namespace App\Http\Controllers;

use App\Http\Actions\Contact\Create;
use App\Http\Actions\Contact\Delete;
use App\Http\Actions\Contact\GetContacts;
use App\Http\Actions\Contact\GetContactsBySearch;
use App\Http\Actions\Contact\Update;
use App\Http\Requests\Contact\ContactCreate;
use App\Http\Resources\SearchedContactCollection;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    public function index() {
        $contacts = GetContacts::execute();

        return view('home', compact('contacts'));
    }

    public function search($search = '') {
        if(!$search) return response()->json(SearchedContactCollection::collection(GetContacts::execute()));

        return response()->json(GetContactsBySearch::execute($search));
    }

    public function create() {

        return view('contact.create');
    }

    public function store(ContactCreate $request) {

        return (new Create($request->all()))->execute();
    }

    public function edit($id) {
        $contact = Contact::where('id', decrypt($id))->first();

        return view('contact.edit', compact('contact'));
    }

    public function update(ContactCreate $request) {

        return (new Update($request->except('id', '_token'), decrypt($request->id)))
            ->execute();
    }

    public function destroy($id) {
        
        return (new Delete(decrypt($id)))->execute();
    }
}
