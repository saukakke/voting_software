<?php
if(count($alerts)>0)
{
foreach($alerts as $alert)
{
    echo "<script>alert('$alert');</script>";
}
}
?>