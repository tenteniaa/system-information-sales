<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'transaksi_id' => 'required',
            'customer_id' => 'required|integer',
            'diskon' => 'required',
            'diskon_price' => 'required',
            'subtotal' => 'required',
            'grand_total' => 'required',
            'paid' => 'required',
            'change' => 'string'
        ];
    }
}
