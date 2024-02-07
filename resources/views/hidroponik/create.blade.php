<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Hidroponik') }}
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-splade-form action="{{ route('hidroponik.store') }}" class="grid gap-4 grid-auto-fit-md">
                        {{-- <x-splade-input name="user_id" value="{{ Auth::id() }}" disabled /> --}}
                        <x-splade-input id="code" name="code" label="Code Penanda" required />
                        <x-splade-select name="ppm_id" label="Nama Hidroponik" required>
                            @foreach ($ppms as $ppm)
                                <option value="{{ $ppm->id }}">{{ $ppm->hidroponik }}</option>
                            @endforeach
                        </x-splade-select>
                        <x-splade-submit class="mt-[27px]" label="Tambahkan" />
                    </x-splade-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
