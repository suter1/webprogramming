<?php require_once("views/default/default_header.php"); ?>


<section class="section images">
    <table class="table">
        <thead>
        <tr><td>Start</td><td>End</td><td>Number of Pictures</td><td>Edit</td><td>Delete</td></tr>
        </thead>
        <tbody>
        <?php
        $html = "";
        foreach($options['offers'] as $offer){
            $html .= "<tr><td>" . $offer->getStart() . "</td><td>" .
                $offer->getEnd() . "</td><td>" . sizeof($offer->pictures()) . "</td>
                <td><a href='/special_offer/" . $offer->getId() ."/edit'><button>Edit</button></a></td>
                <td><button onclick='deleteSpecialOffer(" . $offer->getId() . ")'>Delete</button></td></tr>";
        }
        echo $html;
        ?>
        </tbody>
    </table>
    <a href="/special_offer/new"><button>New</button></a>
</section>
<?php require_once("views/default/footer.php") ?>
