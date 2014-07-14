<?php

/**
*
* @package phpBB Extension - Quick Ads
* @copyright (c) 2014 o0johntam0o
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace o0johntam0o\quick_ads\acp;

class main_info
{
	function module()
	{
		return array(
			'filename'	=> '\o0johntam0o\quick_ads\acp\main_module',
			'title'		=> 'QUICK_ADS_TITLE',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'quick_ads_config'	=> array(
					'title' => 'QUICK_ADS_TITLE_SETTINGS1',
					'auth' => 'acl_a_board',
					'cat' => array('QUICK_ADS_TITLE_SETTINGS1')
				),
				'quick_ads_config_details'	=> array(
					'title' => 'QUICK_ADS_TITLE_SETTINGS2',
					'auth' => 'acl_a_board',
					'cat' => array('QUICK_ADS_TITLE_SETTINGS2')
				),
			),
		);
	}
}
