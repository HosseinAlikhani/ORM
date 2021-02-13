<?php
namespace App\Vendor\Application;

use App\Vendor\Env\DotEnv;

class kernel {

    /**
     * Path Of Package
     */
    protected $path;

    /**
     * .Env Path
     */
    protected $envPath;

    public function __construct()
    {
        $this->setPath();
        $this->renderEnv();
    }

    /**
     * render Env File
     */
    protected function renderEnv()
    {
        $this->envPath = "$this->path/.env";
        $env = new DotEnv($this->envPath);
        return $env->load();
    }

    /**
     * set Path DIR
     */
    protected function setPath()
    {
        $this->path = dirname(__FILE__, 4);
    }
}