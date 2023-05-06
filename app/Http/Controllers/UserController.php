<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use App\User;
use App\Role;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use URL;
use UxWeb\SweetAlert\SweetAlert;
use PragmaRX\Countries\Package\Countries;
use App\Appointment;

class UserController extends Controller
{
    protected $user;
    protected $role;
    protected $countries;
    protected $activity;

    public function __construct(User $user, Role $role, Countries $country, Activity $activity, Appointment $appointment)
    {
        if (setting('email_verification')) {
            $this->middleware(['verified']);
        }

        $this->middleware(['auth','web','permission:manage-user','2fa']);
        $this->user = $user;
        $this->role = $role;
        $this->countries = $country->all()->sortBy('name.common')->pluck('name.common');
        $this->activity = $activity;
        $this->appointment = $appointment;
    }

    /**
     * View all users
     * @return Model User model
     */
    public function index()
    {
        $users = $this->fetchUsers(15, request()->input('search'));

        return view("users.admin.index", ['users'=>$users]);
    }

    /**
     * Create user form
     * @return string
     */
    public function create()
    {
        $roles = $this->role->all();
        $counties = $this->countries;
        return view("users.admin.create", [
              'roles' => $roles,
              'countries' => $counties,
            ]);
    }

    /**
     * Save user details
     * @param  Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $result = $this->user->query()->where('email', $request->email)->where('firstname', $request->firstname)->where('lastname', $request->lastname)->get();
        if(count($result) > 0)
        {
            return redirect()->back()->with('success', 'The same user already exist.');
        }
        $this->validate($request, [
                'firstname' => 'required|max:255|regex:(^([a-zA-Z_ ]+)([a-zA-Z]+)([a-zA-Z]+))',
                'lastname' => 'required|max:255|regex:(^([a-zA-Z_ ]+)([a-zA-Z]+)([a-zA-Z]+))',
                'email' => 'required|string|email|max:255',
                // 'confirm_email' => 'required|string|min:8|same:email',
                'username' => 'required|string|max:50|unique:users|regex:([a-zA-Z0-9_@]+)|',
                'password' => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required|string|min:8|same:password',
            ]);

        $user = $this->user->create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'username' => $request->username,
                'password'=> bcrypt($request->password),

                'address'=> $request->address,
                'zipcode'=> $request->zipcode,
                'gender' =>$request->gender,
                'pass_country' =>$request->pass_country,
                'birth_date' =>$request->birth_date,
                'pass_number' =>$request->pass_number,
                'phone' =>$request->phone,
                'ethnicity' =>$request->ethnicity,
                'avatar' => URL::to('/')."/public/uploads/avatar/avatar.png",
            ]);

        if ($user) {
            $user->assignRole($request->role);
            // Logging activity for created role
            activity()->performedOn($user)->withProperties(['name'=>($request->username)?$request->username:$request->email,'by'=>Auth::user()->username])->causedBy(Auth::user())->log('User was created');
            return redirect()->back()->with('success', 'User Created Successfully');
        } else {
            return redirect()->back()->with('error', 'An error occured check form!');
        }
    }

    /**
     * Edit user
     * @param  string $id User id
     * @return string
     */
    public function edit($id)
    {
        // var_dump($_GET['redirect']);
        // exit(0);

        $user = $this->user->find($id);
        $roles = $this->role->all();
        $user_role = $user->roles->first();
        $activities = $this->activity->whereCauserId($id)->orderByDesc('created_at')->take(10)->get();
        return view('users.admin.edit', [
              'user' => $user,
              'roles' => $roles,
              'user_role' => $user_role,
              'countries' => $this->countries,
              'activities' => $activities,
              'redirect' => isset($_GET['redirect']) ? $_GET['redirect'] : '',
            ]);
    }

