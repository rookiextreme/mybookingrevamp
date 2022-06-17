<?php  if ( ! defined('BASEPATH') && ! defined('INSTALLATION_BASEPATH')) exit('No direct script access allowed setting');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'default';
$active_record = TRUE;

//$db['default']['hostname'] = '172.20.0.129';
//$db['default']['username'] = 'test_server';
//$db['default']['password'] = 'test_server';
//$db['default']['database'] = 'mybooking_db';
//$db['default']['dbdriver'] = 'mysql';

$db['sumber']['database'] = 'sumber_live';
$db['sumber']['hostname'] = 'localhost';
$db['sumber']['username'] = 'rookiextreme';
$db['sumber']['password'] = '123123123';
$db['sumber']['dbdriver'] = 'postgre';

$db['default']['database'] = 'mybooking_db';
$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'rookiextreme';
$db['default']['password'] = '123123123';
$db['default']['dbdriver'] = 'postgre';

$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = FALSE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;


////------------mybooking connection-------------------
//
//$active_group1 = 'mybooking';
//$active_record1 = TRUE;
//
//$db['mybooking']['database'] = 'mybooking';
//$db['mybooking']['hostname'] = '172.20.1.199';
//$db['mybooking']['username'] = 'sepakat';
//$db['mybooking']['password'] = '$3p4k4t$';
//
//$db['mybooking']['dbdriver'] = 'postgre';
//$db['mybooking']['dbprefix'] = '';
//$db['mybooking']['pconnect'] = TRUE;
//$db['mybooking']['db_debug'] = TRUE;
//$db['mybooking']['cache_on'] = FALSE;
//$db['mybooking']['cachedir'] = '';
//$db['mybooking']['char_set'] = 'utf8';
//$db['mybooking']['dbcollat'] = 'utf8_general_ci';
//$db['mybooking']['swap_pre'] = '';
//$db['mybooking']['autoinit'] = TRUE;
//$db['mybooking']['stricton'] = FALSE;
//
////--------------mykj connection---------------------
//$active_group2 = "mykj";
//$active_record2 = TRUE;
//




/* End of file database.php */
/* Location: ./application/config/database.php */
