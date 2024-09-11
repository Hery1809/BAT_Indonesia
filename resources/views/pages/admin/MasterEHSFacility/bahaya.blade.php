@extends('layouts.master')

@section('title', 'Maincomponent Weight')
@section('MasterEHSFacility', 'active-sub active')
@section('bahaya', 'active-sub active')
@section('bahayasub', 'active-sub')

@section('content')
    <style>
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            /* Mendukung scroll di perangkat mobile */
        }

        .table {
            min-width: 1200px;
            /* Bisa disesuaikan sesuai jumlah kolom */
        }
    </style>
    @include('layouts.alert')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <!--Data Table-->
                <div class="panel-body">
                    <div class="pull-right">
                        <button type="button" data-target="#modal_add{{ $category->ec_name }}" data-toggle="modal"
                            class="btn btn-primary submit">ADD</button>
                    </div>

                    <h4 class="text-main text-bold mar-no">EHS Bahaya {{ $category->ec_name }}</h4>
                    <p>&nbsp;</p>
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <form method="GET" action="{{ route('ehs_bahaya.index', $category->ec_name) }}">
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
                                <form method="GET" action="{{ route('ehs_bahaya.index', $category->ec_name) }}"
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
                        <table id="table-ehs_bahaya" class="table table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Aktifitas</th>
                                    <th>Type</th>
                                    <th>Bahaya</th>
                                    <th>Dampak Kepada Karyawan</th>
                                    <th>Bagaimana Dampak Yang Ditimbulkan</th>
                                    <th>Legal Compliance</th>
                                    <th>Kontrol & Monitor yang harus dilakukan</th>
                                    <th>Konsekuensi</th>
                                    <th>Probabilitas</th>
                                    <th>Nilai Bahaya</th>
                                    <th>Action yang harus dilakukan</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bahayas as $items)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $items->aktivitas->ea_name }}</td>
                                        <td>{{ $items->eb_type }}</td>
                                        <td>{{ $items->eb_bahaya }}</td>
                                        <td>{{ $items->eb_dampak_karyawan }}</td>
                                        <td>{{ $items->eb_dampak_timbulkan }}</td>
                                        <td>{{ $items->eb_legal }}</td>
                                        <td>{{ $items->eb_kontrol }}</td>
                                        <td>{{ $items->eb_konsekuensi }}</td>
                                        <td>{{ $items->eb_probabilitas }}</td>
                                        <td>{{ $items->eb_nilai_bahaya }}</td>
                                        <td>{{ $items->eb_kontrol }}</td>
                                        <td>
                                            <button type="button" data-target="#modal_edit{{ $items->eb_id }}"
                                                data-toggle="modal" class="btn btn-primary">
                                                <i class="demo-psi-pen-5 icon-lg"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="13" class="text-center">Data Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Tampilkan jumlah data yang ditampilkan -->
                    @if (!$bahayas->isEmpty())
                        <p class="d-inline-block">Showing {{ $bahayas->firstItem() }} to
                            {{ $bahayas->lastItem() }} of
                            {{ $bahayas->total() }} entries</p>
                    @endif
                    <hr class="new-section-xs">
                    <div class="pull-right">
                        <nav aria-label="Page navigation">
                            <ul class="pagination text-nowrap mar-no">
                                <!-- Tombol untuk halaman pertama -->
                                <li class="page-pre {{ $bahayas->onFirstPage() ? 'disabled' : '' }}">
                                    <a
                                        href="{{ $bahayas->appends(['perPage' => Request::get('perPage')])->url(1) }}">&lt;&lt;</a>
                                </li>

                                <!-- Tambahkan nomor halaman dinamis -->
                                @foreach ($bahayas->getUrlRange(1, $bahayas->lastPage()) as $page => $url)
                                    <li class="page-number {{ $page == $bahayas->currentPage() ? 'active' : '' }}">
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                <!-- Tombol untuk halaman terakhir -->
                                <li class="page-next {{ $bahayas->hasMorePages() ? '' : 'disabled' }}">
                                    <a
                                        href="{{ $bahayas->appends(['perPage' => Request::get('perPage')])->url($bahayas->lastPage()) }}">&gt;&gt;</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Add Bahaya-->
    <div class="modal fade" id="modal_add{{ $category->ec_name }}" role="dialog" tabindex="-1"
        aria-labelledby="demo-default-modal" aria-hidden="1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!--Modal header-->
                <div class="modal-header">
                    <h4 class="modal-title">Add EHS Bahaya {{ $category->ec_name }}</h4>
                </div>
                <form action="{{ route('ehs_bahaya.store', $category->ec_name) }}" class="form-horizontal" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    <!--Modal body-->
                    <input type="text" name="ec_id" value="{{ $category->ec_id }}" hidden>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                Aktifitas <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="ea_id" class="form-control">
                                    <option selected disabled>Pilih Aktifitas</option>
                                    @foreach ($activitas as $data)
                                        <option value="{{ $data->ea_id }}">{{ $data->ea_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                Type <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="eb_type" class="form-control">
                                    <option selected disabled>Pilih Type</option>
                                    <option value="R">R</option>
                                    <option value="NR">NR</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                Bahaya <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="eb_bahaya" placeholder="Bahaya" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                Dampak Kepada Karyawan <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="eb_dampak_karyawan" placeholder="Dampak Kepada Karyawan" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                Bagaimana Dampak Yang Ditimbulkan <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="eb_dampak_timbulkan" placeholder="Bagaimana Dampak Yang Ditimbulkan" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                Legal Compliance <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="eb_legal" placeholder="Legal Compliance" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                Kontrol & Monitor yang harus dilakukan <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="eb_kontrol" placeholder="Kontrol & Monitor yang harus dilakukan" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                Konsekuensi <span class="text-danger">*</span></label>
                            <div class="col-sm-2">
                                <input type="number" name="eb_konsekuensi" value="0" class="form-control"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                Probabilitas <span class="text-danger">*</span></label>
                            <div class="col-sm-2">
                                <input type="number" name="eb_probabilitas" value="0" class="form-control"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                Action yang harus dilakukan untuk menanggulangi bahaya yang ditimbulkan <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="eb_action" placeholder="Action yang harus dilakukan untuk menanggulangi bahaya yang ditimbulkan"
                                    class="form-control" required></textarea>
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

    <!--Modal Edit Bahaya-->
    @foreach ($bahayas as $data)
        <div class="modal fade" id="modal_edit{{ $data->eb_id }}" role="dialog" tabindex="-1"
            aria-labelledby="demo-default-modal" aria-hidden="1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!--Modal header-->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit EHS Bahaya {{ $category->ec_name }}</h4>
                    </div>
                    <form action="{{ route('ehs_bahaya.update', $data->eb_id) }}" class="form-horizontal" method="POST"
                        enctype="multipart/form-data" id="inputanForm">
                        @csrf
                        @method('PUT')
                        <!--Modal body-->
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Aktifitas <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select name="ea_id" class="form-control">
                                        <option selected disabled>Pilih Aktifitas</option>
                                        @foreach ($activitas as $act)
                                            <option value="{{ $act->ea_id }}"
                                                {{ $act->ea_id == $data->ea_id ? 'selected' : '' }}>{{ $act->ea_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{--
                            --}}
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Type <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select name="eb_type" class="form-control">
                                        <option selected disabled>Pilih Type</option>
                                        <option value="R"
                                            {{ old('eb_type', $data->eb_type ?? '') == 'R' ? 'selected' : '' }}>R</option>
                                        <option value="NR"
                                            {{ old('eb_type', $data->eb_type ?? '') == 'NR' ? 'selected' : '' }}>NR
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Bahaya <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea name="eb_bahaya" placeholder="Bahaya" class="form-control" required>{{ $data->eb_bahaya }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Dampak Kepada Karyawan <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea name="eb_dampak_karyawan" placeholder="Dampak Kepada Karyawan" class="form-control" required>{{ $data->eb_dampak_karyawan }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Bagaimana Dampak Yang Ditimbulkan <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea name="eb_dampak_timbulkan" placeholder="Bagaimana Dampak Yang Ditimbulkan" class="form-control" required>{{ $data->eb_dampak_timbulkan }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Legal Compliance <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea name="eb_legal" placeholder="Legal Compliance" class="form-control" required>{{ $data->eb_legal }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Kontrol & Monitor yang harus dilakukan <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea name="eb_kontrol" placeholder="Kontrol & Monitor yang harus dilakukan" class="form-control" required>{{ $data->eb_kontrol }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Konsekuensi <span class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <input type="number" name="eb_konsekuensi" class="form-control"
                                        value="{{ $data->eb_konsekuensi }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Probabilitas <span class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <input type="number" name="eb_probabilitas" class="form-control"
                                        value="{{ $data->eb_probabilitas }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Action yang harus dilakukan untuk menanggulangi bahaya yang ditimbulkan <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea name="eb_action" placeholder="Action yang harus dilakukan untuk menanggulangi bahaya yang ditimbulkan"
                                        class="form-control" required>{{ $data->eb_action }}</textarea>
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
