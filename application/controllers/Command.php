<?php
class Command extends CI_Controller {

    protected $logs = array();
    protected $log_file = '';
    protected $no_log = false;

    public function __construct()
    {
        parent::__construct();

        ini_set('memory_limit', '512M');

        $this->load->helper('file');
        $this->load->model('Job_model');
        $this->load->model('User_model');
        $this->load->model('Industory_l_model');
        $this->load->model('Industory_m_model');
        $this->load->model('Job_category_l_model');
        $this->load->model('Job_category_m_model');
        $this->load->model('Job_category_s_model');
        $this->load->model('Market_model');
        $this->load->model('Area_model');
        $this->load->model('Prefecture_model');
        $this->load->model('Job_image');
    }

    /**
     * Command to import master data from CSV
     * index.php command master_import
     */
    public function master_import() {
        // Clear master table before imporLt
        $master_table = ['industory_l', 'industory_m', 'job_category_l', 'job_category_m', 'job_category_s', 'area', 'prefecture', 'market'];
        foreach ($master_table as $table) {
            $this->db->truncate($table);
        }

        // Import  industory_l table
        $file_path = $this->config->item('master_csv_path'). 'industory_l.csv';
        $handle = fopen($file_path, 'r');
        $r = 0;
        $data = array();
        while ($row = fgetcsv($handle, 2000)) {
            if ($r == 0) {
                // skip first line
                $r++;
                continue;
            }
            $data[] = array (
                'code' => $row[0],
                'name' => $row[1],
                'sort_order' => $r,
            );

            $r++;
        }
        $this->Industory_l_model->insert_batch($data);
        fclose($handle);
        echo "  > Industory_l master data is imported.\n";

        // Import  industory_m table
        $file_path = $this->config->item('master_csv_path'). 'industory_m.csv';
        $handle = fopen($file_path, 'r');
        $r = 0;
        $data = array();
        while ($row = fgetcsv($handle, 2000)) {
            if ($r == 0) {
                // skip first line
                $r++;
                continue;
            }
            // find industory_l id
            $industory_l = $this->Industory_l_model->find_one_by(array('code' => $row[3]));
            if ($industory_l == null) {
                continue;
            }
            $data[] = array (
                'code' => $row[0],
                'name' => $row[1],
                'sort_order' => $row[2],
                'industory_l_id' => $industory_l->id,
            );
            $r++;
        }
        $this->Industory_m_model->insert_batch($data, false);
        fclose($handle);
        echo "  > Industory_m master data is imported.\n";

        // Import  job_category_l table
        $file_path = $this->config->item('master_csv_path'). 'job_category_l.csv';
        $handle = fopen($file_path, 'r');
        $r = 0;
        $data = array();
        while ($row = fgetcsv($handle, 2000)) {
            if ($r == 0) {
                // skip first line
                $r++;
                continue;
            }
            $data[] = array (
                'code' => $row[0],
                'name' => $row[1],
                'sort_order' => $r,
            );
            $r++;
        }
        $this->Job_category_l_model->insert_batch($data, false);
        fclose($handle);
        echo "  > Job_category_l master data is imported.\n";

        // Import  job_category_m table
        $file_path = $this->config->item('master_csv_path'). 'job_category_m.csv';
        $handle = fopen($file_path, 'r');
        $r = 0;
        $data = array();
        while ($row = fgetcsv($handle, 2000)) {
            if ($r == 0) {
                // skip first line
                $r++;
                continue;
            }

            // find job_category_l id
            $job_category_l = $this->Job_category_l_model->find_one_by(array('code' => $row[3]));
            if ($job_category_l == null) {
                continue;
            }
            $data[] = array (
                'code' => $row[0],
                'name' => $row[1],
                'sort_order' => $row[2],
                'job_category_l_id' => $job_category_l->id,
            );
            $r++;
        }
        $this->Job_category_m_model->insert_batch($data);
        fclose($handle);
        echo "  > Job_category_m master data is imported.\n";

        // Import  job_category_s table
        $file_path = $this->config->item('master_csv_path'). 'job_category_s.csv';
        $handle = fopen($file_path, 'r');
        $r = 0;
        $data = array();
        while ($row = fgetcsv($handle, 2000)) {
            if ($r == 0) {
                // skip first line
                $r++;
                continue;
            }
            // find job_category_m id
            $job_category_m = $this->Job_category_m_model->find_one_by(array('code' => $row[3]));
            if ($job_category_m == null) {
                continue;
            }
            // find job_category_l id
            $job_category_l = $this->Job_category_l_model->find_one_by(array('code' => substr($row[3], 0, 2)));
            if ($job_category_l == null) {
                continue;
            }
            $data[] = array (
                'code' => $row[0],
                'name' => $row[1],
                'sort_order' => $row[2],
                'job_category_l_id' => $job_category_l->id,
                'job_category_m_id' => $job_category_m->id,
            );
            $r++;
        }
        $this->Job_category_s_model->insert_batch($data);
        fclose($handle);
        echo "  > Job_category_s master data is imported.\n";

        // Import market table
        $file_path = $this->config->item('master_csv_path'). 'market.csv';
        $handle = fopen($file_path, 'r');
        $r = 0;
        $data = array();
        while ($row = fgetcsv($handle, 2000)) {
            if ($r == 0) {
                // skip first line
                $r++;
                continue;
            }
            $data[] = array (
                'name' => $row[1],
                'sort_order' => $r,
            );
            $r++;
        }
        $this->Market_model->insert_batch($data);
        fclose($handle);
        echo "  > Market master data is imported.\n";

        // Import area table
        $file_path = $this->config->item('master_csv_path'). 'area.csv';
        $handle = fopen($file_path, 'r');
        $r = 0;
        $data = array();
        while ($row = fgetcsv($handle, 2000)) {
            if ($r == 0) {
                // skip first line
                $r++;
                continue;
            }
            $data[] = array(
                'code' => $row[0],
                'name' => $row[1],
                'sort_order' => $r,
            );
            $r++;
        }
        $this->Area_model->insert_batch($data);
        fclose($handle);
        echo "  > Area master data is imported.\n";

        // Import prefecture table
        $file_path = $this->config->item('master_csv_path'). 'prefecture.csv';
        $handle = fopen($file_path, 'r');
        $r = 0;
        $data = array();
        while ($row = fgetcsv($handle, 2000)) {
            if ($r == 0) {
                // skip first line
                $r++;
                continue;
            }
            // find area id
            $area = $this->Area_model->find_one_by(array('code' => $row[2]));
            if ($area == null) {
                continue;
            }
            $data[] = array(
                'pref_cd' => $row[0],
                'area_id' => $area->id,
                'name' => $row[1],
                'sort_order' => $row[3],
            );
            $r++;
        }
        $this->Prefecture_model->insert_batch($data);
        fclose($handle);
        echo "  > Prefecture master data is imported.\n";
    }

