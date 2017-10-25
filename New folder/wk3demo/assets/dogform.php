<?php
/**
 * Created by PhpStorm.
 * User: calexande
 * Date: 10/16/2017
 * Time: 9:45 AM
 */
?>
<form method="post" action="#">
    Name: <input type="text" name="name" value="<?php echo $dog['name']; ?>" /><br />
    Male: <input type="radio" name="gender" value="M" <?php if ($dog['gender'] == 'M') { echo "checked='checked' "; } ?>/><br />
    Female: <input type="radio" name="gender" value="F" <?php if ($dog['gender'] == 'F') { echo "checked='checked' "; } ?>/><br />
   Fixed: <input type="checkbox" name="fixed" value="true" <?php if ($dog['fixed']) { echo "checked='checked' "; } ?>/><br />
    <input type="hidden" name="id" value="<?php echo $dog['id']; ?>" />
    <input type="submit" id="foo" name="action" value="<?php echo $button; ?>" />
</form>
