<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNilaiBobotAlternatifRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'kode' => ['required', 'unique:nilai_bobot_alternatifs,kode'],
            'kriteria_id' => ['required'],
            'nilai_banding' => ['required'],
            'alternatif1' => ['required'],
            'alternatif2' => ['required'],
        ];
    }
}
