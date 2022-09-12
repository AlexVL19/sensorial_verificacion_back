<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormularioController extends Controller
{
    public function traerItems() {
        $sql = "SELECT id_item, item, categoria_item FROM sensorial_verificacion_items";

        $result = DB::connection()->select(DB::raw($sql));

        return $result;
    }

    public function traerMetodosFormulario1() {

        $sql_metodos = "SELECT * FROM sensorial_verificacion_metodos";

        $result = DB::connection()->select(DB::raw($sql_metodos));

        return $result;
    }

    public function traerCategorias () {
        $sql_categorias = "SELECT id_categoria_item FROM sensorial_verificacion_categorias_items";

        $result = DB::connection()->select(DB::raw($sql_categorias));

        return $result;
    }

    public function returnRequest(Request $request) {

        foreach($request->formulario as $formularios) {
            foreach($formularios as $formulario) {
                $sql_insert = "INSERT INTO sensorial_verificacion_bitacora (id_item, id_metodo, revisado)
                VALUES (?, ?, ?)";

                DB::connection()->select(DB::raw($sql_insert), [$formulario['id_item'], $formulario['id_metodo'],
                $formulario['revisado']]);
            }
        }
    }
}
