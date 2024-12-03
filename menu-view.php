<?php
include('functions/userfunctions.php');
include('includes/header.php');


if(isset($_GET['menu']))
{
    $menu_name =$_GET['menu'];
    $menu_data = getNameActive("menu", $menu_name);
    $menu = mysqli_fetch_array($menu_data);

    if($menu)
    {
        $categories = getAll("categories");
        $categoryMap = [];
        foreach ($categories as $category) {
            $categoryMap[$category['id']] = $category['name'];
        }
    ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="shadow">
                        <img src="uploads/<?= $menu['image']; ?>" alt="Menu Image" class="w-100">
                    </div>
                </div>
                <div class="col-md-8">
                    <a href="menu.php?category=<?= isset($categoryMap[$menu['category_id']]) ? $categoryMap[$menu['category_id']] : 'Category not found'; ?>" class="btn btn-warning float-end">Back</a>
                    <h2><?= $menu['name']; ?></h2>
                    <hr>
                    <h6>Menu Description:</h6>
                    <p><?= $menu['description']; ?></p>
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <p>Package Type: <?= $menu['type'] == '1'? "Special" : "Deluxe" ?></p>
                        </div>
                        <hr>
                        <p><strong>Note:</strong> The portion of the menu is calculated based on the number of person attending the event.</p>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
    else
    {
        echo "Menu not found";
    }
}
else
{
    echo "Something went wrong";
}
include('includes/footer.php')
?>