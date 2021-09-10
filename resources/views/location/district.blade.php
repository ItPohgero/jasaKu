<label class="block text-sm mt-4">
    <span class="text-gray-700 dark:text-gray-400">District / Kecamatan</span>
    <select name="district_id" class="block w-full dark:bg-gray-700 border-gray-300
focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-sm">

        @foreach($district as $item)

        <option value="{{$item->id}}">{{$item->name}}</option>

        @endforeach

    </select>
</label>
@if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
<div class="mt-3">
    <x-jet-label for="terms">
        <div class="flex items-center">
            <x-jet-checkbox name="terms" id="terms" required />

            <div class="ml-2 text-xs">
                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                    class="underline text-xs font-bold text-gray-600 hover:text-gray-900">'.__('Terms
                    of Service').'</a>',
                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                    class="underline text-xs font-bold text-gray-600 hover:text-gray-900">'.__('Privacy
                    Policy').'</a>',
                ]) !!}
            </div>
        </div>
    </x-jet-label>
</div>
@endif
<!-- modal div -->
<div class="mt-6">
    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <x-jet-button class="ml-4">
            {{ __('Register') }}
        </x-jet-button>
    </div>
</div>