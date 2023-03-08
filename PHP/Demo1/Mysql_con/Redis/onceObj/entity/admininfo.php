<?php
class admininfo{
    public $id;
    public $adminName;
    public $adminPwd;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAdminName()
    {
        return $this->adminName;
    }

    /**
     * @param mixed $adminName
     */
    public function setAdminName($adminName)
    {
        $this->adminName = $adminName;
    }

    /**
     * @return mixed
     */
    public function getAdminPwd()
    {
        return $this->adminPwd;
    }

    /**
     * @param mixed $adminPwd
     */
    public function setAdminPwd($adminPwd)
    {
        $this->adminPwd = $adminPwd;
    }

}