<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear email') }}
        </h2>
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('mail.store') }}">
                        @csrf

                        <div>
                            <x-label for="subject" :value="__('Subject')" />
                            <x-input id="subject" class="block mt-1 w-full" type="text" name="subject" :value="old('subject')" required autofocus/>
                        </div>

                        <div class="mt-4">
                            <x-label for="to" :value="__('To')" />
                            <x-input id="to" class="block mt-1 w-full" type="email" name="to" :value="old('to')" required/>
                        </div>

                        <div>
                            <x-label for="message" :value="__('message')" />
                            <x-textarea id="message" class="block mt-1 w-full" name="message" :value="old('message')" required/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
