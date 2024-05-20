@extends('layouts.app')

@section('content')
    <div class="mb-5">
        <h1 class="text-2xl font-bold">Dashboard</h1>
    </div>
    <div class="grid grid-cols-3 gap-3">
        <a href="/admin/sales" class="w-full">
            <div class="stats shadow w-full">

                <div class="stat">
                    <div class="stat-title">Total Penjualan</div>
                    <div class="stat-value">{{ $data['total_penjualan'] }}</div>
                </div>

            </div>
        </a>
        <a href="/admin/customer" class="w-full">
            <div class="stats shadow w-full">

                <div class="stat">
                    <div class="stat-title">Total Customer</div>
                    <div class="stat-value">{{ $data['total_customer'] }}</div>
                </div>

            </div>
        </a>
        <a href="/admin/product" class="w-full">
            <div class="stats shadow w-full">

                <div class="stat">
                    <div class="stat-title">Total Product</div>
                    <div class="stat-value">{{ $data['total_product'] }}</div>
                </div>

            </div>
        </a>
    </div>
    <div class="grid grid-cols-2 gap-3 mt-4">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h1 class="text-xl font-bold">Sales</h1>
                <div id="sales-chart"></div>
            </div>
        </div>
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h1 class="text-xl font-bold">Customer</h1>
                <div id="customer-chart"></div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto mt-4">

        <!-- Funnel Sales Visualization -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Funnel Sales</h2>
            <div class="flex justify-between items-center">
                <div class="flex-1 text-center">
                    <div class="bg-blue-500 text-white py-2 rounded-t-lg">Prospects</div>
                    <div class="bg-blue-400 text-white py-2">Qualified Leads</div>
                    <div class="bg-blue-300 text-white py-2">Proposals</div>
                    <div class="bg-blue-200 text-white py-2">Negotiations</div>
                    <div class="bg-blue-100 text-white py-2 rounded-b-lg">Closed Deals</div>
                </div>
                <div class="flex-1 text-center">
                    <div class="py-2">1000</div>
                    <div class="py-2">800</div>
                    <div class="py-2">600</div>
                    <div class="py-2">300</div>
                    <div class="py-2">100</div>
                </div>
            </div>
        </div>

        <!-- Customer Lifetime Value Visualization -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Customer Lifetime Value</h2>
            <div class="flex justify-between items-center">
                <div class="text-center">
                    <div class="bg-green-500 text-white py-2 px-4 rounded-lg">John Doe</div>
                    <div class="mt-2">Total Spend: Rp.12,000</div>
                    <div class="mt-2">Avg. Monthly Spend: Rp.200</div>
                    <div class="mt-2 text-green-600">Estimated CLV: Rp.18,000</div>
                </div>
            </div>
        </div>

        <!-- Customer Segmentation Visualization -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Customer Segmentation</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white border border-gray-200 rounded-lg shadow-md p-4">
                    <h3 class="text-xl font-semibold mb-2">High Value</h3>
                    <p>Total Purchases: 45</p>
                    <p>Total Spend: Rp.12,000</p>
                    <p>Avg. Spend per Purchase: Rp.267</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg shadow-md p-4">
                    <h3 class="text-xl font-semibold mb-2">Medium Value</h3>
                    <p>Total Purchases: 30</p>
                    <p>Total Spend: Rp.5,000</p>
                    <p>Avg. Spend per Purchase: Rp.167</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg shadow-md p-4">
                    <h3 class="text-xl font-semibold mb-2">Low Value</h3>
                    <p>Total Purchases: 15</p>
                    <p>Total Spend: Rp.1,500</p>
                    <p>Avg. Spend per Purchase: Rp.100</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var options = {
            series: [{
                name: 'Sales',
                data: {{$data['grafik_penjualan']->pluck('total')}}
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                categories: {{ str_replace('"',"",$data['grafik_penjualan']->pluck('dates'))}}
            }
        };

        var chart = new ApexCharts(document.querySelector("#sales-chart"), options);
        chart.render();

        var options = {
            series: [{
                name: 'Customer',
                data: {{$data['grafik_customer']->pluck('total')}}
            }],
            chart: {
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    dataLabels: {
                        position: 'top', // top, center, bottom
                    },
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                    return val ;
                },
                offsetY: -20,
                style: {
                    fontSize: '12px',
                    colors: ["#304758"]
                }
            },

            xaxis: {
                categories: {{ str_replace('"',"",$data['grafik_customer']->pluck('dates'))}},
                position: 'top',
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                crosshairs: {
                    fill: {
                        type: 'gradient',
                        gradient: {
                            colorFrom: '#D8E3F0',
                            colorTo: '#BED1E6',
                            stops: [0, 100],
                            opacityFrom: 0.4,
                            opacityTo: 0.5,
                        }
                    }
                },
                tooltip: {
                    enabled: true,
                }
            },
            yaxis: {
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    show: false,
                    formatter: function(val) {
                        return val;
                    }
                }

            },
            title: {
                text: 'Total Customer',
                floating: true,
                offsetY: 330,
                align: 'center',
                style: {
                    color: '#444'
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#customer-chart"), options);
        chart.render();
    </script>
@endsection
