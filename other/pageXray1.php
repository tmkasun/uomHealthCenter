<?php
//Start session
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>

</head>



<body marginheight="0px" marginwidth="0px" bgcolor="#000000">
<table width="1024px" bgcolor="#CC3399" height="130px" align="center">
 <tr>
   <td align="center"><br/><br/><br/><font face="Arial, Helvetica, sans-serif" size="+5"> University of Moratuwa Health Care Centre </font><br/><br/><br/>
   <div align="right" >
   		<table border="0">
   		<tr>
			<td>
			<font color="#FFCC00">
			<?php
				//retrieve session data
					echo "Welcome ".$_SESSION['USERNAME'];
			?>
		</font>
			
			
			</td>
			<td>
			
			 <a href="index.php"><img src="images/logout1.jpg"/> </a>
			
			</td>
		</tr>
		</table>
   		
   </div>  
   </td>
 </tr>
</table>
<form action="" method="">
<table width="1024px" height="auto" bgcolor="#CCCCFF" align="center" >
   <tr height="150px" valign="top">
	  <td width="200px" align="right" valign="top">
  		Chest XRay<br/>
  		<img src="gg" height="123" width="154" align="middle"/></td>
		<td height="150px" valign="top">
		 	   <table height="54" width="650px" bgcolor="#FFCC99" border="1px" bordercolor="#FFCC99">
				  <tr height="58px" bordercolor="#FFFFFF" valign="top">
				 	  <td width="100%" height="48">
					<p>Hr <br/><input type="text" name="Hr" size="14" height="22px"/></p>				    </td>
					    <td width="100%">
						<p>Fr <br/>
						  <input type="text" name="Fr" size="14" height="22px"/>
					</p></td>
					   <td width="100%">
						<p>INS <br/><input type="text" name="ins1" size="14" height="22px"/></p>
					  </td>
					   <td width="100%">
						<p>Chest Ex<br/><input type="text" name="cheX" size="14" height="22px"/></p>
					  </td>
					   <td width="100%">
						<p>INS <br/><input type="text" name="ins2" size="14" height="22px"/></p>
					  </td>
					   <td width="100%">
						<p>Ch. INSP <br/><input type="text" name="insp" size="14" height="22px"/></p>
					  </td>
					   <td width="100%">
						<p>INS <br/><input type="text" name="ins3" size="14" height="22px"/></p>
					  </td>
				  </tr>
		  </table>
				<table height="54" width="100%"  bgcolor="#FFCC99" border="1px" bordercolor="#FFFFFF">
				  <tr height="58px" bordercolor="#FFCC99">
					  <td width="25%" height="48">
						<p>Eyes<br/>L  <input type="text" name="L" size="12" height="22px"/></p>				    </td>
					  <td width="25%">
						<p><br/>
					    R  <input type="text" name="R" size="12" height="22px"/></p>				    
					</td>
					  <td width="23%">
						<p><br/><input type="checkbox" align="middle"> Glasses</p>
					 </td>
					 <td width="27%" align="right"><br/>					   Colout Vision &nbsp; 
						    <select name="vision" style="width:100px">
                              <option value="1">Normal</option>
                              <option value="2">Abnormal</option>
                            </select>				    </td>
				  </tr>
		  </table>
				<table height="49" width="100%" bgcolor="#FFCC99" border="1px" bordercolor="#FFCC99">
				  <tr height="58px" bordercolor="#FFFFFF">
					<td width="19%" height="43">
						<p>
				    Deday <input type="text" name="Deday" size="10" /></p>					</td>
					  <td width="21%">
						<p>
					    Mising <input type="text" name="mising" size="10" /></p>				    
					</td>
					<td width="19%">
						<p>
					    Filled <input type="text" name="Filled" size="10" /></p>				    
					</td>
					<td width="21%">
						<p>
					    Dentures <input type="text" name="Dentures" size="10" /></p>				    
					</td>
					<td width="20%" align="right">
						<p>
					    Gingivitis <input type="text" name="Dentures" size="10" /></p>				    
					</td>
				  </tr>
		  </table>
  </table>
		</td>
  </tr>
</table>
<hr color="#6633FF" size="3px" width="1024px" align="center"/>
<h3 align="center"><font size="+3"  face="Times New Roman, Times, serif" color="#FFFF99">General Physlque</font></h3>
<table width="1024px" align="center">
	<tr bgcolor="#CCCCFF">
		<th>
		    <h4>Posture</h4>
		</th>
		<th width="120">
			<h4>Condition</h4>
		</th>
		<th width="300">
			<h4>Remarks</h4>
		</th>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		Ears
		</td>
		<td width="120">
           <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>	
		</td>
		<td width="555">
		<input type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		Nose</td>
		<td width="120">
         <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
		<input type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		Mouth</td>
		<td width="120">
          <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
		<input type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		Throat</td>
		<td width="120">
          <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
		<input type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		Abdomen</td>
		<td width="120">
          <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
		<input type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		Hernail orifices</td>
		<td width="120">
          <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
		<input type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		Genitalia</td>
		<td width="120">
          <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
		<input type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		Anus</td>
		<td width="120">
          <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
          <input name="text2" type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		Nervous System</td>
		<td width="120">
          <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
          <input name="text2" type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		Varicose Veins</td>
		<td width="120">
          <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
          <input name="text2" type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		B.P</td>
		<td width="120">
          <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
          <input name="text2" type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		Skin</td>
		<td width="120">
          <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
          <input name="text2" type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		Hair</td>
		<td width="120">
          <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
          <input name="text2" type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		Nails</td>
		<td width="120">
          <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
          <input name="text2" type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		Thyroid</td>
		<td width="120">
          <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
          <input name="text2" type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		Heart</td>
		<td width="120">
          <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
          <input name="text2" type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		H.b.-</td>
		<td width="120">
          <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
          <input name="text2" type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		Skull</td>
		<td width="120">
          <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
          <input name="text2" type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		Upper Limbs</td>
		<td width="120">
          <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
          <input name="text2" type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		Lower Limbs</td>
		<td width="120">
         <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
          <input name="text2" type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		Spine</td>
		<td width="120">
          <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
          <input name="text2" type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		Thorax</td>
		<td width="120">
          <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
          <input name="text2" type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251" bgcolor="#CCCCCC">
		Others</td>
		<td width="120">
          <select name="vision" style="width:120px">
                              <option value="1">Good</option>
                              <option value="2">Fair</option>
							  <option value="2">Poor</option>
                            </select>
		</td>
		<td width="555">
          <input name="text2" type="text" size="103">
		</td>
	</tr>
	<tr>
		<td width="251">
		</td>
		<td width="120">
          
		</td>
		<td width="555" align="right">
          <input type="submit" name="subbut" value="    Submit   "/>
	  </td>
	</tr>
	
    </table>
   </form>
</body>
</html>
