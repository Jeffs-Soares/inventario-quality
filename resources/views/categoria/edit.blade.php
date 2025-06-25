<div>
   
<h1> Categoria </h1>

<form action="{{route('categoria.update', $categoria->id)}}" method="post">
    @csrf
    @method('put')

    <div>
        <label for="name">Nome da categoria</label>
        <input type="text" id="cat_descricao" name="cat_descricao" value="{{$categoria->cat_descricao}}">
    </div>


    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <div role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            </ul>
        </div>
    @endif

    <button type="submit" >Update</button>

    <a href="{{ route('categoria.index') }}" >Cancel</a>

</form>

</div>

