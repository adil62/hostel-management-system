<?php
// set start and end year range
$yearArray = range(2000, 2050);
var_dump($yearArray);
?>
<!-- displaying the dropdown list -->
<select name="year">
    <option value="">Select Year</option>
    <?php
    foreach ($yearArray as $year) {
        // if you want to select a particular year
        $selected = ($year == 2015) ? 'selected' : '';
        echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
    }
    ?>
</select>







 ?>