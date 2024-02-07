<?php
include 'tasks.php';

$tasks = get_tasks();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Overview</title>

  <style>
    body {
      padding: 2rem;
    }

    .tasks {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      margin-bottom: 2rem;
    }

    .task {
      padding: 1rem;
      border: 1px solid #000;
      display: flex;
      justify-content: space-between;
    }

    .task--done {
      background-color: lightgreen;
    }

    .task-name--done {
      text-decoration: line-through;
    }

    button {
      padding: 0.5rem 1rem;
      background-color: lightblue;
      border: none;
      cursor: pointer;
    }

    a {
      text-decoration: none;
      color: #000;
    }

    .actions {
      display: flex;
      justify-content: flex-end;
    }

    .task-actions {
      display: flex;
      gap: 1rem;
    }
  </style>
</head>

<body>
  <?php include 'navigation.php'; ?>
  <h1>Taken</h1>
  <div class="tasks">
    <?php foreach ($tasks as $task) : ?>
      <div class="task <?= $task['done'] ? 'task--done' : '' ?>">
        <span class="<?= $task['done'] ? 'task-name--done' : '' ?>">
          <?= $task['title']; ?>
        </span>

        <div class="task-actions">
          <button><a href="/todolist/edit-task.php?id=<?= $task['id'] ?>">Bewerken</a></button>
          <button><a href="/todolist/detail-task.php?id=<?= $task['id'] ?>">Details</a></button>
          <form action="/todolist/toggle-task.php" method="post">
            <input type="hidden" name="id" value="<?= $task['id'] ?>" />
            <input type="hidden" name="done" value="<?= $task['done'] ?>" />
            <button type="submit">
              <?= $task['done'] ? 'Undo' : 'Mark as done' ?>
            </button>
          </form>
          <form action="/todolist/delete-task.php" method="post">
            <input type="hidden" name="id" value="<?= $task['id'] ?>" />
            <button type="submit">❌</button>
          </form>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="actions">
    <button><a href="/todolist/add-task.php">Add Task</a></button>
  </div>
</body>

</html>