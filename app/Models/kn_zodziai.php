<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kn_zodziai extends Model
{
    protected  $table = "kn_zodziai";
    use HasFactory;
    public static function getAllWordsJoined () {
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
        orderBy('kn_zodziai.id') -> paginate(20);
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
        orderBy('kn_zodziai.id') -> paginate(20);
    }
}
