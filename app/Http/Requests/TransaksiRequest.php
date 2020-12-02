<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaksiRequest extends FormRequest
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
            'noktp' => 'required',
            'alamat' => 'required|min:5',
            'notlpn' => 'required',
            'tglawal' => 'required',
            'tglakhir' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'noktp.required' => 'No KTP harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.min' => 'Alamat min 5 karakter',
            'notlpn.required' => 'No Telepon harus diisi',
            'tglawal.required' => 'Tanggal peminjaman harus diisi',
            'tglakhir.required' => 'Tanggal akhir harus diisi',
        ];
    }
}
