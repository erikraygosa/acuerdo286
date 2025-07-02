<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class QrController extends Controller
{
    public function index()
    {
        return view('dashboard.qr');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        // Configuración de opciones del QR
        $options = new QROptions([
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel' => QRCode::ECC_H,
            'scale' => 10,
        ]);

        $filename = 'qr-' . time() . '.png';
        $path = 'storage/qrs/' . $filename;
        $fullPath = public_path($path);

        // Generar y guardar QR
        (new QRCode($options))->render($request->url, $fullPath);

        return view('dashboard.qr', [
            'qr_path' => asset($path),
            'file_name' => $filename,
            'url' => $request->url,
        ]);
    }
}
