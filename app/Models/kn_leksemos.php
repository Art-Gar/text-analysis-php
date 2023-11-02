<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kn_leksemos extends Model
{
    protected  $table = "kn_leksemos";
    protected $keyType = 'string';
    use HasFactory;
    public static function getAllLexemesJoined () {
        return self::leftJoin('kalbos_dalis', 'kn_leksemos.kalbos_dalis_id', '=', 'kalbos_dalis.id') ->
        leftJoin('kilme', 'kn_leksemos.kilme_id', '=', 'kilme.id') ->
        leftJoin('struktura', 'kn_leksemos.struktura_id', '=', 'struktura.id') ->
        leftJoin('kaitybos_tipas', 'kn_leksemos.kaitybos_tipas_id', '=', 'kaitybos_tipas.id') ->
        leftJoin('daryba', 'kn_leksemos.daryba_id', '=', 'daryba.id') ->
        leftJoin('priesaga', 'kn_leksemos.priesagos_id', '=', 'priesaga.id') ->
        leftJoin('priesdelis', 'kn_leksemos.priesdeliai_id', '=', 'priesdelis.id') ->
        select(['kn_leksemos.id', 'kn_leksemos.lizdas', 'kn_leksemos.pagr_formos', 'kalbos_dalis.kalbos_dalis as kalbos_dalis_id',
            'kilme.kilme as kilme_id', 'struktura.struktura as struktura_id', 'kaitybos_tipas.tipas_kamienas as kaitybos_tipas_id', 'daryba.daryba as daryba_id',
            'kn_leksemos.pamatinis_zodis', 'kn_leksemos.darybos_afiksas', 'kn_leksemos.pastabos', 'kn_leksemos.saknis',
            'kn_leksemos.pamatine_saknis1', 'kn_leksemos.pamatine_saknis2',  'priesaga.priesaga as priesagos_id',
            'kn_leksemos.jungiamasis_balsis']) ->
        orderBy('kn_leksemos.id') -> paginate(20);
    }
    public static function searchForLexemes ($searchLexeme) {
        return self::leftJoin('kalbos_dalis', 'kn_leksemos.kalbos_dalis_id', '=', 'kalbos_dalis.id') ->
        leftJoin('kilme', 'kn_leksemos.kilme_id', '=', 'kilme.id') ->
        leftJoin('struktura', 'kn_leksemos.struktura_id', '=', 'struktura.id') ->
        leftJoin('kaitybos_tipas', 'kn_leksemos.kaitybos_tipas_id', '=', 'kaitybos_tipas.id') ->
        leftJoin('daryba', 'kn_leksemos.daryba_id', '=', 'daryba.id') ->
        leftJoin('priesaga', 'kn_leksemos.priesagos_id', '=', 'priesaga.id') ->
        leftJoin('priesdelis', 'kn_leksemos.priesdeliai_id', '=', 'priesdelis.id') ->
        select(['kn_leksemos.id', 'kn_leksemos.lizdas', 'kn_leksemos.pagr_formos', 'kalbos_dalis.kalbos_dalis as kalbos_dalis_id',
            'kilme.kilme as kilme_id', 'struktura.struktura as struktura_id', 'kaitybos_tipas.tipas_kamienas as kaitybos_tipas_id', 'daryba.daryba as daryba_id',
            'kn_leksemos.pamatinis_zodis', 'kn_leksemos.darybos_afiksas', 'kn_leksemos.pastabos', 'kn_leksemos.saknis',
            'kn_leksemos.pamatine_saknis1', 'kn_leksemos.pamatine_saknis2',  'priesaga.priesaga as priesagos_id', 'priesdelis.priesdelis as priesdeliai_id',
            'kn_leksemos.jungiamasis_balsis']) ->
        whereRaw('LOWER(kn_leksemos.pagr_formos) LIKE ?', '%'.$searchLexeme.'%')->
            orWhereRaw('LOWER(kn_leksemos.lizdas) LIKE ?', '%'.$searchLexeme.'%') ->
            orWhereRaw('LOWER(kn_leksemos.id) LIKE ?', '%'.$searchLexeme.'%') ->
        orderBy('kn_leksemos.id') -> paginate(20);
    }
}
