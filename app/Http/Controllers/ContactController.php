<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Contact;
use \App\Models\Company;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('index', 'create', 'update', 'destroy');
    }

    public function index()
    {
        // \DB::enableQueryLog();
        $companies = Company::userCompanies();
        // dd(\DB::getQueryLog());
        $contacts = auth()->user()->contacts()->with('company')->latestFirst()->paginate(100);
        
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create()
    {
        $contact = new Contact();
        $companies = Company::userCompanies();

        return view('contacts.create', compact('companies', 'contact'));
    }


    public function store(ContactRequest $request)
    {

        // Contact::create($request->all() + ['user_id' => auth()->id()]); // first way of adding userId
        $request->user()->contacts()->create($request->all());

        return redirect()->route('contacts.index')->with('message', "Contact has been added successfully");
    }


    public function update(Contact $contact, ContactRequest $request)
    {

        // $request->validate($this->validationRules());

        // dd($request->all());

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('message', "Contact has been updated successfully");
    }

    public function show(Contact $contact)
    {
        // $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        $companies = Company::userCompanies();
        return view('contacts.edit', compact('contact', 'companies'));
    }

    public function destroy(Contact $contact) {
        $contact->delete();

        return redirect()->route('contacts.index')->with('message', "Contact has been deleted successfully");
    }
}
