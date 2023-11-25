<?php

function storeuserinsession(array $user){


    $_SESSION['user'] = $user;
    $_SESSION['is_logged_in'] = true;


}
function CheckIsLoggedIn() : bool
{
  return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true;
  
  
}