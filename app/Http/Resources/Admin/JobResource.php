<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\EmploymentTypeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'company_name' => $this->company_name,
            'company_logo' => $this->company_logo,
            'employment_type' => new EmploymentTypeResource($this->employment_type),
            'salary' => $this->salary,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'role' => $this->role,
            'apply_url' => $this->apply_url,
        ];
    }
}
