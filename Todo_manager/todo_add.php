<?php include '../view/header.php'; ?>
<main>
<!-- to perform add task -->
    <h1>Add task item</h1>
    <!-- access todo form-->
    <form action="index.php" method="post" id="add_todo_form">
        <input type="hidden" name="action" value="add_todo" />

        <label>Task List:</label>
        <br>

        <label>Title</label>
        <input type="text" name="title">
        <br>
<!-- add button -->
        <label>&nbsp;</label>
        <input type="submit" value="Add Todo">
        <br>
    </form>
    <p><a href="index.php?action=list_todos">View Todo List</a></p>
</main>
<?php include '../view/footer.php'; ?>