<?php
define('NO_KEEP_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS', true);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

use Bitrix\Main\Application;

$request = Application::getInstance()->getContext()->getRequest();
$taskId = (int)$request->getPost('task_id');
$type = $request->getPost('type');
$content = $request->getPost('data');

if ($taskId > 0)
{
    $connection = Application::getConnection();

    switch($type) {
      case 'current_state':
        $connection->queryExecute(
          "UPDATE c_processes
          SET current_state = '".$content."'
          WHERE task_id = $taskId"
        );
      break;

      case 'target_state':
        $connection->queryExecute(
          "UPDATE c_processes
          SET target_state = '".$content."'
          WHERE task_id = $taskId"
        );
      break;

      case 'metrics':
        $connection->queryExecute(
          "UPDATE c_processes
          SET metrics = '".$content."'
          WHERE task_id = $taskId"
        );
      break;

      case 'kpi_2025':
        $connection->queryExecute(
          "UPDATE c_processes
          SET kpi_2025 = '".$content."'
          WHERE task_id = $taskId"
        );
      break;

      case 'kpi_fact':
        $connection->queryExecute(
          "UPDATE c_processes
          SET kpi_fact = '".$content."'
          WHERE task_id = $taskId"
        );
      break;

      case 'resources':
        $connection->queryExecute(
          "UPDATE c_processes
          SET resources = '".$content."'
          WHERE task_id = $taskId"
        );
      break;
    }
}

echo json_encode(['success' => true]);
