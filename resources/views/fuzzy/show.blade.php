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
                    <p class="font-semibold">-----Deklarasi Fuzzy-----</p>
                    <p>Max Jumlah Tanaman       :{{ $maxJ }}</p>
                    <p>Min Jumlah Tanaman       :{{ $minJ }}</p>
                    <p>Rata-rata Jumlah Tanaman :{{ $meanJ }}</p><br>
                    <p>Max Nilai PPM          :{{ $maxP }}</p>
                    <p>Min Nilai PPM          :{{ $minP }}</p>
                    <p>Rata-rata Nilai PPM    :{{ $meanP }}</p><br>
                    
                    <p class="font-semibold">-----Fuzzifikasi-----</p>
                    <p>Jumlah input             :{{ $lastJ }}</p>
                    <p>Fuzzy Jumlah Sedikit     :{{ $JTSedikit }}</p>
                    <p>Fuzzy Jumlah Sedang      :{{ $JTSedang }}</p>
                    <p>Fuzzy Jumlah Banyak      :{{ $JTBanyak }}</p><br>
                    <p>PPM input                :{{ $lastP }}</p>
                    <p>Fuzzy Nilai PPM Rendah   :{{ $NPRendah }}</p>
                    <p>Fuzzy Nilai PPM Sedang   :{{ $NPSedang }}</p>
                    <p>Fuzzy Nilai PPM Tinggi   :{{ $NPTinggi }}</p><br>

                    <p class="font-semibold">-----Inferensi Rule Base-----</p>
                    <p>Rule 1   :{{ $rule1 }}</p>
                    <p>Rule 2   :{{ $rule2 }}</p>
                    <p>Rule 3   :{{ $rule3 }}</p>
                    <p>Rule 4   :{{ $rule4 }}</p>
                    <p>Rule 5   :{{ $rule5 }}</p>
                    <p>Rule 6   :{{ $rule6 }}</p>
                    <p>Rule 7   :{{ $rule7 }}</p>
                    <p>Rule 8   :{{ $rule8 }}</p>
                    <p>Rule 9   :{{ $rule9 }}</p><br>

                    <p class="font-semibold">-----Defuzzifikasi-----</p>
                    <p>Nilai Output :{{ $output }}</p>
                    <p>Kondisi Tanaman :{{ $kondisi }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