    /**
     * Command to to update slug in prefectures
     * index.php command slugify_prefecture
     */
    public function slugify_prefecture()
    {
        $slug = array(
            '1' => 'hokkaido',
            '2' => 'aomori',
            '3' => 'iwate',
            '4' => 'miyagi',
            '5' => 'akita',
            '6' => 'yamagata',
            '7' => 'fukushima',
            '8' => 'ibaraki',
            '9' => 'tochigi',
            '10' => 'gunma',
            '11' => 'saitama',
            '12' => 'chiba',
            '13' => 'tokyo',
            '14' => 'kanagawa',
            '15' => 'niigata',
            '16' => 'toyama',
            '17' => 'ishikawa',
            '18' => 'fukui',
            '19' => 'yamanashi',
            '20' => 'nagano',
            '21' => 'gifu',
            '22' => 'shizuoka',
            '23' => 'aichi',
            '24' => 'mie',
            '25' => 'shiga',
            '26' => 'kyoto',
            '27' => 'osaka',
            '28' => 'hyogo',
            '29' => 'nara',
            '30' => 'wakayama',
            '31' => 'tottori',
            '32' => 'shimane',
            '33' => 'okayama',
            '34' => 'hiroshima',
            '35' => 'yamaguchi',
            '36' => 'tokushima',
            '37' => 'kagawa',
            '38' => 'ehime',
            '39' => 'kochi',
            '40' => 'fukuoka',
            '41' => 'saga',
            '42' => 'nagasaki',
            '43' => 'kumamoto',
            '44' => 'oita',
            '45' => 'miyazaki',
            '46' => 'kagoshima',
            '47' => 'okinawa',
            '48' => 'overseas',
        );

        foreach ($slug as $key => $value)
        {
            $sql = "UPDATE prefecture SET slug = '$value' WHERE id= $key " ;
            $this->db->query($sql);
        }

        $this->add_log('Done.');
    }

