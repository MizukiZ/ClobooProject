<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CloBoo - About Us</title>
  
  <!--      include commom header such as boot strap -->
  <?php include '../_include/common_head.php';?>
  
  <script type="text/javascript">
    // sticky nav bar 
    $(document).ready(function(){
      $("nav").sticky({topSpacing:0});
    });
  </script>
  
</head>
<body>
  <div class="topbar"></div> 
  
  <!-- top bar -->
  <div id="intro" style="background:url('../_asset/cloboo_bg1.jpeg') fixed; overflow:hidden;">
    <div class="title">
      <h1>Hi!!<br>
      <span class="small">Welcome!</span><br>
      <span class="name">Cloboo</span><br>
      <span class="intro_line" style="background: url(../_asset/intro_line.png) no-repeat;"></span><span class="amp">&amp;</span><span class="intro_line" style="background: url(../_asset/intro_line.png) no-repeat;"></span><br>
      <span class="small">Let's Reading!</span></h1>
    </div> 
  </div> 
  
  <nav style="background:url(../_asset/intro_bg) repeat, url(../_asset/nav_bg.png) repeat-x; z-index: 1000;">
    <ul>
      <li><a href="../view/home.php">home</a></li>
      <li><a href="#about">about</a></li>
      <li><a href="#contact">contact</a></li>
    </ul>
  </nav> 

  <div class="work_bg_bottom" style="background: url(../_asset/work_bg_bottom.png) repeat-x; z-index: 400;"></div>

  <div class="services_bg_bottom" style="background: url(../_asset/services_bg_bottom.png) repeat-x; z-index: 500;"></div>

  <div id="about" style="background: url(../_asset/about_bg.png) repeat; z-index: 400;">
    <div class="container_16">
      <div class="subheader">
        <h2 style="text-align: center;">About Us</h2>
      </div>
      <div class="grid_5">
        <div class="about_pic" style="background: url(../_asset/logo4.png) no-repeat -800px -750px; display: inline-block;"></div>
        <div class="social">
          <ul>
            <li><a href="#"><div class="twitter sprite" style="background: url(../_asset/icn_twitter.png) no-repeat 0 0;
	display: inline-block; "></div></a></li>
            <li><a href="#"><div class="facebook sprite" style="background: url(../_asset/icn_facebook.png) no-repeat 0 0;
	display: inline-block;"></div></a></li>
            <li><a href="#"><div class="linkedin sprite" style="background: url(../_asset/icn_linkedin.png) no-repeat 0 0;
	display: inline-block;"></div></a></li>
          </ul>
        </div> 
      </div> 
      <div class="grid_6">
          <div class="about_copy">
            <h4>A greeting from Clobey!</h4>
            <h5>Hi there! we are Clobey! We are Cloboo's Staffs here to reply to your questions and give you the most satisfying answers.</h5>
            <p>In our bookstore that can display most books already on sale or the books coming soon, and those famous author’s books, and all the books are displayed in physical books and digital books on the website. </p>
            <p>We are here is to help you find the books you are looking for with a few simple words and requests. Also, we can give you the best recommendations from your shopping list if you want. </p>
            <p>We are here 24/7 (apart from your internet breakage) online to help you anytime, any day and anywhere.</p>
          </div>
      </div>
      <div class="grid_5">
        <div class="skills">
          <h4>What we can do for you!</h4>
          <ul>
            <li><div class="skill1" style="background: url(../_asset/skill1.png) no-repeat 0 0;"><p>Product Search</p></div></li>            
            <li><div class="skill2" style="background: url(../_asset/skill2.png) no-repeat 0 0;"><p>Nicely</p></div></li>
            <li><div class="skill3" style="background: url(../_asset/skill3.png) no-repeat 0 0;"><p>Saving Time</p></div></li>
            <li><div class="skill4" style="background: url(../_asset/skill4.png) no-repeat 0 0;"><p>Books recommend</p></div></li>
            <li><div class="skill5" style="background: url(../_asset/skill5.png) no-repeat 0 0;"><p>24/7</p></div></li>
            <li><div class="skill6" style="background: url(../_asset/skill6.png) no-repeat 0 0;"><p>Q/A</p></div></li>
          </ul>
        </div>
      </div>
    </div>
  </div> 
  
  <div class="about_bg_bottom" style="background: url(../_asset/about_bg_bottom.png) repeat-x; z-index: 500; margin-bottom: 20px"></div>
  
  <div id="contact">
    <div class="container_16">
      <div class="subheader">
        <h2 style="text-align: center;">Contact Us</h2>
      </div>

      <div class="grid_7">
        <!-- contact_form -->
        <div class="contact_form">
          <h4>Get in touch</h4>
          <form method="post">
            <input type="text" name="Name" id="name" value="Name" onfocus="this.value = this.value=='Name'?'':this.value;" onblur="this.value = this.value==''?'Name':this.value;">
            <input type="text" name="Email" id="email" value="Email" onfocus="this.value = this.value=='Email'?'':this.value;" onblur="this.value = this.value==''?'Email':this.value;">
            <input type="text" value="Subject" id="subject" onfocus="this.value = this.value=='Subject'?'':this.value;" onblur="this.value = this.value==''?'Subject':this.value;">
            <textarea name="Message" id="body" onfocus="this.value = this.value=='Message'?'':this.value;" onblur="this.value = this.value==''?'Message':this.value;">Message</textarea>
            <input type="submit" name="submit" id="submit" value="send" class="submit-button" onclick="return check_values();">
          </form>
          <div id="confirmation" style="display:none; position: relative; z-index: 600; font-family: 'Open Sans', sans-serif; font-weight: 300; font-size: 16px; color: #4e4e4e;">
          </div>
       </div> 
        <!-- //contact_form -->
     </div>

     <div class="grid_9">
       <!-- contact_info -->
        <div class="contact_info">
          <h4>Contact Information</h4>
          <div class="grid_4 alpha">
            <p><img src="../_asset/icn_phone.png" alt=""> +61 xxx xxx xxx</p>
            <p><img src="../_asset/icn_mail.png" alt="" href="mailto:clobooait@gmail.com">clobooait@gmail.com</p>
          </div>
          <div class="grid_4 omega">
            <p><img src="../_asset/icn_address.png" alt=""> AIT<br>
            <span class="address"> Level 13/120 Spencer St, Melbourne,</span><br>
            <span class="address">VIC 3000</span></p>
          </div>
       </div> 
       <!-- //contact_info -->

       <!-- map -->
       <?php include '../_include/common_map.php';?> 
       <!-- //map -->
     </div> <!-- end .grid_9 -->
   </div>
    <div class="footer">
      <div class="footer-logo">
        <h2><a href="../view/home.php">CloBoo <span>Reading is good thing</span></a></h2>
      </div>
      <div class="copy-right">
        <p>&copy;2018 CloBoo Book</p>
      </div>
    </div>
  </div>
</body>
</html>