@extends('layouts.master')
@section('title', 'Target')
@section('Headcount', 'active-sub active')
@section('Target', 'active-sub')
@section('content')
    @include('layouts.alert')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="pull-right">
                        <button type="button" data-target="#modal_import" data-toggle="modal" class="btn btn-success"><i
                                class="fa fa-upload"></i> IMPORT</button>
                        <button type="button" onclick="data_remove_all" class="btn btn-danger"><i class="fa fa-trash"></i>
                            DELETE</button>
                        <button type="button" id="add" data-target="#modal_add" data-toggle="modal"
                            class="btn btn-primary submit">ADD</button>
                    </div>

                    <h4 class="text-main text-bold mar-no">Target Headcount</h4>
                    <p>&nbsp;</p>
                    <form class="form-inline" method="GET" action="{{ route('target.index') }}">
                        <div class="form-group">
                            <select name="month" class="form-control" required>
                                <option value="" selected>Bulan</option>
                                @for ($m = 1; $m <= 12; $m++)
                                    <option value="{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}"
                                        {{ old('month', request('month', now()->format('m'))) == str_pad($m, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                        {{ DateTime::createFromFormat('!m', $m)->format('F') }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="year" class="form-control" required>
                                <option value="" selected>Tahun</option>
                                @for ($y = date('Y'); $y >= 2000; $y--)
                                    <option value="{{ $y }}"
                                        {{ old('year', request('year', now()->format('Y'))) == $y ? 'selected' : '' }}>
                                        {{ $y }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <button class="btn btn-dark" type="submit"><i class="fa fa-filter"></i> FILTER</button>
                    </form>

                    <hr>
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <form method="GET" action="{{ route('target.index') }}">
                                    <label for="perPage">Show:</label>
                                    <select id="perPage" name="perPage" class="form-control"
                                        onchange="this.form.submit()">
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
                                    <input type="hidden" name="month"
                                        value="{{ request('month', now()->format('m')) }}">
                                    <input type="hidden" name="year" value="{{ request('year', now()->format('Y')) }}">
                                    <input type="hidden" name="page" value="{{ request('page', 1) }}">
                                </form>

                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <form method="GET" action="{{ route('target.index') }}" class="form-inline">
                                    <input type="text" name="search" class="form-control mr-2" placeholder="Search..."
                                        value="{{ $search }}">
                                    <input type="hidden" name="month"
                                        value="{{ request('month', now()->format('m')) }}">
                                    <input type="hidden" name="year" value="{{ request('year', now()->format('Y')) }}">
                                    <input type="hidden" name="page" value="1">
                                    <input type="hidden" name="perPage" value="{{ request('perPage', 5) }}">
                                    <button type="submit" class="btn btn-success">Search</button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="table_headcount_target_hc" class="table table-striped table-fixed" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th class="fixed">No</th>
                                    <th class="fixed">Distributor</th>
                                    <th class="fixed">Depo</th>
                                    @foreach ($positions as $position)
                                        <th>{{ $position->position_name }}</th>
                                    @endforeach
                                    <th>Created Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($distributorDepos as $index => $data)
                                    <tr>
                                        <td>{{ $distributorDepos->firstItem() + $index }}</td>
                                        <td>{{ $data->distributor->distributor_name }}</td>
                                        <td>{{ $data->depo->depo_name }}</td>
                                        @foreach ($positions as $pos)
                                            @php
                                                $key = $data->distributor_id . '-' . $data->depo_id;
                                                $target =
                                                    $headcountTargets[$key]->firstWhere(
                                                        'position_id',
                                                        $pos->position_id,
                                                    ) ?? null;
                                            @endphp
                                            <td>{{ $target ? $target->hth_value : '-' }}</td>
                                        @endforeach
                                        @php
                                            $key = $data->distributor_id . '-' . $data->depo_id;
                                            $target =
                                                $headcountTargets[$key]->firstWhere('position_id', $pos->position_id) ??
                                                null;
                                            $createdDate = $target ? $target->created_date : '-';
                                        @endphp
                                        <td>{{ $createdDate }}</td>
                                        <td>
                                            <button type="button" data-target="#modal_edit" data-toggle="modal"
                                                class="btn btn-primary" data-id="{{ $data->id }}"
                                                data-distributor="{{ $data->distributor_id }}"
                                                data-depo="{{ $data->depo_id }}" data-month="{{ $month }}"
                                                data-year="{{ $year }}">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <form
                                                action="{{ route('target.destroy', ['distributor_id' => $data->distributor_id, 'depo_id' => $data->depo_id, 'hth_month' => $month, 'hth_year' => $year]) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this data?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="{{ $columnCount }}" class="text-center">Data Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if (!$distributorDepos->isEmpty())
                        <p class="d-inline-block">Showing {{ $distributorDepos->firstItem() }} to
                            {{ $distributorDepos->lastItem() }} of
                            {{ $distributorDepos->total() }} entries</p>
                    @endif
                    <hr class="new-section-xs">
                    <div class="pull-right">
                        <nav aria-label="Page navigation">
                            {{ $distributorDepos->appends(['perPage' => request()->get('perPage'), 'search' => request()->get('search'), 'month' => request()->get('month'), 'year' => request()->get('year')])->links('pagination::bootstrap-4') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Add target-->
    <div class="modal fade" id="modal_add" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal"
        aria-hidden="1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!--Modal header-->
                <div class="modal-header">
                    <h4 class="modal-title">Add Target HC</h4>
                </div>
                <form action="{{ route('target.store') }}" method="POST" enctype="multipart/form-data"
                    id="inputanForm">
                    @csrf
                    <input type="hidden" name="hth_month" value="{{ $month }}">
                    <input type="hidden" name="hth_year" value="{{ $year }}">

                    <!--Modal body-->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        Distributor <span class="text-danger">*</span></label>
                                    <select name="distributor_id" id="distributor_id" onchange="select_distributor"
                                        class="form-control" required>
                                        <option selected disabled>Pilih Distributor</option>
                                        @foreach ($distributor as $row)
                                            <option value="{{ $row->distributor_id }}">{{ $row->distributor_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        Depo <span class="text-danger">*</span></label>
                                    <select name="depo_id" id="depo_id" class="form-control" required>
                                        <Option selected disabled>Pilih Depo</Option>
                                        @foreach ($dataDistributorDepo as $row)
                                            <option value="{{ $row->depo->depo_id }}">{{ $row->depo->depo_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @foreach ($positions as $row)
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ $row->position_name }}<span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="{{ $row->position_id }}" class="form-control"
                                            required>
                                    </div>
                                </div>
                            @endforeach
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
    <div class="modal fade" id="modal_edit" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal"
        aria-hidden="1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Target HC</h4>
                </div>
                <form action="{{ route('target.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="hth_id" id="edit_hth_id">
                    <input type="hidden" name="hth_month" id="edit_month">
                    <input type="hidden" name="hth_year" id="edit_year">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Distributor <span class="text-danger">*</span></label>
                                    <select name="distributor_id" id="edit_distributor_id" class="form-control" required>
                                        <option selected disabled>Pilih Distributor</option>
                                        @foreach ($distributor as $row)
                                            <option value="{{ $row->distributor_id }}">{{ $row->distributor_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Depo <span class="text-danger">*</span></label>
                                    <select name="depo_id" id="edit_depo_id" class="form-control" required>
                                        <option selected disabled>Pilih Depo</option>
                                        @foreach ($dataDistributorDepo as $row)
                                            <option value="{{ $row->depo->depo_id }}">{{ $row->depo->depo_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @foreach ($positions as $row)
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ $row->position_name }}<span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="{{ $row->position_id }}" class="form-control"
                                            id="edit_position_{{ $row->position_id }}" required>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#distributor_id').on('change', function() {
                var distributor_id = $(this).val();

                // Clear the depo dropdown before making an AJAX request
                $('#depo_id').empty().append('<option selected disabled>Loading...</option>');

                // AJAX request to get depos by distributor_id
                $.ajax({
                    url: '/depos/' + distributor_id,
                    type: 'GET',
                    success: function(depos) {
                        $('#depo_id').empty().append(
                            '<option selected disabled>Pilih Depo</option>');
                        $.each(depos, function(index, depo) {
                            $('#depo_id').append('<option value="' + depo.depo.depo_id +
                                '">' + depo.depo.depo_name + '</option>');
                        });
                    },
                    error: function() {
                        alert('Gagal mengambil data depo');
                    }
                });
            });

            // edit modal
            $('#modal_edit').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var hthId = button.data('id'); // Extract info from data-* attributes

                // Update the modal's content
                var modal = $(this);
                modal.find('#edit_hth_id').val(hthId);

                // Update the form action URL
                modal.find('form').attr('action', "{{ route('target.update') }}");

                // Populate fields with data
                modal.find('#edit_distributor_id').val(button.data('distributor'));
                modal.find('#edit_depo_id').val(button.data('depo'));
                modal.find('#edit_month').val(button.data('month'));
                modal.find('#edit_year').val(button.data('year'));

                @foreach ($positions as $pos)
                    modal.find('#edit_position_{{ $pos->position_id }}').val(
                        '{{ $headcountTargets[$data->distributor_id . '-' . $data->depo_id]->firstWhere('position_id', $pos->position_id)->hth_value ?? '' }}'
                    );
                @endforeach
            });

        });
    </script>
@endsection
