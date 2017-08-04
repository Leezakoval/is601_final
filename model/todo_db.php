<?php
//class to do database
class ToDoDB {
//query for my sql to get all todo items
    public function getToDos() {
        $db = Database::getDB();
        $query = 'SELECT * FROM ToDo
                  ORDER BY ID';
        $result = $db->query($query);
        $todos = array();
        foreach ($result as $row) {
            $todo = new ToDo();
            $todo->setID($row['ID']);
            $todo->setTitle($row['Title']);
            $todo->setComplete($row['Complete']);
            $todos[] = $todo;
        }
        return $todos;
    }
//query for my sql to select a todo item
    public function getToDo($todo_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM ToDo
                  WHERE ID = '$todo_id'";
        $statement = $db->query($query);
        $row = $statement->fetch();
        $todo = new ToDo();
            $todo->setID($row['ID']);
            $todo->setTitle($row['Title']);
            $todo->setComplete($row['Complete']);
        return $todo;
    }
//query for my sql to delete get a todo item
    public function deleteToDo($todo_id) {
        $db = Database::getDB();
        $query = "DELETE FROM ToDo
                  WHERE ID = '$todo_id'";
        $row_count = $db->exec($query);
        return $row_count;
    }

    public function addToDo($todo) {
        $db = Database::getDB();

        $title = $todo->getTitle();
        $complete = $todo->getComplete();
//query for my sql to add a todo item
        $query =
            "INSERT INTO ToDo
                 (Title, Complete)
             VALUES
                 ('$title', '$complete')";

        $row_count = $db->exec($query);
        return $row_count;
    }
    
      public function updateToDo($todo) {
        $db = Database::getDB();

        $id = $todo->getID();
        $title = $todo->getTitle();
        $complete = $todo->getComplete();
//query for my sql to mark as complete a todo item
        $query =
            "UPDATE ToDo SET Title = '$title', Complete = '$complete' WHERE ID = '$id'";

        $row_count = $db->exec($query);
        return $row_count;
    }
    
}
?>