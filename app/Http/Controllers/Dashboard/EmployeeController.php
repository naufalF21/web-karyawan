<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('dashboard.employees.index', [
            'title' => 'Dashboard Employees',
            'users' => $users,
        ]);
    }

    public function add()
    {
        return view('dashboard.employees.add', [
            'title' => 'Dashboard Employees'
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.employees.edit', [
            'title' => 'Dashboard Employees',
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => ['sometimes', 'required', 'email:rfc,dns', ($request->email === $user->email) ? '' : 'unique:users,email', 'max:255'],
            'role' => 'required',
            'address' => 'required',
            'position' => 'required',
            'contact' => 'required',
            'divisi' => 'required',
            'birthday' => 'required',
        ]);

        if (!$validatedData) {
            return redirect()->route('employee.update')
                ->withErrors($validatedData)
                ->withInput();
        }

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->role = $validatedData['role'];
        $user->address = $validatedData['address'];
        $user->position = $validatedData['position'];
        $user->contact = $validatedData['contact'];
        $user->divisi = $validatedData['divisi'];
        $user->birthday = $validatedData['birthday'];

        $user->save();
        return redirect()->route('employee')->with('success', 'User profile updated successfully!');
    }

    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255|confirmed'
        ]);

        if ($validatedData->fails()) {
            return redirect()->route('employee.add')
                ->withErrors($validatedData)
                ->withInput();
        }

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')), // Enkripsi password menggunakan bcrypt
        ]);

        return redirect()->route('employee')->with('success', 'Adding an employee successfully!');
    }

    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('employee')->with('success', 'Account successfully deleted.');
        }
        return redirect()->route('employee')->with('error', 'Account not found.');
    }
}
