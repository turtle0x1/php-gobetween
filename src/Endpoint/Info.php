<?php

namespace dhope0000\GoBetween\Endpoint;

class Info extends AbstructEndpoint
{
    protected function getEndpoint()
    {
        return '/';
    }

    public function all()
    {
        return $this->get($this->getEndpoint());
    }

    /**
     * List all trusted certificates on the server
     *
     * This is an alias of the get method with an empty string as the parameter
     *
     * @return array
     */
    public function dump()
    {
        return $this->get($this->getEndpoint()."dump");
    }

}
