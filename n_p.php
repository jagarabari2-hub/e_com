<?php
    $conn = mysqli_connect('localhost','root','','shoping');

    if (isset($_POST['cat_id']))
        {
            $cat_id = mysqli_real_escape_string($conn, $_POST['cat_id']);
            $sql = "SELECT subcat_id,subcat_nm FROM sub_cat WHERE cat_id = '$cat_id'";
            $result = mysqli_query($conn,$sql);

            $sub_cat = array();
            while ($row = mysqli_fetch_assoc($result))
                {
                    $sub_cat[] = $row;
                }
            echo json_encode($sub_cat);
        }
    mysqli_close($conn);
?>