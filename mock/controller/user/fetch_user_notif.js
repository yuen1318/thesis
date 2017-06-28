$(document).ready(function(){


  $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left', // Displays dropdown with edge aligned to the left of button
      stopPropagation: false // Stops event propagation
    });

  $("#notif").load("../../model/tbl_efile/select/fetch_user_notif.php");
  $("#notif_excel").load("../../model/tbl_efile/select/fetch_user_excel.php");
  $("#notif_powerpoint").load("../../model/tbl_efile/select/fetch_user_powerpoint.php");
  $("#notif_video").load("../../model/tbl_efile/select/fetch_user_video.php");
  $("#notif_efile").load("../../model/tbl_efile/select/fetch_user_efile.php");


  setInterval(function(){
    $("#notif").load("../../model/tbl_efile/select/fetch_user_notif.php");
    $("#notif_excel").load("../../model/tbl_efile/select/fetch_user_excel.php");
    $("#notif_powerpoint").load("../../model/tbl_efile/select/fetch_user_powerpoint.php");
    $("#notif_video").load("../../model/tbl_efile/select/fetch_user_video.php");
    $("#notif_efile").load("../../model/tbl_efile/select/fetch_user_efile.php");
  },3000);

});//end of document.ready
