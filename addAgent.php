<?php

    error_reporting( ~E_NOTICE ); // avoid notice
    
    require_once 'config/database.php';
    require_once 'objects/agent.php';

    $database = new Database(); 
    $db = $database->getConnection();
    
    if(isset($_POST['btnsave']))
    {
        $name = $_POST['name'];
        $mobileNo = $_POST['mobileNo'];
        $customid = $_POST['customid'];

        if(empty($customid)){
            $errMSG = "Please Enter Agent ID.";
        }
        else if(empty($name)){
            $errMSG = "Please Enter Agent Name.";
        }
        else if(empty($mobileNo)){
            $errMSG = "Please Enter Mobile Number.";
        }
        
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $agent = new Agent($db);

            $agent->name = $name;
            $agent->country = $country;
            $agent->customid = $customid;
            
            if($agent->create())
            {

                $successMSG = "New record succesfully inserted ...";
                $name = "";
                $country = "";
                $customid = "";
            }
            else
            {
                $errMSG = "Error while inserting....";
            }
        }
    }
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Bootstrap Material Design - Forms (in Progress)</title>
    <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>



    <link rel="stylesheet" href="css/normalize.css">

    <link rel='stylesheet prefetch' href='css/gubja.css'>

    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
        .bs {
            margin-right: 0;
            margin-left: 0;
            background-color: #fff;
            border-color: #ddd;
            border-width: 1px;
            border-radius: 4px 4px 0 0;
            /*-webkit-box-shadow: none;*/
            box-shadow: none;
            position: relative;
            padding-right: 50px;
            margin: 0 -15px 15px;
            /*border-color: #e5e5e5 #eee #eee;*/
            border-style: solid;
            /*border-width: 1px 0;*/
            /*-webkit-box-shadow: inset 0 3px 6px rgba(0,0,0,.05);*/
            /*box-shadow: inset 0 3px 6px rgba(0,0,0,.05);*/
            box-sizing: border-box;
            display: block;
        }
        body {
            height: auto;
        }
    </style>
</head>

<body>
<div id="demo">
    <div class="btn-group btn-group-justified">
        <div class="btn-group">
            <a href="index.php" type="button" class="btn btn-default">Order List</a>
        </div>
        <div class="btn-group">
            <a href="addAgent.php" type="button" class="btn btn-default" style="border-left: solid;border-right: solid;
    border-width: 1px;">Add Agent</a>
        </div>
        <div class="btn-group">
            <a href="addOrder.php" type="button" class="btn btn-default" >Add Order</a>
        </div>
    </div>
</div>
<div class="container">
<?php
    if(isset($errMSG)){
            ?>
            <div class="alert alert-danger">
                 <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
    }
    else if(isset($successMSG)){
        ?>
        <div class="alert alert-success">
              <strong> <?php echo $successMSG; ?></strong>
        </div>
        <?php
    }
    ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2 id="forms-horizontal"><center>Add New Agent</center></h2>
            </br>
            <div class="bs">

                <form method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Agent Id</label>
                        <div class="col-sm-8">
                            <input type="text" name="customid" class="form-control" id="customid" placeholder="Agent Id">
                            <span class="form-highlight"></span>
                            <span class="form-bar"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label">Agent Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Agent Name">
                            <span class="form-highlight"></span>
                            <span class="form-bar"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3"  class="col-sm-4 control-label">Contact Number</label>
                        <div class="col-sm-8">
                            <input type="text" name="mobileNo" class="form-control" id="mobileNo" placeholder="Mobile Number">
                            <span class="form-highlight"></span>
                            <span class="form-bar"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-2">
                            <button type="submit" name="btnsave" class="btn btn-raised btn-default ripple-effect">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='js/gubja.js'></script>

    <script src="js/index.js"></script>
</body>
</html>

