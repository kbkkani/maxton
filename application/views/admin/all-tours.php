
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Tours</h2>
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
                          <th>Tour Title</th>
                          <th>Tour Description</th>
                          <th>Tour Duration</th>
                          <th>Tour Cost</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php
                      foreach($tours as $tour):
                      ?>
                    <tr>
                          <th scope="row"><?= $tour['id']; ?></th>
                          <td><?= $tour['tour_title']; ?></td>
                          <td><?= $tour['tour_description']; ?></td>
                          <td><?= $tour['tour_duration']; ?></td>
                          <td><?= $tour['tour_cost']; ?></td>
                          <td><a href="<?= base_url(); ?>AdminController/editTour">Edit</a></td>
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
