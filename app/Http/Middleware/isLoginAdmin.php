<?php

namespace App\Http\Middleware;

use Closure;

class isLoginAdmin
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
        if($this->isLogin($request)){
            return redirect()->route('admin.dashboard.index');
        }
        return $next($request);
    }

    private function isLogin($request)
    {
        $idAdmin = $request->session()->get('admin.id');
        $idAdmin = is_numeric($idAdmin) && $idAdmin > 0 ? true : false;
        return $idAdmin;
    }
}
