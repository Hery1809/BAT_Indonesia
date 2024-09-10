@extends('layouts.master')
@section('title', 'Master Parameter')
@section('MasterParameter', 'active-sub active')
@section('StockLevelPolicy', 'active-sub')
@section('content')
    @include('layouts.alert')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-body">
                    <h4 class="text-main text-bold mar-no">Stock Level Policy</h4>
                    <p>&nbsp;</p>
                    <div class="table-responsive">
                        <table id="table-slp" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Policy</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slp as $items)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $items->slp_policy }}</td>
                                        <td>
                                            <button type="button" data-target="#modal_edit{{ $items->slp_id }}"
                                                data-toggle="modal" class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($slp as $data)
        <div class="modal fade" id="modal_edit{{ $data->slp_id }}" role="dialog" tabindex="-1"
            aria-labelledby="demo-default-modal" aria-hidden="1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Stock Level Policy</h4>
                    </div>
                    <form action="{{ route('stock-level-policy.update', $data->slp_id) }}" class="form-horizontal"
                        method="POST" enctype="multipart/form-data" id="inputanForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="slp_policy">
                                    Policy <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="number" id="slp_policy" name="slp_policy" placeholder="depo"
                                        class="form-control" value="{{ $data->slp_policy }}" required>
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
