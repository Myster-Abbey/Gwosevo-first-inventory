<?php

namespace App\Http\Controllers;

use App\Models\Whitelist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class WhitelistController extends Controller
{

    // Show the list of whitelist contacts
    public function index()
    {
        $whitelistContacts = Whitelist::all();
        return view('pages.whitelist-index', compact('whitelistContacts'));
    }

    // Show the form to create a new whitelist contact
    public function create()
    {
        return view('pages.whitelist-create');
    }

    // Store a new contact in the database
    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|unique:whitelists|regex:/^(\+?\d{1,3}[- ]?)?\d{10}$/',
            'name' => 'required|string|max:255',
        ]);

        // Remove leading '0' from the msisdn field (if present)
        $msisdn = ltrim($request->phone_number, '0');

        if (!Str::startsWith($msisdn, '233')) {
            $msisdn = '233' . $msisdn;
        }

        Whitelist::create([
            'phone_number' => $msisdn,
            'name' => $request->name,
        ]);
        return redirect()->route('whitelist.index')->with('success', 'Contact added to whitelist successfully!');
    }

    // Show the form to edit an existing contact
    public function edit($id)
    {
        $contact = Whitelist::findOrFail($id);
        return view('pages.whitelist-edit', compact('contact'));
    }

    // Update the contact information in the database
    public function update(Request $request, $id)
    {
        $contact = Whitelist::findOrFail($id);

        $request->validate([
            'phone_number' => 'required|regex:/^(\+?\d{1,3}[- ]?)?\d{10}$/|unique:whitelists,phone_number,' . $id,
            'name' => 'required|string|max:255',
        ]);

        $contact->update($request->only('phone_number', 'name'));

        return redirect()->route('whitelist.index')->with('success', 'Contact updated successfully.');
    }

    // Delete the contact from the database
    public function destroy($id)
    {
        $contact = Whitelist::findOrFail($id);
        $contact->delete();

        return redirect()->route('whitelist.index')->with('success', 'Contact deleted successfully.');
    }
}
