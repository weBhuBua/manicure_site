<?php

echo '<div class="col-md-4 col-sm-4">';
echo '<div class="card mb-4 shadow-sm">';
echo '<div class="bd-placeholder-img card-img-top" ><img width = "100%" height = "330" focusable = "false" role = "img"
                                                              class="col_img"';

echo "src='{$imgWay}'></div>";
}
?>

<div class="card-body">

    <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
            <?php
            //                  echo  "<div class='btn'><form method='POST'><input name='delete{$image['id']}' type='submit' class='btn btn-outline-info' value='Удалить'></form></div>";
            echo "<form method='POST'><button name='delete{$image['id']}' class='btn btn-outline-info'>Удалить</button></form>";
            ?>

        </div>
        <!-- / btn-group -->
        <?php
        echo "<small class='text-muted'>{$image['id']}</small>";
        ?>
    </div>
</div>
<!-- / card-body -->
</div>
</div>
<!--/ col-md-4  -->
