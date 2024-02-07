<?php
include 'tasks.php';

$id = $_REQUEST['id'] ?? null;

if (!$id) {
  header('Location: overview-tasks.php');
  exit;
}

$tasks = get_tasks();

$found_task = array_filter($tasks, function ($task) use ($id) {
  return $task['id'] == $id;
});

$task = array_values($found_task)[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Details</title>

  <!-- <style>
    body {
      padding: 2rem;
    }

    .card {
      padding: 1rem;
      border: 1px solid #000;
      margin-bottom: 2rem;
    }

    .card--done {
      background-color: lightgreen;
    }

    .card--not-done {
      background-color: lightcoral;
    }

    .card-title {
      margin-bottom: 1rem;
      margin-top: 0;
      border-bottom: 1px solid #000;
    }
  </style> -->
</head>

<body>
  <?php include 'navigation.php'; ?>

  <h1>Details</h1>

  <div class="task card <?= $task['done'] ? 'card--done' : 'card--not-done' ?>">
    <h2 class="card-title"><?= $task['title'] ?></h2>
    <?php if (isset($task['description'])) : ?>
      <p><?= $task['description'] ?></p>
    <?php endif ?>
    <p>Klaar: <?= $task['done'] ? 'Ja' : 'Nee' ?></p>
  </div>
</body>

</html>