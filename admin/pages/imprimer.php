<?php

$mg = new ChenilManager($db);
$data = $mg->getListeConfort();

?>
<p class="txtRougeGras">-- liste des données -- </p>
<!-- www.w3.org/TR/html-markup/a.html
The target attribute on the a element was deprecated in a previous version of HTML, 
but is no longer deprecated, as it useful in Web applications, particularly in combination 
with the iframe element.
-->
<p>
    <img src="./images/pdf.jpg" alt="Pdf"/>&nbsp;
    <a href="./pages/print_pension.php" target="_blank">Imprimer la liste</a>
</p>


