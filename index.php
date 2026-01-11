<?php
session_start(); 
require_once 'config/Manager.php';

echo "<h1> Projet Forum</h1>";

try {
    $test = new Manager();
    echo "<p> Connexion à MongoDB réussie </p>";
} catch (Exception $e) {
    echo "<p> Erreur de connexion : " . $e->getMessage() . "</p>";
}
?>
