<?php
//error_reporting(0);
if(isset($_POST['signup']))
{
$fname=$_POST['fullname'];
$email=$_POST['emailid']; 
$mobile=$_POST['mobileno'];
$password=md5($_POST['password']); 
$sql="INSERT INTO  tblusers(FullName,EmailId,ContactNo,Password) VALUES(:fname,:email,:mobile,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('تم التسجيل بنجاح، يمكنك الآن تسجيل الدخول');</script>";
}
else 
{
echo "<script>alert('هناك خطأ، الرجاء المحاولة مرة أخرى');</script>";
}
}

?>


<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<!-- <script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("كلمة المرور وتأكيد كلمة المرور غير متطابقين  !!");
document.signup.confirmpassword.focus();
return true;
}
return true;
}
</script> -->
<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">إنشاء حساب</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form  method="post" name="signup" >
				  
				  
				  
                <div class="form-group">
                  <input type="text" class="form-control" name="fullname" placeholder="الأسم الكامل" required="required">
                </div>
				  
                      <div class="form-group">
                  <input type="text" class="form-control" name="mobileno" placeholder="رقم الهاتف" maxlength="10" required="required">
                </div>
				  
				  
                <div class="form-group">
                  <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="البريد الإلكتروني" required="required">
                   <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="كلمة المرور" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="confirmpassword" placeholder="تأكيد كلمة المرور" required="required">
                </div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="terms_agree" required="required" checked="">
                  <label for="terms_agree">أنا أوافق <a href="#">على جميع الشروط والأحكام</a></label>
                </div>
                <div class="form-group">
                  <input type="submit" value="تسجيل" name="signup" id="submit" class="btn btn-block">
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>هل لديك حساب من قبل؟ <a href="#loginform" data-toggle="modal" data-dismiss="modal">تسجيل الدخول هنا</a></p>
      </div>
    </div>
  </div>
</div>