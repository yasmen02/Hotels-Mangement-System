<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Contact;

class ShareMessages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $messages = Contact::orderBy('created_at', 'desc')->take(5)->get(); // Fetch latest messages
        view()->share('messages', $messages); // Share messages with all views

        return $next($request);
    }
}
