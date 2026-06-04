<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Http\Resources\HallResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HallController extends Controller
{
    public function index(Request $request)
    {
        $query = Hall::query();
        if ($request->has('search')) {
            $query->where('name', 'like', "%{$request->search}%");
        }
        return HallResource::collection($query->get());
    }

    public function add(Request $request)
    {
        $request->validate([
            'cultural_center_id' => 'required|exists:cultural_centers,id',
            'name' => 'required|string',
            'capacity' => 'required|integer',
            'features' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
         
        $data = $request->only(['cultural_center_id', 'name', 'capacity', 'features']);
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('halls', 'public');
        }

        $hall = Hall::create($data);
        return response()->json(['success' => true, 'data' => $hall], 201);
    }

    public function edit(Request $request, $id)
    {
        $hall = Hall::findOrFail($id);
        $request->validate(['name' => 'sometimes', 'capacity' => 'sometimes|integer']);
        
        $data = $request->only(['name', 'capacity', 'features']);
        if ($request->hasFile('avatar')) {
            if ($hall->avatar) Storage::disk('public')->delete($hall->avatar);
            $data['avatar'] = $request->file('avatar')->store('halls', 'public');
        }

        $hall->update($data);
        return response()->json(['success' => true, 'data' => $hall], 200);
    }

    public function remove($id)
    {
        $hall = Hall::findOrFail($id);
        if ($hall->avatar) Storage::disk('public')->delete($hall->avatar);
        $hall->delete();
        return response()->json(['success' => true], 200);
    }
    
}