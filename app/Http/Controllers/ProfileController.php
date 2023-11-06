<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravolt\Avatar\Avatar;
use Mockery\Matcher\HasKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index', [
            'title' => 'Profile',
        ]);
    }

    public function settings()
    {
        return view('profile.settings', [
            'title' => 'Profile Settings',
        ]);
    }

    public function edit()
    {
        return view('profile.index', [
            'title' => 'Profile Edit',
        ]);
    }

    public function changePassword()
    {
        return view('profile.settings', [
            'title' => 'Profile Settings',
        ]);
    }

    public function storePassword(Request $request)
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Old password not match with your current password.');
        }

        if ($request->new_password != $request->repeat_password) {
            return back()->with('error', 'New password and repeat password not match.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile.settings')->with('success', 'Password successfully changed.');
    }

    public function update(Request $request)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'position' => 'required',
            'contact' => 'required',
            'birthday' => 'required',
        ]);

        if ($validatedData) {
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->address = $validatedData['address'];
            $user->position = $validatedData['position'];
            $user->contact = $validatedData['contact'];
            $user->birthday = $validatedData['birthday'];
            // Simpan foto profil
            if ($request->hasFile('photo_path')) {
                $profilePicture = $request->file('photo_path');
                $fileName = time() . '_' . $profilePicture->getClientOriginalName();
                $profilePicture->storeAs('public/profiles', $fileName);

                $user->photo_path = $fileName;
            }

            $user->save();
            return redirect()->route('profile')->with('success', 'User profile updated successfully!');
        }
    }

    public function deleteProfilePhoto()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        if ($user->photo_path) {
            // Hapus foto profil dari penyimpanan
            Storage::delete('public/profiles/' . $user->photo_path);

            // Set kolom 'profile_picture' menjadi null di tabel pengguna
            DB::table('users')
                ->where('id', $user_id)
                ->update(['photo_path' => null]);
        }
        return back()->with('success', 'Profile photo successfully deleted.');
    }

    public function delete()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        if ($user) {
            $user->delete();
            Auth::logout();
            return redirect()->route('login')->with('success', 'Account successfully deleted.');
        }
        return redirect()->route('employee')->with('error', 'Account not found.');
    }
}
