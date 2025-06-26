<div>
    <h1> Local </h1>

    <div>
        <table>
            <thead>
            <tr>
                <th scope="col">
                    Nome do Local
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

    @foreach($locais as $local)

                    <tr>
                        <th scope="row">
                            <a href="{{ route('local.show', $local->id) }}">{{ $local-> loc_descricao }}</a>
                        </th>
                        <td >
                            {{$local->id}}
                        </td>

                        <td>
                            <a href="{{ route('local.edit', $local->id) }}"> Edit </a>

                            <form action="{{ route('local.destroy', $local->id) }}" method="post">
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

    <a href="{{ route('local.create') }}"> Store </a>
    <br>
    <a href="{{('/')}}">Cancel</a>

    
</div>
