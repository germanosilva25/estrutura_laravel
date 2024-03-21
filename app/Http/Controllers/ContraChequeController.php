<?php

namespace App\Http\Controllers;

use App\Models\ContraCheque;
use App\Http\Requests\StoreContraChequeRequest;
use App\Http\Requests\UpdateContraChequeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Dompdf\Options;
use Smalot\PdfParser\Parser;
use setasign\Fpdi\Fpdi;
use Exception;
use Illuminate\Support\Facades\Response;
// use FPDF;




class ContraChequeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function salvarDados(Request $request)
    {
        try {
            if (!$request->has('contracheques') || !$request->has('mes') || !$request->has('ano')) {
                return view('contracheques.erro-enviar');
            }
            
            $hashed = 
                env('HASH_CONTRACHEQUE') . 
                $request->mes . 
                $request->ano .
                time()
            ;

            $hashed = hash('sha256', $hashed);

            // Get the uploaded file
            $contracheque = $request->file('contracheques');

            // Generate a new filename (e.g., timestamp + original name)
            $filename = time() . '_' . $contracheque->getClientOriginalName();

            // Get the file extension
            $extension = $contracheque->getClientOriginalExtension();

            // Store the file with the new filename in the public storage directory
            $response = $contracheque->storeAs('', $hashed. '.' .strtolower($extension));
            $response = Storage::disk(name:'local')->path($response);
            $this->splitPdfPages($response, $request->ano, $request->mes);
            //exit;
            return Response::json([
                'sucesso' => 'Enviados',
            ], 200);
            return redirect('incluidocontracheque');
            return view('contracheques/incluido-contracheque');
        } catch (Exception $e) {
            return view('contracheques/erro');
        }
        
    }


    function splitPdfPages($inputPdfPath, $ano, $mes)
    {
        $options = [
            'pdfParser' => [
                'removeWhitespace' => false,
                // Add other options as needed
            ]
        ];

        // Initialize the PDF parser
        $parser = new Parser();
        

        // Parse the PDF file
        $pdf = $parser->parseFile($inputPdfPath);

        // Get the text from each page
        $text = '';
        // Create a new PDF instance
        $i = 0;
        foreach ($pdf->getPages() as $page) {
            $newPdf = new FPDI('P', 'mm', 'A4');
            $text = $page->getText();
            preg_match_all('/\d+/', substr($text, 205, 18), $matches);
            $numbers = intval($matches[0][0]);
            //echo "<br> | $numbers | $mes | $ano " . env('HASH_CONTRACHEQUE');
            $hashed = 
                $numbers . 
                $mes . 
                $ano .
                env('HASH_CONTRACHEQUE')
            ;

            $hashed = hash('sha256', $hashed). '.pdf';
            //echo "<br>$hashed";
            $newPdf->AddPage();
            $newPdf->setSourceFile($inputPdfPath);
            $newPdf->useTemplate($newPdf->importPage($i+1), $x = 0, $y = 0, $width = 210, $height = 297, $adjustPageSize = false);

            // Save the new PDF with the current page
            $outputFile = Storage::disk(name:'local')->path('') . $hashed;
            $newPdf->Output($outputFile, 'F');
            $i++;
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContraChequeRequest $request)
    {
        echo "<pre>",print_r([
            'request' => 'request'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ContraCheque $contraCheque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContraCheque $contraCheque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContraChequeRequest $request, ContraCheque $contraCheque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContraCheque $contraCheque)
    {
        //
    }
}
// composer require smalot/pdfparser
// composer require setasign/fpdi-fpdf

