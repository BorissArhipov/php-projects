<!DOCTYPE html>
<html>
    <head>
        <title>Bob's Auto Parts - Order Results</title>
    </head>
    <body>
        <h1>Bob's Auto Parts</h1>
        <h2>Order Results</h2>
        <form action="index.php" method="post">
            <table style="border: 0px;">
                <tr style="background: #cccccc;">
                    <td style="width: 150px; text-align: center;">Item</td>
                    <td style="width: 15px; text-align: center;">Quantity</td>
                </tr>
                <tr>
                    <td>Tires</td>
                    <td><input type="text" name="tireqty" size="3"
                    maxlength="3" /></td>
                </tr>
                <tr>
                    <td>Oil</td>
                    <td><input type="text" name="oilqty" size="3"
                    maxlength="3" /></td>
                </tr>
                <tr>
                    <td>Spark Plugs</td>
                    <td><input type="text" name="sparkqty" size="3"
                    maxlength="3" /></td>
                </tr>
                <tr>
                    <td>Adress</td>
                    <td><input type="text" name="adress" /></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;"><input type="submit" value="Submit
                    Order" /></td>
                </tr>
            </table>
        </form>
        <?php 
            $tireqty = $_POST['tireqty'];
            $oilqty = $_POST['oilqty'];
            $sparkqty = $_POST['sparkqty'];
            $adress = $_POST['adress'];
            $date = date('Y-m-d H:i:s');

            $totalqty = 0;
            $totalqty = $tireqty + $oilqty + $sparkqty;

            echo "<p>Items ordered: ".$totalqty."<br />";

            $totalamount = 0.00;

            define('TIREPRICE', 100);

            define('OILPRICE', 10);

            define('SPARKPRICE', 4);

            $totalamount = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE;

            echo "Subtotal: $".number_format($totalamount,2)."<br />";

            $taxrate = 0.10; // local sales tax is 10%
            $totalamount = $totalamount * (1 + $taxrate);

            echo "Total including tax: $" . number_format($totalamount, 2) . "</p>";


            $document_root = $_SERVER['DOCUMENT_ROOT'];

            $fp = fopen("$document_root/../orders.txt", 'ab');

            $outputstring = $date."\t".$tireqty." tires \t".$oilqty." oil\t"
                .$sparkqty." spark plugs\t\$".$totalamount
                ."\t"." adress \t".$adress."\t";

            flock($fp, LOCK_EX);
            fwrite($fp, $outputstring, strlen($outputstring));
            flock($fp, LOCK_UN);
            fclose($fp);
        ?>
    </body>
</html>