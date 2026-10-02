<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->is('admin*')) { // Do not track admin visits
             $ip = $request->ip();
             // Check if visitor with this IP exists for today
             $exists = \App\Models\Visitor::where('ip_address', $ip)
                         ->whereDate('created_at', \Carbon\Carbon::today())
                         ->exists();

             if (!$exists) {
                 // Fetch location data
                 $country = null;
                 $state = null;
                 
                 try {
                     // Using free ip-api.com service
                     $client = new \GuzzleHttp\Client();
                     // For local testing, IPs like 127.0.0.1 won't work, so we check for that
                     if ($ip == '127.0.0.1' || $ip == '::1') {
                         // $response = $client->get('http://ip-api.com/json/'); // Fetches for the server's public IP
                     } else {
                        $response = $client->get("http://ip-api.com/json/{$ip}");
                        $data = json_decode($response->getBody(), true);
                        if ($data['status'] == 'success') {
                            $country = $data['country'];
                            $state = $data['regionName'];
                        }
                     }
                     
                 } catch (\Exception $e) {
                     // Fail silently if API is down
                 }

                 \App\Models\Visitor::create([
                     'ip_address' => $ip,
                     'user_agent' => $request->userAgent(),
                     'country' => $country,
                     'state' => $state,
                 ]);
             }
        }
        return $next($request);
    }
}
