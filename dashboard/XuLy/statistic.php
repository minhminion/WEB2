<?php
    require("./../../XuLy/conSQL.php");

    $colMonth = [];
    for($i = 0 ; $i < 12 ; $i++)
    {
        $colMonth[$i] = "Tháng ".($i+1);
    }

    $output="";

    $data=[];
    for($i = 0 ; $i < count($colMonth) ; $i++)
    {
        $data[$i] = 0;
    }

    
    $step=100000;

    $sql='  SELECT SUM(receiptTotal) total,MONTH(receiptDate) month,YEAR(receiptDate) year 
            FROM `receipt` WHERE receipt.status = 1 AND YEAR(receiptDate) = YEAR(CURRENT_TIMESTAMP) 
            GROUP BY month,year';
    $rs = conSQL :: executeQuery($sql);
    while($row = mysqli_fetch_array($rs))
    {
        $month = $row['month'];
        $data[$month - 1] = $row['total']/$step; 
    }

    $myChart = new stdClass();
    $myChart->label = ArraytoString($colMonth);
    $myChart->value = ArraytoString($data);

    echo json_encode($myChart);

    function ArraytoString($data)
    {
        $out ="";
        foreach($data as $i => $n)
        {
            if($i+1 == count($data))
            {
                $out .= $n;
            }
            else{
                $out .= $n.",";
            }
        }
        return $out;
    }
?>