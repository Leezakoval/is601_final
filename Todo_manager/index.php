<?php
require('../model/database.php');
require('../model/todo.php');
require('../model/todo_db.php');


// create the ToDo database and ToDo object
$todoDB = new ToDoDB();


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_todos';
    }
}  
//by default ID#1 displayed
if ($action == 'list_todos') {
    $todo_id = filter_input(INPUT_GET, 'todo_id', 
            FILTER_VALIDATE_INT);
    if ($todo_id == NULL || $todo_id == FALSE) {
        $todo_id = 1;
    }
 $todos = $todoDB->getToDos();
 
//Get ToDo data
	$current_todo= $todoDB->getToDo($todo_id);

// Display ToDo list
    include('todo_list.php');
	} else if ($action == "show_add_form") {
    include('todo_add.php');
	} else if ($action == "add_todo") {
    $title = filter_input(INPUT_POST, 'title');
    
    if ($title == NULL) {
        $error = "Invalid todo data. Check all fields and try again.";
        include('../errors/error.php');
    } else {

// Create the ToDo object
        $todo = new ToDo();
        $todo->setTitle($title);
// Add ToDo object to the database
        $todoDB->addTodo($todo);
// Display the ToDo page, action delete item
    header("Location: .?action=list_todos");
    }
} else if ($action == "delete_todo") {
    $id = filter_input(INPUT_POST, 'todo_id');
    
    if ($id == NULL) {
        $error = "Invalid todo data. Check all fields and try again.";
        include('../errors/error.php');
    } else {

// Create ToDo object
        $todo = new ToDo();
// delete Todo item from the database
        $todoDB->deleteTodo($id);
// Display the ToDo page, action edit item
    header("Location: .?action=list_todos");
    }
} else if ($action == "edit_todo") {
    $id = filter_input(INPUT_POST, 'todo_id');
    if ($id == NULL) {
        $error = "Invalid todo data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
// Add ToDo object to the database
        $todo = $todoDB->getToDo($id);
        include('todo_edit.php');
    }
}
else if ($action == "update_todo") {
    $id = filter_input(INPUT_POST, 'todo_id');
    $title = filter_input(INPUT_POST, 'title');
    $complete = filter_input(INPUT_POST, 'complete');
    
    if ($id == NULL) {
        $error = "Invalid todo data. Check all fields and try again.";
        include('../errors/error.php');
    } else {

// Create ToDO  object, set papams 
	$todo = new ToDo();
	$todo->setTitle($title);
	$todo->setID($id);
	$todo->setComplete($complete);

// update ToDo in database
	$todoDB->updateToDo($todo);


// Display todo list
   header("Location: .?action=list_todos");
    }
}
?>