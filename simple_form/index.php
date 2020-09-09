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
                    14 Chapter 1  PHP Crash Course
                    <td colspan="2" style="text-align: center;"><input type="submit" value="Submit
                    Order" /></td>
                </tr>
            </table>
        </form>
        <?php 
            if($_POST["tireqty"]) {
                $tireqty = $_POST["tireqty"];
                echo "<p>".$tireqty."</p>";
            }
           
        ?>
    </body>
</html>