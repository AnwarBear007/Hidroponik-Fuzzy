<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="grid gap-4 grid-auto-fit-xl">
                        <div class="p-2 mb-4 bg-blue-100 rounded-md">
                          <a href="https://hidroponikpedia.com/tabel-ppm-dan-ph-nutrisi-hidroponik/" target="_blank" rel="noopener noreferrer">
                            <div id="carouselExampleAutoplaying" class="carousel-dark slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                  <div class="carousel-item active">
                                    <img src="img/sayur_daun.png" class="d-block min-h-[350px] h-[350px] max-h-[350px] w-[1200px]" alt="...">
                                  </div>
                                  <div class="carousel-item">
                                    <img src="img/sayuran_buah.png" class="d-block min-h-[350px] h-[350px] max-h-[350px] w-[1200px]" alt="...">
                                  </div>
                                  <div class="carousel-item">
                                    <img src="img/tanaman_buah.png" class="d-block min-h-[350px] h-[350px] max-h-[350px] w-[1200px]" alt="...">
                                  </div>
                                  <div class="carousel-item">
                                    <img src="img/tanaman_bunga.png" class="d-block min-h-[350px] h-[350px] max-h-[350px] w-[1200px]" alt="...">
                                  </div>
                                  <div class="carousel-item">
                                    <img src="img/tanaman_herbal.png" class="d-block min-h-[350px] h-[350px] max-h-[350px] w-[1200px]" alt="...">
                                  </div>
                                  <div class="carousel-item">
                                    <img src="img/tanaman_umbi.png" class="d-block min-h-[350px] h-[350px] max-h-[350px] w-[1200px]" alt="...">
                                  </div>
                                  {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                  </button>
                                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                  </button>                                 --}}
                                </div>
                            </div>
                          </a>
                        </div>
                        <div class="p-2 mb-4 bg-blue-100 rounded-md">
                          <div id="highchart" class="min-h-[350px] h-[350px] max-h-[350px] max-w-[100%]"></div>
                          {{-- <div class="card card-success">
                            <div class="card-header">
                              <h3 class="card-title font-semibold text-center">Data Hidroponik</h3>
                              <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                  <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                  <i class="fas fa-times"></i>
                                </button>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="chart">
                                <canvas id="barChart" class="min-h-[250px] h-[250px] max-h-[250px] max-w-[100%]"></canvas>
                              </div>
                            </div>
                          </div> --}}
                        </div>
                    </section>
                    {{-- <section class="grid gap-4 grid-auto-fit-xl">
                        <div class="p-4 bg-blue-100 rounded-md">
                           item 3
                        </div>
                        <div class="p-4 bg-blue-100 rounded-md">
                           Item 4
                        </div>
                        <div class="p-4 bg-blue-100 rounded-md">
                           Item 5
                        </div>
                        <div class="p-4 bg-blue-100 rounded-md">
                           Item 6
                        </div>
                        <div class="p-4 bg-blue-100 rounded-md">
                           Item 7
                        </div>
                     </section> --}}
                </div>
            </div>
        </div>
    </div>
    
    
    <script>
      $(function () {
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = {
          labels  : ['PPM'],
          datasets: [
              {
                label               : [{!! json_encode($hidroponiks) !!}],
                backgroundColor     : 'rgba(60,141,188,0.9)',
                pointRadius         : false,
                // pointColor          : '#3b8bba',
                // pointStrokeColor    : 'rgba(60,141,188,1)',
                // pointHighlightFill  : '#fff',
                // pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : [28, 48, 40, 19, 86, 27, 90]
              },
          ]
        }
        // var barChartData = $.extend(true, {}, areaChartData)
        // var temp0 = areaChartData.datasets[0]
        // var temp1 = areaChartData.datasets[1]
        // barChartData.datasets[0] = temp1
        // barChartData.datasets[1] = temp0

        var barChartOptions = {
          responsive              : true,
          maintainAspectRatio     : false,
          datasetFill             : false
        }

        new Chart(barChartCanvas, {
          type: 'bar',
          data: barChartData,
          options: barChartOptions
        })
      });

    document.addEventListener('DOMContentLoaded', function () {
      Highcharts.chart('highchart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Laporan Data Terakhir',
            align: 'center'
        },
        xAxis: {
            categories: {!! json_encode($hidroponiks) !!},
            crosshair: true,
            accessibility: {
                description: 'Code'
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: ''
            }
        },
        // tooltip: {
        //     valueSuffix: ' (1000 MT)'
        // },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
            {
                name: 'Jumlah Tanaman',
                data: {!! json_encode($jumlahs) !!},
            },
            {
                name: 'PPM',
                data: {!! json_encode($ppms) !!},
            }
        ]
      });
    });
    
    </script>
</x-app-layout>