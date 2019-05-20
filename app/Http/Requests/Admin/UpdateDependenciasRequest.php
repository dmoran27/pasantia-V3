<?php
namespace App\Http\Requests\Admin;

use App\Dependencia;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDependenciasRequest extends FormRequest
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
        return Dependencia::updateValidation($this);
    }
}
