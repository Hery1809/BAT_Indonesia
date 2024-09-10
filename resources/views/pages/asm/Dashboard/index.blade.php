@extends('layouts.master-asm')
@section('title', 'dashboard')
@section('dashboard', 'active-sub')
@section('content')
<div id="page-content">
    <div class="row">
        <form class="form-horizontal" method="GET">
            <div class="col-sm-3">
                <div class="form-group">
                    <label class="col-sm-12 text-semibold">
                        Distributor</label>
                    <div class="col-sm-12">
                        <select name="distributor_id" id="distributor_id" onchange="select_distributor_asm(this.value);"
                            class="form-control" required="">
                            <option value="3bdqsClj1P" selected="">ERATEL</option>
                            <option value="CeUxIOd40l">STARTMARA</option>
                            <option value="iX8O9JK6nh">WOI</option>
                            <option value="nvUHd9qzFS">FWI</option>
                            <option value="qPchsZMJCw">SDU</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label class="col-sm-12 text-semibold">
                        Depo</label>
                    <div class="col-sm-12">
                        <select name="depo_id" id="depo_id" class="form-control" required="">
                            <option value="gTlJLNRpP0" selected="">BALI</option>
                            <option value="WIBK320lcs">BANDUNG</option>
                            <option value="oPhT5mxflp">BANJARMASIN</option>
                            <option value="tQ1XxufqEi">BANYUWANGI</option>
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
                    <div class="col-sm-6">
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


    <div class="row">
        <div class="col-md-9">
            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                <div class="timeline-step">
                    <div class="timeline-content">
                        <p class="h6 mt-3 mb-1 timeline-title ">Data Target</p>
                        <div class="inner-circle not-started"></div>

                    </div>
                </div>
                <div class="timeline-step">
                    <div class="timeline-content">
                        <p class="h6 mt-3 mb-1 timeline-title ">Weekly W01</p>
                        <div class="inner-circle not-started"></div>

                    </div>
                </div>
                <div class="timeline-step">
                    <div class="timeline-content">
                        <p class="h6 mt-3 mb-1 timeline-title ">Weekly W02</p>
                        <div class="inner-circle not-started"></div>

                    </div>
                </div>
                <div class="timeline-step">
                    <div class="timeline-content">
                        <p class="h6 mt-3 mb-1 timeline-title ">Weekly W03</p>
                        <div class="inner-circle not-started"></div>

                    </div>
                </div>
                <div class="timeline-step mb-0">
                    <div class="timeline-content">
                        <p class="h6 mt-3 mb-1 timeline-title ">Weekly W04</p>
                        <div class="inner-circle not-started"></div>

                    </div>
                </div>
                <div class="timeline-step mb-0">
                    <div class="timeline-content">
                        <p class="h6 mt-3 mb-1 timeline-title ">Weekly W05</p>
                        <div class="inner-circle not-started"></div>

                    </div>
                </div>
                <div class="timeline-step mb-0">
                    <div class="timeline-content">
                        <p class="h6 mt-3 mb-1 timeline-title">Monthly Data </p>
                        <div class="inner-circle not-started"></div>

                    </div>
                </div>
                <div class="timeline-step mb-0">
                    <div class="timeline-content">
                        <p class="h6 mt-3 mb-1 timeline-title">Final Score </p>
                        <div class="inner-circle not-started"></div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">

            <div class="panel panel-primary2 panel-colorful media middle pad-all">
                <p class="text-lg text-semibold">Final Score</p>
                <div class="col-md-7">
                    <p class="text-xs text-info mar-no" style="color: aqua;">Period</p>
                    <span class="text-sm text-semibold">September - 2024</span>
                </div>
                <div class="col-md-5">
                    <p class="text-3x mar-no text-semibold" id="info-final_score">0</p>
                </div>
            </div>
        </div>

    </div>




    <div class="row">
        <div class="col-sm-7">
            <div class="panel panel-bordered-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-bold">Actual Weekly</h3>
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>WI</th>
                                    <th>W2</th>
                                    <th>W3</th>
                                    <th>W4</th>
                                    <th>W5</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Weekly Meeting</td>
                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>

                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>

                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>

                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>

                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>
                                </tr>

                                <!-- /// STOCK LEVEL -->

                                <tr>
                                    <td>Stock Level</td>
                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>

                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>

                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>

                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>

                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>
                                </tr>



                                <!-- /// HEADCOUNT FULFILMENT -->

                                <tr>
                                    <td>Headcount</td>
                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>

                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>

                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>

                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>

                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>
                                </tr>


                                <!-- /// COVERAGE -->

                                <tr>
                                    <td>Coverage</td>
                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>

                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>

                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>

                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>

                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>
                                </tr>


                                <!-- /// DAILY OPERATIONS -->

                                <tr>
                                    <td>Daily Operations</td>
                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>

                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>

                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>

                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>

                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-sm-4">
                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i class="fa fa-circle"></i></button>
                        Not Started
                    </div>
                    <div class="col-sm-4">
                        <button class="btn btn-warning btn-icon btn-xs btn-circle"><i class="fa fa-circle"></i></button>
                        On Review
                    </div>
                    <div class="col-sm-4">
                        <button class="btn btn-info btn-icon btn-xs btn-circle"><i class="fa fa-check"></i></button>
                        Verified
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="panel panel-bordered-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-bold">Actual Monthly</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>W+I</th>
                                    <th>W+2</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Stock Count</td>
                                    <td>
                                        <button class="btn btn-default btn-icon btn-xs btn-circle"><i
                                                class="fa fa-circle"></i></button>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bordered-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-bold">Detail Scoring</h3>
                </div>
                <div class="panel-body">



                    <h3 class="panel-title text-semibold">Sub Components</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Coverage</th>
                                    <th>HC</th>
                                    <th>Payment BAT</th>
                                    <th>FFIS</th>
                                    <th>MOM</th>
                                    <th>Daily Ops</th>
                                    <th>EHS</th>
                                    <th>Training</th>
                                    <th>Stock Level</th>
                                    <th>Stock Count</th>
                                    <th>Product Handling</th>
                                    <th>Stock Rotaion</th>
                                    <th>Sell Out WS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>




                    <h3 class="panel-title text-semibold">Sub Components - Weighted</h3>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr style="background:orange;">
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>Coverage</th>
                                    <th>HC</th>
                                    <th>Payment BAT</th>
                                    <th>FFIS</th>
                                    <th>MOM</th>
                                    <th>Daily Ops</th>
                                    <th>EHS</th>
                                    <th>Training</th>
                                    <th>Stock Level</th>
                                    <th>Stock Count</th>
                                    <th>Product Handling</th>
                                    <th>Stock Rotaion</th>
                                    <th>Sell Out WS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0</td>

                                    <td>0</td>

                                    <td>0</td>

                                    <td>0</td>

                                    <td>0</td>

                                    <td>0</td>

                                    <td>0</td>

                                    <td>0</td>

                                    <td>0</td>

                                    <td>0</td>

                                    <td>0</td>

                                    <td>0</td>

                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <div class="col-sm-6">
                        <h3 class="panel-title text-semibold">Main Components</h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Coverage</th>
                                        <th>HC</th>
                                        <th>Payment BAT</th>
                                        <th>FFIS</th>
                                        <th>Operations</th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <h3 class="panel-title text-semibold">Main Components - Weight</h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr style="background:orange;">
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th rowspan="2">SCORE</th>
                                    </tr>
                                    <tr>
                                        <th>Coverage</th>
                                        <th>HC</th>
                                        <th>Payment BAT</th>
                                        <th>FFIS</th>
                                        <th>Operations</th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>0</td>

                                        <td>0</td>

                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>

                                        <td>0</td>

                                        <td>0 </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</div>
@endsection