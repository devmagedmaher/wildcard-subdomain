<?php

namespace App\Settings;

use App\Website;

class SiteSettings 
{
    /**
     * Host name
     *
     * @var  string 
     */
    private $host;

    /**
     * Sub-domain
     *
     * @var  string 
     */
    private $subdomain;

    /**
     * Website Name
     *
     * @var string 
     */
    private $name;


    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct($hostname) {

        $this->host = $hostname;

        $this->subdomain = explode('.', $hostname, 3)[0];

        $this->getSiteInformation();
    }

    /**
     * get website information from database
     *
     * @return void 
     */
    private function getSiteInformation() {

        // $website = Website::where('subdomain', $this->subdomain)->get()->first();

        $this->name = null;
    }

    /**
     * Check if Website exists
     *
     * @return boolean 
     */
    public function websiteExists() {

        return $this->name ? true : false;
    }

    /**
     * getter method
     *
     * @return mixed 
     */
    public function get($attribute) {

        return $this->$attribute;
    }
}
