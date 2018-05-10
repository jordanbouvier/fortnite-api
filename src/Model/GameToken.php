<?php
namespace FortniteApi\Model;
class GameToken
{
    private $token;

    private $expireAt;

    private $refreshToken;

    private $refreshTokenExpireAt;

    private $tokenType;

    public function __construct()
    {
        $this->expireAt = new \DateTime();
        $this->refreshTokenExpireAt = new \DateTime();
    }

    /**
    * @return mixed
    */
    public function getToken()
    {
        return $this->token;
    }

    /**
    * @param mixed $token
    * @return GameToken
    */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
    * @return mixed
    */
    public function getExpireAt(): \DateTime
    {
        return $this->expireAt;
    }

    /**
    * @param mixed $expireAt
    * @return GameToken
    */
    public function setExpireAt(\DateTime $expireAt)
    {
        $this->expireAt = $expireAt;
        return $this;
    }

    /**
    * @return mixed
    */
    public function getRefreshToken():string
    {
        return $this->refreshToken;
    }

    /**
    * @param mixed $refreshToken
    * @return GameToken
    */
    public function setRefreshToken(string $refreshToken)
    {
        $this->refreshToken = $refreshToken;
        return $this;
    }

    /**
    * @return mixed
    */
    public function getRefreshTokenExpireAt():\DateTime
    {
        return $this->refreshTokenExpireAt;
    }

    /**
    * @param mixed $refreshTokenExpireAt
    * @return GameToken
    */
    public function setRefreshTokenExpireAt(\DateTime $refreshTokenExpireAt)
    {
        $this->refreshTokenExpireAt = $refreshTokenExpireAt;
        return $this;
    }

    /**
    * @return mixed
    */
    public function getTokenType(): string
    {
        return $this->tokenType;
    }

    /**
    * @param mixed $tokenType
    * @return GameToken
    */
    public function setTokenType(string $tokenType)
    {
        $this->tokenType = $tokenType;
        return $this;
    }



}