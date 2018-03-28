<?php
function getAllbirthdays()
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM `birthdays`
	ORDER BY `birthdays`. `month`, `day`,`year` ASC";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}
function getPerson($id)
{
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM birthdays WHERE id = :id LIMIT 1";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));
	$db = null;
	return $query->fetch();
}

function createPerson()
{
	$naam = isset($_POST["naam"]) ? $_POST["naam"] : null;
	$dag = isset($_POST["dag"]) ? $_POST["dag"] : null;
	$maand = isset($_POST["maand"]) ? $_POST["maand"] : null;
	$jaar = isset($_POST["jaar"]) ? $_POST["jaar"] : null;
	
	if ($naam === null ||$dag === null || $maand === null || $jaar === null) {
		return false;
	}

	//Database verbinding maken
	$db = openDatabaseConnection();
	$sql = "INSERT INTO `birthdays` (`person`, `day`, `month`, `year`) 
			VALUES (:naam, :dag, :maand, :jaar)";
	$query = $db->prepare($sql);
	$query->execute(array(
		":naam" => $naam,
		":dag" => $dag,
		":maand" => $maand,
		":jaar" => $jaar 
	));
	//Database verbinding sluiten
	$db = null;
	return true;
}
function deletePerson($id)
{
	if ($id === '') {
		return false;
	}
	$db = openDatabaseConnection();
	$sql = "DELETE FROM birthdays WHERE id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
	));
	$db = null;
	return true;
}

function editPerson($id=null)
{
	$id = isset($_POST["id"]) ? $_POST["id"] : null;
	$naam = isset($_POST["naam"]) ? $_POST["naam"] : null;
	$dag = isset($_POST["dag"]) ? $_POST["dag"] : null;
	$maand = isset($_POST["maand"]) ? $_POST["maand"] : null;
	$jaar = isset($_POST["jaar"]) ? $_POST["jaar"] : null;
	
	if ($id === null ||$naam === null|| $dag === null || $maand === null || $jaar === null) {
		return false;
	}
	$db = openDatabaseConnection();
	$sql = "UPDATE `birthdays` 
			SET day = :dag, month = :maand, year = :jaar, person = :naam 
			WHERE id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id,
		":naam" => $naam,
		":dag" => $dag,
		":maand" => $maand,
		":jaar" => $jaar
	));
	$db = null;
	return true;
}