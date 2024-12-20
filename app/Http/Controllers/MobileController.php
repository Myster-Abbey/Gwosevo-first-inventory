<?php

namespace App\Http\Controllers;

use App\Models\MobileApp;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    // Show the list of Web applications
    public function index()
    {
        $mobileContent = MobileApp::all();
        return view('pages.mobile-index', compact('mobileContent'));
    }

    // Show the form to create a new web app content
    public function create()
    {
        return view('pages.mobile-create');
    }
    // Store a new content in the database
    public function store(Request $request)
    {

    //  dd($request->all());

        MobileApp::create([
            'project' => $request->project,
            'dbname' => $request->dbname,
            'url' => $request->url,
            'server_name' => $request->server_name,

            // 'server' => 'server',
        ]);

        return redirect()->route('mobile.index')->with('success', 'Content added to Mobile Applications successfully!');
    }

    // Show the form to edit an existing contact
    public function edit($id)
    {
        $content = MobileApp::findOrFail($id);
        return view('pages.mobile-edit', compact('content'));
    }

    // Update the contact information in the database
    public function update(Request $request, $id)
    {
        $content = MobileApp::findOrFail($id);


        $content->update($request->only('project','database','url', 'server_name'));

        return redirect()->route('mobile.index')->with('success', 'Content updated successfully.');
    }

    // Delete the contact from the database
    public function destroy($id)
    {
        $content = MobileApp::findOrFail($id);
        $content->delete();

        return redirect()->route('mobile.index')->with('success', 'Content deleted successfully.');
    }
}
