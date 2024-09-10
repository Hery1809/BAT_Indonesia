@extends('layouts.master')
@section('title', 'Maincomponent Weight')
@section('MasterEHSFacility', 'active-sub active')
@section('{{ $category->ec_name }}', 'active-sub active')
@section('{{ $category->ec_name }}sub', 'active-sub')
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

                    <h4 class="text-main text-bold mar-no">EHS Aktivitas {{ $category->ec_name }}</h4>
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
                                <form method="GET" action="{{ route('ehs_aktivitas.index', $category->ec_name) }}"
                                    class="form-inline">
                                    <input type="text" name="search" class="form-control mr-2" placeholder="Cari..."
                                        value="{{ $search }}">
                                    <input type="hidden" name="page" value="1">
                                    <input type="hidden" name="perPage" value="{{ request('perPage', 5) }}">
                                    <button type="submit" class="btn btn-primary">Cari</button>
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
                                    <th>Aktifitas</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($aktivitas as $items)
                                    <!-- Pastikan variabel yang digunakan adalah $item -->
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $items->ea_name }}</td>
                                        <td>
                                            <button type="button" data-target="#modal_edit{{ $items->ea_id }}"
                                                data-toggle="modal" class="btn btn-primary">
                                                <i class="demo-psi-pen-5 icon-lg"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Data Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Tampilkan jumlah data yang ditampilkan -->
                    @if (!$aktivitas->isEmpty())
                        <p class="d-inline-block">Showing {{ $aktivitas->firstItem() }} to
                            {{ $aktivitas->lastItem() }} of
                            {{ $aktivitas->total() }} entries</p>
                    @endif
                    <hr class="new-section-xs">
                    <div class="pull-right">
                        <nav aria-label="Page navigation">
                            <ul class="pagination text-nowrap mar-no">
                                <!-- Tombol untuk halaman pertama -->
                                <li class="page-pre {{ $aktivitas->onFirstPage() ? 'disabled' : '' }}">
                                    <a
                                        href="{{ $aktivitas->appends(['perPage' => Request::get('perPage')])->url(1) }}">&lt;&lt;</a>
                                </li>

                                <!-- Tambahkan nomor halaman dinamis -->
                                @foreach ($aktivitas->getUrlRange(1, $aktivitas->lastPage()) as $page => $url)
                                    <li class="page-number {{ $page == $aktivitas->currentPage() ? 'active' : '' }}">
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                <!-- Tombol untuk halaman terakhir -->
                                <li class="page-next {{ $aktivitas->hasMorePages() ? '' : 'disabled' }}">
                                    <a
                                        href="{{ $aktivitas->appends(['perPage' => Request::get('perPage')])->url($aktivitas->lastPage()) }}">&gt;&gt;</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Add Aktivitas-->
    <div class="modal fade" id="modal_add{{ $category->ec_name }}" role="dialog" tabindex="-1"
        aria-labelledby="demo-default-modal" aria-hidden="1">
        <div class="modal-dialog">
            <div class="modal-content">
                <!--Modal header-->
                <div class="modal-header">
                    <h4 class="modal-title">Add EHS Aktivitas {{ $category->ec_name }}</h4>
                </div>
                <form action="{{ route('ehs_aktivitas.store', $category->ec_name) }}" class="form-horizontal"
                    method="POST" enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    <!--Modal body-->
                    <input type="text" name="ec_id" value="{{ $category->ec_id }}" hidden>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="depo_name">
                                Aktivitas <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="ea_name" placeholder="Aktivitas" class="form-control" required></textarea>
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

    <!-- Modal Edit Depo-->
    @foreach ($aktivitas as $data)
        <div class="modal fade" id="modal_edit{{ $data->ea_id }}" role="dialog" tabindex="-1"
            aria-labelledby="demo-default-modal" aria-hidden="1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!--Modal header-->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit EHS Aktivitas {{ $category->ec_name }}</h4>
                    </div>
                    <form action="{{ route('ehs_aktivitas.update', $data->ea_id) }}" class="form-horizontal"
                        method="POST" enctype="multipart/form-data" id="inputanForm">
                        @csrf
                        @method('PUT')
                        <!--Modal body-->
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="depo_name">
                                    Aktivitas <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea name="ea_name" placeholder="Aktivitas" class="form-control" required>{{ $data->ea_name }}</textarea>
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
