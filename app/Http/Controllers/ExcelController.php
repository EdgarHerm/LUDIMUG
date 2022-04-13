<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use \setasign\Fpdi\FPDI;
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
            'SELECT * FROM persona INNER JOIN reporte ON reporte.idPersona = persona.idPersona WHERE persona.idPersona = ' .
            $id;

        $personas = \DB::select($persona);
        $reportes = \DB::select($reporte);

        $fecha = Carbon::parse($reportes[0]->ftmuestra);
        $fechab = date('Y-m-d');
        $dia = $fecha->formatLocalized('%A');
        $mes = $fecha->formatLocalized('%B');
        $dia_num = $fecha->formatLocalized('%d');
        $anio = $fecha->formatLocalized('%Y');
        $date = new Carbon('tomorrow');
        echo $date;
        try {
            //code...
            $template = new \PhpOffice\PhpWord\TemplateProcessor(
                'template_resultado.docx'
            );
            $template->setValue('folio', $reportes[0]->folio);
            $template->setValue(
                'resultado',
                strtoupper($reportes[0]->rmuestra)
            );
            if ($personas[0]->sexo == 'H') {
                $template->setValue('sexo', 'Masculino');
            }
            if ($personas[0]->sexo == 'M') {
                $template->setValue('sexo', 'Femenino');
            }

            if ($personas[0]->sexo == 'O') {
                $template->setValue('sexo', 'Otro');
            }
            $template->setValue(
                'edad',
                Carbon::parse($personas[0]->fechanac)->age
            );
            $template->setValue(
                'nombres',
                $personas[0]->apellidop .
                    ' ' .
                    $personas[0]->apellidom .
                    ' ' .
                    $personas[0]->nombres
            );
            $template->setValue('ftmuestra', $reportes[0]->ftmuestra);
            $template->setValue('nuae', $personas[0]->nuae);
            $template->setValue('dia', $dia);
            $template->setValue('dia_n', $dia_num);
            $template->setValue('mes', $mes);
            $template->setValue('anio', $anio);
            $template->setValue('fecha', $fechab);
            $tenpFile = tempnam(sys_get_temp_dir(), 'PHPWord');
            $template->saveAs($tenpFile);

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
            $pdf->SetFont('Arial', 'B', 9); // set font size
            $pdf->SetXY(37.5, 50.8); // set the position of the box
            $pdf->Cell(3.14, 0.38, $reportes[0]->folio); // add the text, align to Center of cell

            // add the reason for certificate
            // note the reduction in font and different box position
            $pdf->SetFont('Arial', 'B', 20); // set font size
            $pdf->SetXY(80, 105);
            $pdf->Cell(150, 10, 'Hola', 1, 0, 'C');

            // the day
            $pdf->SetFont('Arial', '', 20); // set font size
            $pdf->SetXY(118, 122);
            $pdf->Cell(20, 10, date('d'), 1, 0, 'C');

            // the month
            $pdf->SetXY(160, 122);
            $pdf->Cell(30, 10, date('M'), 1, 0, 'C');

            // the year, aligned to Left
            $pdf->SetXY(200, 122);
            $pdf->Cell(20, 10, date('y'), 1, 0, 'L');

            $tpl2 = $pdf->importPage(2);
            $pdf->AddPage();

            // Use the imported page as the template
            $pdf->useTemplate($tpl2);

            // Set the default font to use
            $pdf->SetFont('Helvetica');

            // adding a Cell using:
            // $pdf->Cell( $width, $height, $text, $border, $fill, $align);

            // First box - the user's Name
            $pdf->SetFontSize('30'); // set font size
            $pdf->SetXY(10, 89); // set the position of the box
            $pdf->Cell(0, 10, 'Niraj Shah', 1, 0, 'C'); // add the text, align to Center of cell

            // add the reason for certificate
            // note the reduction in font and different box position
            $pdf->SetFontSize('20');
            $pdf->SetXY(80, 105);
            $pdf->Cell(150, 10, 'creating an awesome tutorial', 1, 0, 'C');

            // the day
            $pdf->SetFontSize('20');
            $pdf->SetXY(118, 122);
            $pdf->Cell(20, 10, date('d'), 1, 0, 'C');

            // the month
            $pdf->SetXY(160, 122);
            $pdf->Cell(30, 10, date('M'), 1, 0, 'C');

            // the year, aligned to Left
            $pdf->SetXY(200, 122);
            $pdf->Cell(20, 10, date('y'), 1, 0, 'L');

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
            $pdf->Output("new-result.pdf", "F");
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
