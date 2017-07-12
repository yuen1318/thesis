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
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>

	<body class="grey lighten-3">

		<?php require "nav.php";?>
<br>
		<div class="row">

			<div class="col s12 m12 l12">
				<table class="bordered centered responsive-table striped">
					<thead>
						<th>Table name</th>
						<th>Description</th>
						<th>Action</th>
					</thead>
 
					<tbody>
						<tr>
							<td>tbl_user</td>
							<td>List of users in the system</td>
							<td><a class="btn waves-effect green darken-2" href="" target="_blank"><span class="fa fa-download "></span>&nbsp;&nbsp;Backup</a></td>
						</tr>

						<tr>
							<td>tbl_template</td>
							<td>List of templates in the system</td>
							<td><a class="btn waves-effect green darken-2 "><span class="fa fa-download "></span>&nbsp;&nbsp;Backup</a></td>
						</tr>


						<tr>
							<td>tbl_efile</td>
							<td>List of efile in the system</td>
							<td><a class="btn waves-effect green darken-2" href="../../model/tbl_efile/select/backup_efile.php" target="_blank"><span class="fa fa-download "></span>&nbsp;&nbsp;Backup</a></td>
						</tr>

						<tr>
							<td>tbl_file</td>
							<td>List of files in the system (Excel, Powerpoint, Video)</td>
							<td><a class="btn waves-effect green darken-2" href="" target="_blank"><span class="fa fa-download "></span>&nbsp;&nbsp;Backup</a></td>
						</tr>

						<tr>
							<td>tbl_news</td>
							<td>List of newsfeed in the system</td>
							<td><a class="btn waves-effect green darken-2" href="" target="_blank"><span class="fa fa-download "></span>&nbsp;&nbsp;Backup</a></td>
						</tr>

						<tr>
							<td>tbl_photo</td>
							<td>List of photo in the system</td>
							<td><a class="btn waves-effect green darken-2" href="" target="_blank"><span class="fa fa-download "></span>&nbsp;&nbsp;Backup</a></td>
						</tr>


						<tr>
							<td>tbl_chat</td>
							<td>List of chat history in the system</td>
							<td><a class="btn waves-effect green darken-2" href="" target="_blank"><span class="fa fa-download "></span>&nbsp;&nbsp;Backup</a></td>
						</tr>



					</tbody>
				</table>
			</div>

		</div>



	</body>

	<script src="../../assets/jquery/jquery.min.js" charset="utf-8"></script>
	<script src="../../assets/materialize/js/materialize.min.js" charset="utf-8"></script>
	<script type="text/javascript">
		$(document).ready(function () {
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

		}); //end of document.ready
	</script>

	</html>