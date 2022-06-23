@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="total-revenue-chart"></div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$candidats}}</span></h4>
                    <p class="text-muted mb-0">Total Candidat</p>
                </div>

            </div>
        </div>
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="total-revenue-chart"></div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$admins}}</span></h4>
                    <p class="text-muted mb-0">Total Admin</p>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="total-revenue-chart"></div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$questions}}</span></h4>
                    <p class="text-muted mb-0">Total Questions</p>
                </div>

            </div>
        </div>
    </div>
</div> <!-- end row-->
@endsection
