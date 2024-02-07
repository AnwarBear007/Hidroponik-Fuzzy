<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Hidroponik') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-splade-form action="{{ route('data.update', [$datas, 'hidroponik_id' => $hidroponik_id, 'ppm_id' => $ppm_id]) }}" class="space-y-4" :default="$datas" method="put">
                        {{-- <x-splade-input id="hidroponik_id" name="hidroponik_id" hidden/> --}}
                        <x-splade-input id="tanggal" type="date" name="tanggal" label='Tanggal Penginputnan Data'/>
                        <x-splade-input id="jumlah" name="jumlah" label="Jumlah Tanaman Dalam 1 Perairan" required />
                        <x-splade-input id="volume" name="volume" label="Jumlah Volume Air Dalam 1 Perairan" required />
                        <x-splade-input id="larutan" name="larutan" label="Jumlah Larutan AB Mix Dalam 1 Perairan" required />
                        <x-splade-submit class="ml-4" label="Submit" />
                    </x-splade-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
