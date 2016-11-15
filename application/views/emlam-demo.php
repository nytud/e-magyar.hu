<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="emlam">
    <h4>Demo</h3>
    <div class="form-group">
        <textarea id="textbox" type="text" class="form-control" placeholder="<?php echo $this->lang->line('start_typing'); ?>"></textarea>
    </div>    
    <p><i><?php echo $this->lang->line('suggestions'); ?></i></p>
    <ul id="suggestions">

    </ul>
</div>

