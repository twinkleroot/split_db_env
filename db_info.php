<?php
require_once('./db_config.php');

list($s1_ip, $s1_port, $s1_dbname, $s1_username, $s1_password) = get_db_config(_DB_NAME_ONE_);
list($s2_ip, $s2_port, $s2_dbname, $s2_username, $s2_password) = get_db_config(_DB_NAME_TWO_);
list($s3_ip, $s3_port, $s3_dbname, $s3_username, $s3_password) = get_db_config(_DB_NAME_THREE_);
list($custom_ip, $custom_port, $custom_dbname, $custom_username, $custom_password) = get_db_config(_DB_NAME_CUSTOM_);

define('_SERVER01_DB_ID_', $s1_username);
define('_SERVER01_DB_PW_', $s1_password);
define('_SERVER01_DB_IP_', $s1_ip);
define('_SERVER01_DB_PORT_', $s1_port);
define('_SERVER01_DB_NAME_', $s1_dbname);

define('_SERVER02_DB_ID_', $s2_username);
define('_SERVER02_DB_PW_', $s2_password);
define('_SERVER02_DB_IP_', $s2_ip);
define('_SERVER02_DB_PORT_', $s2_port);
define('_SERVER02_DB_NAME_', $s2_dbname);

define('_SERVER03_DB_ID_', $s3_username);
define('_SERVER03_DB_PW_', $s3_password);
define('_SERVER03_DB_IP_', $s3_ip);
define('_SERVER03_DB_PORT_', $s3_port);
define('_SERVER03_DB_NAME_', $s3_dbname);

define('_CUSTOM_DB_ID_', $custom_username);
define('_CUSTOM_DB_PW_', $custom_password);
define('_CUSTOM_DB_IP_', $custom_ip);
define('_CUSTOM_DB_PORT_', $custom_port);
define('_CUSTOM_DB_NAME_', $custom_dbname);