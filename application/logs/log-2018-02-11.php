<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-02-11 08:54:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '(),))"[[:>:]]'
ORDER BY `publish_start_date` DESC
 LIMIT 15' at line 15 - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `employ_type_class` IN('OqYF')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]IgbR.,('(),))"[[:>:]]'
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:24 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'uREWwt&lt;'">IBKAxC[[:>:]]'
ORDER BY `publish_start_date` DESC
 LIMIT 15' at line 15 - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `employ_type_class` IN('OqYF')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]IgbR'uREWwt&lt;'">IBKAxC[[:>:]]'
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:24 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:30 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:54:30 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:54:30 --> Could not find the language line "form_validation_matches"
ERROR - 2018-02-11 08:54:31 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:54:31 --> Could not find the language line "form_validation_matches"
ERROR - 2018-02-11 08:54:32 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:54:32 --> Could not find the language line "form_validation_matches"
ERROR - 2018-02-11 08:54:33 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:54:33 --> Could not find the language line "form_validation_matches"
ERROR - 2018-02-11 08:54:34 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:54:34 --> Could not find the language line "form_validation_matches"
ERROR - 2018-02-11 08:54:34 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:54:34 --> Could not find the language line "form_validation_matches"
ERROR - 2018-02-11 08:54:35 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:54:35 --> Could not find the language line "form_validation_matches"
ERROR - 2018-02-11 08:54:36 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:54:36 --> Could not find the language line "form_validation_matches"
ERROR - 2018-02-11 08:54:37 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:54:37 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:54:38 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:54:39 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:54:40 --> Query error: Unknown column 'hcDY' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|28[[:>:]]'
AND t.min_salary >= hcDY
AND   (
`t`.`job_title` LIKE '%WrWx%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%WrWx%' ESCAPE '!'
OR  `t`.`address1` LIKE '%VZHo%' ESCAPE '!'
OR  `t`.`address2` LIKE '%VZHo%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:40 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:40 --> Query error: Unknown column 'JySD' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|18[[:>:]]'
AND t.min_salary >= JySD
AND   (
`t`.`job_title` LIKE '%WyEh%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%WyEh%' ESCAPE '!'
OR  `t`.`address1` LIKE '%EynF%' ESCAPE '!'
OR  `t`.`address2` LIKE '%EynF%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:40 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:41 --> Query error: Unknown column 'VGxI' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13[[:>:]]'
AND t.min_salary >= VGxI
AND   (
`t`.`job_title` LIKE '%glRw%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%glRw%' ESCAPE '!'
OR  `t`.`address1` LIKE '%DcJE%' ESCAPE '!'
OR  `t`.`address2` LIKE '%DcJE%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:41 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:41 --> Query error: Unknown column 'nahG' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|5[[:>:]]'
AND t.min_salary >= nahG
AND   (
`t`.`job_title` LIKE '%SBUB%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%SBUB%' ESCAPE '!'
OR  `t`.`address1` LIKE '%upcu%' ESCAPE '!'
OR  `t`.`address2` LIKE '%upcu%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:41 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:42 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:54:43 --> Query error: Unknown column 'UvLv' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|10[[:>:]]'
AND t.min_salary >= UvLv
AND   (
`t`.`job_title` LIKE '%DvbP%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%DvbP%' ESCAPE '!'
OR  `t`.`address1` LIKE '%pkCx%' ESCAPE '!'
OR  `t`.`address2` LIKE '%pkCx%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:43 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:43 --> Query error: Unknown column 'FTdO' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|12[[:>:]]'
AND t.min_salary >= FTdO
AND   (
`t`.`job_title` LIKE '%DGMV%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%DGMV%' ESCAPE '!'
OR  `t`.`address1` LIKE '%ErOm%' ESCAPE '!'
OR  `t`.`address2` LIKE '%ErOm%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:43 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:44 --> Query error: Unknown column 'kdWN' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|38[[:>:]]'
AND t.min_salary >= kdWN
AND   (
`t`.`job_title` LIKE '%IRDU%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%IRDU%' ESCAPE '!'
OR  `t`.`address1` LIKE '%pySz%' ESCAPE '!'
OR  `t`.`address2` LIKE '%pySz%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:44 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:44 --> Query error: Unknown column 'gIHU' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|41[[:>:]]'
AND t.min_salary >= gIHU
AND   (
`t`.`job_title` LIKE '%pEMs%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%pEMs%' ESCAPE '!'
OR  `t`.`address1` LIKE '%SxxJ%' ESCAPE '!'
OR  `t`.`address2` LIKE '%SxxJ%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:44 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:45 --> Query error: Unknown column 'LdfQ' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346', '342')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13[[:>:]]'
AND t.min_salary >= LdfQ
AND   (
`t`.`job_title` LIKE '%lJNf%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%lJNf%' ESCAPE '!'
OR  `t`.`address1` LIKE '%tgEb%' ESCAPE '!'
OR  `t`.`address2` LIKE '%tgEb%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:45 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:45 --> Query error: Unknown column 'uCco' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|11[[:>:]]'
AND t.min_salary >= uCco
AND   (
`t`.`job_title` LIKE '%NOWg%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%NOWg%' ESCAPE '!'
OR  `t`.`address1` LIKE '%GIBi%' ESCAPE '!'
OR  `t`.`address2` LIKE '%GIBi%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:45 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:46 --> Query error: Unknown column 'bwWD' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346', '343')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13[[:>:]]'
AND t.min_salary >= bwWD
AND   (
`t`.`job_title` LIKE '%YhIf%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%YhIf%' ESCAPE '!'
OR  `t`.`address1` LIKE '%Zfcl%' ESCAPE '!'
OR  `t`.`address2` LIKE '%Zfcl%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:46 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:47 --> Query error: Unknown column 'kPIU' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346', '341')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13[[:>:]]'
AND t.min_salary >= kPIU
AND   (
`t`.`job_title` LIKE '%onPH%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%onPH%' ESCAPE '!'
OR  `t`.`address1` LIKE '%VLdr%' ESCAPE '!'
OR  `t`.`address2` LIKE '%VLdr%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:47 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:47 --> Query error: Unknown column 'DXvB' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346', '340')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13[[:>:]]'
AND t.min_salary >= DXvB
AND   (
`t`.`job_title` LIKE '%UTAp%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%UTAp%' ESCAPE '!'
OR  `t`.`address1` LIKE '%WGoT%' ESCAPE '!'
OR  `t`.`address2` LIKE '%WGoT%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:47 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:48 --> Query error: Unknown column 'Lmuo' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346', '347')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13[[:>:]]'
AND t.min_salary >= Lmuo
AND   (
`t`.`job_title` LIKE '%dJYK%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%dJYK%' ESCAPE '!'
OR  `t`.`address1` LIKE '%bcFi%' ESCAPE '!'
OR  `t`.`address2` LIKE '%bcFi%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:48 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:48 --> Query error: Unknown column 'ntGA' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346', '345')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13[[:>:]]'
AND t.min_salary >= ntGA
AND   (
`t`.`job_title` LIKE '%QTKw%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%QTKw%' ESCAPE '!'
OR  `t`.`address1` LIKE '%Onwu%' ESCAPE '!'
OR  `t`.`address2` LIKE '%Onwu%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:48 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:49 --> Query error: Unknown column 'uaHv' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346', '344')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13[[:>:]]'
AND t.min_salary >= uaHv
AND   (
`t`.`job_title` LIKE '%SVTn%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%SVTn%' ESCAPE '!'
OR  `t`.`address1` LIKE '%DTmw%' ESCAPE '!'
OR  `t`.`address2` LIKE '%DTmw%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:49 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:49 --> Query error: Unknown column 'UpPW' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|24[[:>:]]'
AND t.min_salary >= UpPW
AND   (
`t`.`job_title` LIKE '%owsZ%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%owsZ%' ESCAPE '!'
OR  `t`.`address1` LIKE '%DgrO%' ESCAPE '!'
OR  `t`.`address2` LIKE '%DgrO%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:49 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:50 --> Query error: Unknown column 'QatT' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|39[[:>:]]'
AND t.min_salary >= QatT
AND   (
`t`.`job_title` LIKE '%LMab%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%LMab%' ESCAPE '!'
OR  `t`.`address1` LIKE '%PvuA%' ESCAPE '!'
OR  `t`.`address2` LIKE '%PvuA%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:50 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:51 --> Query error: Unknown column 'YjOC' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|45[[:>:]]'
AND t.min_salary >= YjOC
AND   (
`t`.`job_title` LIKE '%IaSV%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%IaSV%' ESCAPE '!'
OR  `t`.`address1` LIKE '%IPEW%' ESCAPE '!'
OR  `t`.`address2` LIKE '%IPEW%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:51 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:51 --> Query error: Unknown column 'TRVN' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|7[[:>:]]'
AND t.min_salary >= TRVN
AND   (
`t`.`job_title` LIKE '%CrBj%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%CrBj%' ESCAPE '!'
OR  `t`.`address1` LIKE '%INeU%' ESCAPE '!'
OR  `t`.`address2` LIKE '%INeU%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:51 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:52 --> Query error: Unknown column 'qYWd' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|35[[:>:]]'
AND t.min_salary >= qYWd
AND   (
`t`.`job_title` LIKE '%DxAP%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%DxAP%' ESCAPE '!'
OR  `t`.`address1` LIKE '%Sffp%' ESCAPE '!'
OR  `t`.`address2` LIKE '%Sffp%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:52 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:52 --> Query error: Unknown column 'weJa' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|31[[:>:]]'
AND t.min_salary >= weJa
AND   (
`t`.`job_title` LIKE '%VGID%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%VGID%' ESCAPE '!'
OR  `t`.`address1` LIKE '%NQgj%' ESCAPE '!'
OR  `t`.`address2` LIKE '%NQgj%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:54:52 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:54:53 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:54:54 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:54:54 --> Could not find the language line "form_validation_matches"
ERROR - 2018-02-11 08:54:55 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:54:55 --> Could not find the language line "form_validation_matches"
ERROR - 2018-02-11 08:54:56 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:54:56 --> Could not find the language line "form_validation_matches"
ERROR - 2018-02-11 08:54:57 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:54:57 --> Could not find the language line "form_validation_matches"
ERROR - 2018-02-11 08:54:58 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:54:58 --> Could not find the language line "form_validation_matches"
ERROR - 2018-02-11 08:54:59 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:54:59 --> Could not find the language line "form_validation_matches"
ERROR - 2018-02-11 08:55:00 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:55:00 --> Could not find the language line "form_validation_matches"
ERROR - 2018-02-11 08:55:01 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:55:01 --> Could not find the language line "form_validation_matches"
ERROR - 2018-02-11 08:55:02 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:55:03 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:55:04 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:55:05 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:55:06 --> Query error: Unknown column 'znwZ' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|30[[:>:]]'
AND t.min_salary >= znwZ
AND   (
`t`.`job_title` LIKE '%TYkA%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%TYkA%' ESCAPE '!'
OR  `t`.`address1` LIKE '%bkNl%' ESCAPE '!'
OR  `t`.`address2` LIKE '%bkNl%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:55:06 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:55:07 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:07 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:07 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:55:07 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:08 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:08 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:08 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:55:08 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:09 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:09 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:09 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:55:09 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:10 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:10 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:55:10 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:11 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:11 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:55:11 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:12 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:12 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:12 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:55:12 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:13 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:13 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:13 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:55:13 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:14 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:14 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:14 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:55:15 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:15 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:15 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:55:16 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:16 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:16 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:55:16 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:17 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:17 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:17 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:55:17 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:18 --> Query error: Unknown column 'CpEb' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|1[[:>:]]'
AND t.min_salary >= CpEb
AND   (
`t`.`job_title` LIKE '%cdpO%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%cdpO%' ESCAPE '!'
OR  `t`.`address1` LIKE '%VsBY%' ESCAPE '!'
OR  `t`.`address2` LIKE '%VsBY%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:55:18 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:55:19 --> Query error: Unknown column 'gKpe' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|34[[:>:]]'
AND t.min_salary >= gKpe
AND   (
`t`.`job_title` LIKE '%SXBp%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%SXBp%' ESCAPE '!'
OR  `t`.`address1` LIKE '%yLVu%' ESCAPE '!'
OR  `t`.`address2` LIKE '%yLVu%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:55:19 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:55:19 --> Query error: Unknown column 'Eeaf' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|26[[:>:]]'
AND t.min_salary >= Eeaf
AND   (
`t`.`job_title` LIKE '%IKtz%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%IKtz%' ESCAPE '!'
OR  `t`.`address1` LIKE '%mMMO%' ESCAPE '!'
OR  `t`.`address2` LIKE '%mMMO%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:55:19 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:55:20 --> Query error: Unknown column 'fyHB' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|32[[:>:]]'
AND t.min_salary >= fyHB
AND   (
`t`.`job_title` LIKE '%JNzj%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%JNzj%' ESCAPE '!'
OR  `t`.`address1` LIKE '%zeoC%' ESCAPE '!'
OR  `t`.`address2` LIKE '%zeoC%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:55:20 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:55:20 --> Query error: Unknown column 'lcjX' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|37[[:>:]]'
AND t.min_salary >= lcjX
AND   (
`t`.`job_title` LIKE '%ujRJ%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%ujRJ%' ESCAPE '!'
OR  `t`.`address1` LIKE '%PbdM%' ESCAPE '!'
OR  `t`.`address2` LIKE '%PbdM%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:55:20 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:55:21 --> Query error: Unknown column 'KYPE' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|33[[:>:]]'
AND t.min_salary >= KYPE
AND   (
`t`.`job_title` LIKE '%ZTLs%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%ZTLs%' ESCAPE '!'
OR  `t`.`address1` LIKE '%LNGy%' ESCAPE '!'
OR  `t`.`address2` LIKE '%LNGy%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:55:21 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:55:21 --> Query error: Unknown column 'beVS' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|16[[:>:]]'
AND t.min_salary >= beVS
AND   (
`t`.`job_title` LIKE '%OQAQ%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%OQAQ%' ESCAPE '!'
OR  `t`.`address1` LIKE '%BvMM%' ESCAPE '!'
OR  `t`.`address2` LIKE '%BvMM%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:55:21 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:55:22 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:22 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:22 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:22 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:22 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:22 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:23 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:23 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:23 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:23 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:23 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:23 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:24 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:24 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:24 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:24 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:24 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:24 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:25 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:25 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:25 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:25 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:25 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:26 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:26 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:26 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:26 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:26 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:27 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:27 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:27 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:27 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:27 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:27 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:28 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:28 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:28 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:28 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:28 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:28 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:29 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:29 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:29 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:29 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:29 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:30 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:30 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:30 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:30 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:30 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:31 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:31 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:31 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:31 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:31 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:31 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:32 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:32 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:32 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:32 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:32 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:32 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:33 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:33 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:33 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:33 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:33 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:34 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:34 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:34 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:34 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:34 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:35 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:35 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:35 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:35 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:35 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:35 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:36 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:36 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:36 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:36 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:36 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:36 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:37 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:37 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:37 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:37 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:37 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:55:37 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:38 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:38 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:38 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:38 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:38 --> Could not find the language line "form_validation_valid_email"
ERROR - 2018-02-11 08:55:38 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:39 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:39 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:39 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:39 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:39 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:39 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:40 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:40 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:40 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:40 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:40 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:40 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:41 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:41 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:41 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:41 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:41 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:42 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:42 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:42 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:42 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:42 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:43 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:43 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:43 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:43 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:43 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:43 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:44 --> Could not find the language line "create_user_validation_email_label"
ERROR - 2018-02-11 08:55:44 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:44 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:44 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:44 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:44 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:45 --> Query error: Unknown column 'usxf' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|36[[:>:]]'
AND t.min_salary >= usxf
AND   (
`t`.`job_title` LIKE '%ngHx%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%ngHx%' ESCAPE '!'
OR  `t`.`address1` LIKE '%dBjC%' ESCAPE '!'
OR  `t`.`address2` LIKE '%dBjC%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:55:45 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:55:46 --> Query error: Unknown column 'YEzB' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|43[[:>:]]'
AND t.min_salary >= YEzB
AND   (
`t`.`job_title` LIKE '%obSE%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%obSE%' ESCAPE '!'
OR  `t`.`address1` LIKE '%uxMV%' ESCAPE '!'
OR  `t`.`address2` LIKE '%uxMV%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:55:46 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:55:46 --> Query error: Unknown column 'FDNw' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|42[[:>:]]'
AND t.min_salary >= FDNw
AND   (
`t`.`job_title` LIKE '%AYsU%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%AYsU%' ESCAPE '!'
OR  `t`.`address1` LIKE '%rhLG%' ESCAPE '!'
OR  `t`.`address2` LIKE '%rhLG%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:55:46 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:55:47 --> Query error: Unknown column 'bWUa' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|3[[:>:]]'
AND t.min_salary >= bWUa
AND   (
`t`.`job_title` LIKE '%Dwvb%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%Dwvb%' ESCAPE '!'
OR  `t`.`address1` LIKE '%oakp%' ESCAPE '!'
OR  `t`.`address2` LIKE '%oakp%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:55:47 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:55:47 --> Query error: Unknown column 'SEcE' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|25[[:>:]]'
AND t.min_salary >= SEcE
AND   (
`t`.`job_title` LIKE '%VpXr%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%VpXr%' ESCAPE '!'
OR  `t`.`address1` LIKE '%pAFc%' ESCAPE '!'
OR  `t`.`address2` LIKE '%pAFc%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:55:47 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:55:48 --> Query error: Unknown column 'HDvh' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|6[[:>:]]'
AND t.min_salary >= HDvh
AND   (
`t`.`job_title` LIKE '%eJbo%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%eJbo%' ESCAPE '!'
OR  `t`.`address1` LIKE '%TqyN%' ESCAPE '!'
OR  `t`.`address2` LIKE '%TqyN%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:55:48 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:55:48 --> Query error: Unknown column 'UVsu' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|20[[:>:]]'
AND t.min_salary >= UVsu
AND   (
`t`.`job_title` LIKE '%aJxT%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%aJxT%' ESCAPE '!'
OR  `t`.`address1` LIKE '%Jmfd%' ESCAPE '!'
OR  `t`.`address2` LIKE '%Jmfd%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:55:48 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:55:53 --> Query error: Unknown column 'yyKa' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|40[[:>:]]'
AND t.min_salary >= yyKa
AND   (
`t`.`job_title` LIKE '%ZBfI%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%ZBfI%' ESCAPE '!'
OR  `t`.`address1` LIKE '%loBu%' ESCAPE '!'
OR  `t`.`address2` LIKE '%loBu%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:55:53 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:55:53 --> Query error: Unknown column 'LRED' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|15[[:>:]]'
AND t.min_salary >= LRED
AND   (
`t`.`job_title` LIKE '%uTyj%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%uTyj%' ESCAPE '!'
OR  `t`.`address1` LIKE '%VIrr%' ESCAPE '!'
OR  `t`.`address2` LIKE '%VIrr%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:55:53 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:55:54 --> Query error: Unknown column 'KWhs' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|22[[:>:]]'
AND t.min_salary >= KWhs
AND   (
`t`.`job_title` LIKE '%zXdv%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%zXdv%' ESCAPE '!'
OR  `t`.`address1` LIKE '%Frlc%' ESCAPE '!'
OR  `t`.`address2` LIKE '%Frlc%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:55:54 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:55:55 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:56 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:55:57 --> Could not find the language line "form_validation_required"
ERROR - 2018-02-11 08:56:01 --> Query error: Unknown column 'oohq' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|14[[:>:]]'
AND t.min_salary >= oohq
AND   (
`t`.`job_title` LIKE '%PzHQ%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%PzHQ%' ESCAPE '!'
OR  `t`.`address1` LIKE '%Nxsi%' ESCAPE '!'
OR  `t`.`address2` LIKE '%Nxsi%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:56:01 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:56:01 --> Query error: Unknown column 'Wxle' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|23[[:>:]]'
AND t.min_salary >= Wxle
AND   (
`t`.`job_title` LIKE '%yQnH%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%yQnH%' ESCAPE '!'
OR  `t`.`address1` LIKE '%jKUa%' ESCAPE '!'
OR  `t`.`address2` LIKE '%jKUa%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:56:01 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:56:02 --> Query error: Unknown column 'WDDP' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|8[[:>:]]'
AND t.min_salary >= WDDP
AND   (
`t`.`job_title` LIKE '%lVlp%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%lVlp%' ESCAPE '!'
OR  `t`.`address1` LIKE '%YarF%' ESCAPE '!'
OR  `t`.`address2` LIKE '%YarF%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:56:02 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:56:02 --> Query error: Unknown column 'xfwy' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|4[[:>:]]'
AND t.min_salary >= xfwy
AND   (
`t`.`job_title` LIKE '%coCn%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%coCn%' ESCAPE '!'
OR  `t`.`address1` LIKE '%dYBa%' ESCAPE '!'
OR  `t`.`address2` LIKE '%dYBa%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:56:02 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:56:03 --> Query error: Unknown column 'TCqk' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|9[[:>:]]'
AND t.min_salary >= TCqk
AND   (
`t`.`job_title` LIKE '%vFNr%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%vFNr%' ESCAPE '!'
OR  `t`.`address1` LIKE '%OWpr%' ESCAPE '!'
OR  `t`.`address2` LIKE '%OWpr%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:56:03 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:56:04 --> Query error: Unknown column 'Rtkt' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|27[[:>:]]'
AND t.min_salary >= Rtkt
AND   (
`t`.`job_title` LIKE '%nJSE%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%nJSE%' ESCAPE '!'
OR  `t`.`address1` LIKE '%syzB%' ESCAPE '!'
OR  `t`.`address2` LIKE '%syzB%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:56:04 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:56:04 --> Query error: Unknown column 'VQTD' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|47[[:>:]]'
AND t.min_salary >= VQTD
AND   (
`t`.`job_title` LIKE '%KIli%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%KIli%' ESCAPE '!'
OR  `t`.`address1` LIKE '%rBRv%' ESCAPE '!'
OR  `t`.`address2` LIKE '%rBRv%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:56:04 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:56:05 --> Query error: Unknown column 'axNP' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|29[[:>:]]'
AND t.min_salary >= axNP
AND   (
`t`.`job_title` LIKE '%vNWm%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%vNWm%' ESCAPE '!'
OR  `t`.`address1` LIKE '%gJDq%' ESCAPE '!'
OR  `t`.`address2` LIKE '%gJDq%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:56:05 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:56:05 --> Query error: Unknown column 'PeHS' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|46[[:>:]]'
AND t.min_salary >= PeHS
AND   (
`t`.`job_title` LIKE '%EktV%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%EktV%' ESCAPE '!'
OR  `t`.`address1` LIKE '%hlUd%' ESCAPE '!'
OR  `t`.`address2` LIKE '%hlUd%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:56:05 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:56:06 --> Query error: Unknown column 'rcdM' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|2[[:>:]]'
AND t.min_salary >= rcdM
AND   (
`t`.`job_title` LIKE '%DJBV%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%DJBV%' ESCAPE '!'
OR  `t`.`address1` LIKE '%NGda%' ESCAPE '!'
OR  `t`.`address2` LIKE '%NGda%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:56:06 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:56:06 --> Query error: Unknown column 'NLNy' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|21[[:>:]]'
AND t.min_salary >= NLNy
AND   (
`t`.`job_title` LIKE '%PELn%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%PELn%' ESCAPE '!'
OR  `t`.`address1` LIKE '%BAIw%' ESCAPE '!'
OR  `t`.`address2` LIKE '%BAIw%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:56:06 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:56:07 --> Query error: Unknown column 'xZpP' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|17[[:>:]]'
AND t.min_salary >= xZpP
AND   (
`t`.`job_title` LIKE '%jitR%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%jitR%' ESCAPE '!'
OR  `t`.`address1` LIKE '%WeKe%' ESCAPE '!'
OR  `t`.`address2` LIKE '%WeKe%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:56:07 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:56:08 --> Query error: Unknown column 'twzU' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1', '2')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13[[:>:]]'
AND t.min_salary >= twzU
AND   (
`t`.`job_title` LIKE '%lCum%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%lCum%' ESCAPE '!'
OR  `t`.`address1` LIKE '%QjtI%' ESCAPE '!'
OR  `t`.`address2` LIKE '%QjtI%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:56:08 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:56:08 --> Query error: Unknown column 'jTic' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1', '3')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13[[:>:]]'
AND t.min_salary >= jTic
AND   (
`t`.`job_title` LIKE '%xVOE%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%xVOE%' ESCAPE '!'
OR  `t`.`address1` LIKE '%DeLl%' ESCAPE '!'
OR  `t`.`address2` LIKE '%DeLl%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:56:08 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:56:09 --> Query error: Unknown column 'fnXF' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1', '4')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13[[:>:]]'
AND t.min_salary >= fnXF
AND   (
`t`.`job_title` LIKE '%mptU%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%mptU%' ESCAPE '!'
OR  `t`.`address1` LIKE '%aBMq%' ESCAPE '!'
OR  `t`.`address2` LIKE '%aBMq%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:56:09 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:56:09 --> Query error: Unknown column 'lAIT' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1', '5')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13[[:>:]]'
AND t.min_salary >= lAIT
AND   (
`t`.`job_title` LIKE '%pPvH%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%pPvH%' ESCAPE '!'
OR  `t`.`address1` LIKE '%ZGDW%' ESCAPE '!'
OR  `t`.`address2` LIKE '%ZGDW%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:56:09 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:56:10 --> Query error: Unknown column 'dTvJ' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1', '6')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13[[:>:]]'
AND t.min_salary >= dTvJ
AND   (
`t`.`job_title` LIKE '%NPsg%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%NPsg%' ESCAPE '!'
OR  `t`.`address1` LIKE '%HYWa%' ESCAPE '!'
OR  `t`.`address2` LIKE '%HYWa%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:56:10 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:56:10 --> Query error: Unknown column 'DXGh' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1', '7')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13[[:>:]]'
AND t.min_salary >= DXGh
AND   (
`t`.`job_title` LIKE '%PVgQ%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%PVgQ%' ESCAPE '!'
OR  `t`.`address1` LIKE '%vDqW%' ESCAPE '!'
OR  `t`.`address2` LIKE '%vDqW%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:56:10 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:56:11 --> Query error: Unknown column 'OiUc' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|19[[:>:]]'
AND t.min_salary >= OiUc
AND   (
`t`.`job_title` LIKE '%mKeB%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%mKeB%' ESCAPE '!'
OR  `t`.`address1` LIKE '%rWag%' ESCAPE '!'
OR  `t`.`address2` LIKE '%rWag%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:56:11 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
ERROR - 2018-02-11 08:56:11 --> Query error: Unknown column 'kzab' in 'where clause' - Invalid query: SELECT `t`.*, `pref`.`name` as `pref_name`, `pref`.`slug` as `pref_slug`, `jcat_l`.`name` as `jcat_l`, `jcat_m`.`name` as `jcat_m`, `jcat_s`.`name` as `jcat_s`, `m`.`type` as `media_type`, `m`.`logo_file` as `media_logo_file`, `m`.`link_url`
FROM `job` `t`
LEFT JOIN `hotel_type` `h_type` ON `h_type`.`id` = `t`.`hotel_type_id`
LEFT JOIN `job_category_l` `jcat_l` ON `jcat_l`.`id` = `t`.`job_category_l_id`
LEFT JOIN `job_category_m` `jcat_m` ON `jcat_m`.`id` = `t`.`job_category_m_id`
LEFT JOIN `job_category_s` `jcat_s` ON `jcat_s`.`id` = `t`.`job_category_s_id`
LEFT JOIN `industory_l` `ind_l` ON `ind_l`.`id` = `t`.`industory_l_id`
LEFT JOIN `industory_m` `ind_m` ON `ind_m`.`id` = `t`.`industory_m_id`
LEFT JOIN `prefecture` `pref` ON `pref`.`pref_cd` = `t`.`pref_cd`
LEFT JOIN `media` `m` ON `m`.`name` = `t`.`product_name`
WHERE `t`.`deleted_at` IS NULL
AND `job_category_s_id` IN('346')
AND `employ_type_class` IN('1')
AND `mid_career_flag` = '1'
AND `female_flag` = '1'
AND `foreign_company_flag` = '1'
AND `market_id` = '1'
AND `flex_flag` = '1'
AND `cloth_free_flag` = '1'
AND `two_day_off_flag` = '1'
AND `holiday_120` = '1'
AND `average_age_flag` = '1'
AND `any_education_flag` IN('1')
AND `uturn_flag` IN('1')
AND `inexperienced_flag` IN('1')
AND `no_relocation_flag` IN('1')
AND `work_abroad` IN('1')
AND `manager` IN('1')
AND `company_house_flag` IN('1')
AND `child_care_flag` IN('1')
AND `stock_holding_flag` IN('1')
AND `training_flag` IN('1')
AND `qualification_flag` IN('1')
AND `internal_venture_flag` IN('1')
AND `independent_support_flag` IN('1')
AND `second_graduate_flag` IN('1')
AND t.publish_start_date <= CURDATE()
AND t.publish_end_date >= CURDATE()
AND t.work_place REGEXP '[[:<:]]13|44[[:>:]]'
AND t.min_salary >= kzab
AND   (
`t`.`job_title` LIKE '%bppw%' ESCAPE '!'
OR  `t`.`job_description` LIKE '%bppw%' ESCAPE '!'
OR  `t`.`address1` LIKE '%pZsy%' ESCAPE '!'
OR  `t`.`address2` LIKE '%pZsy%' ESCAPE '!'
 )
ORDER BY `publish_start_date` DESC
 LIMIT 15
ERROR - 2018-02-11 08:56:11 --> Severity: Error --> Call to a member function result() on boolean /usr/share/nginx/hotelier-jobs/application/models/Job_model.php 178
