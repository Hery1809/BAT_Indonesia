@extends('layouts.master-ho')
@section('title', 'setting')
@section('setting', 'active-sub')
@section('content')
    <style type="text/css">
        .file {
            position: relative;
            overflow: hidden;
        }

        .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }
    </style>
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-bold">Account Setting</h3>
                </div>
                <div class="panel-body">

                    <div class="col-sm-12" style="margin:0;">
                        <div class="table-responsive-nopadding">
                            <table class="table ">
                                <thead>
                                    <tr style="background: lightgray;">
                                        <th></th>
                                        <th width="98%" style="font-size: 14px;">Profile</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <form method="POST" class="action" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="profile">
                        <div class="col-sm-3 text-center">
                            <div class="panel-body">
                                <img class="img-circle" src="https://batidistributor.com/staging/assets/icon/user.png" onerror="this.onerror=null;this.src='https://batidistributor.com/staging/assets/icon/user.png';" alt="" width="120px" height="120px" id="img1">

                                <p>&nbsp;</p>

                                <div class="file btn btn-primary">
                                    CHANGE PICTURE
                                    <input accept="image/*" name="user_foto" type="file" id="imgInp1">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="panel-body">
                                <p>&nbsp;</p>
                                <br>
                                <p class="text-main text-bold mar-no">Email</p>
                                <p>carmadi@sap-samara.com</p>

                                <p>&nbsp;</p>
                                <p class="text-main text-bold mar-no">First Name</p>
                                <input type="text" name="user_name" value="Samara" class="form-control" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="panel-body">
                                <p>&nbsp;</p>
                                <br>
                                <p class="text-main text-bold mar-no">Role</p>
                                <p>HO BAT</p>

                                <p>&nbsp;</p>
                                <p class="text-main text-bold mar-no">Last Name</p>
                                <input type="text" name="user_last_name" value="HO" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="panel-body">
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <button type="submit" class="btn btn-primary submit"> UPDATE </button>
                            </div>
                        </div>
                    </form>


                    <div class="col-sm-12" style="margin:0;">
                        <div class="table-responsive-nopadding">
                            <table class="table ">
                                <thead>
                                    <tr style="background: lightgray;">
                                        <th></th>
                                        <th width="98%" style="font-size: 14px;">Change Password</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <form method="POST" class="action">
                        <input type="hidden" name="action" value="password">
                        <div class="col-sm-3">
                            <div class="panel-body">
                                <p class="text-main text-bold mar-no">Current Password</p>
                                <input type="password" name="current_password" class="form-control" placeholder="Current Password" required="">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="panel-body">
                                <p class="text-main text-bold mar-no">New Password</p>
                                <input type="password" name="new_password" id="newPassword" class="form-control" placeholder="New Password" required="">


                                <div id="pswd_info">
                                    <h5>Password must meet the following requirements:</h5>
                                    <ul class="info-password">
                                        <li id="letter" class="invalid">At least <strong>one letter</strong></li>
                                        <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
                                        <li id="number" class="invalid">At least <strong>one number</strong></li>
                                        <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="panel-body">
                                <p class="text-main text-bold mar-no">Confirm Password</p>
                                <input type="password" name="confirm_password" id="ConfirmPassword" class="form-control" placeholder="Confirm Password" required="">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="panel-body">
                                <br>
                                <button type="submit" class="btn btn-primary submit" onclick="return Validate();"> CHANGE</button>
                            </div>
                        </div>
                    </form>



                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>


                </div>
            </div>
@endsection