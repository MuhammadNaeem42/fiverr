<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:read_admins|create_admins|update_admins|delete_admins', ['only' => ['index']]);
        $this->middleware('permission:create_admins', ['only' => ['create', 'store']]);
        $this->middleware('permission:update_admins', ['only' => ['edit', 'update', 'updateStatus']]);
        $this->middleware('permission:delete_admins', ['only' => ['delete']]);
    }


    /**
     * List User
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function index(UserDataTable $userDataTable)
    {

        return $userDataTable->render('admin.users.index');

    }

    /**
     * Create User
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function create()
    {
        $mapPermission = collect(getPermissionsMap());
        $modules = getAllMolesWithPermissions();
        $user_permissions = [];

        return view('admin.users.create', compact('user_permissions', 'mapPermission', 'modules'));
    }

    /**
     * Store User
     * @param Request $request
     * @return View Users
     * @author Shani Singh
     */
    public function store(CreateUserRequest $request)
    {
        DB::beginTransaction();
        try {
            $request_data = $request->except('photo', 'password');

            if ($request->has('photo'))
                $request_data['photo'] = uploadImage('users', $request->photo);

            if ($request->has('password') && $request->password != null)
                $request_data['password'] = bcrypt($request->password);

            // Store Data
            $user = User::create($request_data);
            $user->syncPermissions($request->permissions);
            DB::commit();
            session()->flash('success', __('lang.added_successfully'));
            return redirect()->route('admin.users.index');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }

    }

    /**
     * Update Status Of User
     * @param Integer $status
     * @return List Page With Success
     * @author Shani Singh
     */
    public function updateStatus($user_id, $status)
    {
        // Validation
        $validate = Validator::make([
            'user_id' => $user_id,
            'status' => $status
        ], [
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:0,1',
        ]);

        // If Validations Fails
        if ($validate->fails()) {
            return redirect()->route('admin.users.index')->with('error', $validate->errors()->first());
        }

        try {
            DB::beginTransaction();

            // Update Status
            User::whereId($user_id)->update(['is_active' => $status]);

            // Commit And Redirect on index with Success Message
            DB::commit();
            return redirect()->route('admin.users.index')->with('success', trans('lang.updated_successfully'));
        } catch (\Throwable $th) {

            // Rollback & Return Error Message
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Edit User
     * @param Integer $user
     * @return Collection $user
     * @author Shani Singh
     */
    public function edit($id)
    {

        /** @var User $user */
        $user = User::doesntHave('roles')->find($id);


        if (empty($user)) {
            session()->flash('error', __('lang.not_found'));
            return redirect(route('admin.users.index'));
        }
        $mapPermission = collect(getPermissionsMap());
        $modules = getAllMolesWithPermissions();
        $user_permissions = $user->permissions->pluck('name')->toArray();
        return view('admin.users.edit', compact('user', 'user_permissions', 'modules', 'mapPermission'));
    }

    /**
     * Update User
     * @param UpdateUserRequest $request , User $user
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @author Shani Singh
     */
    public function update($id, UpdateUserRequest $request)
    {
        DB::beginTransaction();
        try {

            /** @var User $user */
            $user = User::doesntHave('roles')->find($id);

            if (empty($user)) {
                session()->flash('error', __('lang.not_found'));
                return redirect(route('admin.users.index'));
            }

            $request_data = $request->except('photo', 'password');

            if ($request->has('photo'))
                $request_data['photo'] = uploadImage('users', $request->photo);

            if ($request->has('password') && $request->password != null)
                $request_data['password'] = bcrypt($request->password);

            $user->fill($request_data);
            $user->save();
            $user->syncPermissions($request->permissions);
            DB::commit();
            session()->flash('success', __('lang.updated_successfully'));

            return redirect(route('admin.users.index'));
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Delete User
     * @param User $user
     * @return Index Users
     * @author Shani Singh
     */
    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            // Delete User
            User::whereId($user->id)->delete();

            DB::commit();
            session()->flash('success', __('lang.deleted_successfully'));
            return redirect()->route('admin.users.index');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }


    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

}
