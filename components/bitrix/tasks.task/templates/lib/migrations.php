<?php
define('NO_KEEP_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS', true);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

use Bitrix\Main\Application;

$connection = Application::getConnection();

$connection->query("ALTER TABLE b_tasks
ADD COLUMN PLAN_DATE VARCHAR(55) NOT NULL;");


$connection->query("DROP TABLE IF EXISTS `c_directions`;");

$connection->query("
CREATE TABLE `c_directions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `task_id` int unsigned NOT NULL,
  `TITLE` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_task_id` (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;");

$connection->query("DROP TABLE IF EXISTS `c_processes`;");

$connection->query("
CREATE TABLE `c_processes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `task_id` int unsigned NOT NULL,
  `current_state` varchar(700) DEFAULT NULL,
  `target_state` varchar(700) DEFAULT NULL,
  `metrics` varchar(700) DEFAULT NULL,
  `kpi_2026` varchar(700) DEFAULT NULL,
  `kpi_fact` varchar(700) DEFAULT NULL,
  `resources` varchar(700) DEFAULT NULL,
  `TITLE` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_task_id` (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;");

$connection->query("DROP TABLE IF EXISTS `c_projects`;");

$connection->query("
CREATE TABLE `c_projects` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `task_id` int unsigned NOT NULL,
  `TITLE` varchar(500) DEFAULT NULL,
  `target` varchar(700) NOT NULL,
  `contecst` varchar(700) NOT NULL,
  `questions` varchar(900) NOT NULL,
  `kpi` varchar(500) NOT NULL,
  `kpi_date` varchar(500) NOT NULL,
  `kpi_fact` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_task_id` (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;");