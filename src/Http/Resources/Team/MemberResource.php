<?php

namespace ReesMcIvor\Staff\Http\Resources\Team;

use App\Models\Service;
use App\Models\ServiceDuration;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class MemberResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'treatments' => $this->treatments->map(function($treatment) {
                return [
                    'name' => $treatment->name
                ];
            }),
            'bookable' => $this->bookable,
            'name' => $this->name,
            'role' => $this->profile->role,
            'bio' => $this->profile->bio,
            'specialties' => $this->profile->specialties,
            'qualifications' => $this->profile->qualifications,
            'photo' => $this->getPhoto(),
            'photo_thumb' => $this->getPhotoThumb(),
            'sort_order' => $this->profile->sort_order,
        ];
    }
}