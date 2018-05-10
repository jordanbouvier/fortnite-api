<?php
namespace FortniteApi\Model;

class User
{
    private $id;
    private $username;

    /**
     * @return string
     */
    public function getId():string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername():string
    {
      return $this->getUsername();
    }

    /**
     * @param string $username
     * @return $this
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
        return $this;
    }

}