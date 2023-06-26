<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    //

    public function index ()
    {

        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    //user delete function...
    public function destroy(User $id)
    {
        $id->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

}
