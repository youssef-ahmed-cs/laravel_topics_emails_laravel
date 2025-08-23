<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Property;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::withCount('properties')->paginate(15);
        return view('owners.index', compact('owners'));
    }

    public function show($id)
    {
        $owner = Owner::with('properties')->findOrFail($id);
        return view('owners.show', compact('owner'));
    }

    public function edit($id)
    {
        $owner = Owner::with('properties')->findOrFail($id);
        $properties = Property::all();
        return view('owners.edit', compact('owner', 'properties'));
    }

    public function update(Request $request, $id)
    {
        $owner = Owner::findOrFail($id);

        $owner->update([
            'name' => $request->name,
        ]);

        if ($request->has('property_ids')) {
            $owner->properties()->sync($request->property_ids);
        } else {
            $owner->properties()->sync([]);
        }

        return redirect()->route('owners.show', $owner->id)
                         ->with('success', 'Owner updated successfully');
    }
}
