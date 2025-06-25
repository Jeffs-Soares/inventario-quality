<div>
    <h1> Local Create </h1>



     <form  action="{{ route('local.store') }}" method="post">
        @csrf
        @method('post')

        <div class="mb-5">
            <label for="name" > Descrição </label>
            <input type="text" id="loc_descricao" name="loc_descricao" >
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
