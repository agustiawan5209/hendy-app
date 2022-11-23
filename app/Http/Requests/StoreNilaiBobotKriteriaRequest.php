<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNilaiBobotKriteriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'kode'=> ['required', 'unique:nilai_bobot_kriterias,kode'],
            'nilai_banding'=> ['required', 'unique:nilai_bobot_kriterias,nilai_banding'],
            'kriteria1' => ['required', 'unique:nilai_bobot_kriterias,kriteria1'],
            'kriteria2'=> ['required', 'unique:nilai_bobot_kriterias,kriteria2'],
        ];
    }
}
