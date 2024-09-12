@extends('layouts.master-asm')
@section('title', 'weeklymeeting')
@section('weeklymeeting', 'active-sub')
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="panel">
			<!--Data Table-->
			<!--===================================================-->
			<div class="panel-body">
				<h4 class="text-main text-bold mar-no">Reguler Meeting</h4>
				<p>&nbsp;</p>

				<div class="row">
					<form class="form-horizontal" method="GET">
						<div class="row">
							<form class="form-horizontal" method="GET">
								<div class="col-sm-2">
									<div class="form-group">
										<label class="col-sm-12 text-semibold">Status</label>
										<div class="col-sm-12">
											<select name="status" class="form-control" required="">
												@foreach ($statuses->sortByDesc('status_id') as $status)
													<option value="{{ $status->status_id }}" @if (request('status') == $status->status_id) selected @endif>
														{{ $status->status_name }}
													</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>

								<div class="col-sm-3">
									<div class="form-group">
										<label class="col-sm-12 text-semibold">Month - Year</label>
										<div class="col-sm-6">
											<select name="month" class="form-control" required="">
												@foreach ($months as $value)
													<option value="{{ $value->month_int }}" @if (request('month') == $value->month_int) selected @endif>
														{{ $value->month_var }}
													</option>
												@endforeach
											</select>
										</div>
										<div class="col-sm-6">
											<select name="year" class="form-control" required="">
												<?php $yearnow = date('Y') ?>
												@for ($i = 2020; $i <= $yearnow; $i++)
													<option value="{{ $i }}" @if (request('year') == $i) selected @endif>
														{{ $i }}
													</option>
												@endfor
											</select>
										</div>
									</div>
								</div>

								<div class="col-sm-3">
									<div class="form-group">
										<label class="col-sm-12 text-semibold">&nbsp;</label>
										<div class="col-sm-12">
											<button type="submit" class="btn btn-primary submit">FILTER</button>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="table-responsive">
							<div id="table-meeting_weekly_verify_asm_wrapper"
								class="dataTables_wrapper form-inline dt-bootstrap no-footer">
								<div class="row">
									<div class="col-sm-6 table-toolbar-left">
										<form method="GET" action="{{ route('weekly.meeting.asm.index') }}">
											<label for="perPage">Show:</label>
											<select id="perPage" name="perPage" class="form-control"
												onchange="this.form.submit()">
												<option value="5" {{ request('perPage', 10) == '5' ? 'selected' : '' }}>5
												</option>
												<option value="10" {{ request('perPage', 10) == '10' ? 'selected' : '' }}>
													10</option>
												<option value="25" {{ request('perPage', 10) == '25' ? 'selected' : '' }}>
													25</option>
												<option value="50" {{ request('perPage', 10) == '50' ? 'selected' : '' }}>
													50</option>
												<option value="100" {{ request('perPage', 10) == '100' ? 'selected' : '' }}>100</option>

											</select>

											<input type="hidden" name="search" value="{{ $search }}">
											<input type="hidden" name="page" value="{{ request('page', 1) }}">
											<input type="hidden" name="month" value="{{ request('month') }}">
											<input type="hidden" name="year" value="{{ request('year') }}">
											<input type="hidden" name="status" value="{{ request('status') }}">
										</form>
									</div>
									<div class="col-sm-6 table-toolbar-right">
										<form method="GET" action="{{ route('weekly.meeting.asm.index') }}"
											class="form-inline">
											<input type="text" name="search" class="form-control mr-2"
												placeholder="Search..." value="{{ $search }}">
											<input type="hidden" name="page" value="1">
											<input type="hidden" name="perPage" value="{{ request('perPage', 10) }}">
											<input type="hidden" name="month" value="{{ request('month') }}">
											<input type="hidden" name="year" value="{{ request('year') }}">
											<input type="hidden" name="status" value="{{ request('status') }}">
											<button type="submit" class="btn btn-success">Search</button>
										</form>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-12">
										<table id="table-meeting_weekly_verify_asm"
											class="table table-striped dataTable no-footer dtr-inline" cellspacing="0"
											width="100%" role="grid"
											aria-describedby="table-meeting_weekly_verify_asm_info"
											style="width: 100%;">
											<thead>
												<tr role="row">
													<th width="5%" class="sorting_disabled" rowspan="1" colspan="1"
														style="width: 23px;" aria-label="No">No</th>
													<th class="sorting_asc" tabindex="0"
														aria-controls="table-meeting_weekly_verify_asm" rowspan="1"
														colspan="1" style="width: 110px;" aria-sort="ascending"
														aria-label="Distributor: activate to sort column descending">
														Distributor</th>
													<th class="sorting" tabindex="0"
														aria-controls="table-meeting_weekly_verify_asm" rowspan="1"
														colspan="1" style="width: 62px;"
														aria-label="Depo: activate to sort column ascending">Depo</th>
													<th class="sorting" tabindex="0"
														aria-controls="table-meeting_weekly_verify_asm" rowspan="1"
														colspan="1" style="width: 55px;"
														aria-label="Year: activate to sort column ascending">Year</th>
													<th class="sorting" tabindex="0"
														aria-controls="table-meeting_weekly_verify_asm" rowspan="1"
														colspan="1" style="width: 73px;"
														aria-label="Month: activate to sort column ascending">Month</th>
													<th class="sorting" tabindex="0"
														aria-controls="table-meeting_weekly_verify_asm" rowspan="1"
														colspan="1" style="width: 123px;"
														aria-label="Week Period: activate to sort column ascending">Week
														Period</th>
													<th class="sorting_disabled" rowspan="1" colspan="1"
														style="width: 61px;" aria-label="Status">Status</th>
												</tr>
											</thead>
											<tbody>
												@php
													$currentPage = $meetings->currentPage();
													$perPage = $meetings->perPage();
													$startIndex = ($currentPage - 1) * $perPage + 1;
												@endphp
												@forelse($meetings as $key => $meeting)
													<tr class="odd">
														<td>{{ $startIndex + $key }}</td>
														<td>{{ $meeting->distributor ? $meeting->distributor->distributor_name : 'No Distributor' }}
														</td>
														<td>{{ $meeting->depo ? $meeting->depo->depo_name : 'No Depo' }}
														</td>
														<td>{{ $meeting->mw_year }}</td>
														<td>{{ $meeting->month ? $meeting->month->month_var : 'No Month' }}
														</td>
														<td>{{ $meeting->week ? $meeting->week->week_var : 'No Week' }}</td>
														<td>{{ $meeting->status ? $meeting->status->status_name : 'No Status' }}
														</td>
													</tr>
												@empty
													<tr>
														<td colspan="9" style="text-align: center; vertical-align: middle;">
															No data available in table
														</td>
													</tr>
												@endforelse
											</tbody>
										</table>
										<div id="table-meeting_weekly_verify_asm_processing"
											class="dataTables_processing panel panel-default" style="display: none;">
											Processing...</div>
									</div>
								</div>

								<!-- Tampilkan jumlah data yang ditampilkan -->
								@if (!$meetings->isEmpty())
									<p class="d-inline-block">
										Showing {{ $meetings->firstItem() }} to {{ $meetings->lastItem() }} of
										{{ $meetings->total() }} entries
									</p>
								@endif
								<hr class="new-section-xs">

								<div class="pull-right">
									<nav aria-label="Page navigation">
										<ul class="pagination">
											{{-- Previous Page Link --}}
											@if ($meetings->onFirstPage())
												<li class="page-item disabled">
													<a class="page-link" href="#" tabindex="-1">Previous</a>
												</li>
											@else
												<li class="page-item">
													<a class="page-link"
														href="{{ $meetings->appends(request()->except('page'))->previousPageUrl() }}"
														rel="prev">Previous</a>
												</li>
											@endif
											{{-- Page Number Links --}}
											@php
												$currentPage = $meetings->currentPage();
												$lastPage = $meetings->lastPage();
												$startPage = max(1, $currentPage - 2);
												$endPage = min($lastPage, $currentPage + 2); 
											@endphp

											@for ($page = $startPage; $page <= $endPage; $page++)
												@if ($page == $currentPage)
													<li class="page-item active">
														<a class="page-link" href="#">{{ $page }}</a>
													</li>
												@else
													<li class="page-item">
														<a class="page-link"
															href="{{ $meetings->appends(request()->except('page'))->url($page) }}">{{ $page }}</a>
													</li>
												@endif
											@endfor

											{{-- Next Page Link --}}
											@if ($meetings->hasMorePages())
												<li class="page-item">
													<a class="page-link"
														href="{{ $meetings->appends(request()->except('page'))->nextPageUrl() }}"
														rel="next">Next</a>
												</li>
											@else
												<li class="page-item disabled">
													<a class="page-link" href="#" tabindex="-1">Next</a>
												</li>
											@endif
										</ul>
									</nav>
								</div>

							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection