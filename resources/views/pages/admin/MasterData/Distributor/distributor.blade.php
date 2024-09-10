@extends('layouts.master')
@section('title', 'Distributor')
@section('MasterData', 'active-sub active')
@section('Distributor', 'active-sub')
@section('content')
    @include('layouts.alert')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <!--Data Table-->
                <div class="panel-body">
                    <div class="pull-right">
                        <a href="{{ route('distributor.create') }}" class="btn btn-primary submit">ADD</a>
                    </div>

                    <h4 class="text-main text-bold mar-no">Distributor</h4>
                    <p>&nbsp;</p>
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <form method="GET" action="{{ route('distributor.index') }}">
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
                                <form method="GET" action="{{ route('distributor.index') }}" class="form-inline">
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
                        <table id="table-distributor" class="table table-striped table-bordered" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Distributor</th>
                                    <th>Created Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($distributors as $items)
                                    <tr>
                                        <td>{{ ($distributors->currentPage() - 1) * $distributors->perPage() + $loop->iteration }}
                                        <td>{{ $items->distributor_name }}</td>
                                        <td>{{ $items->created_date }}</td>
                                        <td>
                                            <a href="{{ route('distributor.edit', $items->distributor_id) }}"
                                                class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button type="button" data-target="#modal_show{{ $items->distributor_id }}"
                                                data-toggle="modal" class="btn btn-default">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Data Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Tampilkan jumlah data yang ditampilkan -->
                    @if (!$distributors->isEmpty())
                        <p class="d-inline-block">Showing {{ $distributors->firstItem() }} to
                            {{ $distributors->lastItem() }} of
                            {{ $distributors->total() }} entries</p>
                    @endif
                    <hr class="new-section-xs">
                    <div class="pull-right">
                        <nav aria-label="Page navigation">
                            {{ $distributors->appends(['perPage' => request()->get('perPage'), 'search' => request()->get('search')])->links('pagination::bootstrap-4') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Show distributor-->
    @foreach ($distributors as $data)
        <div class="modal fade" id="modal_show{{ $data->distributor_id }}" role="dialog" tabindex="-1"
            aria-labelledby="demo-default-modal" aria-hidden="1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!--Modal header-->
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Distributor</h4>
                    </div>
                    <form class="form-horizontal">
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="distributor_name">
                                    Distributor
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" id="distributor_name" class="form-control" name="distributor_name"
                                        placeholder="Distributor" value="{{ $data->distributor_name }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="depo_id">Depo</label>
                                <div class="col-sm-9">
                                    @php
                                        $depoNames = $data->distributorDepos->pluck('depo.depo_name')->toArray();
                                        $depoList = implode(', ', $depoNames);
                                    @endphp
                                    <input type="text" class="form-control" value="{{ $depoList }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
