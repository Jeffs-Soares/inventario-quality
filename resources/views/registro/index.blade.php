
    <h1> Registro </h1>

    <div>
        <table>
            <thead>
            <tr>

                <th scope="col">
                    ID
                </th>
                <th scope="col">
                    Categoria
                </th>

                <th scope="col">
                    Item
                </th>

                <th scope="col">
                    Nota Fiscal
                </th>

                <th scope="col">
                    Data da Aquisição
                </th>

                <th scope="col">
                    Local
                </th>

                <th scope="col">
                    Serial
                </th>

                <th scope="col">
                    Modelo
                </th>

                <th scope="col">
                    Marca
                </th>

                <th scope="col">
                    Observação
                </th>

                <th scope="col">
                    Ação
                </th>

            </tr>
            </thead>
            <tbody>

        @foreach($registros as $registro)

            <tr>
                <td>
                    <a href="{{ route('registro.show', $registro->id) }}"> {{ $registro->id }}</a>
                </td>

                <td>
                    {{ $registro->hasCategoria->cat_descricao }}
                </td>

                 <td>
                     {{ $registro->hasItem->item_descricao }}
                </td>

                <td>
                     {{ $registro->nota_fiscal }}
                </td>

                <td>
                     {{ $registro->data_aquisicao }}
                </td>

                <td>
                     {{ $registro->hasLocal->loc_descricao }}
                </td>

                <td>
                     {{ $registro->serial }}
                </td>

                 <td>
                     {{ $registro->modelo }}
                </td>

                  <td>
                     {{ $registro->marca }}
                </td>

                 <td>
                     {{ $registro->observacao }}
                </td>


                <td>
                    <a href="{{ route('registro.edit', $registro->id) }}">Editar</a>

                    <form action="{{ route('registro.destroy', $registro->id) }}" method="post">
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

    <a href="{{route('registro.create')}}"> Store </a>

    <a href="/"> Home </a>