    /**
     * Command to import job data from CSV
     * index.php command jobs_import [doda|an]
     */
    public function jobs_import($source) {
        $source = strtolower($source);
        if (!in_array($source, array('doda', 'an'))) {
            die('Invalid source.');
        }
        if ($source == 'doda') {
            $this->jobs_import_doda();
        } else {
            $this->jobs_import_an();
        }
    }

    /**
     * import DODA's job data from CSV
     */
    private function jobs_import_doda() {
        $file_path          = $this->config->item('data_csv_path'). 'DODA/super_kyujin.csv';
        $zip_source         = $this->config->item('data_img_path'). 'DODA/images.zip';
        $zip_destination    = $this->config->item('data_img_path'). 'DODA/'. date('YmdHis');
        $this->log_file     = $this->config->item('log_path'). date('Ymd') . '-jobs_import_doda.log';

        $db_column = array(
            '1' => 'order_id',
            '2' => 'order_no',
            '3' => 'job_code',
            '4' => 'real_name_job_id',
            '5' => 'anonymous_job_id',
            '6' => 'public_cd',
            '7' => 'publish_start_date',
            '8' => 'publish_end_date',
            '9' => 'company_name',
            '10' => 'establish_date',
            '11' => 'representative',
            '12' => 'employee_count',
            '13' => 'capital',
            '16' => 'job_title',
            '17' => 'pref_cd',
            '18' => 'address1',
            '19' => 'address2',
            '20' => 'company_description',
            '21' => 'company_url',
            '22' => 'market_id',
            '23' => 'average_age',
            '24' => 'job_category_l_id',
            '25' => 'job_category_m_id',
            '26' => 'job_category_s_id',
            '29' => 'job_description',
            '30' => 'job_detail',
            '31' => 'min_salary',
            '32' => 'max_salary',
            '33' => 'salary',
            '34' => 'work_place',
            '35' => 'requirement',
            '36' => 'requirement_detail',
            '37' => 'age_restriction',
            '38' => 'min_age',
            '39' => 'max_age',
            '40' => 'work_time',
            '41' => 'flex_flag',
            '42' => 'holiday',
            '43' => 'treatment',
            '44' => 'selection_process',
            '45' => 'application_method',
            '46' => 'inexperienced_flag',
            '47' => 'second_graduate_flag',
            '48' => 'foreign_company_flag',
            '49' => 'created_at',
            '50' => 'updated_at',
            '51' => 'plan_type_id',
            '52' => 'plan_name',
            '53' => 'publish_period',
            '54' => 'new_class',
            '55' => 'manuscript_id',
            '56' => 'search_company_name1',
            '57' => 'search_company_name2',
            '58' => 'search_company_name3',
            '59' => 'search_company_name4',
            '60' => 'search_company_name5',
            '61' => 'holiday_120',
            '62' => 'work_abroad',
            '63' => 'manager',
            '64' => 'employ_type_class',
            '69' => 'job_detail_title',
            '70' => 'job_text',
            '81' => 'recruit_background',
            '82' => 'free_space_title',
            '83' => 'free_space_detail',
            '88' => 'language1',
            '89' => 'language2',
            '90' => 'zip_code',
            '99' => 'guidance_reason',
            '100' => 'supplement',
            '101' => 'contact_info',
            '102' => 'work_place2',
            '103' => 'search_work_place',
            '104' => 'traffic',
            '105' => 'standard_working_hours',
            '107' => 'employ_period',
            '108' => 'salary2',
            '109' => 'job_category_l_id2',
            '110' => 'job_category_m_id2',
            '111' => 'job_category_s_id2',
            '112' => 'representative_position',
            '115' => 'earnings',
            '118' => 'industory_m_id',
            '119' => 'industory_l_id',
            '136' => 'deleted_at',
            '137' => 'logical_deletion',
            '138' => 'job_details_id1',
            '139' => 'job_details_id2',
            '146' => 'annual_income_example2',
            '147' => 'annual_income_example3',
            '148' => 'annual_income_example4',
            '149' => 'annual_income_example5',
            '150' => 'profit',
            '151' => 'list_message',
            '167' => 'any_education_flag',
            '168' => 'mid_career_flag',
            '169' => 'average_age_flag',
            '170' => 'no_relocation_flag',
            '171' => 'stock_option_flag',
            '172' => 'employ500',
            '173' => 'employ1000',
            '174' => 'continuous_growth_flag',
            '175' => 'cloth_free_flag',
            '176' => 'female_flag',
            '177' => 'commission_flag',
            '178' => 'annual_salary_flag',
            '179' => 'internal_venture_flag',
            '180' => 'uturn_flag',
            '181' => 'cafeteria_plan_flag',
            '182' => 'stock_holding_flag',
            '183' => 'independent_support_flag',
            '184' => 'long_vacation_flag',
            '185' => 'child_care_flag',
            '186' => 'two_day_off_flag',
            '187' => 'company_house_flag',
            '188' => 'qualification_flag',
            '189' => 'training_flag',
            '190' => 'product_name',
            '196' => 'post_complete',
            '204' => 'other_job',
            '205' => 'seminar_title_id',
            '206' => 'issue_no_from',
            '207' => 'issue_no_to',
            '209' => 'link_job_id',
            '210' => 'search_comp_name_kana',
            '211' => 'job_type',
            '212' => 'selection_point',
            '213' => 'pay_rise',
            '214' => 'bonus',
        );
        //row 67 for image1 , 71  for image2, 75 for image3, 79 for image4
        $job_image_column = array(66, 70, 75, 78);

        $handle = fopen($file_path, 'r');
        $this->add_log('Processing '. $file_path);

        $sh = stream_filter_prepend($handle, 'convert.iconv.cp932/utf-8', STREAM_FILTER_READ);

        $insertedCount = 0;
        $updatedCount = 0;
        $rowCount = 0;

        if ($sh == true) {
            // transaction start
            $this->db->trans_start();

            //extract zip file
            $zip_extract = extractZip($zip_source, $zip_destination);
            if ($zip_extract) {
                unlink($zip_source);
                $this->add_log('extracting zip file.');
            } else {
                $this->add_log('zip file failed to extract.');
            }

            $hotel_industory_l    = array(15);
            $hotel_industory_m    = array(1502);
            $hotel_job_category_l = array(11);
            $hotel_job_category_m = array(1105);
            $hotel_job_category_s = array(110501, 110502, 110503, 110504, 110505, 110506, 110507, 110508);

            while ($row = fgetcsv($handle, 8000)) {
                $rowCount++;
                if ($row === null || count($row) < count($db_column)) {
                    // skip empty lines
                    $this->add_log('skip row '. $rowCount.' for incomplete record.');
                    $this->write_log($this->log_file);
                    continue;
                }

                $job_code = trim($row[2]);
                $job_data = array();
                foreach ($db_column as $key => $value) {
                    $col = $key - 1;
                    if (count($row) < $key) {
                        $this->add_log('Skip row '. $rowCount.' for incomplete record.');
                        $this->write_log($this->log_file);
                        break;
                    }

                    if (!empty($row[118]) && !empty($row[117]) && !empty($row[23]) && !empty($row[24]) && !empty($row[25])) {
                        //check industry
                        if (!(in_array($row[118], $hotel_industory_l) && in_array($row[117], $hotel_industory_m))) {
                            // if industry is not in code, check category
                            if (!(in_array($row[23], $hotel_job_category_l) && in_array($row[24], $hotel_job_category_m)  && in_array($row[25], $hotel_job_category_s))) {
                               $this->add_log('Skip row '. $rowCount.' for not matching hotel industry or job category');
                               $this->write_log($this->log_file);
                               continue 2;
                            }
                        }
                    } else {
                        $this->add_log('Skip row '. $rowCount.' for industry or job category fields is blank');
                        $this->write_log($this->log_file);
                        continue 2;
                    }

                    switch ($value) {
                        case 'industory_l_id':
                            // industory_l
                            $industory_l = $this->Industory_l_model->find_one_by(array('code' => $row[$col]));
                            $job_data[$value] = $industory_l->id;
                            break;

                        case 'industory_m_id':
                            // industory_m
                                $industory_m = $this->Industory_m_model->find_one_by(array('code' => $row[$col]));
                                $job_data[$value] = $industory_m->id;
                            break;

                        case 'job_category_l_id':
                            // job_category_l
                                $job_category_l = $this->Job_category_l_model->find_one_by(array('code' => $row[$col]));
                                $job_data[$value] = $job_category_l->id;
                            break;

                        case 'job_category_m_id':
                            // job_category_m
                                $job_category_m = $this->Job_category_m_model->find_one_by(array('code' => $row[$col]));
                                $job_data[$value] = $job_category_m->id;
                            break;

                        case 'job_category_s_id':
                            // job_category_s
                                $job_category_s = $this->Job_category_s_model->find_one_by(array('code' => $row[$col]));
                                $job_data[$value] = $job_category_s->id;
                            break;

                        case 'job_category_l_id2':
                            // job_category_l2
                            $job_category_l = $this->Job_category_l_model->find_one_by(array('code' => $row[$col]));
                            $job_data[$value] = empty($job_category_l) ? '' : $job_category_l->id;
                            if (empty($job_category_l)) {
                                $this->add_log('No job_category_l_id2 for job_code=' . $job_code . ' in row no. '. $rowCount);
                            }
                            break;

                        case 'job_category_m_id2':
                            // job_category_m2
                            $job_category_m = $this->Job_category_m_model->find_one_by(array('code' => $row[$col]));
                            $job_data[$value] = empty($job_category_m) ? '' : $job_category_m->id;
                            if (empty($job_category_m)) {
                                $this->add_log('No job_category_m_id2 for job_code=' . $job_code . ' in row no. '. $rowCount);
                            }
                            break;

                        case 'job_category_s_id2':
                            // job_category_s2
                            $job_category_s = $this->Job_category_s_model->find_one_by(array('code' => $row[$col]));
                            $job_data[$value] = empty($job_category_s) ? '' : $job_category_s->id;
                            if (empty($job_category_s)) {
                                $this->add_log('No job_category_s_id2 for job_code=' . $job_code . ' in row no. '. $rowCount);
                            }
                            break;

                        case 'order_id':
                        case 'deleted_at':
                            $job_data[$value] = $row[$col] ? $row[$col] : null;
                            break;

                        case 'product_name':
                            $job_data[$value] = MEDIA_DODA;
                            break;

                        default:
                            $job_data[$value] = $row[$col];
                    }
                }

                $job_id = '';
                $job = $this->Job_model->find_one_by(array('job_code' => $job_code));
                if (empty($job)) {
                    $job_id = $this->Job_model->insert($job_data);
                    $this->add_log('Save job_code=' . $job_code . ' in row no. '. $rowCount);
                    $insertedCount++;
                } else {
                    $job_id = $job->id;
                    $this->Job_model->update($job->id, $job_data);
                    $this->add_log('Update job_code=' . $job_code . ' in row no. '. $rowCount);
                    $updatedCount++;
                }

                // insert data to job image
                if ($zip_extract) {
                    for ($i = 0; $i < count($job_image_column); $i++) {
                        $column_no = $job_image_column[$i];
                        if (!empty($row[$column_no])) {
                            $image_file = $zip_destination. '/'. $row[$column_no];
                            if (file_exists($image_file)) {
                                // check same image file already exit in db or NumberFormatter
                                $job_image = $this->Job_image->find_by(array('url' => $row[$column_no]));
                                if (!$job_image) {
                                    // move image to $image_fileupload folder
                                    if (rename($image_file, $this->config->item('upload_img_path').$row[$column_no])) {
                                        // insert to db
                                        $this->Job_image->insert(array(
                                            'job_id'    => $job_id,
                                            'url'       => $row[$column_no],
                                        ));
                                        $this->add_log('Save image for job_code=' . $job_code . 'image_name='.$row[$column_no] .' in row no. '. $rowCount);
                                    }
                                } else {
                                    $this->add_log('Image is already exist job_code=' . $job_code . 'image_name='.$row[$column_no] .' in row no. '. $rowCount);
                                }
                            } else {
                                $this->add_log('Image not found in upload zip file job_code=' . $job_code . 'image_name='.$row[$column_no] .' in row no. '. $rowCount);
                            }
                        }
                    }
                }

                $this->write_log($this->log_file);
            }

            // translation end
            $this->db->trans_complete();
            fclose($handle);

            // remove extracted image folder
            removeDir($zip_destination);

            $this->add_log($insertedCount . ' jobs inserted.');
            $this->add_log($updatedCount . ' jobs updated.');
        } else {
            $this->add_log('Character encoding problem');
        }

        $this->write_log($this->log_file);
    }

