<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\kn_leksemos;
use Inertia\Response;
use Inertia\Inertia;
class LexemeController
{
    public function getAll(): Response {
        {
            $lexesmes = kn_leksemos::getAllLexemesJoined();
            return Inertia::render('Lexemes/Index', [
                'lexemes' => kn_leksemos::getAllLexemesJoined(),
            ]);
            // return view('leksemos', [
            //     'heading' => 'leksemos',
            //     'lexemes' => kn_leksemos::getAllLexemesJoined()
            // ]);
        }
    }
    public function getLexemes(Request $request) {
        {
            if($request->ajax()) {
                $lexemes = kn_leksemos::getAllLexemesJoined();

                return view('leksemos_data' )->with('leksemos', $lexemes)->render();
            }
        }
    }
    public function searchLexemes(Request $request) {
        {
            if($request->ajax()) {
                $lexemes = kn_leksemos::searchForLexemes($request->get('search'));
                return view('leksemos_data' )->with('leksemos', $lexemes)->render();
            }
        }
    }
}
