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
						<div class="col-sm-2">
							<div class="form-group">
								<label class="col-sm-12 text-semibold">Status</label>
								<div class="col-sm-12">
									<select name="status" class="form-control" required="">
										@foreach ($statuses as $status)
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
								<label class="col-sm-12 text-semibold">
									Month - Year</label>
								<div class="col-sm-6">
									<select name="month" class="form-control" required="">
										@foreach ($months as $value)
											<option value="{{ $value->month_int }}" @if ($value->month_int == $monthnow)
											selected @endif>{{ $value->month_var }}
											</option>
										@endforeach

									</select>
								</div>
								<div class="col-sm-6">
									<select name="year" class="form-control" required="">
										<?= $yearnow = date('Y') ?>
										@for ($i = 2020; $i <= $yearnow; $i++)
											<option value="{{ $i }}" @if ($i == $yearnow) selected @endif>{{ $i }}</option>
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
							<div class="col-sm-6">
								<div class="dataTables_length" id="table-meeting_weekly_verify_asm_length">
									<label>Show
										<select name="table-meeting_weekly_verify_asm_length"
											aria-controls="table-meeting_weekly_verify_asm"
											class="form-control input-sm">
											<option value="20">20</option>
											<option value="30">30</option>
											<option value="50">50</option>
										</select> entries</label>
								</div>
							</div>
							<div class="col-sm-6" style="text-align: right;">
								<div id="table-meeting_weekly_verify_asm_filter" class="dataTables_filter">
									<label>Search:<input type="search" class="form-control input-sm" placeholder=""
											aria-controls="table-meeting_weekly_verify_asm"></label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<table id="table-meeting_weekly_verify_asm"
									class="table table-striped dataTable no-footer dtr-inline" cellspacing="0"
									width="100%" role="grid" aria-describedby="table-meeting_weekly_verify_asm_info"
									style="width: 100%;">
									<thead>
										<tr role="row">
											<th width="5%" class="sorting_disabled" rowspan="1" colspan="1"
												style="width: 23px;" aria-label="No">No</th>
											<th class="sorting_asc" tabindex="0"
												aria-controls="table-meeting_weekly_verify_asm" rowspan="1" colspan="1"
												style="width: 110px;" aria-sort="ascending"
												aria-label="Distributor: activate to sort column descending">
												Distributor</th>
											<th class="sorting" tabindex="0"
												aria-controls="table-meeting_weekly_verify_asm" rowspan="1" colspan="1"
												style="width: 62px;"
												aria-label="Depo: activate to sort column ascending">Depo</th>
											<th class="sorting" tabindex="0"
												aria-controls="table-meeting_weekly_verify_asm" rowspan="1" colspan="1"
												style="width: 55px;"
												aria-label="Year: activate to sort column ascending">Year</th>
											<th class="sorting" tabindex="0"
												aria-controls="table-meeting_weekly_verify_asm" rowspan="1" colspan="1"
												style="width: 73px;"
												aria-label="Month: activate to sort column ascending">Month</th>
											<th class="sorting" tabindex="0"
												aria-controls="table-meeting_weekly_verify_asm" rowspan="1" colspan="1"
												style="width: 123px;"
												aria-label="Week Period: activate to sort column ascending">Week
												Period</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 61px;"
												aria-label="Status">Status</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 8px;"
												aria-label=""></th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 8px;"
												aria-label=""></th>
										</tr>
									</thead>
									<tbody>
										@forelse($meetings as $key => $meeting)
											<tr class="odd">
												<td>{{ $key + 1 }}</td>
												<td>{{ $meeting->distributor ? $meeting->distributor->distributor_name : 'No Distributor' }}
												</td>
												<td>{{ $meeting->depo ? $meeting->depo->depo_name : 'No Depo' }}</td>
												<td>{{ $meeting->mw_year }}</td>
												<td>{{ $meeting->month ? $meeting->month->month_var : 'No Month' }}</td>
												<td>{{ $meeting->week ? $meeting->week->week_var : 'No Week' }}</td>
												<td>{{ $meeting->status ? $meeting->status->status_name : 'No Status' }}
												</td>
											</tr>
										@empty
											<tr>
												<td colspan="9">No data available in table</td>
											</tr>
										@endforelse
									</tbody>
								</table>
								<div id="table-meeting_weekly_verify_asm_processing"
									class="dataTables_processing panel panel-default" style="display: none;">
									Processing...</div>
							</div>
						</div>
						<div class="row d-flex align-items-center justify-content-between">
							<div class="col-sm-5">
								<div class="dataTables_info" id="table-meeting_weekly_verify_asm_info" role="status"
									aria-live="polite">
									Showing 0 to 0 of 0 entries
								</div>
							</div>
							<div class="col-sm-7" style="text-align: right;">
								<div class="dataTables_paginate paging_simple_numbers"
									id="table-meeting_weekly_verify_asm_paginate">
									<ul class="pagination" style="margin: 0;">
										<li class="paginate_button previous disabled"
											id="table-meeting_weekly_verify_asm_previous">
											<a href="#" aria-controls="table-meeting_weekly_verify_asm" data-dt-idx="0"
												tabindex="0">Previous</a>
										</li>
										<li class="paginate_button next disabled"
											id="table-meeting_weekly_verify_asm_next">
											<a href="#" aria-controls="table-meeting_weekly_verify_asm" data-dt-idx="1"
												tabindex="0">Next</a>
										</li>
									</ul>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Data Tables CSS -->
<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Data Tables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
	$(document).ready(function () {
		$('#table-meeting_weekly_verify_asm').DataTable({
			"pageLength": 20,  // Set jumlah entri yang ditampilkan (default 10)
			"lengthMenu": [20, 30, 50],  // Pilihan entries yang tersedia
			"searching": true,  // Mengaktifkan fitur pencarian
			"ordering": true,  // Mengaktifkan pengurutan kolom
			"paging": true,  // Mengaktifkan pagination
			"info": true,  // Menampilkan informasi "Showing x to y of z entries"
			"language": {
				"paginate": {
					"previous": "Previous",
					"next": "Next"
				}
			}
		});
	});

</script>
@endsection