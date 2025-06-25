<div>

    <h1> Local </h1>

    <div>
        <table>
            <thead>
            <tr>
                <th scope="col">
                    Local ID
                </th>
                <th scope="col">
                    Nome do Local
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    {{$local->id}}
                </td>

                <td>
                    {{$local->loc_descricao}}
                </td>


            </tr>
            </tbody>
        </table>
    </div>

    <a href="{{route('local.index')}}" >Back</a>
    
</div>
