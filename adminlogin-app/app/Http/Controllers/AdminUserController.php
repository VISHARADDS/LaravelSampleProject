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
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/adminUser')->with('success', 'Login successful!');
        } else {
            // Authentication failed...
            return redirect()->back()->withErrors(['error' => 'Invalid email or password.']);
        }
    }

    public function showLoginForm()
    {
        return view('adminUser.create');
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

    // Hash the password only once
    $hashedPassword = Hash::make($validatedData['password']);

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
        return redirect('register')->with('success', 'User added successfully!');
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
    public function destroy(string $id)
    {
        //
    }
}
