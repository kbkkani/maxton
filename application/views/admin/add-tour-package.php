<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Tour Package</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php if ($this->session->flashdata('add_package')): ?>
                            <?php if($this->session->flashdata('add_package')=='done'){ ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> Tour Package Saved.
                        </div>
                        <?php } if($this->session->flashdata('add_package')=='error'){?>

                        <div class="alert alert-danger">
                            <strong>Error!</strong> Tour Package Not Save.
                        </div>
                        <?php } ?>
                        <?php endif; ?>
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url(); ?>AdminController/addTourPackageInfo">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="package_title">Package Title <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="package_title" name="title" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tour">Select Tour <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="tour_id" class="form-control col-md-7 col-xs-12">
                                        <option value="">--Select--</option>
                                        <?php foreach ($tour as $row): ?>
                                            <option  value="<?= $row['id'] ?>"><?= $row['tour_title'] ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tour">Select Event <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <p style="padding: 5px;">
                                        <?php foreach ($event as $row): ?>
                                        <input type="checkbox" name="event_id[]" value="<?= $row['id'] ?>" required class="flat" /> <?= $row['tour_event'] ?>
                                        <?php endforeach; ?>
                                    <p>

                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                                    <button type="submit" class="btn btn-success">Add Package</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->

