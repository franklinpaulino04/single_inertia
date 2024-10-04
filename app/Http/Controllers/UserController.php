<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserValidation;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class UserController extends AppBaseController
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        if($request->input('json'))
        {
            $users = UserResource::collection($this->userRepository->getAll());
            return $this->sendSuccess( 'Users retrieved successfully.', ['users' => $users]);
        }

        return Inertia::render('Users/Index');
    }

    public function create()
    {
        //
    }

    public function store(UserValidation $request)
    {
        DB::BeginTransaction();
        try {
            $user = $this->userRepository->create($request->all());
            DB::commit();
            return $this->sendSuccess('User saved successfully.', ['user' => new UserResource($user)]);
        }catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError('Error saving user.');
        }
    }

    public function show(User $user)
    {
        return $this->sendSuccess('User retrieved successfully.', ['user' => new UserResource($user)]);
    }

    public function edit(User $user)
    {
        return $this->sendSuccess('User retrieved successfully.', ['user' => new UserResource($user)]);
    }

    public function update(UserValidation $request, User $user)
    {
        DB::BeginTransaction();
        try {
            $user = $this->userRepository->update($request->all(), $user->id);
            DB::commit();
            return $this->sendSuccess('User updated successfully.', ['user' => new UserResource($user)]);
        }catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError('Error updating user.');
        }
    }

    public function destroy(User $user)
    {
        DB::BeginTransaction();
        try {
            $this->userRepository->delete($user->id);
            DB::commit();
            return $this->sendSuccess('User deleted successfully.');
        }catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError('Error deleting user.');
        }
    }
}
