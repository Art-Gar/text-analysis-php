<?php

namespace App\Http\Controllers;

use App\Models\galunes;
use App\Models\gimines_kategorija;
use App\Models\kalbos_dalis;
use App\Models\kamienai;
use App\Models\kn_dalys;
use App\Models\kn_leksemos;
use App\Models\kn_reiksmes;
use Illuminate\Http\Request;
use App\Models\kn_zodziai;
use App\Models\laiko_kategorija;
use App\Models\laipsnio_kategorija;
use App\Models\nuosaka;
use App\Models\refleksyvumas;
use App\Models\rusis;
use App\Models\savarankiskumas;
use App\Models\semantika;
use App\Models\valdymas;
use App\Models\veiksmazodio_forma;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Inertia\Inertia;
use Inertia\Response;
use Barryvdh\DomPDF\Facade\Pdf;
class WordController extends Controller
{
    public function getAll(Request $request): Response {
        {
                return inertia('Words/Index', [
                    'words' => kn_zodziai::getAllWords($request -> query('word')),
                ]);
        }
    }

    public function getWordPdf(Request $request) {
        {
            $data = [
                'words' => kn_zodziai::getWordsForPdf($request),
            ];
            $pdf = Pdf::loadView('word_pdf', $data);
            return $pdf->download('Ataskaita.pdf');
        }
    }


    public function updateWord(Request $request, string $id) {
        {
            $valid = request()->validate([
                'gimine_id' => 'required|integer',
                'skaicius_id' => 'required|integer',
                'linksnis_id' => 'required|integer',
                'kamienas_id' => 'required|integer',
                'laipsnis_id' => 'required|integer',
                'apibreztumas_id' => 'required|integer',
                'veiksm_forma_id' => 'required|integer',
                'nuosaka_id' => 'required|integer',
                'valdymas_id' => 'required|integer',
                'refleksyvumas_id' => 'required|integer',
                'rusis_id' => 'required|integer',
                'laikas_id' => 'required|integer',
                'nuosaka_id' => 'required|integer',
                'reiksme' => 'required|string',
                'galune_id' => 'required|integer',

            ]);
            $word = kn_zodziai::where('id', $id)->update([
                'gimine_id' => $valid['gimine_id'],
                'skaicius_id' => $valid['skaicius_id'],
                'linksnis_id' => $valid['linksnis_id'],
                'kamienas_id' => $valid['kamienas_id'],
                'laipsnis_id' => $valid['laipsnis_id'],
                'apibreztumas_id' => $valid['apibreztumas_id'],
                'veiksm_forma_id' => $valid['veiksm_forma_id'],
                'nuosaka_id' => $valid['nuosaka_id'],
                'valdymas_id' => $valid['valdymas_id'],
                'refleksyvumas_id' => $valid['refleksyvumas_id'],
                'rusis_id' => $valid['rusis_id'],
                'laikas_id' => $valid['laikas_id'],
                'nuosaka_id' => $valid['nuosaka_id'],
                'reiksme' => $valid['reiksme'],
                'galune_id' => $valid['galune_id'],
            ]);
            return response()->noContent(200);
        }
    }
    public function getKaityba(Request $request): Response {
        {
                return inertia('Kaityba/Index', [
                    'words' => fn () => kn_zodziai::getWordsFormatted($request),
                    'lexemes' => kn_leksemos::select(['id', 'pagr_formos'])->get(),
                    'kalbos_dalys' => kalbos_dalis::select(['id', 'kalbos_dalis'])->get(),
                    'kamienai' => kamienai::select(['id','kamienas'])->get(),
                    'gimines' => gimines_kategorija::select(['id','pastabos','gimine'])->get(),
                    'rusys' => rusis::select(['id','rusis'])->get(),
                    'veiksmazodzio_formos' => veiksmazodio_forma::select(['id','pastabos'])->get(),
                    'refleksyvumai' => refleksyvumas::select(['id','pastabos'])->get(),
                    'galunes' => galunes::select(['id','pastabos', 'galune'])->get(),
                    'savarankiskumai' => savarankiskumas::select(['id','savarankiskumas'])->get(),
                    'valdymai' => valdymas::select(['id','valdymas'])->get(),
                    'KN_dalys' => kn_dalys::select(['id', 'kn', 'knyga'])->get(),
                    'laikai' => laiko_kategorija::select(['id', 'laikas', 'pilnas_pavadinimas'])->get(),
                    'laipsniai' => laipsnio_kategorija::select(['id', 'laipsnis', 'pastabos'])->get(),
                    'reiksmes' => semantika::select(['id', 'reiksmes_aiskinimas'])->get(),

                ]);


            // return view('zodziai')->with('zodziai', $words)->with('heading', 'zodziai');
        }
    }
    // public function getWords(Request $request) {
    //     {
    //         if($request->ajax()) {
    //             $words = kn_zodziai::getAllWordsJoined();
    //         return view('zodziai_data' )->with('zodziai', $words)->render();
    //         }
    //     }
    // }

    public function getWordData() {
        {
            return kn_zodziai::getAllWordsJoined();
        }
    }
    public function searchWords(Request $request) {
        {
            if($request->ajax()) {
                $words = kn_zodziai::searchForWords($request->get('search'));
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
