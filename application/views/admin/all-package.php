
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <?php if ($this->session->flashdata('edit_event')): ?>
                    <?php if($this->session->flashdata('edit_package')=='done'){ ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> Tour Package Edited.
                        </div>
                    <?php } if($this->session->flashdata('edit_package')=='error'){?>

                        <div class="alert alert-danger">
                            <strong>Error!</strong> Tour Package Not Save.
                        </div>
                    <?php } ?>
                <?php endif; ?>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Tour Package</h2>
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

                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tour</th>
                                <th>Tour Package</th>
                                <th>Tour Events</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            foreach($package as $package):
                                ?>
                                <tr>
                                    <th scope="row"><?= $package['id']; ?></th>
                                    <td><?= $package['tour_title']; ?></td>
                                    <td><?= $package['title']; ?></td>
                                    <td>
                                        <?php
                                        $CI = &get_instance();
                                        $pa_event = $CI->getPackageEvent($package['id']);
                                        foreach ($pa_event as $row){
                                            echo $row['tour_event'].'<br/>';
                                        }
                                        ?>
                                    </td>
                                    <td><button type="button" data-tour-title="<?= $package['tour_title']; ?>" data-title="<?php echo $package['title']; ?>" data-tour="<?php echo $package['tour_id']; ?>" data-id="<?php echo $package['id']; ?>" data-toggle="modal" class="edit-package btn btn-xs btn-primary" data-target="#editPackage">Edit</button>
                                        <button data-id="<?php echo $package['id']; ?>" class="btn btn-danger btn-xs remove-package" >Delete</button>
                                        <form id="delete-package-<?php echo $package['id']; ?>" action="<?php echo base_url()?>AdminController/removePackage" method="post">
                                            <input name="id" type="hidden" value="<?php echo $package['id']; ?>">
                                        </form>
                                    </td>
                                </tr>

                                <?php
                            endforeach;
                            ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /page content -->

<div id="editPackage" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Package</h4>
            </div>
            <form method="post" action="<?= base_url(); ?>AdminController/editTourPackage">


                <div class="modal-body div-padding">
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tour_title">Tour Package <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="edit-package" name="title" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tour_title">Tour<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control col-md-7 col-xs-12" name="tour_id" id="tour-option">
                                <?php foreach ($tour as $tour): ?>
                                <option value="<?= $tour['id'] ?>"><?= $tour['tour_title'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tour_title">Tour Events<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12" id="event-show">

                        </div>
                    </div>
                    <input type="hidden" id="edit-package-id" name="id" required="required" >

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" >Save</button>
                </div>
            </form>
        </div>

    </div>
</div>
