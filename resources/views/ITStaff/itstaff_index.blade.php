@extends('ITStaff.itstaff_dashboard')
@section('itstaff')
    <div class="main-content">
        <div class="main-title">
            <p class="font-weight-bold">DASHBOARD</p>
        </div>

        <div class="main-cards">
            <div class="card">
                <div class="card-inner">
                    <p class="text-primary font-weight-bold">Project Coordinators</p>
                    <span class="material-icons-outlined">engineering</span>
                </div>
                <span class="font-weight-bold">5</span>
            </div>

            <div class="card">
                <div class="card-inner">
                    <p class="text-primary font-weight-bold">Beneficiaries</p>
                    <span class="material-icons-outlined">groups</span>
                </div>
                <span class="font-weight-bold">5</span>
            </div>

            <div class="card">
                <div class="card-inner">
                    <p class="text-primary font-weight-bold">Projects Proposed</p>
                    <span class="material-icons-outlined">auto_stories</span>
                </div>
                <span class="font-weight-bold">57</span>
            </div>

            <div class="card">
                <div class="card-inner">
                    <p class="text-primary font-weight-bold">Financial Assistance Released This Month</p>
                    <span class="material-icons-outlined">paid</span>
                </div>
                <span class="font-weight-bold">57</span>
            </div>
        </div>

        <div class="charts">
            <div class="charts-card">
                <p class="chart-title">Monthly Budget Allocation for Beneficiaries</p>
                <div id="bar-chart"></div>
            </div>

            <div class="charts-card">
                <p class="chart-title">Annual Active Beneficiaries</p>
                <div id="area-chart"></div>
            </div>
            <div class="charts-card">
                <p class="chart-title">Monthly Budget Allocation for Beneficiaries</p>
                <div id="bar-chart"></div>
            </div>

            <div class="charts-card">
                <p class="chart-title">Annual Active Beneficiaries</p>
                <div id="area-chart"></div>
            </div>
        </div>
    </div>
@endsection
