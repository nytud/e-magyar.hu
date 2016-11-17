<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="emlam">
    <h4>Demo</h3>
    <p>Kezdj el írni valamit az alábbi szövegmezőbe. Minden szóköz lenyomása után egy szólista jelenik meg, mint lehetséges folytatásai a beírt szövegnek. A felkínált szavak közül kattintással választhatsz, vagy folytathatod a gépelést.</p>
    <div class="form-group">
        <textarea id="textbox" type="text" class="form-control" placeholder="<?php echo $this->lang->line('start_typing'); ?>"></textarea>
    </div>    
    <p><i><?php echo $this->lang->line('suggestions'); ?></i></p>
    <ul id="suggestions">

    </ul>
</div>

