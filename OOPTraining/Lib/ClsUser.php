<?php
include_once "DBConnection.php";
class ClsUser extends DBConnection{
	// public $con=parent::getConnection();
	public function __construct(){

	}
	public function addUser(){

	}

	public function updateUser(){

	}
	public function updateStatus(){

	}
	public function changePhoto(){

	}

	public function showUser($sql){
		$con=parent::getConnection();
        $result=$con->query($sql);
        if(mysqli_num_rows($result)<0){
        	exit;
        }else{
        	echo '
        	<table class="table table-responsive table-hover">
					<tr>
						<th>User ID</th>
						<th>User Name</th>
						<th>Full Name</th>
						<th>Email</th>
						<th>User Type</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
        	';
        	while($row=$result->fetch_object()){
        		if($row->role_id==1){
        			$ut="Admin";
        		}else{
        			$ut="User";
        		}
        		echo '
					<tr>
						<td>'.$row->user_id.'</td>
						<td>'.$row->user_name.'</td>
						<td>'.$row->full_name.'</td>
						<td>'.$row->Email.'</td>
						<td>'.$ut.'</td>
						<td><a href=""><img style="width:25px;height:25px" src="images/status/'.$row->status.'.png"/></a></td>
						<td><a href="#">Edit</a></td>
					</tr>
				

        		';
        	}//
        	echo '</table>';
        }
       
            
       
	}
}



?>