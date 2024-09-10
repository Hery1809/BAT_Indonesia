@extends('layouts.master-ho')
@section('title', 'weeklymeeting')
@section('weeklymeeting', 'active-sub')
@section('content')
<div class="tab-base">

    <!--Nav Tabs-->
    <ul class="nav nav-tabs">
        <li class="active">
            <a data-toggle="tab" href="#demo-lft-tab-1">Activity</a>
        </li>
        <li>
            <a data-toggle="tab" href="#demo-lft-tab-2">Report</a>
        </li>
    </ul>

    <!--Tabs Content-->
    <div class="tab-content">

        <div id="demo-lft-tab-1" class="tab-pane fade  active in">


            <h4 class="text-main text-bold mar-no">Reguler Meeting</h4>
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
                <div id="table-meeting_weekly_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="dt-buttons"> <button class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="table-meeting_weekly" type="button"><span>Excel</span></button> <button class="dt-button buttons-collection buttons-page-length" tabindex="0" aria-controls="table-meeting_weekly" type="button" aria-haspopup="true"><span>Show 10 rows</span><span class="dt-down-arrow">▼</span></button> </div>
                    <div id="table-meeting_weekly_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="table-meeting_weekly"></label></div>
                    <div id="table-meeting_weekly_processing" class="dataTables_processing panel panel-default" style="display: none;">Processing...</div>
                    <table id="table-meeting_weekly" class="table table-striped dataTable no-footer dtfc-has-left" cellspacing="0" width="100%" role="grid" aria-describedby="table-meeting_weekly_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting_disabled dtfc-fixed-left" rowspan="1" colspan="1" style="width: 17px; left: 0px; position: sticky;" aria-label="No">No</th>
                                <th class="sorting dtfc-fixed-left" tabindex="0" aria-controls="table-meeting_weekly" rowspan="1" colspan="1" style="width: 64px; left: 32.7292px; position: sticky;" aria-label="Distributor: activate to sort column ascending">Distributor</th>
                                <th class="sorting_asc dtfc-fixed-left" tabindex="0" aria-controls="table-meeting_weekly" rowspan="1" colspan="1" style="width: 65px; left: 134.333px; position: sticky;" aria-sort="ascending" aria-label="Depo: activate to sort column descending">Depo</th>
                                <th width="12%" class="sorting_disabled" rowspan="1" colspan="1" style="width: 140px;" aria-label="W1">W1</th>
                                <th width="12%" class="sorting_disabled" rowspan="1" colspan="1" style="width: 140px;" aria-label="W2">W2</th>
                                <th width="12%" class="sorting_disabled" rowspan="1" colspan="1" style="width: 140px;" aria-label="W3">W3</th>
                                <th width="12%" class="sorting_disabled" rowspan="1" colspan="1" style="width: 140px;" aria-label="W4">W4</th>
                                <th width="12%" class="sorting_disabled" rowspan="1" colspan="1" style="width: 140px;" aria-label="W5">W5</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr role="row" class="odd">
                                <td class="dtfc-fixed-left" style="left: 0px; position: sticky;">1</td>
                                <td class="dtfc-fixed-left" style="left: 32.7292px; position: sticky;">FWI</td>
                                <td class="sorting_1 dtfc-fixed-left" style="left: 134.333px; position: sticky;">ACEH</td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                            </tr>
                            <tr role="row" class="even">
                                <td class="dtfc-fixed-left" style="left: 0px; position: sticky;">2</td>
                                <td class="dtfc-fixed-left" style="left: 32.7292px; position: sticky;">Gunawan</td>
                                <td class="sorting_1 dtfc-fixed-left" style="left: 134.333px; position: sticky;">ACEH</td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td class="dtfc-fixed-left" style="left: 0px; position: sticky;">3</td>
                                <td class="dtfc-fixed-left" style="left: 32.7292px; position: sticky;">WOI</td>
                                <td class="sorting_1 dtfc-fixed-left" style="left: 134.333px; position: sticky;">AIR MOLEK</td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                            </tr>
                            <tr role="row" class="even">
                                <td class="dtfc-fixed-left" style="left: 0px; position: sticky;">4</td>
                                <td class="dtfc-fixed-left" style="left: 32.7292px; position: sticky;">SDU</td>
                                <td class="sorting_1 dtfc-fixed-left" style="left: 134.333px; position: sticky;">AREA BAGAN</td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td class="dtfc-fixed-left" style="left: 0px; position: sticky;">5</td>
                                <td class="dtfc-fixed-left" style="left: 32.7292px; position: sticky;">ERATEL</td>
                                <td class="sorting_1 dtfc-fixed-left" style="left: 134.333px; position: sticky;">BALI</td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                            </tr>
                            <tr role="row" class="even">
                                <td class="dtfc-fixed-left" style="left: 0px; position: sticky;">6</td>
                                <td class="dtfc-fixed-left" style="left: 32.7292px; position: sticky;">ERATEL</td>
                                <td class="sorting_1 dtfc-fixed-left" style="left: 134.333px; position: sticky;">BANDUNG</td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td class="dtfc-fixed-left" style="left: 0px; position: sticky;">7</td>
                                <td class="dtfc-fixed-left" style="left: 32.7292px; position: sticky;">ERATEL</td>
                                <td class="sorting_1 dtfc-fixed-left" style="left: 134.333px; position: sticky;">BANJARMASIN</td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                            </tr>
                            <tr role="row" class="even">
                                <td class="dtfc-fixed-left" style="left: 0px; position: sticky;">8</td>
                                <td class="dtfc-fixed-left" style="left: 32.7292px; position: sticky;">ERATEL</td>
                                <td class="sorting_1 dtfc-fixed-left" style="left: 134.333px; position: sticky;">BANYUWANGI</td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td class="dtfc-fixed-left" style="left: 0px; position: sticky;">9</td>
                                <td class="dtfc-fixed-left" style="left: 32.7292px; position: sticky;">STARTMARA</td>
                                <td class="sorting_1 dtfc-fixed-left" style="left: 134.333px; position: sticky;">BATAM</td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                            </tr>
                            <tr role="row" class="even">
                                <td class="dtfc-fixed-left" style="left: 0px; position: sticky;">10</td>
                                <td class="dtfc-fixed-left" style="left: 32.7292px; position: sticky;">ERATEL</td>
                                <td class="sorting_1 dtfc-fixed-left" style="left: 134.333px; position: sticky;">BEKASI</td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                                <td><button class="btn btn-default submit" title="Status">not started</button> </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="dataTables_info" id="table-meeting_weekly_info" role="status" aria-live="polite">Showing 1 to 10 of 44 entries</div>
                    <div class="dataTables_paginate paging_simple_numbers" id="table-meeting_weekly_paginate">
                        <ul class="pagination">
                            <li class="paginate_button previous disabled" id="table-meeting_weekly_previous"><a href="#" aria-controls="table-meeting_weekly" data-dt-idx="0" tabindex="0">Previous</a></li>
                            <li class="paginate_button active"><a href="#" aria-controls="table-meeting_weekly" data-dt-idx="1" tabindex="0">1</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="table-meeting_weekly" data-dt-idx="2" tabindex="0">2</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="table-meeting_weekly" data-dt-idx="3" tabindex="0">3</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="table-meeting_weekly" data-dt-idx="4" tabindex="0">4</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="table-meeting_weekly" data-dt-idx="5" tabindex="0">5</a></li>
                            <li class="paginate_button next" id="table-meeting_weekly_next"><a href="#" aria-controls="table-meeting_weekly" data-dt-idx="6" tabindex="0">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
        <div id="demo-lft-tab-2" class="tab-pane fade">
            <h4 class="text-main text-bold mar-no">Reguler Meeting</h4>
            <p>&nbsp;</p>


            <div class="row">
                <div class="col-sm-2">
                    <p class="text-main text-bold mar-no">Month - Year</p>
                    <p>September - 2024</p>
                </div>
            </div>

            <div class="table-responsive">
                <div id="table-meeting_weekly_report_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="dt-buttons"> <button class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="table-meeting_weekly_report" type="button"><span>Excel</span></button> <button class="dt-button buttons-collection buttons-page-length" tabindex="0" aria-controls="table-meeting_weekly_report" type="button" aria-haspopup="true"><span>Show 10 rows</span><span class="dt-down-arrow">▼</span></button> </div>
                    <div id="table-meeting_weekly_report_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="table-meeting_weekly_report"></label></div>
                    <div id="table-meeting_weekly_report_processing" class="dataTables_processing panel panel-default" style="display: none;">Processing...</div>
                    <table id="table-meeting_weekly_report" class="table table-striped dataTable no-footer dtr-inline dtfc-has-left" cellspacing="0" width="100%" role="grid" aria-describedby="table-meeting_weekly_report_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting_disabled dtfc-fixed-left" rowspan="1" colspan="1" style="width: 0px; left: 0px; position: sticky;" aria-label="No">No</th>
                                <th class="sorting dtfc-fixed-left" tabindex="0" aria-controls="table-meeting_weekly_report" rowspan="1" colspan="1" style="width: 0px; left: 16px; position: sticky;" aria-label="Distributor: activate to sort column ascending">Distributor</th>
                                <th class="sorting_asc dtfc-fixed-left" tabindex="0" aria-controls="table-meeting_weekly_report" rowspan="1" colspan="1" style="width: 0px; left: 54px; position: sticky;" aria-sort="ascending" aria-label="Depo: activate to sort column descending">Depo</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;" aria-label="Target">Target</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;" aria-label="Actual Score">Actual Score</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px;" aria-label="Score">Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr role="row" class="odd">
                                <td tabindex="0" class="dtfc-fixed-left" style="left: 0px; position: sticky;">1</td>
                                <td class="dtfc-fixed-left" style="left: 16px; position: sticky;">FWI</td>
                                <td class="sorting_1 dtfc-fixed-left" style="left: 32px; position: sticky;">ACEH</td>
                                <td>4</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr role="row" class="even">
                                <td tabindex="0" class="dtfc-fixed-left" style="left: 0px; position: sticky;">2</td>
                                <td class="dtfc-fixed-left" style="left: 16px; position: sticky;">Gunawan</td>
                                <td class="sorting_1 dtfc-fixed-left" style="left: 32px; position: sticky;">ACEH</td>
                                <td>4</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr role="row" class="odd">
                                <td tabindex="0" class="dtfc-fixed-left" style="left: 0px; position: sticky;">3</td>
                                <td class="dtfc-fixed-left" style="left: 16px; position: sticky;">WOI</td>
                                <td class="sorting_1 dtfc-fixed-left" style="left: 32px; position: sticky;">AIR MOLEK</td>
                                <td>4</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr role="row" class="even">
                                <td tabindex="0" class="dtfc-fixed-left" style="left: 0px; position: sticky;">4</td>
                                <td class="dtfc-fixed-left" style="left: 16px; position: sticky;">SDU</td>
                                <td class="sorting_1 dtfc-fixed-left" style="left: 32px; position: sticky;">AREA BAGAN</td>
                                <td>4</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr role="row" class="odd">
                                <td tabindex="0" class="dtfc-fixed-left" style="left: 0px; position: sticky;">5</td>
                                <td class="dtfc-fixed-left" style="left: 16px; position: sticky;">ERATEL</td>
                                <td class="sorting_1 dtfc-fixed-left" style="left: 32px; position: sticky;">BALI</td>
                                <td>4</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr role="row" class="even">
                                <td tabindex="0" class="dtfc-fixed-left" style="left: 0px; position: sticky;">6</td>
                                <td class="dtfc-fixed-left" style="left: 16px; position: sticky;">ERATEL</td>
                                <td class="sorting_1 dtfc-fixed-left" style="left: 32px; position: sticky;">BANDUNG</td>
                                <td>4</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr role="row" class="odd">
                                <td tabindex="0" class="dtfc-fixed-left" style="left: 0px; position: sticky;">7</td>
                                <td class="dtfc-fixed-left" style="left: 16px; position: sticky;">ERATEL</td>
                                <td class="sorting_1 dtfc-fixed-left" style="left: 32px; position: sticky;">BANJARMASIN</td>
                                <td>4</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr role="row" class="even">
                                <td tabindex="0" class="dtfc-fixed-left" style="left: 0px; position: sticky;">8</td>
                                <td class="dtfc-fixed-left" style="left: 16px; position: sticky;">ERATEL</td>
                                <td class="sorting_1 dtfc-fixed-left" style="left: 32px; position: sticky;">BANYUWANGI</td>
                                <td>4</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr role="row" class="odd">
                                <td tabindex="0" class="dtfc-fixed-left" style="left: 0px; position: sticky;">9</td>
                                <td class="dtfc-fixed-left" style="left: 16px; position: sticky;">STARTMARA</td>
                                <td class="sorting_1 dtfc-fixed-left" style="left: 32px; position: sticky;">BATAM</td>
                                <td>4</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr role="row" class="even">
                                <td tabindex="0" class="dtfc-fixed-left" style="left: 0px; position: sticky;">10</td>
                                <td class="dtfc-fixed-left" style="left: 16px; position: sticky;">ERATEL</td>
                                <td class="sorting_1 dtfc-fixed-left" style="left: 32px; position: sticky;">BEKASI</td>
                                <td>4</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="dataTables_info" id="table-meeting_weekly_report_info" role="status" aria-live="polite">Showing 1 to 10 of 44 entries</div>
                    <div class="dataTables_paginate paging_simple_numbers" id="table-meeting_weekly_report_paginate">
                        <ul class="pagination">
                            <li class="paginate_button previous disabled" id="table-meeting_weekly_report_previous"><a href="#" aria-controls="table-meeting_weekly_report" data-dt-idx="0" tabindex="0">Previous</a></li>
                            <li class="paginate_button active"><a href="#" aria-controls="table-meeting_weekly_report" data-dt-idx="1" tabindex="0">1</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="table-meeting_weekly_report" data-dt-idx="2" tabindex="0">2</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="table-meeting_weekly_report" data-dt-idx="3" tabindex="0">3</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="table-meeting_weekly_report" data-dt-idx="4" tabindex="0">4</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="table-meeting_weekly_report" data-dt-idx="5" tabindex="0">5</a></li>
                            <li class="paginate_button next" id="table-meeting_weekly_report_next"><a href="#" aria-controls="table-meeting_weekly_report" data-dt-idx="6" tabindex="0">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection