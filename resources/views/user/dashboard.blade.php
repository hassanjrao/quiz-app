@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Dashboard
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        Welcome User, everything looks great.
                    </h2>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">App</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Dashboard
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="row row-deck">
            <div class="col-xl-6">
                <!-- Lines Chart -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Lines</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-center">
                        <div class="py-3">
                            <!-- Lines Chart Container -->
                            <canvas id="js-chartjs-lines"></canvas>
                        </div>
                    </div>
                </div>
                <!-- END Lines Chart -->
            </div>

            <div class="col-xl-6">
                <!-- Radar Chart -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Radar</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-center">
                        <div class="py-3 px-xxl-7">
                            <!-- Radar Chart Container -->
                            <canvas id="js-chartjs-radar"></canvas>
                        </div>
                    </div>
                </div>
                <!-- END Radar Chart -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
@section('js_after')
<script src="{{asset('js/lib/jquery.min.js')}}"></script>

<!-- Page JS Plugins -->
<script src="{{asset('js/plugins/easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
<script src="{{asset('js/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('js/plugins/chart.js/Chart.min.js')}}"></script>

<!-- Page JS Code -->
<script src="{{asset('js/pages/be_comp_charts.min.js')}}"></script>

<!-- Page JS Helpers (Easy Pie Chart + jQuery Sparkline Plugins) -->
<script>One.helpersOnLoad(['jq-easy-pie-chart', 'jq-sparkline']);</script>
@endsection()
