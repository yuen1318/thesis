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



    $("#notifsudo").load("../../model/tbl_admin/select/fetch_sudo_notif.php");
   
    //refresh every 3sec to fetch data
    setInterval(function() {
        $("#notifsudo").load("../../model/tbl_admin/select/fetch_sudo_notif.php");
       }, 3000);
}); //end of document.ready