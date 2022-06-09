<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        $notebook = [];

        try {
            $notebook = Note::all();
        } catch (Exception $e) {
            $request->session()->flash('error', $e->getMessage());
        }
        
        return view('notes-home', compact('notebook'));
    }

    public function showEditForm($id)
    {
        $reminder = Note::find($id);
        return view('edit-notes', compact('reminder'));
    }

    public function showNewForm()
    {
        return view('new-notes-form');
    }

    public function saveNoteChanges(Request $request)
    {
        try {
            $validated = $request->validate([
                'note' => 'required'
            ]);
            $id = $request->id;

            $reminder = Note::find($id);
            $result = $reminder->update([
                'note' => $request->note
            ]);

            if ($result == false) {
                $request->session()->flash('error', 'Unable to modify the record');
            } else {
                $request->session()->flash('message', 'Successfully updated record');
            }
        } catch (Exception $e) {
            $request->session()->flash('message', $e->getMessage());
        }

        return redirect('/notes-home');
    }

    public function saveNewNote(Request $request)
    {
        $validated = $request->validate([
            'note' => 'required'
        ]);

        $note = $request->note;
        
        $reminder = Note::create([            
            'note' => $note
        ]);

        if (!is_null($reminder)) {
            $request->session()->flash('message', 'New record has been added');
        } else {
            $request->session()->flash('error', 'Some Field are Missing');
        }

        return redirect('/notes-home');
    }

    public function deleteReminder(Request $request, $id)
    {
        $reminder = Note::find($id);
        if (!is_null($reminder)) {
            $reminder->delete();
            $request->session()->flash('message', 'Record has been deleted');
        } else {
            $request->session()->flash('error', 'Unable to delete the record');
        }

        return redirect('/notes-home');
    }

    public function showReminder($id)
    {
        $reminder = Note::find($id);
        return view('show-notes', compact('reminder'));
       
    }


}
