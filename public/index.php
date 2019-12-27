<?php
if( !session_id() ) session_start();
// Teknik bootstraping
require_once '../app/init.php';

new App;