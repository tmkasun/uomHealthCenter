<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">	
	<head>
		<title>Notification POC</title>
		<script src="jquery.js" language="JavaScript" type="text/javascript"></script>
		<script src="notification.js" language="JavaScript" type="text/javascript"></script>
	<style>
		*{
		margin:0;
		padding:0;
		}
		#notification{
			position:absolute;
			bottom:0%;
			right:2%;
			height:175px;
			width:200px;
			border:1px solid black;
			border-bottom:0px;
		}
		#notificationClose{
			font-size:11px;
			cursor:pointer;
			width:100%;
			border-bottom:1px solid black;
		}
		#notificationIn{
			padding:10px;
			font-size:11px;
			
		}
	</style>
	</head>
	<body>
		<div id="notification">
			<div id="notificationClose">
				Notification message
				<div style="float:right">X</div>
			</div>
			<div id="notificationIn">
			</div>
		</div>
	</body>
</html>

