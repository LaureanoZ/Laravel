<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdultVerificationController extends Controller
{
    public function formConfirmation(int $id)
    {
        return view('services.form-adult-confirmation', [
            'id' => $id,
        ]);
    }

    public function processConfirmation(Request $request, int $id)
    {
        $request->session()->put('isAdult', true);

        return redirect()
            ->route('services.view', ['id' => $id]);
    }
}
