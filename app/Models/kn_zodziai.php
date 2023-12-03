<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;
class kn_zodziai extends Model
{
    protected  $table = "kn_zodziai";
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kontekstas_zodziai_id',
        'zodis',
        'kontekstas_eilute',
        'savarankiskumas',
        'pagr_formos_id',
        'reiksme',
        'kaitymas_id',
        'gimine_id',
        'skaicius_id',
        'linksnis_id',
        'kamienas_id',
        'laipsnis_id',
        'apibreztumas_id',
        'valdymas_id',
        'veiksm_forma_id',
        'refleksyvumas_id',
        'rusis_id',
        'nuosaka_id',
        'laikas_id',
        'sud_veiksm_formos_id',
        'asmuo_id',
        'pastabos',
        'galune_id',
    ];
    use HasFactory;
    public function savarankiskumas(): HasOne
    {
        return $this->hasOne(savarankiskumas::class, 'id', 'savarankiskumas');
    }
    
   public function pagr_forma(): HasOne
   {
       return $this->hasOne(kn_leksemos::class, 'id', 'pagr_formos_id');
   }

   public function kaitymas(): HasOne
   {
       return $this->hasOne(kaitymas::class, 'id', 'kaitymas_id');
   }

   public function gimine(): HasOne
   {
       return $this->hasOne(gimines_kategorija::class, 'id', 'gimine_id');
   }
   public function skaicius(): HasOne
   {
       return $this->hasOne(skaiciaus_kategorija::class, 'id', 'skaicius_id');
   }
   public function linksnis(): HasOne
   {
       return $this->hasOne(linksnio_kategorija::class, 'id', 'linksnis_id');
   }
   public function kamienas(): HasOne
   {
       return $this->hasOne(kamienas::class, 'id', 'kamienas_id');
    }
    public function laipsnis(): HasOne
    {
        return $this->hasOne(laipsnio_kategorija::class, 'id', 'laipsnis_id');
    }
    
    public function apibreztumas(): HasOne
    {
        return $this->hasOne(apibreztumas::class, 'id', 'apibreztumas_id');
    }
    public function valdymas(): HasOne
    {
        return $this->hasOne(valdymas::class, 'id', 'valdymas_id');
    }
   public function veiksmForma(): HasOne
   {
       return $this->hasOne(veiksmazodio_forma::class, 'id', 'veiksm_forma_id');
   }  
   public function refleksyvumas(): HasOne
   {
       return $this->hasOne(refleksyvumas::class, 'id', 'refleksyvumas_id');
   }
   public function rusis(): HasOne
   {
       return $this->hasOne(rusis::class, 'id', 'rusis_id');
   }
   public function nuosaka(): HasOne
   {
       return $this->hasOne(nuosaka::class, 'id', 'nuosaka_id');
   }
   public function laikas(): HasOne
   {
       return $this->hasOne(laiko_kategorija::class, 'id', 'laikas_id');
   }
   public function sudVeiksmFormos(): HasOne
   {
       return $this->hasOne(laiko_nuosakos_forma::class, 'id', 'sud_veiksm_formos_id');
   }
   public function asmuo(): HasOne
   {
       return $this->hasOne(asmuo::class, 'id', 'asmuo_id');
   }
   public function eilute(): HasOne
   {
       return $this->hasOne(kn_tekstas_eil::class, 'id', 'kontekstas_eilute');
   }
   public function galune(): HasOne
   {
       return $this->hasOne(galune::class, 'id', 'galune_id');
   }
   public static function getAllWordsJoined (string $word = null) {
       $query = self::query();
       if($word && $word != '') {
           $query->whereRaw('LOWER(kn_zodziai.zodis) LIKE ?', '%'.$word.'%');
        }

        $words = $query->paginate(50)->through(function ($word) {
            return [
                'id' => $word->id,
                'kontekstas_zodziai_id' => $word->kontekstas_zodziai_id,
                'zodis' => $word->zodis,
                'savarankiskumas' => $word->savarankiskumas,
                'pagr_formos_id' => $word->pagr_formos_id,
                'reiksme' => $word->reiksme,
                'kaitymas_id' => $word->kaitymas_id,
                'gimine_id' => $word->gimine_id,
                'skaicius_id' => $word->skaicius_id,
                'linksnis_id' => $word->linksnis_id,
                'kamienas_id' => $word->kamienas_id,
                'laipsnis_id' => $word->laipsnis_id,
                'apibreztumas_id' => $word->apibreztumas_id,
                'valdymas_id' => $word->valdymas_id,
                'veiksm_forma_id' => $word->veiksm_forma_id,
                'refleksyvumas_id' => $word->refleksyvumas_id,
                'rusis_id' => $word->rusis_id,
                'nuosaka_id' => $word->nuosaka_id,
                'laikas_id' => $word->laikas_id,
                'sud_veiksm_formos_id' => $word->sud_veiksm_formos_id,
                'asmuo_id' => $word->asmuo_id,
                'pastabos' => $word->pastabos,
                'galune_id' => $word->galune_id,
            ];
        });
        return $words;
    }
    public static function searchForWords ($searchWord) {
        return self::leftJoin('savarankiskumas', 'kn_zodziai.savarankiskumas', '=', 'savarankiskumas.id') ->
        leftJoin('kaitymas', 'kn_zodziai.kaitymas_id', '=', 'kaitymas.id') ->
        leftJoin('gimines_kategorija', 'kn_zodziai.gimine_id', '=', 'gimines_kategorija.id') ->
        leftJoin('skaiciaus_kategorija', 'kn_zodziai.skaicius_id', '=', 'skaiciaus_kategorija.id') ->
        leftJoin('linksnio_kategorija', 'kn_zodziai.linksnis_id', '=', 'linksnio_kategorija.id') ->
        leftJoin('kamienai', 'kn_zodziai.kamienas_id', '=', 'kamienai.id') ->
        leftJoin('laipsnio_kategorija', 'kn_zodziai.laipsnis_id', '=', 'laipsnio_kategorija.id') ->
        leftJoin('apibreztumas', 'kn_zodziai.apibreztumas_id', '=', 'apibreztumas.id') ->
        leftJoin('valdymas', 'kn_zodziai.valdymas_id', '=', 'valdymas.id') ->
        leftJoin('veiksmazodzio_forma', 'kn_zodziai.veiksm_forma_id', '=', 'veiksmazodzio_forma.id') ->
        leftJoin('refleksyvumas', 'kn_zodziai.refleksyvumas_id', '=', 'refleksyvumas.id') ->
        leftJoin('rusis', 'kn_zodziai.rusis_id', '=', 'rusis.id') ->
        leftJoin('nuosaka', 'kn_zodziai.nuosaka_id', '=', 'nuosaka.id') ->
        leftJoin('laiko_kategorija', 'kn_zodziai.laikas_id', '=', 'laiko_kategorija.id') ->
        leftJoin('laiko_nuosakos_forma', 'kn_zodziai.sud_veiksm_formos_id', '=', 'laiko_nuosakos_forma.id') ->
        leftJoin('asmens_kategorija', 'kn_zodziai.asmuo_id', '=', 'asmens_kategorija.id') ->
        leftJoin('galunes', 'kn_zodziai.galune_id', '=', 'galunes.id') ->

        select(['kn_zodziai.id', 'kn_zodziai.kontekstas_zodziai_id', 'kn_zodziai.zodis', 'kn_zodziai.kontekstas_eilute',
            'savarankiskumas.savarankiskumas', 'kn_zodziai.pagr_formos_id', 'kn_zodziai.reiksme', 'kaitymas.kaitymas as kaitymas_id',
            'gimines_kategorija.pastabos as gimine_id', 'skaiciaus_kategorija.skaicius as skaicius_id', 'linksnio_kategorija.linksnis as linksnis_id',
            'kamienai.kamienas as kamienas_id', 'laipsnio_kategorija.laipsnis as laipsnis_id', 'apibreztumas.apibreztumas as apibreztumas_id',
            'valdymas.valdymas as valdymas_id',
            'veiksmazodzio_forma.veiksmazodzio_forma as veiksm_forma_id',
            'refleksyvumas.sangraziskumas as refleksyvumas_id',
            'rusis.rusis as rusis_id',
            'nuosaka.nuosaka as nuosaka_id',
            'laiko_kategorija.laikas as laikas_id',
            'laiko_nuosakos_forma.sud_veiksm_forma as sud_veiksm_formos_id',
            'asmens_kategorija.asmuo as asmuo_id',
            'kn_zodziai.pastabos',
            'galunes.galune as galune_id']) ->
        whereRaw('LOWER(kn_zodziai.zodis) LIKE ?', '%'.$searchWord.'%')->
//            'LOWER(kn_zodziai.zodis)', 'LIKE','%'.strtolower($searchWord).'%'
        orderBy('kn_zodziai.id') -> paginate(100);
    }

    public static function getWordsFormatted (Request $request = null) {
        $query = self::query();
        // $query->join('kg_shops', function($join)
        // {
        //     $join->on('kg_shops.id', '=', 'kg_feeds.shop_id');
        //     $join->on('kg_shops.active','=', DB::raw('1'));
        // }
        // )
        if($request) {
            $word = $request->get('word');
            if($word && $word != '') {
                $query->whereRaw('LOWER(kn_zodziai.zodis) LIKE ?', '%'.$word.'%');
            }
            $lexeme = $request->get('lexeme');
            if($lexeme && $lexeme != '') {
                $query->whereRaw('kn_zodziai.pagr_formos_id = ?', $lexeme);
            }
            // $kalbos_dalis = $request->get('kalbos_dalis');
            // if($word && $word != '') {
            //     $query->whereRaw('kn_zodziai.kalbod_dalis_id = ?', '%'.$kalbos_dalis.'%');
            // }
            // $kilme = $request->get('kilme');
            // if($word && $word != '') {
            //     $query->whereRaw('kn_zodziai.kilme_id = ?', '%'.$kilme.'%');
            // }
            $kamienas = $request->get('kamienas');
            if($kamienas && $kamienas != '') {
                $query->whereRaw('kn_zodziai.kamienas_id = ?', '%'.$kamienas.'%');
            }
            $gimine = $request->get('gimine');
            if($gimine && $gimine != '') {
                $query->whereRaw('kn_zodziai.gimine_id = ?', '%'.$gimine.'%');
            }
            $valdymas = $request->get('valdymas');
            if($valdymas && $valdymas != '') {
                $query->whereRaw('kn_zodziai.valdymas_id = ?', '%'.$valdymas.'%');
            }
            // $laikas = $request->get('laikas');
            // if($laikas && $laikas != '') {
            //     $query->whereRaw('kn_zodziai.laikas = ?', '%'.$kamienas.'%');
            // }
            $asmuo = $request->get('galune');
            if($asmuo && $asmuo != '') {
                $query->whereRaw('kn_zodziai.galune_id = ?', '%'.$asmuo.'%');
            }
            $skaicius = $request->get('skaicius');
            if($skaicius && $skaicius != '') {
                $query->whereRaw('kn_zodziai.skaicius_id = ?', '%'.$skaicius.'%');
            }
        }
        //->whereRaw('LOWER(kn_zodziai.pagr_formos_id) LIKE ?', '%'."10000".'%');

        $words = $query->paginate(50)->through(function ($word) {
            $eilute1 = kn_tekstas_eil::select(['eilutes'])->where('kn_tekstas_eil.id', '=', $word->kontekstas_eilute-1)->first();
            $eilute2 = kn_tekstas_eil::select(['eilutes'])->where('kn_tekstas_eil.id', '=', $word->kontekstas_eilute+1)->first();
            error_log($eilute1);
            error_log($eilute2);
            return [
                'id' => $word->id,
                'zodis' => $word->zodis,
                'kontekstas_eilute' =>  ($eilute1 ? $eilute1->eilutes : '')."||".$word->eilute->eilutes."||".($eilute2 ? $eilute2->eilutes : ''),
                'pagr_formos_id' => $word->pagr_formos_id,
                'kontekstas_zodziai_id' => $word->kontekstas_zodziai_id,
                'lizdas' => $word->pagr_forma,
                'pagrForma' => $word->pagr_formos_id,
                'kaitymas_id' => $word->kaitymas_id,
                'reiksme' => $word->reiksme,
                'gimine_id' => $word->gimine_id,
                'skaicius_id' => $word->skaicius_id,
                'linksnis_id' => $word->linksnis_id,
                'kamienas_id' => $word->kamienas_id,
                'laipsnis_id' => $word->laipsnis_id,
                'apibreztumas_id' => $word->apibreztumas_id,
                'valdymas_id' => $word->valdymas_id,
                'veiksm_forma_id' => $word->veiksm_forma_id,
                'refleksyvumas_id' => $word->refleksyvumas_id,
                'rusis_id' => $word->rusis_id,
                'nuosaka_id' => $word->nuosaka_id,
                'laikas_id' => $word->laikas_id,
                'sud_veiksm_formos_id' => $word->sud_veiksm_formos_id,
                'asmuo_id' => $word->asmuo_id,
                'pastabos' => $word->pastabos,
                'galune_id' => $word->galune_id,
            ];
        });
        return $words;
    }
}
