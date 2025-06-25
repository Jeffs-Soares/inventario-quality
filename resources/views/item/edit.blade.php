<div>
   
<h1> Item </h1>

<form action="{{route('item.update', $item->id)}}" method="post">
    @csrf
    @method('put')

    <div>
        <label for="name">Nome do Item</label>
        <input type="text" id="item_descricao" name="item_descricao" value="{{$item->item_descricao}}">
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

    <a href="{{ route('item.index') }}" >Cancel</a>

</form>

</div>
