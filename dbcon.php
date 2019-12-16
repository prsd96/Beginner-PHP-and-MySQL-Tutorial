<?php

 define('HOST','localhost');
 define('USER','prasad');
 define('PASS','prasad');
 define('DB','database');
 
 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');