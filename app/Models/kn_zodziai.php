<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

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
    public $timestamps =false;
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
       return $this->hasOne(kamienai::class, 'id', 'kamienas_id');
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
       return $this->hasOne(asmens_kategorija::class, 'id', 'asmuo_id');
   }
   public function eilute(): HasOne
   {
       return $this->hasOne(kn_tekstas_eil::class, 'id', 'kontekstas_eilute');
   }
   public function galune(): HasOne
   {
       return $this->hasOne(galunes::class, 'id', 'galune_id');
   }
   public static function getAllWords (string $word = null) {
       $query = self::query();
       if($word && $word != '') {
           $query->whereRaw('LOWER(kn_zodziai.zodis) LIKE ?', '%'.$word.'%');
        }

        $words = $query->paginate(100)->through(function ($word) {
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
            $query->join('kn_tekstas_zodziais', 'kn_tekstas_zodziais.id', '=', 'kn_zodziai.kontekstas_zodziai_id');
            $query->join('kn_leksemos', 'kn_leksemos.id', '=', 'kn_zodziai.pagr_formos_id');

            if($word && $word != '') {
                error_log($word);
                $query->whereRaw('LOWER(kn_zodziai.zodis) LIKE ?', '%'.$word.'%');
            }
            $lexeme = $request->get('lexeme');
            if($lexeme && $lexeme != '' && $lexeme != '0') {

                $query->whereRaw('kn_zodziai.pagr_formos_id = ?', $lexeme);
            }
            $kalbos_dalis = $request->get('kalbos_dalis');
            if($kalbos_dalis && $kalbos_dalis != 0) {
                error_log($kalbos_dalis);
                $query->whereRaw('kn_leksemos.kalbos_dalis_id = ?', '%'.$kalbos_dalis.'%');
            }
            $kilme = $request->get('kilme');
            if($word && $word != '') {
                $query->whereRaw('kn_leksemos.kilme_id = ?', '%'.$kilme.'%');
            }
            $kamienas = $request->get('kamienas');
            if($kamienas && $kamienas != '' && $kamienas !='0') {
                $query->whereRaw('kn_zodziai.kamienas_id = ?', $kamienas);
            }
            $gimine = $request->get('gimine');
            if($gimine && $gimine != '' && $gimine != '0') {
                $query->whereRaw('kn_zodziai.gimine_id = ?', $gimine);
            }
            $valdymas = $request->get('valdymas');
            if($valdymas && $valdymas != '' && $valdymas != '') {
                $query->whereRaw('kn_zodziai.valdymas_id = ?', $valdymas);
            }
            $laikas = $request->get('laikas');
            if($laikas && $laikas != '' && $laikas != '') {
                $query->whereRaw('kn_zodziai.laikas = ?', $laikas);
            }
            $asmuo = $request->get('galune');
            if($asmuo && $asmuo != '' && $asmuo != '') {
                $query->whereRaw('kn_zodziai.asmuo_id = ?', $asmuo);
            }
            $skaicius = $request->get('skaicius');
            if($skaicius && $skaicius != '' && $skaicius != '0') {
                $query->whereRaw('kn_zodziai.skaicius_id = ?', $skaicius);
            }
            $puslapis = $request->get('puslapis');
            if($puslapis && $puslapis != '' && $puslapis != '0') {
                $query->whereRaw('kn_tekstas_zodziais.puslapis = ?', $puslapis);
            }
        }
        //->whereRaw('LOWER(kn_zodziai.pagr_formos_id) LIKE ?', '%'."10000".'%');
        $words = $query->select(['kn_zodziai.id', 'kn_zodziai.kontekstas_zodziai_id', 'kn_zodziai.zodis', 'kn_zodziai.kontekstas_eilute', 'kn_zodziai.pagr_formos_id', 
        'kn_zodziai.reiksme', 'kn_zodziai.kaitymas_id', 'kn_zodziai.gimine_id', 'skaicius_id', 'linksnis_id', 'kn_zodziai.kamienas_id', 'kn_zodziai.laipsnis_id', 'kn_zodziai.apibreztumas_id',
        'kn_zodziai.valdymas_id','kn_zodziai.veiksm_forma_id','kn_zodziai.refleksyvumas_id','kn_zodziai.rusis_id','kn_zodziai.nuosaka_id',
        'kn_zodziai.laikas_id','kn_zodziai.sud_veiksm_formos_id','kn_zodziai.asmuo_id','kn_zodziai.pastabos',
        'kn_zodziai.galune_id'])->orderBy('kn_zodziai.id')->paginate(15)->through(function ($word) {
            $mainWord = kn_tekstas_zodziais::select(['id','zodziai', 'nr'])->where('kn_tekstas_zodziais.id', '=', $word->kontekstas_zodziai_id)->first();
            $eilute1 = kn_tekstas_zodziais::select(['zodziai'])->where([
                ['kn_tekstas_zodziais.nr', '>', $mainWord->nr-10],
                ['kn_tekstas_zodziais.nr', '<', $mainWord->nr],
                ])->limit(10)->get();
            
            $eilute2 = kn_tekstas_zodziais::select(['zodziai'])->where('kn_tekstas_zodziais.nr', '>', $mainWord->nr)->limit(10)->get();
            $context = $eilute1->map(function ($item) {
                return $item['zodziai'];
            })->join(' ').'¶'.$mainWord['zodziai'].$eilute2->map(function ($item) {
                return $item['zodziai'];
            })->join(' ');
            return [
                'id' => $word->id,
                'zodis' => $word->zodis,
                'kontekstas_eilute' =>  $context,
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
    






    public static function getWordsForPdf (Request $request = null) {
        $query = self::query();
        $query->join('kn_leksemos', 'kn_leksemos.id', '=', 'kn_zodziai.pagr_formos_id');
        $query->join('kn_tekstas_eil', 'kn_tekstas_eil.id', '=', 'kn_zodziai.kontekstas_eilute');
        $query->join('kamienai', 'kamienai.id', '=', 'kn_zodziai.kamienas_id');
        if($request) {
            $word = $request->get('word');
            if($word && $word != '') {
                $query->whereRaw('LOWER(kn_zodziai.zodis) LIKE ?', '%'.$word.'%');
            }
            $lexeme = $request->get('lexeme');
            if($lexeme && $lexeme != '' && $lexeme != '0') {

                $query->whereRaw('kn_zodziai.pagr_formos_id = ?', $lexeme);
            }
            $kalbos_dalis = $request->get('kalbos_dalis');
            if($kalbos_dalis && $kalbos_dalis != 0) {
                error_log($kalbos_dalis);
                $query->whereRaw('kn_leksemos.kalbos_dalis_id = ?', '%'.$kalbos_dalis.'%');
            }
            $kilme = $request->get('kilme');
            if($word && $word != '') {
                $query->whereRaw('kn_leksemos.kilme_id = ?', '%'.$kilme.'%');
            }
            $kamienas = $request->get('kamienas');
            if($kamienas && $kamienas != '' && $kamienas !='0') {
                $query->whereRaw('kn_zodziai.kamienas_id = ?', $kamienas);
            }
            $gimine = $request->get('gimine');
            if($gimine && $gimine != '' && $gimine != '0') {
                $query->whereRaw('kn_zodziai.gimine_id = ?', $gimine);
            }
            $valdymas = $request->get('valdymas');
            if($valdymas && $valdymas != '' && $valdymas != '') {
                $query->whereRaw('kn_zodziai.valdymas_id = ?', $valdymas);
            }
            $laikas = $request->get('laikas');
            if($laikas && $laikas != '' && $laikas != '') {
                $query->whereRaw('kn_zodziai.laikas = ?', $laikas);
            }
            $asmuo = $request->get('galune');
            if($asmuo && $asmuo != '' && $asmuo != '') {
                $query->whereRaw('kn_zodziai.asmuo_id = ?', $asmuo);
            }
            $skaicius = $request->get('skaicius');
            if($skaicius && $skaicius != '' && $skaicius != '0') {
                $query->whereRaw('kn_zodziai.skaicius_id = ?', $skaicius);
            }
        }
        //->whereRaw('LOWER(kn_zodziai.pagr_formos_id) LIKE ?', '%'."10000".'%');
        $words = $query->select(['kn_zodziai.id', 'kn_zodziai.kontekstas_zodziai_id', 'kn_zodziai.zodis', 'kn_zodziai.kontekstas_eilute', 'kn_zodziai.pagr_formos_id', 
        'kn_zodziai.reiksme', 'kn_zodziai.kaitymas_id', 'kn_zodziai.gimine_id', 'skaicius_id', 'linksnis_id', 'kn_zodziai.kamienas_id', 'kn_zodziai.laipsnis_id', 'kn_zodziai.apibreztumas_id',
        'kn_zodziai.valdymas_id','kn_zodziai.veiksm_forma_id','kn_zodziai.refleksyvumas_id','kn_zodziai.rusis_id','kn_zodziai.nuosaka_id', 'kn_leksemos.kaitybos_tipas_id',
        'kn_zodziai.laikas_id','kn_zodziai.sud_veiksm_formos_id','kn_zodziai.asmuo_id','kn_zodziai.pastabos',
        'kn_zodziai.galune_id', 'kn_tekstas_eil.metrika', 'kn_tekstas_eil.puslapis', 'kn_tekstas_eil.eilute', 'kn_tekstas_eil.skyrius_id', 'kamienai.kamienas'])->orderBy('kn_zodziai.id')->limit(10)->get()->map(function ($word) {
            $mainWord = kn_tekstas_zodziais::select(['id','zodziai', 'nr'])->where('kn_tekstas_zodziais.id', '=', $word->kontekstas_zodziai_id)->first();
            $eilute1 = kn_tekstas_zodziais::select(['zodziai'])->where([
                ['kn_tekstas_zodziais.nr', '>', $mainWord->nr-10],
                ['kn_tekstas_zodziais.nr', '<', $mainWord->nr],
                ])->limit(10)->get();
            
            $eilute2 = kn_tekstas_zodziais::select(['zodziai'])->where('kn_tekstas_zodziais.nr', '>', $mainWord->nr)->limit(10)->get();
            $context = $eilute1->map(function ($item) {
                return $item['zodziai'];
            })->join(' ').'¶'.$mainWord['zodziai'].$eilute2->map(function ($item) {
                return $item['zodziai'];
            })->join(' ');
            return [
                'id' => $word->id,
                'zodis' => $word->zodis,
                'kontekstas_eilute' =>  $context,
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
                'kaitybos_tipas_id' => $word->kaitybos_tipas_id,
                'rusis_id' => $word->rusis_id,
                'nuosaka_id' => $word->nuosaka_id,
                'laikas_id' => $word->laikas_id,
                'sud_veiksm_formos_id' => $word->sud_veiksm_formos_id,
                'asmuo_id' => $word->asmuo_id,
                'pastabos' => $word->pastabos,
                'galune_id' => $word->galune_id,
                'metrikos' => $word->metrika.', '.$word->puslapis.', '.$word->eilute,
                'skyrius' => $word->skyrius_id,
                'kamienas' => $word->kamienas
            ];
        });
        return $words;
    }
}
