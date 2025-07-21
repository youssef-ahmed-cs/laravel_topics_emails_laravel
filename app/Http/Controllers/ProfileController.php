<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($request->hasFile('image')){
            $request->file('image')->store('profiles','public');
        }
        Profile::create($data);

        return response()->json([
            'message' => 'Profile created successfully',
            'profile' => $data
        ], 201);

    }

    public function show($id){
        $profile = Profile::where('user_id', $id)->first();
        return response()->json($profile,200);
    }
}
