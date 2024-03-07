<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class StruckController extends Controller
{
    public function struckreport(Request $request)
    {
        $paymentId = $request->input('payment_id');
        $dataPayment = Payment::where('id', $paymentId)->get();
        return view('pages.struck.report', compact('dataPayment'));
    }
    
    public function struckallreport(Request $request)
    {
        $dataPayment = Payment::all();
        return view('pages.struck.all-report', compact('dataPayment'));
    }
}
