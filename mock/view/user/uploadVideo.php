<?php
  session_start();
  require 'session.php';

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">

     <link rel="stylesheet" href="..\..\assets\fa\css\font-awesome.min.css">
     <link rel="stylesheet" href="..\..\assets\materialize\css\materialize.min.css">
     <link rel="stylesheet" href="..\..\assets\materialize\css\myStyle.css">
     <link rel="stylesheet" href="..\..\assets\sweetalert2\sweetalert2.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

     <title></title>
   </head>
   <body class="grey lighten-3">



     <?php require 'nav.php'; ?>

     <form id="frm_video" enctype="multipart/form-data">

     <div class="row" id="step1"><br>
       <div class="col s12 m12 l12 step1" >

         <div class="row">
           <div class="col s12 m12 l12">
             <h4>Upload Video</h4>
           </div><!--s12 m3 l3-->
         </div>


         <div class="row">

           <div class="input-field col s12 m3 l3">
             <label class="active">Document Type</label>
             <select  id="doc_type" name="doc_type" class="browser-default grey lighten-3">
               <option disabled selected>Select Document Type</option>
               <option value="private">Private</option>
               <option value="public">Public</option>
             </select>
           </div><!--end of gender-->


           <div class="col s12 m4 l4">
             <div class="input-field">
                <input type="text" name="video" id="video">
                <label for="video">Video Url</label>
              </div>
           </div><!--col s12 m7 l7-->



           <div class="col s12 m2 l2"><br>
             <button type="button" class="waves-effect btn right green darken-2" id="btn_step1">Next</button>
           </div><!--end of col s12 m2 l2-->

         </div><!--end of row-->




         </div><!--end of col s12 m12 l12-->
     </div><!--end of row-->


         <div class="row hide step2"  >

           <div class="col s12 m12 l12  " id="list_user" ><!--Table-->
             <div class="row">
               <div class="col s12 m6 l6">
                 <h5>Send Efile</h5>
               </div>

               <div class="col s12 m6 l6">
                 <label>Search </label>
                 <input type="text" class="search">
               </div>
             </div>


             <table class="bordered centered responsive-table striped">
               <thead>
                 <tr>
                     <th class="hide">ID</th>
                     <th>Recipient</th>
                     <th >Email</th>
                     <th colspan="2">Name</th>
                     <th>Title</th>
                     <th>Department</th>

                 </tr>
               </thead><!--end of thead-->

               <tbody class="list" id="tbl_user"></tbody><!--end of tbody-->
             </table><!--end of table-->

             <tfoot>
               <tr>
                 <td><ul class="pagination center"></ul></td>
               </tr>
             </tfoot><!--end of tfoot-->


               <div class="col s12 m9 l9">
                 <label>List of Recepients</label>

                 <textarea name="signatories" style="height:60px !important; resize:none;" id="target" readonly>
                 </textarea>
               </div>

               <div class="col s12 m3 l3 right-align"><br><br>
                 <button type="button" class="waves-effect btn green darken-2" id="btn_step2_back">Back</button>
                 <button type="button" class="waves-effect btn green darken-2 " id="btn_submit">Submit</button>


               </div>




             </div><!--end of col s12-->

         </div><!--end of row-->

    </form>


   </body>


   <script src="..\..\assets\jquery\jquery.min.js" charset="utf-8"></script>
   <script src="..\..\assets\jquery\jquery.validate.min.js" charset="utf-8"></script>
   <script src="..\..\assets\jquery\jquery.additionalMethod.min.js" charset="utf-8"></script>
   <script src="..\..\assets\materialize\js\materialize.min.js" charset="utf-8"></script>

   <script src="..\..\assets\sweetalert2\sweetalert2.min.js" charset="utf-8"></script>
   <script src="..\..\assets\listjs\list.min.js" charset="utf-8"></script>
   <script src="..\..\assets\listjs\list.pagination.min.js" charset="utf-8"></script>
   <script src="..\..\controller\user\fetch_user_notif.js" charset="utf-8"></script>
   <script type="text/javascript">
   $(document).ready(function(){

    //load content from server
    select_user("../../model/tbl_user/select/select_user_choice.php", "#tbl_user");


    //choose user from checkbox
    var arr = [];
     $(document).on('change', 'input[type=checkbox]',function(){
           if(this.checked){
              arr.push(this.value)
            }else {
              arr.splice(arr.indexOf(this.value),1);
            }
        $('#target').val(arr+ '');
     });


     //disable enter key
     $('.input-field').keypress(function(event) {
         if (event.keyCode == 13) {
             event.preventDefault();
         }
     });


     //validate step 1
     $('#btn_step1').on('click', function(){//validate on btn click

        if ($('#doc_type').valid() && $('#video').valid() == true) {
          $('.step2').removeClass('hide');
          $('.step1').addClass('hide');
        }

     });//end of btn click

     $(document).on('click', '#btn_step2_back', function() {
       $('.step1').removeClass('hide');
       $('.step2').addClass('hide');

      });//end of onclick

      $(document).on('click', '#btn_submit', function() {
        if ( !$.trim($("#target").val()) ){//check if textarea is empty or containes whitespaces
          swal({
          title: 'Error',
          text: "note: cannot create e-file without recepients",
          type: 'error',
          confirmButtonText: 'Ok',
          confirmButtonClass: 'btn waves-effect green darken-2',
          buttonsStyling: false
          });//end of swal
        }

        else{

            var formData = new FormData($("#frm_video")[0]);

            $.ajax({
                url: '../../model/tbl_file/insert/upload_video.php',
                type: 'POST',
                data: formData,
                async: false,
                success: function (data) {
                  swal({
                  title: 'Success',
                  text: "Video uploaded successfully",
                  type: 'success',
                  confirmButtonText: 'Ok',
                  confirmButtonClass: 'btn waves-effect green darken-2',
                  buttonsStyling: false
                  });//end of swal
                },
                cache: false,
                contentType: false,
                processData: false
            });//end of ajax

            return false;

      }//end of else
       });//end of onclick


     $("#frm_video").validate({//form validation
       rules:{
         signatories: {required: true},
         doc_type: {required: true},
         video: {required: true, url:true}
       },//end of rules

       messages: {
         signatories: {required: "<small class='right val red-text'>This field is required</small>"},
         doc_type: {required: "<small class='right val red-text'>This field is required</small>"},
         video: {required: "<small class='right val red-text'>This field is required</small>",
                  url:"<small class='right val red-text'>Must be a valid url</small>"}
         },//end of messages

       errorElement : 'div',
       errorPlacement: function(error, element) {
         var placement = $(element).data('error');
         if (placement) {
           $(placement).append(error)
         } else {
           error.insertAfter(element);
         }
       }//end of errorElement
     });//end of validate

   });//end of document.ready
   //////////////////////////////////Functions/////////////////////////////
   function select_user(model_url, html_class_OR_id){
     $.ajax({
       url:  model_url,
       method: "GET",
       success:function(Result){
       //push the result on id or class
         $(html_class_OR_id).html(Result);
       },//end of success function
       complete:function(){
         //initialize pagination after data loaded
        load_init();
       }//end of complete function

     });
   }//end of select_pending_user



   function load_init(){
     var monkeyList = new List('list_user', {
       valueNames: ['id','email','name','title','department'],
       page: 8,
       plugins: [ ListPagination({}) ]
     });
    // $(":checkbox").on("click", false);
     $('.materialboxed').materialbox();
     $('.button-collapse').sideNav({menuWidth: 255});
   }

   </script>
 </html>
