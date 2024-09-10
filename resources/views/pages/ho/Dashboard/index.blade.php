@extends('layouts.master-ho')
@section('title', 'dashboard')
@section('dashboard', 'active-sub')
@section('content')
<div id="page-content">

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-main text-bold">Scoring All Depo</h3>
        </div>
        <div class="panel-body">

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
                <div id="table-dashboard_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="dt-buttons"> <button class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="table-dashboard" type="button"><span>Excel</span></button> <button class="dt-button buttons-collection buttons-page-length" tabindex="0" aria-controls="table-dashboard" type="button" aria-haspopup="true"><span>Show 10 rows</span><span class="dt-down-arrow">▼</span></button> </div>
                    <div id="table-dashboard_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="table-dashboard"></label></div>
                    <div id="table-dashboard_processing" class="dataTables_processing panel panel-default" style="display: none;">Processing...</div>
                    <table id="table-dashboard" class="table table-striped table-fixed dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="table-dashboard_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th rowspan="3" class="fixed sorting_disabled" colspan="1" style="width: 17px;">No</th>
                                <th rowspan="3" class="fixed sorting" tabindex="0" aria-controls="table-dashboard" colspan="1" style="width: 64px;">Distributor</th>
                                <th rowspan="3" class="fixed sorting" tabindex="0" aria-controls="table-dashboard" colspan="1" style="width: 31px;">Depo</th>
                                <th colspan="13" style="background: aliceblue;" rowspan="1">Sub Component</th>
                                <th colspan="13" style="background: antiquewhite;" rowspan="1">Sub Component # Weighted</th>
                                <th colspan="6" style="background: aquamarine;" rowspan="1">Main Component</th>
                                <th colspan="6" rowspan="1">Main Component # Weighted</th>
                                <th rowspan="3" class="sorting" tabindex="0" aria-controls="table-dashboard" colspan="1" style="width: 32px;">Score</th>
                            </tr>
                            <tr role="row">
                                <th rowspan="1" colspan="1">Coverage</th>
                                <th rowspan="1" colspan="1">HC</th>
                                <th rowspan="1" colspan="1">PaymentBAT</th>
                                <th rowspan="1" colspan="1">FFIS</th>
                                <th rowspan="1" colspan="1">Operation</th>
                                <th rowspan="1" colspan="1">Operation</th>
                                <th rowspan="1" colspan="1">Operation</th>
                                <th rowspan="1" colspan="1">Operation</th>
                                <th rowspan="1" colspan="1">Stock</th>
                                <th rowspan="1" colspan="1">Stock</th>
                                <th rowspan="1" colspan="1">Stock</th>
                                <th rowspan="1" colspan="1">Stock</th>
                                <th rowspan="1" colspan="1">Stock</th>
                                <th rowspan="1" colspan="1">Coverage</th>
                                <th rowspan="1" colspan="1">HC</th>
                                <th rowspan="1" colspan="1">PaymentBAT</th>
                                <th rowspan="1" colspan="1">FFIS</th>
                                <th rowspan="1" colspan="1">Operation</th>
                                <th rowspan="1" colspan="1">Operation</th>
                                <th rowspan="1" colspan="1">Operation</th>
                                <th rowspan="1" colspan="1">Operation</th>
                                <th rowspan="1" colspan="1">Stock</th>
                                <th rowspan="1" colspan="1">Stock</th>
                                <th rowspan="1" colspan="1">Stock</th>
                                <th rowspan="1" colspan="1">Stock</th>
                                <th rowspan="1" colspan="1">Stock</th>
                                <th rowspan="1" colspan="1">Coverage</th>
                                <th rowspan="1" colspan="1">HC</th>
                                <th rowspan="1" colspan="1">PaymentBAT</th>
                                <th rowspan="1" colspan="1">FFIS</th>
                                <th rowspan="1" colspan="1">Operation</th>
                                <th rowspan="1" colspan="1">Stock</th>
                                <th rowspan="1" colspan="1">Coverage</th>
                                <th rowspan="1" colspan="1">HC</th>
                                <th rowspan="1" colspan="1">PaymentBAT</th>
                                <th rowspan="1" colspan="1">FFIS</th>
                                <th rowspan="1" colspan="1">Operation</th>
                                <th rowspan="1" colspan="1">Stock</th>
                            </tr>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 54px;">Coverage</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 17px;">HC</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 75px;">PaymentBAT</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 24px;">FFIS</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 38px;">MOM</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 52px;">DailyOps</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 38px;">EHS</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 48px;">Training</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 62px;">StockLevel</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 67px;">StockCount</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 100px;">ProduckHandling</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 82px;">StockRotation</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 75px;">SellOutToWS</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 54px;">Coverage</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 17px;">HC</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 75px;">PaymentBAT</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 24px;">FFIS</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 38px;">MOM</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 52px;">DailyOps</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 38px;">EHS</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 48px;">Training</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 62px;">StockLevel</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 67px;">StockCount</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 100px;">ProduckHandling</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 82px;">StockRotation</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 75px;">SellOutToWS</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 54px;">Coverage</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 17px;">HC</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 75px;">PaymentBAT</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 24px;">FFIS</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 60px;">Operation</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 32px;">Stock</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 54px;">Coverage</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 17px;">HC</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 75px;">PaymentBAT</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 24px;">FFIS</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 60px;">Operation</th>
                                <th class="sorting" tabindex="0" aria-controls="table-dashboard" rowspan="1" colspan="1" style="width: 32px;">Stock</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <div class="dataTables_info" id="table-dashboard_info" role="status" aria-live="polite"></div>
                    <div class="dataTables_paginate paging_simple_numbers" id="table-dashboard_paginate"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection