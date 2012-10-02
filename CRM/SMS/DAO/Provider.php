<?php
/*
+--------------------------------------------------------------------+
| CiviCRM version 4.2                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2012                                |
+--------------------------------------------------------------------+
| This file is a part of CiviCRM.                                    |
|                                                                    |
| CiviCRM is free software; you can copy, modify, and distribute it  |
| under the terms of the GNU Affero General Public License           |
| Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
|                                                                    |
| CiviCRM is distributed in the hope that it will be useful, but     |
| WITHOUT ANY WARRANTY; without even the implied warranty of         |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
| See the GNU Affero General Public License for more details.        |
|                                                                    |
| You should have received a copy of the GNU Affero General Public   |
| License and the CiviCRM Licensing Exception along                  |
| with this program; if not, contact CiviCRM LLC                     |
| at info[AT]civicrm[DOT]org. If you have questions about the        |
| GNU Affero General Public License or the licensing of CiviCRM,     |
| see the CiviCRM license FAQ at http://civicrm.org/licensing        |
+--------------------------------------------------------------------+
*/
/**
 *
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2012
 * $Id$
 *
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
class CRM_SMS_DAO_Provider extends CRM_Core_DAO
{
    /**
     * static instance to hold the table name
     *
     * @var string
     * @static
     */
    static $_tableName = 'civicrm_sms_provider';
    /**
     * static instance to hold the field values
     *
     * @var array
     * @static
     */
    static $_fields = null;
    /**
     * static instance to hold the FK relationships
     *
     * @var string
     * @static
     */
    static $_links = null;
    /**
     * static instance to hold the values that can
     * be imported
     *
     * @var array
     * @static
     */
    static $_import = null;
    /**
     * static instance to hold the values that can
     * be exported
     *
     * @var array
     * @static
     */
    static $_export = null;
    /**
     * static value to see if we should log any modifications to
     * this table in the civicrm_log table
     *
     * @var boolean
     * @static
     */
    static $_log = false;
    /**
     * SMS Provider ID
     *
     * @var int unsigned
     */
    public $id;
    /**
     * Provider internal name points to option_value of option_group sms_provider_name
     *
     * @var string
     */
    public $name;
    /**
     * Provider name visible to user
     *
     * @var string
     */
    public $title;
    /**
     *
     * @var string
     */
    public $username;
    /**
     *
     * @var string
     */
    public $password;
    /**
     * points to value in civicrm_option_value for group sms_api_type
     *
     * @var int unsigned
     */
    public $api_type;
    /**
     *
     * @var string
     */
    public $api_url;
    /**
     * the api params in xml, http or smtp format
     *
     * @var text
     */
    public $api_params;
    /**
     *
     * @var boolean
     */
    public $is_default;
    /**
     *
     * @var boolean
     */
    public $is_active;
    /**
     * class constructor
     *
     * @access public
     * @return civicrm_sms_provider
     */
    function __construct()
    {
        $this->__table = 'civicrm_sms_provider';
        parent::__construct();
    }
    /**
     * returns all the column names of this table
     *
     * @access public
     * @return array
     */
    static function &fields()
    {
        if (!(self::$_fields)) {
            self::$_fields = array(
                'id' => array(
                    'name' => 'id',
                    'type' => CRM_Utils_Type::T_INT,
                    'required' => true,
                ) ,
                'name' => array(
                    'name' => 'name',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Name') ,
                    'maxlength' => 64,
                    'size' => CRM_Utils_Type::BIG,
                ) ,
                'title' => array(
                    'name' => 'title',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Title') ,
                    'maxlength' => 64,
                    'size' => CRM_Utils_Type::BIG,
                ) ,
                'username' => array(
                    'name' => 'username',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Username') ,
                    'maxlength' => 255,
                    'size' => CRM_Utils_Type::HUGE,
                ) ,
                'password' => array(
                    'name' => 'password',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Password') ,
                    'maxlength' => 255,
                    'size' => CRM_Utils_Type::HUGE,
                ) ,
                'api_type' => array(
                    'name' => 'api_type',
                    'type' => CRM_Utils_Type::T_INT,
                    'title' => ts('Api Type') ,
                    'required' => true,
                ) ,
                'api_url' => array(
                    'name' => 'api_url',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Api Url') ,
                    'maxlength' => 128,
                    'size' => CRM_Utils_Type::HUGE,
                ) ,
                'api_params' => array(
                    'name' => 'api_params',
                    'type' => CRM_Utils_Type::T_TEXT,
                    'title' => ts('Api Params') ,
                ) ,
                'is_default' => array(
                    'name' => 'is_default',
                    'type' => CRM_Utils_Type::T_BOOLEAN,
                ) ,
                'is_active' => array(
                    'name' => 'is_active',
                    'type' => CRM_Utils_Type::T_BOOLEAN,
                ) ,
            );
        }
        return self::$_fields;
    }
    /**
     * returns the names of this table
     *
     * @access public
     * @static
     * @return string
     */
    static function getTableName()
    {
        return self::$_tableName;
    }
    /**
     * returns if this table needs to be logged
     *
     * @access public
     * @return boolean
     */
    function getLog()
    {
        return self::$_log;
    }
    /**
     * returns the list of fields that can be imported
     *
     * @access public
     * return array
     * @static
     */
    static function &import($prefix = false)
    {
        if (!(self::$_import)) {
            self::$_import = array();
            $fields = self::fields();
            foreach($fields as $name => $field) {
                if (CRM_Utils_Array::value('import', $field)) {
                    if ($prefix) {
                        self::$_import['sms_provider'] = & $fields[$name];
                    } else {
                        self::$_import[$name] = & $fields[$name];
                    }
                }
            }
        }
        return self::$_import;
    }
    /**
     * returns the list of fields that can be exported
     *
     * @access public
     * return array
     * @static
     */
    static function &export($prefix = false)
    {
        if (!(self::$_export)) {
            self::$_export = array();
            $fields = self::fields();
            foreach($fields as $name => $field) {
                if (CRM_Utils_Array::value('export', $field)) {
                    if ($prefix) {
                        self::$_export['sms_provider'] = & $fields[$name];
                    } else {
                        self::$_export[$name] = & $fields[$name];
                    }
                }
            }
        }
        return self::$_export;
    }
}
