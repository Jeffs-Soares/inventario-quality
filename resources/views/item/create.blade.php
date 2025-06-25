<div>
    <h1> Item Create </h1>



     <form  action="{{ route('item.store') }}" method="post">
        @csrf
        @method('post')

        <div>
            <label for="name" > Descrição </label>
            <input type="text" id="item_descricao" name="item_descricao" >
        </div>



        @if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            <div role="alert">
                                {{ $error }}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="submit">Store</button>

        <a href="{{('/')}}">Cancel</a>

    </form>

</div>
