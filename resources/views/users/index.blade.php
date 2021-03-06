<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos os Usuários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="w-full flex justify-end">
                        <x-button.create href="{{ route('users.create') }}">
                            Novo usuário
                        </x-button.create>
                    </div>

                    <x-table.main>
                        <x-table.head>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                id
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                e-mail
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                actions
                            </th>
                        </x-table.head>
                        <x-table.body>
                            @foreach ($users as $user)
                                @if (!$user->id === Auth::id())
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $user->id }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $user->email }}
                                        </td>

                                        <td
                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap flex flex-row space-x-2">
                                            <x-button.delete action="/users/{{ $user->id }}">
                                                Deletar Usuário
                                            </x-button.delete>

                                            <x-button.edit href="{{ route('users.edit', $user->id) }}">
                                                Editar Usuário
                                            </x-button.edit>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </x-table.body>
                    </x-table.main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
