<?php
session_start();
include('includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-header text-center m-2">
                     <a href="index.php" class="btn btn-warning float-end">Home</a>
                    <h4>Calendar of Events</h4>
                </div>
                <div class="card-body border m-3">
                  <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php
include('includes/footer.php')
?>    