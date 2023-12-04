<?php

namespace App\Http\Middleware;

use App\Models\site\Notifications;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotificationsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {

        $notification = Notifications::where('read', false)->get();
        $countNotifications = $notification->count();
        session()->put('notification', $notification);
        session()->put('countNotifications', $countNotifications);
        return $next($request);
    }
}
