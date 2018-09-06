<?php

namespace App\Policies;

use App\User;
use App\Http\Models\Sales\Sale;
use Illuminate\Auth\Access\HandlesAuthorization;

class SalePolicy extends  Policy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the role.
     *
     * @return mixed
     */
    public function list()
    {

        return $this->policyCheck('sale.list');
    }

    /**
     * Determine whether the user can view the sale.
     *
     * @param  \App\User  $user
     * @param  \App\=Http\Models\Sales\Sale  $sale
     * @return mixed
     */
    public function view(User $user, Sale $sale)
    {
        return $this->policyCheck('view.list');
    }

    /**
     * Determine whether the user can create sales.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->policyCheck('sale.create');
    }

    /**
     * Determine whether the user can update the sale.
     *
     * @param  \App\User  $user
     * @param  \App\=Http\Models\Sales\Sale  $sale
     * @return mixed
     */
    public function update(User $user, Sale $sale)
    {
        return $this->policyCheck('sale.update');
    }

    /**
     * Determine whether the user can delete the sale.
     *
     * @param  \App\User  $user
     * @param  \App\=Http\Models\Sales\Sale  $sale
     * @return mixed
     */
    public function delete(User $user, Sale $sale)
    {
        return $this->policyCheck('sale.delete');
    }
}
