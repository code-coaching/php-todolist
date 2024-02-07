<?php
include 'tasks.php';

$tasks = get_tasks();

$task_created = false;

if (isset($_REQUEST['submit'])) {
  $title = $_REQUEST['title'];
  $description = $_REQUEST['description'];

  add_task([
    'title' => $title,
    'description' => $description
  ]);

  $task_created = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Taak toevoegen</title>

  <style>
    body {
      padding: 2rem;
    }

    input {
      padding: 0.5rem 1rem;
    }

    input[type="submit"] {
      padding: 0.5rem 1rem;
      background-color: lightblue;
      border: none;
      cursor: pointer;
    }

    .actions {
      display: flex;
      justify-content: flex-end;
    }

    .notification {
      background-color: lightgreen;
      padding: 1rem;
      margin-top: 1rem;
    }
  </style>
</head>

<body>
  <?php include 'navigation.php'; ?>

  <h1>Taak toevoegen</h1>

  <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="text" name="title" id="title" placeholder="Titel" />
    <input type="text" name="description" id="description" placeholder="Omschrijving" />

    <input type="submit" value="Toevoegen" name="submit" />
  </form>

  <?php if ($task_created) : ?>
    <div class="notification">Taak toegevoegd!</div>
  <?php endif; ?>
</body>

</html