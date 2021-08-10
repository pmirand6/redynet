<?php

namespace Classes\Excel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DownloadExcel
{
    /**
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public static function createExcel($query, $filename = 'data.xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $Excel_writer = new Xlsx($spreadsheet);

        $spreadsheet->setActiveSheetIndex(0);
        $activeSheet = $spreadsheet->getActiveSheet();

        $activeSheet->setCellValue('A1', 'Codigo');
        $activeSheet->setCellValue('B1', 'Apellido');
        $activeSheet->setCellValue('C1', 'Nombre');
        $activeSheet->setCellValue('D1', 'tipo_doc');
        $activeSheet->setCellValue('E1', 'documento');
        $activeSheet->setCellValue('F1', 'sexo');
        $activeSheet->setCellValue('G1', 'nacionalidad');
        $activeSheet->setCellValue('H1', 'cuilcuit');
        $activeSheet->setCellValue('I1', 'ccnumero');
        $activeSheet->setCellValue('J1', 'fecha_nac');
        $activeSheet->setCellValue('K1', 'lugar_nac');
        $activeSheet->setCellValue('L1', 'edad');
        $activeSheet->setCellValue('M1', 'estado_civil');
        $activeSheet->setCellValue('N1', 'numero');
        $activeSheet->setCellValue('O1', 'piso');
        $activeSheet->setCellValue('P1', 'depto');
        $activeSheet->setCellValue('Q1', 'localidad');
        $activeSheet->setCellValue('R1', 'provincia');
        $activeSheet->setCellValue('S1', 'cp');
        $activeSheet->setCellValue('T1', 'email');
        $activeSheet->setCellValue('U1', 'telefono');
        $activeSheet->setCellValue('V1', 'celular');
        $activeSheet->setCellValue('W1', 'marca');
        $activeSheet->setCellValue('X1', 'modelo');
        $activeSheet->setCellValue('Y1', 'ano');
        $activeSheet->setCellValue('Z1', 'estado');
        $activeSheet->setCellValue('AA1', 'clave');
        $activeSheet->setCellValue('AB1', 'nombre_conyugue');
        $activeSheet->setCellValue('AC1', 'nombre_madre');
        $activeSheet->setCellValue('AD1', 'nombre_padre');
        $activeSheet->setCellValue('AE1', 'fallecida_madre');
        $activeSheet->setCellValue('AF1', 'fallecido_padre');
        $activeSheet->setCellValue('AG1', 'movilidad');
        $activeSheet->setCellValue('AH1', 'sec_completo');
        $activeSheet->setCellValue('AI1', 'sec_titulo');
        $activeSheet->setCellValue('AJ1', 'disponivilidad_viajar');
        $activeSheet->setCellValue('AH1', 'tipo_contrato');

        if($query->num_rows > 0) {
            $i = 2;
            while($row = $query->fetch_assoc()) {
                $activeSheet->setCellValue('A'.$i , $row['codigo']);
                $activeSheet->setCellValue('B'.$i , $row['apellido']);
                $activeSheet->setCellValue('C'.$i , $row['nombre']);
                $activeSheet->setCellValue('D'.$i , $row['tipo_doc']);
                $activeSheet->setCellValue('E'.$i , $row['documento']);
                $activeSheet->setCellValue('F'.$i , $row['sexo']);
                $activeSheet->setCellValue('G'.$i , $row['nacionalidad']);
                $activeSheet->setCellValue('H'.$i , $row['cuilcuit']);
                $activeSheet->setCellValue('I'.$i , $row['ccnumero']);
                $activeSheet->setCellValue('J'.$i , $row['fecha_nac']);
                $activeSheet->setCellValue('K'.$i , $row['lugar_nac']);
                $activeSheet->setCellValue('L'.$i , $row['edad']);
                $activeSheet->setCellValue('M'.$i , $row['estado_civil']);
                $activeSheet->setCellValue('N'.$i , $row['numero']);
                $activeSheet->setCellValue('O'.$i , $row['piso']);
                $activeSheet->setCellValue('P'.$i , $row['depto']);
                $activeSheet->setCellValue('Q'.$i , $row['localidad']);
                $activeSheet->setCellValue('R'.$i , $row['provincia']);
                $activeSheet->setCellValue('S'.$i , $row['cp']);
                $activeSheet->setCellValue('T'.$i , $row['email']);
                $activeSheet->setCellValue('U'.$i , $row['telefono']);
                $activeSheet->setCellValue('V'.$i , $row['celular']);
                $activeSheet->setCellValue('W'.$i , $row['marca']);
                $activeSheet->setCellValue('X'.$i , $row['modelo']);
                $activeSheet->setCellValue('Y'.$i , $row['ano']);
                $activeSheet->setCellValue('Z'.$i , $row['estado']);
                $activeSheet->setCellValue('AA'.$i , $row['clave']);
                $activeSheet->setCellValue('AB'.$i , $row['nombre_conyugue']);
                $activeSheet->setCellValue('AC'.$i , $row['nombre_madre']);
                $activeSheet->setCellValue('AD'.$i , $row['nombre_padre']);
                $activeSheet->setCellValue('AE'.$i , $row['fallecida_madre']);
                $activeSheet->setCellValue('AF'.$i , $row['fallecido_padre']);
                $activeSheet->setCellValue('AG'.$i , $row['movilidad']);
                $activeSheet->setCellValue('AH'.$i , $row['sec_completo']);
                $activeSheet->setCellValue('AI'.$i , $row['sec_titulo']);
                $activeSheet->setCellValue('AJ'.$i , $row['disponivilidad_viajar']);
                $activeSheet->setCellValue('AH'.$i , $row['tipo_contrato']);
                $i++;
            }
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename='. $filename);
        header('Cache-Control: max-age=0');
        $Excel_writer->save('php://output');
    }

}