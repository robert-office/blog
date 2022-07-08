@props(['wrapperName', 'buttonId'])

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative inline-block text-left mt-1 w-full h-11">
    <button type="button"
        class="flex flex-row h-full justify-center align-middle w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500"
        id="button-{{ $buttonId }}" aria-expanded="true" aria-haspopup="true">
        <p>Abrir Opções</p>
        <!-- Heroicon name: solid/chevron-down -->
        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
            aria-hidden="true">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </button>

    <div class="hidden z-50 origin-top-left absolute mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none wrapper-multiselect-{{ $wrapperName }}"
        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
        <div class="py-1 px-2" role="none">
            {{ $slot }}
        </div>
    </div>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", () => {
            const wrapper = document.getElementsByClassName("wrapper-multiselect-{{ $wrapperName }}")[0];
            const button = document.getElementById("button-{{ $buttonId }}");
            button.addEventListener("click", () => wrapper.classList.contains('hidden') ? wrapper.classList.remove('hidden') : wrapper.classList.add('hidden'));
        });
    </script>
</div>
