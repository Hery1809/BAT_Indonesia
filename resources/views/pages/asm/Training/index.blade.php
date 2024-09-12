@extends('layouts.master-asm')
@section('title', 'training')
@section('training', 'active-sub')
@section('content')


<div class="row">
    <div class="col-xs-12">
        <div class="panel">
            <!--Data Table-->
            <!--===================================================-->
            <div class="panel-body">

                <h4 class="text-main text-bold mar-no">Training</h4>
                <p>&nbsp;</p>

                <div class="row">
                    <form class="form-horizontal" method="GET">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="col-sm-12 text-semibold">Status</label>
                                    <div class="col-sm-12">
                                        <select name="status" class="form-control" required="">
                                            @foreach ($statuses->sortByDesc('status_id') as $status)
                                                <option value="{{ $status->status_id }}" @if (request('status', ) == $status->status_id) selected @endif>
                                                    {{ $status->status_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-sm-12 text-semibold">
                                        Month - Year</label>
                                    <div class="col-sm-6">
                                        <select name="month" class="form-control" required="">
                                            @foreach ($months as $value)
                                                <option value="{{ $value->month_int }}" @if (request('month') == $value->month_int) selected @endif>
                                                    {{ $value->month_var }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select name="year" class="form-control" required="">
                                            <?= $yearnow = date('Y') ?>
                                            @for ($i = 2020; $i <= $yearnow; $i++)
                                                <option value="{{ $i }}" @if ($i == $yearnow) selected @endif>{{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-sm-12 text-semibold">&nbsp;</label>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary submit">FILTER</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>

                <div class="table-responsive">
                    <div id="table-training_asm" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <form method="GET" action="{{ route('asm.Training.index') }}">
                                    <label for="perPage">Show:</label>
                                    <select id="perPage" name="perPage" class="form-control"
                                        onchange="this.form.submit()">
                                        <option value="5" {{ request('perPage', 5) == '5' ? 'selected' : '' }}>5
                                        </option>
                                        <option value="10" {{ request('perPage', 5) == '10' ? 'selected' : '' }}>10
                                        </option>
                                        <option value="25" {{ request('perPage', 5) == '25' ? 'selected' : '' }}>25
                                        </option>
                                        <option value="50" {{ request('perPage', 5) == '50' ? 'selected' : '' }}>50
                                        </option>
                                        <option value="100" {{ request('perPage', 5) == '100' ? 'selected' : '' }}>100
                                        </option>
                                    </select>
                                    <input type="hidden" name="search" value="{{ $search }}">
                                    <input type="hidden" name="page" value="{{ request('page', 1) }}">
                                    <input type="hidden" name="month" value="{{ request('month') }}">
                                    <input type="hidden" name="year" value="{{ request('year') }}">
                                    <input type="hidden" name="status" value="{{ request('status') }}">
                                </form>
                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <form method="GET" action="{{ route('asm.Training.index') }}" class="form-inline">
                                    <input type="text" name="search" class="form-control mr-2" placeholder="Search..."
                                        value="{{ $search }}">
                                    <input type="hidden" name="page" value="1">
                                    <input type="hidden" name="perPage" value="{{ request('perPage', 5) }}">
                                    <button type="submit" class="btn btn-success">Search</button>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <table id="table-training_asm"
                                    class="table table-striped dataTable no-footer dtr-inline" cellspacing="0"
                                    width="100%" role="grid" aria-describedby="table-meeting_weekly_verify_asm_info"
                                    style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th width="5%" class="sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 23px;" aria-label="No">No</th>
                                            <th class="sorting_asc" tabindex="0"
                                                aria-controls="table-meeting_weekly_verify_asm" rowspan="1" colspan="1"
                                                style="width: 110px;" aria-sort="ascending"
                                                aria-label="Distributor: activate to sort column descending">
                                                Distributor</th>
                                            <th class="sorting" tabindex="0"
                                                aria-controls="table-meeting_weekly_verify_asm" rowspan="1" colspan="1"
                                                style="width: 62px;"
                                                aria-label="Depo: activate to sort column ascending">Depo</th>
                                            <th class="sorting" tabindex="0"
                                                aria-controls="table-meeting_weekly_verify_asm" rowspan="1" colspan="1"
                                                style="width: 55px;"
                                                aria-label="Year: activate to sort column ascending">Year</th>
                                            <th class="sorting" tabindex="0"
                                                aria-controls="table-meeting_weekly_verify_asm" rowspan="1" colspan="1"
                                                style="width: 73px;"
                                                aria-label="Month: activate to sort column ascending">Month</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 61px;"
                                                aria-label="Status">Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($dataTrainings as $key => $training)
                                            <tr class="odd">
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $training->distributor ? $training->distributor->distributor_name : 'No Distributor' }}
                                                </td>
                                                <td>{{ $training->depo ? $training->depo->depo_name : 'No Depo' }}</td>
                                                <td>{{ $training->t_year }}</td>
                                                <td>{{ $training->month ? $training->month->month_var : 'No Month' }}</td>
                                                <td>{{ $training->status ? $training->status->status_name : 'No Status' }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" style="text-align: center; vertical-align: middle;">No data available in table</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div id="table-training_asm" class="dataTables_processing panel panel-default"
                                    style="display: none;">
                                    Processing...</div>
                            </div>
                        </div>
                        <!-- Tampilkan jumlah data yang ditampilkan -->
                        @if (!$dataTrainings->isEmpty())
                            <p class="d-inline-block">
                                Showing {{ $dataTrainings->firstItem() }} to {{ $dataTrainings->lastItem() }} of
                                {{ $dataTrainings->total() }} entries
                            </p>
                        @endif
                        <hr class="new-section-xs">

                        <div class="pull-right">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    {{-- Previous Page Link --}}
                                    @if ($dataTrainings->onFirstPage())
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $dataTrainings->previousPageUrl() }}"
                                                rel="prev">Previous</a>
                                        </li>
                                    @endif

                                    {{-- Page Number Links --}}
                                    @php
                                        $currentPage = $dataTrainings->currentPage();
                                        $lastPage = $dataTrainings->lastPage();
                                        $startPage = max(1, $currentPage - 2); // Halaman awal
                                        $endPage = min($lastPage, $currentPage + 2); // Halaman akhir
                                    @endphp

                                    @for ($page = $startPage; $page <= $endPage; $page++)
                                        @if ($page == $currentPage)
                                            <li class="page-item active">
                                                <a class="page-link" href="#">{{ $page }}</a>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="{{ $dataTrainings->appends(['perPage' => request()->get('perPage'), 'search' => request()->get('search')])->url($page) }}">
                                                    {{ $page }}
                                                </a>
                                            </li>
                                        @endif
                                    @endfor

                                    {{-- Next Page Link --}}
                                    @if ($dataTrainings->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $dataTrainings->nextPageUrl() }}"
                                                rel="next">Next</a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Next</a>
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
</div>

@endsection