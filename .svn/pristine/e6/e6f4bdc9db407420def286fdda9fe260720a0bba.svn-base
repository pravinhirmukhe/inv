<style>
    .padding-left-0{padding-left: 0;}
    .padding-right-0{padding-right: 0;}
    .form-horizontal .control-label{text-align: left !important;font-size: 12px !important;font-weight: normal;}
    .table-bordered input{border: 0; box-shadow: none;}

    .table-bordered  > thead:first-child > tr:first-child > th,  .table-bordered  > thead:first-child > tr:first-child > td,  .table-bordered-striped thead tr.primary:nth-child(odd) th{    background-color: #6164c0;
                                                                                                                                                                                             color: white;
                                                                                                                                                                                             border-color: #6164c0;
                                                                                                                                                                                             border-top: 1px solid #6164c0;
                                                                                                                                                                                             text-align: center;}
    h4{font-weight: bold;    text-transform: uppercase;}
    btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
    .photo{text-align: center;
           border: 1px solid #cccccc;
           padding: 30px 0;}
    </style>
    <div class="modal-dialog modal-lg">
    <div class="modal-content pull-left" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel">Employment Bio Data Form</h4>
        </div>
        <?php
        $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'class' => 'form-horizontal');
        echo form_open_multipart("employee/add", $attrib)
        ?>
        <div class="modal-body">

            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <h4>PERSONAL DETAILS</h4>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-group">
                        <label class="control-label col-lg-3 col-sm-3 col-md-3 col-xs-12" for="joining_date"><?= lang("join_date") ?>:</label>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="joining_date" class="form-control datetime" id="joining_date" placeholder="Joining Date">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-group">
                        <label class="control-label col-lg-3 col-sm-3 col-md-3 col-xs-12" for="fname"><?= lang("fname") ?>:</label>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="fname" class="form-control" id="fname" placeholder="Ram">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-group">
                        <label class="control-label col-lg-3 col-sm-3 col-md-3 col-xs-12" for="mname"><?= lang("mname") ?>:</label>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="mname" class="form-control" id="mname" placeholder="Sahebrao">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-group">
                        <label class="control-label col-lg-3 col-sm-3 col-md-3 col-xs-12" for="lname"><?= lang("lname") ?>:</label>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="lname" class="form-control" id="lname" placeholder="Jashav">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-group">
                        <label class="control-label col-lg-3 col-sm-3 col-md-3 col-xs-12" for="dob"><?= lang("dob") ?>:</label>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="dob" class="form-control datetime" id="dob" placeholder="Date Of Birth">
                        </div>
                    </div>
                </div> 
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 photo">
                    <h4>PHOTO</h4>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin-bottom:10px;">
                        <label class="btn btn-default btn-file" style="margin:0;">
                            Browse <input type="file" name="photo" style="display: none;">
                        </label>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-group">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <label class="control-label col-lg-4 col-sm-4 col-md-4 col-xs-12" for="marital_status">Marital Status:</label>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <select class="form-control" id="sel1" name="marital_status">
                                <option>Married</option>
                                <option>Unmarried</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <label class="control-label col-lg-3 col-sm-3 col-md-3 col-xs-12" for="anniversary">Anniversary:</label>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="text" name="anniversary" class="form-control datetime" id="anniversary" placeholder="Date Of Anniversary">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-group">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <label class="control-label col-lg-6 col-sm-6 col-md-6 col-xs-12 " for="no_of_dependents">Number of Dependent:</label>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding-left-0">
                            <input type="text" name="no_of_dependents" class="form-control" id="no_of_dependents" placeholder="4">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <label class="control-label col-lg-3 col-sm-3 col-md-3 col-xs-12" for="domicile">Domicile:</label>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="domicile" class="form-control" id="domicile" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-group">
                        <label class="control-label col-lg-2 col-sm-2 col-md-2 col-xs-12" for="address">Address (Home):</label>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                            <textarea class="form-control" name="address"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-group">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <label class="control-label col-lg-4 col-sm-4 col-md-4 col-xs-12" for="tele_ph">Tele.Ph (Home):</label>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <input type="tel" name="tele_ph" class="form-control" id="email" placeholder="Tele. Ph no">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <label class="control-label col-lg-3 col-sm-3 col-md-3 col-xs-12" for="mobile">Mobile:</label>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-3 padding-left-0 padding-right-0 ">
                                <input type="text" name="mobile"class="form-control" id="mobile" placeholder="Mobile">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-group">
                        <label class="control-label col-lg-4 col-sm-4 col-md-4 col-xs-12" for="guardian_no">Fathers/Husband's/spouse's Mobile:</label>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding-left-0">
                            <input type="text" name="guardian_no" class="form-control" id="guardian_no" placeholder="">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding-left-0">
                            <input type="text" name="guardian_relation" class="form-control" id="guardian_relation" placeholder="Relation">
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <h4>EDUCATIONAL QUALIFICATIONS</h4>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-group">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" style="text-align: center">
                            <span>Qualification</span>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" style="text-align: center">
                            <span>Year Of Passing</span>
                        </div>
                        <label class="control-label col-lg-2 col-sm-2 col-md-2 col-xs-12 " for="email"></label>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-group">

                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <input type="text" name="quali[]" class="form-control" id="email" placeholder="B.C.A">
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <input type="text" name="yr[]" class="form-control date" id="email" placeholder="">
                        </div>
                        <label class="control-label col-lg-2 col-sm-2 col-md-2 col-xs-12 " for="email"><i class="fa fa-plus-circle fa-2x"></i></label>
                    </div>
                </div>
                <!--                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-group">
                
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                            <input type="name" class="form-control" id="email" placeholder="M.B.A">
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                            <input type="name" class="form-control" id="email" placeholder="2010-11">
                                        </div>
                                        <label class="control-label col-lg-2 col-sm-2 col-md-2 col-xs-12 " for="email"><i class="fa fa-plus-circle fa-2x"></i></label>
                                    </div>
                                </div>-->
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-group ">
                        <label class="control-label col-lg-2 col-sm-2 col-md-2 col-xs-12" for="email">Special Training:</label>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                            <input type="text" name="special_training[]" class="form-control" id="email" placeholder="Tally - Accounting Software" style="margin-bottom:10px;"><i class="fa fa-2x fa-plus-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <h4 style="text-">Working Experience</h4>
                        <table class="table-bordered">
                            <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>Name of Company</th>
                                    <th>Position</th>
                                    <th>Reference</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text"  class="form-control" id="email" placeholder="Year"></td>
                                    <td><input type="text" class="form-control" id="email" placeholder="Company"></td>
                                    <td><input type="text" class="form-control" id="email" placeholder="Position"></td>
                                    <td><input type="text" class="form-control" id="email" placeholder="Reference"></td>
                                    <td><i class="fa fa-2x fa-plus-circle"></i></td>
                                </tr>
