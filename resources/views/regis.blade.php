<div id="nexttab">
    <input type="text" value="123">
    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <x-jet-button class="ml-4">
            {{ __('Register') }}
        </x-jet-button>
    </div>
</div>