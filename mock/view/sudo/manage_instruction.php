<?php
  session_start();
  require 'session.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../../assets/fa/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="../../assets/materialize/css/sudo.css">
    <link rel="stylesheet" href="../../assets/materialize/css/animate.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body class="grey lighten-3">

      <?php require 'nav.php'; ?>
    <div class="container">


    <div class="row">

      <div class="col s12 m12 l12" id="list_instruction" ><!--Table-->
        <div class="row">
          <div class="col s12 m6 l6">
            <h5>Manage Instructions</h5>
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
                <th>Name</th>
                <th>Access</th>
                <th colspan="3">Action</th>

            </tr>
          </thead><!--end of thead-->

          <tbody class="list" id="tbl_instruction"></tbody><!--end of tbody-->
        </table><!--end of table-->

        <tfoot>
          <tr>
            <td><ul class="pagination center"></ul></td>
          </tr>
        </tfoot><!--end of tfoot-->
      </div><!--end of col s12-->

    </div><!--end of row-->




<!-- Modal Trigger -->
    <div class="row">
      <div class="fixed-action-btn vertical">
      <a href="#add_instruction_modal" class="btn-floating btn-large blue-grey darken-3 btn tooltipped waves-effect fa fa-plus fa-lg" data-position="left" data-delay="50" data-tooltip="Add position"></a>
      </div>
    </div>

  <!-- Modal Structure -->
 
  <form id="frm_add_instruction">
    <div id="add_instruction_modal" class="modal">
        <div class="modal-content">
        <h4>Add Instruction</h4><br>

        <div class="row">
            <div class="input-field col s12 m12 l12">
                <label for="name">Instruction Name</label>
                <input type="text" name="name" id="name">
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6 m6 l6">
                <label for="url">Video Url</label>
                <input type="text" name="url" id="url">
            </div>

            <div class="input-field col s6 m6 l6">
                <label class="active">Access</label>
                    <select  name="access"  class="browser-default">
                        <option disabled selected>Select Access</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                </select>
            </div><!--end of access-->

        </div>

  

            
        </div><!--end of modal content-->

        <div class="modal-footer">
            <button type="button" class="waves-effect blue-grey darken-3 btn-flat white-text" id="btn_add_instruction">Add</button>
        </div>
    </div>
  </form>


<a href="#delete_instruction_modal" class="hide trgr_delete_instruction blue-grey darken-3 btn waves-effect fa fa-trash fa-lg"></a>
    <form id="frm_delete_instruction">
    <div id="delete_instruction_modal" class="modal">
        <div class="modal-content">
        <h4>Delete Instruction</h4><br>
            <p>Are you sure you want to delete this instruction?</p>

            <div class="row hide">
                <div class="col s6">
                    <input type="text" name="delete_id" id="delete_id">
                </div>    

                <div class="col s6">
                    <input type="text" name="delete_rpw" id="delete_rpw" value="<?php echo $_SESSION['sudo_pw']?>">
                </div> 
            </div>

            <div class="row">
              <div class="col s12">
                <label for="delete_pw">Authenticate</label>
                <input type="password" class="active" name="delete_pw" id="delete_pw" placeholder="Password">
              </div>
            </div>

        </div><!--end of modal content-->

        <div class="modal-footer">
            <button type="button" class="waves-effect blue-grey darken-3 btn-flat white-text" id="btn_delete_instruction">Delete</button>
        </div>
    </div>
  </form>

  <a href="#edit_instruction_modal" class="hide trgr_edit_instruction blue-grey darken-3 btn waves-effect fa fa-trash fa-lg"></a>
    <form id="frm_edit_instruction">
    <div id="edit_instruction_modal" class="modal">
        <div class="modal-content">
        <h4>Edit Instruction</h4><br>
            <p>Are you sure you want to edit this instruction?</p>

            <div class="row hide">
                <div class="col s6">
                    <input type="text" name="edit_id" id="edit_id">
                </div>   

                <div class="col s6">
                    <input type="text" name="edit_rpw" id="edit_rpw" value="<?php echo $_SESSION['sudo_pw']?>">
                </div>  
            </div>

            <div class="row">
                <div class=" col s12 m12 l12">
                    <label  for="edit_name">Instruction Name</label>
                    <input  type="text" name="edit_name" id="edit_name">
                </div>
            </div>

            <div class="row">
                <div class=" col s6 m6 l6">
                    <label  for="edit_url">Video Url</label>
                    <input type="text" name="edit_url" id="edit_url">
                </div>

                <div class="input-field col s6 m6 l6">
                    <label class="active">Access</label>
                        <select  name="edit_access"  class="browser-default">
                            <option disabled selected>Select Access</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                    </select>
                </div><!--end of access-->

            </div>

            <div class="row">
              <div class="col s12">
                <label for="edit_pw">Authenticate</label>
                <input type="password" class="active" name="edit_pw" id="edit_pw" placeholder="Password">
              </div>
            </div>
            
        </div><!--end of modal content-->

        <div class="modal-footer">
            <button type="button" class="waves-effect blue-grey darken-3 btn-flat white-text" id="btn_edit_instruction">Edit</button>
        </div>
    </div>
  </form>

 





</div><!--end of container-->


  </body>

  <script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.validate.min.js" charset="utf-8"></script>
  <script src="../../assets/jquery/jquery.additionalMethod.min.js" charset="utf-8"></script>
  <script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.min.js" charset="utf-8"></script>
  <script src="../../assets/listjs/list.pagination.min.js" charset="utf-8"></script>
  <script src="../../controller/sudo/fetch_sudo_notif.js" charset="utf-8"></script>
  <script src="../../controller/sudo/manage_instruction.js" charset="utf-8"></script>
 


</html>
