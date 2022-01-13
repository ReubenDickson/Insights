<?php

namespace App\Http\Requests;

use App\Models\WalletTransaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreWalletTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('wallet_transaction_create');
    }

    public function rules()
    {
        return [
            'owner_id' => [
                'required',
                'integer',
            ],
            'amount' => [
                'required',
            ],
            'balance_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
