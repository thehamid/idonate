<h2> Setting iDonate</h2>

<form action="" method="post">

    <fieldset style="border: 1px solid #CCCCCC; padding: 10px;">
        <legend>Main Setting</legend>
        <p>
            <input type="checkbox" id="active_idonate" name="active_idonate"  <?php echo $active_idonate_get_option ?>>
            <label for="active_idonate">Active iDonate <sub>(idonate plugin active at checked)</sub> </label>
        </p>

    </fieldset>

    <fieldset style="border: 1px solid #CCCCCC; padding: 10px;">
        <legend>Gateway Setting</legend>
        <p>
           <label>API gateway</label>
           <input type="text" name="idonate_api_gateway" value="<?php echo get_option('idonate_api_gateway')?>">

        </p>

    </fieldset>





    <p>
        <?php submit_button('Save Setting'); ?>
    </p>
</form>