    /**
     * Update user's details
     * @param  Request $request
     * @param  string  $id      User id
     * @return string
     */
    public function update(Request $request, $id)
    {
        // var_dump($request->redirect);
        // exit(0);
        $user = $this->user->find($id);
        $this->validate($request, [
                  'firstname' => 'nullable|max:255|regex:/^[A-Za-z0-9_.,() ]+$/',
                  'lastname' => 'nullable|max:255|regex:/^[A-Za-z0-9_.,() ]+$/',
                  
                  'role' => 'required|string',
                  'status' => 'required|string',

                  'email' => 'required|string|email|max:255,email,'.$user->id,
                  'confirm_email' => 'required|string|same:email',
                  'username' => 'required|string|max:50|regex:([a-zA-Z0-9_@]+)|unique:users,username,'.$user->id,
                  'password' => 'nullable|min:8|string|confirmed',
                  'password_confirmation' => 'nullable|same:password',
              ]);

        // Logging activity for created role
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->address = $request->address;
        $user->zipcode = $request->zipcode;
        $user->gender = $request->gender;
        $user->pass_country = $request->pass_country;
        $user->birth_date = $request->birth_date;
        $user->pass_number = $request->pass_number;
        $user->phone = $request->phone;
        $user->ethnicity = $request->ethnicity;
        $user->status= $request->status;

        $user->email = $request->email;
        $user->username = $request->username;
        if (!is_null($request->password)) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        // Re-assigining role
        $this->reassignRole($id, $request->role);


        activity()->performedOn($user)->withProperties(['name'=>$user->username,'by'=>Auth::user()->username])->causedBy(Auth::user())->log('User information was updated');

        $role = Auth::user()->roles->first()->name;

        if($request->redirect != 'appointment')
            return redirect()->back()->with('success', 'User Updated Successfully');
        else
            return redirect()->route('appointment.index')->with('success', 'User Info Updated Successfully');
// ------------------------------------------------------

    }

    /**
     * Delete user
     * @param  string $id user id
     * @return string     [description]
     */
    public function destroy($id)
    {
        $this->user = $this->user->find($id);

        if ($this->isAdmin($this->user->username)) {
            alert()->error('Admin User cannot be deleted')->persistent('Close');
            return redirect()->back();
        }

        $user_id = $this->user->id;
        $result = $this->appointment->where('user_id', $user_id)->get();
        
        if(count($result) != 0)
             return redirect()->back()->with('failed', "The user can't be removed because there is appointment assigned by this user.");

        // Logging Activity for created user
        // activity()->performedOn($this->user)->withProperties(['name'=>$this->user->username,'by'=>Auth::user()->username])->causedBy(Auth::user())->log('User was deleted');
        $this->user->delete();
        return redirect()->back()->with('success', 'User account deleted');
    }

    private function fetchUsers($pagination, $search = null)
    {
        $query = $this->user->query();

        if ($search) {
            $query->where(function ($value) use ($search) {
                $value->where('firstname', 'like', "%{$search}%");
                $value->orWhere('lastname', 'like', "%{$search}%");
                $value->orWhere('username', 'like', "%{$search}%");
                $value->orWhere('email', 'like', "%{$search}%");
            });
        }

        $query_output = $query->orderByDesc('id')->paginate($pagination);

        if ($search) {
            $query_output->appends(['search' => $search]);
        }

        return $query_output;
    }

    /**
     * Check for user type if admin or not
     * @param  string $username User username
     * @return boolean           true|false
     */
    public function isAdmin($username)
    {
        if ($username == 'admin' || $username == 'Admin') {
            return true;
        }
        return false;
    }


    /**
     * Function remove old role and assign new role to user
     * @param  string $id       user id
     * @param  string $new_role new role to be assigned
     * @return boolean           true|false
     */
    private function reassignRole($id, $new_role)
    {
        $user = $this->user->find($id);
        // Get user's previous role
        $role = $user->roles->first();

        // Remove role previously assigned to user if exist
        if ($role) {
            $user->removeRole($role->name);
        }
        // Assign new role to user
        $state = $user->assignRole($new_role);

        if ($state) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * Updating login details
     * @param  Request $request
     * @param  string  $id      user id
     * @return string
     */
    public function userLogin(Request $request, $id)
    {
        // $user = $this->user->find($id);

        // $this->validate($request, [
        //           'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        //           'username' => 'required|string|max:50|regex:([a-zA-Z0-9_@]+)|unique:users,username,'.$user->id,
        //           'password' => 'nullable|min:8|string|confirmed',
        //           'password_confirmation' => 'nullable|same:password',
        //       ]);

        // // Logging activity for created role
        // activity()->performedOn($user)->withProperties(['name'=>$user->username,'by'=>Auth::user()->username])->causedBy(Auth::user())->log('User login details updated');
        // $user->email = $request->email;
        // $user->username = $request->username;
        // if (!is_null($request->password)) {
        //     $user->password = bcrypt($request->password);
        // }

        // $user->save();
        // return redirect()->back()->with('success', 'User Updated Successfully');
    }

    public function userActivityLog($id)
    {
        $user = $this->user->find($id);
        $activities = $this->activity->whereCauserId($id)->orderByDesc('created_at')->get();
        return view('users.admin.userLog', [
            'user' => $user,
            'activities' => $activities,
          ]);
    }

    public function getCustomerInfo(Request $request)
    {
        $customer_id = $request->customer_id;
        $user = $this->user->find($customer_id);
        return json_encode($user);
    }
}
