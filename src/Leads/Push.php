<?php
namespace Leads\Leads;

use Leads\abstractObject;

/**
 * Class Push
 * @package Leads\Leads
 *
 * @property integer platform_id ID площадки вебмастера
 * @property integer offer_id ID оффера
 * @property string lead_time Y-m-d Время когда заявка была заполнена потенциальным клиентом
 * @property string source maxlength = 255 Источник вебмастера
 * @property string aff_sub1 maxlength = 255 дополнительный параметр вебмастера
 * @property string aff_sub2 maxlength = 255
 * @property string aff_sub3 maxlength = 255
 * @property string aff_sub4 maxlength = 255
 * @property string aff_sub5 maxlength = 255
 * @property string firstname maxlength = 128
 * @property string lastname maxlength = 128
 * @property string middlename maxlength = 128
 * @property string birthdate Y-m-d
 * @property string birthplace
 * @property string occupation (worker|contract worker|entrepreneur|pensioner|student|unemployed)
 * @property string citizenship length = 2 (RU)
 * @property integer reg_permanent (0 - нет регистрации 1 - постоянная регистрация 2 - временная регистрация)
 * @property string gender (0|female - женский; 1|male - мужской)
 * @property string email maxlength = 128
 * @property string mphone maxlength = 32 only digits
 * @property string mphone_2 maxlength = 32 Мобильный телефон дополнительного контактного лица
 * @property string phone maxlength = 32 Городской телефон
 * @property string phone_2 maxlength = 32 Городской телефон поручителя
 * @property string inn maxlength = 64
 * @property string snils (123-456-789-01)
 * @property string reg_zip maxlength = 16
 * @property string reg_country_name
 * @property string reg_region_name по БД http://fias.nalog.ru/
 * @property string reg_city_name по БД http://fias.nalog.ru/
 * @property string reg_street
 * @property string reg_house
 * @property string reg_housing
 * @property string reg_flat
 * @property string reg_address maxlength = 2048 Если невозможно разбить адрес на части (reg_street, reg_house, reg_housing, reg_flat)
 * @property string reg_date Y-m-d
 * @property string fact_zip maxlength = 16
 * @property string fact_country_name
 * @property string fact_region_name
 * @property string fact_city_name
 * @property string fact_street
 * @property string fact_house
 * @property string fact_housing
 * @property string fact_flat
 * @property string fact_address maxlength = 2048 Если невозможно разбить адрес на части (fact_street, fact_house, fact_housing, fact_flat)
 * @property string work_organization
 * @property string work_occupation
 * @property string work_phone
 * @property string work_street
 * @property string work_house
 * @property string work_address maxlength = 2048 Если невозможно разбить адрес на части (work_street, work_house)
 * @property string work_zip maxlength = 16
 * @property string work_region_name
 * @property string work_city_name
 * @property string work_date Y-m-d
 * @property string work_salary
 * @property string work_experience общий стаж работы (месяцев)
 * @property string passport_title код подразделения, кем выдан. Например: "123-001 Пролетарским РОВД"
 * @property string passport_date Y-m-d
 * @property string passport_code maxlength = 16 серия + номер паспорта
 * @property integer credit_sum
 * @property integer credit_days
 * @property string debpt_sum Сумма задолженности по кредиту
 * @property string debpt_date Y-m-d Дата первой просрочки по выплате кредита
 * @property string overdue_loans (never|credit_closed_no_delay|credit_open_no_delay|credit_closed_had_delay|had_delay|has_delay) Кредитная история
 * @property integer office_id
 * @property string contact_person_name maxlength = 128 ФИО дополнительного контактного лица
 * @property string contact_person_relation (friend|relative|colleague|other) Кем приходится поручитель
 * @property string married (0|1)
 * @property integer minors Количество несовершеннолетних детей
 * @property integer maternal_capital (0|1) Наличие материнского капитала
 * @property string obligatory_payments Обязательные ежемесячные платежи
 * @property string realty_type (flat|flat_area|town_house|house|apartments|area|share|room|garage|car_place) Цель кредитования
 * @property string realty_cost Стоимость недвижимости
 * @property string own_funds Собственные средства
 * @property string additional_info maxlength = 2048 Дополнительная информация
 * @property string test_mode (0|1) Тестовая анкета
 *
 */
class Push extends abstractObject
{
    public function __construct($token)
    {
        $this->properties = [
            'platform_id', 'offer_id', 'lead_time', 'source', 'aff_sub1', 'aff_sub2',
            'aff_sub3', 'aff_sub4', 'aff_sub5', 'firstname', 'lastname', 'middlename',
            'birthdate', 'birthplace', 'occupation', 'citizenship', 'reg_permanent',
            'gender', 'email', 'mphone', 'mphone_2', 'phone', 'phone_2', 'inn',
            'snils', 'reg_zip', 'reg_country_name', 'reg_region_name', 'reg_city_name',
            'reg_street', 'reg_house', 'reg_housing', 'reg_flat', 'reg_address',
            'reg_date', 'fact_zip', 'fact_country_name', 'fact_region_name',
            'fact_city_name', 'fact_street', 'fact_house', 'fact_housing', 'fact_flat',
            'fact_address', 'work_organization', 'work_occupation', 'work_phone',
            'work_street', 'work_house', 'work_address', 'work_zip', 'work_region_name',
            'work_city_name', 'work_date', 'work_salary', 'work_experience',
            'passport_title', 'passport_date', 'passport_code', 'credit_sum',
            'credit_days', 'debpt_sum', 'debpt_date', 'overdue_loans', 'office_id',
            'contact_person_name', 'contact_person_relation', 'married', 'minors',
            'maternal_capital', 'obligatory_payments', 'realty_type', 'realty_cost',
            'own_funds', 'additional_info', 'test_mode',
        ];
        parent::__construct($token, 'leads/push');
    }

    public function setTest()
    {
        $this->test_mode = 1;
    }

    public function resetTest()
    {
        $this->test_mode = 0;
    }

    public function isTest()
    {
        return $this->test_mode;
    }

    public function get($type = 'json')
    {
        $this->setResponseType($type);
        return parent::get();
    }

    public function post($type = 'json')
    {
        $this->setResponseType($type);
        return parent::post();
    }
}

