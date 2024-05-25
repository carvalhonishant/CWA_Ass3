<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Demonstrates some basic HTML content elements and CSS" />
  <meta name="keywords" content="HTML5, tags" />
  <meta name="author" content="A Lecturer"  />
  <title>Designing Tomorrow: AI Systems for a Smarter Future</title>
  <link href="styles/style.css" rel="stylesheet"/>
  
  
</head>
<!-- This is a comment. Indenting child elements makes the markup much more readable -->
<body>
<?php include 'menu.inc'; ?>
   <h2>Enhancements 2</h2>
   <p class="enh">
    Enhancement 1: Implementation of Timer <br></p>
    <ul>
      <li>To trigger the event, the user must visit the APPLY webpage (apply.html)</li>
      <li>When the DOMContentLoaded event occurs, signaling that the HTML content of the page has been fully loaded, the script will check if the current page's URL ends with apply.html</li>
      <li>If it does, it imposes a 5-minute time limit. Then it begins a countdown timer, which decrements every second.</li>
      <li>When the time limit is passed (5 minutes in this case), it shows a warning notice on the top of the webpage telling the user that the time has expired and redirects them to the home page. After a 9-second delay, it sends the user to the homepage.</li>
      <li>To implement this feature, the programmer needs to:<br>
        Embed the provided JavaScript code within a script tag in the HTML document or link it externally.<br>
        Ensure that the filename of the webpage where this feature should be implemented is apply.html<br>
        Make sure that the home page is named index.html and is located in the same directory as the apply.html page<br>
      </li>
      <li>Hyperlink to the page where the enhancement is implemented <a href="apply.php">APPLY</a> </li>
      <li>In order to complete this enhancement, I succesfully completed the activities on <a href="https://www.w3schools.in/html/">W3Schools</a> </li>
    </ul> <br>

   <br>
   <?php include 'footer.inc';?>
</body>

</html>