@extends('layouts.master-asm')
@section('title', 'sellouttows')
@section('sellouttows', 'active-sub')
@section('content')

	<div class="row">
		<div class="col-xs-12">
			<div class="panel">
				<!--Data Table-->
				<!--===================================================-->
				<div class="panel-body">

					<h4 class="text-main text-bold mar-no">Sell Out to WS</h4>
					<p>&nbsp;</p>
					<div class="row">
						<form class="form-horizontal" method="GET">

							<div class="col-sm-2">
								<div class="form-group">
									<label class="col-sm-12 text-semibold">
										Status</label>
									<div class="col-sm-12">
										<select name="status" class="form-control" required="">
											<option value="4" selected="">all</option>
											<option value="3">rejected</option>
											<option value="2">verified</option>
											<option value="1">to review</option>
										</select>
									</div>
								</div>
							</div>

							<div class="col-sm-2">
								<div class="form-group">
									<label class="col-sm-12 text-semibold">
										Year</label>
									<div class="col-sm-12">
										<select name="year" class="form-control" required="">
											<option value="2024" selected="">2024</option>
											<option value="2023">2023</option>
											<option value="2022">2022</option>
											<option value="2021">2021</option>
											<option value="2020">2020</option>
											<option value="2019">2019</option>
											<option value="2018">2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
											<option value="2012">2012</option>
											<option value="2011">2011</option>
											<option value="2010">2010</option>
											<option value="2009">2009</option>
											<option value="2008">2008</option>
											<option value="2007">2007</option>
											<option value="2006">2006</option>
											<option value="2005">2005</option>
											<option value="2004">2004</option>
											<option value="2003">2003</option>
											<option value="2002">2002</option>
											<option value="2001">2001</option>
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
						<div id="table-sell_out_verify_asm_wrapper"
							class="dataTables_wrapper form-inline dt-bootstrap no-footer">
							<div class="row">
								<div class="col-sm-6">
									<div class="dataTables_length" id="table-sell_out_verify_asm_length"><label>Show
											<select name="table-sell_out_verify_asm_length"
												aria-controls="table-sell_out_verify_asm" class="form-control input-sm">
												<option value="20">20</option>
												<option value="30">30</option>
												<option value="50">50</option>
											</select> entries</label></div>
								</div>
								<div class="col-sm-6">
									<div id="table-sell_out_verify_asm_filter" class="dataTables_filter">
										<label>Search:<input type="search" class="form-control input-sm" placeholder=""
												aria-controls="table-sell_out_verify_asm"></label></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<table id="table-sell_out_verify_asm"
										class="table table-striped dataTable no-footer dtr-inline" cellspacing="0"
										width="100%" role="grid" aria-describedby="table-sell_out_verify_asm_info"
										style="width: 100%;">
										<thead>
											<tr role="row">
												<th width="5%" class="sorting_disabled" rowspan="1" colspan="1"
													style="width: 17px;" aria-label="No">No</th>
												<th class="sorting_asc" tabindex="0"
													aria-controls="table-sell_out_verify_asm" rowspan="1" colspan="1"
													style="width: 140px;" aria-sort="ascending"
													aria-label="Distributor: activate to sort column descending">
													Distributor</th>
												<th class="sorting" tabindex="0"
													aria-controls="table-sell_out_verify_asm" rowspan="1" colspan="1"
													style="width: 82px;"
													aria-label="Depo: activate to sort column ascending">Depo</th>
												<th class="sorting" tabindex="0"
													aria-controls="table-sell_out_verify_asm" rowspan="1" colspan="1"
													style="width: 74px;"
													aria-label="Year: activate to sort column ascending">Year</th>
												<th class="sorting" tabindex="0"
													aria-controls="table-sell_out_verify_asm" rowspan="1" colspan="1"
													style="width: 96px;"
													aria-label="Month: activate to sort column ascending">Month</th>
												<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;"
													aria-label="Status">Status</th>
												<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;"
													aria-label=""></th>
											</tr>
										</thead>
										<tbody>
										<tr>
                                                <td colspan="9" style="text-align: center; vertical-align: middle;">No data available in table</td>
                                            </tr>
										</tbody>
									</table>
									<div id="table-sell_out_verify_asm_processing"
										class="dataTables_processing panel panel-default" style="display: none;">
										Processing...</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-5">
									<div class="dataTables_info" id="table-sell_out_verify_asm_info" role="status"
										aria-live="polite">Showing 0 to 0 of 0 entries</div>
								</div>
								<div class="col-sm-7">
									<div class="dataTables_paginate paging_simple_numbers"
										id="table-sell_out_verify_asm_paginate">
										<ul class="pagination">
											<li class="paginate_button previous disabled"
												id="table-sell_out_verify_asm_previous"><a href="#"
													aria-controls="table-sell_out_verify_asm" data-dt-idx="0"
													tabindex="0">Previous</a></li>
											<li class="paginate_button next disabled"
												id="table-sell_out_verify_asm_next"><a href="#"
													aria-controls="table-sell_out_verify_asm" data-dt-idx="1"
													tabindex="0">Next</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--===================================================-->
				<!--End Data Table-->

			</div>
		</div>
	</div>
@endsection