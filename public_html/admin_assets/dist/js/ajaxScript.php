<script>
    // This is for go Back Button at the top -- Start --
    function goBack() {
        window.history.back();
    }
    // This is for go Back Button at the top -- End --

    // This is for DataTable -- Start --
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    // This is for DataTable -- End --

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        $('.select2_pro').select2({
            multiple: true,
            theme: 'bootstrap4',
            ajax: {
                url: "<?php echo base_url('related_product')?>",
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.product_id
                            }
                        })
                    };
                },
                cache: true
            }
        });


        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        $('.select2bs4_2').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

    })

    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "/target-url", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    // myDropzone.on("addedfile", function(file) {
    //     // Hookup the start button
    //     file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
    // })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End


    $(document).on('submit', '#geniusform', function (e) {
        e.preventDefault();

        $('#message').html("<div class='alert alert-secondary'>Loading..... please wait</div>");
        var fd = new FormData(this);
        var geniusform = $(this);
        $('button.geniusSubmit-btn').prop('disabled', true);
        $.ajax({
            method: "POST",
            url: $(this).prop('action'),
            data: fd,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $("#loading-image").show();
            },
            success: function (data) {
                $("#loading-image").hide();
                // $('#message').hide();
                // $('#message').show();
                // $('#message').html(data);
                // $('#geniusform')[0].reset();
                // $('#reload').load(document.URL + ' #reload');
                // $('#reloadimg').load(document.URL + ' #reloadimg');
                // $('button.geniusSubmit-btn').prop('disabled', false);
                // $(window).scrollTop(0);
            }

        });

    });

    function getSubCat(id){
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('Admin/Products/get_subCategory')?>",
            data: {cat_id:id},
            beforeSend: function () {
                $("#loading-image").show();
            },
            success: function (data) {
                $("#subCatData").html(data);
            }

        });
    }


    // $('.add').on('click', add);
    // $('.remove').on('click', remove);
    function remove() {
        var last_chq_no = $('#total_chq').val();
        if (last_chq_no > 1) {
            $('#new_' + last_chq_no).remove();
            $('#total_chq').val(last_chq_no - 1);
        }
    }

    //option
    function add_option() {
        <?php $dat = getListInOption('', 'option_id', 'name', 'cc_option'); ?>
        var data = '<?php print $dat; ?>';

        var new_chq_no = parseInt($('#total_chq').val()) + 1;
        var new_input = "<div class='col-md-12 mt-3' id='new_" + new_chq_no + "' ><select name='option[]' onchange='optionVal(this.value,"+new_chq_no+" )'  style='padding: 3px;'><option value=''>Please select</option>"+data+"</select> <select name='opValue[]' id='valId_"+new_chq_no+"' style='padding: 3px;'><option value=''>Please select</option></select> <input type='number' placeholder='Quantity' name='qty[]' required> <input type='number' placeholder='Price' name='price_op[]' required> <a href='javascript:void(0)' onclick='remove_option(this)' class='btn btn-sm btn-danger' style='margin-top: -5px;'>X</a></div>";

        $('#new_chq').append(new_input);
        $('#total_chq').val(new_chq_no);
    }
    function  remove_option(data){
        $(data).parent().remove();
    }

    function optionVal(val,idview){

        $.ajax({
            method: "POST",
            url: "<?php echo base_url('Admin/Ajax/get_option_value')?>",
            data: {option_id:val},
            beforeSend: function () {
                $("#loading-image").show();
            },
            success: function (data) {
                $("#valId_"+idview).html(data);
                // alert(data);
            }

        });
    }


    //attribute
    function add_attribute() {
        <?php $dat = getListInOption('', 'attribute_group_id', 'name', 'cc_product_attribute_group'); ?>
        var data = '<?php print $dat; ?>';

        var new_chq_no = parseInt($('#total_att').val()) + 1;
        var new_input = "<div class='col-md-12 mt-3' id='new_" + new_chq_no + "' ><select name='attribute_group_id[]'  style='padding: 3px; text-transform: capitalize;' required><option value=''>Please select</option>"+data+"</select> <input type='text' placeholder='Name' name='name[]' required> <input type='text' placeholder='Details' name='details[]'> <a href='javascript:void(0)' onclick='remove_attribute(this)' class='btn btn-sm btn-danger' style='margin-top: -5px;'>X</a></div>";

        $('#new_att').append(new_input);
        $('#total_att').val(new_chq_no);
    }

    function  remove_attribute(data){
        $(data).parent().remove();
    }

    window.onload = function(){
        //Check File API support
        if(window.File && window.FileList && window.FileReader)
        {
            $('#files').live("change", function(event) {
                var files = event.target.files; //FileList object
                var output = document.getElementById("result");
                for(var i = 0; i< files.length; i++)
                {
                    var file = files[i];
                    //Only pics
                    // if(!file.type.match('image'))
                    if(file.type.match('image.*')){
                        if(this.files[0].size < 2097152){
                            // continue;
                            var picReader = new FileReader();
                            picReader.addEventListener("load",function(event){
                                var picFile = event.target;
                                var div = document.createElement("div");
                                div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                                    "title='preview image'/>";
                                output.insertBefore(div,null);
                            });
                            //Read the image
                            $('#clear, #result').show();
                            picReader.readAsDataURL(file);
                        }else{
                            alert("Image Size is too big. Minimum size is 2MB.");
                            $(this).val("");
                        }
                    }else{
                        alert("You can only upload image file.");
                        $(this).val("");
                    }
                }

            });
        }
        else
        {
            console.log("Your browser does not support File API");
        }
    }

    $('#files').live("click", function() {
        $('.thumbnail').parent().remove();
        $('result').hide();
        $(this).val("");
    });

    $('#clear').live("click", function() {
        $('.thumbnail').parent().remove();
        $('#result').hide();
        $('#files').val("");
        $(this).hide();
    });

    function selectState(country_id){
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('get_state')?>",
            data: {country_id:country_id},
            beforeSend: function () {
                $("#loading-image").show();
            },
            success: function (data) {
                $("#stateView").html(data);
            }

        });
    }

    function page_slug(Text) {
        var slug = Text.toLowerCase()
            .replace(/ /g, '-')
            .replace(/[^\w-]+/g, '');
        $("#slug").val(slug);
    }

    function changeStatus(id){
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('module_update')?>",
            data: {id:id},
            beforeSend: function () {
                $("#loading-image").show();
            },
            success: function (data) {

                $("#message").html('<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }

        });
    }

    //option
    function add_option_new() {
        <?php $dat = getListInOption('', 'attribute_group_id', 'name', 'cc_product_attribute_group'); ?>
        var data = '<?php print $dat; ?>';

        var new_chq_no = parseInt($('#total_chq').val()) + 1;
        var new_input = "<div class='form-group mt-3' id='new_" + new_chq_no + "' ><input type='text' class='form-control'  placeholder='value' name='value[]' style='width: 70%;float: left;'> <a href='javascript:void(0)' onclick='remove_option_new(this)' class='btn btn-sm btn-danger' style='margin-left: 5px;padding: 7px;'>X</a></div>";

        $('#new_chq').append(new_input);
        $('#total_chq').val(new_chq_no);
    }

    function  remove_option_new(data,id){
        $(data).parent().remove();
    }

    function  remove_option_new_remove(data,id){
        $(data).parent().remove();
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('option_remove_action')?>",
            data: {id:id},
            beforeSend: function () {
                $("#loading-image").show();
            },
            success: function (data) {
                $(data).parent().remove();
            }

        });

    }

    function reviewStatusUpdate(val,feedback_id){
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('reviews_status_update')?>",
            data: {feedback_id:feedback_id,status:val},
            beforeSend: function () {
                $("#loading-image").show();
            },
            success: function (data) {
                $("#message").html(data);

            }

        });
    }

    function removeImg(product_image_id){
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('product_image_delete')?>",
            data: {product_image_id:product_image_id},
            beforeSend: function () {
                $("#loading-image").show();
            },
            success: function (data) {
                $("#message").html(data);
                $('#reloadImg').load(document.URL + ' #reloadImg');
            }

        });
    }

</script>







