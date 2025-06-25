<div>

    <h1> Item </h1>

    <div>
        <table>
            <thead>
            <tr>
                <th scope="col">
                    Item ID
                </th>
                <th scope="col">
                    Nome do Item
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    {{$item->id}}
                </td>

                <td>
                    {{$item->item_descricao}}
                </td>


            </tr>
            </tbody>
        </table>
    </div>

    <a href="{{route('item.index')}}" >Back</a>
    
</div>
