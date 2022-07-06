<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos as categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="w-full flex justify-end">
                        <x-button.create href="{{ route('categories.create') }}">
                            Nova Categoria
                        </x-button.create>
                    </div>

                    <x-table.main>
                        <x-table.head>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                id
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                name
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                created_at
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                actions
                            </th>
                        </x-table.head>
                        <x-table.body>
                            @forelse ($categories as $category)
                                <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $category->id }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $category->name }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $category->created_at }}
                                    </td>

                                    <td
                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap flex flex-row space-x-2">
                                        <x-button.edit href="{{ route('categories.edit', $category->id) }}">
                                            Editar Categoria
                                        </x-button.edit>

                                        <x-button.delete action="/categories/{{ $category->id }}">
                                            Deletar Categoria
                                        </x-button.delete>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="py-10" colspan="20" align="center">Sem nenhum registo no momento</td>
                                </tr>
                            @endforelse
                        </x-table.body>


                    </x-table.main>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
