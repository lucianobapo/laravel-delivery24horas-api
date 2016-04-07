<?php

namespace App\Http\Middleware;

use Closure;

class ContentTypesBlockMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        if ($request->ajax() || $request->isJson()) return abort(403, 'Acesso negado');
        $response = $next($request);
        if (config('app.debug')){
//            logger('header: '.var_export($request->header(), true));
            logger('x-requested-with: '.var_export($request->header('x-requested-with'), true));
            logger('accept-language: '.var_export($request->header('accept-language'), true));
            logger('referer: '.var_export($request->header('referer'), true));
            logger('Accept: '.var_export($request->header('accept'), true));
            logger('isXmlHttpRequest: '.var_export($request->isXmlHttpRequest(), true));
            logger('isJson: '.var_export($request->isJson(), true));
            logger('isNoCache: '.var_export($request->isNoCache(), true));
            logger('isMethodSafe: '.var_export($request->isMethodSafe(), true));
            logger('isSecure: '.var_export($request->isSecure(), true));
            logger('is: '.var_export($request->is(), true));
            logger('method: '.var_export($request->method(), true));
            logger($response);
        }

        if ($request->isJson()) return abort(403, 'Acesso negado');
        if ($request->isXmlHttpRequest()) return abort(403, 'Acesso negado');
//        if ($request->isNoCache()) return abort(403, 'Acesso negado');
        if (!$request->isMethodSafe()) return abort(403, 'Acesso negado');
//        if ($request->isSecure()) return abort(403, 'Acesso negado');
//        if ($request->method()!="GET") return abort(403, 'Acesso negado');
//        if ($request->header('accept')!="application/json") return abort(403, 'Acesso negado');
        return $response;
    }
}
