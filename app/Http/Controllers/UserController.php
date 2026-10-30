<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Manajemen Data User - PPKD Sticker";
        $datausers = User::orderBy('id', 'desc')->get();  // untuk menampilkan data user
        return view('admin.user.index', compact('title', 'datausers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah User -ppkd stiker";
        return view('admin.user.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $InputData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);


        // return $validated;
        User::create([
            'name' => $InputData['name'],
            'email' => $InputData['email'],
            'password' => $InputData['password'],
        ]);

        return redirect()->route('admin.user.index')->with('succes', 'Data berhasil ditambahkan');
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
    public function edit(User $user)
    {
        $title = "edit User - PPKD Sticker";
        return view('admin.user.edit', compact('title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $InputData = $request->validate([
            'name' => 'required|string',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => 'nullable|min:8'
        ]);
        $user->name = $InputData['name'];
        $user->email = $InputData['email'];
        if ($request->filled('password')) {
            $user->password = $InputData['password'];
        }
        $user->save();
        return redirect()->route('admin.user.index')->with('succes', "data user berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('admin.user.index');
    }
}
