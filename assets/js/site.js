// admin site wide js functions

function confirmSubmit(name) 
{
    var msg;
    msg= "Are you sure you want to delete the data ? "+ name ;
    var agree=confirm(msg);
    if (agree)
    return true ;
    else
    return false ;
}


