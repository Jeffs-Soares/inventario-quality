<div>

    <h1> Categoria </h1>

    <div>
        <table>
            <thead>
            <tr>
                <th scope="col">
                    Categoria ID
                </th>
                <th scope="col">
                    Nome da Categoria
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    {{$categoria->id}}
                </td>

                <td>
                    {{$categoria->cat_descricao}}
                </td>


            </tr>
            </tbody>
        </table>
    </div>

    <a href="{{route('categoria.index')}}" >Back</a>
    
</div>
