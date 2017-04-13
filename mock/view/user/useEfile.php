<?php
  session_start();
  require '..\..\model\dbConfig.php';
  #get the template id from url
  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $validURL = str_replace("&","&amp;",$url);
  $tmp_id = parse_url($validURL, PHP_URL_QUERY);

  if($tmp_id == ""){
    $content = "";
  }#end of if

  else{
    $sql ="SELECT * FROM tbl_template WHERE tmp_id=?";
      if (!empty($dbConn)) {
        $stmt =  $dbConn->prepare($sql);
        $stmt->bindValue(1, $tmp_id);
        $stmt ->  execute();

        if ($stmt) {
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          $content = $row['content'];
        }#end of if

        else {
          echo "error";
        }#end of else

      }#end of if

      else {
        echo "error";
      }#end of else
  }#end of else

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

     <div class="row"><br>
       <div class="col s12 m12 l12">

         <form id="frm_edit_template">

           <div class="col s12 m3 l3">
             <h4>Create Efile</h4>
           </div>

           <div class="col s12 m7 l7">
             <div class="input-field active">
               <label for="">Efile Name</label>
               <input type="text" name="name" id="name">
             </div>
           </div>

           <div class="col s12 m2 l2"><br>
             <button type="button" class="waves-effect btn right green darken-2" id="btn_submit">Submit</button>
           </div>

           <div class="col s12 m12 l12"><br>
             <textarea class="tinymce" name="content" id="id_content">
               <?php echo $content; ?>
             </textarea>
           </div>


         </form>


         <div class="row">

           <div class="col s12 m12 l12" id="list_user" ><!--Table-->
             <div class="row">
               <div class="col s12 m2 l2">
                 <h5>Send Efile</h5>
               </div>

               <div class=" col s12 m4 l4 input-field" >
                 <input type="text" id="target">
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
                     <th colspan="2">Email</th>
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
           </div><!--end of col s12-->

         </div><!--end of row-->



       </div>
     </div>
   </body>

   <script src="..\..\assets\jquery\jquery.min.js" charset="utf-8"></script>
   <script src="..\..\assets\jquery\jquery.validate.min.js" charset="utf-8"></script>
   <script src="..\..\assets\jquery\jquery.additionalMethod.min.js" charset="utf-8"></script>
   <script src="..\..\assets\materialize\js\materialize.min.js" charset="utf-8"></script>
   <script src="..\..\assets\tinymce\jquery.tinymce.min.js" charset="utf-8"></script>
   <script src="..\..\assets\tinymce\tinymce.min.js" charset="utf-8"></script>
   <script src="..\..\assets\sweetalert2\sweetalert2.min.js" charset="utf-8"></script>
   <script src="..\..\assets\listjs\list.min.js" charset="utf-8"></script>
   <script src="..\..\assets\listjs\list.pagination.min.js" charset="utf-8"></script>

   <script type="text/javascript">
   $(document).ready(function(){
     $('.button-collapse').sideNav({menuWidth: 255});

     $(document).on('change', '[type=checkbox]', function() {
       var arr = [];
         if (this.checked) {
           arr.push(this.value);

         }
         else {
          arr.splice(arr.indexOf(this.value), 1);
         }
         $('#target').val(arr + '');
         alert(arr);
     });





     $('.input-field').keypress(function(event) {
         if (event.keyCode == 13) {
             event.preventDefault();
         }
     });

     select_user("../../model/tbl_user/select/select_user_choice.php", "#tbl_user")

     $('#btn_submit').on('click', function() {//validate on btn click
       var content = tinyMCE.get('id_content').getContent(), patt;
       //Here goes the RegEx
       patt = /^<p>(&nbsp;\s)+(&nbsp;)+<\/p>$/g;

       if (content == '' || patt.test(content)) {//validate textarea
         swal({//alert
         title: 'Error',
         text: "note: Template-Name and Template-Content is required",
         type: 'error',
         confirmButtonText: 'Ok',
         confirmButtonClass: 'btn waves-effect green darken-2',
         buttonsStyling: false
         });//end of swal
         return false;
       }//end of if

       else if ($("#name").valid() == false) {//validate form
         swal({
         title: 'Error',
         text: "note: Template-Name and Template-Content is required",
         type: 'error',
         confirmButtonText: 'Ok',
         confirmButtonClass: 'btn waves-effect green darken-2',
         buttonsStyling: false
         });//end of swal
       }//end of else if

       else {
         tinyMCE.triggerSave();//finalize the content of tinyMCE
         edit_template("../../model/tbl_template/update/edit_template.php", "#frm_edit_template");
       }//end of else
     });//end of btn click



     $("#frm_edit_template").validate({//form validation
       rules:{
         name: {required: true}
       },//end of rules

       messages: {
         name: {required: "<small class='right val red-text'>This field is required</small>"}
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


   });
   //tinymce initialization
   tinymce.init({
     selector:"textarea.tinymce",
       height: 550,
       theme: 'modern',
       save_enablewhendirty: true,

       plugins: [
         'advlist autolink lists link image charmap  preview hr anchor pagebreak',
         'searchreplace wordcount visualblocks visualchars fullscreen',
         'insertdatetime  nonbreaking save table contextmenu directionality',
         'emoticons template paste textcolor colorpicker textpattern imagetools codesample   save'
       ],
       toolbar1: 'undo redo | insert  | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image preview media | forecolor backcolor',
       image_advtab: true,
       templates: [
         { title: 'Test template 1', content: 'Test 1' },
         { title: 'Test template 2', content: 'Test 2' }
       ],
       content_css: [
         'http://fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
         'http://www.tinymce.com/css/codepen.min.css'
       ]
   });

   //////////////////////////////////Functions/////////////////////////////
   function edit_template(model_url,form_name){
     $.ajax({
       url:  model_url,
       method:"POST",
       data: $(form_name).serialize(),
       dataType:"text",
       success:function(Result){
         if(Result == "error"){
           Materialize.toast("Sorry an error occured", 8000, 'red');
         }
         else if(Result == "success") {

           Materialize.toast("Edited Template Saved", 8000, 'green darken-2');
         }
       }//end of success function

     })//end of ajax
   }//end of add_template

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
         var monkeyList = new List('list_user', {
           valueNames: ['id','email','name','title','department'],
           page: 8,
           plugins: [ ListPagination({}) ]
         });
       }//end of complete function

     })
   }//end of select_pending_user

   </script>
 </html>
