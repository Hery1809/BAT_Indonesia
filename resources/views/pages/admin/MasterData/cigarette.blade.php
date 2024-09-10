@extends('layouts.master')
@section('title', 'Cigarette')
@section('MasterData', 'active-sub active')
@section('Cigarette', 'active-sub')
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

                    <h4 class="text-main text-bold mar-no">Cigarette</h4>
                    <p>&nbsp;</p>
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <form method="GET" action="{{ route('cigarette.index') }}">
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
                                <form method="GET" action="{{ route('cigarette.index') }}" class="form-inline">
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
                        <table id="table-cigarette" class="table table-striped table-bordered" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Cigarette</th>
                                    <th>Value</th>
                                    <th>Bonus</th>
                                    <th>Created Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cigarets as $items)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $items->cigarette_name }}</td>
                                        <td>{{ $items->cigarette_value }}</td>
                                        <td>{{ $items->cigarette_bonus }}</td>
                                        <td>{{ $items->created_date }}</td>
                                        <td>
                                            <button type="button" data-target="#modal_edit{{ $items->cigarette_id }}"
                                                data-toggle="modal" class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Tampilkan jumlah data yang ditampilkan -->
                    @if (!$cigarets->isEmpty())
                        <p class="d-inline-block">Showing {{ $cigarets->firstItem() }} to
                            {{ $cigarets->lastItem() }} of
                            {{ $cigarets->total() }} entries</p>
                    @endif
                    <hr class="new-section-xs">
                    <div class="pull-right">
                        <nav aria-label="Page navigation">
                            <ul class="pagination text-nowrap mar-no">
                                <!-- Tombol untuk halaman pertama -->
                                <li class="page-pre {{ $cigarets->onFirstPage() ? 'disabled' : '' }}">
                                    <a
                                        href="{{ $cigarets->appends(['perPage' => Request::get('perPage')])->url(1) }}">&lt;&lt;</a>
                                </li>

                                <!-- Tambahkan nomor halaman dinamis -->
                                @foreach ($cigarets->getUrlRange(1, $cigarets->lastPage()) as $page => $url)
                                    <li class="page-number {{ $page == $cigarets->currentPage() ? 'active' : '' }}">
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                <!-- Tombol untuk halaman terakhir -->
                                <li class="page-next {{ $cigarets->hasMorePages() ? '' : 'disabled' }}">
                                    <a
                                        href="{{ $cigarets->appends(['perPage' => Request::get('perPage')])->url($cigarets->lastPage()) }}">&gt;&gt;</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Add Cigarette-->
    <div class="modal fade" id="modal_add" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal"
        aria-hidden="1">
        <div class="modal-dialog">
            <div class="modal-content">
                <!--Modal header-->
                <div class="modal-header">
                    <h4 class="modal-title">Add cigarette</h4>
                </div>
                <form action="{{ route('cigarette.store') }}" class="form-horizontal" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    <!--Modal body-->
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="cigarette_name">
                                Cigarette <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" id="cigarette_name" name="cigarette_name" placeholder="cigarette"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="cigarette_value">
                                Value <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="number" id="cigarette_value" name="cigarette_value" placeholder="value"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="cigarette_bonus">
                                Bonus <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="number" id="cigarette_bonus" name="cigarette_bonus" placeholder="bonus"
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
    <!-- Modal Edit Cigarette-->
    @foreach ($cigarets as $data)
        <div class="modal fade" id="modal_edit{{ $data->cigarette_id }}" role="dialog" tabindex="-1"
            aria-labelledby="demo-default-modal" aria-hidden="1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!--Modal header-->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit cigarette</h4>
                    </div>
                    <form action="{{ route('cigarette.update', $data->cigarette_id) }}" class="form-horizontal"
                        method="POST" enctype="multipart/form-data" id="inputanForm">
                        @csrf
                        @method('PUT')
                        <!--Modal body-->
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="cigarette_name">
                                    Cigarette <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" id="cigarette_name" name="cigarette_name"
                                        placeholder="cigarette" class="form-control" value="{{ $data->cigarette_name }}"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="cigarette_value">
                                    Value <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="number" id="cigarette_value" name="cigarette_value"
                                        placeholder="value" class="form-control" value="{{ $data->cigarette_value }}"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="cigarette_bonus">
                                    Bonus <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="number" id="cigarette_bonus" name="cigarette_bonus"
                                        placeholder="bonus" class="form-control" value="{{ $data->cigarette_bonus }}"
                                        required>
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
