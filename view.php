<?php 
	include "config.php";
?>
<h4 class="page-header"><i class="fa fa-user"></i> User Details</h4>
       
        <table class="table">
            <tr>
               
                <th>Name</th>
                <th>Phone Number</th>
                <th>E-mail</th>
                <th>Address</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <?php 
			$sql="select * from user";
			$res=$con->query($sql);
			if($res->num_rows>0)
			{
               
				while($row=$res->fetch_assoc())
				{
                   
					echo"<tr>";
                    echo"<td>{$row["Name"]}</td>";
					echo"<td>{$row["EMAIL"]}</td>";
                    echo"<td>{$row["Mobile"]}</td>";
                    echo"<td>{$row["Address"]}</td>";
					echo"<td><button type='button' class='btn btn-sm btn-info edit' data-id='{$row["id"]}'><i class='fa fa-edit'></i></td>";
					echo"<td><button type='button' class='btn btn-sm btn-danger del' data-id='{$row["id"]}'><i class='fa fa-trash'></i></td>";
					echo"</tr>";
				}
			}
		?>
            
        </table>