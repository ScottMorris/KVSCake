# KVSCake
KVS is a simple inventory system that is designed to easily handle the distribution on inventory between Warehouses and Clients.  The project leverages CakePHP to help facilitate rapid development.  For design documentation, please contact the author (Scott) for more information.

## Requirements
- MySQL or compatibles
- Apache2
- PHP 5

This project uses CakePHP, see CakeREADME.md for CakePHP requirements.

## Database
### Files 
There are two files that 
1. `DatabaseSchema.sql` - Database schema
2. `DatabaseSampleData.sql` - Sample Data to Test

### Sample Database Configuration for CakePHP
'''
public $default = array(
                'datasource' => 'Database/Mysql',
                'persistent' => false,
                'host' => 'localhost',
                'login' => 'username',
                'password' => 'password',
                'database' => 'kvs',
                'prefix' => '',
                //'encoding' => 'utf8',
 );
'''
