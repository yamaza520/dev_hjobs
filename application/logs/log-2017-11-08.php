<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-11-08 01:50:47 --> Query error: Incorrect key file for table '/tmp/#sql_3c63_0.MYI'; try to repair it - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
WHERE `t`.`deleted_at` IS NULL
ORDER BY `t`.`publish_start_date` DESC
 LIMIT 2
ERROR - 2017-11-08 01:50:47 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 89
ERROR - 2017-11-08 19:15:05 --> Query error: Incorrect key file for table '/tmp/#sql_3c63_0.MYI'; try to repair it - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
WHERE `t`.`deleted_at` IS NULL
ORDER BY `t`.`publish_start_date` DESC
 LIMIT 2
ERROR - 2017-11-08 19:15:05 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 89
