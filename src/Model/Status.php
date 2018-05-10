<?php
namespace FortniteApi\Model;

class Status
{
    private $serviceInstanceId;
    private $status;
    private $message;
    private $maintenanceUri;

    /**
     * @return mixed
     */
    public function getServiceInstanceId()
    {
        return $this->serviceInstanceId;
    }

    /**
     * @param mixed $serviceInstanceId
     * @return Status
     */
    public function setServiceInstanceId($serviceInstanceId)
    {
        $this->serviceInstanceId = $serviceInstanceId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return Status
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     * @return Status
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMaintenanceUri()
    {
        return $this->maintenanceUri;
    }

    /**
     * @param mixed $maintenanceUri
     * @return Status
     */
    public function setMaintenanceUri($maintenanceUri)
    {
        $this->maintenanceUri = $maintenanceUri;
        return $this;
    }


}