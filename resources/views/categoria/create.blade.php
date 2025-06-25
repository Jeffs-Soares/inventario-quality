<div>
    <h1> Categoria Create </h1>


     <form  action="{{ route('categoria.store') }}" method="post">
        @csrf
        @method('post')

        <div>
            <label for="name" > Descrição </label>
            <input type="text" id="cat_descricao" name="cat_descricao" >
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

