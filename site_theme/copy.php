<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    
    function get_global($key){
        //Get current session
        if(session_status()!=PHP_SESSION_ACTIVE)session_start();
        $current_id=session_id();
        session_write_close();
        //Set a global session with session_id=1
        session_id(1);
        session_start();
        //Get superglobal value
        $value=null;
        if(isset($_SESSION[$key]))$value=$_SESSION[$key];
        session_write_close();
        //Set the before session
        session_id($current_id);
        session_start();
        return $value;
    }
    
    function set_global($key,$value){
        //Get current session
        if(session_status()!=PHP_SESSION_ACTIVE)session_start();
        $current_id=session_id();
        session_write_close();
        //Set a global session with session_id=1
        session_id(1);
        session_start();
        //Set superglobal value
        $_SESSION[$key]=$value;
        session_write_close();
        //Set the before session
        session_id($current_id);
        session_start();
    }
    //Example 
    //Begin my session normally
    session_start();
    if(empty($_SESSION['count'])){
        $_SESSION['count']=0;
        $_SESSION['color']="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
    }
    $_SESSION['count']++;
    $id=session_id();
    //Get the superglobal
    $test=get_global("test");
    //Set the superglobal test with empty array if this dont set
    if($test==null)$test=array();
    //Get the superglobal
    $test=get_global("test");
    //Set values for each reload page and save the session_id that create it
    $test[]="<span style='color:".$_SESSION['color']."'>Value: ".rand(0,100)." SessionID: $id</span><br>";
    //Save the superglobal
    set_global("test",$test);
    //Show the superglobal
    foreach($test as $t){
        echo $t;
    }
    echo "<b>Reloads = ".$_SESSION['count'].", <span style='color:".$_SESSION['color']."'>This my color</span></b>";
    
    exit;
?>