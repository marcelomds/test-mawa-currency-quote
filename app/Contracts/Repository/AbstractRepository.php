<?php


namespace App\Contracts\Repository;


abstract class AbstractRepository
{
    protected $model;

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model): void
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->getModel()::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(7);
    }

    /**
     * @param array $request
     * @return mixed
     */
    public function store(array $request)
    {
        return $this->getModel()::create($request);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
      return $this->getModel()::find($id);
    }

}
