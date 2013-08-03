<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>Registration Officer Register Student</title>
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
        <link rel="stylesheet" type="text/css" href="style/style.css" />

        <style type="text/css">
            <!--
            #apDiv1 {
                position:absolute;
                left:559px;
                top:235px;
                width:103px;
                height:87px;
                z-index:1;
            }
            #apDiv2 {
                position:absolute;
                left:730px;
                top:226px;
                width:113px;
                height:92px;
                z-index:2;
            }
            -->
        </style>
        <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
        <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>
    <body >

        <div id="wrapper">
           
<div id="content">
                <div id="header">
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>
                </div>

                <div id="menu">
                    <!--Reset the links back-->

      <ul>
                        <li ><a href="#" title="">Home</a></li>
                        <li><a href="#">Add New Exam</a></li>
                        <li><a href="ExaminationOfficerRegisterStudent.php" title="">Register For Exam</a></li>
                        <li><a href="ExaminationOfficerCloseExam.php" title="">Finalize</a></li>
                        <li><a href="ExaminationOfficerReports.php" title="">Reports</a></li>
                        <li><a href="ExaminationOfficerResetAttempt.php" title="">Reset Attempt</a></li>
                        <li><a href="ChangePassword.php" title="">PassWord&Settings</a></li>
                        <li><a href="Script/Logout.php" title="">Logout</a></li>
                  </ul>
                </div>
      <div id="stuff">
<div id="apDiv22">
                        <form method="post" action="Script/RegistrationOfficerRegisterStudent.php" enctype="multipart/form-data">
                          <table width="739">
                            <tr>
                              <td width="127"><span class="style5">Registration No<br/>
                              </span></td>
                            <td width="600" height="20"><span id="sprytextfield1">
                            <input type="text" size="10" name="RegistrationId" id="RegistrationId" onblur="" />
                            <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
                            </tr>
                            <tr> </tr>
                            <tr>
                              <td>Full Name:<br/>
                              </td>
                            <td><span id="sprytextfield2">
                                <input type="text" size="60" name="fname" id="fname" />
                              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                            </tr>
                            <tr>
                              <td> Address </td>
                            <td><span id="sprytextfield3">
                                <input type="text" size="100" name="address" id="address" />
                              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                            </tr>
                            <tr>
                              <td><span class="style5">Permanant Address<br/>
                              </span></td>
                              <td><span id="sprytextfield10">
                                <input type="text" size="100" name="paddress" id="paddress" />
                              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                            </tr>
                            <tr>
                              <td>Personal Telephone no<br/>
                              </td>
                            <td><span id="sprytextfield4">
                            <input type="text" size="10" name="ptelephone" id="ptelephone" />
                            <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
                            </tr>
                            <tr>
                              <td><span class="style5">Hand Phone/Mobile :<br/>
                              </span></td>
                            <td><span id="sprytextfield5">
                            <input type="text" size="10" name="mphone" id="mphone" />
                            <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
                            </tr>
                            <tr>
                              <td><span class="style5">nationality<br/>
                              </span></td>
<td><span id="sprytextfield6">
                                <input type="text" size="30" name="nationality" id="nationality" />
                              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                            </tr>
                            <tr>
                              <td><span class="style5">School<br/>
                              </span></td>
                <td><span id="sprytextfield7">
                                <input type="text" size="60" name="school" id="school" />
                              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                            </tr>
                            <tr>
                              <td><span class="style5">University<br/>
                              </span></td>
                        <td><span id="sprytextfield8">
                                <input type="text" size="60" name="university" id="university" />
                              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                            </tr>
                            <tr>
                              <td><span class="style5">Occupation<br/>
                              </span></td>
                              <td><span id="sprytextfield9">
                                <input type="text" size="60" name="occupation" id="occupation" />
                              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                            </tr>
                            <tr>
                              <td><span class="style5">Photograph<br/>
                              </span></td>
                              <td><input type="file" name="photo" id="photo" /></td>
                            </tr>
                            <tr>
                              <td><input type="reset" class="style5" value="Reset" /></td>
                              <td><input type="submit" value="Save" /></td>
                            </tr>
                          </table>
        </form>
        </div>

                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <br/>
                 
    </div>

          </div>



            <div id="bottom">
            </div>
        </div>
        <script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "custom", {pattern:"000000000B", validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "custom", {validateOn:["blur"], pattern:"0000000000"});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "custom", {validateOn:["blur"],pattern:"0000000000"});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6","none", {validateOn:["blur"]});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7","none", {validateOn:["blur"]});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8","none", {validateOn:["blur"]});
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9","none", {validateOn:["blur"]});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "none", {validateOn:["blur"]});
//-->
</script>
    </body>
</html>





