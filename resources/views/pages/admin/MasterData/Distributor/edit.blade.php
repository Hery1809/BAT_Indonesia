@extends('layouts.master')
@section('title', 'Edit Distributor')
@section('MasterData', 'active-sub active')
@section('Distributor', 'active-sub')
@section('content')
    @include('layouts.alert')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-main text-bold">Edit Distributor</h3>
        </div>
        <form action="{{ route('distributor.update', $distributor->distributor_id) }}" class="form-horizontal" method="POST"
            enctype="multipart/form-data" id="inputanForm">
            @csrf
            @method('PUT')
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="distributor_name">
                        Distributor <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="text" id="distributor_name" class="form-control" name="distributor_name"
                            placeholder="Distributor" value="{{ $distributor->distributor_name }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="depo_id">Depo <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <select id="depo_id" name="depo_id[]" class="form-control" multiple required>
                            @foreach ($depo as $row)
                                <option value="{{ $row->depo_id }}"
                                    {{ in_array($row->depo_id, $associatedDepoIds) ? 'selected' : '' }}>
                                    {{ $row->depo_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="panel-footer text-right">
                <a href="{{ route('distributor.index') }}" class="btn btn-default submit">BACK</a>
                <button type="submit" id="submit" class="btn btn-primary submit">UPDATE</button>
            </div>
        </form>
    </div>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <!-- Include jQuery and Select2 JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Initialize Select2 with width set to 100%
            $('#depo_id').select2({
                placeholder: "Pilih Depo",
                allowClear: true,
                width: '100%' // Tambahkan width 100% agar Select2 menyesuaikan dengan form
            });

            // Inisialisasi kembali saat modal dibuka
            $('#modal_add').on('shown.bs.modal', function() {
                $('#depo_id').select2({
                    width: '100%' // Pastikan width diatur 100% ketika modal dibuka
                });
            });
        });
    </script>
@endsection
