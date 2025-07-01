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
<h3 class="text-xs uppercase text-gray-400 font-semibold mb-2">Menu</h3>
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
<a class="flex items-center p-2 text-sm hover:bg-gray-700 rounded-md @if ($path == 'categoria') bg-gray-700 @endif" href="{{route('categoria.index')}}">
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

<main class="flex-1 p-4 sm:p-6 lg:p-8 overflow-y-auto">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-3 py-3 text-left text-xs sm:text-sm font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col" class="px-3 py-3 text-left text-xs sm:text-sm font-medium text-gray-500 uppercase tracking-wider">
                                        Categoria
                                    </th>
                                    <th scope="col" class="px-3 py-3 text-left text-xs sm:text-sm font-medium text-gray-500 uppercase tracking-wider">
                                        Ação
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($categorias as $categoria)
                                    <tr>
                                        <td class="px-3 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $categoria->id }}
                                        </td>
                                        <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $categoria->cat_descricao }}
                                        </td>
                                        <td class="px-3 py-4 whitespace-nowrap text-right text-sm font-medium flex items-center space-x-2">
                                            <a href="{{ route('categoria.edit', $categoria->id) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                            <form action="{{ route('categoria.destroy', $categoria->id) }}" method="post" class="inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')" class="text-red-600 hover:text-red-900"> Delete </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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

                @if (session('success'))
                <div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                    <div class="mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-md">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="flex flex-col sm:flex-row mt-4 gap-2">
                    <a class="w-full sm:w-auto text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="{{route('categoria.create')}}">
                        Store
                    </a>
                    <a href="{{('/')}}" class="w-full sm:w-auto text-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                        Cancel
                    </a>
                </div>
            </main>
</div>
</div>
</body>
</html>




