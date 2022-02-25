<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function index()
    {


        return view("admin.profile.index");
    }

    public function update(Request $request)
    {

        $user = Auth::user();
        $request->validate([
            "name" => "required",
            "email" => "email|required|unique:users,email," . $user->id
        ]);



        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->route("admin.profile")->withToastSuccess('Successfully Updated!');
    }


    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'password' => 'required|min:8',
        ]);
        $user->update([
            $user->password = bcrypt($request->password)
        ]);

        return redirect()->route("admin.profile")->withToastSuccess("Password Updated Succefully");
    }
}
