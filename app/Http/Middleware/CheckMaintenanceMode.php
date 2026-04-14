<?php

namespace App\Http\Middleware;

use App\Models\MaintenanceSetting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckMaintenanceMode
{
    public function handle(Request $request, Closure $next): Response
    {
        // Never block admin panel, login, or assets
        if ($request->is('admin', 'admin/*', 'livewire/*', 'build/*', 'images/*', 'favicon.*')) {
            return $next($request);
        }

        $setting = MaintenanceSetting::first();

        if (! $setting || ! $setting->enabled) {
            return $next($request);
        }

        // Logged-in admin users bypass maintenance
        if (Auth::check()) {
            return $next($request);
        }

        // Bypass via secret query parameter (bookmarkable link for admin)
        if ($request->query('bypass') === 'bundu-admin-preview') {
            session(['maintenance_bypass' => true]);
            return redirect($request->url());
        }

        if (session('maintenance_bypass')) {
            return $next($request);
        }

        // Show maintenance page
        $countdownTarget = null;
        if ($setting->isCountdown() && $setting->countdown_target->isFuture()) {
            $countdownTarget = $setting->countdown_target->toIso8601String();
        }

        return response()->view('maintenance', [
            'headline' => $setting->headline,
            'message' => $setting->message,
            'mode' => $setting->mode,
            'countdownTarget' => $countdownTarget,
        ], 503);
    }
}
