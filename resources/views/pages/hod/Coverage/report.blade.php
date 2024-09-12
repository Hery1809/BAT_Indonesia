@extends('layouts.master-hod')
@section('title', 'Coverage')
@section('Coverage', 'active-sub')
@section('content')

    <div class="row">
        <div class="col-xs-12">

            <!--Default Tabs (Left Aligned)-->
            <!--===================================================-->
            <div class="tab-base">

                <!--Nav Tabs-->
                <ul class="nav nav-tabs">
                    <li>
                        <a href="{{ route('hod.coverage.index') }}">Activity</a>
                    </li>
                    <li class="active">
                        <a href="{{ route('hod.coverage.report') }}">Report</a>
                    </li>
                </ul>

                <!--Tabs Content-->
                <div class="tab-content">

                    <div id="demo-lft-tab-1" class="tab-pane fade  active in">

                        <h4 class="text-main text-bold mar-no">Coverage</h4>
                        <p>&nbsp;</p>

                        <form class="form-inline" method="GET" action="">
                            <div class="form-group">
                                <select name="month" class="form-control" required="">
                                    @foreach ($month as $value)
                                        <option value="{{ $value->month_int }}"
                                            @if ($value->month_int == $monthnow) selected @endif>{{ $value->month_var }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <select name="year" class="form-control" required="">
                                    <?= $yearnow = date('Y') ?>
                                    @for ($i = 2020; $i <= $yearnow; $i++)
                                        <option value="{{ $i }}"
                                            @if ($i == $yearnow) selected @endif>{{ $i }}</option>
                                    @endfor

                                </select>
                            </div>
                            <button class="btn btn-dark" type="submit"><i class="fa fa-filter"></i> FILTER</button>
                        </form>

                        <hr>

                        <div class="pad-btm form-inline">
                            <div class="row">
                                <div class="col-sm-6 table-toolbar-left">
                                    <form method="GET" action="{{ route('hod.coverage.report') }}" class="form-inline">
                                        <label for="perPage">Show:</label>
                                        <select id="perPage" name="perPage" class="form-control"
                                            onchange="this.form.submit()">

                                            <option value="10" {{ request('perPage', 5) == '10' ? 'selected' : '' }}>10
                                            </option>
                                            <option value="25" {{ request('perPage', 5) == '25' ? 'selected' : '' }}>25
                                            </option>
                                            <option value="50" {{ request('perPage', 5) == '50' ? 'selected' : '' }}>50
                                            </option>
                                            <option value="100" {{ request('perPage', 5) == '100' ? 'selected' : '' }}>
                                                100
                                            </option>
                                        </select>
                                        <input type="hidden" name="search" value="{{ $search }}">
                                        <input type="hidden" name="page" value="{{ request('page', 1) }}">
                                    </form>
                                </div>
                                <div class="col-sm-6 table-toolbar-right">
                                    <form method="GET" action="{{ route('hod.coverage.report') }}" class="form-inline">
                                        <input type="text" name="search" class="form-control mr-2"
                                            placeholder="Search..." value="{{ $search }}">
                                        <input type="hidden" name="page" value="1">
                                        <input type="hidden" name="perPage" value="{{ request('perPage', 5) }}">
                                        <button type="submit" class="btn btn-success">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table id="table-depo" class="table table-striped table-bordered" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Distributor</th>
                                        <th rowspan="2">Depo</th>
                                        <th colspan="3">Target</th>
                                        <th rowspan="2">Channel</th>
                                        <th colspan="3" style="background: aliceblue;">Actual</th>
                                        <th colspan="3" style="background: antiquewhite;">% Achievement</th>
                                        <th colspan="3" style="background: aquamarine;">% Weghted</th>
                                        <th rowspan="2">Score</th>
                                    </tr>
                                    <tr>
                                        <th>Retail</th>
                                        <th>WS</th>
                                        <th>Others</th>

                                        <th>Retail</th>
                                        <th>WS</th>
                                        <th>Others</th>

                                        <th>Retail</th>
                                        <th>WS</th>
                                        <th>Others</th>

                                        <th>Retail</th>
                                        <th>WS</th>
                                        <th>Others</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @forelse ($depos as $items)
                                        <tr>
                                            <td>{{ ($depos->currentPage() - 1) * $depos->perPage() + $loop->iteration }}
                                            </td>
                                            <td>{{ $items->distributor->distributor_name }}</td>
                                            <td>{{ $items->depo->depo_name }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Data Kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <!-- Tampilkan jumlah data yang ditampilkan -->
                            @if (!$depos->isEmpty())
                                <p class="d-inline-block">Showing {{ $depos->firstItem() }} to
                                    {{ $depos->lastItem() }} of
                                    {{ $depos->total() }} entries</p>
                            @endif
                            <hr class="new-section-xs">
                            <div class="pull-right">
                                <nav aria-label="Page navigation">
                                    {{ $depos->appends(['perPage' => request()->get('perPage'), 'search' => request()->get('search')])->links('pagination::bootstrap-4') }}
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--===================================================-->
            <!--End Default Tabs (Left Aligned)-->

        </div>
    </div>

@endsection
