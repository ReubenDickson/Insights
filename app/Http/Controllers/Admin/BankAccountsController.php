<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBankAccountRequest;
use App\Http\Requests\UpdateBankAccountRequest;
use App\Models\BankAccount;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BankAccountsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bank_account_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankAccounts = BankAccount::with(['owner'])->get();

        return view('admin.bankAccounts.index', compact('bankAccounts'));
    }

    public function create()
    {
        abort_if(Gate::denies('bank_account_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $owners = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.bankAccounts.create', compact('owners'));
    }

    public function store(StoreBankAccountRequest $request)
    {
        $bankAccount = BankAccount::create($request->all());

        return redirect()->route('admin.bank-accounts.index');
    }

    public function edit(BankAccount $bankAccount)
    {
        abort_if(Gate::denies('bank_account_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $owners = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bankAccount->load('owner');

        return view('admin.bankAccounts.edit', compact('bankAccount', 'owners'));
    }

    public function update(UpdateBankAccountRequest $request, BankAccount $bankAccount)
    {
        $bankAccount->update($request->all());

        return redirect()->route('admin.bank-accounts.index');
    }
}
