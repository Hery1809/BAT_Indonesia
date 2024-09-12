@extends('layouts.master')
@section('title', 'File Manager')
@section('FileManager', 'active-sub')
@section('content')

    <script type="text/javascript">
        // Ketika checkbox select all di-klik
        $("#selectAll").click(function() {
            // Centang atau hilangkan centang semua checkbox berdasarkan status select all
            $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
        });

        // Ketika setiap checkbox individual di-klik
        $("input[type=checkbox]").click(function() {
            // Jika checkbox yang di-klik adalah salah satu checkbox biasa (bukan select all)
            if (!$(this).prop("checked")) {
                // Hilangkan centang dari checkbox select all
                $("#selectAll").prop("checked", false);
            }

            // Jika semua checkbox selain select all sudah dicentang, centang juga select all
            if ($("input[type=checkbox]:not(#selectAll)").length === $(
                    "input[type=checkbox]:not(#selectAll):checked").length) {
                $("#selectAll").prop("checked", true);
            }
        });
    </script>


    <?php
    $page_download = 'adm/download/sca';
    @$status2 = htmlspecialchars($_GET['status']);
    
    if (empty($status2)) {
        $status = 'File Attachment';
    } else {
        $status = $status2;
    }
    
    @$ket2 = htmlspecialchars($_GET['ket']);
    
    if (empty($ket2)) {
        $ket = 'Stock Count';
    } else {
        $ket = $ket2;
    }
    
    $depo_id = htmlspecialchars(@$_GET['depo_id']);
    
    $link1 = '';
    $link2 = '';
    $link3 = '';
    $link4 = '';
    $link5 = '';
    $link6 = '';
    $link7 = '';
    $link8 = '';
    $link9 = '';
    $link10 = '';
    $link11 = '';
    $link12 = '';
    $link13 = '';
    $link14 = '';
    
    if ($status == 'File Attachment' and $ket == 'Stock Count') {
        $link1 = 'text-bold';
    } elseif ($status == 'File Attachment' and $ket == 'Daily Operations') {
        $link2 = 'text-bold';
    } elseif ($status == 'File Scan' and $ket == 'Meeting Weekly') {
        $link3 = 'text-bold';
    } elseif ($status == 'File Scan' and $ket == 'Headcount Fulfilment') {
        $link4 = 'text-bold';
    } elseif ($status == 'File Scan' and $ket == 'Coverage') {
        $link5 = 'text-bold';
    } elseif ($status == 'File Scan' and $ket == 'Stock Level') {
        $link6 = 'text-bold';
    } elseif ($status == 'File Scan' and $ket == 'Stock Count') {
        $link7 = 'text-bold';
    } elseif ($status == 'File Scan' and $ket == 'Daily Operations') {
        $link8 = 'text-bold';
    } elseif ($status == 'File Scan' and $ket == 'EHS Facility') {
        $link9 = 'text-bold';
    } elseif ($status == 'File Scan' and $ket == 'Training') {
        $link10 = 'text-bold';
    } elseif ($status == 'File Scan' and $ket == 'Product Handling') {
        $link11 = 'text-bold';
    } elseif ($status == 'File Attachment' and $ket == 'Training') {
        $link12 = 'text-bold';
    } elseif ($status == 'File Attachment' and $ket == 'FFIS Payment') {
        $link13 = 'text-bold';
    } elseif ($status == 'File Scan' and $ket == 'FFIS Payment') {
        $link14 = 'text-bold';
    }
    
    ?>

    <div class="panel">
        <div class="pad-all file-manager">
            <div class="fixed-fluid">
                <div class="fixed-sm-200 pull-sm-left file-sidebar">

                    <p class="pad-hor mar-top text-main text-bold text-sm text-uppercase">FILE ATTACHMENT</p>
                    <div class="list-group bg-trans pad-ver bord-btm">
                        <a href="?status=File Attachment&ket=Stock Count" class="list-group-item <?= $link1 ?>"><i
                                class="demo-pli-folder-with-document icon-lg icon-fw"></i> Stock Count</a>
                        <a href="?status=File Attachment&ket=Daily Operations" class="list-group-item <?= $link2 ?>"><i
                                class="demo-pli-folder-with-document icon-lg icon-fw"></i> Daily Operations</a>
                        <a href="?status=File Attachment&ket=Training" class="list-group-item <?= $link12 ?>"><i
                                class="demo-pli-folder-with-document icon-lg icon-fw"></i> Training</a>
                        <a href="?status=File Attachment&ket=FFIS Payment" class="list-group-item <?= $link13 ?>"><i
                                class="demo-pli-folder-with-document icon-lg icon-fw"></i> FFIS Payment</a>
                    </div>


                    <p class="pad-hor mar-top text-main text-bold text-sm text-uppercase">FILE SCAN</p>
                    <div class="list-group bg-trans pad-btm bord-btm">
                        <a href="?status=File Scan&ket=Meeting Weekly" class="list-group-item <?= $link3 ?>">
                            <i class="demo-pli-folder icon-lg icon-fw"></i> Meeting Weekly
                        </a>
                        <a href="?status=File Scan&ket=Headcount Fulfilment" class="list-group-item <?= $link4 ?>">
                            <i class="demo-pli-folder icon-lg icon-fw"></i> Headcount Fulfilment
                        </a>
                        <a href="?status=File Scan&ket=Coverage" class="list-group-item <?= $link5 ?>">
                            <i class="demo-pli-folder icon-lg icon-fw"></i> Coverage
                        </a>
                        <a href="?status=File Scan&ket=Stock Level" class="list-group-item <?= $link6 ?>">
                            <i class="demo-pli-folder icon-lg icon-fw"></i> Stock Level
                        </a>
                        <a href="?status=File Scan&ket=Stock Count" class="list-group-item <?= $link7 ?>">
                            <i class="demo-pli-folder icon-lg icon-fw"></i> Stock Count
                        </a>
                        <a href="?status=File Scan&ket=Daily Operations" class="list-group-item <?= $link8 ?>">
                            <i class="demo-pli-folder icon-lg icon-fw"></i> Daily Operations
                        </a>
                        <a href="?status=File Scan&ket=EHS Facility" class="list-group-item <?= $link9 ?>">
                            <i class="demo-pli-folder icon-lg icon-fw"></i> EHS & Facility
                        </a>
                        <a href="?status=File Scan&ket=Training" class="list-group-item <?= $link10 ?>">
                            <i class="demo-pli-folder icon-lg icon-fw"></i> Training
                        </a>
                        <a href="?status=File Scan&ket=Product Handling" class="list-group-item <?= $link11 ?>">
                            <i class="demo-pli-folder icon-lg icon-fw"></i> Product Handling
                        </a>
                        </a>
                        <a href="?status=File Scan&ket=FFIS Payment" class="list-group-item <?= $link14 ?>">
                            <i class="demo-pli-folder icon-lg icon-fw"></i> FFIS Payment
                        </a>
                    </div>


                </div>
                <div class="fluid file-panel" id="file-manager">
                    <div class="bord-btm pad-ver">
                        <ol class="breadcrumb">
                            <li><a href="#">File Manager</a></li>
                            <li><a href="#"><?= $status ?></a></li>
                            <li class="active"><?= $ket ?></li>
                        </ol>
                    </div>
                    <br>
                    <div class="row">
                        <form method="GET" action="">
                            <input type="hidden" name="status" value="<?= $status ?>">
                            <input type="hidden" name="ket" value="<?= $ket ?>">
                            <div class="col-sm-6">
                                <div class="input-group mar-btm">
                                    <div class="input-group-addon">
                                        <input id="selectAll" class="magic-checkbox" type="checkbox" checked>
                                        <label for="selectAll"></label>
                                    </div>
                                    <select class="form-control" name="depo_id" onchange="submit()">
                                        <option value="">ALL</option>
                                        <?php foreach($depo as $row) { 
                                            if ($row->depo_id==$depo_id) {
                                    ?>
                                        <option value="<?= $row->depo_id ?>" selected><?= $row->depo_name ?></option>
                                        <?php } else { ?>
                                        <option value="<?= $row->depo_id ?>"><?= $row->depo_name ?></option>
                                        <?php }} ?>
                                    </select>
                                </div>
                            </div>
                        </form>

                        <form id="form" method="POST" action="" target="_blank" enctype="multipart/form-data">
                            <input type="hidden" name="depo_id" value="<?= $depo_id ?>">
                            <div class="col-sm-6">
                                <div class="btn-file-toolbar pull-right">
                                    <button type="submit" class="btn btn-icon add-tooltip" data-original-title="Download"
                                        data-toggle="tooltip"><i class="icon-2x demo-pli-download-from-cloud"></i>
                                        ZIP</button>
                                </div>
                            </div>
                    </div>

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <p>&nbsp;</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="5%"></th>
                                <th width="5%"></th>
                                <th width="5%"></th>
                                <th width="50%"></th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</td>
                                    <td>
                                        <div class="file-control">
                                            <input id="file-list-{{ $row->sca_id }}" name="file_id[]"
                                                value="{{ $row->sca_id }}" class="magic-checkbox" type="checkbox"
                                                checked>
                                            <label for="file-list-{{ $row->sca_id }}"></label>
                                        </div>
                                    </td>
                                    <td><i class="demo-pli-file-word icon-3x"></i></td>
                                    <td>
                                        <div class="text-bold">{{ $row->sca_file }}</div>
                                        <small>{{ $row->created_date }} | DEPO
                                            {{ $row->depo->depo_name }}</small>
                                    </td>
                                    <td><a href="{{ route('file-manager.download', $row->sca_id) }}" target="_blank">
                                            <button type="button" class="btn btn-warning" title="Download">
                                                <i class="glyphicon glyphicon-download-alt"></i></button></a></td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    </form>

                    @if (!$data->isEmpty())
                        <p class="d-inline-block">Showing {{ $data->firstItem() }} to
                            {{ $data->lastItem() }} of
                            {{ $data->total() }} entries</p>
                    @endif
                    <hr class="new-section-xs">
                    <div class="pull-right">
                        <nav aria-label="Page navigation">
                            {{ $data->appends(['perPage' => request()->get('perPage'), 'search' => request()->get('search')])->links('pagination::bootstrap-4') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
