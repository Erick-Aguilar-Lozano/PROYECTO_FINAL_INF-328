<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
    <div class='col-md-12 right_col'>
        <div id='information'></div>

        <?php echo $error;?>

        <?php echo form_open_multipart('upload/do_upload');?>

        <input type="file" name="userfile" size="20" />

        <br /><br />

        <input type="submit" value="upload" />

        </form>
    </div>