<div class="col-md-12 zero-pad-left zero-pad-right">
    <form action="{{url('skaitymas/')}}" method="post" id="searchForm">
        {{csrf_field()}}
        <select name="metrika">
            <option value = "KN SE">KN SE</option>
            <option value = "KN M">KN M</option>
        </select>

        <input type="submit" value="search"/>
    </form>

    </div>
