<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class MercadoPagoController extends Controller
{
    public function showMP($id)
    {
        $service = Service::findOrFail($id);
        $services = Service::whereIn('service_id', $service)->get();

        $payment = new \App\PaymentProviders\MercadoPagoPayment;
        $payment
            ->addItems($services)
            ->withBackUrls(
                success: route('mp.success'),
                pending: route('mp.pending'),
                failure: route('mp.failure'),
            )
            ->withAutoReturn()
            ->save();

        return view('mp.paymp', [
            'service' => Service::findOrFail($id),
            'payment' => $payment,
        ]);
    }

    public function processSuccess(Request $request)
    {
        echo "Success!";
        dd($request);
    }

    public function processPending(Request $request)
    {
        echo "Pending...";
        dd($request);
    }

    public function processFailure(Request $request)
    {
        echo "Failure :(";
        dd($request);
    }
}
