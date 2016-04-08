<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
        $response = $next($request)
            ->header('Content-Type', 'application/json')
            ->header('Access-Control-Allow-Origin', '*')
//            ->header('Access-Control-Allow-Origin', 'http://ionic.localhost.com, http://ionic.delivery24horas.com')
            ->header('Access-Control-Allow-Methods', 'GET, POST')
//            ->header('Access-Control-Allow-Credentials' , 'true')
//            ->header('Access-Control-Allow-Headers', '*')
            ->header('Access-Control-Allow-Headers', 'Accept-Encoding, Refer, X-Requested-With, Accept, X-Auth-Token, Origin, Authorization')
//            ->header('Access-Control-Allow-Headers', 'Cache-Control, Accept, Content-Type, X-Auth-Token, Origin, Authorization')
//            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        ;

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

        if ($request->header('user-agent')!='GitHub-Hookshot/ec96788'){
            if ($request->isJson()) return abort(403, 'Acesso negado: isJson');
            if (!$request->isMethodSafe()) return abort(403, 'Acesso negado: isMethodSafe');
            if ($request->header('accept')!="application/json") return abort(403, 'Acesso negado: header(\'accept\')!="application/json"');
        }
        if ($request->isXmlHttpRequest()) return abort(403, 'Acesso negado: isXmlHttpRequest');
        if ($request->isNoCache()) return abort(403, 'Acesso negado: isNoCache');
        if ($request->isSecure()) return abort(403, 'Acesso negado: isSecure');
        if ($request->method()!="GET" && $request->method()!="POST") return abort(403, 'Acesso negado: method()!="GET" && method()!="POST"');
        return $response;
    }
}
