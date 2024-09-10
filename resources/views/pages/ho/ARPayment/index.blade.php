@extends('layouts.master-ho')
@section('title', 'ar payment')
@section('ar payment', 'active-sub')
@section('content')
<div id="page-content">


	<div class="row">
		<div class="col-xs-12">

			<div class="panel">
				<div class="panel-body">


					<h4 class="text-main text-bold mar-no">AR Payment</h4>
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
						<div id="table_payment_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
							<div class="dt-buttons"> <button class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="table_payment" type="button"><span>Excel</span></button> <button class="dt-button buttons-collection buttons-page-length" tabindex="0" aria-controls="table_payment" type="button" aria-haspopup="true"><span>Show 10 rows</span><span class="dt-down-arrow">▼</span></button> </div>
							<div id="table_payment_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="table_payment"></label></div>
							<div id="table_payment_processing" class="dataTables_processing panel panel-default" style="display: none;">Processing...</div>
							<table id="table_payment" class="table table-striped dataTable no-footer dtr-inline dtfc-has-left" cellspacing="0" width="100%" role="grid" aria-describedby="table_payment_info" style="width: 100%;">
								<thead>
									<tr role="row">
										<th class="sorting_disabled dtfc-fixed-left" rowspan="1" colspan="1" style="width: 47px; left: 0px; position: sticky;" aria-label="No">No</th>
										<th class="sorting dtfc-fixed-left" tabindex="0" aria-controls="table_payment" rowspan="1" colspan="1" style="width: 157px; left: 63px; position: sticky;" aria-label="Distributor: activate to sort column ascending">Distributor</th>
										<th class="sorting_asc dtfc-fixed-left" tabindex="0" aria-controls="table_payment" rowspan="1" colspan="1" style="width: 176px; left: 258px; position: sticky;" aria-sort="ascending" aria-label="Total Invoice: activate to sort column descending">Total Invoice</th>
										<th class="sorting" tabindex="0" aria-controls="table_payment" rowspan="1" colspan="1" style="width: 131px;" aria-label="Overdue: activate to sort column ascending">Overdue</th>
										<th class="sorting" tabindex="0" aria-controls="table_payment" rowspan="1" colspan="1" style="width: 122px;" aria-label="Puntual: activate to sort column ascending">Puntual</th>
										<th class="sorting" tabindex="0" aria-controls="table_payment" rowspan="1" colspan="1" style="width: 96px;" aria-label="Score: activate to sort column ascending">Score</th>
										<th rowspan="1" colspan="1"></th>
									</tr>
								</thead>
								<tbody>
									<tr class="odd">
										<td valign="top" colspan="6" class="dataTables_empty dtfc-fixed-left" style="left: 0px; position: sticky;">No data available in table</td>
									</tr>
								</tbody>
							</table>
							<div class="dataTables_info" id="table_payment_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
							<div class="dataTables_paginate paging_simple_numbers" id="table_payment_paginate">
								<ul class="pagination">
									<li class="paginate_button previous disabled" id="table_payment_previous"><a href="#" aria-controls="table_payment" data-dt-idx="0" tabindex="0">Previous</a></li>
									<li class="paginate_button next disabled" id="table_payment_next"><a href="#" aria-controls="table_payment" data-dt-idx="1" tabindex="0">Next</a></li>
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