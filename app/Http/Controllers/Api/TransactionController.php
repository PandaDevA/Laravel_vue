<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;

// controller of the transaction data
class TransactionController extends Controller
{
    // Direct welcome page
    public function index() {
        return TransactionResource::collection(Transaction::all());
    }
    
    // Save the new transaction data
    public function save(Request $request) {
        $newTrans = new Transaction;
        if ($request->type == 'credit')
            $newTrans->credit = $request->balance;
        else 
            $newTrans->debit = $request->balance;
        $newTrans->balance += $request->balance;
        $newTrans->description = $request->description;
        $newTrans->save();
        return json_encode($newTrans);
    }
}
