@extends('layouts.master-ho')
@section('title', 'Distributor P4C Tracking')
@section('weeklymeeting', 'active-sub')
@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="tab-base">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="{{ route('ho.meeting-weekly.index') }}">Activity</a>
                </li>
                <li>
                    <a href="{{ route('ho.meeting-weekly.index') }}">Report</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="demo-lft-tab-1" class="tab-pane fade active in">
                    <h4 class="text-main text-bold mar-no">Reguler Meeting</h4>
                    <p>&nbsp;</p>

                    <form class="form-inline" method="GET" action="{{ route('ho.meeting-weekly.index') }}">
                        <div class="form-group">
                            <select name="month" class="form-control">
                                @foreach ($month as $value)
                                <option value="{{ $value->month_int }}"
                                    @if ($value->month_int == $selectedMonth) selected @endif>
                                    {{ $value->month_var }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="year" class="form-control">
                                @for ($i = 2020; $i <= $yearnow; $i++)
                                    <option value="{{ $i }}"
                                    @if ($i==$selectedYear) selected @endif>
                                    {{ $i }}
                                    </option>
                                    @endfor
                            </select>
                        </div>
                        <input type="hidden" name="perPage" value="{{ request('perPage', 10) }}">
                        <input type="hidden" name="search" value="{{ request('search', '') }}">
                        <button class="btn btn-dark" type="submit">
                            <i class="fa fa-filter"></i> FILTER
                        </button>
                    </form>

                    <hr>

                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <form method="GET" action="{{ route('ho.meeting-weekly.index') }}" class="form-inline">
                                    <label for="perPage">Show:</label>
                                    <select id="perPage" name="perPage" class="form-control" onchange="this.form.submit()">
                                        <option value="5" {{ request('perPage', 10) == '10' ? 'selected' : '' }}>5</option>
                                        <option value="10" {{ request('perPage', 10) == '10' ? 'selected' : '' }}>10</option>
                                        <option value="25" {{ request('perPage', 10) == '25' ? 'selected' : '' }}>25</option>
                                        <option value="50" {{ request('perPage', 10) == '50' ? 'selected' : '' }}>50</option>
                                        <option value="100" {{ request('perPage', 10) == '100' ? 'selected' : '' }}>100</option>
                                    </select>
                                    <input type="hidden" name="search" value="{{ request('search', '') }}">
                                    <input type="hidden" name="month" value="{{ request('month', $monthnow) }}">
                                    <input type="hidden" name="year" value="{{ request('year', $yearnow) }}">


                                    <a href="{{ route('ho.meeting-weekly.excel', [
                                            'month' => request('month', $monthnow), 
                                            'year' => request('year', $yearnow), 
                                            'search' => request('search', ''), 
                                            'perPage' => request('perPage', 10)
                                        ]) }}"
                                        class="btn btn-success ml-2">
                                        excel
                                    </a>
                                </form>
                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <form method="GET" action="{{ route('ho.meeting-weekly.index') }}" class="form-inline">
                                    <input type="text" name="search" class="form-control mr-2" placeholder="Search..." value="{{ request('search', '') }}">
                                    <input type="hidden" name="perPage" value="{{ request('perPage', 10) }}">
                                    <input type="hidden" name="month" value="{{ request('month', $monthnow) }}">
                                    <input type="hidden" name="year" value="{{ request('year', $yearnow) }}">
                                    <button type="submit" class="btn btn-success">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="table-meeting_weekly_report" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Distributor</th>
                                    <th>Depo</th>
                                    <th>W1</th>
                                    <th>W2</th>
                                    <th>W3</th>
                                    <th>W4</th>
                                    <th>W5</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $index => $item)
                                <tr>
                                    <td>{{ $data->firstItem() + $index }}</td>
                                    <td>{{ $item->distributor->distributor_name }}</td>
                                    <td>{{ $item->depo->depo_name }}</td>
                                    @foreach(range(1, 5) as $week)
                                    @php
                                    $status = $item->getStatusForWeek($week);
                                    $statusClass = 'btn-default'; 
                                    $statusText = 'not started'; 

                                    if ($status == 'to review') {
                                    $statusClass = 'btn-warning';
                                    $statusText = 'to review';
                                    } elseif ($status == 'verified') {
                                    $statusClass = 'btn-success';
                                    $statusText = 'verified';
                                    } elseif ($status == 'rejected') {
                                    $statusClass = 'btn-danger';
                                    $statusText = 'rejected';
                                    }
                                    @endphp
                                    <td>
                                        <button class="btn {{ $statusClass }} submit">{{ $statusText }}</button>
                                    </td>
                                    @endforeach
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">No data available in table</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="dataTables_info">
                            Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} entries
                        </div>

                        <div class="pull-right">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    @if ($data->onFirstPage())
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $data->appends(request()->except('page'))->previousPageUrl() }}" rel="prev">Previous</a>
                                    </li>
                                    @endif

                                    @php
                                    $currentPage = $data->currentPage();
                                    $lastPage = $data->lastPage();
                                    $startPage = max(1, $currentPage - 2); 
                                    $endPage = min($lastPage, $currentPage + 2); 
                                    @endphp

                                    @for ($page = $startPage; $page <= $endPage; $page++)
                                        @if ($page==$currentPage)
                                        <li class="page-item active">
                                        <a class="page-link" href="#">{{ $page }}</a>
                                        </li>
                                        @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $data->appends(request()->except('page'))->url($page) }}">
                                                {{ $page }}
                                            </a>
                                        </li>
                                        @endif
                                        @endfor

                                        @if ($data->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $data->appends(request()->except('page'))->nextPageUrl() }}" rel="next">Next</a>
                                        </li>
                                        @else
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                        @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection