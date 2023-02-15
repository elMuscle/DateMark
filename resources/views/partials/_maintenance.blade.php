<?php
/*
    0: nichts!
    1: Umbau
    2: Aufbau
*/
$maintanence=0;
//--------------------------------------------------------------------
switch ($maintanence){
    case 0:
        break;
    case 1:
        echo '<div class="remark warning">Diese Seite befindet sich im Umbau!</div>';
        break;
    case 2:
        echo '<div class="remark alert">Diese Seite befindet sich im Aufbau!</div>';
        break;

}
?>