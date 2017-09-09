<?php
  session_start();
  require 'session.php';

 ?>

  <!DOCTYPE html>
  <html>

  <head> 
    <meta charset="utf-8">

    <link rel="stylesheet" href="../../assets/fa/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/myStyle.css">
    <link rel="stylesheet" href="../../assets/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="../../assets/holdon/holdon.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title></title>
  </head>

  <body class="grey lighten-3">



    <?php require 'nav.php'; ?>

    <form id="frm_excel" enctype="multipart/form-data">

      <div class="row" id="step1"><br>
        <div class="col s12 m12 l12 step1">

          <div class="row">
            <div class="col s12 m12 l12">
              <h4>Upload Spreadsheet</h4>
            </div>
            <!--s12 m3 l3-->
          </div>


          <div class="row">

            <div class="input-field col s12 m3 l3">
              <label class="active">Document Type</label>
              <select id="doc_type" name="doc_type" class="browser-default grey lighten-3">
               <option disabled selected>Select Document Type</option>
               <option value="private">Private</option>
               <option value="public">Public</option>
             </select>
            </div>
            <!--end of gender-->


            <div class="col s12 m4 l4">
              <div class="file-field input-field">
                <div class="btn green darken-2">
                  <icon class="fa fa-upload fa-lg"></icon>
                  <span> File</span>
                  <input type="file" name="excel" id="excel">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" name="file_proxy" id="file_proxy" placeholder=".xlsx, .xlsm, xlsx, .xltx, .xltm">
                </div>
              </div>
            </div>
            <!--col s12 m7 l7-->



            <div class="col s12 m2 l2"><br>
              <button type="button" class="waves-effect btn right green darken-2" id="btn_step1">Next</button>
            </div>
            <!--end of col s12 m2 l2-->

          </div>
          <!--end of row-->




        </div>
        <!--end of col s12 m12 l12-->
      </div>
      <!--end of row-->


      <div class="row hide step2">

        <div class="col s12 m12 l12  " id="list_user">
          <!--Table-->
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
                <th>Email</th>
                <th colspan="2">Name</th>
                <th>Title</th>
                <th>Department</th>

              </tr>
            </thead>
            <!--end of thead-->

            <tbody class="list" id="tbl_user"></tbody>
            <!--end of tbody-->
          </table>
          <!--end of table-->

          <tfoot>
            <tr>
              <td>
                <ul class="pagination center"></ul>
              </td>
            </tr>
          </tfoot>
          <!--end of tfoot-->


          <div class="col s12 m9 l9">
            <label>List of Recepients</label>

            <textarea name="signatories" style="height:60px !important; resize:none;" id="target" readonly>
                 </textarea>
          </div>

          <div class="col s12 m3 l3 right-align"><br><br>
            <button type="button" class="waves-effect btn green darken-2" id="btn_step2_back">Back</button>
            <button type="button" class="waves-effect btn green darken-2 " id="btn_submit">Submit</button>


          </div>




        </div>
        <!--end of col s12-->

      </div>
      <!--end of row-->

    </form>


  </body>


  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.validate.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="../../assets/holdon/holdon.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>

  <script src="../../assets/sweetalert2/sweetalert2.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.pagination.min.js" charset="utf-8"></script>
  <script src="../../controller/user/fetch_user_notif.js" charset="utf-8"></script>
  <script src="../../controller/user/uploadExcel.js" charset="utf-8"></script>

  </html>