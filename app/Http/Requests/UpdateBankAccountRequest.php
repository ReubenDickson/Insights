<?php

namespace App\Http\Requests;

use App\Models\BankAccount;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBankAccountRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bank_account_edit');
    }

    public function rules()
    {
        return [
            'account_name' => [
                'string',
                'nullable',
            ],
            'account_number' => [
                'string',
                'nullable',
            ],
            'bank' => [
                'string',
                'nullable',
            ],
            'sortcode' => [
                'string',
                'nullable',
            ],
        ];
    }
}
