<?php
include('functions/userfunctions.php');
include('includes/header.php');
include('authenticate.php');

?>
<div class="py-4">
    <div class="container">
    <!-- <a href="checkout.php" class="btn btn-outline-primary mb-3 float-end">Proceed to Reservation</a> -->
        <h2>Cart</h2>
        <hr>
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div id="mycart">    
                        <?php $items = getCartItems();
                                
                            if(mysqli_num_rows($items) > 0)
                            {  
                                ?>
                                <div class="row align-items-center">
                                        <div class="col-md-5">
                                            <h6>Menu</h6>
                                        </div>
                                        <div class="col-md-5">
                                            <h6>Description</h6>
                                        </div>
                                        <div class="col-md-2">
                                            <h6>Action</h6>
                                        </div>
                                </div>
                                <div id="">
                                    <?php
                                        foreach ($items as $citem)
                                        {
                                            ?>
                                                <div class="card shadow-sm">
                                                    <div class="row align-items-center m-3">
                                                        <div class="col-md-2">
                                                            <img src="uploads/<?= $citem['image']?>" alt="Image" width="100%">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <h5><?= $citem['name']?></h5>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <?= $citem['description']?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button class="btn btn-danger deleteItem" value="<?= $citem['cid'] ?>">
                                                                <i class="fa fa-trash me-2"></i>
                                                                Remove
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php
                                        }
                                        ?>
                                        </div>
                                        <div class="float-end">
                                            <a href="checkout.php" class="btn btn-outline-primary mt-3">Proceed to Reservation</a>
                                        </div>
                                        <?php
                            }
                            else
                            {
                                ?>
                                <div class="card card-body shadow text-center">
                                    <h4 class="py-4">Your cart is empty</h4>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php')
?>    