<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'customer_management_access',
            ],
            [
                'id'    => '18',
                'title' => 'customer_create',
            ],
            [
                'id'    => '19',
                'title' => 'customer_edit',
            ],
            [
                'id'    => '20',
                'title' => 'customer_show',
            ],
            [
                'id'    => '21',
                'title' => 'customer_delete',
            ],
            [
                'id'    => '22',
                'title' => 'customer_access',
            ],
            [
                'id'    => '23',
                'title' => 'audit_log_show',
            ],
            [
                'id'    => '24',
                'title' => 'audit_log_access',
            ],
            [
                'id'    => '25',
                'title' => 'customer_document_create',
            ],
            [
                'id'    => '26',
                'title' => 'customer_document_edit',
            ],
            [
                'id'    => '27',
                'title' => 'customer_document_show',
            ],
            [
                'id'    => '28',
                'title' => 'customer_document_delete',
            ],
            [
                'id'    => '29',
                'title' => 'customer_document_access',
            ],
            [
                'id'    => '30',
                'title' => 'customer_note_create',
            ],
            [
                'id'    => '31',
                'title' => 'customer_note_edit',
            ],
            [
                'id'    => '32',
                'title' => 'customer_note_show',
            ],
            [
                'id'    => '33',
                'title' => 'customer_note_delete',
            ],
            [
                'id'    => '34',
                'title' => 'customer_note_access',
            ],
            [
                'id'    => '35',
                'title' => 'loan_management_access',
            ],
            [
                'id'    => '36',
                'title' => 'loan_create',
            ],
            [
                'id'    => '37',
                'title' => 'loan_edit',
            ],
            [
                'id'    => '38',
                'title' => 'loan_show',
            ],
            [
                'id'    => '39',
                'title' => 'loan_delete',
            ],
            [
                'id'    => '40',
                'title' => 'loan_access',
            ],
            [
                'id'    => '41',
                'title' => 'loan_amount_create',
            ],
            [
                'id'    => '42',
                'title' => 'loan_amount_edit',
            ],
            [
                'id'    => '43',
                'title' => 'loan_amount_show',
            ],
            [
                'id'    => '44',
                'title' => 'loan_amount_delete',
            ],
            [
                'id'    => '45',
                'title' => 'loan_amount_access',
            ],
            [
                'id'    => '46',
                'title' => 'payment_create',
            ],
            [
                'id'    => '47',
                'title' => 'payment_edit',
            ],
            [
                'id'    => '48',
                'title' => 'payment_show',
            ],
            [
                'id'    => '49',
                'title' => 'payment_delete',
            ],
            [
                'id'    => '50',
                'title' => 'payment_access',
            ],
            [
                'id'    => '51',
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => '52',
                'title' => 'user_alert_create',
            ],
            [
                'id'    => '53',
                'title' => 'user_alert_show',
            ],
            [
                'id'    => '54',
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => '55',
                'title' => 'user_alert_access',
            ],
        ];

        Permission::insert($permissions);
    }
}