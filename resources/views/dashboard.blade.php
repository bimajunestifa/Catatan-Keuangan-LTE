@extends('layouts.adminlte')

@section('title','Dashboard')

@section('content')

<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        
        <!-- Info Boxes -->
        <div class="row">
            <!-- TOTAL TRANSAKSI (BLUE) -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1">
                        <i class="fas fa-receipt"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Transaksi</span>
                        <span class="info-box-number">{{ number_format($totalTransaksi ?? 0, 0, ',', '.') }}</span>
                        <div class="progress">
                            <div class="progress-bar bg-info" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                            <a href="{{ route('transaksi.index') }}" class="text-info">More info →</a>
                        </span>
                    </div>
                </div>
            </div>

            <!-- TOTAL KATEGORI (GREEN) -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1">
                        <i class="fas fa-layer-group"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Kategori</span>
                        <span class="info-box-number">{{ number_format($totalKategori ?? 0, 0, ',', '.') }}</span>
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                            <a href="{{ route('kategori.index') }}" class="text-success">More info →</a>
                        </span>
                    </div>
                </div>
            </div>

            <!-- PEMASUKAN (YELLOW) -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1">
                        <i class="fas fa-arrow-up"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Pemasukan</span>
                        <span class="info-box-number">
                            Rp{{ number_format($pemasukan ?? 0, 0, ',', '.') }}
                        </span>
                        <div class="progress">
                            <div class="progress-bar bg-warning" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                            <a href="{{ route('transaksi.index') }}?filter=pemasukan" class="text-warning">More info →</a>
                        </span>
                    </div>
                </div>
            </div>

            <!-- PENGELUARAN (RED) -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1">
                        <i class="fas fa-arrow-down"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Pengeluaran</span>
                        <span class="info-box-number">
                            Rp{{ number_format($pengeluaran ?? 0, 0, ',', '.') }}
                        </span>
                        <div class="progress">
                            <div class="progress-bar bg-danger" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                            <a href="{{ route('transaksi.index') }}?filter=pengeluaran" class="text-danger">More info →</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tables Row -->
        <div class="row">
            <!-- Transaksi Terbaru -->
            <div class="col-12 col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-receipt mr-1"></i>
                            Transaksi Terbaru
                        </h3>
                        <div class="card-tools">
                            <a href="{{ route('transaksi.index') }}" class="btn btn-tool">
                                Selengkapnya →
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Kategori</th>
                                    <th>Jenis</th>
                                    <th class="text-right">Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($transaksiTerbaru ?? [] as $t)
                                <tr>
                                    <td>{{ date('d/m/Y', strtotime($t->tgl_transaksi)) }}</td>
                                    <td>{{ $t->keterangan }}</td>
                                    <td>{{ $t->kategori->nama_kategori ?? '-' }}</td>
                                    <td>
                                        @if($t->jenis_transaksi == 'pemasukan')
                                            <span class="badge badge-success">Pemasukan</span>
                                        @else
                                            <span class="badge badge-danger">Pengeluaran</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <strong>Rp{{ number_format($t->nominal, 0, ',', '.') }}</strong>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada transaksi.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Kategori Populer -->
            <div class="col-12 col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-layer-group mr-1"></i>
                            Kategori
                        </h3>
                        <div class="card-tools">
                            <a href="{{ route('kategori.index') }}" class="btn btn-tool">
                                Selengkapnya →
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Nama Kategori</th>
                                    <th class="text-center">Jumlah Transaksi</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($kategoriPopuler ?? [] as $k)
                                <tr>
                                    <td><strong>{{ $k->nama_kategori }}</strong></td>
                                    <td class="text-center">
                                        <span class="badge badge-info">{{ $k->transaksi_count ?? 0 }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-success">Aktif</span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">Tidak ada kategori.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Row -->
        <div class="row">
            <!-- Bar Chart - Pemasukan vs Pengeluaran -->
            <div class="col-12 col-lg-8">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-bar mr-1"></i>
                            Grafik Pemasukan vs Pengeluaran (6 Bulan Terakhir)
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(isset($months) && count($months) > 0)
                            <div class="chart-container" 
                                 style="position: relative; height: 400px;"
                                 data-months='@json($months)'
                                 data-income='@json($incomeData)'
                                 data-expense='@json($expenseData)'>
                                <canvas id="barChart"></canvas>
                            </div>
                        @else
                            <div class="alert alert-info text-center py-5">
                                <i class="fas fa-chart-bar fa-3x mb-3 d-block"></i>
                                <p class="mb-0">Belum ada data transaksi untuk ditampilkan pada grafik.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Pie Chart - Pengeluaran per Kategori -->
            <div class="col-12 col-lg-4">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Grafik Pengeluaran per Kategori
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(isset($chart) && $chart->isNotEmpty())
                            <div class="chart-container" 
                                 style="position: relative; height: 400px; min-height: 300px;"
                                 data-labels='@json($chart->pluck('nama_kategori'))'
                                 data-values='@json($chart->pluck('total'))'>
                                <canvas id="pieChart"></canvas>
                            </div>
                        @else
                            <div class="alert alert-info text-center py-5">
                                <i class="fas fa-chart-pie fa-3x mb-3 d-block"></i>
                                <p class="mb-0">Belum ada data pengeluaran untuk ditampilkan pada grafik.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function () {
    
    // Bar Chart - Pemasukan vs Pengeluaran
    var barCtx = document.getElementById('barChart');
    if (barCtx) {
        var barContainer = barCtx.closest('.chart-container');
        if (barContainer) {
            var monthsAttr = barContainer.getAttribute('data-months') || '[]';
            var incomeAttr = barContainer.getAttribute('data-income') || '[]';
            var expenseAttr = barContainer.getAttribute('data-expense') || '[]';
            
            try {
                var months = JSON.parse(monthsAttr);
                var incomeData = JSON.parse(incomeAttr);
                var expenseData = JSON.parse(expenseAttr);

                // Destroy existing chart instance if any
                if (window._barChartInstance) {
                    window._barChartInstance.destroy();
                }

                // Ensure data is array of numbers
                var incomeNumbers = incomeData.map(function(val) {
                    return parseFloat(val) || 0;
                });
                var expenseNumbers = expenseData.map(function(val) {
                    return parseFloat(val) || 0;
                });

                window._barChartInstance = new Chart(barCtx, {
                    type: 'bar',
                    data: {
                        labels: months,
                        datasets: [
                            {
                                label: 'Pemasukan',
                                data: incomeNumbers,
                                backgroundColor: 'rgba(40, 167, 69, 0.8)',
                                borderColor: 'rgba(40, 167, 69, 1)',
                                borderWidth: 2,
                                barThickness: 'flex',
                                maxBarThickness: 50
                            },
                            {
                                label: 'Pengeluaran',
                                data: expenseNumbers,
                                backgroundColor: 'rgba(220, 53, 69, 0.8)',
                                borderColor: 'rgba(220, 53, 69, 1)',
                                borderWidth: 2,
                                barThickness: 'flex',
                                maxBarThickness: 50
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: {
                            mode: 'index',
                            intersect: false
                        },
                        plugins: {
                            legend: {
                                position: 'top',
                                labels: {
                                    padding: 15,
                                    font: {
                                        size: 12
                                    },
                                    usePointStyle: true
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        var label = context.dataset.label || '';
                                        var value = context.parsed.y || 0;
                                        return label + ': Rp' + new Intl.NumberFormat('id-ID').format(value);
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                stacked: false,
                                grid: {
                                    display: false
                                }
                            },
                            y: {
                                beginAtZero: true,
                                stacked: false,
                                ticks: {
                                    callback: function(value) {
                                        return 'Rp' + new Intl.NumberFormat('id-ID').format(value);
                                    }
                                },
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.1)'
                                }
                            }
                        }
                    }
                });
            } catch (e) {
                console.error('Error creating bar chart:', e);
            }
        }
    }

    // Pie Chart - Pengeluaran per Kategori
    var pieCtx = document.getElementById('pieChart');
    if (pieCtx) {
        var pieContainer = pieCtx.closest('.chart-container');
        if (pieContainer) {
            var labelsAttr = pieContainer.getAttribute('data-labels') || '[]';
            var valuesAttr = pieContainer.getAttribute('data-values') || '[]';
            
            try {
                var labels = JSON.parse(labelsAttr);
                var values = JSON.parse(valuesAttr);

                if (labels.length > 0 && values.length > 0) {
                    // AdminLTE compatible color palette
                    var palette = [
                        '#007bff', '#28a745', '#dc3545', '#ffc107', '#17a2b8',
                        '#6f42c1', '#e83e8c', '#fd7e14', '#20c997', '#6610f2'
                    ];

                    var backgroundColors = [];
                    for (var i = 0; i < labels.length; i++) {
                        backgroundColors.push(palette[i % palette.length]);
                    }
                    
                    // Destroy existing chart instance if any
                    if (window._pieChartInstance) {
                        window._pieChartInstance.destroy();
                    }

                    window._pieChartInstance = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Pengeluaran',
                    data: values,
                    backgroundColor: backgroundColors,
                    borderWidth: 2,
                    borderColor: '#fff',
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { 
                            padding: 15,
                            font: {
                                size: 11
                            },
                            usePointStyle: true
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.label || '';
                                var value = context.parsed || 0;
                                var total = context.dataset.data.reduce(function(a, b) { return a + b; }, 0);
                                var percentage = ((value / total) * 100).toFixed(1);
                                return label + ': Rp' + new Intl.NumberFormat('id-ID').format(value) + ' (' + percentage + '%)';
                            }
                        }
                    }
                }
            }
                    });
                }
            } catch (e) {
                console.error('Error creating pie chart:', e);
            }
        }
    }
});
</script>

@endsection
