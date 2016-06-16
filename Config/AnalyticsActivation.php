<?php

class AnalyticsActivation
{
    public function beforeActivation($controller)
    {
        return true;
    }

    public function onActivation($controller)
    {
        $controller->Setting->write('Site.Analytics.webPropertyId', '', [
            'editable'    => 1,
            'title'       => 'Web Property ID',
            'description' => 'Enter your site Web Property ID',
            ]);

        $controller->Setting->write('Site.Analytics.domain', '', [
            'editable'    => 1,
            'title'       => 'Primary Domain',
            'description' => 'If you\'re using multiple subdomains, enter your primary domain name here',
            ]);
    }

    public function beforeDeactivation($controller)
    {
        return true;
    }

    public function onDeactivation($controller)
    {
        $controller->Setting->deleteKey('Site.Analytics.webPropertyId');
        $controller->Setting->deleteKey('Site.Analytics.domain');
    }
}
