<?php

namespace App\Http\Controllers;

use App\Models\Ussd;
use Illuminate\Http\Request;
use App\Models\Whitelist;



class UssdController extends Controller
{
    // Show the list of USSD applications
    public function index()
    {
        $whitelistContacts = Ussd::all();
        return view('pages.whitelist-index', compact('whitelistContacts'));
    }

    // Show the form to create a new ussd content
    public function create()
    {
        return view('pages.whitelist-create');
    }
    // Store a new content in the database
    public function store(Request $request)
    {

        // dd($request->all());

        Ussd::create([
            'campaign' => $request->campaign,
            'shortcode' => $request->shortcode,
            'dbname' => $request->dbname,
        ]);

        return redirect()->route('whitelist.index')->with('success', 'Content added to USSD successfully!');
    }

    // Show the form to edit an existing contact
    public function edit($id)
    {
        $content = Ussd::findOrFail($id);
        return view('pages.whitelist-edit', compact('content'));
    }

    // Update the contact information in the database
    public function update(Request $request, $id)
    {
        $content = Ussd::findOrFail($id);

        $content->update($request->only('campaign','shortcode', 'dbname'));

// return 'success';
        return redirect()->route('whitelist.index')->with('success', 'Content updated successfully.');
    }

    // Delete the contact from the database
    public function destroy($id)
    {
        $content = Ussd::findOrFail($id);
        $content->delete();

        return redirect()->route('whitelist.index')->with('success', 'Content deleted successfully.');
    }

}
