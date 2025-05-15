@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-5 text-center fw-bold display-5">Bookstore Inventory - Lazaro</h1>

    <!-- Summary Cards -->
    <div class="row mb-5 g-4">
        <div class="col-lg-4 col-md-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body text-center p-5">
                    <div class="mb-3">
                        <i class="bi bi-book fs-1 text-primary"></i>
                    </div>
                    <h6 class="text-black">Total Books</h6>
                    <h2 class="fw-bold text-info">{{ $totalBooks }}</h2>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body text-center p-5">
                    <div class="mb-3">
                        <i class="bi bi-person-lines-fill fs-1 text-success"></i>
                    </div>
                    <h6 class="text-black">Total Authors</h6>
                    <h2 class="fw-bold text-warning">{{ $totalAuthors }}</h2>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-5">
                    <h6 class="text-black text-center mb-3">Books by Category</h6>
                    <ul class="list-group list-group-flush">
                        @foreach ($booksPerCategory as $category)
                            <li class="list-group-item d-flex justify-content-between">
                                <span>{{ $category->name }}</span>
                                <span class="fw-bold">{{ number_format($category->total) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>  
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-light text-center fw-bold fs-5 py-3">
                    Books by Category
                </div>
                <div class="card-body">
                    <canvas id="booksCategoryChart" height="200"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-light text-center fw-bold fs-5 py-3">
                    Stock Trend Over Time
                </div>
                <div class="card-body">
                    <canvas id="stockTrendChart" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"/>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Books per Category Chart (Bar)
new Chart(document.getElementById('booksCategoryChart'), {
    type: 'bar',
    data: {
        labels: {!! json_encode($booksPerCategory->pluck('name')) !!},
        datasets: [{
            label: 'Book Count',
            data: {!! json_encode($booksPerCategory->pluck('total')) !!},
            backgroundColor: '#e6b0aa',
            borderRadius: 6
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Stock Trend Chart (Line)
new Chart(document.getElementById('stockTrendChart'), {
    type: 'line',
    data: {
        labels: {!! json_encode($stockTrend->pluck('date')) !!},
        datasets: [{
            label: 'Total Stock',
            data: {!! json_encode($stockTrend->pluck('total_stock')) !!},
            backgroundColor: 'rgba(4, 16, 26, 0.2)',
            borderColor: '#154360',
            pointBackgroundColor: '#f1948a',
            fill: true,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' }
        },
        scales: {
            x: {
                ticks: {
                    autoSkip: true,
                    maxRotation: 45,
                    minRotation: 45
                }
            },
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@endsection
