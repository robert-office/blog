<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos os seus Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="w-full flex justify-end">
                        <x-button.create href="{{ route('posts.create') }}">
                            Novo Post
                        </x-button.create>
                    </div>

                    <x-table.main>
                        <x-table.head>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                id
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                titulo
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                banner img
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                criado em
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                ações
                            </th>
                        </x-table.head>
                        <x-table.body>
                            @forelse ($posts as $post)
                                <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $post->id }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $post->title }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <img width="56px" height="56px" src="{{ $post->getFirstMediaUrl('banners') }}" />
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $post->created_at }}
                                    </td>
                                    <td
                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap flex flex-row space-x-2">
                                        <x-button.delete action="/posts/{{ $post->id }}">
                                            Deletar Post
                                        </x-button.delete>

                                        <x-button.edit href="{{ route('posts.edit', $post->id) }}">
                                            Editar Post
                                        </x-button.edit>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="py-10" colspan="20" align="center">Sem nenhum registo no momento</td>
                                </tr>
                            @endforelse
                        </x-table.body>

                        {{ $posts->links() }}

                    </x-table.main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
