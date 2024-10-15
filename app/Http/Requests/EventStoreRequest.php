<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'penyelenggara_event'    => 'required|string|max:255',
            'judul_event'            => 'required|string|max:255',
            'deskripsi_event'        => 'required|string',
            'jenis_event'            => 'required|string|max:255',
            'kuota_peserta'          => 'required|integer',
            'link_akses'             => 'nullable|url',
            'tanggal'                => 'required|date',
            'biaya'                  => 'nullable',
            'lokasi'                 => 'required|string',
            'image'                  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'penyelenggara_event.required'   => 'Penyelenggara event harus diisi.',
            'judul_event.required'            => 'Judul event harus diisi.',
            'deskripsi_event.required'        => 'Deskripsi event harus diisi.',
            'jenis_event.required'            => 'Jenis event harus diisi.',
            'kuota_peserta.required'          => 'Kuota peserta harus diisi.',
            'link_akses.required'             => 'Link akses harus diisi.',
            'tanggal.required'                => 'Tanggal harus diisi.',
            'lokasi.required'                 => 'Lokasi harus diisi.',
            'image.image'                     => 'File harus berupa gambar.',
            'image.mimes'                     => 'Gambar harus berformat jpeg, png, jpg, gif, atau svg.',
            'image.max'                       => 'Ukuran gambar tidak boleh lebih dari 2MB.'
        ];
    }
}
