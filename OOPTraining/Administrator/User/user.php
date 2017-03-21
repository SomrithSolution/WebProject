<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
<script language="javascript" type="text/javascript">
$(function () {
    $("#fileupload").change(function () {
        $("#dvPreview").html("");
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
        if (regex.test($(this).val().toLowerCase())) {
            if ($.browser.msie && parseFloat(jQuery.browser.version) <= 9.0) {
                $("#dvPreview").show();
                $("#dvPreview")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
            }
            else {
                if (typeof (FileReader) != "undefined") {
                    $("#dvPreview").show();
                    $("#dvPreview").append("<img />");
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("#dvPreview img").attr("src", e.target.result);
                    }
                    reader.readAsDataURL($(this)[0].files[0]);
                } else {
                    alert("This browser does not support FileReader.");
                }
            }
        } else {
            alert("Please upload a valid image file.");
        }
    });
});
</script>







<style type="text/css">
	#dvPreview
{
    filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image);
    min-height: 200px;
    max-height:200px;
    min-width: 200px;
    max-width: 200px;
    display: none;
}
#dvPreview img{
	width: 200px;
}
</style>
<form action="#" method="post">
<div class="row" style="margin-top:30px">
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-6">
				<h4>User Name</h4>
				<input type="text" class="form-control">
			</div>
			<div class="col-md-3">
				<h4>Full Name</h4>
				<input type="text" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<h4>Email</h4>
				<input type="email" class="form-control">
			</div>	
			<div class="col-md-3">	
				<h4>User Type</h4>
				<select class="form-control">
					<option>Admin</option>
					<option>User</option>
				</select>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-5">
				<h4>Password</h4>
				<input type="password" class="form-control">
			</div>
			<div class="col-md-4">
				<h4>Confirm</h4>
				<input type="password" class="form-control">
			</div>			
		</div>
	</div>
	<div class="col-md-3">
			<input id="fileupload" type="file" />
			
			<div id="dvPreview">
			</div>
	</div><!--end md-3-->
</div>
<div class="row" style="margin-top:30px">
	<div class="col-md-5"></div>
	<div class="col-md-2">
		<input type="submit" class="btn btn-success" value="Add New">
	</div>
	<div class="col-md-5"></div>
	
</div>

</form>

<div class="row table">
	<?php
		
		include "Lib/ClsUser.php";
		$objUser=new ClsUser();
		$sql="select * from tbuser";
		$objUser->showUser($sql);
	?>
</div>