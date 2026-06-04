<?php
namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RatingController extends Controller
{
    // إضافة تقييم جديد
    public function store(Request $request)
    {
        $request->validate([
            'value'         => 'required|integer|min:1|max:5',
            'comment'       => 'nullable|string',
            'rateable_id'   => 'required|integer',
            // التحقق من أن النوع موجود في الـ MorphMap الذي عرفناه في ServiceProvider
            'rateable_type' => ['required', Rule::in(['hall', 'center', 'theater', 'activity'])],
        ]);

        $rating = Rating::create([
            'user_id'       => auth()->id(),
            'value'         => $request->value,
            'comment'       => $request->comment,
            'rateable_id'   => $request->rateable_id,
            'rateable_type' => $request->rateable_type,
        ]);

        return response()->json(['success' => true, 'data' => $rating], 201);
    }

    // عرض تقييمات عنصر معين (مثلاً كل تقييمات قاعة معينة)
    public function index($type, $id)
    {
        // التحقق من النوع
        if (!in_array($type, ['hall', 'center', 'theater', 'activity'])) {
            return response()->json(['message' => 'Invalid type'], 400);
        }

        $ratings = Rating::where('rateable_type', $type)
                         ->where('rateable_id', $id)
                         ->get();

        return response()->json(['success' => true, 'data' => $ratings]);
    }
}