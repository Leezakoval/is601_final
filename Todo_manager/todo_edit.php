<?php include '../view/header.php'; ?>
<main>
<!-- perform action adit-->
    <h1>Edit task item</h1>
    <form action="index.php" method="post" id="edit_todo_form">
        <input type="hidden" name="action" value="update_todo" />
        <input type="hidden" name="todo_id" value="<?php echo $todo->getID(); ?>"/>
<!-- get Id, title and status -->
        <label>Task List:</label>
        <br>
   		<label>ID</label> <?php echo $todo->getID(); ?>
   		<br>
        <label>Title</label>
        <input type="text" name="title" value="<?php echo $todo->getTitle(); ?>"/>
        <br>
        <label>Complete</label>
        <input type="checkbox" name="complete" value = '1' <?php echo ($todo->getComplete()==1?"checked":""); ?> />
        <br>
        <!-- submit button -->
        <label>&nbsp;</label>
        <input type="submit" value="Update Todo">
        <br>
    </form>
    <p><a href="index.php?action=list_todos">View Todo List</a></p>
</main>
<?php include '../view/footer.php'; ?>