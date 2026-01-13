<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // List all users
    public function index()
    {
        // We use latest() to see the newest registrations first
        // and paginate() because an admin might have thousands of users
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    // Delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Security: Prevent Admin from deleting themselves!
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own admin account.');
        }

        $user->delete();
        return back()->with('success', 'User has been removed successfully.');
    }
}