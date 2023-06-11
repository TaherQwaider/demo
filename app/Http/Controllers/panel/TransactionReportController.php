<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseTransaction;
use Illuminate\Http\Request;

class TransactionReportController extends Controller
{
    //


    public function payment_report(){
        $transaction = PurchaseTransaction::paginate(10);

        return view('panel.transaction.payment', [
           'transaction' =>$transaction
        ]);

    }

    public function product_report(){
        $products = Product::with('transactions')->paginate(10);

        return view('panel.transaction.products', [
            'products' =>$products
        ]);
    }
}
