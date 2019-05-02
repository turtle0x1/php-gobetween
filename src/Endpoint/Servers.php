<?php

namespace dhope0000\GoBetween\Endpoint;

class Servers extends AbstructEndpoint
{
    protected function getEndpoint()
    {
        return '/servers/';
    }

    /**
     * List all servers on the load balancer
     * @return array
     */
    public function all()
    {
        return $this->get($this->getEndpoint());
    }

    public function create(string $name, array $config)
    {
        return $this->post($this->getEndpoint().$name, $config);
    }

    public function info(string $name)
    {
        return $this->get($this->getEndpoint().$name);
    }

    public function stats(string $name)
    {
        return $this->get($this->getEndpoint().$name."/stats");
    }

    public function remove(string $name)
    {
        return $this->delete($this->getEndpoint().$name);
    }
}
