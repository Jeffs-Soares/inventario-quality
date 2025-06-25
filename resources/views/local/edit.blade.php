<div>
   
<h1> Local </h1>

<form action="{{route('local.update', $local->id)}}" method="post">
    @csrf
    @method('put')

    <div>
        <label for="name">Nome do Local</label>
        <input type="text" id="loc_descricao" name="loc_descricao" value="{{$local->loc_descricao}}">
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

    <a href="{{ route('local.index') }}" >Cancel</a>

</form>

</div>
