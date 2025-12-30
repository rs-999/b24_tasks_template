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
      case 'target':
        $connection->queryExecute(
          "UPDATE c_projects
          SET `target` = '".$content."'
          WHERE task_id = $taskId"
        );
      break;
      case 'contecst':
        $connection->queryExecute(
          "UPDATE c_projects
          SET `contecst` = '".$content."'
          WHERE task_id = $taskId"
        );
      break;
      case 'questions':
        $connection->queryExecute(
          "UPDATE c_projects
          SET `questions` = '".$content."'
          WHERE task_id = $taskId"
        );
      break;

      case 'kpi':
        $connection->queryExecute(
          "UPDATE c_projects
          SET `kpi` = '".$content."'
          WHERE task_id = $taskId"
        );
      break;
      case 'kpi_date':
        $connection->queryExecute(
          "UPDATE c_projects
          SET `kpi_date` = '".$content."'
          WHERE task_id = $taskId"
        );
      break;
      case 'kpi_fact':
        $connection->queryExecute(
          "UPDATE c_projects
          SET `kpi_fact` = '".$content."'
          WHERE task_id = $taskId"
        );
      break;

      case 'plan_date':
        $connection->queryExecute(
          "UPDATE b_tasks
          SET `PLAN_DATE` = '".$content."'
          WHERE ID = $taskId"
        );
      break;
    }
}

echo json_encode(['success' => true]);
