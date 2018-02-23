<?php 
$html = '<div class="third-section section">';
$html .= '<input type="hidden" id="lat" value="'. $latitude .'">';
$html .= '<input type="hidden" id="lng" value="'. $longitude .'">';
$html .= '<input type="hidden" id="image" value="'. $image .'">';
$html .= '<div id="google-map"></div></div>';
return $html;
?>