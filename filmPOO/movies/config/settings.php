<?php
session_start();
if (empty($_SESSION['message']))
    $_SESSION['message'] = [];
require('database.php');
require('movie.php');
require('character.php');
require('gender.php');
require('functions.php');
require('core.php');
