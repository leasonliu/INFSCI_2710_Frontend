<?php
session_start();
session_unset();

// destroy the session
session_destroy();

// Goto first page...
header('Location: index.php');
