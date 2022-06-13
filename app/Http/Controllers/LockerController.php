<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locker;
use App\Models\User;

class LockerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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

    public function indexTwo()
    {
        $user = [];

        try {
            $user = User::all();
        } catch (Exception $e) {
            $request->session()->flash('error', $e->getMessage());
        }
        
        return view('user-register', compact('user'));
    }
   
    public function history()
    {
        $storage = [];
        $storage = Locker::all();
        return view('history', compact('storage'));
    }

    public function showEditForm($id)
    {
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
                $request->session()->flash('message', 'Successfully updated locker');
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
            'input_password' => 'required'
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
            $request->session()->flash('message', 'New locker has been added');
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
            $request->session()->flash('message', 'Locker has been deleted');
        } else {
            $request->session()->flash('error', 'Unable to remove the locker');
        }

        return redirect('/lockers');
    }

    public function showLocker($id)
    {
        $locker = Locker::find($id);
        return view('show-locker', compact('locker'));
       
    }
}
