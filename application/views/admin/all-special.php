
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <?php if ($this->session->flashdata('edit_offer')): ?>
                    <?php if($this->session->flashdata('edit_offer')=='done'){ ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> Special Offer Edited.
                        </div>
                    <?php } if($this->session->flashdata('edit_offer')=='error'){?>

                        <div class="alert alert-danger">
                            <strong>Error!</strong> Special Offer Not Save.
                        </div>
                    <?php } ?>
                <?php endif; ?>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Special Offers</h2>
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
                                <th>Special Offer</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            foreach($offer as $offer):
                                ?>
                                <tr>
                                    <th scope="row"><?= $offer['id']; ?></th>
                                    <td><?= $offer['special_offer_title']; ?></td>
                                    <td><button type="button" data-title="<?php echo $offer['special_offer_title']; ?>" data-id="<?php echo $offer['id']; ?>" data-toggle="modal" class="edit-offer btn btn-xs btn-primary" data-target="#editOffer">Edit</button>
                                        <button data-id="<?php echo $offer['id']; ?>" class="btn btn-danger btn-xs remove-offer" >Delete</button>
                                        <form id="delete-offer-<?php echo $offer['id']; ?>" action="<?php echo base_url()?>AdminController/removeOffer" method="post">
                                            <input name="id" type="hidden" value="<?php echo $offer['id']; ?>">
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

<div id="editOffer" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Special Offer</h4>
            </div>
            <form method="post" action="<?= base_url(); ?>AdminController/editOfferInfo">
            <div class="modal-body div-padding">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit-service">Special Offer <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="edit-offer" name="title" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <input type="hidden" id="edit-offer-id" name="id" required="required" >

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" >Save</button>
            </div>
            </form>
        </div>

    </div>
</div>
