<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();
        return view('accounts.index', compact('accounts'));
    }

    public function create()
    {
        return view('accounts.create');
    }

    public function store(Request $request)
    {
        Account::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'role' => $request->role
        ]);
        return redirect()->route('accounts.index');
    }

    public function edit($username)
    {
        $account = Account::findOrFail($username);
        return view('accounts.edit', compact('account'));
    }

    public function update(Request $request, $username)
    {
        $account = Account::findOrFail($username);
        $account->update([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'role' => $request->role
        ]);
        return redirect()->route('accounts.index');
    }

    public function destroy($username)
    {
        Account::destroy($username);
        return redirect()->route('accounts.index');
    }
}
