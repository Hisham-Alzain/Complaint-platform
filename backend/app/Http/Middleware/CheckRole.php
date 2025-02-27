<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Official;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user=$request->user();
        if($user){
            $official=Official::where('user_id',$user->id)->first();
            if($official && $role=='official'){
                return $next($request);
            }
            else if($role=='user'){
                return $next($request);
            }
        }
        return response()->json(['message' => 'Unauthorized'], 403);
    }
}
