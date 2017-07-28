$(document).ready(function() {
    //modal init
    $('.modal').modal();
    //sidenave init
    $('.button-collapse').sideNav({
        menuWidth: 255
    });
    //dropdown init
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



    $("#notifadmin").load("../../model/tbl_user/select/fetch_admin_notif.php");
   
    //refresh every 3sec to fetch data
    setInterval(function() {
        $("#notifadmin").load("../../model/tbl_user/select/fetch_admin_notif.php");
       }, 3000);
}); //end of document.ready