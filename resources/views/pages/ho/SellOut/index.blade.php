@extends('layouts.master-ho')
@section('title', 'sell out')
@section('sell out', 'active-sub')
@section('content')
<div id="page-content">


	<div class="row">
		<div class="col-xs-12">

			<div class="panel">
				<div class="panel-body">

					<h4 class="text-main text-bold mar-no">Sell Out to WS</h4>
					<p>&nbsp;</p>

					<form class="form-inline" method="GET" action="">
						<div class="form-group">
							<select name="month" class="form-control" required="">
								<option value="01">January</option>
								<option value="02">February</option>
								<option value="03">March</option>
								<option value="04">April</option>
								<option value="05">May</option>
								<option value="06">June</option>
								<option value="07">July</option>
								<option value="08">August</option>
								<option value="09" selected="">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
						</div>
						<div class="form-group">
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
						<button class="btn btn-dark" type="submit"><i class="fa fa-filter"></i> FILTER</button>
					</form>

					<hr>

					<div class="table-responsive">
						<div id="table_sell_out_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
							<div class="dt-buttons"> <button class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="table_sell_out" type="button"><span>Excel</span></button> <button class="dt-button buttons-collection buttons-page-length" tabindex="0" aria-controls="table_sell_out" type="button" aria-haspopup="true"><span>Show 10 rows</span><span class="dt-down-arrow">▼</span></button> </div>
							<div id="table_sell_out_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="table_sell_out"></label></div>
							<div id="table_sell_out_processing" class="dataTables_processing panel panel-default" style="display: none;">Processing...</div>
							<table id="table_sell_out" class="table table-striped dataTable no-footer dtr-inline dtfc-has-left" cellspacing="0" width="100%" role="grid" aria-describedby="table_sell_out_info" style="width: 100%;">
								<thead>
									<tr role="row">
										<th class="sorting_disabled dtfc-fixed-left" rowspan="1" colspan="1" style="width: 39px; left: 0px; position: sticky;" aria-label="No">No</th>
										<th class="sorting dtfc-fixed-left" tabindex="0" aria-controls="table_sell_out" rowspan="1" colspan="1" style="width: 132px; left: 55px; position: sticky;" aria-label="Distributor: activate to sort column ascending">Distributor</th>
										<th class="sorting_asc dtfc-fixed-left" tabindex="0" aria-controls="table_sell_out" rowspan="1" colspan="1" style="width: 77px; left: 225px; position: sticky;" aria-sort="ascending" aria-label="Depo: activate to sort column descending">Depo</th>
										<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 72px;" aria-label="Status">Status</th>
										<th class="sorting" tabindex="0" aria-controls="table_sell_out" rowspan="1" colspan="1" style="width: 110px;" aria-label="Total WS: activate to sort column ascending">Total WS</th>
										<th class="sorting" tabindex="0" aria-controls="table_sell_out" rowspan="1" colspan="1" style="width: 73px;" aria-label="Over: activate to sort column ascending">Over</th>
										<th class="sorting" tabindex="0" aria-controls="table_sell_out" rowspan="1" colspan="1" style="width: 99px;" aria-label="Comply: activate to sort column ascending">Comply</th>
										<th class="sorting" tabindex="0" aria-controls="table_sell_out" rowspan="1" colspan="1" style="width: 79px;" aria-label="Score: activate to sort column ascending">Score</th>
										<th rowspan="1" colspan="1"></th>
									</tr>
								</thead>
								<tbody>
									<tr class="odd">
										<td valign="top" colspan="8" class="dataTables_empty dtfc-fixed-left" style="left: 0px; position: sticky;">No data available in table</td>
									</tr>
								</tbody>
							</table>
							<div class="dataTables_info" id="table_sell_out_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
							<div class="dataTables_paginate paging_simple_numbers" id="table_sell_out_paginate">
								<ul class="pagination">
									<li class="paginate_button previous disabled" id="table_sell_out_previous"><a href="#" aria-controls="table_sell_out" data-dt-idx="0" tabindex="0">Previous</a></li>
									<li class="paginate_button next disabled" id="table_sell_out_next"><a href="#" aria-controls="table_sell_out" data-dt-idx="1" tabindex="0">Next</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!--===================================================-->
					<!--End Data Table-->
				</div>

			</div>


		</div>
	</div>

</div>
@endsection