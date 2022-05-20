<?php 

    # DSN string = defines the connection string of the database
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'phpmyadmin', 'phpmyadmindb+--+');
    # If the connection to the database is not succesfull:
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);