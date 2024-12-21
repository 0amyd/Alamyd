<?php
if(isset($_POST['emailsubscibe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<script>alert('مشترك بالفعل');</script>";
}
else{
$sql="INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
$query = $dbh->prepare($sql);
$query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('تم الإشتراك بنجاح');</script>";
}
else
{
echo "<script>alert('هناك خطأ، الرجاء المحاولة مرة أخرى');</script>";
}
}
}
?>

<footer>
  
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-md-6">
          
          <ul>


          <li><a href="about-us.php?type=aboutus"> من نحن</a></li>
            <li><a href="page.php?type=faqs">الأسئلة الشائعة</a></li>
            <li><a href="page.php?type=privacy">سياسة الخصوصية</a></li>
          <li><a href="page.php?type=terms">الشروط والأحكام</a></li>
               <li><a href="admin/">تسجيل دخول الأدمن</a></li>
          </ul>
        </div>

        <div class="col-md-3 col-sm-6">
          <h6>اشترك في القناة الاخبارية</h6>
          <div class="newsletter-form">
            <form method="post">
              <div class="form-group">
                <input type="email" name="subscriberemail" class="form-control newsletter-input" required placeholder="أدخل البريد الإلكتروني" />
              </div>
              <button type="submit" name="emailsubscibe" class="btn btn-block">اشتراك <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </form>
            <p class="subscribed-text">*نرسل عروض رائعة وخاصة وأحدث اخبار السيارات لمستخدمينا المشتركين كل اسبوع.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-pull-6">
        <p class="copy-right">حقوق النشر محفوظة ل موقع &copy; 2023العميد لتأجير السيارات</p>
        </div>
      </div>
    </div>
  </div>
</footer>
