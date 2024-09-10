@extends('layouts.master')
@section('title', 'Subcomponent Weight')
@section('MasterParameter', 'active-sub active')
@section('SubcomponentWeight', 'active-sub')
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

                    <h4 class="text-main text-bold mar-no">Subcomponent Weight</h4>
                    <p>&nbsp;</p>
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <form method="GET" action="{{ route('subcomponent-weight.index') }}">
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
                                <form method="GET" action="{{ route('subcomponent-weight.index') }}" class="form-inline">
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
                        <table id="table-subcomponent_weight" class="table table-striped table-bordered" cellspacing="0"
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
                                    <th>MOM</th>
                                    <th>Daily Ops</th>
                                    <th>EHS</th>
                                    <th>Training</th>
                                    <th>Stock Level</th>
                                    <th>Stock Count</th>
                                    <th>Product Handling</th>
                                    <th>Stock Rotation</th>
                                    <th>Sell Out to WS</th>
                                    <th>Created Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sWeights as $items)
                                    <tr>
                                        <td>{{ ($sWeights->currentPage() - 1) * $sWeights->perPage() + $loop->iteration }}
                                        <td>{{ $items->month->month_var ?? 'Unknown' }}</td>
                                        <td>{{ $items->sw_year }}</td>
                                        <td>{{ $items->sw_coverage }}</td>
                                        <td>{{ $items->sw_hc }}</td>
                                        <td>{{ $items->sw_payment }}</td>
                                        <td>{{ $items->sw_ffis }}</td>
                                        <td>{{ $items->sw_mom }}</td>
                                        <td>{{ $items->sw_daily_ops }}</td>
                                        <td>{{ $items->sw_ehs }}</td>
                                        <td>{{ $items->sw_training }}</td>
                                        <td>{{ $items->sw_stock_level }}</td>
                                        <td>{{ $items->sw_stock_count }}</td>
                                        <td>{{ $items->sw_product_handling }}</td>
                                        <td>{{ $items->sw_stock_rotation }}</td>
                                        <td>{{ $items->sw_sell_out }}</td>
                                        <td>{{ $items->created_date }}</td>
                                        <td>
                                            <button type="button" data-target="#modal_edit{{ $items->sw_id }}"
                                                data-toggle="modal" class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <form action="{{ route('subcomponent-weight.destroy', $items->sw_id) }}"
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
                                        <td colspan="18" class="text-center">Data Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Tampilkan jumlah data yang ditampilkan -->
                    @if (!$sWeights->isEmpty())
                        <p class="d-inline-block">Showing {{ $sWeights->firstItem() }} to
                            {{ $sWeights->lastItem() }} of
                            {{ $sWeights->total() }} entries</p>
                    @endif
                    <hr class="new-section-xs">
                    <div class="pull-right">
                        <nav aria-label="Page navigation">
                            {{ $sWeights->appends(['perPage' => request()->get('perPage'), 'search' => request()->get('search')])->links('pagination::bootstrap-4') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add -->
    <div class="modal fade" id="modal_add" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal"
        aria-hidden="1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!--Modal header-->
                <div class="modal-header">
                    <h4 class="modal-title">Add Subcomponent Weight</h4>
                </div>
                <form action="{{ route('subcomponent-weight.store') }}" method="POST" enctype="multipart/form-data"
                    id="inputanForm">
                    @csrf
                    <!--Modal body-->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        Month - Year <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <select name="sw_month" class="form-control" required>
                                                <option selected disabled>Select Month</option>
                                                @foreach ($month as $items)
                                                    <option value="{{ $items->month_int }}">{{ $items->month_var }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select name="sw_year" class="form-control" required>
                                                <option selected disabled>Select Year</option>
                                                @for ($year = date('Y'); $year >= 1900; $year--)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        Coverage (%) <span class="text-danger">*</span></label>
                                    <input type="text" name="sw_coverage" onkeypress="return checkOnlyDigits(event)"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        HC (%) <span class="text-danger">*</span></label>
                                    <input type="text" name="sw_hc" onkeypress="return checkOnlyDigits(event)"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        Payment BAT (%) <span class="text-danger">*</span></label>
                                    <input type="text" name="sw_payment" onkeypress="return checkOnlyDigits(event)"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        FFIS (%) <span class="text-danger">*</span></label>
                                    <input type="text" name="sw_ffis" onkeypress="return checkOnlyDigits(event)"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        MOM (%) <span class="text-danger">*</span></label>
                                    <input type="text" name="sw_mom" onkeypress="return checkOnlyDigits(event)"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        Daily Operations (%) <span class="text-danger">*</span></label>
                                    <input type="text" name="sw_daily_ops" onkeypress="return checkOnlyDigits(event)"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        EHS (%) <span class="text-danger">*</span></label>
                                    <input type="text" name="sw_ehs" onkeypress="return checkOnlyDigits(event)"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        Training (%) <span class="text-danger">*</span></label>
                                    <input type="text" name="sw_training" onkeypress="return checkOnlyDigits(event)"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        Stock Level (%) <span class="text-danger">*</span></label>
                                    <input type="text" name="sw_stock_level"
                                        onkeypress="return checkOnlyDigits(event)" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        Stock Count (%) <span class="text-danger">*</span></label>
                                    <input type="text" name="sw_stock_count"
                                        onkeypress="return checkOnlyDigits(event)" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        Product Handling (%) <span class="text-danger">*</span></label>
                                    <input type="text" name="sw_product_handling"
                                        onkeypress="return checkOnlyDigits(event)" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        Stock Rotation (%) <span class="text-danger">*</span></label>
                                    <input type="text" name="sw_stock_rotation"
                                        onkeypress="return checkOnlyDigits(event)" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        Sell Out of WS (%) <span class="text-danger">*</span></label>
                                    <input type="text" name="sw_sell_out" onkeypress="return checkOnlyDigits(event)"
                                        class="form-control" required>
                                </div>
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
    @foreach ($sWeights as $data)
        <div class="modal fade" id="modal_edit{{ $data->sw_id }}" role="dialog" tabindex="-1"
            aria-labelledby="demo-default-modal" aria-hidden="1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Stock Level Policy</h4>
                    </div>
                    <form action="{{ route('subcomponent-weight.update', $data->sw_id) }}" method="POST"
                        enctype="multipart/form-data" id="inputanForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Month - Year <span class="text-danger">*</span></label>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <select name="sw_month" class="form-control" required>
                                                    <option selected disabled>Select Month</option>
                                                    @foreach ($month as $items)
                                                        <option value="{{ $items->month_int }}"
                                                            {{ $items->month_int == $data->sw_month ? 'selected' : '' }}>
                                                            {{ $items->month_var }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <select name="sw_year" class="form-control" required>
                                                    <option selected disabled>Select Year</option>
                                                    @for ($year = date('Y'); $year >= 1900; $year--)
                                                        <option value="{{ $year }}"
                                                            {{ $year == $data->sw_year ? 'selected' : '' }}>
                                                            {{ $year }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Coverage (%) <span class="text-danger">*</span></label>
                                        <input type="text" name="sw_coverage" value="{{ $data->sw_coverage }}"
                                            onkeypress="return checkOnlyDigits(event)" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            HC (%) <span class="text-danger">*</span></label>
                                        <input type="text" name="sw_hc" onkeypress="return checkOnlyDigits(event)"
                                            value="{{ $data->sw_hc }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Payment BAT (%) <span class="text-danger">*</span></label>
                                        <input type="text" name="sw_payment" value="{{ $data->sw_payment }}"
                                            onkeypress="return checkOnlyDigits(event)" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            FFIS (%) <span class="text-danger">*</span></label>
                                        <input type="text" name="sw_ffis" onkeypress="return checkOnlyDigits(event)"
                                            value="{{ $data->sw_ffis }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            MOM (%) <span class="text-danger">*</span></label>
                                        <input type="text" name="sw_mom" onkeypress="return checkOnlyDigits(event)"
                                            value="{{ $data->sw_mom }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Daily Operations (%) <span class="text-danger">*</span></label>
                                        <input type="text" name="sw_daily_ops" value="{{ $data->sw_daily_ops }}"
                                            onkeypress="return checkOnlyDigits(event)" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            EHS (%) <span class="text-danger">*</span></label>
                                        <input type="text" name="sw_ehs" onkeypress="return checkOnlyDigits(event)"
                                            value="{{ $data->sw_ehs }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Training (%) <span class="text-danger">*</span></label>
                                        <input type="text" name="sw_training"
                                            onkeypress="return checkOnlyDigits(event)" class="form-control"
                                            value="{{ $data->sw_training }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Stock Level (%) <span class="text-danger">*</span></label>
                                        <input type="text" name="sw_stock_level"
                                            onkeypress="return checkOnlyDigits(event)" class="form-control"
                                            value="{{ $data->sw_stock_level }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Stock Count (%) <span class="text-danger">*</span></label>
                                        <input type="text" name="sw_stock_count"
                                            onkeypress="return checkOnlyDigits(event)" class="form-control"
                                            value="{{ $data->sw_stock_count }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Product Handling (%) <span class="text-danger">*</span></label>
                                        <input type="text" name="sw_product_handling"
                                            onkeypress="return checkOnlyDigits(event)" class="form-control"
                                            value="{{ $data->sw_product_handling }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Stock Rotation (%) <span class="text-danger">*</span></label>
                                        <input type="text" name="sw_stock_rotation"
                                            onkeypress="return checkOnlyDigits(event)" class="form-control"
                                            value="{{ $data->sw_stock_rotation }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Sell Out of WS (%) <span class="text-danger">*</span></label>
                                        <input type="text" name="sw_sell_out"
                                            onkeypress="return checkOnlyDigits(event)" class="form-control"
                                            value="{{ $data->sw_sell_out }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
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
