<?php
namespace App\Http\Requests\Admin;
use Illuminate\Support\Facades\Gate;
use App\Role;
use Illuminate\Foundation\Http\FormRequest;

class StoreRolesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     public function authorize()
    {
        return abort_if(Gate::denies('role_create'), 403, '403 Forbidden') ?? true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Role::storeValidation($this);
    }
}
