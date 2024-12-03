<?php
include('functions/userfunctions.php');
include('includes/header.php');
?>
<div class="">
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-12">
                <h2 class="text-center">Browse our Menu by Category</h2>
                <div class="row">

                    <?php 
                        $categories = getAllActive('categories');

                        if(mysqli_num_rows($categories) > 0)
                        {
                            foreach($categories as $item)
                            {
                                ?>
                                    <div class="col-md-3 mb-2 mt-4">
                                        <a href="menu.php?category=<?= $item['name'];?>">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <img src="uploads/<?= $item['image'];?>" alt="Category Image" class="w-100">
                                                    <h4 class="text-center mt-3"><?= $item['name'];?></h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "No Category found";
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php')
?>    
