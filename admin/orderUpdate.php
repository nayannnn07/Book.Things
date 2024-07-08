<?php
include 'adminSidebar.php';

                    if(isset($_POST['submit'])){
                        $id= $_POST['id'];
                        $price= $_POST['price'];
                        $quantity= $_POST['quantity'];

                        $total= $price * $quantity;

                        $status= $_POST['status'];
                        $fullname= $_POST['fullname'];
                        $contact= $_POST['contact'];
                        $email= $_POST['email'];
                        $address= $_POST['address'];
                       
                        $sql2 = "UPDATE orders SET
                            quantity = $quantity,
                            total = $total,
                            status = '$status',
                            fullname = '$fullname',
                            contact = '$contact',
                            email = '$email',
                            address = '$address'
                            WHERE id=$id
                        ";

                        $res2 = mysqli_query($conn,$sql2);

                        if($res2 == true){
                            $_SESSION['update'] = "<script>alert('Order Updated Successfully!');</script>";
                            header('location: orderManage.php');
                        }
                        else{
                            $_SESSION['update'] = "<script>alert('Failed to order update');</script>";
                            header('location: orderManage.php');
                        }
                    }
                ?>

<section id="interface">
    <div class="navigation">
        <div class="logo">
            <a href="dashboard.php"><img src="../images/logo.png" class="logo" alt="logo"></a>
        </div>
    </div>
    <div class="title-heading">
        <h2 class="heading">UPDATE ORDER</h2>

        <div class="maincontent">
            <div class="wrapper">

            <?php 
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];

                    $sql = "SELECT * FROM orders WHERE id=$id";
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                    if($count == 1){
                        $row = mysqli_fetch_assoc($res);

                        $title = $row['title'];
                        $price = $row['price'];
                        $quantity = $row['quantity'];
                        $status = $row['status'];
                        $fullname = $row['fullname'];
                        $contact = $row['contact'];
                        $email = $row['email'];
                        $address = $row['address'];
                    }
                    else{
                        header("location: orderManage.php");
                    }
                }
                else{
                    header('location: orderManage.php');
                }
            ?>

                <form action="" method="POST" class="table-form">
                    <div class="close-icon">
                        <a href="orderManage.php"><i class="fa fa-window-close"></i></a>
                    </div>
                    <table class="tbl-form">
                        <tr>
                            <td>Book Title</td>
                            <td><b><?php echo $title; ?></b></td>
                        </tr>

                        <tr>
                            <td>Price</td>
                            <td><b>NPR. <?php echo $price; ?></b></td>
                        </tr>


                        <tr>
                            <td>Quantity</td>
                            <td>
                                <input type="number" name="quantity" value="<?php echo $quantity; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Status</td>
                            <td>
                                <select name="status">
                                    <option <?php if($status=="Ordered"){echo "selected"; } ?> value="Ordered">Ordered</option>
                                    <option <?php if($status=="On Delivery"){echo "selected"; } ?>value="On Delivery">On Delivery</option>
                                    <option <?php if($status=="Delivered"){echo "selected"; } ?>value="Delivered">Delivered</option>
                                    <option <?php if($status=="Cancelled"){echo "selected"; } ?>value="Cancelled">Cancelled</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Customer Name</td>
                            <td>
                                <input type="text" name="fullname" value="<?php echo $fullname; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Customer Contact</td>
                            <td>
                                <input type="text" name="contact" value="<?php echo $contact; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Customer Email</td>
                            <td>
                                <input type="text" name="email" value="<?php echo $email; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Customer Address</td>
                            <td>
                                <textarea name="address" cols="30" rows="5"><?php echo $address; ?></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" name="price" value="<?php echo $price; ?>">

                                <input type="submit" name="submit" value="Update Order" class="btn-primary">
                            </td>
                        </tr>

                    </table>


                </form>

                
            </div>
        </div>
    </div>
</section>