<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormularioController extends Controller
{
    public function traerItems() {

        //Trae los campos necesarios de cada ítem y trae de vuelta el resultado de dicha query
        $sql = "SELECT id_item, item, categoria_item FROM sensorial_verificacion_items";

        $result = DB::connection()->select(DB::raw($sql));

        return $result;
    }

    public function traerMetodosFormulario1() {

        //Trae todos los métodos presentes en la tabla, y trae de vuelta el resultado de la query
        $sql_metodos = "SELECT * FROM sensorial_verificacion_metodos";

        $result = DB::connection()->select(DB::raw($sql_metodos));

        return $result;
    }

    public function traerCategorias () {

        // Trae el ID de la categoría de la tabla de categorías, y trae de vuelta el resultado de la query
        $sql_categorias = "SELECT id_categoria_item FROM sensorial_verificacion_categorias_items";

        $result = DB::connection()->select(DB::raw($sql_categorias));

        return $result;
    }

    public function returnRequest(Request $request) {

        //Recorre cada iteración de lo que está recibiendo
        foreach($request->formulario as $formularios) {

            //Recorre lo que está dentro de cada respuesta y empieza a insertar
            foreach($formularios as $formulario) {
                $sql_insert = "INSERT INTO sensorial_verificacion_bitacora (id_item, id_metodo, revisado)
                VALUES (?, ?, ?)";

                DB::connection()->select(DB::raw($sql_insert), [$formulario['id_item'], $formulario['id_metodo'],
                $formulario['revisado']]);
            }
        }
    }
}
