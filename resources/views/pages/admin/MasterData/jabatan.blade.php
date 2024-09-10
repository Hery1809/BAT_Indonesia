@extends('layouts.master')
@section('title', 'Jabatan')
@section('MasterData', 'active-sub active')
@section('Jabatan', 'active-sub')
@section('content')
    @include('layouts.alert')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <!--Data Table-->
                <div class="panel-body">
                    <h4 class="text-main text-bold mar-no">Jabatan</h4>
                    <p>&nbsp;</p>
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <form method="GET" action="{{ route('jabatan.index') }}">
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
                                <form method="GET" action="{{ route('jabatan.index') }}" class="form-inline">
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
                        <table id="table-jabatan" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jabatan</th>
                                    <th>Target Join Call</th>
                                    <th>Created Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jabatans as $items)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $items->jabatan_name }}</td>
                                        <td>{{ $items->jabatan_target_join_call }}</td>
                                        <td>{{ $items->created_date }}</td>
                                        <td>
                                            <button type="button" data-target="#modal_edit{{ $items->jabatan_id }}"
                                                data-toggle="modal" class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Tampilkan jumlah data yang ditampilkan -->
                    @if (!$jabatans->isEmpty())
                        <p class="d-inline-block">Showing {{ $jabatans->firstItem() }} to
                            {{ $jabatans->lastItem() }} of
                            {{ $jabatans->total() }} entries</p>
                    @endif
                    <hr class="new-section-xs">
                    <div class="pull-right">
                        <nav aria-label="Page navigation">
                            <ul class="pagination text-nowrap mar-no">
                                <!-- Tombol untuk halaman pertama -->
                                <li class="page-pre {{ $jabatans->onFirstPage() ? 'disabled' : '' }}">
                                    <a
                                        href="{{ $jabatans->appends(['perPage' => Request::get('perPage')])->url(1) }}">&lt;&lt;</a>
                                </li>

                                <!-- Tambahkan nomor halaman dinamis -->
                                @foreach ($jabatans->getUrlRange(1, $jabatans->lastPage()) as $page => $url)
                                    <li class="page-number {{ $page == $jabatans->currentPage() ? 'active' : '' }}">
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                <!-- Tombol untuk halaman terakhir -->
                                <li class="page-next {{ $jabatans->hasMorePages() ? '' : 'disabled' }}">
                                    <a
                                        href="{{ $jabatans->appends(['perPage' => Request::get('perPage')])->url($jabatans->lastPage()) }}">&gt;&gt;</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Depo-->
    @foreach ($jabatans as $data)
        <div class="modal fade" id="modal_edit{{ $data->jabatan_id }}" role="dialog" tabindex="-1"
            aria-labelledby="demo-default-modal" aria-hidden="1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!--Modal header-->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Jabatan</h4>
                    </div>
                    <form action="{{ route('jabatan.update', $data->jabatan_id) }}" class="form-horizontal" method="POST"
                        enctype="multipart/form-data" id="inputanForm">
                        @csrf
                        @method('PUT')
                        <!--Modal body-->
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="jabatan_name">
                                    Jabatan <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" id="jabatan_name" name="jabatan_name" placeholder="Jabatan"
                                        class="form-control" value="{{ $data->jabatan_name }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="jabatan_target_join_call">
                                    Target Join Call <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="number" id="jabatan_target_join_call" name="jabatan_target_join_call"
                                        placeholder="Region" class="form-control"
                                        value="{{ $data->jabatan_target_join_call }}" required>
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
