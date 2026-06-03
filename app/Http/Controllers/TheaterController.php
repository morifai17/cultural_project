<?php

namespace App\Http\Controllers;

use App\Models\Theater;
use App\Http\Resources\TheaterResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TheaterController extends Controller
{
    // عرض المسارح (يمكن ربطها بـ cultural_center_id للفلترة)
    public function index(Request $request)
    {
        $query = Theater::query();
        if ($request->has('center_id')) {
            $query->where('cultural_center_id', $request->center_id);
        }
        return TheaterResource::collection($query->get());
    }

    public function add(Request $request)
    {
        $request->validate([
            'cultural_center_id' => 'required|exists:cultural_centers,id',
            'name' => 'required|string',
            'capacity' => 'required|integer',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('avatar');
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('theaters', 'public');
        }

        $theater = Theater::create($data);
        return response()->json(['success' => true, 'data' => new TheaterResource($theater)], 201);
    }

    public function edit(Request $request, $id)
    {
        $theater = Theater::findOrFail($id);
        $data = $request->only(['name', 'capacity', 'description']);

        if ($request->hasFile('avatar')) {
            if ($theater->avatar) Storage::disk('public')->delete($theater->avatar);
            $data['avatar'] = $request->file('avatar')->store('theaters', 'public');
        }

        $theater->update($data);
        return response()->json(['success' => true, 'data' => new TheaterResource($theater)], 200);
    }

    public function remove($id)
    {
        $theater = Theater::findOrFail($id);
        if ($theater->avatar) Storage::disk('public')->delete($theater->avatar);
        $theater->delete();
        return response()->json(['success' => true, 'message' => 'تم حذف المسرح'], 200);
    }
}