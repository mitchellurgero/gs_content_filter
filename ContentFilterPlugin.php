<?php
/*
Content Filter (Bad work blocking) for GNU Social
Built by: Mitchell Urgero (@loki@urgero.org) <info@urgero.org>
*/

if (!defined('STATUSNET')) {
    exit(1);
}
class ContentFilterPlugin extends Plugin
{
	public function initialize()
    {
    	return true;
    }
    static function settings($setting)
	{
		// config.php settings override the settings in this file
		$settings['filter'] = array("fag");
		$configphpsettings = common_config('site','contentf') ?: array();
		foreach($configphpsettings as $configphpsetting=>$value) {
			$settings[$configphpsetting] = $value;
		}
		if(isset($settings[$setting])) {
			return $settings[$setting];
		}
		else {
			return false;
		}
	}
	public function onStartNoticeSave($notice1){
		if ($notice1->isLocal()){
			$orig = $notice1->rendered;
			$words = self::settings('filter');
			//Begin filtering content.
			foreach($words as $word){
				$orig = str_replace($word, str_repeat("*", strlen($word)), $orig);
			}
			$notice1->rendered = $orig;
		}
		return true;
	}
	public function onEndNoticeSave($notice){
		
		return true;
	}
}
