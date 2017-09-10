<!-- footer content -->
        <footer>
          <div class="pull-right">

          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url(); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url(); ?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url(); ?>vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?= base_url(); ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url(); ?>vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?= base_url(); ?>vendors/moment/min/moment.min.js"></script>
    <script src="<?= base_url(); ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?= base_url(); ?>vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?= base_url() ?>vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="<?= base_url(); ?>vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="<?= base_url(); ?>vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="<?= base_url(); ?>vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url(); ?>vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="<?= base_url(); ?>vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="<?= base_url(); ?>vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="<?= base_url(); ?>vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="<?= base_url(); ?>vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?= base_url(); ?>vendors/custom.js"></script>
    <script src="<?= base_url(); ?>vendors/sweetalert.min.js"></script>
	<!--Multiple image upload image preview-->
<script>
    $("#file").on('change', function () {
        // create an empty array for the files to reside.
        window.filesToUpload = [];
        if (this.files.length >= 1) {
            $("[id^=previewImg]").remove();
            $.each(this.files, function (i, img) {
                var reader = new FileReader(),
                    newElement = $("<div id='previewImg" + i + "' class='abcd'><img /></div>"),
                //this is for delete btn but actual array leement does not delete  because input array is read only
//                                deleteBtn = $("<span class='delete' onClick='deletePreview(this, " + i + ")'></span>").prependTo(newElement),
                    preview = newElement.find("img");

                reader.onloadend = function () {
                    preview.attr("src", reader.result);
                    preview.attr("alt", img.name);
                };
                try {
                    window.filesToUpload.push(document.getElementById("file").files[i]);
                } catch (e) {
                    console.log(e.message);
                }
                if (img) {
                    reader.readAsDataURL(img);
                } else {
                    preview.src = "";
                }

                newElement.appendTo("#pvimgs");
              // $("#formdiv").slideUp();
            });
        } else if (this.files.length >= 5) {
            alert("invalid");
        }

    });
</script>

<script>
    $('.edit-event').on('click', function(){
        var title = $(this).attr('data-title');
        var id = $(this).attr('data-id');

        $("#edit-event").val(title);
        $("#edit-event-id").val(id);
    });
</script>
<script>
    $(document).on('click','.remove-event', function () {
        var id= $(this).attr('data-id');
        swal({
                title: "Are you sure?",
                text: "You want to delete this?",
                type: "warning",   showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: true },
            function(isConfirm){
                if (isConfirm) {
                    $('#delete-event-'+id).trigger('submit');
                }
            });
    });
</script>

<script>
    $('.edit-package').on('click', function(){
        var title = $(this).attr('data-title');
        var tour_title = $(this).attr('data-tour-title');
        var tour_id = $(this).attr('data-tour');
        var id = $(this).attr('data-id');


        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "AdminController/showEvent",
            data: {package: id},
            success: function (res) {
            $('#event-show').html('');
            $('#event-show').html(res);
            }
        });


        $("#edit-package").val(title);
        $("#tour-option").val(tour_id);
        $('#tour-option option:selected').text(tour_title);
        $("#edit-package-id").val(id);


    });

    $(document).on('click','.remove-package', function () {
        var id= $(this).attr('data-id');
        swal({
                title: "Are you sure?",
                text: "You want to delete this?",
                type: "warning",   showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: true },
            function(isConfirm){
                if (isConfirm) {
                    $('#delete-package-'+id).trigger('submit');
                }
            });
    });
</script>
<script>
    $('.edit-service').on('click', function(){
        var title = $(this).attr('data-title');
        var id = $(this).attr('data-id');

        $("#edit-service").val(title);
        $("#edit-service-id").val(id);
    });

    $(document).on('click','.remove-service', function () {
        var id= $(this).attr('data-id');
        swal({
                title: "Are you sure?",
                text: "You want to delete this?",
                type: "warning",   showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: true },
            function(isConfirm){
                if (isConfirm) {
                    $('#delete-service-'+id).trigger('submit');
                }
            });
    });
</script>

<script>
    $('.edit-offer').on('click', function(){
        var title = $(this).attr('data-title');
        var id = $(this).attr('data-id');

        $("#edit-offer").val(title);
        $("#edit-offer-id").val(id);
    });

    $(document).on('click','.remove-offer', function () {
        var id= $(this).attr('data-id');
        swal({
                title: "Are you sure?",
                text: "You want to delete this?",
                type: "warning",   showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: true },
            function(isConfirm){
                if (isConfirm) {
                    $('#delete-offer-'+id).trigger('submit');
                }
            });
    });
</script>
  </body>
</html>