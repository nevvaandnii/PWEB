<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreferensiController extends Controller
{

    public function store(
        Request $request
    ) {

        return response()
            ->json([

                'status' =>

                'Preferensi berhasil disimpan',

                'tema' =>

                $request
                    ->tema,

                'font' =>

                $request
                    ->font

            ]);

    }

}
