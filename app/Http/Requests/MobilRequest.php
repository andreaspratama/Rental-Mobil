<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MobilRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kategori_id' => 'required|integer|exists:kategoris,id',
            'merk_id' => 'required|integer|exists:merks,id',
            'nama' => 'required',
            'warna' => 'required',
            'tahun' => 'required',
            'plat' => 'required',
            'sewa' => 'required',
            'status' => 'required',
            'kursi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,gif',
            'fitur' => 'required|array',
        ];
    }
}