<!--                                <tr>
                                    <td> <input type="name" class="form-control" id="email" placeholder=""></td>
                                    <td> <input type="name" class="form-control" id="email" placeholder=""></td>
                                    <td> <input type="name" class="form-control" id="email" placeholder=""></td>
                                    <td> <input type="name" class="form-control" id="email" placeholder=""></td>
                                </tr>
                                <tr>
                                    <td> <input type="name" class="form-control" id="email" placeholder=""></td>
                                    <td> <input type="name" class="form-control" id="email" placeholder=""></td>
                                    <td> <input type="name" class="form-control" id="email" placeholder=""></td>
                                    <td> <input type="name" class="form-control" id="email" placeholder=""></td>
                                </tr>
                                <tr>
                                    <td> <input type="name" class="form-control" id="email" placeholder=""></td>
                                    <td> <input type="name" class="form-control" id="email" placeholder=""></td>
                                    <td> <input type="name" class="form-control" id="email" placeholder=""></td>
                                    <td> <input type="name" class="form-control" id="email" placeholder=""></td>
                                </tr>-->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <h4 style="text-">Documents</h4>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-group ">
                            <label class="control-label col-lg-2 col-sm-2 col-md-2 col-xs-12" for="email" style="font-weight:bold;">Identify Proof -</label>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <input type="name" class="form-control" id="email" placeholder="0000000000">
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <!--<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">-->
                                <label class="btn btn-default btn-file" style="margin:0;">
                                    Browse <input type="file" style="display: none;">
                                </label>
                                <!--</div>-->
                            </div>
                            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-6">
                                <i class="fa fa-2x fa-plus-circle"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 form-group ">
                            <label class="control-label col-lg-2 col-sm-2 col-md-2 col-xs-12" for="email" style="font-weight:bold;">References -</label>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <input type="name" class="form-control" id="email" placeholder="0000000000" style="margin-bottom:10px;">
<!--                                <input type="name" class="form-control" id="email" placeholder="0000000000" style="margin-bottom:10px;">
                                <input type="name" class="form-control" id="email" placeholder="0000000000" style="margin-bottom:10px;">-->
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" style="margin-bottom:10px;">
                                <label class="btn btn-default btn-file" style="margin:0;">
                                    Browse <input type="file" style="display: none;">
                                </label>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-6">
                                <i class="fa fa-2x fa-plus-circle"></i>
                            </div>
                            <!--                            <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                                                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin-bottom:10px;">
                                                                <label class="btn btn-default btn-file" style="margin:0;">
                                                                    Browse <input type="file" style="display: none;">
                                                                </label>
                                                            </div>
                                                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin-bottom:10px;">
                                                                <label class="btn btn-default btn-file" style="margin:0;">
                                                                    Browse <input type="file" style="display: none;">
                                                                </label>
                                                            </div>
                                                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin-bottom:10px;">
                                                                <label class="btn btn-default btn-file" style="margin:0;">
                                                                    Browse <input type="file" style="display: none;">
                                                                </label>
                                                            </div>
                                                        </div>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="addItemManually"><?= lang('submit') ?></button>
        </div>
        <?= form_close() ?>
    </div>
</div>
</div>
<?= $modal_js ?>
