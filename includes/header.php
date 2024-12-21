
<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo"> <a href="index.php"><img src="assets/images/logg.png" alt="image"/></a> </div>
        </div>
        <div class="col-sm-9 col-md-10">
          <div class="header_info">
            <div class="header_widgets">
   <?php   if(strlen($_SESSION['login'])==0)
	{
?>
 <div class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">تسجيل الدخول / تسجيل</a> </div>
<?php }
else{

echo "العميد لتأجير السيارات يرحب بكم";
 } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">تبديل التنقل</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>
<?php
$email=$_SESSION['login'];
$sql ="SELECT FullName FROM tblusers WHERE EmailId=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 echo htmlentities($result->FullName); }}?><i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
           <?php if($_SESSION['login']){?>
            <li><a href="profile.php">إعداد الملف الشخصي</a></li>
              <li><a href="update-password.php">تغيير كلمة المرور</a></li>
            <li><a href="my-booking.php">حجوزاتي</a></li>
            <li><a href="post-testimonial.php">نشر شهادة</a></li>
          <li><a href="my-testimonials.php">شهاداتي</a></li>
            <li><a href="logout.php">تسجيل الخروج</a></li>
            <?php } else { ?>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">إعداد الملف الشخصي</a></li>
              <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">تغيير كلمة المرور</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">حجوزاتي</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">نشر شهادة</a></li>
          <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">شهاداتي</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">تسجيل الخروج</a></li>
            <?php } ?>
          </ul>
            </li>
          </ul>
        </div>
        <div class="header_search">
          <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
          <form action="search-carresult.php" method="get" id="header-search-form">
            <input type="text" placeholder="...بحث" class="form-control">
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
        </div>
      </div>
    
        <div class="collapse navbar-collapse" id="navigation" >
        <ul class="nav navbar-nav">
          <li><a href="index.php">الرئيسية</a>    </li>

          <li><a href="about-us.php?type=aboutus">من نحن</a></li>
          <li><a href="car-listing.php">البحث عن سيارة</a>
          <li><a href="page.php?type=faqs">الأسئلة الشائعة</a></li>
          <li><a href="contact-us.php">تواصل معنا</a></li>

        </ul>
      </div>
      
    </div>
  </nav>
  <!-- Navigation end -->

</header>