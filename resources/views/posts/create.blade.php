<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Novo Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-visible shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus />
                        </div>

                        <div class="my-5">
                            <x-label for="categorias" :value="__('Categorias')" />

                            <x-dropdown.wrapper wrapperName="categorias" buttonId="id_categoriasM">
                                @foreach ($categories as $category)
                                    <x-dropdown.checkbox name="categorias[]" value="$category->id">
                                        {{ $category->name }}
                                    </x-dropdown.checkbox>
                                @endforeach
                            </x-dropdown.wrapper>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button.create>
                                {{ __('Criar') }}
                            </x-button.create>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
