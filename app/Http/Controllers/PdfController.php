<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Hacemo referencia a la clase FPDF
use Codedge\Fpdf\Fpdf\Fpdf;

class PdfController extends Controller
{

	public function prueba(){

    // Iniciamos la clase
    $pdf=new Fpdf('P','mm','letter');
    // Agregamos una pàgina 
    $pdf->AddPage();

    // Seleccionar una fuente
    $pdf->SetFont('Courier', 'B', 18);

    //         Ancho,Alto,Valor,Borde(0,1,'T','B','R','L'),Comportamiento(0,1),Alineacion('R','L','C','J')
    $pdf->Cell(190, 10, 'UNIVERSIDAD TECNOLOGICA DEL CENTRO',1,0,'C');

    // Al final, envia el pdf a la pantalla
    $pdf->Output();
    exit;
	}


}
