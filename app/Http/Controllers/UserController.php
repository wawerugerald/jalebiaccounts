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
    public function edit(User $user)
    {
        // Load the related company along with the user
        $user->load('company');
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
    //user delete function...
    public function destroy(User $id)
    {
        $id->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

}
