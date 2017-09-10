<style>
    #upload-file-container2 {
    background: url('<?= base_url(); ?>img/imageupload.png') no-repeat;
    height: 60px;
}

#upload-file-container1 input {
    filter: alpha(opacity=0);
    opacity: 0;
    cursor: pointer;
}
#upload-file-container2 input {
    filter: alpha(opacity=0);
    opacity: 0;
    cursor: pointer;
}

    .abcd {
        width: 20% !important;
        display: inline-block;
        float: left
    }

    .abcd img {
        width: 100px;
        height: 80px;
        z-index: -1000
    }
</style>
<!-- page content -->
<div class="right_col" role="main">
          <div class="">
        
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add New <small>Tour</small></h2>
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
                    <br />
                    <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url(); ?>AdminController/setTourImages"  enctype="multipart/form-data">

                      <div class="form-group">
                                                            <div class="col-sm-9" style="padding: 10px 150px;">
                                        <table>
                                            <tr id="formdiv">
                                                <td id="filediv">
                                                    <div id="upload-file-container2">
                                                        <input id="file" name="tour_image[]" type="file" multiple=""
                                                               accept="image/*" 
                                                               style="height: 60px;width: 50px;">
                                                    </div>
                                                </td>
                                                <td style="padding-left: 20px;">
                                                    You can only select five images per Tour. if your selected more
                                                    than five the system will select first five images and you can set
                                                    the order at the next level.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="padding: 20px 0 20px 20px;">
                                                    <img src="<?php echo base_url(); ?>img/info.png" width="20"
                                                         height="20"/> *Product image size should be( 800 x 800)
                                                </td>
                                            </tr>
                                        </table>

                                        <div id="pvimgs">

                                        </div>
                                    </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          <button type="submit" class="btn btn-success">Add Tour Images</button>
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