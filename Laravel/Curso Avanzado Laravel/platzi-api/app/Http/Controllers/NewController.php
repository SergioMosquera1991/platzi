<?php

namespace App\Http\Controllers;

use App\Console\Commands\SendEmailVerificationReminderCommand;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Http\Request;

class NewController extends Controller
{
    public function send()
    {
        Artisan::call(SendEmailVerificationReminderCommand::class);

        return response()->json([
            'data' => 'Todo OK'
        ]);
    }
}
