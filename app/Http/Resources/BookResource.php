<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        
        return [
            'id'            => $this->id,
            // 'cover'         => $this->cover,
            'judul'         => $this->judul,
            'slug'          => $this->slug,
            'penulis'       => $this->penulis,
            'deskripsi'     => $this->deskripsi,
            'halaman'       => $this->halaman,
            'tipe'          => $this->tipe,
            'penerbit'      => $this->penerbit,
            // 'file_pdf'      => $this->file_pdf,
            'category_id'   => $this->category_id,
            'populer'       => $this->populer,
            'rekomendasi'   => $this->rekomendasi,
        ];
    }

    public function with(Request $request)
    {
        return ['status' => 'success'];
    }

}
