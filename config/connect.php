<?php

#koneksi server phpmyadmin
define('server', 'localhost');
define('user', 'root');
define('pass', '');
define('db', 'workshop_todolist');

$con = mysqli_connect(server, user, pass, db) or die('Unable to connected');