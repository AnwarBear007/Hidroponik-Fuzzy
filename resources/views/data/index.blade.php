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
                    {{-- <Link href="{{ route('data.create', ['hidroponik_id' => $hidroponik_id, 'ppm_id' => $ppm_id]) }}" class="px-4 py-2 bg-green-500 rounded text-white hover:bg-green-300 hover:text-black font-semibold">Tambah Data</Link> --}}
                    <x-splade-table class="mt-4" :for="$datas" pagination-scroll="preserve">
                        <x-splade-cell actions as="$datas">
                            {{-- <!-- <Link href="{{ route('data.edit', [$datas, 'hidroponik_id' => $datas->hidroponik->id, 'ppm_id' => $datas->hidroponik->ppm->id]) }}" class="px-3 py-2 bg-yellow-500 rounded text-white hover:bg-yellow-300 hover:text-black font-semibold"> Ubah </Link> --> --}}
                            {{-- <Link href="{{ route('fuzzy.show', [$datas, 'hidroponik_id' => $datas->hidroponik->id, 'ppm_id' => $datas->hidroponik->ppm->id]) }}" class="mx-2 px-3 py-2 bg-blue-500 rounded text-white hover:bg-blue-300 hover:text-black font-semibold"> Show Fuzzy </Link> --}}
                            <x-splade-form 
                                action="{{ route('data.destroy', $datas) }}"
                                method="delete"
                                confirm="Hapus Data Data"
                                confirm-text="Apa Kamu Yakin Untuk Menghapus Data?"
                                confirm-button="Ya"
                                cancel-button="Tidak">
                                    <x-splade-button class="bg-red-500 rounded text-white hover:bg-red-300 hover:text-black"> Hapus </x-splade-button>
                            </x-splade-form>
                        </x-splade-cell>
                    </x-splade-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
