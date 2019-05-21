<?php
namespace App\Http\Requests\Admin;

use App\Ticket;
use Illuminate\Foundation\Http\FormRequest;

class StoreTicketsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abort_if(Gate::denies('ticket_create'), 403, '403 Forbidden') ?? true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Ticket::storeValidation($this);
    }
}
