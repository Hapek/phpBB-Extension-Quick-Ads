<?php

/**
*
* @package phpBB Extension - Quick Ads
* @copyright (c) 2014 o0johntam0o
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace o0johntam0o\quick_ads\migrations;

class release_1_0_0 extends \phpbb\db\migration\migration
{
    public function effectively_installed()
    {
        return isset($this->config['quick_ads_version']) && version_compare($this->config['quick_ads_version'], '1.0.0', '>=');
    }

    static public function depends_on()
    {
        return array('\phpbb\db\migration\data\v310\dev');
    }

    public function update_data()
    {
        return array(
			array('table.add', array(
				'phpbb_quick_ads',
				array(
					'COLUMNS'		=> array(
						'ads_id'			=> array('UINT', NULL, 'auto_increment'),
						'ads_name'			=> array('VCHAR', 'Undefined'),
						'ads_group'			=> array('VCHAR', '1,2,3,4,5,7'),
						'ads_pos'			=> array('INT:1', 2),	// 0 = disable, 1 = top, 2 = bottom, 3 = left, 4 = right
						'ads_onpage'		=> array('VCHAR', 'faq,index,mcp,memberlist,posting,report,search,ucp,viewforum,viewonline,viewtopic'),
						'ads_text'			=> array('MTEXT_UNI', ''),
						'ads_href'			=> array('VCHAR', ''),
						'ads_bg_img'		=> array('VCHAR', ''),
						'ads_bg_color'		=> array('VCHAR', '#ffffff'),
						'ads_width'			=> array('INT:4', 50),
						'ads_height'		=> array('INT:4', 50),
						'ads_overf'			=> array('INT:1', 0),	// 0 = hidden, 1 = visible, 2 = scroll, 3 = auto
						'ads_priority'		=> array('INT:2', 99),
					),
					'PRIMARY_KEY'	=> 'ads_id',
				),
			)),
			
			array('table.insert', array(
				'phpbb_quick_ads',
				array(
					'ads_text'	=> 'Hello {S_USERNAME}',
				),
			)),
			
            array('config.add', array('quick_ads_version', '1.0.0')),
            array('config.add', array('quick_ads_enable', 0)),
            array('config.add', array('quick_ads_custom_id', 'quick_ads_')),
            array('config.add', array('quick_ads_zindex', 100)),
            array('config.add', array('quick_ads_closebt', 1)),
            array('config.add', array('quick_ads_cookie', 1)),
            array('config.add', array('quick_ads_cookie_time', 5)),
            array('config.add', array('quick_ads_wmin_left', 0)),
            array('config.add', array('quick_ads_hmin_left', 0)),
            array('config.add', array('quick_ads_wmin_right', 0)),
            array('config.add', array('quick_ads_hmin_right', 0)),
            array('config.add', array('quick_ads_wmin_top', 0)),
            array('config.add', array('quick_ads_hmin_top', 0)),
            array('config.add', array('quick_ads_wmin_bottom', 0)),
            array('config.add', array('quick_ads_hmin_bottom', 0)),

            array('module.add', array(
                'acp',
                'ACP_CAT_DOT_MODS',
                'QUICK_ADS_TITLE_ACP'
            )),
			
            array('module.add', array(
                'acp',
                'QUICK_ADS_TITLE_ACP',
                array(
                    'module_basename'   => '\o0johntam0o\quick_ads\acp\main_module',
                    'modes'             => array('config_quick_ads'),
                ),
            )),
        );
    }
}