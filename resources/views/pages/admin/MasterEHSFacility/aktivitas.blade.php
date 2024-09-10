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
                                    {{-- <input type="hidden" name="search" value="{{ $search }}"> --}}
                                    <input type="hidden" name="page" value="{{ request('page', 1) }}">
                                </form>
                            </div>
                            {{-- <div class="col-sm-6 table-toolbar-right">
                                <form method="GET" action="{{ route('subcomponent-weight.index') }}" class="form-inline">
                                    <input type="text" name="search" class="form-control mr-2" placeholder="Cari..."
                                        value="{{ $search }}">
                                    <input type="hidden" name="page" value="1">
                                    <input type="hidden" name="perPage" value="{{ request('perPage', 5) }}">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </form>
                            </div> --}}
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
                                @forelse ($aktivitas as $item)
                                    <!-- Pastikan variabel yang digunakan adalah $item -->
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->ea_name }}</td>
                                        <!-- Perbaiki $aktivitas->ea_name menjadi $item->ea_name -->
                                        <td>Edit</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Data Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
