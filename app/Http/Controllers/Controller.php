<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // //code...
    // $template = new \PhpOffice\PhpWord\TemplateProcessor(
    //     'template_resultado.docx'
    // );
    // $template->setValue('folio', $reportes[0]->folio);
    // $template->setValue(
    //     'resultado',
    //     strtoupper($reportes[0]->rmuestra)
    // );
    // if ($personas[0]->sexo == 'H') {
    //     $template->setValue('sexo', 'Masculino');
    // }
    // if ($personas[0]->sexo == 'M') {
    //     $template->setValue('sexo', 'Femenino');
    // }

    // if ($personas[0]->sexo == 'O') {
    //     $template->setValue('sexo', 'Otro');
    // }
    // $template->setValue(
    //     'edad',
    //     Carbon::parse($personas[0]->fechanac)->age
    // );
    // $template->setValue(
    //     'nombres',
    //     $personas[0]->apellidop .
    //         ' ' .
    //         $personas[0]->apellidom .
    //         ' ' .
    //         $personas[0]->nombres
    // );
    // $template->setValue('ftmuestra', $reportes[0]->ftmuestra);
    // $template->setValue('nuae', $personas[0]->nuae);
    // $template->setValue('dia', $dia);
    // $template->setValue('dia_n', $dia_num);
    // $template->setValue('mes', $mes);
    // $template->setValue('anio', $anio);
    // $template->setValue('fecha', $fechab);
    // $tenpFile = tempnam(sys_get_temp_dir(), 'PHPWord');
    // $template->saveAs($tenpFile);

}
