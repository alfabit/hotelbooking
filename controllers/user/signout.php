<?php   
    session_start();
    
    session_unregister("Kontr_ID");
    session_unregister("KontrName");
    session_unregister("email");
    session_unregister("birth");
    session_unregister("passport");
    session_unregister("auth");
    session_unregister("phash");
    
?>
