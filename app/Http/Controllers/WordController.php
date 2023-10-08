<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kn_zodziai;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class WordController extends Controller
{
    public function getAll(): View {
        {
            $words = kn_zodziai::getAllWordsJoined();
            return view('zodziai')->with('zodziai', $words)->with('heading', 'zodziai');
        }
    }
    public function getWords(Request $request) {
        {
            if($request->ajax()) {
                $words = kn_zodziai::getAllWordsJoined();
            return view('zodziai_data' )->with('zodziai', $words)->render();
            }
        }
    }
    public function searchWords(Request $request) {
        {
            if($request->ajax()) {
                $words = kn_zodziai::searchForWords($request->get('search'));
                error_log($request->get('search'));
                return view('zodziai_data' )->with('zodziai', $words)->render();
            }
        }
    }
    public function byId($id): View {
        return view('zodziaiById', [
            'heading' => 'zodziai',
            'zodziai' => kn_zodziai::find($id)
        ]);
    }
}
