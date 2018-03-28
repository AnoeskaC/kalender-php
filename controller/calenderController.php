<?php
require(ROOT . "model/calenderModel.php");

function index()
{
    $persons = getAllbirthdays();
    
    render("calender/index", array(
        'persons' => $persons)
    );
}

function create()
{
    render("calender/create");
}

function createSave()
{
    if (createPerson()) {
        header("location:" . URL . "calender/index");
        exit();
    } else {
        //er is iets fout gegaan..
        header("location:" . URL . "error/error_db");
        exit(); 
    }
}

function edit($id)
{
    $person = getPerson($id);
    render("calender/edit", array(
        "calender" => $person
    ));
}

function editSave($id)
{
    if (editPerson($id)) {
        header("location:" . URL . "calender/index");
    } else {
        header("location:" . URL . "error/error_404");
    }
}

function deleteConfirm($id)
{
    $person = getPerson($id);

    render("calender/delete", array(
        "calender" => $person
    ));
}

function delete($id)
{
    $Yes = $_POST["Yes"];
    if ($Yes == "Yes") {
        if (deletePerson($id)) {
            header("location:" . URL . "calender/index");
            exit();
        } else {
            //er is iets fout gegaan..
            header("location:" . URL . "error/error_delete");
            exit();
        }
    } else {
        header("location:" . URL . "calender/index");
        exit();
    }
}