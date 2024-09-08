@extends('layouts.master')
@section('title', 'Calendar')
@section('MasterData', 'active-sub active')
@section('Calendar', 'active-sub')
@section('content')
    @include('layouts.alert')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <form method="POST" action="{{ route('update.calendar') }}" class="form-horizontal action">
                    @csrf
                    <div class="panel-body">
                        <div class="pull-right">
                            <button type="button" data-target="#modal_filter" data-toggle="modal" class="btn btn-dark">
                                <i class="fa fa-filter"></i> FILTER
                            </button>
                            <button type="submit" class="btn btn-primary submit">UPDATE</button>
                        </div>

                        <h4 class="text-main text-bold mar-no">Calendar</h4>
                        <p>&nbsp;</p>

                        <div class="row">
                            <div class="col-sm-3">
                                <p class="text-main text-bold mar-no">Year</p>
                                <p class="form-control-static">{{ $selectedYear }}</p>
                            </div>
                        </div>

                        <div id="errorMsg"></div>
                        <div class="table-responsive">
                            <table id="table_calendar" class="table table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Month</th>
                                        <th width="8%">Start Week</th>
                                        <th width="8%">End Week</th>
                                        <th width="8%">Number of weeks</th>
                                        <th width="18%">Start Date</th>
                                        <th width="18%">End Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($calendar as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->month->month_var ?? 'Unknown' }}</td>
                                            <td>
                                                <input type="hidden" name="calendar_id[]" value="{{ $item->calendar_id }}">
                                                <input type="text" name="c_start_week[]" class="form-control"
                                                    value="{{ $item->c_start_week }}"
                                                    onkeypress="return checkOnlyDigits(event)" required>
                                            </td>
                                            <td>
                                                <input type="text" name="c_end_week[]" class="form-control"
                                                    value="{{ $item->c_end_week }}"
                                                    onkeypress="return checkOnlyDigits(event)" required>
                                            </td>
                                            <td>
                                                <input type="text" name="c_number_week[]" class="form-control"
                                                    onkeypress="return checkOnlyDigits(event)"
                                                    value="{{ $item->c_number_week }}" required>
                                            </td>
                                            <td>
                                                <div id="demo-dp-txtinput">
                                                    <input type="text" name="c_start_date[]" placeholder="Date"
                                                        class="form-control" value="{{ $item->c_start_date }}" required>
                                                </div>
                                            </td>
                                            <td>
                                                <div id="demo-dp-txtinput">
                                                    <input type="text" name="c_end_date[]" placeholder="Date"
                                                        class="form-control" value="{{ $item->c_end_date }}" required>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Filter Year -->
    <div class="modal fade" id="modal_filter" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Filter</h4>
                </div>
                <form method="GET" action="{{ url()->current() }}" class="form-horizontal">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Year <span class="text-danger">*</span></label>
                            <div class="col-sm-3">
                                <select name="year" class="form-control" required>
                                    @foreach ($years as $year)
                                        <option value="{{ $year->c_year }}"
                                            {{ $selectedYear == $year->c_year ? 'selected' : '' }}>
                                            {{ $year->c_year }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
