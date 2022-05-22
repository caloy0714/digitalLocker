<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locker;

class LockerController extends Controller
{
    public function index()
    {
        $storage = [];

        try {
            $storage = Locker::all();
        } catch (Exception $e) {
            $request->session()->flash('error', $e->getMessage());
        }
        
        return view('lockers', compact('storage'));
    }

    public function showEditForm($id)
    {
        // SELECT * FROM friends WHERE id=$id
        $locker = Locker::find($id);
        return view('edit-locker', compact('locker'));
    }

    public function showNewForm()
    {
        return view('new-locker-form');
    }

    public function saveLockerChanges(Request $request)
    {
        try {
            $validated = $request->validate([
                'website_name' => 'required',
                'username' => 'required',
                'input_password' => 'required|max:20'
            ]);
            $id = $request->id;

            $locker = Locker::find($id);
            $result = $locker->update([
                'website_name' => $request->website_name,
                'username' => $request->username,
                'input_password' => $request->input_password
            ]);

            if ($result == false) {
                $request->session()->flash('error', 'Unable to modify the record');
            } else {
                $request->session()->flash('message', 'Successfully updated record');
            }
        } catch (Exception $e) {
            $request->session()->flash('message', $e->getMessage());
        }

        return redirect('/lockers');
    }

    public function saveNewLocker(Request $request)
    {
        $validated = $request->validate([
            'website_name' => 'required|max:100',
            'username' => 'required',
            'input_password' => 'required|max:20'
        ]);

        $website_name = $request->website_name;
        $username = $request->username;
        $input_password=$request->input_password;
        
        $locker = Locker::create([            
            'website_name' => $website_name,
            'username' => $username,
            'input_password' => $input_password
        ]);

        if (!is_null($locker)) {
            $request->session()->flash('message', 'New friend record has been added into the database');
        } else {
            $request->session()->flash('error', 'Some Field are Missing');
        }

        return redirect('/lockers');
    }

    public function deleteLocker(Request $request, $id)
    {
        $locker = Locker::find($id);
        if (!is_null($locker)) {
            $locker->delete();
            $request->session()->flash('message', 'Record has been deleted');
        } else {
            $request->session()->flash('error', 'Unable to remove the record');
        }

        return redirect('/lockers');
    }

    public function showLocker($id)
    {
        $locker = Locker::find($id);
        return view('show-locker', compact('locker'));
       
    }
}
