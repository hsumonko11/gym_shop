@extends('admins.layouts.main')

@section('dashboard-active','active')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h2 class="fw-bold mb-3">Total Net Amount</h2>
                <h6 class="op-7 mb-2"></h6>
            </div>

        </div>
        <div class="row mb-4" style="border-bottom: 1px dashed #333;">
            @php
                $grandTotal = 0;
                $totalExpense = 0;
                $totalProfit = 0;
                foreach($incomes as $income){
                    $grandTotal += (int)$income->total_amount;
                }

                foreach($supplier_products as $supplier_product){
                    $totalExpense += (int)$supplier_product->quantity * (int)$supplier_product->original_price;
                }

                $totalProfit = $grandTotal - $totalExpense;
            @endphp
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round card-dashboard h-75 py-5 px-2" style="background-color: #d4f7d4;">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div
                                    class="icon-big text-center icon-success bubble-shadow-small"
                                >
                                    <i class="fas fa-coins"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">

                                <div class="numbers">
                                    <p class="card-category">Total Income is</p>
                                    <h4 class="card-title">{{number_format($grandTotal)}} MMK</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round card-dashboard h-75 py-5 px-2" style="background-color: #f8eae9;">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div
                                    class="icon-big text-center icon-danger bubble-shadow-small"
                                >
                                    <i class="fas fa-coins"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">

                                <div class="numbers">
                                    <p class="card-category">Total Expense is</p>
                                    <h4 class="card-title">{{number_format($totalExpense)}} MMK</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round card-dashboard h-75 py-5 px-2" style="background-color: #ebe0f8;">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div
                                    class="icon-big text-center icon-secondary bubble-shadow-small"
                                >
                                    <i class="fas fa-coins"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">

                                <div class="numbers">
                                    <p class="card-category">Total Profit is</p>
                                    <h4 class="card-title">{{number_format($totalProfit)}} MMK</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <h2 class="fw-bold mb-3">Menu</h2>

            <div class="col-sm-6 col-md-4 mt-2">
                <a href="{{route('admin.products.index')}}">
                    <div class="card card-stats card-round card-dashboard card-shadow h-100">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-icon">
                                    <div
                                        class="icon-big text-center icon-primary bubble-shadow-small"
                                    >
                                        <i class="fas fa-layer-group"></i>
                                    </div>
                                </div>
                                <div class="col text-center">

                                    <div class="numbers">
                                        <p class="card-category">Products</p>
                                        <h4 class="card-title">{{count($products)}}</h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-4 mt-2">
                <a href="{{route('admin.categories.index')}}">
                    <div class="card card-stats card-round card-shadow h-100">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-icon">
                            <div
                                class="icon-big text-center icon-warning bubble-shadow-small"
                            >
                            <i class="fas fa-box"></i>
                            </div>
                            </div>
                            <div class="col text-center">
                            <div class="numbers">
                                <p class="card-category">Categories</p>
                                <h4 class="card-title">{{count($categories)}}</h4>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-4 mt-2">
                <a href="{{route('admin.suppliers.index')}}">
                    <div class="card card-stats card-round card-shadow h-100">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-icon">
                                <div
                                    class="icon-big text-center icon-success bubble-shadow-small"
                                >
                                    <i class="fas fa-user"></i>
                                </div>
                                </div>
                                <div class="col text-center">
                                <div class="numbers">
                                    <p class="card-category">Suppliers</p>
                                    <h4 class="card-title">{{count($suppliers)}}</h4>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            {{-- <div class="col-sm-6 col-md-4">
                <a href="{{route('admin.supplier_products.index')}}">
                    <div class="card card-stats card-round card-shadow">
                        <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                            <div
                                class="icon-big text-center icon-secondary bubble-shadow-small"
                            >
                            <i class="fas fa-boxes"></i>
                            </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Supplier Product</p>
                                <h4 class="card-title">{{count($supplier_products)}}</h4>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </a>
            </div> --}}

        </div>

        <div class="row py-5" style="border-bottom: 1px dashed #333;">

            <div class="col-sm-6 col-md-4 offset-md-2 mt-2">
                <a href="{{route('admin.orders.index')}}">
                    <div class="card card-stats card-round card-shadow h-100">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-icon">
                                        <div
                                        class="icon-big text-center icon-info bubble-shadow-small"
                                        >
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                </div>
                                <div class="col text-center">
                                    <div class="numbers">
                                        <p class="card-category">Orders</p>
                                        <h4 class="card-title">{{count($orders)}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-6 col-md-4 mt-2">
                <a href="{{route('admin.customers.index')}}">
                    <div class="card card-stats card-round card-shadow h-100">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-icon">
                                        <div
                                        class="icon-big text-center icon-secondary bubble-shadow-small"
                                        >
                                            <i class="fas fa-user"></i>
                                        </div>
                                </div>
                                <div class="col text-center">
                                    <div class="numbers">
                                        <p class="card-category">Customers</p>
                                        <h4 class="card-title">{{count($customers)}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
        </div>


    </div>

    <div class="row">
        <div class="col-sm-6">
            <canvas id="myChart" height="100px" class="mt-5"></canvas>
        </div>
        <div class="col-sm-6">
            <canvas id="barChart" height="100px" class="mt-5"></canvas>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script type="text/javascript">

        var labels =  {{ Js::from($labels) }};
        var users =  {{ Js::from($data) }};

        const data = {
        labels: labels,
            datasets: [{
                label: 'Total Income Bar Chart',
                backgroundColor: '#0037ff',
                borderColor: '#0037ff',
                data: users,
            }]
        };

        const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        const myChart = new Chart(
        document.getElementById('myChart'),
        config
        );

        // ***********************

        const dataBar = {
        labels: labels,
            datasets: [{
                label: 'Total Income Chart',
                backgroundColor: '#d30000',
                borderColor: '#d30000',
                data: users,
            }]
        };

        const configBar = {
        type: 'line',
        data: dataBar,
        options: {
            scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        const barChart = new Chart(
        document.getElementById('barChart'),
        configBar
        );



    </script>

@endsection
