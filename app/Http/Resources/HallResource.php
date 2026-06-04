<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HallResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'cultural_center_id' => $this->cultural_center_id,
            'name' => $this->name,
            'capacity' => $this->capacity,
            'features' => json_decode($this->features), // تحويل الـ JSON إلى مصفوفة
            'avatar' => $this->avatar ? asset('storage/' . $this->avatar) : null,
        ];
    }
}