<?php
if(count($errors)>0)
{
foreach($errors as $error)
{
    echo "<script type='text/javascript'>alert('$error');</script>";
}
}
?>