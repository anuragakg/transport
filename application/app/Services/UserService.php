<?php

namespace App\Services;

use App\Services\Service;
use Illuminate\Support\Facades\Auth;
use App\Queries\UserQuery;

use Illuminate\Support\Facades\Mail;

use App\Models\User as ServiceModel;
use App\Models\UsersMapping;
use App\Models\UserRole;
use App\Models\UserDetail;
use App\Models\UserBankDetail;
use App\Models\EmailTemplate;
use App\Models\UsersActivity;
use App\Models\UsersAllowedStates;
use App\Models\UserPermissionMapping;
use App\Models\UserHaatBazaarMapping;
use App\Models\Masters\HaatDetailsMaster;
use App\Models\Masters\PermissionMapping as PermissionMappingModel;
use App\Models\UserWarehouseMapping;
use App\Rules\ValidIdProof;
use App\Rules\ValidName;
use App\Rules\ValidUsername;
use App\Rules\ValidNameWithDot;
use App\Rules\UniqueUserRoleLevel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Notifications\Email\UserCreation;
use DB;
class UserService extends Service
{
    private $userQuery;

    public function __construct(UserQuery $userQuery = null) {
        $this->userQuery = $userQuery;
        
    }
    /**
     * Get all items from database
     *
     * @return mixed
     */
    public function getAll($request)
    {
        $columns = array( 
                    0 =>'id', 
                    1=> 'user_name',
                    2=> 'name',
                    3=> 'email',
                    4=> 'mobile_no',
            );
        $limit = $request['length'];
        

        $order = $columns[$request['order'][0]['column']];
        $dir = $request['order'][0]['dir'];
        
        
        $where=array();
        $query= ServiceModel::where($where);
        
        if(isset($request['search']['value']) && !empty($request['search']['value']))
        {
            $search = $request['search']['value'];         
            $query->where(DB::raw("CONCAT(`user_name`,`name`,IFNULL(`middle_name`,''),IFNULL(`last_name`,''),`email`,IFNULL(`mobile_no`,''))"), 'LIKE', "%".$search."%");
        }
        if(isset($columns[$request['order'][0]['column']]) && !empty($columns[$request['order'][0]['column']]))
        {
            $query->orderBy($order,$dir);
        }
        return $query->paginate($limit);
	}
    
    /**
     * Creates a new item in table
     *
     * @param Array $data
     * @return mixed
     */
    public function createItem($data)
    {
        $user = new ServiceModel();
        $user_detail =new UserDetail();
       
        //transaction begin
        \DB::beginTransaction();
        try {
            #save user
            $user->user_name = $data['user_name'];
            $user->name = $data['name'];
            $user->middle_name = isset($data['middle_name']) ? $data['middle_name'] : null;
            $user->last_name = $data['last_name'];
            $user->email = $data['email'];
            $user->mobile_no = isset($data['mobile']) ? $data['mobile'] : null;
            $user->role = $data['role'];
            $user->email_verify_token = $data['email']; // This should might change in future
            $user->created_by = $data['created_by'];
            $user->updated_by = $data['updated_by'];
            //$randomPassword='password';
            $randomPassword = \Illuminate\Support\Str::random(config('trifed.password_length')) ;
            $user->password = bcrypt(hash('sha256', $randomPassword));
            $user->save();

            #get userId
            $user_id = $user->id;

            /***** Now details should enter in user details table ******/
            #saving user details
            if (isset($data['dob'])) {
                $user_detail->dob = Carbon::createFromFormat('d/m/Y', $data['dob']);
            }
            
            
            \DB::commit();

            /**
             * Send Created notification
             */
            $user->notify(new UserCreation($user, $randomPassword));

            return $user;
        } catch (\Exception $e) {
            \DB::rollback();
            // something went wrong
            throw $e;
        }
    }

    /**
     * Get a single item from database
     *
     * @param number $id
     * @return mixed
     */
    public function getOne($id)
    {
        return ServiceModel::findOrFail($id);
    }

    /**
     * Update one item from database
     *
     * @param number $id
     * @param Array $data
     * @return mixed
     */
    public function updateItem($id, $data)
    {
        $user = ServiceModel::findOrFail($id);
        
        //transaction begin
        \DB::beginTransaction();
        try {
            #save user
            $user->user_name = $data['user_name'];
            $user->name = $data['name'];
            $user->middle_name = isset($data['middle_name']) ? $data['middle_name'] : null;
            $user->last_name = $data['last_name'];
            $user->email = $data['email'];
            $user->mobile_no = isset($data['mobile']) ? $data['mobile'] : null;
            // $user->role = $data['role'];
            $user->email_verify_token = $data['email']; // This should might change in future
            $user->updated_by = $data['updated_by'];
            $user->save();

            #get userId
            $user_id = $user->id;

            \DB::commit();
            return $user;
        } catch (\Exception $e) {
            \DB::rollback();
            // something went wrong
            throw $e;
        }
    }

