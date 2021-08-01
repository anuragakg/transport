<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $crud = [
            'view', 'add', 'edit',
        ];

        $cruds = array_merge($crud, ['status']);

        $permissionsList = [
            'role' => array(
                'view'=>array(
                    'description' => 'View',
                ),
                'add'=>array(
                    'description' => 'add',
                ),
                'edit'=>array(
                    'description' => 'edit',
                ),
                'status'=>array(
                    'description' => 'status',
                ),
            ),
            
            'user_management' => array(
                'add'=>array(
                    'description' => 'add',
                ),
                'edit'=>array(
                    'description' => 'edit',
                ),
                'view'=>array(
                    'description' => 'User Listing View ',
                ),
                'status'=>array(
                    'description' => 'status',
                ),
                'set_user_wise_permission'=>array(
                    'description' => 'set user wise permission',
                ),
            ),
            
        ];

        // $this->dumpToJson($permissionsList);

        /** Clear the table */
        DB::table('permissions')->truncate();

        /** Seed the data */
        foreach ($permissionsList as $group => $permissions) {
            if (is_array($permissions)) {
                foreach ($permissions as $permission=>$per) {

                    DB::table('permissions')->insert([
                        'alias' => $group . '_' . $permission,
                        'name' => ucwords(str_replace('_', ' ', $permission)),
                        'description' => ucwords($per['description']),
                        'group' => $group,
                        'created_by' => 0,
                        'updated_by' => 0,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

         

    }

    /**
     * Dumps permission list to json.
     * @param mixed $permissionsList 
     * @return void 
     */
    private function dumpToJson($permissionsList)
    {
        $final = [];
        foreach ($permissionsList as $group => $permissions) {
            if (is_array($permissions)) {
                foreach ($permissions as $permission) {
                    $final[$group][] = $group . '_' . $permission;
                }
            }
        }
        echo json_encode($final);
        die;
    }
}
