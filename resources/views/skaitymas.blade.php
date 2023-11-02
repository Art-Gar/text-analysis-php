@extends('layout')
@section('content')
<div class="col-md-12 zero-pad-left zero-pad-right">
    <form action="{{url('/')}}" method="post" id="searchForm">
        {{csrf_field()}}
        <label for="metrika">Metrika</label>
        <select name="metrika">
            @foreach($metrics as $metric)
                <option value = "{{$metric}}"> {{$metric}} </option>
            @endforeach
        </select>
        <label for="autorius">Autorius</label>
        <select name="autorius">
            <option value = ""/>
            @foreach($authors as $author)
                <option value = "{{$author}}"> {{$author}} </option>
            @endforeach
        </select>
        <label for="skyrius">Skyrius</label>
        <select name="skyrius">
            <option value = ""/>
            @foreach($chapters as $chapter)
                <option value = "{{$chapter}}"> {{$chapter}} </option>
            @endforeach
        </select>

        <input type="number" name="puslapis" value="" placeholder="puslapio numeris"><br>

        <input type="submit" value="search"/>
    </form>

</div>

    @php
        $toggle = false;
    @endphp
    <h1>{{ $heading }}</h1>

    @unless(count($eilutes) == 0)
        @php($oldPage = 0)

        <h1>0</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

        @foreach($eilutes as $eilute)
            @php($newPage = $eilute['puslapis'])
            @if($newPage!=$oldPage)
                @php($oldPage=$newPage)

                <tr>
                    <td><h1>{{$newPage}}</h1></td>
                </tr>

            @endif
            <tr >
                <td style = "background-color:  @if($toggle) #dcdcdc @else background-color: #dcdcdc; @endif">{{$eilute['metrika']}} {{$eilute['puslapis']}},{{$eilute['eilute']}}</td>
                <td style = "background-color:  @if($toggle) #dcdcdc @else background-color: #dcdcdc; @endif">{{$eilute['eilutes']}}</td>
            </tr>
            @php($toggle=!$toggle)
        @endforeach
                </tbody>
            </table>
    @else
        <p>Eilutės su tokiais parametrais nerastos</p>
    @endunless
@endsection