    /**
     * Delete an item from database
     *
     * @param integer $id
     * @return boolean
     */
    public function deleteItem($id)
    {
        $item = ServiceModel::findOrFail($id);
        return $item->delete();
    }


    /**
     * Checks for the user exists or not.
     *
     * @param integer $id
     * @param integer $role
     * @return integer
     */
    public function switchStatus($id)
    {
        $user = ServiceModel::findOrFail($id);
        $user->switchStatus();
        $user->save();
        return $user->status;
    }

    public function SearchSurveyor($filter)
    {   
        if(!empty($filter['keyword'])){
            $name=$filter['keyword'];
        }
        else
        {
            $name='';
        }         
        return ServiceModel::where('name','LIKE','%'.$name.'%')->whereIn('role',[11,8])->groupby('name')->distinct()->limit(50)->get();
    }

    /**
     * Validates for creating a record.
     *
     * @param Array $data
     * @return mixed
     */
    public function validateCreate($data)
    {
        $model = new ServiceModel();

        
        
        return Validator::make(
            $data,
            [
                
                'role' => 'required|not_in:0|exists:user_roles,id',
                'user_name' => ['required', 'max:150', new ValidUsername, Rule::unique('users', 'user_name')],
                'name' => ['required', new ValidNameWithDot, 'max:250'],
                'middle_name' => ['nullable', 'alpha_spaces', 'max:250'],
                'last_name' => ['nullable', 'alpha_spaces', 'max:250'],
                'email' => 'required|max:191|unique:users|email:rfc,dns',
                'mobile' => 'required|digits_between:10,11',
                
            ],
            
        );
    }

    /**
     * Validates for updating a record in databse
     *
     * @param integer $id
     * @param Array $data
     * @return mixed
     */
    public function validateUpdate($id, $data)
    {
       // dd($data);
        $model = new ServiceModel();
        $user=ServiceModel::findOrFail($id);
        return Validator::make(
            $data,
            [
                'user_name' => ['required', 'max:150', new ValidUsername, Rule::unique($model->getTable())->ignore($id)],
                'name' => ['required', new ValidNameWithDot, 'max:250'],
                'middle_name' => ['nullable', 'alpha_spaces', 'max:250'],
                'last_name' => ['nullable', 'alpha_spaces', 'max:250'],
                'email' => ['required', 'email:rfc,dns' ,Rule::unique($model->getTable())->ignore($id)],
                'mobile' => 'required|digits_between:10,11',
                
            ],
            
        );
    }

    public function getUsersByEmail($emails)
    {
        $q = ServiceModel::whereIn("email", $emails)->get();
        return $q;
    }

    

    public function getAdminUser(){
        $q = ServiceModel::where('role',2)->get();
        return $q;
    }

    


    public function getUserByEmail($email)
    {
        return ServiceModel::where("email", $email)->first();
    }

    public function sendMail($user,$page){

        return Mail::send([], [], function ($message ) use ($user, $page) {

            $host_url   = env('APP_URL');
            $email_data = $this->emailTemplate();

            $message->to($user->email)->subject($email_data->subject)->setBody('<h1>Hi, welcome '.$user->name.'!</h1>'.$email_data->description.'</br><p>Please Click On below link For Password Generate</p>'.$host_url.'/TRIFED-FrontEnd/auth/'.$page.'?email_verify_token='.$user->email_verify_token , 'text/html');
        });
    }

    public function emailTemplate(){
        return EmailTemplate::all()->first();
    }

    public function sendForgotMail($user,$page){

        return Mail::send([], [], function ($message ) use ($user, $page) {
            $host_url   = env('APP_URL');
            $email_data = $this->emailTemplate();
            
            $message->to($user->email)->subject($email_data->subject)->setBody('<h1>Hi, welcome '.$user->email.'!</h1>'.$email_data->description.'</br><p>Please Click On below link For Change Password</p>'.$host_url.'/TRIFED-FrontEnd/auth/'.$page.'?token='.$user->token , 'text/html');
        });

    }

    public function getUserByMobile($mobile){
        return ServiceModel::where('mobile_no',$mobile)->first();
    }

    public function getUserActivityLog()
    {
        $where=array();
        $user = Auth::user();
        if($user->role != 1) 
        {
            $where['user_id']=$user->id;
        }
        $query= UsersActivity::leftJoin('users', function($join) {
                  $join->on('users_activity.user_id', '=', 'users.id');
                })
                ->where($where)
                ->orderBy('users_activity.id','DESC')
                ->select('users.user_name','users_activity.*')->paginate();
        return $query;    
    }

    public function getSndSio()
    {
        $where=array();
        $role_arr=array('4','7','8');
        $q = ServiceModel::whereIn("role", $role_arr)->where('users.status','1')->get();
        return $q;
    }

