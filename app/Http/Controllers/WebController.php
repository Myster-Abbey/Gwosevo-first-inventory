<?php

namespace App\Http\Controllers;

use App\Models\Web;
use Illuminate\Http\Request;

class WebController extends Controller
{
 // Show the list of Web applications
 public function index()
 {
     $webContent = Web::all();
     return view('pages.web-index', compact('webContent'));
 }

 // Show the form to create a new web app content
 public function create()
 {
     return view('pages.web-create');
 }
 // Store a new content in the database
 public function store(Request $request)
 {

    //  dd($request->all());

     Web::create([
         'project' => $request->project,
         'dbname' => $request->dbname,
         'url' => $request->url,
         'server_name' => $request->server_name,
        //  'server' => 'server',
     ]);

     return redirect()->route('web.index')->with('success', 'Content added to Web Applications successfully!');
 }

 // Show the form to edit an existing contact
 public function edit($id)
 {
     $content = Web::findOrFail($id);
     return view('pages.web-edit', compact('content'));
 }

 // Update the contact information in the database
 public function update(Request $request, $id)
 {
     $content = Web::findOrFail($id);


     $content->update($request->only('project','database','url', 'server_name'));

     return redirect()->route('web.index')->with('success', 'Content updated successfully.');
 }

 // Delete the contact from the database
 public function destroy($id)
 {
     $content = Web::findOrFail($id);
     $content->delete();

     return redirect()->route('web.index')->with('success', 'Content deleted successfully.');
 }
}