    /**
     * Command to send job daily digest mail
     * index.php command job_daily_digest
     */
    public function job_daily_digest()
    {
        $this->log_file = $this->config->item('log_path'). date('Ymd') . '-job_daily_digest.log';

        $mail_config = $this->config->item('mail');
        $mail_setting = array();
        if(is_array($mail_config)){
            foreach ($mail_config as $key => $value) {
                if ($value !== null) {
                    $mail_setting[$key] = $value;
                }
            }
        }
        $this->email->initialize($mail_setting);

        $users = $this->User_model->find_alert_mail_users();

        $this->add_log(sprintf('%d user(s) to send', count($users)));
        foreach ($users as $user) {
            $filter = unserialize($user->conditions);
            $filter['DATE(t.created_at)'] = date('Y-m-d');

            $query = [];
            array_walk($filter, function ($value, $key) use (&$query) {
                $query["q[$key]"] = $value;
            });

            $jobs = $this->Job_model->search($filter, ['t.publish_start_date' => 'desc']);
            if (!empty($jobs)) {
                $data = array(
                    'site_title' => $this->config->item('site_title'),
                    'name'       => $user->last_name ? $user->last_name . ' ' . $user->first_name . '様' : $user->email,
                    'jobs'       => $jobs,
                    'more_url'  => site_url('jobs') . '?' . http_build_query($query),
                );

                $this->email->from($this->config->item('send_mail_from'), $this->config->item('site_title'));
                $this->email->to($user->email);
                $this->email->subject('【HOTELIER JOBS】あなたの希望条件に合った求人情報が登録されました');
                $this->email->message($this->load->view('email_templates/job_daily_digest.tpl.php', $data, true));

                if ($this->email->send()) {
                    $this->add_log(sprintf('%d matching job(s) sent to %s.', count($jobs), $user->email));
                } else {
                    $this->add_log(sprintf('Mail delivery failed to %s.', count($jobs), $user->email));
                }
            } else {
                $this->add_log(sprintf('No job found for %s', $user->email));
            }

            $this->add_log('|__ Query: '.http_build_query($query), false);
            $this->write_log($this->log_file);
        }
    }

