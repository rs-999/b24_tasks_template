<?php
define('NO_KEEP_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS', true);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

use Bitrix\Main\Application;

$request = Application::getInstance()->getContext()->getRequest();
$taskId = (int)$request->getPost('task_id');
$title = $request->getPost('title');

if ($taskId > 0)
{
    $connection = Application::getConnection();

    $check = $connection->query("SELECT id FROM c_processes WHERE task_id = $taskId")->fetch();

    if (!$check) {
      $connection->queryExecute(
          "INSERT INTO c_processes (TITLE, task_id) VALUES ('".$title."', $taskId)"
      );
    }
}

echo json_encode(['success' => true]);
