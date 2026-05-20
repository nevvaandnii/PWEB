<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController
extends Controller
{

    public function index(
        Request $request
    ) {
        $visit =
            session(
                'visit',
                0
            );
        $visit++;
        session([
            'visit' =>
            $visit
        ]);

        if (
            !session()->has(
                'first_visit'
            )
        ) {
            session([
                'first_visit' =>
                now()
            ]);
        }

        session([
            'last_visit' =>
            now()
        ]);

        return view(
            'dashboard',
            [
                'visit' =>
                session(
                    'visit'
                ),
                'first' =>
                session(
                    'first_visit'
                ),
                'last' =>
                session(
                    'last_visit'
                )
            ]
        );
    }

    public function reset()
    {
        session()->forget([
            'visit',
            'first_visit',
            'last_visit'
        ]);

        return redirect()
            ->route(
                'dashboard'
            );
    }
}
