<?php

namespace RentFood\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        $payload = $request->all();

        if ($payload['type'] == 'charge.succeeded') {
            Notification::route('nexmo', config('services.nexmo.sms_to'))
                ->notify(new NewSaleOccurred($payload));
        }

        return response('Webhook received');
    }
}
