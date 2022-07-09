<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('posts.update', $post->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="w-full flex sm:flex-row flex-col sm:space-x-10 space-y-5 sm:space-y-0">
                            <div class="sm:w-3/4 w-full">
                                <x-label for="title" :value="__('Titulo')" />

                                <x-input id="title" class="block mt-1 w-full" type="text" name="title"
                                    value="{{ $post->title }}" required autofocus />
                            </div>

                            <div class="sm:w-1/4 w-full">
                                <x-label for="categorias" :value="__('Categorias')" />

                                <x-dropdown.wrapper wrapperName="categorias-wrapper"
                                    buttonId="categorias-id-wrapper-button">
                                    @foreach ($allCategories as $category)
                                        @if (in_array($category->toArray()['id'], $categoriesOfPost1d))
                                            <x-dropdown.checkbox name="categories[]" checked value='{{ $category->id }}'>
                                                {{ $category->name }}
                                            </x-dropdown.checkbox>
                                        @else
                                            <x-dropdown.checkbox name="categories[]" value='{{ $category->id }}'>
                                                {{ $category->name }}
                                            </x-dropdown.checkbox>
                                        @endif
                                    @endforeach
                                </x-dropdown.wrapper>
                            </div>
                        </div>

                        <!-- Name -->
                        <div class="my-5">
                            <x-label for="banner" :value="__('Banner')" />

                            <input type="file" class="filepond" name="banner" data-max-file-size="3MB">
                        </div>

                        <!-- Name -->
                        <div class="my-5">
                            <x-label for="editor" :value="__('Editor')" />
                            <input type="text" value='{{ $post->body }}' hidden id="bodyEditor" name="body" />
                            <div id="editor">
                                @php
                                    echo $post->body;
                                @endphp
                            </div>

                            @section('quilljs')
                                let body = document.getElementById('bodyEditor');
                                QUILL.on('text-change', function(delta, oldDelta, source) {
                                if (source == 'user') {
                                body.value = QUILL.root.innerHTML;
                                }
                                });
                            @endsection
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class='bg-green-500'>
                                {{ __('Salvar') }}
                            </x-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
