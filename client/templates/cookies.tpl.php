<?php $userTK = ( isset( $_SESSION["userTK"] ) && !empty( $_SESSION["userTK"] ) ) ? $_SESSION["userTK"] : ""; ?>

<!-- setting cookies to other domains -->
<img src="<?php echo BVS_COOKIE_DOMAIN; ?>/cookies.php?userTK=<?php echo $userTK; ?>" style="display: none;" />
<!-- setting cookies to others domains ends -->
