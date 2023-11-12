<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;
use Nette\Utils\Json;
use Mail;


class CotizacionController extends Controller
{
    public function solicitarCotizacion(Request $request)
    {
        // Lógica para obtener los datos de la cotización y la empresa
        //$cotizacionData = $request->session()->get('tempList', []);
        //$empresaData = $request->empresa;


        //return Json::encode($cotizacionData);


        // Lógica para obtener los datos de la cotización y la empresa
        $cotizacionData = $request->session()->get('tempList', []);
        $empresaData = $request->empresa;

        // Crear el archivo Excel
        $filePath = public_path('cotizacion.xlsx'); // Ruta donde se guardará el archivo

        $writer = WriterEntityFactory::createXLSXWriter();
        $writer->openToFile($filePath);

        // Agregar las filas al archivo Excel
        $sheet = $writer->getCurrentSheet();

        $writer->addRow(WriterEntityFactory::createRow([WriterEntityFactory::createCell('Material'), WriterEntityFactory::createCell('Precio Referencial')]));

        foreach ($cotizacionData as $material) {
            $writer->addRow(WriterEntityFactory::createRow([WriterEntityFactory::createCell($material['nombre']), WriterEntityFactory::createCell($material['precio_referencial'])]));
        }

        // Cerrar el archivo Excel
        $writer->close();


       // Enviar el archivo Excel por correo electrónico
       $filePath = public_path('cotizacion.xlsx');
        
       Mail::send([], [], function ($message) use ($empresaData, $filePath) {
           $message->to('clauvaldez@gmail.com')
               ->subject('Solicitud de Cotización')
               ->attach($filePath);
       });

       // Eliminar el archivo Excel después de enviarlo
       unlink($filePath);

       return Json::encode("OK");


        //return view('cotizacion.success'); // Vista de éxito
    }
}
