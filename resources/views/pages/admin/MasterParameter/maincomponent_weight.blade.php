@extends('layouts.master')
@section('title', 'Maincomponent Weight')
@section('MasterParameter', 'active-sub active')
@section('MaincomponentWeight', 'active-sub')
@section('content')
    @include('layouts.alert')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <!--Data Table-->
                <div class="panel-body">
                    <div class="pull-right">
                        <button type="button" data-target="#modal_add" data-toggle="modal"
                            class="btn btn-primary submit">ADD</button>
                    </div>

                    <h4 class="text-main text-bold mar-no">Maincomponent Weight</h4>
                    <p>&nbsp;</p>
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <form method="GET" action="{{ route('maincomponent-weight.index') }}">
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
                                </form>
                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <form method="GET" action="{{ route('maincomponent-weight.index') }}" class="form-inline">
                                    <input type="text" name="search" class="form-control mr-2" placeholder="Search..."
                                        value="{{ $search }}">
                                    <input type="hidden" name="page" value="1">
                                    <input type="hidden" name="perPage" value="{{ request('perPage', 5) }}">
                                    <button type="submit" class="btn btn-success">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="table-maincomponent_weight" class="table table-striped table-bordered" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>Coverage</th>
                                    <th>HC</th>
                                    <th>Payment BAT</th>
                                    <th>FFIS</th>
                                    <th>Operation</th>
                                    <th>Stock</th>
                                    <th>Created Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($maincomponents as $items)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $items->month->month_var ?? 'Unknown' }}</td>
                                        <td>{{ $items->mw_year }}</td>
                                        <td>{{ $items->mw_coverage }}</td>
                                        <td>{{ $items->mw_hc }}</td>
                                        <td>{{ $items->mw_payment }}</td>
                                        <td>{{ $items->mw_ffis }}</td>
                                        <td>{{ $items->mw_operation }}</td>
                                        <td>{{ $items->mw_stock }}</td>
                                        <td>{{ $items->created_date }}</td>
                                        <td>
                                            <button type="button" data-target="#modal_edit{{ $items->mw_id }}"
                                                data-toggle="modal" class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <form action="{{ route('maincomponent-weight.destroy', $items->mw_id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                    class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center">Data Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Tampilkan jumlah data yang ditampilkan -->
                    @if (!$maincomponents->isEmpty())
                        <p class="d-inline-block">Showing {{ $maincomponents->firstItem() }} to
                            {{ $maincomponents->lastItem() }} of
                            {{ $maincomponents->total() }} entries</p>
                    @endif
                    <hr class="new-section-xs">
                    <div class="pull-right">
                        <nav aria-label="Page navigation">
                            <ul class="pagination text-nowrap mar-no">
                                <!-- Tombol untuk halaman pertama -->
                                <li class="page-pre {{ $maincomponents->onFirstPage() ? 'disabled' : '' }}">
                                    <a
                                        href="{{ $maincomponents->appends(['perPage' => Request::get('perPage')])->url(1) }}">&lt;&lt;</a>
                                </li>

                                <!-- Tambahkan nomor halaman dinamis -->
                                @foreach ($maincomponents->getUrlRange(1, $maincomponents->lastPage()) as $page => $url)
                                    <li class="page-number {{ $page == $maincomponents->currentPage() ? 'active' : '' }}">
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                <!-- Tombol untuk halaman terakhir -->
                                <li class="page-next {{ $maincomponents->hasMorePages() ? '' : 'disabled' }}">
                                    <a
                                        href="{{ $maincomponents->appends(['perPage' => Request::get('perPage')])->url($maincomponents->lastPage()) }}">&gt;&gt;</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add -->
    <div class="modal fade" id="modal_add" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal"
        aria-hidden="1">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <h4 class="modal-title">Add Maincomponent Weight</h4>
                </div>

                <form action="{{ route('maincomponent-weight.store') }}" class="form-horizontal action" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    <div class="modal-body">

                        <div id="errorMsg"></div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                Month - Year <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <select name="mw_month" class="form-control" required>
                                    <option selected disabled>Select Month</option>
                                    @foreach ($month as $items)
                                        <option value="{{ $items->month_int }}">{{ $items->month_var }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select name="mw_year" class="form-control" required>
                                    <option selected disabled>Select Year</option>
                                    @for ($year = date('Y'); $year >= 1900; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                Coverage (%) <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="number" name="mw_coverage" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                HC (%) <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="number" name="mw_hc" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                Payment BAT (%) <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="number" name="mw_payment" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                FFIS (%) <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="number" name="mw_ffis" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                Operation (%) <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="number" name="mw_operation" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">
                                Stock (%) <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <input type="number" name="mw_stock" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <!--Modal footer-->
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button type="submit" id="submit" class="btn btn-primary">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Edit -->
    @foreach ($maincomponents as $data)
        <div class="modal fade" id="modal_edit{{ $data->mw_id }}" role="dialog" tabindex="-1"
            aria-labelledby="demo-default-modal" aria-hidden="1">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!--Modal header-->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Maincomponent Weight</h4>
                    </div>

                    <form action="{{ route('maincomponent-weight.update', $data->mw_id) }}"
                        class="form-horizontal action" method="POST" enctype="multipart/form-data" id="inputanForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">

                            <div id="errorMsg"></div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">
                                    Month - Year <span class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <select name="mw_month" class="form-control" required>
                                        <option selected disabled>Select Month</option>
                                        @foreach ($month as $items)
                                            <option value="{{ $items->month_int }}"
                                                {{ $items->month_int == $data->mw_month ? 'selected' : '' }}>
                                                {{ $items->month_var }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select name="mw_year" class="form-control" required>
                                        <option selected disabled>Select Year</option>
                                        @for ($year = date('Y'); $year >= 1900; $year--)
                                            <option value="{{ $year }}"
                                                {{ $year == $data->mw_year ? 'selected' : '' }}>
                                                {{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-5 control-label">
                                    Coverage (%) <span class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <input type="number" name="mw_coverage" value="{{ $data->mw_coverage }}"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-5 control-label">
                                    HC (%) <span class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <input type="number" name="mw_hc" value="{{ $data->mw_hc }}"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-5 control-label">
                                    Payment BAT (%) <span class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <input type="number" name="mw_payment" value="{{ $data->mw_payment }}"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-5 control-label">
                                    FFIS (%) <span class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <input type="number" name="mw_ffis" value="{{ $data->mw_ffis }}"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-5 control-label">
                                    Operation (%) <span class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <input type="number" name="mw_operation" value="{{ $data->mw_operation }}"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-5 control-label">
                                    Stock (%) <span class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <input type="number" name="mw_stock" value="{{ $data->mw_stock }}"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <!--Modal footer-->
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                            <button type="submit" id="submit" class="btn btn-primary">ADD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
