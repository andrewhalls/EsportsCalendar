<?php namespace Authority\Service\Form\Group;

use Authority\Repo\Group\GroupInterface;
use Authority\Service\Validation\ValidableInterface;

class GroupForm
{
    /**
     * Form Data
     *
     * @var array
     */
    protected $data;

    /**
     * Validator
     *
     * @var \Authority\Service\Form\ValidableInterface
     */
    protected $validator;

    /**
     * Group Repository
     *
     * @var \Authority\Repo\Group\GroupInterface
     */
    protected $group;

    public function __construct(ValidableInterface $validator, GroupInterface $group)
    {
        $this->validator = $validator;
        $this->group = $group;
    }

    /**
     * Create a new group
     *
     * @param array $input
     * @return \Authority\Repo\Group\Response|bool
     */
    public function save(array $input)
    {
        if (! $this->valid($input)) {
            return false;
        }

        return $this->group->store($input);
    }

    /**
     * Update new group
     *
     * @param int|array $input
     * @return \Authority\Repo\Group\Response|bool
     */
    public function update(array $input)
    {
        if (!$this->valid($input)) {
            return false;
        }

        return $this->group->update($input);
    }

    /**
     * Return any validation errors
     *
     * @return array
     */
    public function errors()
    {
        return $this->validator->errors();
    }

    /**
     * Test if form validator passes
     *
     * @param array $input
     * @return mixed
     */
    protected function valid(array $input)
    {
        return $this->validator->with($input)->passes();
    }
}
