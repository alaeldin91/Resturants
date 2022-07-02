<?php

namespace App\Http\Controllers;

use App\Models\BranchModel;
use Illuminate\Http\Request;

class ManageBranchControll extends Controller
{
    public function AddBranch(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phoneNumber' => ['required', 'string'],
            'email' => ['required', 'email', 'string'],
            'description' => ['required', 'string', 'min:10'],
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        $branch = new BranchModel();
        $branch->name = $request->name;
        $branch->phoneNumber = $request->phoneNumber;
        $branch->email = $request->email;
        $branch->description = $request->phoneNumber;
        $file  = $request->file('image');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('owner_images/branch'), $filename);
        $branch->image = $filename;
        if ($branch->save()) {
            return response()->json(['message' => 'Successfully Save Branch', 'status_code' => 201], 201);
        } else {
            return response()->json(['message' => 'Error Occurs', 'status_code' => 500], 500);
        }
    }
}
