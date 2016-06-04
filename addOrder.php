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
        .form-group {
            margin-top: 30px;
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
<div class="">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2 id="forms-horizontal"><center>Add New Order</center></h2>
            </br>
            <div class="bs">

                <form class="form-horizontal" action="order_insert_sql.php" method="post" role="form">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Order Id</label>
                        <div class="col-sm-8">
                            <input type="text" name="myform[orderID]" class="form-control" id="agentId" placeholder="Order Id">
                            <span class="form-highlight"></span>
                            <span class="form-bar"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label">Agent Id</label>
                        <div class="col-sm-8">
                            <input type="text" name="myform[agentID]" class="form-control" id="agentName" placeholder="Agent Id">
                            <span class="form-highlight"></span>
                            <span class="form-bar"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="myform[reciever]" class="form-control" id="agentContactNumber" placeholder="Name">
                            <span class="form-highlight"></span>
                            <span class="form-bar"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label">CHF</label>
                        <div class="col-sm-8">
                            <input type="text" name="myform[requestAmount]" class="form-control" id="agentContactNumber" placeholder="CHF">
                            <span class="form-highlight"></span>
                            <span class="form-bar"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label">Unit</label>
                        <div class="col-sm-8">
                            <input type="text" name="myform[exchangeRate]" class="form-control" id="agentContactNumber" placeholder="Unit">
                            <span class="form-highlight"></span>
                            <span class="form-bar"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" name="myform[toCurrency]" class="col-sm-4 control-label">Amount</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="agentContactNumber" placeholder="Amount">
                            <span class="form-highlight"></span>
                            <span class="form-bar"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-2">
                            <button type="submit" class="btn btn-raised btn-default ripple-effect">Save</button>
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

