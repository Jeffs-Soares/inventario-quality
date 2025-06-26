

    <h1> Editar Registro </h1>


    <form action="{{ route('registro.update', $registro->id) }}" method="post">
        @csrf
        @method('put')


        <label for="categoria">  Nova Categoria:
            <select  name="categoria" >
                @foreach($categorias as $categoria)
                        <option value={{ $categoria->id }}>
                            {{ $categoria->cat_descricao }}
                        </option>
                @endforeach
            </select>
        </label>

        <br>
        <br>

         <label for="item"> Novo Item:
            <select  name="item" >
                @foreach($items as $item)
                        <option value={{ $item->id }}>
                            {{ $item->item_descricao }}
                        </option>
                @endforeach
            </select>
        </label>

        <br>
        <br>

        <div>
        <label for="nota_fiscal"> Nota Fiscal </label>
        <input type="text" id="nota_fiscal" name="nota_fiscal" value="{{ $registro->nota_fiscal }}" >
        </div>

        <br>

        <div>
    <label  for="data_aquisicao"> Date </label>
    <input type="date" id="data_aquisicao" name="data_aquisicao" value="{{ $registro->data_aquisicao }}">
    </div>

    <br>

        <label for="local"> Selecione o novo Local:
            <select  name="local" >
                @foreach($locais as $local)
                        <option value={{ $local->id }}>
                            {{ $local->loc_descricao }}
                        </option>
                @endforeach
            </select>
        </label>

        <br>
        <br>


        <div>
        <label for="serial"> Serial: </label>
        <input type="text" id="serial" name="serial" value="{{ $registro->serial }}" >
    </div>

    <br>

     <div>
        <label for="modelo"> Modelo: </label>
        <input type="text" id="modelo" name="modelo" value="{{$registro->modelo}}" >
    </div>

    <br>

     <div>
        <label for="marca"> Marca: </label>
        <input type="text" id="marca" name="marca" value="{{ $registro->marca }}" >
    </div>

    <br>

     <div>
        <label for="observacao"> Observação: </label>
        <input type="text" id="observacao" name="observacao" value="{{ $registro->observacao }}" >
    </div>


        @if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <div  role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                </ul>
            </div>
        @endif

        <br>
        <br>


        <button type="submit"> Update </button>

        <a href="{{route('registro.index')}}"> Cancel </a>

    </form>


