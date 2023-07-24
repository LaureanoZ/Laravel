<?php

namespace App\Http\Middleware;

use App\Models\Service;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdult
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route()->parameter('id');
        $service = Service::findOrFail($id);

        if($service->adult_id === 2 && !$request->session()->get('isAdult', false)) {
            return redirect()
                ->route('adult-verification.formConfirmation', ['id' => $id]);
        }

        return $next($request);
    }
}