    /**
     * Command to update users.profile_status
     * index.php command update_profile_status
     */
    public function update_profile_status()
    {
        $users = $this->db->select('u.id, u.first_name, u.last_name, ug.group_id, (SELECT COUNT(id) FROM working_history WHERE job_seeker_id = j.id AND deleted_at IS NULL LIMIT 1) AS career_history')
            ->from('users u')
            ->join('users_groups ug', 'ug.user_id = u.id')
            ->join('job_seeker j', 'j.user_id = u.id', 'left')
            ->where('u.profile_status = 0')
            ->where('u.active = 1')
            ->where('u.deleted_at IS NULL')
            ->get()
            ->result();

        $count = 0;
        foreach ($users as $user) {
            if ($user->group_id != GROUP_JOBSEEKER) {
                $this->db->where('id', $user->id);
                $this->db->update('users', array('profile_status' => 2));

                $this->add_log(sprintf('User ID: %d', $user->id));
                $count++;
                continue;
            }

            if ($user->first_name && $user->last_name && $user->career_history) {
                $this->db->where('id', $user->id);
                $this->db->update('users', array('profile_status' => 2));

                $this->add_log(sprintf('User ID: %d', $user->id));
                $count++;
                continue;
            }

            if ($user->first_name && $user->last_name && !$user->career_history) {
                $this->db->where('id', $user->id);
                $this->db->update('users', array('profile_status' => 1));

                $this->add_log(sprintf('User ID: %d', $user->id));
                $count++;
                continue;
            }
        }

        $this->add_log(sprintf('%d user(s) updated.', $count));
    }

    /**
    * Add log line
    * @param string $msg The log message
    * @param object $output OutputInterface
    */
    protected function add_log($msg = null, $output = true)
    {
        $this->logs[] = '['.date('Y-m-d H:i:s').'] '.$msg;
        if ($output) {
            echo '  > '.$msg. "\n";
        }
    }
    /**
    * Write logs to file
    * @param string $file  The absolute file path to the log file
    * @return boolean
    */
    protected function write_log($file)
    {
        if (count($this->logs) && $this->no_log === false) {
            $logs = implode(PHP_EOL, $this->logs).PHP_EOL;
            if (file_put_contents($file, $logs, FILE_APPEND)) {
                $this->logs = array();
                return true;
            }
        }

        return false;
    }
}
