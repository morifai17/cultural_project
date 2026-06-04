<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Http\Resources\ActivityResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $query = Activity::query();
        if ($request->has('search')) {
            $query->where('title', 'like', "%{$request->search}%");
        }
        return ActivityResource::collection($query->get());
    }

    public function add(Request $request)
    {
        $request->validate([
            'cultural_center_id' => 'required|exists:cultural_centers,id',
            'title' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $data = $request->only(['cultural_center_id', 'hall_id', 'theater_id', 'title', 'description', 'start_time', 'end_time', 'capacity']);
        if ($request->hasFile('avatar')) $data['avatar'] = $request->file('avatar')->store('activities', 'public');

        return response()->json(['data' => Activity::create($data)], 201);
    }

    public function edit(Request $request, $id)
    {
        $act = Activity::findOrFail($id);
        $data = $request->except(['avatar', '_method']);
        if ($request->hasFile('avatar')) {
            if ($act->avatar) Storage::disk('public')->delete($act->avatar);
            $data['avatar'] = $request->file('avatar')->store('activities', 'public');
        }
        $act->update($data);
        return response()->json(['data' => $act], 200);
    }

    public function remove($id)
    {
        $act = Activity::findOrFail($id);
        if ($act->avatar) Storage::disk('public')->delete($act->avatar);
        $act->delete();
        return response()->json(['success' => true], 200);
    }
}