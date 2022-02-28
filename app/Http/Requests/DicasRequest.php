<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DicasRequest extends FormRequest
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
            'tipo_veiculo' => 'required|integer',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'versao' => 'nullable|string',
            'dicas' => 'required|string',
        ];
    }
}
