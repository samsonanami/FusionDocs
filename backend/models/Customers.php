<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $ACCOUNT_NO
 * @property string $FIRST_NAME
 * @property string $LAST_NAME
 * @property string $GENDER
 * @property string $COUNTRY
 * @property string $TITLE
 * @property string $MOBILE
 * @property string $EMAIL
 * @property string $UNIQUE_NO
 * @property string $DOB
 * @property string $ADDRESS
 * @property string $CITY
 * @property string $PROVINCE_STATE
 * @property string $ZIPCODE
 * @property string $LANDINE_PHONE
 * @property string $BUSINESS_NAME
 * @property string $WORKING_STATUS
 * @property string $DESCRIPTION
 * @property string $STAFF_ACCESS
 * @property string $logo
 * @property string $files
 * @property string $cust_id_no
 * @property string $cust_kra_pin
 * @property int $cust_grp_id
 * @property string $image
 * @property string $cust_account_type
 * @property int $cust_active
 * @property string $cust_created_at
 * @property string $sourse_of_income
 * @property string $nxt_of_king_name
 * @property string $nxt_of_king_id
 * @property string $nxt_of_king_rel
 * @property string $nxt_of_king_phone
 * @property string $nxt_of_king_email
 * @property string $emp_name
 * @property string $emp_designation
 * @property string $emp_department
 * @property string $emp_occupation
 * @property string $emp_email
 * @property string $emp_address
 * @property string $emp_income
 * @property string $emp_director_name
 * @property string $emp_mobile_no
 * @property string $emp_office_no
 * @property string $referee_name
 * @property string $referee_phone
 */
class Customers extends \yii\db\ActiveRecord
{
     public $file;
    public $attachment;
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FIRST_NAME', 'LAST_NAME', 'cust_id_no', 'cust_account_type', 'cust_kra_pin'], 'required'],
            [['GENDER', 'WORKING_STATUS', 'cust_account_type'], 'string'],
            [['DOB', 'cust_created_at'], 'safe'],
            [['cust_grp_id', 'cust_active'], 'integer'],
            [['FIRST_NAME', 'LAST_NAME', 'ZIPCODE'], 'string', 'max' => 10],
            [['image'], 'string', 'max' => 300],
            [['COUNTRY', 'MOBILE', 'UNIQUE_NO', 'CITY', 'PROVINCE_STATE', 'LANDINE_PHONE', 'STAFF_ACCESS', 'cust_id_no', 'cust_kra_pin'], 'string', 'max' => 20],
            [['TITLE'], 'string', 'max' => 5],
            [['EMAIL', 'BUSINESS_NAME', 'DESCRIPTION'], 'string', 'max' => 60],
            [['ADDRESS'], 'string', 'max' => 30],
            [['logo', 'files'], 'string', 'max' => 200],
            [['sourse_of_income', 'nxt_of_king_name', 'nxt_of_king_id', 'nxt_of_king_rel', 'nxt_of_king_phone', 'nxt_of_king_email', 'emp_name', 'emp_designation', 'emp_department', 'emp_occupation', 'emp_email', 'emp_address', 'emp_income', 'emp_director_name', 'emp_mobile_no', 'emp_office_no', 'referee_name', 'referee_phone'], 'string', 'max' => 45],
            [['cust_id_no'], 'unique'],
            [['cust_kra_pin'], 'unique'],
            [['UNIQUE_NO'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ACCOUNT_NO' => 'A C C O U N T N O',
            'FIRST_NAME' => 'F I R S T N A M E',
            'LAST_NAME' => 'L A S T N A M E',
            'GENDER' => 'G E N D E R',
            'COUNTRY' => 'C O U N T R Y',
            'TITLE' => 'T I T L E',
            'MOBILE' => 'M O B I L E',
            'EMAIL' => 'E M A I L',
            'UNIQUE_NO' => 'U N I Q U E N O',
            'DOB' => 'D O B',
            'ADDRESS' => 'A D D R E S S',
            'CITY' => 'C I T Y',
            'PROVINCE_STATE' => 'P R O V I N C E S T A T E',
            'ZIPCODE' => 'Z I P C O D E',
            'LANDINE_PHONE' => 'L A N D I N E P H O N E',
            'BUSINESS_NAME' => 'B U S I N E S S N A M E',
            'WORKING_STATUS' => 'W O R K I N G S T A T U S',
            'DESCRIPTION' => 'D E S C R I P T I O N',
            'STAFF_ACCESS' => 'S T A F F A C C E S S',
            'logo' => 'Logo',
            'files' => 'Files',
            'cust_id_no' => 'Cust Id No',
            'cust_kra_pin' => 'Cust Kra Pin',
            'cust_grp_id' => 'Cust Grp ID',
            'image' => 'Image',
            'cust_account_type' => 'Cust Account Type',
            'cust_active' => 'Cust Active',
            'cust_created_at' => 'Cust Created At',
            'sourse_of_income' => 'Sourse Of Income',
            'nxt_of_king_name' => 'Nxt Of King Name',
            'nxt_of_king_id' => 'Nxt Of King ID',
            'nxt_of_king_rel' => 'Nxt Of King Rel',
            'nxt_of_king_phone' => 'Nxt Of King Phone',
            'nxt_of_king_email' => 'Nxt Of King Email',
            'emp_name' => 'Emp Name',
            'emp_designation' => 'Emp Designation',
            'emp_department' => 'Emp Department',
            'emp_occupation' => 'Emp Occupation',
            'emp_email' => 'Emp Email',
            'emp_address' => 'Emp Address',
            'emp_income' => 'Emp Income',
            'emp_director_name' => 'Emp Director Name',
            'emp_mobile_no' => 'Emp Mobile No',
            'emp_office_no' => 'Emp Office No',
            'referee_name' => 'Referee Name',
            'referee_phone' => 'Referee Phone',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustGrp()
    {
        return $this->hasOne(Groups::className(), ['grp_id' => 'cust_grp_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Groups::className(), ['grp_leader_id' => 'ACCOUNT_NO']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoans()
    {
        return $this->hasMany(Loans::className(), ['ln_customer_id' => 'ACCOUNT_NO']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSavings()
    {
        return $this->hasMany(Savings::className(), ['svg_account_number' => 'ACCOUNT_NO']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transactions::className(), ['tran_account_id' => 'ACCOUNT_NO']);
    }
}
