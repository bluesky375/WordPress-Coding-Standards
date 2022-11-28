<?php
/**
 * WordPress Coding Standard.
 *
 * @package WPCS\WordPressCodingStandards
 * @link    https://github.com/WordPress/WordPress-Coding-Standards
 * @license https://opensource.org/licenses/MIT MIT
 */

namespace WordPressCS\WordPress\Sniffs\WP;

use WordPressCS\WordPress\AbstractClassRestrictionsSniff;

/**
 * Verify whether references to WP native classes use the proper casing for the class name.
 *
 * @package WPCS\WordPressCodingStandards
 *
 * @since 3.0.0
 */
class ClassNameCaseSniff extends AbstractClassRestrictionsSniff {

	/**
	 * List of all WP native classes.
	 *
	 * List is sorted alphabetically and based on the WIP autoloading PR.
	 * {@link https://github.com/WordPress/wordpress-develop/pull/3470}
	 *
	 * Note: this list will be enhanced in the class constructor.
	 *
	 * {@internal To be updated after every major release. Last updated for WordPress 6.1.1.}
	 *
	 * @since 3.0.0
	 *
	 * @var string[] The class names in their "proper" case.
	 *               The constructor will add the lowercased class name as a key to each entry.
	 */
	private $wp_classes = array(
		'_WP_Dependency',
		'_WP_Editors',
		'_WP_List_Table_Compat',
		'Automatic_Upgrader_Skin',
		'Bulk_Plugin_Upgrader_Skin',
		'Bulk_Theme_Upgrader_Skin',
		'Bulk_Upgrader_Skin',
		'Core_Upgrader',
		'Custom_Background',
		'Custom_Image_Header',
		'File_Upload_Upgrader',
		'ftp_pure',
		'ftp_sockets',
		'Gettext_Translations',
		'IXR_Base64',
		'IXR_Client',
		'IXR_ClientMulticall',
		'IXR_Date',
		'IXR_Error',
		'IXR_IntrospectionServer',
		'IXR_Message',
		'IXR_Request',
		'IXR_Server',
		'IXR_Value',
		'Language_Pack_Upgrader',
		'Language_Pack_Upgrader_Skin',
		'MO',
		'NOOP_Translations',
		'Plugin_Installer_Skin',
		'Plugin_Upgrader',
		'Plugin_Upgrader_Skin',
		'Plural_Forms',
		'PO',
		'POMO_CachedFileReader',
		'POMO_CachedIntFileReader',
		'POMO_FileReader',
		'POMO_Reader',
		'POMO_StringReader',
		'Theme_Installer_Skin',
		'Theme_Upgrader',
		'Theme_Upgrader_Skin',
		'Translation_Entry',
		'Translations',
		'Walker',
		'Walker_Category',
		'Walker_Category_Checklist',
		'Walker_CategoryDropdown',
		'Walker_Comment',
		'Walker_Nav_Menu',
		'Walker_Nav_Menu_Checklist',
		'Walker_Nav_Menu_Edit',
		'Walker_Page',
		'Walker_PageDropdown',
		'WP',
		'WP_Admin_Bar',
		'WP_Ajax_Response',
		'WP_Ajax_Upgrader_Skin',
		'WP_Application_Passwords',
		'WP_Application_Passwords_List_Table',
		'WP_Automatic_Updater',
		'WP_Block',
		'WP_Block_Editor_Context',
		'WP_Block_List',
		'WP_Block_Parser',
		'WP_Block_Parser_Block',
		'WP_Block_Parser_Frame',
		'WP_Block_Pattern_Categories_Registry',
		'WP_Block_Patterns_Registry',
		'WP_Block_Styles_Registry',
		'WP_Block_Supports',
		'WP_Block_Template',
		'WP_Block_Type',
		'WP_Block_Type_Registry',
		'WP_Comment',
		'WP_Comment_Query',
		'WP_Comments_List_Table',
		'WP_Community_Events',
		'WP_Customize_Background_Image_Control',
		'WP_Customize_Background_Image_Setting',
		'WP_Customize_Background_Position_Control',
		'WP_Customize_Code_Editor_Control',
		'WP_Customize_Color_Control',
		'WP_Customize_Control',
		'WP_Customize_Cropped_Image_Control',
		'WP_Customize_Custom_CSS_Setting',
		'WP_Customize_Date_Time_Control',
		'WP_Customize_Filter_Setting',
		'WP_Customize_Header_Image_Control',
		'WP_Customize_Header_Image_Setting',
		'WP_Customize_Image_Control',
		'WP_Customize_Manager',
		'WP_Customize_Media_Control',
		'WP_Customize_Nav_Menu_Auto_Add_Control',
		'WP_Customize_Nav_Menu_Control',
		'WP_Customize_Nav_Menu_Item_Control',
		'WP_Customize_Nav_Menu_Item_Setting',
		'WP_Customize_Nav_Menu_Location_Control',
		'WP_Customize_Nav_Menu_Locations_Control',
		'WP_Customize_Nav_Menu_Name_Control',
		'WP_Customize_Nav_Menu_Section',
		'WP_Customize_Nav_Menu_Setting',
		'WP_Customize_Nav_Menus',
		'WP_Customize_Nav_Menus_Panel',
		'WP_Customize_New_Menu_Control',
		'WP_Customize_New_Menu_Section',
		'WP_Customize_Panel',
		'WP_Customize_Partial',
		'WP_Customize_Section',
		'WP_Customize_Selective_Refresh',
		'WP_Customize_Setting',
		'WP_Customize_Sidebar_Section',
		'WP_Customize_Site_Icon_Control',
		'WP_Customize_Theme_Control',
		'WP_Customize_Themes_Panel',
		'WP_Customize_Themes_Section',
		'WP_Customize_Upload_Control',
		'WP_Customize_Widgets',
		'WP_Date_Query',
		'WP_Debug_Data',
		'WP_Dependencies',
		'WP_Embed',
		'WP_Error',
		'WP_Fatal_Error_Handler',
		'WP_Feed_Cache',
		'WP_Feed_Cache_Transient',
		'WP_Filesystem_Base',
		'WP_Filesystem_Direct',
		'WP_Filesystem_FTPext',
		'WP_Filesystem_ftpsockets',
		'WP_Filesystem_SSH2',
		'WP_Hook',
		'WP_Http',
		'WP_Http_Cookie',
		'WP_Http_Curl',
		'WP_Http_Encoding',
		'WP_HTTP_Fsockopen',
		'WP_HTTP_IXR_Client',
		'WP_HTTP_Proxy',
		'WP_HTTP_Requests_Hooks',
		'WP_HTTP_Requests_Response',
		'WP_HTTP_Response',
		'WP_Http_Streams',
		'WP_Image_Editor',
		'WP_Image_Editor_GD',
		'WP_Image_Editor_Imagick',
		'WP_Importer',
		'WP_Internal_Pointers',
		'WP_Links_List_Table',
		'WP_List_Table',
		'WP_List_Util',
		'WP_Locale',
		'WP_Locale_Switcher',
		'WP_MatchesMapRegex',
		'WP_Media_List_Table',
		'WP_Meta_Query',
		'WP_Metadata_Lazyloader',
		'WP_MS_Sites_List_Table',
		'WP_MS_Themes_List_Table',
		'WP_MS_Users_List_Table',
		'WP_Nav_Menu_Widget',
		'WP_Network',
		'WP_Network_Query',
		'WP_Object_Cache',
		'WP_oEmbed',
		'WP_oEmbed_Controller',
		'WP_Paused_Extensions_Storage',
		'WP_Plugin_Install_List_Table',
		'WP_Plugins_List_Table',
		'WP_Post',
		'WP_Post_Comments_List_Table',
		'WP_Post_Type',
		'WP_Posts_List_Table',
		'WP_Privacy_Data_Export_Requests_List_Table',
		'WP_Privacy_Data_Export_Requests_Table',
		'WP_Privacy_Data_Removal_Requests_List_Table',
		'WP_Privacy_Data_Removal_Requests_Table',
		'WP_Privacy_Policy_Content',
		'WP_Privacy_Requests_Table',
		'WP_Query',
		'WP_Recovery_Mode',
		'WP_Recovery_Mode_Cookie_Service',
		'WP_Recovery_Mode_Email_Service',
		'WP_Recovery_Mode_Key_Service',
		'WP_Recovery_Mode_Link_Service',
		'WP_REST_Application_Passwords_Controller',
		'WP_REST_Attachments_Controller',
		'WP_REST_Autosaves_Controller',
		'WP_REST_Block_Directory_Controller',
		'WP_REST_Block_Pattern_Categories_Controller',
		'WP_REST_Block_Patterns_Controller',
		'WP_REST_Block_Renderer_Controller',
		'WP_REST_Block_Types_Controller',
		'WP_REST_Blocks_Controller',
		'WP_REST_Comment_Meta_Fields',
		'WP_REST_Comments_Controller',
		'WP_REST_Controller',
		'WP_REST_Edit_Site_Export_Controller',
		'WP_REST_Global_Styles_Controller',
		'WP_REST_Menu_Items_Controller',
		'WP_REST_Menu_Locations_Controller',
		'WP_REST_Menus_Controller',
		'WP_REST_Meta_Fields',
		'WP_REST_Pattern_Directory_Controller',
		'WP_REST_Plugins_Controller',
		'WP_REST_Post_Format_Search_Handler',
		'WP_REST_Post_Meta_Fields',
		'WP_REST_Post_Search_Handler',
		'WP_REST_Post_Statuses_Controller',
		'WP_REST_Post_Types_Controller',
		'WP_REST_Posts_Controller',
		'WP_REST_Request',
		'WP_REST_Response',
		'WP_REST_Revisions_Controller',
		'WP_REST_Search_Controller',
		'WP_REST_Search_Handler',
		'WP_REST_Server',
		'WP_REST_Settings_Controller',
		'WP_REST_Sidebars_Controller',
		'WP_REST_Site_Health_Controller',
		'WP_REST_Taxonomies_Controller',
		'WP_REST_Templates_Controller',
		'WP_REST_Term_Meta_Fields',
		'WP_REST_Term_Search_Handler',
		'WP_REST_Terms_Controller',
		'WP_REST_Themes_Controller',
		'WP_REST_URL_Details_Controller',
		'WP_REST_User_Meta_Fields',
		'WP_REST_Users_Controller',
		'WP_REST_Widget_Types_Controller',
		'WP_REST_Widgets_Controller',
		'WP_Rewrite',
		'WP_Role',
		'WP_Roles',
		'WP_Screen',
		'WP_Scripts',
		'WP_Session_Tokens',
		'WP_Sidebar_Block_Editor_Control',
		'WP_SimplePie_File',
		'WP_SimplePie_Sanitize_KSES',
		'WP_Site',
		'WP_Site_Health',
		'WP_Site_Health_Auto_Updates',
		'WP_Site_Icon',
		'WP_Site_Query',
		'WP_Sitemaps',
		'WP_Sitemaps_Index',
		'WP_Sitemaps_Posts',
		'WP_Sitemaps_Provider',
		'WP_Sitemaps_Registry',
		'WP_Sitemaps_Renderer',
		'WP_Sitemaps_Stylesheet',
		'WP_Sitemaps_Taxonomies',
		'WP_Sitemaps_Users',
		'WP_Style_Engine',
		'WP_Style_Engine_CSS_Declarations',
		'WP_Style_Engine_CSS_Rule',
		'WP_Style_Engine_CSS_Rules_Store',
		'WP_Style_Engine_Processor',
		'WP_Styles',
		'WP_Tax_Query',
		'WP_Taxonomy',
		'WP_Term',
		'WP_Term_Query',
		'WP_Terms_List_Table',
		'WP_Text_Diff_Renderer_inline',
		'WP_Text_Diff_Renderer_Table',
		'WP_Textdomain_Registry',
		'WP_Theme',
		'WP_Theme_Install_List_Table',
		'WP_Theme_JSON',
		'WP_Theme_JSON_Data',
		'WP_Theme_JSON_Resolver',
		'WP_Theme_JSON_Schema',
		'WP_Themes_List_Table',
		'WP_Upgrader',
		'WP_Upgrader_Skin',
		'WP_User',
		'WP_User_Meta_Session_Tokens',
		'WP_User_Query',
		'WP_User_Request',
		'WP_User_Search',
		'WP_Users_List_Table',
		'WP_Widget',
		'WP_Widget_Archives',
		'WP_Widget_Area_Customize_Control',
		'WP_Widget_Block',
		'WP_Widget_Calendar',
		'WP_Widget_Categories',
		'WP_Widget_Custom_HTML',
		'WP_Widget_Factory',
		'WP_Widget_Form_Customize_Control',
		'WP_Widget_Links',
		'WP_Widget_Media',
		'WP_Widget_Media_Audio',
		'WP_Widget_Media_Gallery',
		'WP_Widget_Media_Image',
		'WP_Widget_Media_Video',
		'WP_Widget_Meta',
		'WP_Widget_Pages',
		'WP_Widget_Recent_Comments',
		'WP_Widget_Recent_Posts',
		'WP_Widget_RSS',
		'WP_Widget_Search',
		'WP_Widget_Tag_Cloud',
		'WP_Widget_Text',
		'wp_xmlrpc_server',
		'wpdb',
	);

