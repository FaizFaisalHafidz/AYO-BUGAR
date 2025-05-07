<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QRController extends Controller
{
    public function getQR(Request $request)
    {
        $formatedData = [
            'image_url' => 'https://neoflash.sgp1.digitaloceanspaces.com/ayo-bugar/qr-code/002.png'
        ];

        return ResponseFormatter::success(
            $formatedData,
            'QR Code retrieved successfully'
        );
    }
}
