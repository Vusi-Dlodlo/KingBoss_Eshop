            <tr>
                <td class="Cartproduct">
                    <div class="cart-info">
                        <a href="SingleProduct.php?id=<?php echo $row['prodId'];?>"><img src="<?php echo $row['images']; ?>"></a>
                        <div>
                            <p><?php ?></p>
                            <small class="productPrice"><?php echo $row['cart_D']; ?></small>

                            <br />
                            <a type="button" class="btn btn-outline-dark btnremoveItem" href="remove.php?id=<?php echo  $row['id'];?>">Remove</a>
                        </div>
                    </div>
                </td>
                <td>
                    <span class="text-black" value="" id="Quant" runat="server"><?php echo $row['Cart_Q']; ?></span>
                </td>
                <td><span class="text-danger"> R </span><?php echo $row['Price']; ?> </td>
            </tr>
        </table>
        <div class="total-price mt-2">
            <table>
                <?php
                //getting the sum of all the products based on the user id
                $tot = "SELECT SUM(Price)*Cart_Q as Total FROM cart where userID  = '$id'";
                $total = mysqli_query($conn,$tot)or die("database error".mysqli_error($conn));
                while($row = mysqli_fetch_assoc($total))
                { 
                    $TotalP = $row['Total'];
                }
                ?>
                <tr>
                    <td>Total</td>

                    <td class="total-price-product"><span class="text-danger">R <?php echo $TotalP; ?></span></td>
                </tr>
            </table>
        </div>
        <div class="checkout">
            <div class="positioning">
                <a type="button" class="btn btn-info mt-2" href="checkout.php">Go To Checkout</a>
            </div>
        </div>