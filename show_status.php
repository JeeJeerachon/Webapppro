<html>

<head>
    <script>
        function validateForm() {
            var x = document.forms["myForm"]["status_th"].value;
            if (x == "" || x == null) {
                alert("Status be filled out");
                document.getElementById("status_th").focus
                return false;
            }
        }
    </script>
</head>

<body>
    <form name="myForm" onsubmit="return validateForm()" action="add_status.php" method="get" require>
        <table border='1'>
            <!-- <tr>
                <td>STATUS ID</td>
                <td><input type="text" name="status_id"></td>
            </tr> -->
            <tr>
                <td>STATUS THAI</td>
                <td><input type="text" name="status_th" id="status_th"></td>
            </tr>
            <tr>
                <td>STATUS ENGLISH</td>
                <td><input type="text" name="status_en"></td>
            </tr>
            <tr>
                <td colspan="2"> <input type="submit" value="ADD"></td>
            </tr>
        </table>
    </form>
    <table border='1'>
        <tr>
            <td>STATUS_ID</td>
            <td>STATUS_TH</td>
            <td>STATUS_ENG</td>
        </tr>
        <?php
            require("connect.php");
            $sql = "SELECT STATUS_ID,STATUS_EN,STATUS_TH  FROM status";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    //echo "id: " . $row["STATUS_ID"]. " - Name: " . $row["STATUS_EN"]. " " . $row["STATUS_TH"]. "<br>";
                    
                    echo "<tr>" ;
                    echo  "<td>".$row["STATUS_ID"]."</td>";
                    echo  "<td>".$row["STATUS_TH"]."</td>";
                    echo  "<td>".$row["STATUS_EN"]."</td>";
                    echo"</tr>";
                }
            } else {
                echo "0 results";
            }

            mysqli_close($conn);
        ?>
    </table>
</body>

</html>