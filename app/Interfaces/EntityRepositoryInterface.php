<?php

namespace App\Interfaces;


use App\Http\Requests\AbstractRequest;

interface EntityRepositoryInterface
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @param AbstractRequest $request
     * @return mixed
     */
    public function create(AbstractRequest $request);

    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id);

    /**
     * @param AbstractRequest $request
     * @param $id
     * @return mixed
     */
    public function update(AbstractRequest $request, int $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function destroy(int $id);

}
