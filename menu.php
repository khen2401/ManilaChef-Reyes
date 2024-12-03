<?php
include('functions/userfunctions.php');
include('includes/header.php');


if(isset($_GET['category']))
{

    $category_name = $_GET['category'];
    $category_data = getNameActive("categories", $category_name);
    $category = mysqli_fetch_array($category_data);

    if($category)
    {

        $cid = $category['id'];
        ?>
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a href="categories.php" class="btn btn-warning float-end">Back</a>
                        <h2><strong><?= $category['name'];?></strong></h2>
                        <hr>
                        <div class="row" >

                            <?php 
                                $menus = getMenusByCategory($cid);

                                if(mysqli_num_rows($menus) > 0)
                                {
                                    foreach($menus as $item)
                                    {
                                        ?>
                                            <div class="col-md-3 mb-2">
                                                <a href="menu-view.php?menu=<?= $item['name'];?>">
                                                    <div class="card shadow">
                                                        <div class="card-body">
                                                            <img src="uploads/<?= $item['image'];?>" alt="Menu Image" class="w-100">
                                                            <h6 class="text-center mt-2"><?= $item['name'];?></h6>
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
    }
    else
    {
        echo "Something went wrong";
    }
}
else
{
    echo "Something went wrong";
}
include('includes/footer.php')
?>    
