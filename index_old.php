<!DOCTYPE HTML>
<html>
<head>
<title>Medical System- Login</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style2 {
	color: #000000
}
-->
</style>
</head>

<body>
	<div id="wrapper"
		style="width: 700px; margin-left: auto; margin-right: auto;"
		align="center">

		<div id="wrapper_login">
		
			<div id="header_login" style="height: 200px;">
				<img src="images/header.jpg" alt="Header_Image">
			</div>

			<div id="content_login" style="height: 400px;">

				<div id="login">
					<div id="loginmiddle">
						<form action="inc/login.php" method="Post">
							<table width="300px" height="167px" border="0" align="center"
								cellpadding="0" cellspacing="0">
								<tr valign="top">
									<td align="center" height="20px" valign="top" colspan="2"><h3>
											<font face="Arial, Helvetica, sans-serif" size="+2"> User
												Login </font>
										</h3>
									</td>
								</tr>
								<tr valign="top" height="20px">
									<td valign="top" align="right"><p class="style2">
											<font face=" Helvetica, sans-serif" size="+0">Username</font>
										</p>
									</td>
									<td align="center"><p>
											<input name="myusername" type="text"
												value="<?php print $_SESSION['DISPLAY_USER'] ?>" size="20" />
										</p>
									</td>
								</tr>
								
								<tr>
									<td align="right"><span class="style2"><font
											face=" Helvetica, sans-serif" size="+0">Password</font> </span>
									</td>
									<td align="center"><input type="password" name="mypassword"
										size="20" />
										</p>
									</td>
								</tr>
								<tr>
									<td></td>
									<td align="center"><input type="submit" value="    Login    "
										name="logBut" />
										</p>
									</td>
									</a>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<div
											style="font: Arial, Helvetica, sans-serif; color: #000099;">
											<?php if($_GET['login']== "loginError")
											echo "Username or password incorrect"?>
										</div>
									</td>
								</tr>
							</table>
						</form>



					</div>

				</div>
			</div>
			<!--End of content-->
			<div id="footer" style="height: 15px">
				<img src="images/fotter.jpg" alt="footer_image">
			</div>


		</div>
	</div>

</body>
</html>
