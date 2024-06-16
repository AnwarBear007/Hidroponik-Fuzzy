<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data PPM') }}
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-splade-form action="{{ route('ppm.store') }}" class="grid gap-4 grid-auto-fit-md">
                        <x-splade-input id="hidroponik" name="hidroponik" label="Nama Tanaman Hidroponik" required />
                        <x-splade-input id="min" name="min" label="Nilai Min PPM Tanaman Hidroponik" required />
                        <x-splade-input id="max" name="max" label="Nilai Max PPM Tanaman Hidroponik" required />
                        <x-splade-submit class="mt-[27px]" label="Tambahkan" />
                    </x-splade-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
