Once you have a client setup you can create manipulate servers:

**Alot of the endpoints return NULL so if no exeception happens your action has complete**

**Most of this appears to alter in memory so your changes wont be saved to the .toml file**

## Create A Server

The structure to create a server should match the structure that you can
read in the [source code here](https://github.com/yyyar/gobetween/blob/df44a9706000442463cf82bb4f5b86a283aa78ab/config/config.go#L98)

```php
$client->servers->create("lxd01", [
    "protocol"=>"tcp",
    "bind"=>"0.0.0.0:5000",
    "discovery"=>[
        "kind"=>"lxd",
        "lxd_server_address" => "unix:///var/snap/lxd/common/lxd/unix.socket",
        "lxd_container_label_key" => "user.gobetween.label",
        "lxd_container_label_value" => "web",
        "lxd_container_port_key" => "user.gobetween.port"
    ]
]);
```

## Delete A Server

```php
$client->servers->delete("lxd01");
```
