<?php
include 'tasks.php';

$id = $_REQUEST['id'] ?? null;

if ($id) {
  $tasks = get_tasks();
  $tasks = array_filter($tasks, function ($task) use ($id) {
    return $task['id'] != $id;
  });  
  save_tasks($tasks);
}

header('Location: overview-tasks.php');
