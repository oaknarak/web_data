<?php

namespace App\Http\Middleware;

use App\Models\Pet;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPetOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $petId = $request->route('id');
        $pet = Pet::findOrFail($petId);
        if (auth()->check() && auth()->user()->id !== $pet->user_id) {
            return redirect()->back();
        }

        return $next($request);
    }
}
