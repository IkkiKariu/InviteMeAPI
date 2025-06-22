<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Validator;

class EnsureServiceIdIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $validator = Validator::make(['service_id' => $request->route()->parameter('id')], [
            'service_id' => ['required', 'uuid', 'exists:services,id']
        ]);

        if ($validator->fails()) return response()->json(status: 404);

        return $next($request);
    }
}
