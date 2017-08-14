 $(document).ready(function () {

  
          //get photos
          select_my_photo("../../model/tbl_photo/select/select_my_photo.php", "#tbl_my_photo");

               //copy img url
          $(document).on('click', '.btn_copy_img', function () {
            var pathdb = $(this).attr('data-photo-path');
            var path = pathdb.replace('../../', '');
            var host = window.location.host + "/";
            final = "http://" + host + path;  
               swal({
              title: 'Image url',
              input: 'text',
              inputValue: final,
              type: 'success',
              confirmButtonText: 'Ok',
              confirmButtonClass: 'btn waves-effect teal lighten-1',
              buttonsStyling: false
            })
          }); //end of onclick



          $(document).on('click', '.delete_photo', function () {
            //bind html5 data attributes to variables
            var delete_id = $(this).attr('data-delete-photo-id');
            //set values to id
            $('#delete_id').val(delete_id);
            //show modal
            $('.trgr_delete_photo').trigger('click');
          }); //end of onclick


          $('#btn_delete_photo').on('click', function (event) {
            delete_photo("../../model/tbl_photo/delete/delete_photo.php", "#frm_delete_photo");
          }); //end of onclick



          $('#frm_upload_photo').on('submit', function (e) { //validate on btn click
            e.preventDefault();

            var file_name = $('.file-path').val();
            var file_extension = file_name.split('.')[1];

            if (file_extension.toLowerCase() == 'jpg' || file_extension.toLowerCase() == 'jpeg'|| file_extension.toLowerCase() == 'png' ) {
              $.ajax({
                url: "../../model/tbl_photo/insert/upload_photo.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (Result) {
                  if (Result == "big") {
                    swal({
                      title: 'Error',
                      text: "File size to big, 2mb is the allowed size",
                      type: 'error',
                      confirmButtonText: 'Ok',
                      confirmButtonClass: 'btn waves-effect teal lighten-1',
                      buttonsStyling: false
                    })
                  } //end of if
                  else if (Result == "success") {
                    Materialize.toast("Photo successfully uploaded", 8000, 'teal lighten-1');
                  } //end of else if
                  else {
                    swal({
                      title: 'Error',
                      text: "An error has occured",
                      type: 'error',
                      confirmButtonText: 'Ok',
                      confirmButtonClass: 'btn waves-effect teal lighten-1',
                      buttonsStyling: false
                    })
                  } //end of else
                }, //end of success function

                complete: function () {
                  select_my_photo("../../model/tbl_photo/select/select_my_photo.php", "#tbl_my_photo");
                }

              }) //end of ajax
            } //end of if
            else {
              swal({
                title: 'Error',
                text: "Only jpg files are allowed",
                type: 'error',
                confirmButtonText: 'Ok',
                confirmButtonClass: 'btn waves-effect teal lighten-1',
                buttonsStyling: false
              }) //end of swal
            } //end of else
          }); //end of btn click
        }); //end of document.ready

        //////////////////////Functions///////////////////////
        function select_my_photo(model_url, html_class_OR_id) {
          $.ajax({
            url: model_url,
            method: "GET",
            success: function (Result) {
              //push the result on id or class
              $(html_class_OR_id).html(Result);
            }, //end of success function
            complete: function () {
              //initialize pagination after data loaded
              $('.materialboxed').materialbox();
              var monkeyList = new List('list_my_photo', {
                valueNames: ['photo_id', 'photo_name', 'co'],
                page: 8,
                plugins: [ListPagination({})]
              });
            } //end of complete function
          }) //end of ajax
        } //end of select_my_photo

        function delete_photo(model_url, form_name) {
          $.ajax({
            url: model_url,
            method: "POST",
            data: $(form_name).serialize(),
            dataType: "text",
            success: function (Result) {
              if (Result == "error") {
                Materialize.toast("Sorry an error occured", 8000, 'red');
              } else if (Result == "success") {
                Materialize.toast("Photo successfully deleted", 8000, 'teal lighten-1');
              }
            }, //end of success function
            complete: function () {
              select_my_photo("../../model/tbl_photo/select/select_my_photo.php", "#tbl_my_photo");
            } //end of complete function
          }) //end of ajax
        } //end of delete_photo