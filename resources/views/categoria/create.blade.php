
<!DOCTYPE html>
<html lang="pt-BR"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Sistema de Inventário</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com"></script>
<style>
    body {
      font-family: 'Roboto', sans-serif;
    }
    .sidebar {
      width: 250px;
    }
    .sidebar-item:hover {
      background-color: #4a5568;
    }
    .breadcrumb-item+.breadcrumb-item::before {
      content: ">";
      margin: 0 0.5rem;
    }
  </style>
</head>
<body class="bg-gray-100">
<div class="flex h-screen">
<aside class="sidebar bg-sky-500 text-white flex flex-col" style='background-color: #0cc4cc'>
<div class="p-4 border-b border-gray-700">
<img alt="AXS Logo" class="h-10 mx-auto" src="img/logo_branco.png"/>
</div>
<div class="flex items-center p-4 border-b border-gray-700">
<img alt="User avatar" class="h-10 w-10 rounded-full mr-3" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDHTzixOq7LyWfJ4lIcRhBJJvYLxd-6azpE0QKVs73mnJTW77cZRQj91f6n7I34i4NbVtTbTyTYYvMw6LjRHBXRCGSXQs6JqS-5jnuigf1sNEJbxbuhcdtuXYgPr7lGDI4b5BCTU9G3tkws09mGv1XlDvn_bS7OOVKm7eMw7j61XGm14xfz-upDtYDg_qz3sx2vwbkXRl_N9311erLYq5Z-4ac4X_qYChxXs0s6XCIi2nVNtWhk-9f6KfWb-DULX5tkThj9d-mWyQ"/>
<span class="font-semibold"> Usuário </span>
</div>
<nav class="flex-grow">
<div class="p-4">
<h3 class="text-xs uppercase text-gray-600 font-semibold mb-2">Menu</h3>
<ul>

<li class="sidebar-item rounded-md">
<a class="flex items-center p-2 text-sm hover:bg-gray-700 rounded-md" href="{{route('registro.index')}}">
<span class="material-icons mr-3">business</span>
                Registros
              </a>
</li>
<li class="sidebar-item rounded-md">
<a class="flex items-center p-2 text-sm hover:bg-gray-700 rounded-md" href="{{route('local.index')}}">
<span class="material-icons mr-3">account_balance_wallet</span>
                Locais

                
              </a>
</li>
<li class="sidebar-item rounded-md">
<a class="flex items-center p-2 text-sm hover:bg-gray-700 rounded-md" href="{{route('categoria.index')}}">
<span class="material-icons mr-3">category</span>
                Categorias
              </a>

</li>

<li class="sidebar-item rounded-md">
<a class="flex items-center p-2 text-sm hover:bg-gray-700 rounded-md" href="{{route('item.index')}}">
<span class="material-icons mr-3">inventory_2</span>
                Items
              </a>

</li>

<li class="sidebar-item rounded-md">
<a class="flex items-center p-2 text-sm hover:bg-gray-700 rounded-md" href="#">
<span class="material-icons mr-3">dashboard</span>
                Sair
              </a>

</li>
</ul>
</div>
</nav>
</aside>
<div class="flex-1 flex flex-col">
<header class="bg-white shadow-md p-4 flex justify-between items-center">
<div class="flex items-center">
<button class="text-gray-600 focus:outline-none">
<span class="material-icons">menu</span>
</button>
</div>
<div class="flex items-center space-x-4">

</button>
<div class="flex items-center">
<img alt="User avatar" class="h-8 w-8 rounded-full mr-2" src="https://lh3.googleusercontent.com/aida-public/AB6AXuApmhbaWZgp0GztMKi43S4U2l3NUI-xdgjaPxnKw-A59cc44RlDcZwVMvxdga8TYtdX-7u1oYGqpV37Cy0VEjUqisQNIBpoH5-7zRHCeLhu5hvGaOaNu8kZ17sSF0f7ZQx9-vI6s5lyqZacKCBYcD0z7j5Pq1CGAiZSXnlaAiXLr4hMh420L2jYkXmKPp-g-lFZCj1xiFRa8x77a0QysbxVr21Q0ICAsBw9CyPgySiuUtee95yc-HjrRgDIWwY4j-0kyj4olRONaQ"/>
<span class="text-sm text-gray-700"> Usuário</span>
<span class="material-icons text-gray-600">keyboard_arrow_down</span>
</div>
</div>
</header>
<main class="flex-1 p-4 sm:p-6 lg:p-8">
   <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md mt-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-6">Criar Categoria</h1>

        <form action="{{ route('categoria.store') }}" method="post" class="space-y-6">
            @csrf
            @method('post')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                <input type="text" id="cat_descricao" name="cat_descricao"
                       class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 p-2">
            </div>


            @if($errors->any())
                <div class="mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-md" role="alert">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="flex flex-col sm:flex-row mt-6 gap-2">
                <button type="submit" class="w-full sm:w-auto text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Store
                </button>
                <a href="{{route('categoria.index')}}" class="w-full sm:w-auto text-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</main>
</div>
</div>
</body>
</html>

