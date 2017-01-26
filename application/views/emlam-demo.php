<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="emlam">
    <h4>Demo</h3>
    <p>Start typing something in the text field below. Every time you press the space key a word list will appear offering possible ways to continue the text typed in so far. You can choose from among the words offered by clicking on them, or you may continue typing.</p>
    <div class="form-group">
        <textarea id="textbox" type="text" class="form-control" placeholder="<?php echo $this->lang->line('start_typing'); ?>"></textarea>
    </div>    
    <p><i><?php echo $this->lang->line('suggestions'); ?></i></p>
    <ul id="suggestions">

    </ul>
</div>

