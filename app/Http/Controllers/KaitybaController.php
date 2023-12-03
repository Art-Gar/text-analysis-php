<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\kn_leksemos;
use Inertia\Response;
use Inertia\Inertia;
class KaitybaController
{
    public function getAll(): Response {
        {
            $lexesmes = kn_leksemos::getAllLexemesJoined();
            return Inertia::render('Lexemes/Index', [
                'lexemes' => kn_leksemos::getAllLexemesJoined(),
            ]);
        }
    }
}
