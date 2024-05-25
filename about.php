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
<figure>
      <img src="images/me.jpg" alt="MyPicture">
   </figure>

   <h2>About Page</h2>
   <section class="sec">
    <h3 class="cen">My Details</h3>
    <div id="abt">
      <dl>
        <dt>Name:</dt>
        <dd>Nishant Maxie Carvalho</dd>
        <dt>Student Number:</dt>
        <dd>105015672</dd>
        <dt>About Me:</dt>
        <dd>I am an organised, efficient and hard working person, and am willing to discover and accept new ideas which can be put into practice effectively. I am a good listener and learner, able to communicate well with a group and on an individual level. I am able to motivate and direct my talents and skills to meet objectives.</dd>
        <dt>My Hobbies:</dt>
        <dd>Air sports, Board sports,Cycling, Freerunning, Jogging, Motor sports, Gymnastics, Ice hockey, Kart racing, Netball, Paintball, Running, Shooting, Squash</dd>
        <dt>Tutor's Name:</dt>
        <dd>Zeqian Dong</dd>
        <dt>Course:</dt>
        <dd>COS60004 - Creating Web Applications</dd>
        <dt>Student Email:</dt>
        <dd><a href="mailto:105015672@student.swin.edu.au">105015672@student.swin.edu.au</a></dd>
        <dt>Personal Email:</dt>
        <dd><a href="mailto:carvalhonishant7.nc@gmail.com">carvalhonishant7.nc@gmail.com</a></dd>
        </dl>
    </div>
    
   </section>
   

   
   <table>
      <caption>Swinburne Time-Table</caption>
      <thead>
        <tr>
          <th>Day/Period</th>
          <th>08:00 AM</th>
          <th>09:00 AM</th>
          <th>10:00 AM</th>
          <th>11:00 AM</th>
          <th>12:00 PM</th>
          <th>01:00 PM</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <th>Monday</th>
          <td colspan="2">No Class</td>
          <td colspan="2" class="COS60004">COS60004</td>
          <td colspan="2" id="yel">Cyber Ethics</td>
        </tr>
        <tr>
          <th>Tuesday</th>
          <td colspan="3" class="COS60002">COS60002</td>
      
          <td colspan="3" class="COS60008">COS60008</td>
        </tr>
        <tr>
          <th>Wednesday</th>
          <td colspan="2" class="COS60008">COS60008</td>
          <td colspan="2" class="COS60004">COS60004</td>
          <td colspan="2">No Class</td>
        </tr>
        <tr>
          <th>Thursday</th>
          <td colspan="4" class="COS60002">COS60002</td>
          <td colspan="2" class="COS60004">COS60004</td>
        </tr>
        <tr>
          <th>Friday</th>
          <td colspan="6">No Class</td>
        </tr>
      </tbody>
 </table>

<br>
<?php include 'footer.inc';?>
</body>

</html>