<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use League\Flysystem\UnableToRetrieveMetadata;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    public function download(Request $request)
    {
        // $hashed = Auth::user()->matricula . 
        // $request->mes .
        // $request->ano . 
        //     env('HASH_CONTRACHEQUE')
        // ;
        // $hashed = hash('sha256', $hashed). '.pdf';

        // echo "<pre>",print_r([
        //     'request' => $request->all(),
        //     'matricula' => Auth::user()->matricula,
        //     'hashed' => $hashed
        // ]),exit;
        try {
         

                $hashed = Auth::user()->matricula . 
                $request->mes .
                $request->ano . 
                    env('HASH_CONTRACHEQUE')
                ;
            
            $hashed = hash('sha256', $hashed). '.pdf';

            return Storage::disk(name:'local')->download($hashed);

        } catch (UnableToRetrieveMetadata $e) {
            return view('pages/contracheques/sem-contracheque');
        }
        
    }
}

// composer require setasign/fpdi

