<?php

namespace App\Http\Controllers;

use App\Models\kn_autoriai;
use App\Models\kn_skyrius;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\kn_tekstas_eil;
use Inertia\Response;
class ReadingController extends Controller
{
    public function getAll(Request $request) : Response {
        $text = kn_tekstas_eil::query();
        if($request->has('autorius') && $request -> query('autorius') != '') {
            $text->where('autorius_id', $this->getAuthorId($request -> query('autorius')));
        }
        if($request->has('metrika')&& $request -> query('metrika') != '') {
            $text->where('metrika', $request->query('metrika'));
        }
        if($request->has('skyrius') && $request ->query('skyrius') != '') {
            $text->where('skyrius_id', $request->query('skyrius'));
        }
        if($request->has('puslapis') && $request ->query('puslapis') != '') {
            $text->where('puslapis', $request->query('puslapis'));
        }
        return inertia('Reading/Index', [
            'heading' => 'skaitymas',
            'eilutes' => $text->get(),
            'metrics' => $this->getMetricsByName(),
            'authors' => $this->getAuthorsByName(),
            'chapters' => $this->getChaptersByName()
        ]);
        return view('skaitymas', [
            'heading' => 'skaitymas',
            'eilutes' => kn_tekstas_eil::all(),
            'metrics' => $this->getMetricsByName(),
            'authors' => $this->getAuthorsByName(),
            'chapters' => $this->getChaptersByName()
        ]);
    }

    public function search() : View {

        return view('skaitymasSearch', [
            'heading' => 'skaitymas'
        ]);
    }
    public function searchScope(Request $request) : View {
//        if ($request->isMethod('post'))
//        {
//
//        }
        $q = kn_tekstas_eil::query();
        if ($request->filled('metrika')) {
            $q-> where('metrika', $request -> get('metrika')); //Input::get('metrika')
        }
        if ($request->filled('skyrius')) {
            $q-> where('skyrius_id', $request -> get('skyrius'));
        }
        if ($request->filled('autorius')) {
            $q-> where('autorius_id', $this->getAuthorId($request -> get('autorius')));
        }

//        if ($request->has('dalis')) {
//            $q-> where('dalis_id', $request -> get('dalis'));
//        }
//        else {
//            $q-> where('dalis', '1');
//        }
        if ($request->filled('puslapis')) {
            $q-> where('puslapis', $request -> get('puslapis'));
        }
        return view('skaitymas', [
            'heading' => 'skaitymas',
            'eilutes' => $q -> get(),
            'metrics' => $this->getMetricsByName(),
            'authors' => $this->getAuthorsByName(),
            'chapters' => $this->getChaptersByName()
        ]);

    }
    public function getMetricsByName()  {
        $groupedByMetric = kn_tekstas_eil::all() ->
            groupBy('metrika');
        $metrics = [];
        foreach ($groupedByMetric as $key => $value) {

            array_push($metrics, $key);
        }
        return $metrics;
    }
    public function getAuthorsByName()  {
        $authors = kn_autoriai::all() ->
            pluck('autorius','id')->
            toArray();
        return $authors;
    }
    public function getAuthorId($authorName)  {
        $authorId = kn_autoriai::where('autorius', $authorName) ->
            value('id');
        return $authorId;
    }
    public function getChaptersByName()  {
        $chapters = kn_skyrius::all() ->
            pluck('skyriaus_id') ->
            toArray();
        return $chapters;
    }
}
