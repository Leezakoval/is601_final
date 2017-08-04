<?php include '../view/header.php'; ?>
<main>
        <!-- display a table of todo list with id, title and status -->
        <h2><?php echo $current_todo->getTitle(); ?></h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th class="right">Complete</th>
                <th>&nbsp;</th>
                 <th>&nbsp;</th>
            </tr>
            <?php foreach ($todos as $todo) : ?>
            <tr>
                <td><?php echo $todo->getID(); ?></td>
                <td><?php echo $todo->getTitle(); ?></td>
                <td class="right"><?php echo $todo->getComplete(); ?>
                </td>
                <!-- access forms to edit, delete and add task -->
                <td><form action="." method="post"
                          id="edit_todo_form">
                          
                    <input type="hidden" name="action"
                           value="edit_todo">
                    <input type="hidden" name="todo_id"
                           value="<?php echo $todo->getID(); ?>">

                    <input type="submit" value="Edit">
                </form></td>
                <td><form action="." method="post"
                          id="delete_todo_form">
                    <input type="hidden" name="action"
                           value="delete_todo">
                    <input type="hidden" name="todo_id"
                           value="<?php echo $todo->getID(); ?>">

                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Task</a></p>
</main>
<?php include '../view/footer.php'; ?>