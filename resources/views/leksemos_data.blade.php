@unless(count($leksemos) == 0)
    <table class="table table-bordered w-100">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Lizdas</th>
            <th scope="col">PagrFormos</th>
            <th scope="col">Kalbos dalis</th>
            <th scope="col">Kilme</th>
            <th scope="col">Struktura</th>
            <th scope="col">Kaitybos</th>
            <th scope="col">Daryba</th>
            <th scope="col">Pamatinis zodis</th>
            <th scope="col">Darybos afiksas</th>
            <th scope="col">Pastabos</th>
            <th scope="col">Saknis</th>
            <th scope="col">Pamatine saknis1</th>
            <th scope="col">Pamatine saknis2</th>
            <th scope="col">Priesagos</th>
            <th scope="col">Priesdeliai</th>
            <th scope="col">Jungiamasis balsis</th>
        </tr>
        </thead>
        <tbody style="font-size: 12px">
        @foreach($leksemos as $leksema)
            <tr>
                <td>{{$leksema['id']}}</td>
                <td>{{$leksema['lizdas']}}</td>
                <td>{{$leksema['pagr_formos']}}</td>
                <td>{{$leksema['kalbos_dalis_id']}}</td>
                <td>{{$leksema['kilme_id']}}</td>
                <td>{{$leksema['struktura_id']}}</td>
                <td>{{$leksema['kaitybos_tipas_id']}}</td>
                <td>{{$leksema['daryba_id']}}</td>
                <td>{{$leksema['pamatinis_zodis']}}</td>
                <td>{{$leksema['darybos_afiksas']}}</td>
                <td>{{$leksema['pastabos']}}</td>
                <td>{{$leksema['saknis']}}</td>
                <td>{{$leksema['pamatine_saknis1']}}</td>
                <td>{{$leksema['pamatine_saknis2']}}</td>
                <td>{{$leksema['priesagos_id']}}</td>
                <td>{{$leksema['priesdeliai_id']}}</td>
                <td>{{$leksema['jungiamasis_balsis']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $leksemos->links() }}
@else
    <p>Empty list</p>
@endunless
