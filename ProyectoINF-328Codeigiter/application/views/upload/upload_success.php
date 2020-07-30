<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
    <div class='col-md-12 right_col'>
        <div id='information'></div>
            <h3>Your file was successfully uploaded!</h3>
            <ul>
            <?php foreach ($upload_data as $item => $value):?>
            <li><?php echo $item;?>: <?php echo $value;?></li>
            <?php endforeach; ?>
            </ul>
            <p><?php echo anchor('upload', 'Upload Another File!'); ?></p>
    </div>