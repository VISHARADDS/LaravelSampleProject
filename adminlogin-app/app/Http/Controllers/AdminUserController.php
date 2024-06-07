<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;


class AdminUserController extends Controller
{



    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        $adminUser = AdminUser::where('email', $credentials['email'])->first();

        if ($adminUser && $credentials['password'] === $adminUser->password) {
            // Assuming you want to set some session or authentication here
            // For example:
            // session(['admin_user' => $adminUser->id]);

            Log::info('User logged in: ' . $adminUser->email);
            return redirect('/adminUser')->with('success', 'Logged in successfully!');
        } else {
            return redirect()->back()->withErrors(['error' => 'Invalid email or password.']);
        }
    }




    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
       $adminUser = AdminUser::all();
       return view ('adminUser.index')->with('adminUser', $adminUser);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('adminUser.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
{
    $validatedData = $request->validate([
        'email' => 'required|string|email|max:255|unique:admin_users',
        'password' => 'required|string|min:8|confirmed',
        'name' => 'required|string|max:255',
    ]);


    $adminUser = AdminUser::create([
        'email' => $validatedData['email'],
        'password' => $validatedData['password'],
        'name' => $validatedData['name'],
        'dob' => '', // default date
        'nic' => '', // default empty value
        'mobile' => '', // default empty value
    ]);

    if ($adminUser) {
        \Log::info('User added to database: ' . $adminUser->email);
        return redirect('/login/register')->with('success', 'User added successfully!');
    } else {
        \Log::error('Error adding user to database');
        return redirect()->back()->withInput()->withErrors(['error' => 'Failed to add user. Please try again.']);
    }
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
{

    $adminUser = AdminUser::find($id);


    // Check if the user exists
    if (!$adminUser) {
        // Redirect back with error message if user not found
        return redirect()->back()->withErrors(['error' => 'User not found.']);
    }

    // Delete the user
    $adminUser->delete();

    // Redirect back with success message
    return redirect()->back()->with('success', 'User deleted successfully!');
}
}