    public function getUserslistWiseState($filters)
    {   
        $where = array();        
        if (isset($filters['state_id'])) {
            $where['user_details.state'] = $filters['state_id'];
        }
        $query= ServiceModel::Join('user_details', function($join) {
                  $join->on('users.id', '=', 'user_details.user_id');
                })
                ->join('user_roles', function($join) {
                  $join->on('users.role', '=', 'user_roles.id');
                })
                ->leftJoin('department_master', function($join) {
                  $join->on('user_details.department', '=', 'department_master.id');
                })
                 ->leftJoin('designation_master', function($join) {
                  $join->on('user_details.designation', '=', 'designation_master.id');
                })
                 ->leftJoin('states_master', function($join) {
                  $join->on('user_details.state', '=', 'states_master.id');
                })
                ->where($where)
                ->select('users.name','department_master.title as department','states_master.title as state_name','user_roles.title')->get();
        return $query;
       
    }

    public function validateUserPermissionCreate($data)
    {
        return Validator::make($data, [
            'user_id' =>'required|exists:users,id',
            'permission_id.*' =>'nullable|distinct|exists:permissions,id'
        ],
            [
                'user_id.required' => 'user id not defined',

            ]);
    }
    public function addUserPermissions($data)
    {
        $authUser = Auth::user();
        $item = [];

        DB::beginTransaction();
        try {
             /*==========Add Permissiosn Details========*/
            $permission_data=array();
            UserPermissionMapping::where('user_id', $data['user_id'])->delete();
            if(isset($data['permission_id']) && !empty($data['permission_id']))
            {
                //Master Management
                if(in_array("2", $data['permission_id']) || in_array("3", $data['permission_id']))
                {
                    if(!in_array("1", $data['permission_id']))
                    {
                        $data['permission_id'][]="1";    
                    }
                }

                if(in_array("6", $data['permission_id']) || in_array("7", $data['permission_id']))
                {
                    if(!in_array("5", $data['permission_id']))
                    {
                        $data['permission_id'][]="5";    
                    }
                }
                if(in_array("10", $data['permission_id']) || in_array("11", $data['permission_id']))
                {
                    if(!in_array("9", $data['permission_id']))
                    {
                        $data['permission_id'][]="9";    
                    }
                }
                if(in_array("13", $data['permission_id']) || in_array("14", $data['permission_id']))
                {
                    if(!in_array("15", $data['permission_id']))
                    {
                        $data['permission_id'][]="15";    
                    }
                }
                if(in_array("19", $data['permission_id']) || in_array("20", $data['permission_id']))
                {
                    if(!in_array("18", $data['permission_id']))
                    {
                        $data['permission_id'][]="18";    
                    }
                }
                if(in_array("23", $data['permission_id']) || in_array("24", $data['permission_id']))
                {
                    if(!in_array("22", $data['permission_id']))
                    {
                        $data['permission_id'][]="22";    
                    }
                }
                if(in_array("26", $data['permission_id']))
                {
                    if(!in_array("27", $data['permission_id']))
                    {
                        $data['permission_id'][]="27";    
                    }
                }
                if(in_array("28", $data['permission_id']) || in_array("29", $data['permission_id']) || in_array("30", $data['permission_id']) || in_array("31", $data['permission_id'])|| in_array("32", $data['permission_id'])|| in_array("33", $data['permission_id'])|| in_array("34", $data['permission_id'])|| in_array("35", $data['permission_id']))
                {
                    if(!in_array("18", $data['permission_id']))
                    {
                        $data['permission_id'][]="18";    
                    }
                }
                 if(in_array("37", $data['permission_id']) || in_array("38", $data['permission_id']))
                {
                    if(!in_array("36", $data['permission_id']))
                    {
                        $data['permission_id'][]="36";    
                    }
                }
                foreach ($data['permission_id'] as $key => $permission_id) 
                {
                    $permission_data=array(
                        'user_id'=>$data['user_id'],
                        'permission_id'=>$permission_id,
                        'created_by'=>$authUser->id,
                    );
                    $permission =new UserPermissionMapping($permission_data);
                    $permission->save(); 
                }
            }
            $item = $this->getOne($data['user_id']);
            //===================================
            DB::commit();
            return $item;
        }catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function getUserPermissions($user_id)
    {
        return UserPermissionMapping::where('user_id',$user_id)->get();
    }

     public function getUserPermissionsRoleBasis($user_id)
    {   
         $user = ServiceModel::where('id',$user_id)->first();;
         $user_permission = UserPermissionMapping::where('user_id',$user_id)->get();
         $role_permission= PermissionMappingModel::where('role_id', $user['role'])->get();
         $user_permission_and_role_permission = array('user_permission' => $user_permission,'role_permission'=>$role_permission );
         return $user_permission_and_role_permission ;
    }
     public function getCurrentUserHaatInfo()
    {
        $user = Auth::user();
        $usersHaatIds= UserHaatBazaarMapping::where('user_id',$user->id)->pluck('haat_bazaar_id');
        
        return HaatDetailsMaster::whereIn('id',$usersHaatIds)->get();    
        
        

    }
}
