<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class MembersResource extends JsonResource
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
            'nama' => $this->nama,
            'bagian' => $this->bagian,
            'email' => $this->email,
            'img' => $this->img ? Storage::url($this->img) : null,
            'website' => $this->website,
            'alamat' => $this->alamat
        ];
    }
}
