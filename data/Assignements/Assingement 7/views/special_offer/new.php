<?php require_once("views/default/default_header.php"); ?>


<section class="section images">
    <form action="/special_offer" method="post">
        <label for="start">Start (DD.MM.YYYY HH.mm):</label>
        <input class="datetimepicker" type="datetime" id="start" name="start" required/><br/>
        <label for="end">End (DD.MM.YYYY HH.mm):</label>
        <input class="datetimepicker" type="datetime" id="end" name="end" required /><br />
        <label for="pictures">Pictures</label>
        <select name="pictures[]" id="pictures" multiple required>
            <?php
            $html = "";
            foreach($options['pictures'] as $picture){
                $html .= "<option value='" . $picture->getId() . "'>" .
                    $picture->getTitle() . " (" . $picture->getOwner()->getUsername().")</option>";
            }
            echo $html;
            ?>
        </select>
        <input type="submit" value="Submit" />
    </form>
</section>
<?php require_once("views/default/footer.php") ?>
