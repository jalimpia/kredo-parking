
<head>
    <title>Vehicle Parking Calculator</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #left-sidebar{
            background:#34495e;
            padding:25px;
            color:#ecf0f1;
        }
        #right-sidebar{
            background:#5e4434;
            padding:25px;
            color:#ecf0f1;
        }        
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm" id="left-sidebar">
                        <form id="calcForm" action="#" method="POST">
                            <h1>Vehicle Parking Calculator</h1>
                            <div class="row p-2">
                                <div class="col-4 text-right">
                                    <label class="font-weight-bold">Plate #</label>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">  
                                        <input style="text-transform:uppercase;" name="plate" type="text" class="form-control"  placeholder="Plate Number" required>
                                    </div>
                                </div>                            
                            </div>

                            <div class="row p-2">
                                <div class="col-4 text-right">
                                    <label class="font-weight-bold">Vehicle Type: </label>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">  
                                        <select class="form-control" name="type" required>
                                        <option value="" selected disabled hidden>Select Type</option>
                                            <option value="car">Car</option>
                                            <option value="motorbike">Motorbike</option>
                                            <option value="bike">Bike</option>
                                            <option value="truck">Truck</option>
                                        </select>
                                    </div>
                                </div>                            
                            </div>

                            <div class="row p-2">
                                <div class="col-4 text-right">
                                <label class="font-weight-bold">Time In: </label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">  
                                        <input maxlength="2" value="00" min="0" max="24" name="time_in_hr" type="number" class="form-control"  placeholder="Hrs" onblur="if(this.value<10 && this.value[0]!=0){this.value='0'+this.value}" required>
                                    </div>
                                </div>  
                                <div class="col-4">
                                    <div class="form-group">  
                                        <input maxlength="2" value="00" min="0" max="59" name="time_in_min" type="number" class="form-control"  placeholder="Mins" onblur="if(this.value<10 && this.value[0]!=0){this.value='0'+this.value}" required>
                                    </div>
                                </div>                                                       
                            </div>

                            <div class="row p-2">
                                <div class="col-4 text-right">
                                <label class="font-weight-bold">Time Out: </label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">  
                                        <input maxlength="2" value="00" min="0" max="24" name="time_out_hr" type="number" class="form-control"  placeholder="Hrs" onblur="if(this.value<10 && this.value[0]!=0){this.value='0'+this.value}" required>
                                    </div>
                                </div>  
                                <div class="col-4">
                                    <div class="form-group">  
                                        <input maxlength="2" value="00" min="0" max="59" name="time_out_min" type="number" class="form-control"  placeholder="Mins" onblur="if(this.value<10 && this.value[0]!=0){this.value='0'+this.value}" required>
                                    </div>
                                </div>                                                       
                            </div>

                            <div class="row p-2">
                                <div class="col-4">
                                </div>
                                <div class="col-4">
                                    <div class="form-group">  
                                        <input onclick="Clear()" type="button" class="btn btn-danger"  value="Reset">
                                    </div>
                                </div>  
                                <div class="col-4">
                                    <div class="form-group">  
                                        <input name="calcForm" type="submit" class="btn btn-info"  value="Calculate">
                                    </div>
                                </div>                                                       
                            </div>
                        </form>
                    </div>
                    <?php
                    if(isset($_POST['calcForm'])){
                        $time_in = CheckTime($_POST['time_in_hr'],$_POST['time_in_min']);
                        $time_out = CheckTime($_POST['time_out_hr'],$_POST['time_out_min']);
                        $type = $_POST['type'];

                        $check_time_in = preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $time_in);
                        $check_time_out = preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $time_out);
                        if($check_time_in==0 || $check_time_out==0){
                            echo '<script>alert("Test");history.back();</script>';
                            return;
                        }
                        
                        
                    ?>
                    <div class="col-sm" id="right-sidebar">
                          
                        <h1>Bills Payment:</h1>
                        <div class="row p-2">
                            <div class="col-6">
                                <label class="font-weight-bold">Plate #</label>
                            </div>
                            <div class="col-6">
                                <div class="form-group">  
                                    <span><?=$_POST['plate']?></span>
                                </div>
                            </div>                            
                        </div>

                        <div class="row p-2">
                            <div class="col-6">
                                <label class="font-weight-bold">Vehicle Type</label>
                            </div>
                            <div class="col-6">
                                <div class="form-group">  
                                    <span><?=$type?></span>
                                </div>
                            </div>                            
                        </div> 

                        <div class="row p-2">
                            <div class="col-6">
                                <label class="font-weight-bold">Time In:</label>
                            </div>
                            <div class="col-6">
                                <div class="form-group">  
                                    <span>
                                    <?php
                                    echo $time_in;
                                    ?>
                                    </span>
                                </div>
                            </div>                            
                        </div> 

                        <div class="row p-2">
                            <div class="col-6">
                                <label class="font-weight-bold">Time Out:</label>
                            </div>
                            <div class="col-6">
                                <div class="form-group">  
                                    <span>
                                    <?php
                                    echo $time_out;
                                    ?>
                                    </span>
                                </div>
                            </div>                            
                        </div> 


                        <div class="row p-2">
                            <div class="col-6">
                                <label class="font-weight-bold">Total Hours:</label>
                            </div>
                            <div class="col-6">
                                <div class="form-group">  
                                    <span>
                                    <?php
                                    echo ComputeTime($time_in,$time_out);
                                    ?>
                                    </span>
                                </div>
                            </div>                            
                        </div> 

                        <div class="row p-2">
                            <div class="col-6">
                                <label class="font-weight-bold">Payment:</label>
                            </div>
                            <div class="col-6">
                                <div class="form-group">  
                                    <span>
                                        <?php
                                            echo "Php " . ComputePayment(ComputeTime($time_in,$time_out),$type);
                                        ?>
                                    </span>
                                </div>
                            </div>                            
                        </div> 
                    </div>
                    <?php } ?>  
                </div>

            </div>
        </div>
    </div>
</body>

<?php

function CheckTime($hr,$min){
    if(isset($hr) && isset($min)){
        return $hr.":".$min;
    }
}

function ComputeTime($startdate,$enddate){
	$starttimestamp = strtotime($startdate);
	$endtimestamp = strtotime($enddate);
	$totalTime = abs($endtimestamp - $starttimestamp)/3600;
    return number_format((float)($totalTime), 2, '.', '');
    
}

function ComputePayment($totalTime, $type){
    if($type=="car"){

        $price = 30;
        $excess = $totalTime-3;
        if($excess>0){
            $price += ($excess * 5);
        }
        return number_format((float)($price), 2, '.', '');

    }else if($type=="motorbike"){

        $price = 20;
        $excess = $totalTime-2;
        if($excess>0){
            $price += ($excess * 5);
        }
        return number_format((float)($price), 2, '.', '');

    }else if($type=="bike"){

        return number_format((float)($totalTime * 20), 2, '.', '');

    }else if($type=="truck"){

        $price = 40;
        $excess = $totalTime-3;
        if($excess>0){
            $price += ($excess * 5);
        }
        return number_format((float)($price), 2, '.', '');

    }
}

?>

<script>
const Clear = function(){
    document.getElementById("calcForm").reset();
}
</script>