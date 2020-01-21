<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$servername = '138.128.174.10';
$username = 'amttran1';
$password = 'pY8v4R5[8pXk!V';
$port = 10060;
$dbname = 'amttran1_amt';


// $servername = 'localhost';
// $username = 'root';
// $password = '';
// $port = 10060;
// $dbname = 'amttran1_amt';


$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
