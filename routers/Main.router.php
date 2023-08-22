<?php
require_once("./helpers/URL.helper.php");

class MainRouter
{
    protected $_urlHelper;
    protected $_api;
    protected $_db;

    function __construct()
    {
        $this->_urlHelper = new URLHelper();
    }

    public function showPage(string $page_name): void
    {
        if ($page_name == "")
            $page_name = "page=home";

        $get = $this->_urlHelper->getArrParams($page_name);

        if (array_key_exists("page", $get))
            self::dispatch(page_name: $get["page"]);
        else
            $this->_urlHelper->show404page("./views/");
    }

    private function dispatch(string $page_name): void
    {
        if (is_file("./views/{$page_name}.view.php")) {
            require_once("./views/{$page_name}.view.php");
        } else {
            $this->_urlHelper->show404page("./views/");
        }
    }
}
