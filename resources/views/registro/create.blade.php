

    <h1> Criar Registro </h1>

<form action="{{route('registro.store')}}" method="post">
    @csrf
    @method('post')

     <label for="categoria"> Selecione a categoria:
        <select name="categoria">
            @foreach($categorias as $categoria)
                <option value={{$categoria->id}}> {{$categoria->cat_descricao}} </option>
            @endforeach
        </select>
    </label>
<br>
 <br>

    <label for="item"> Selecione a item:
        <select name="item">
            @foreach($items as $item)
                <option value={{$item->id}}> {{$item->item_descricao}} </option>
            @endforeach
        </select>
    </label>

    <br>
    <br>

    <div>
        <label for="nota_fiscal"> Nota Fiscal </label>
        <input type="text" id="nota_fiscal" name="nota_fiscal" value="{{old('nota_fiscal')}}" >
    </div>

    <br>
    <br>

    <div>
    <label  for="data_aquisicao"> Date </label>
    <input type="date" id="data_aquisicao" name="data_aquisicao" value="{{old('data_aquisicao')}}">
    </div>

    <br>
    <br>

    <label for="local"> Selecione o local:
        <select name="local">
            @foreach($locais as $local)
                <option value={{$local->id}}> {{$local->loc_descricao}} </option>
            @endforeach
        </select>
    </label>

    <br>
    <br>

     <div>
        <label for="serial"> Serial: </label>
        <input type="text" id="serial" name="serial" value="{{old('serial')}}" >
    </div>

      <br>
      <br>

     <div>
        <label for="modelo"> Modelo: </label>
        <input type="text" id="modelo" name="modelo" value="{{old('modelo')}}" >
    </div>

     <br>
      <br>

     <div>
        <label for="marca"> Marca: </label>
        <input type="text" id="marca" name="marca" value="{{old('marca')}}" >
    </div>

    <br>
      <br>

     <div>
        <label for="observacao"> Observação: </label>
        <input type="text" id="observacao" name="observacao" value="{{old('observacao')}}" >
    </div>



    {{--       Show Validation  --}}

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

    <button type="submit"> Store </button>

    <a href="\"> Cancel </a>

</form>


