<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\WalletTransaction;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class WalletTransactionsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('wallet_transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $walletTransactions = WalletTransaction::with(['owner', 'balance'])->get();

        return view('admin.walletTransactions.index', compact('walletTransactions'));
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('wallet_transaction_create') && Gate::denies('wallet_transaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new WalletTransaction();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
