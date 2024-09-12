@extends('layouts.master')
@section('title', 'Depo')
@section('MasterData', 'active-sub active')
@section('Depo', 'active-sub')
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

                    <h4 class="text-main text-bold mar-no">Depo</h4>
                    <p>&nbsp;</p>
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <form method="GET" action="{{ route('depo.index') }}">
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
                                <form method="GET" action="{{ route('depo.index') }}" class="form-inline">
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
                        <table id="table-depo" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Depo</th>
                                    <th>Region</th>
                                    <th>Retail</th>
                                    <th>Created Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($depos as $items)
                                    <tr>
                                        <td>{{ ($depos->currentPage() - 1) * $depos->perPage() + $loop->iteration }}
                                        <td>{{ $items->depo_name }}</td>
                                        <td>{{ $items->depo_region }}</td>
                                        <td>{{ $items->depo_retail }}</td>
                                        <td>{{ $items->created_date }}</td>
                                        <td>
                                            <button type="button" data-target="#modal_edit{{ $items->depo_id }}"
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

    <!--Modal Add Depo-->
    <div class="modal fade" id="modal_add" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal"
        aria-hidden="1">
        <div class="modal-dialog">
            <div class="modal-content">
                <!--Modal header-->
                <div class="modal-header">
                    <h4 class="modal-title">Add Depo</h4>
                </div>
                <form action="{{ route('depo.store') }}" class="form-horizontal" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    <!--Modal body-->
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="depo_name">
                                Depo <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" id="depo_name" name="depo_name" placeholder="depo"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="depo_region">
                                Region <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" id="depo_region" name="depo_region" placeholder="Region"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="depo_retail">
                                Retail <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="number" id="depo_retail" name="depo_retail" placeholder="Retail"
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
    <!-- Modal Edit Depo-->
    @foreach ($depos as $data)
        <div class="modal fade" id="modal_edit{{ $data->depo_id }}" role="dialog" tabindex="-1"
            aria-labelledby="demo-default-modal" aria-hidden="1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!--Modal header-->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Depo</h4>
                    </div>
                    <form action="{{ route('depo.update', $data->depo_id) }}" class="form-horizontal" method="POST"
                        enctype="multipart/form-data" id="inputanForm">
                        @csrf
                        @method('PUT')
                        <!--Modal body-->
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="depo_name">
                                    Depo <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" id="depo_name" name="depo_name" placeholder="depo"
                                        class="form-control" value="{{ $data->depo_name }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="depo_region">
                                    Region <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" id="depo_region" name="depo_region" placeholder="Region"
                                        class="form-control" value="{{ $data->depo_region }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="depo_retail">
                                    Retail <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="number" id="depo_retail" name="depo_retail" placeholder="Retail"
                                        class="form-control" value="{{ $data->depo_retail }}" required>
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
