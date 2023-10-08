<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\kn_leksemos;
class LexemeController
{
    public function getAll(): View {
        {
            return view('leksemos', [
                'heading' => 'leksemos',
                'leksemos' => kn_leksemos::getAllLexemesJoined()
            ]);
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
                error_log($request->get('search'));
                return view('leksemos_data' )->with('leksemos', $lexemes)->render();
            }
        }
    }
}
