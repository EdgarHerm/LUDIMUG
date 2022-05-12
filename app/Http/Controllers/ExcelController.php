<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use setasign\Fpdi\FPDI;
use Auth;
use DB;
class ExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getWord($id)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $reporte = 'SELECT * FROM reporte WHERE id = ' . $id;
        $persona =
            'SELECT * FROM persona INNER JOIN reporte ON reporte.id = persona.id WHERE persona.id = ' .
            $id;

        $personas = \DB::select($persona);
        $reportes = \DB::select($reporte);

        $fecha = Carbon::parse($reportes[0]->ftmuestra);

        $fechados = Carbon::parse(date('Y-m-d'));
        $diados = $fecha->formatLocalized('%A');
        $mesdos = $fecha->formatLocalized('%B');
        $diados_num = $fecha->formatLocalized('%d');
        $aniodos = $fecha->formatLocalized('%Y');

        $fechab = date('Y-m-d');
        $dia = $fecha->formatLocalized('%A');
        $mes = $fecha->formatLocalized('%B');
        $dia_num = $fecha->formatLocalized('%d');
        $anio = $fecha->formatLocalized('%Y');
        $date = new Carbon('tomorrow');
        echo $date;

        //return $dia;
        try {
            $tenpFile = tempnam(sys_get_temp_dir(), 'PHPWord');
            // $template->saveAs($tenpFile);

            $header = ['Content-Type', 'application/pdf'];

            $pdf = new FPDI();

            // Reference the PDF you want to use (use relative path)
            $pagecount = $pdf->setSourceFile('template.pdf');

            // Import the first page from the PDF and add to dynamic PDF
            $tpl = $pdf->importPage(1);
            $pdf->AddPage();

            // Use the imported page as the template
            $pdf->useTemplate($tpl);

            // Set the default font to use

            // adding a Cell using:
            // $pdf->Cell( $width, $height, $text, $border, $fill, $align);

            // First box - the user's Name
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->SetXY(37.5, 50.9);
            $pdf->Cell(3.14, 0.38, $reportes[0]->folio);
            $pdf->SetXY(42.5, 50.7);
            $pdf->Cell(
                3.14,
                9.0,
                $personas[0]->apellidop .
                    ' ' .
                    $personas[0]->apellidom .
                    ' ' .
                    $personas[0]->nombres
            );

            $pdf->SetFont('Arial', '', 9);
            $pdf->SetXY(169.5, 42.8);

            $pdf->Cell(3.14, 9.0, date('d/m/Y'));

            $pdf->SetFont('Arial', '', 9);
            $pdf->SetXY(37.5, 59.3);

            if ($personas[0]->sexo == 'H') {
                $pdf->Cell(3.14, 0.38, 'Masculino');
            }
            if ($personas[0]->sexo == 'M') {
                $pdf->Cell(3.14, 0.38, 'Femenino');
            }

            if ($personas[0]->sexo == 'O') {
                $pdf->Cell(3.14, 0.38, 'Otro');
            }

            $pdf->SetFont('Arial', '', 9);
            $pdf->SetXY(38.0, 63.9);
            $pdf->Cell(3.14, 0.38, Carbon::parse($personas[0]->fechanac)->age);

            $timestamp = strtotime($reportes[0]->ftmuestra);
            $newDate = date('d/m/Y', $timestamp);

            $pdf->SetFont('Arial', '', 9);
            $pdf->SetXY(64.5, 68.3);
            $pdf->Cell(3.14, 0.38, $newDate);

            $pdf->SetFont('Arial', '', 9);
            $pdf->SetXY(44.5, 72.5);
            $pdf->Cell(3.14, 0.38, $personas[0]->nuae);

            $pdf->SetFont('Arial', 'B', 9);
            $pdf->SetXY(57.8, 96.5);
            $pdf->Cell(3.14, 0.38, strtoupper($personas[0]->rmuestra));

            $tpl2 = $pdf->importPage(2);
            $pdf->AddPage();

            // Use the imported page as the template
            $pdf->useTemplate($tpl2);
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->SetXY(34.8, 73.5);
            $pdf->Cell(
                3.14,
                0.38,
                $personas[0]->apellidop .
                    ' ' .
                    $personas[0]->apellidom .
                    ' ' .
                    $personas[0]->nombres
            );

            $pdf->SetFont('Arial', '', 11);
            $pdf->SetXY(113.0, 91.0);
            $pdf->Cell(
                3.14,
                0.38,
                iconv('UTF-8', 'cp1250', $dia) .
                    ' ' .
                    $dia_num .
                    ' de ' .
                    $mes .
                    ' de ' .
                    $anio
            );

            $pdf->SetFont('Arial', '', 11);
            $pdf->SetXY(95.5, 43);
            $pdf->Cell(
                3.14,
                0.38,
                iconv('UTF-8', 'cp1250', 'León, Guanajuato a ') .
                    iconv('UTF-8', 'cp1250', $diados) .
                    ', ' .
                    $diados_num .
                    ' de ' .
                    $mesdos .
                    ' de ' .
                    $aniodos
            );

            $pdf->SetFont('Arial', 'B', 11);
            $pdf->SetXY(67, 99.7);
            $pdf->Cell(3.14, 0.38, strtoupper($reportes[0]->folio));

            // render PDF to browser

            /* Set the PDF Engine Renderer Path */
            $domPdfPath = base_path('vendor/dompdf/dompdf');
            \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
            \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

            //Load word file
            $Content = \PhpOffice\PhpWord\IOFactory::load($tenpFile);

            //Save it into PDF
            $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter(
                $Content,
                'PDF'
            );
            $PDFWriter->save(public_path('new-result.pdf'));
            $pdf->Output('new-result.pdf', 'F');
            return response()
                ->download(
                    public_path('new-result.pdf'),
                    $reportes[0]->folio .
                        '-' .
                        $personas[0]->apellidop .
                        '' .
                        $personas[0]->apellidom .
                        '.pdf',
                    $header
                )
                ->deleteFileAfterSend($shouldDelete = true);
        } catch (\PhpOffice\PhpWord\Exception\Exception $e) {
            //throw $th;
            return back($e->getCode());
        }
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reporte = 'SELECT * FROM reporte WHERE id = ' . $id;
        $persona =
            'SELECT * FROM persona INNER JOIN reporte ON reporte.idPersona = persona.id WHERE reporte.id = ' . $id; 
        
        $personas = \DB::select($persona);
        $reportes = \DB::select($reporte);

        $sql3 =
            'SELECT * FROM direccion INNER JOIN persona ON persona.idDireccion = direccion.id  WHERE persona.id = ' . $personas[0]->id;; 
        $direccion = \DB::select($sql3);

        $dianac = Carbon::parse($personas[0]->fechanac)->day;
        $fecha = Carbon::parse($reportes[0]->ftmuestra);

        $fechados = Carbon::parse(date('Y-m-d'));
        $diados = $fecha->formatLocalized('%A');
        $mesdos = $fecha->formatLocalized('%B');
        $diados_num = $fecha->formatLocalized('%d');
        $aniodos = $fecha->formatLocalized('%Y');

        $fechab = date('Y-m-d');
        $dia = $fecha->formatLocalized('%A');
        $mes = $fecha->formatLocalized('%B');
        $dia_num = $fecha->formatLocalized('%d');
        $anio = $fecha->formatLocalized('%Y');
        $date = new Carbon('tomorrow');
        echo $date;

        //return $dia;
        try {
            $tenpFile = tempnam(sys_get_temp_dir(), 'PHPWord');
            // $template->saveAs($tenpFile);
            $header = ['Content-Type', 'application/pdf'];

            $pdf = new FPDI('P', 'mm', [200, 280]);

            // Reference the PDF you want to use (use relative path)
            $pagecount = $pdf->setSourceFile('test4.pdf');

            // Import the first page from the PDF and add to dynamic PDF
            $tpl = $pdf->importPage(1);
            $pdf->AddPage();

            // Use the imported page as the template
            $pdf->useTemplate($tpl);

            // Set the default font to use

            // adding a Cell using:
            // $pdf->Cell( $width, $height, $text, $border, $fill, $align);

            // First box - the user's Name
            $pdf->SetFont('Arial', '', 6);
            $pdf->SetXY(145.9, 56.5);
            $pdf->Cell(3.14, 0.38, $personas[0]->nuae);

            $pdf->SetXY(55, 66.0);
            $pdf->Cell(3.14, 0.38, $personas[0]->apellidop);


            $pdf->SetXY(110, 66.0);
            $pdf->Cell(3.14, 0.38, $personas[0]->apellidom);


            $pdf->SetXY(153.7, 66.0);
            $pdf->Cell(3.14, 0.38, $personas[0]->nombres);

            $pdf->SetXY(69.5, 71.5);
            $pdf->Cell(3.14, 0.38, $dianac);

            $pdf->SetXY(86, 71.5);
            $pdf->Cell(
                3.14,
                0.38,
                Carbon::parse($personas[0]->fechanac)->month
            );
            $pdf->SetXY(102.5, 71.5);
            $pdf->Cell(3.14, 0.38, Carbon::parse($personas[0]->fechanac)->year);

            $pdf->SetXY(127, 71.5);
            $pdf->Cell(3.14, 0.38, $personas[0]->CURP);

            if ($personas[0]->sexo == 'H') {
                $pdf->SetXY(48, 76.5);

                $pdf->Cell(3.14, 0.38, 'X');
                $pdf->SetXY(86, 79.7);
                $pdf->Cell(3.14, 0.38, 'X');
                $pdf->SetXY(111, 79.7);
                $pdf->Cell(3.14, 0.38, '0');
            }
            if ($personas[0]->sexo == 'M') {
                $pdf->SetXY(48, 79.7);
                $pdf->Cell(3.14, 0.38, 'X');
            }


            $pdf->SetXY(153.7, 79.7);
            $pdf->Cell(3.14, 0.38, 'X');


            $pdf->SetXY(173.7, 79.7);
            $pdf->Cell(3.14, 0.38, '0');

            if ($personas[0]->nacionalidad == 'Mexicana') {
                $pdf->SetXY(48, 88.5);
                $pdf->Cell(3.14, 0.38, 'X');
                $pdf->SetXY(102.5, 88.5);
                $pdf->Cell(3.14, 0.38, 'X');
            } else {
                $pdf->SetXY(70, 88.5);
                $pdf->Cell(3.14, 0.38, 'X');
                $pdf->SetXY(93, 88.5);
                $pdf->Cell(3.14, 0.38, 'X');
            }

            $pdf->SetXY(126, 88.5);
            $pdf->Cell(3.14, 0.38, iconv('UTF-8', 'cp1250',$personas[0]->pnacionalidad));
            
            //porigen
            $pdf->SetXY(163, 88.5);
            $pdf->Cell(3.14, 0.38, iconv('UTF-8', 'cp1250',$personas[0]->porigen));
            
           
            
            
            //porigen

            if($reportes[0]->ptmeses == 1 ){
                $pdf->SetXY(67, 95);
                $pdf->Cell(3.14, 0.38, 'X');
            }
            if($reportes[0]->ptmeses == 2){
                $pdf->SetXY(83, 95);
                $pdf->Cell(3.14, 0.38, 'X');
            }
            if($reportes[0]->ptmeses == 3 ){
                $pdf->SetXY(100, 95);
                $pdf->Cell(3.14, 0.38, 'X');
            }
            if($reportes[0]->ptmeses > 3 || $reportes[0]->ptmeses == 0){
                $pdf->SetXY(115, 95);
                $pdf->Cell(3.14, 0.38, $reportes[0]->ptmeses);
            }
            if($reportes[0]->fingmexico == null){
                $pdf->SetXY(160, 95);
                $pdf->Cell(3.14, 0.38, 'NA');
            }else{
                $pdf->SetXY(160, 95);
                $pdf->Cell(3.14, 0.38, $reportes[0]->fingmexico);
            }

            $pdf->SetXY(55, 101.5);
            $pdf->Cell(3.14, 0.38, iconv('UTF-8', 'cp1250', $personas[0]->pnac));

            $pdf->SetXY(126, 101.5);
            $pdf->Cell(3.14, 0.38, iconv('UTF-8', 'cp1250',$direccion[0]->efednac));

            $pdf->SetXY(55, 105);
            $pdf->Cell(3.14, 0.38, iconv('UTF-8', 'cp1250',$direccion[0]->eresidencia));


            $pdf->SetXY(117.8, 105);
            $pdf->Cell(3.14, 0.38, iconv('UTF-8', 'cp1250', $direccion[0]->mresidencia));

            $pdf->SetXY(55, 109.5);
            $pdf->Cell(3.14, 0.38, iconv('UTF-8', 'cp1250', $direccion[0]->localidad));

            $pdf->SetXY(110, 109.5);
            $pdf->Cell(3.14, 0.38, iconv('UTF-8', 'cp1250', Auth::user()->email));

            $pdf->SetXY(55, 115);
            $pdf->Cell(3.14, 0.38, iconv('UTF-8', 'cp1250', $direccion[0]->calle));

            $pdf->SetXY(162, 115);
            $pdf->Cell(3.14, 0.38, iconv('UTF-8', 'cp1250', $direccion[0]->numero));

            $pdf->SetXY(55, 120);
            $pdf->Cell(3.14, 0.38, iconv('UTF-8', 'cp1250', $direccion[0]->calle1));
            
            $pdf->SetXY(126, 120);
            $pdf->Cell(3.14, 0.38, iconv('UTF-8', 'cp1250', $direccion[0]->calle2));
            
            $pdf->SetXY(55, 124.5);
            $pdf->Cell(3.14, 0.38, iconv('UTF-8', 'cp1250', $direccion[0]->colonia));
            
            $pdf->SetXY(102.5, 124.5);
            $pdf->Cell(3.14, 0.38, iconv('UTF-8', 'cp1250', $direccion[0]->CP));
            
            $pdf->SetXY(145, 124.5);
            $pdf->Cell(3.14, 0.38, iconv('UTF-8', 'cp1250', $personas[0]->telefonoc));

            if($personas[0]->pindigena == 'Sí'){
                $pdf->SetXY(70, 131.5);
                $pdf->Cell(3.14, 0.38, 'X');
            }else{
                $pdf->SetXY(80, 131.5);
                $pdf->Cell(3.14, 0.38, 'X');
            }

            if($personas[0]->lindigena == 'Sí'){
                $pdf->SetXY(129, 131.5);
                $pdf->Cell(3.14, 0.38, 'X');
            }else{
                $pdf->SetXY(138, 131.5);
                $pdf->Cell(3.14, 0.38, 'X');
            }

            $pdf->SetXY(55, 136);
            $pdf->Cell(3.14, 0.38, iconv('UTF-8', 'cp1250', $personas[0]->ocupacion));
            
            $pdf->SetXY(88, 141);
            $pdf->Cell(3.14, 0.38, iconv('UTF-8', 'cp1250', $personas[0]->inseducativa));


            $datos_clinicos = DB::table('datos_clinicos')->where('id', $id)->get();
            $d_clinicos_sintomas = DB::table('datos_clinicos_sintomas')->where('idDclinicos', $datos_clinicos[0]->id)->get();
            //echo dd($d_clinicos_sintomas);

            $separacion = 174.5;

            foreach ($d_clinicos_sintomas as $key => $value) {
                
                if($value->estatus ==0){
                    // En caso de que no tenga sintomas
                    $pdf->SetXY(87.5, $separacion);
                    $pdf->Cell(3.14, 0.38, 'X');
                }else{
                    // En caso de que tenga sintomas
                    $pdf->SetXY(79.5, $separacion);
                    $pdf->Cell(3.14, 0.38, 'X');
                }
                $separacion += 3.3;
            }
            
            

            $tpl2 = $pdf->importPage(2);
            $pdf->AddPage();

            // Use the imported page as the template
            $pdf->useTemplate($tpl2);
        

            // render PDF to browser

            /* Set the PDF Engine Renderer Path */
            $domPdfPath = base_path('vendor/dompdf/dompdf');
            \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
            \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

            //Load word file
            $Content = \PhpOffice\PhpWord\IOFactory::load($tenpFile);

            //Save it into PDF
            $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter(
                $Content,
                'PDF'
            );
            $PDFWriter->save(public_path('new-result.pdf'));
            $pdf->Output('new-result.pdf', 'F');
            return response()
                ->download(
                    public_path('new-result.pdf'),
                    $reportes[0]->folio .
                        '-' .
                        $personas[0]->apellidop .
                        '' .
                        $personas[0]->apellidom .
                        '.pdf',
                    $header
                )
                ->deleteFileAfterSend($shouldDelete = true);
        } catch (\PhpOffice\PhpWord\Exception\Exception $e) {
            //throw $th;
            return back($e->getCode());
        }
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
