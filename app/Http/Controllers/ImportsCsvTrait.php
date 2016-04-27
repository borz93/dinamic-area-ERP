<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

trait ImportCsvTrait{
//    Metodo que se encarga de leer, analizar, relacionar e insertar en la bd los elementos del archivo.
//    Es utilizado en los 3 controllers (ofertas, clientes y articulos)
//    Se le pasa un array como argumento, si no se le pasa ninguno, crea uno vacio.
//    Crea un array asociativo con los elementos del csv, eliminando las cabeceras con array_shift
//    Posteriormente, creo dos variables para guardar los numeros de validos o invalidos. Compruebo si el archivo
//    importado corresponde al modelo actual comparado las claves del array con los atributos del modelo.
//    A través del foreach, recorro cada fila del array asociativo, buscando la clave 'id', para evitar insertar
//    elementos con el mismo id y transfromando el campo 'activo' a booleano, ya que daba problemas
//    al guardarlo en la bbdd, y guarda el modelo con el metodo save().
//    Por ultimo, añade a las variables valid e invalid mensajes de error o exito.

    public static function importCsv($csvfile = array(),$atributes = array())
    {
        $csv = array_map('str_getcsv', file($csvfile));
        array_walk($csv, function(&$a) use ($csv) {
            $a = array_combine($csv[0], $a);
        });
        array_shift($csv);
        $invalid=0;
        $valid=0;
        if(count(array_diff_key(array_flip($atributes),$csv[0])) == 0)
        {
            foreach($csv as $data)
            {
                if(!self::find($data['id']))
                {
                    $data['activo'] = isset($data['activo']) ? (bool)$data['activo']: false;
                    $model = self::create($data);
                    $model->save();
                    $valid ++;
                }else
                {
                    $invalid++;
                }
            }
            return array('valid'=>'Insertado '.$valid.' elementos','invalid'=>'No isertados '.$invalid.' elementos');
        }else{
            return array('invalid'=>'El archivo importado no pertenece a esta categoria');
        }
    }
}