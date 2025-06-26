<div>
    <h1> Item </h1>

    <div>
        <table>
            <thead>
            <tr>
                <th scope="col">
                    Nome do Item
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

    @foreach($items as $item)

                    <tr>
                        <th scope="row">
                            <a href="{{ route('item.show', $item->id) }}">{{ $item-> item_descricao }}</a>
                        </th>
                        <td >
                            {{$item->id}}
                        </td>

                        <td>
                            <a href="{{ route('item.edit', $item->id) }}"> Edit </a>

                            <form action="{{ route('item.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')"> Delete </button>
                            </form>
                        </td>
                    </tr>
    @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('item.create') }}"> Store </a>
    <br>
    <a href="{{('/')}}">Cancel</a>

    
</div>
