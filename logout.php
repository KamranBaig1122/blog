<?php

require 'config/constants.php';
//destroy a;; session
session_destroy();
header('location: ' . ROOT_URL);
die();