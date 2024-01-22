<?php
defined("ABSPATH") || exit();

class SuperbInfoContentConfig
{
    const THEME_LINK = 'https://superbthemes.com/ecocoded/';
    const DEMO_LINK = 'https://superbthemes.com/demo/ecocoded/';

    private $FEATURES = array();

    public function __construct()
    {
        $this->AddFeature(__("Customize Header Logo, Text & Background Color", "ecocoded"), "purple-paint-brush.svg");
        $this->AddFeature(__("Translation Ready", "ecocoded"), "purple-article-medium.svg");
        $this->AddFeature(__("Fully SEO Optimized", "ecocoded"), "purple-gauge.svg");
        $this->AddFeature(__("Customize All Fonts", "ecocoded"), "purple-article-medium.svg");
        $this->AddFeature(__("Customize All Colors", "ecocoded"), "purple-paint-brush.svg");
        $this->AddFeature(__("Importable Demo Content", "ecocoded"), "purple-images.svg");
        $this->AddFeature(__("Elementor Compatible", "ecocoded"), "purple-elementor-logo.svg");
        $this->AddFeature(__("Replace Copyright Text", "ecocoded"), "purple-copyright.svg");
        $this->AddFeature(__("Full-Width Page Template", "ecocoded"), "purple-frame-corners.svg");
        $this->AddFeature(__("Access All Child Themes", "ecocoded"), "purple-images.svg");
        $this->AddFeature(__("Customer Support and Documentation", "ecocoded"), "purple-files.svg");
        $this->AddFeature(__("Multiple Website Support", "ecocoded"), "purple-files.svg");

        $this->AddFeature(__("Custom header top & bottom spacing", "ecocoded"), "gear.svg");
        $this->AddFeature(__("Hide sidebar", "ecocoded"), "gear.svg");
        $this->AddFeature(__("Show header image everywhere", "ecocoded"), "gear.svg");
        $this->AddFeature(__("Only show upper widgets on the front page", "ecocoded"), "gear.svg");

        $this->AddFeature(__("Remove 'Tag' from Tag Page Title", "ecocoded"), "purple-article-medium.svg");
        $this->AddFeature(__("Remove 'Author' from Author Page Title", "ecocoded"), "purple-article-medium.svg");
        $this->AddFeature(__("Remove 'Category' from Category Page Title", "ecocoded"), "purple-article-medium.svg");
    }

    private function AddFeature($title, $icon)
    {
        $this->FEATURES[] = array(
            "title" => $title,
            "icon" => $icon
        );
    }

    public function GetFeatures()
    {
        return $this->FEATURES;
    }
}
