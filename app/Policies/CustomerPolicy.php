<?php

namespace App\Policies;

use App\User;
use App\Http\Models\Sales\Customer;
use http\Env\Request;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy extends Policy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the role.
     *
     * @return mixed
     */
    public function list()
    {

        return $this->policyCheck('customer.list');
    }

    /**
     * Determine whether the user can view the customer.
     *
     * @param  \App\User  $user
     * @param  \App\Http\Models\Sales\Customer  $customer
     * @return mixed
     */
    public function view(Customer $customer)
    {
        return $this->policyCheck('customer.list');
    }

    /**
     * Determine whether the user can create customers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->policyCheck('customer.create');
    }

    /**
     * Determine whether the user can update the customer.
     *
     * @param  \App\User  $user
     * @param  \App\Http\Models\Sales\Customer  $customer
     * @return mixed
     */
    public function update(User $user, Customer $customer)
    {
        return $this->policyCheck('customer.edit');
    }

    /**
     * Determine whether the user can delete the customer.
     *
     * @param  \App\User  $user
     * @param  \App\Http\Models\Sales\Customer  $customer
     * @return mixed
     */
    public function delete(User $user, Customer $customer)
    {
        return $this->policyCheck('customer.delete', $user);
    }
}
