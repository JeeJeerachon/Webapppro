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
    <script>
        function showHint(str) {
            if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "gethint.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
</head>

<body>
    <form name="myForm" onsubmit="return validateForm()" action="add_status.php" method="get" require>
        Suggestion: <span id="txtHint"> </span>
        <table border='1'>
            <!-- <tr>
                <td>STATUS ID</td>
                <td><input type="text" name="status_id"></td>
            </tr> -->
            <tr>
                <td>STATUS THAI</td>
                <td><input type="text" name="status_th" id="status_th" onkeyup="showHint(this.value)"></td>
            </tr>
            <tr>
                <td>STATUS ENGLISH</td>
                <td><input type="text" name="status_en"></td>
            </tr>
            <tr>
                <td colspan="2"> 
                <input type="submit" value="ADD">
                <input type="button" value="Check Duplicate" onclick="showHint()">
                </td>
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
                    echo "<form action='delete_status.php' >";
                    echo "<tr>" ;
                    echo  "<td><input type='text' name='status_id' value=".$row["STATUS_ID"]."></td>";
                    echo  "<td>".$row["STATUS_TH"]."</td>";
                    echo  "<td>".$row["STATUS_EN"]."</td>";
                    echo  "<td><input type='submit' value='Delete'></td>";
                    echo"</tr>";
                    echo "</form>";
                }
            } else {
                echo "0 results";
            }

            mysqli_close($conn);
        ?>
    </table>
</body>

</html>