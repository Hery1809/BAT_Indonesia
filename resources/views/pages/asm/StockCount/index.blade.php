@extends('layouts.master-asm')
@section('title', 'stockcount')
@section('stockcount', 'active-sub')
@section('content')
<div id="page-content">


    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">

                    <h4 class="text-main text-bold mar-no">Stock Count</h4>
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
                        <div id="table-stock_count_verify_asm_wrapper"
                            class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_length" id="table-stock_count_verify_asm_length"><label>Show
                                            <select name="table-stock_count_verify_asm_length"
                                                aria-controls="table-stock_count_verify_asm"
                                                class="form-control input-sm">
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="50">50</option>
                                            </select> entries</label></div>
                                </div>
                                <div class="col-sm-6">
                                    <div id="table-stock_count_verify_asm_filter" class="dataTables_filter">
                                        <label>Search:<input type="search" class="form-control input-sm" placeholder=""
                                                aria-controls="table-stock_count_verify_asm"></label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="table-stock_count_verify_asm"
                                        class="table table-striped dataTable no-footer dtr-inline" cellspacing="0"
                                        width="100%" role="grid" aria-describedby="table-stock_count_verify_asm_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th width="5%" class="sorting_disabled" rowspan="1" colspan="1"
                                                    style="width: 23px;" aria-label="No">No</th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="table-stock_count_verify_asm" rowspan="1" colspan="1"
                                                    style="width: 64px;" aria-sort="ascending"
                                                    aria-label="Distributor: activate to sort column descending">
                                                    Distributor</th>
                                                <th class="sorting" tabindex="0"
                                                    aria-controls="table-stock_count_verify_asm" rowspan="1" colspan="1"
                                                    style="width: 47px;"
                                                    aria-label="Depo: activate to sort column ascending">Depo</th>
                                                <th class="sorting" tabindex="0"
                                                    aria-controls="table-stock_count_verify_asm" rowspan="1" colspan="1"
                                                    style="width: 27px;"
                                                    aria-label="Year: activate to sort column ascending">Year</th>
                                                <th class="sorting" tabindex="0"
                                                    aria-controls="table-stock_count_verify_asm" rowspan="1" colspan="1"
                                                    style="width: 39px;"
                                                    aria-label="Month: activate to sort column ascending">Month</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1"
                                                    style="width: 140px;" aria-label="Status">Status</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1"
                                                    style="width: 60px;" aria-label=""></th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1"
                                                    style="width: 160px;" aria-label=""></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" class="odd">
                                                <td tabindex="0">1</td>
                                                <td class="sorting_1">FWI</td>
                                                <td style="">ACEH</td>
                                                <td style="">2024</td>
                                                <td style="">June</td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=0wvCUiIpLt"><button
                                                            class="btn btn-warning submit" title="Status">to
                                                            review</button></a> </td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=0wvCUiIpLt">
                                                        See detail <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </td>
                                                <td style=""><button class="btn btn-default" title="Download"
                                                        disabled=""><i class=" 	glyphicon glyphicon-download-alt"></i>
                                                        Download File Scan</button></td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td tabindex="0">2</td>
                                                <td class="sorting_1">FWI</td>
                                                <td style="">ACEH</td>
                                                <td style="">2024</td>
                                                <td style="">May</td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=3cUoX9O7rW"><button
                                                            class="btn btn-warning submit" title="Status">to
                                                            review</button></a> </td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=3cUoX9O7rW">
                                                        See detail <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </td>
                                                <td style=""><button class="btn btn-default" title="Download"
                                                        disabled=""><i class=" 	glyphicon glyphicon-download-alt"></i>
                                                        Download File Scan</button></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td tabindex="0">3</td>
                                                <td class="sorting_1">FWI</td>
                                                <td style="">ACEH</td>
                                                <td style="">2024</td>
                                                <td style="">April</td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=2xYLIkaUS0"><button
                                                            class="btn btn-success submit"
                                                            title="Status">verified</button></a> </td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=2xYLIkaUS0">
                                                        See detail <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </td>
                                                <td style=""><button class="btn btn-default" title="Download"
                                                        disabled=""><i class=" 	glyphicon glyphicon-download-alt"></i>
                                                        Download File Scan</button></td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td tabindex="0">4</td>
                                                <td class="sorting_1">FWI</td>
                                                <td style="">ACEH</td>
                                                <td style="">2024</td>
                                                <td style="">March</td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=0JFeksyiop"><button
                                                            class="btn btn-success submit"
                                                            title="Status">verified</button></a> </td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=0JFeksyiop">
                                                        See detail <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </td>
                                                <td style=""><button class="btn btn-default" title="Download"
                                                        disabled=""><i class=" 	glyphicon glyphicon-download-alt"></i>
                                                        Download File Scan</button></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td tabindex="0">5</td>
                                                <td class="sorting_1">FWI</td>
                                                <td style="">ACEH</td>
                                                <td style="">2024</td>
                                                <td style="">February</td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=0jd3a9JZVo"><button
                                                            class="btn btn-success submit"
                                                            title="Status">verified</button></a> </td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=0jd3a9JZVo">
                                                        See detail <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </td>
                                                <td style=""><button class="btn btn-default" title="Download"
                                                        disabled=""><i class=" 	glyphicon glyphicon-download-alt"></i>
                                                        Download File Scan</button></td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td tabindex="0">6</td>
                                                <td class="sorting_1">FWI</td>
                                                <td style="">ACEH</td>
                                                <td style="">2024</td>
                                                <td style="">January</td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=2Q0CyGFD3p"><button
                                                            class="btn btn-success submit"
                                                            title="Status">verified</button></a> </td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=2Q0CyGFD3p">
                                                        See detail <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </td>
                                                <td style=""><button class="btn btn-default" title="Download"
                                                        disabled=""><i class=" 	glyphicon glyphicon-download-alt"></i>
                                                        Download File Scan</button></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td tabindex="0">7</td>
                                                <td class="sorting_1">SDU</td>
                                                <td style="">AREA BAGAN</td>
                                                <td style="">2024</td>
                                                <td style="">April</td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=2YAufvd7JC"><button
                                                            class="btn btn-success submit"
                                                            title="Status">verified</button></a> </td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=2YAufvd7JC">
                                                        See detail <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </td>
                                                <td style=""><button class="btn btn-default" title="Download"
                                                        disabled=""><i class=" 	glyphicon glyphicon-download-alt"></i>
                                                        Download File Scan</button></td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td tabindex="0">8</td>
                                                <td class="sorting_1">SDU</td>
                                                <td style="">AREA BAGAN</td>
                                                <td style="">2024</td>
                                                <td style="">March</td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=2dk3uWE8FH"><button
                                                            class="btn btn-success submit"
                                                            title="Status">verified</button></a> </td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=2dk3uWE8FH">
                                                        See detail <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </td>
                                                <td style=""><button class="btn btn-default" title="Download"
                                                        disabled=""><i class=" 	glyphicon glyphicon-download-alt"></i>
                                                        Download File Scan</button></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td tabindex="0">9</td>
                                                <td class="sorting_1">SDU</td>
                                                <td style="">AREA BAGAN</td>
                                                <td style="">2024</td>
                                                <td style="">February</td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=1jglAIYspi"><button
                                                            class="btn btn-success submit"
                                                            title="Status">verified</button></a> </td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=1jglAIYspi">
                                                        See detail <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </td>
                                                <td style=""><button class="btn btn-default" title="Download"
                                                        disabled=""><i class=" 	glyphicon glyphicon-download-alt"></i>
                                                        Download File Scan</button></td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td tabindex="0">10</td>
                                                <td class="sorting_1">SDU</td>
                                                <td style="">AREA BAGAN</td>
                                                <td style="">2024</td>
                                                <td style="">January</td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=0v2N8XOL3P"><button
                                                            class="btn btn-success submit"
                                                            title="Status">verified</button></a> </td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=0v2N8XOL3P">
                                                        See detail <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </td>
                                                <td style=""><button class="btn btn-default" title="Download"
                                                        disabled=""><i class=" 	glyphicon glyphicon-download-alt"></i>
                                                        Download File Scan</button></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td tabindex="0">11</td>
                                                <td class="sorting_1">ERATEL</td>
                                                <td style="">BALI</td>
                                                <td style="">2024</td>
                                                <td style="">May</td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=0WU13z5YRv"><button
                                                            class="btn btn-warning submit" title="Status">to
                                                            review</button></a> </td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=0WU13z5YRv">
                                                        See detail <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </td>
                                                <td style=""><button class="btn btn-default" title="Download"
                                                        disabled=""><i class=" 	glyphicon glyphicon-download-alt"></i>
                                                        Download File Scan</button></td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td tabindex="0">12</td>
                                                <td class="sorting_1">ERATEL</td>
                                                <td style="">BALI</td>
                                                <td style="">2024</td>
                                                <td style="">April</td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=8jtN1Grkid"><button
                                                            class="btn btn-warning submit" title="Status">to
                                                            review</button></a> </td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=8jtN1Grkid">
                                                        See detail <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </td>
                                                <td style=""><button class="btn btn-default" title="Download"
                                                        disabled=""><i class=" 	glyphicon glyphicon-download-alt"></i>
                                                        Download File Scan</button></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td tabindex="0">13</td>
                                                <td class="sorting_1">ERATEL</td>
                                                <td style="">BALI</td>
                                                <td style="">2024</td>
                                                <td style="">March</td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=2EJkgSYb1l"><button
                                                            class="btn btn-success submit"
                                                            title="Status">verified</button></a> </td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=2EJkgSYb1l">
                                                        See detail <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </td>
                                                <td style=""><button class="btn btn-default" title="Download"
                                                        disabled=""><i class=" 	glyphicon glyphicon-download-alt"></i>
                                                        Download File Scan</button></td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td tabindex="0">14</td>
                                                <td class="sorting_1">ERATEL</td>
                                                <td style="">BALI</td>
                                                <td style="">2024</td>
                                                <td style="">February</td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=04TMi15w9S"><button
                                                            class="btn btn-success submit"
                                                            title="Status">verified</button></a> </td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=04TMi15w9S">
                                                        See detail <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </td>
                                                <td style=""><button class="btn btn-default" title="Download"
                                                        disabled=""><i class=" 	glyphicon glyphicon-download-alt"></i>
                                                        Download File Scan</button></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td tabindex="0">15</td>
                                                <td class="sorting_1">ERATEL</td>
                                                <td style="">BALI</td>
                                                <td style="">2024</td>
                                                <td style="">January</td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=0YPGa9vtk2"><button
                                                            class="btn btn-success submit"
                                                            title="Status">verified</button></a> </td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=0YPGa9vtk2">
                                                        See detail <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </td>
                                                <td style=""><button class="btn btn-default" title="Download"
                                                        disabled=""><i class=" 	glyphicon glyphicon-download-alt"></i>
                                                        Download File Scan</button></td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td tabindex="0">16</td>
                                                <td class="sorting_1">ERATEL</td>
                                                <td style="">BANDUNG</td>
                                                <td style="">2024</td>
                                                <td style="">May</td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=0eJDSOpA9z"><button
                                                            class="btn btn-success submit"
                                                            title="Status">verified</button></a> </td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=0eJDSOpA9z">
                                                        See detail <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </td>
                                                <td style=""><button class="btn btn-default" title="Download"
                                                        disabled=""><i class=" 	glyphicon glyphicon-download-alt"></i>
                                                        Download File Scan</button></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td tabindex="0">17</td>
                                                <td class="sorting_1">ERATEL</td>
                                                <td style="">BANDUNG</td>
                                                <td style="">2024</td>
                                                <td style="">April</td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=8xm7JraC0D"><button
                                                            class="btn btn-success submit"
                                                            title="Status">verified</button></a> </td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=8xm7JraC0D">
                                                        See detail <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </td>
                                                <td style=""><button class="btn btn-default" title="Download"
                                                        disabled=""><i class=" 	glyphicon glyphicon-download-alt"></i>
                                                        Download File Scan</button></td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td tabindex="0">18</td>
                                                <td class="sorting_1">ERATEL</td>
                                                <td style="">BANDUNG</td>
                                                <td style="">2024</td>
                                                <td style="">March</td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=1mfD3XL6iH"><button
                                                            class="btn btn-success submit"
                                                            title="Status">verified</button></a> </td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=1mfD3XL6iH">
                                                        See detail <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </td>
                                                <td style=""><button class="btn btn-default" title="Download"
                                                        disabled=""><i class=" 	glyphicon glyphicon-download-alt"></i>
                                                        Download File Scan</button></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td tabindex="0">19</td>
                                                <td class="sorting_1">ERATEL</td>
                                                <td style="">BANDUNG</td>
                                                <td style="">2024</td>
                                                <td style="">February</td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=3jlxgebHm5"><button
                                                            class="btn btn-success submit"
                                                            title="Status">verified</button></a> </td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=3jlxgebHm5">
                                                        See detail <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </td>
                                                <td style=""><button class="btn btn-default" title="Download"
                                                        disabled=""><i class=" 	glyphicon glyphicon-download-alt"></i>
                                                        Download File Scan</button></td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td tabindex="0">20</td>
                                                <td class="sorting_1">ERATEL</td>
                                                <td style="">BANDUNG</td>
                                                <td style="">2024</td>
                                                <td style="">January</td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=4eiXyIurdM"><button
                                                            class="btn btn-success submit"
                                                            title="Status">verified</button></a> </td>
                                                <td style=""><a
                                                        href="https://batidistributor.com/staging/asm/stock_count_verify_asm?act=detail&amp;year=2024&amp;status=4&amp;id=4eiXyIurdM">
                                                        See detail <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </td>
                                                <td style=""><button class="btn btn-default" title="Download"
                                                        disabled=""><i class=" 	glyphicon glyphicon-download-alt"></i>
                                                        Download File Scan</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div id="table-stock_count_verify_asm_processing"
                                        class="dataTables_processing panel panel-default" style="display: none;">
                                        Processing...</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="table-stock_count_verify_asm_info" role="status"
                                        aria-live="polite">Showing 1 to 20 of 50 entries</div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers"
                                        id="table-stock_count_verify_asm_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button previous disabled"
                                                id="table-stock_count_verify_asm_previous"><a href="#"
                                                    aria-controls="table-stock_count_verify_asm" data-dt-idx="0"
                                                    tabindex="0">Previous</a></li>
                                            <li class="paginate_button active"><a href="#"
                                                    aria-controls="table-stock_count_verify_asm" data-dt-idx="1"
                                                    tabindex="0">1</a></li>
                                            <li class="paginate_button "><a href="#"
                                                    aria-controls="table-stock_count_verify_asm" data-dt-idx="2"
                                                    tabindex="0">2</a></li>
                                            <li class="paginate_button "><a href="#"
                                                    aria-controls="table-stock_count_verify_asm" data-dt-idx="3"
                                                    tabindex="0">3</a></li>
                                            <li class="paginate_button next" id="table-stock_count_verify_asm_next"><a
                                                    href="#" aria-controls="table-stock_count_verify_asm"
                                                    data-dt-idx="4" tabindex="0">Next</a></li>
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

</div>
@endsection