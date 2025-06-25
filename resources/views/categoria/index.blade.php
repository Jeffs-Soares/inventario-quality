<div>
    <h1 > Categoria </h1>

    <div>
        <table>
            <thead>
            <tr>
                <th scope="col">
                    Nome da Categoria
                </th>
                <th scope="col">
                     ID
                </th>
                <th scope="col">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>

    @foreach($categorias as $categoria)

                    <tr>
                        <th scope="row">
                            <a href="{{ route('categoria.show', $categoria->id) }}">{{ $categoria-> cat_descricao }}</a>
                        </th>
                        <td >
                            {{$categoria->id}}
                        </td>

                        <td>
                            <a href="{{ route('categoria.edit', $categoria->id) }}"> Edit </a>

                            <form action="{{ route('categoria.destroy', $categoria->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"> Delete </button>
                            </form>
                        </td>
                    </tr>
    @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('categoria.create') }}"> Store </a>
    <br>
    <a href="{{('/')}}">Cancel</a>

    
</div>