	/**
	 * List of all WP native classes in lowercase.
	 *
	 * This array is automatically generated in the class constructor based on the $wp_classes property.
	 *
	 * @since 3.0.0
	 *
	 * @var string[] The class names in lowercase.
	 */
	private $wp_classes_lc = array();

	/**
	 * Constructor.
	 *
	 * @since 3.0.0
	 */
	public function __construct() {
		// Adjust the $wp_classes property to have the lowercased version of the value as a key.
		$this->wp_classes_lc = array_map( 'strtolower', $this->wp_classes );
		$this->wp_classes    = array_combine( $this->wp_classes_lc, $this->wp_classes );
	}

	/**
	 * Groups of classes to restrict.
	 *
	 * @since 3.0.0
	 *
	 * @return array
	 */
	public function getGroups() {
		return array(
			'wp_classes' => array(
				'classes' => $this->wp_classes_lc,
			),
		);
	}

	/**
	 * Process a matched token.
	 *
	 * @since 3.0.0
	 *
	 * @param int    $stackPtr        The position of the current token in the stack.
	 * @param string $group_name      The name of the group which was matched. Will
	 *                                always be 'wp_classes'.
	 * @param string $matched_content The token content (class name) which was matched.
	 *
	 * @return void
	 */
	public function process_matched_token( $stackPtr, $group_name, $matched_content ) {

		$matched_unqualified = ltrim( $matched_content, '\\' );
		$matched_lowercase   = strtolower( $matched_unqualified );
		$matched_proper_case = $this->wp_classes[ $matched_lowercase ];

		if ( $matched_unqualified === $matched_proper_case ) {
			// Already using proper case, nothing to do.
			return;
		}

		$warning = 'It is strongly recommended to refer to classes by their properly cased name. Expected: %s Found: %s';
		$data    = array(
			$matched_proper_case,
			$matched_unqualified,
		);

		$this->phpcsFile->addWarning( $warning, $stackPtr, 'Incorrect', $data );
	}
}
