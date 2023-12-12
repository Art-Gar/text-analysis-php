
<table class="table table-bordered w-100">
        <thead>
        <tr>
                <th scope="col">žodžio forma</th>
                <th scope="col">Forma</th>
                <th scope="col">metrikos</th>
                <th scope="col">skyrius</th>
                <th scope="col">tekstas</th>
                <th scope="col">kamienas</th>
                <th scope="col">konkordinacija</th>

        </tr>
        </thead>
        <tbody class="text-palem" style="font-size: 12px">
        @foreach($words as $word)
        <tr>
                <td>{{ $word['lizdas']['pagr_formos'] }}</td>
                <td>{{ $word['pagr_formos_id'] }}</td>
                <td>{{ $word['metrikos'] }}</td>
                <td>{{ $word['skyrius'] }}</td>
                <td>{{ $word['zodis'] }}</td>
                <td>{{ $word['kamienas'] }}</td>
                <td>{{ $word['kontekstas_eilute'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <style type="text/css">
        

</style>