<?php
require '../models/connectionDB.php';
$user = getUserById(9);
$recruiter = getRecruteurById(9);
$skills = getRecruteursSkillsInitialsById($recruiter['id_RH']);
$poste = getPosteRechercherById($recruiter['id_RH']);
$candidats = getCandidatsByPosteAndSkills($poste, $skills);

?>