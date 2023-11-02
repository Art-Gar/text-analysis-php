
@unless(count($zodziai) == 0)
    <table class="table table-bordered w-100">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Kontekstas_zodziai</th>
            <th scope="col">Zodis</th>
            <th scope="col">Kontekstas_eilute</th>
            <th scope="col">Savarankiskumas</th>
            <th scope="col">PagrFormos</th>
            <th scope="col">Reiksme</th>
            <th scope="col">Kaitymas</th>
            <th scope="col">Gimine</th>
            <th scope="col">Skaicius</th>
            <th scope="col">Linksnis</th>
            <th scope="col">Kamienas</th>
            <th scope="col">Laipsnis</th>
            <th scope="col">Apibreztumas</th>
            <th scope="col">Valdymas</th>
            <th scope="col">VeiksmForma</th>
            <th scope="col">Refleksyvumas</th>
            <th scope="col">Rusis</th>
            <th scope="col">Nuosaka</th>
            <th scope="col">Laikas</th>
            <th scope="col">SudVeiksmFormos</th>
            <th scope="col">Asmuo</th>
            <th scope="col">Pastabos</th>
            <th scope="col">Galune</th>
        </tr>
        </thead>
        <tbody style="font-size: 12px">
        @foreach($zodziai as $zodis)
            <tr>
                <td>{{$zodis['id']}}</td>
                <td>{{$zodis['kontekstas_zodziai_id']}}</td>
                <td>{{$zodis['zodis']}}</td>
                <td>{{$zodis['kontekstas_eilute']}}</td>
                <td>{{$zodis['savarankiskumas']}}</td>
                <td>{{$zodis['pagr_formos_id']}}</td>
                <td>{{$zodis['reiksme']}}</td>
                <td>{{$zodis['kaitymas_id']}}</td>
                <td>{{$zodis['gimine_id']}}</td>
                <td>{{$zodis['skaicius_id']}}</td>
                <td>{{$zodis['linksnis_id']}}</td>
                <td>{{$zodis['kamienas_id']}}</td>
                <td>{{$zodis['laipsnis_id']}}</td>
                <td>{{$zodis['apibreztumas_id']}}</td>
                <td>{{$zodis['valdymas_id']}}</td>
                <td>{{$zodis['veiksm_forma_id']}}</td>
                <td>{{$zodis['refleksyvumas_id']}}</td>
                <td>{{$zodis['rusis_id']}}</td>
                <td>{{$zodis['nuosaka_id']}}</td>
                <td>{{$zodis['laikas_id']}}</td>
                <td>{{$zodis['sud_veiksm_formos_id']}}</td>
                <td>{{$zodis['asmuo_id']}}</td>
                <td>{{$zodis['pastabos']}}</td>
                <td>{{$zodis['galune_id']}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $zodziai->links() }}
@else
    <p>Empty list</p>
@endunless
