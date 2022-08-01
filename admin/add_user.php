<?php
if(isset($_POST['sbm'])){
    $user_mail=$_POST['user_mail'];
    $user_full=$_POST['user_full'];
    $user_pass=$_POST['user_pass'];
    $user_re_pass=$_POST['user_re_pass'];
    $user_level=$_POST['user_level'];
    $branch_id=$_POST['branch'];
    if($user_pass!=$user_re_pass){ $err1='<div class="alert alert-danger">Mật khẩu không khớp !</div>';}
    elseif(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM employeei WHERE user_mail='".$user_mail."'" )) >0){
        $err2 = '<div class="alert alert-danger">Email đã tồn tại !</div>';}
    else{$sql = "INSERT INTO employeei (user_name, user_mail, user_pass, user_level, branch_id)
        VALUES('$user_full', '$user_mail', '$user_pass', '$user_level', '$branch_id')";
        $query = mysqli_query($conn, $sql);
   header('location: index.php?page_layout=user');
        }
}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý thành viên</a></li>
				<li class="active">Thêm thành viên</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm thành viên</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
                                <?php if (isset($err1)) {
                                    echo $err1;
                                }elseif (isset($err2)) {
                                    echo $err2;
                                } ?>
                                <form role="form" method="post">
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input name="user_full" required class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="user_mail" required type="text" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input name="user_pass" required type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input name="user_re_pass" required type="password"  class="form-control">
                                </div>
                                <!-- <div class="form-group">
                                    <label>Chi nhánh</label>
                                    <select name="branch" class="form-control">
                                        <option value=1>Hà Nội</option>
                                        <option value=2>TP.HCM</option>
                                    </select>
                                </div> -->
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select name="user_level" class="form-control">
                                        <option value=1>Admin</option>
                                        <option value=2>Member</option>
                                    </select>
                                </div>
                                <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->