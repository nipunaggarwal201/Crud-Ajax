<!DOCTYPE html>
<html>
    <head>
        <title>Registration Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
<body>
       
    <div class="container-fluid">
        <div class="jumbotron">
            <p>Registration Form</p>
        </div>
        
        <div class ="row">
            <div class = "col-md-3">
                <h4 class ="page-header"><i class = "fa fa-edit"></i>Add Users</h4>

                
                <form id = "frm" >

                    <div class = "form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name = "name" id ="name" placeholder="Your Name" value="" required>
                    </div>

                    <div class = "form-group">
                        <label>Mobile No.</label>
                        <input type="text" class="form-control" name = "mobile" id ="num" placeholder="Phone Number" value="" required>                    </div>

                    <div class = "form-group">
                        <label>E-mail</label>
                        <input type="text" class="form-control" name = "email" id ="email" placeholder="E-mail" value="">
                    </div>

                    <div class = "form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name = "address" id ="address" placeholder="Address " value="">
                    </div>

                    <div class = "form-group">
                        <input type="hidden" id="id" name ="id" value="0">
                        <input type="button" class ="btn btn-success" id="save" value="Save Details">
                    </div>
                </form>
            </div>
        <div class = "col-md-9" id="output">
            
        </div>
    </div>
</div>
        
        <script>
            $(document).ready(function(){
                $("#output").load("view.php");

                $("#save").click(function(){
                    var id=$("#id").val();
                    if(id==0)
                    {
                        $.ajax({
                            url:"insert.php",
                            type:"post",
                            data:$("#frm").serialize(),
                            success:function(d)
                            {
                                $("<tr></tr>").html(d).appendTo(".table");
                                $("#frm")[0].reset();
                                $("#id").val("0");
                            }
                        });
                    }
                    else
                    {
                        $.ajax({
                            url:"update.php",
                            type:"post",
                            data:$("#frm").serialize(),
                            success:function(d)
                            {
                                $("#output").load("view.php");
                                $("#frm")[0].reset();
                                $("#id").val("0");
                            }
                        });
                        
                    }
                });
                
                $(document).on("click",".del",function(){
                    var del = $(this);
                    var id=$(this).attr("data-id");
                    $.ajax({
                        url:"delete.php",
                        type:"post",
                        data:{id:id},
                        success:function()
                        {
                            del.closest("tr").hide();
                        }
                    });
                });
                
                //Update

                $(document).on("click",".edit",function(){
                    var row = $(this);
                    var id=$(this).attr("data-id");
                   $("#id").val(id);

                   var name= row.closest("tr").find("td:eq(0)").text();
                   $("#name").val(name);

                   var mobile= row.closest("tr").find("td:eq(2)").text();
                   $("#num").val(mobile);

                   var email= row.closest("tr").find("td:eq(1)").text();
                   $("#email").val(email);

                   var address= row.closest("tr").find("td:eq(3)").text();
                   $("#address").val(address);
                }); 
            
            });
               
    
         </script>
        
    </body>
</html>