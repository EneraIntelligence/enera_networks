<?php

function interactionIdToText($id)
{
    
    if($id=="banner_link")
    {
        return "Banner + Link";
    }
    else
    {
        $result = str_replace("_"," ",$id);
        return ucwords ( $result );
    }


}