<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class PdfController extends Controller
{
    function pdfGenerator(){

		$pdf = PDF::loadView('Html');
  
        return $pdf->download('Html.pdf');

	}
}
