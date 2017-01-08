<?php require_once("views/default/default_header.php"); ?>


<section class="section images">
    <div id="update_special_offer">
        <input type="hidden" name="offer_id" value="<?php echo $options['offer']->getId() ?>" />
        <label for="start">Start (DD.MM.YYYY HH.mm):</label>
        <input class="datetimepicker" type="datetime" id="start"
               value="<?php echo DateTime::createFromFormat('Y-m-d H:i:s',
                   $options['offer']->getStart())->format('d.m.Y H:i') ?>" name="start" required/><br/>
        <label for="end">End (DD.MM.YYYY HH.mm):</label>
        <input class="datetimepicker" type="datetime" id="end"
               value="<?php echo DateTime::createFromFormat('Y-m-d H:i:s',
                   $options['offer']->getEnd())->format('d.m.Y H:i') ?>" name="end" required /><br />
        <label for="pictures">Pictures</label>
        <select name="pictures[]" id="pictures" multiple required>
            <?php
            $html = "";
            foreach($options['pictures'] as $picture){
                $checked= "";
                if(in_array($options['offer']->pictures(), $picture)){
                    $checked = "checked";
                }
                $html .= "<option $checked value='" . $picture->getId() . "'>" .
                    $picture->getTitle() . " (" . $picture->getOwner()->getUsername().")</option>";
            }
            echo $html;
            ?>
        </select>
        <button onclick="updateSpecialOffer(<?php echo $options['offer']->getId() ?>)" >Submit</button>
    </div>
</section>
<?php require_once("views/default/footer.php") ?>
