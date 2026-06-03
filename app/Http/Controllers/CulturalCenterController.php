<?php

namespace App\Http\Controllers;

use App\Http\Resources\CulturalCenterResource;
use App\Models\CulturalCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CulturalCenterController extends Controller
{
  public function index(Request $request)
{
    $query = CulturalCenter::query();

    if ($request->has('search') && !empty($request->search)) {
        $searchTerm = $request->search;
        
        $query->where('name', 'like', "%{$searchTerm}%")
              ->orWhere('location', 'like', "%{$searchTerm}%");
    }

    $centers = $query->get();

    return CulturalCenterResource::collection($centers);
}

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'description' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('avatar');

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $center = CulturalCenter::create($data);

        return response()->json(['success' => true, 'message' => 'تم إضافة المركز بنجاح', 'data' => $center], 201);
    }
    public function edit(Request $request, $id)
    {
        $center = CulturalCenter::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|string',
            'location' => 'sometimes|string',
            'description' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name', 'location', 'description']);

        // تحديث الصورة إذا تم رفع صورة جديدة
        if ($request->hasFile('avatar')) {
            // حذف الصورة القديمة إذا وجدت
            if ($center->avatar) {
                Storage::disk('public')->delete($center->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $center->update($data);

        return response()->json(['success' => true, 'message' => 'تم تحديث المركز بنجاح', 'data' => $center], 200);
    }

    // حذف المركز مع حذف صورته من التخزين
    public function remove($id)
    {
        $center = CulturalCenter::findOrFail($id);
        
        if ($center->avatar) {
            Storage::disk('public')->delete($center->avatar);
        }
        
        $center->delete();
        return response()->json(['success' => true, 'message' => 'تم حذف المركز بنجاح'], 200);
    }
}