<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Demonstrates some basic HTML content elements and CSS" />
  <meta name="keywords" content="HTML5, tags" />
  <meta name="author" content="A Lecturer"  />
  <title>Designing Tomorrow: AI Systems for a Smarter Future</title>
  <link href="styles/style.css" rel="stylesheet"/>
  <script src="scripts/apply.js" defer></script>
  <script src="scripts/enhancements.js" defer></script>
  
</head>
<body>
<?php include 'menu.inc'; ?>
<?php
  require_once("settings.php");
  ?>
   <h2>Job Application form</h2>
   <p class="cen"> Please fill out the form below and our team will review it as soon as possible.</p>
   <form method="post" action="processEOI.php" id="registrationForm" novalidate="novalidate" >
    <fieldset id="gen">
      <legend>Your Details</legend>
      <label for="jobReference">Job Reference Number:*</label>
      <input type="text" id="jobReference" name="jobReference" size="30" readonly><br><br>
  
      <label for="name">First Name:*</label>
      <input type="text" placeholder="Enter your first name" id="firstname" name="firstname"  size="30"><br><br>
  
      <label for="lname">Last Name:*</label>
      <input type="text" placeholder="Enter your last name" id="lastname" name="lastname"  size="30"><br><br>
  
      <label for="dob">Date of Birth:*</label>
      <input type="text" id="dob" name="dob" required placeholder="dd/mm/yyyy">
  
    </fieldset>
   <aside id="add">
    <fieldset>
      <legend>Address Details</legend>
      <label for="saddr">Street Address:*</label>
      <input type="text" placeholder="Enter your street name" id="Address" name="Address" pattern="[a-zA-Z]{1,20}" size="45" maxlength="40" required><br><br>

      <label for="st">Suburb/Town:*</label>
      <input type="text" placeholder="Enter your suburb/town" id="suburb" name="suburb" pattern="[a-zA-Z]{1,20}" size="45" maxlength="40" required><br><br>
    
      
      <label for="postcode">Postcode:*</label>
      <input type="text" id="postcode" name="postcode" required placeholder="Enter post code" size="45" maxlength="4"> <br>
      <br>
      <label for="state">State:*</label> 
			<select required name="state" id="state">
				<option value="">Please select a state</option>			
				<option value="VIC">VIC</option>
				<option value="NSW">NSW</option>
				<option value="QLD">QLD</option>
                <option value="NT">NT</option>
                <option value="WA">WA</option>
                <option value="SA">SA</option>
                <option value="TAS">TAS</option>
                <option value="ACT">ACT</option>
			</select> 
    </fieldset>
<br>
    <fieldset>
      <legend>Contact Details</legend>
      <label for="email">Email address:</label>
      <input type="email" id="email" name="email" required size="45"><br>
<br>
      <label for="phoneno">Phone number:</label>
      <input type="text" id="phoneno" name="phoneno" pattern="[0-9\s]{8,12}" required size="45">

    </fieldset>


  </aside>


<br>
  <fieldset class="gen">
    <legend>Select Gender*</legend>
    	
    <input type="radio" name="gender" id="male" value="Male" checked="checked"/>
              <label for="male">Male</label>
              <input type="radio" name="gender" id="female" value="Female"/>
              <label for="female">Female</label>
              
              <input type="radio" name="gender" id="others" value="others"/>
              <label for="others-gender">Others</label>
<br>

	</fieldset>
  <br>
  <fieldset class="gen">
    <legend>Skills</legend>

    <label for="frontend">HTML</label>
          <input type="checkbox" id="frontend" name="frontend" value="Front-End" checked="checked" />

      <label for="backend">JavaScript</label>
          <input type="checkbox" id="backend" name="backend" value="Back-End" />

      <label for="communication">Verbal Communication</label>
          <input type="checkbox" id="communication" name="communication" value="Communication" />

      <label for="teamwork">Team-work</label>
              <input type="checkbox" id="teamwork" name="teamwork" value="Teamwork" /> 
              
      <label for="calculation">Calculation</label>
          <input type="checkbox" id="calculation" name="calculation" value="Calculation" />
  
          <p>
              <input type="checkbox" id="other-skills" name="other-skills" />
              <label for="other-skills">Others</label>
              <textarea id="textarea" name="otherskills" rows="5" cols="30"
                placeholder="Add your skills here ..."></textarea>
            </p>
    
  </fieldset>
  <br>
  <input type="submit" value="Apply" />
        <input type="reset" value="Reset Form" />
  <br> <br>
 </form>
 <br>
 <!--<div id="errorMessages"></div>!-->
<br>
<br>
<?php include 'footer.inc';?>
</body>

</html>

