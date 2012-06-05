<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Preferences Language Array
 *
 * Contains all language strings used by the Preference class.
 *
 * @package         BackendPro
 * @subpackage      Languages
 * @author          Adam Price
 * @copyright       Copyright (c) 2008
 * @license         http://www.gnu.org/licenses/lgpl.html
 * @link            http://www.kaydoo.co.uk/projects/backendpro
 * @filesource
 */

// ---------------------------------------------------------------------------

$lang['preference_saved_successfully'] = "The '%s' preferences have been saved successfully";

/** -------------------------------------- CONTROL PANEL SETTING STRINGS */
// General Configuration
$lang['preference_label_site_name'] = "Site name";
$lang['preference_desc_site_name']="Name of your site";

// Member Settings
$lang["preference_label_account_activation_time"]="Activation Time";
$lang['preference_desc_account_activation_time'] = 'Number of days before a user must have activated their account';
$lang["preference_label_autologin_period"]="Autologin Period";
$lang['preference_desc_autologin_period'] = 'Number of days for which the user will be logged in automaticaly';
$lang["preference_label_login_field"]="Lognin Field";
$lang['preference_desc_login_field'] = 'What way to allow users to login to the system using';


$lang['preference_field_activation_method_none'] = 'No activation required';
$lang['preference_field_activation_method_email'] = 'Self activation by email';
$lang['preference_field_activation_method_admin'] = 'Manual activation by an administrator';

// Security Preferences
$lang['preference_label_use_login_captcha'] = 'Use Login Captcha?';
$lang['preference_desc_use_login_captcha'] = 'Use Login Captcha?';
$lang['preference_label_use_registration_captcha'] = 'Use Registration Captcha?';
$lang['preference_desc_use_registration_captcha'] = 'Use Registration Captcha?';


// Email Configuration
$lang['preference_label_automated_from_name'] = 'Return name for auto-generated emails';
$lang['preference_desc_automated_from_name'] = 'Return name for auto-generated emails';
$lang['preference_label_automated_from_email'] = 'Return email address for auto-generated emails';
$lang['preference_desc_automated_from_email'] = 'If you leave this blank, many email servers will consider your email spam';
$lang['preference_label_email_mailpath'] = 'Sendmail path';
$lang['preference_desc_email_mailpath'] = 'Server path to the Sendmail application';
$lang['preference_label_smtp_host'] = 'SMTP Server';
$lang['preference_desc_smtp_host'] = 'Use this only if you choose SMTP';
$lang['preference_label_smtp_user'] = 'SMTP Username';
$lang['preference_desc_smtp_user'] = 'Use this only if you choose SMTP';
$lang['preference_label_smtp_pass'] = 'SMTP Password';
$lang['preference_desc_smtp_pass'] = 'Use this only if you choose SMTP';
$lang['preference_label_smtp_port'] = 'SMTP Port';

$lang['preference_label_smtp_timeout'] = 'SMTP Timeout';
$lang['preference_desc_smtp_timeout'] = 'Number in seconds';
$lang['preference_label_email_mailtype'] = 'Default Email Format';
$lang['preference_desc_email_mailtype'] = 'Default Email Format';
$lang['preference_label_email_charset'] = 'Email Character Encoding';
$lang['preference_desc_email_charset'] = 'Email Character Encoding';
$lang['preference_label_email_wordwrap'] = 'Enable Wordwrap?';
$lang['preference_desc_email_wordwrap'] = 'Enable Wordwrap?';
$lang['preference_label_email_wrapchars'] = 'Character count to wrap at';
$lang['preference_desc_email_wrapchars'] = 'Number of characters to wrap at';
$lang['preference_label_bcc_batch_mode'] = 'BCC Batch Mode?';
$lang['preference_desc_bcc_batch_mode'] = 'Batch Mode breaks up large mailings into smaller groups, which get sent at intervals. Recommended if your site is hosted on a shared-hosting account.';
$lang['preference_label_bcc_batch_size'] = 'Number of Emails Per Batch';
$lang['preference_desc_bcc_batch_size'] = 'For average servers, 200 is a safe number';

// Maintenance & Debuging Settings
$lang['preference_label_page_debug'] = 'Enable System Debugging?';
$lang['preference_desc_page_debug'] = 'Show important infomation about code execution';
$lang['preference_label_keep_error_logs_for'] = 'Archive Error Logs?';
$lang['preference_desc_keep_error_logs_for'] = 'Number of days to archive error logs for';



// Additional General Configuration
$lang['preference_label_company_name'] = "Company Name";
$lang['preference_desc_company_name'] ="Company name";
$lang['preference_label_company_address'] = "Company Address";
$lang['preference_desc_company_address'] ="Company address details";
$lang['preference_label_company_post'] = "Post Code";
$lang['preference_desc_company_post'] ="Post code";
$lang['preference_label_company_city'] = "City";
$lang['preference_desc_company_city'] ="City";
$lang['preference_label_company_country'] = "Country";
$lang['preference_desc_company_country'] ="Country";
$lang['preference_label_company_organization_number'] = "Company Organization Number";
$lang['preference_desc_company_organization_number'] ="Company registration number";
$lang['preference_label_company_telephone'] = "Company Telephone";
$lang['preference_desc_company_telephone'] ="Telephone number";
$lang['preference_label_company_mobile'] = "Company Mobile";
$lang['preference_desc_company_mobile'] ="Mobile number";
$lang['preference_label_company_other_one'] = "Company Other Info";
$lang['preference_desc_company_other_one'] ="Enter other information";
$lang['preference_label_company_other_two'] = "Company Other Info";
$lang['preference_desc_company_other_two'] ="Enter other infromation";

// analytics
$lang['preference_label_ga_tracking'] = "Google Analytics Tracking Code";
$lang['preference_desc_ga_tracking'] = 'Enter your Google Analytic Tracking Code to activate Google Analytics view data capturing. E.g: UA-19483569-6';
$lang['preference_label_ga_profile'] = "Google Analytics Profile";
$lang['preference_desc_ga_profile'] = 'Profile ID for this website in Google Analytics.';
$lang['preference_label_ga_email'] = "Google Analytics E-mail";
$lang['preference_desc_ga_email'] = 'E-mail address used for Google Analytics, we need this to show the graph on the dashboard.';
$lang['preference_label_ga_password'] = "Google Analytics Password";
$lang['preference_desc_ga_password'] = 'Google Analytics password. This is also needed this to show the graph on the dashboard.';

// RSS feeds
$lang['preference_label_dashboard_rss'] = "Dashboard RSS Feed";
$lang['preference_desc_dashboard_rss'] = 'Link to an RSS feed that will be displayed on the dashboard.';
$lang['preference_label_dashboard_rss_count'] = "Dashboard RSS Items";
$lang['preference_desc_dashboard_rss_count'] = 'How many RSS items would you like to display on the dashboard ?';

// cecilieokada.com Settings
$lang['preference_label_category_menu_id'] = "Category Menu ID";
$lang['preference_desc_category_menu_id'] = 'Go to '.  anchor('menus/admin','menus/admin').' and find menu id which you want to show the category 
    under it. This will be used to show category in the top main menu under Other Work. ';
$lang['preference_label_parentid_other_illust'] = "Parent ID in Category of Other Illustrations";
$lang['preference_desc_parentid_other_illust'] = 'Go to '. anchor('category/admin','category/admin').'category/admin and find id for the Other Illustrations. This will be used in the backend
     submenu and filter for the Other Illustration page.';
$lang['preference_label_lilly_fairies_submenu_id'] = "Lilly Fairies Submenu ID";
$lang['preference_desc_lilly_fairies_submenu_id'] = 'Go to '.anchor('lilly_fairies_menus/admin','lilly_fairies_menus/admin').' and find the menu ID which you want to show for the Lilly Fairies.';
$lang['preference_label_quicksand_colorbox_cat_id'] = "Quicksand Colorbox Category ID";
$lang['preference_desc_quicksand_colorbox_cat_id'] = 'Go to '.anchor('category/admin','category/admin').' and find the category ID which you want to use Quicksand filter and Colorbox Lightbox.';
$lang['preference_label_other_work_main'] = "Other Work Main Menu";
$lang['preference_desc_other_work_main'] = 'There is no Other Work page. If this is filled, it will redirect you to the page you spacified. Otherwise it will be redirect to the index page.';



// Sharethis
$lang['preference_label_sharethis_direction'] = "Sharethis Direction";
$lang['preference_desc_sharethis_direction'] = 'vertical or horizontal';
$lang['preference_label_sharethis_services'] = "Sharethis Services";
$lang['preference_desc_sharethis_services'] = 'Type facebook, twitter, yahoo, gbuzz, email, sharethis, linkedin, diigo, blogger. Separate them with commas.';
$lang['preference_label_sharethis_pub_key'] = "Sharethis Public Key";
$lang['preference_desc_sharethis_pub_key'] = "Sharethis Public Key";
$lang['preference_label_sharethis_size'] = "Sharethis Icon Size";
$lang['preference_desc_sharethis_size'] = "Sharethis Icon Size";

// twitter
$lang['preference_label_twittername'] = "Twitter name";
$lang['preference_desc_twittername'] = 'Input twitter name';
$lang['preference_label_twittercount'] = "Number of tweets";
$lang['preference_desc_twittercount'] = 'Number of tweets you want to display';

// google
$lang['preference_label_client_id'] = "Google API Access Client ID";
$lang['preference_desc_client_id'] = 'Get your client id from Goolge API console';
$lang['preference_label_client_secret'] = "Google API Access Client Secret";
$lang['preference_desc_client_secret'] = 'Get your client secret from Google API console';

// adding here for error log

$lang["preference_label_allow_user_registration"]="Allow User Registration";
$lang['preference_desc_allow_user_registration'] = 'Do you allow user registration?';
$lang["preference_label_activation_method"]="Activation Method";
$lang["preference_desc_activation_method"]="Activation Method";
$lang["preference_label_default_user_group"]="Default User Group";
$lang["preference_desc_default_user_group"]="Default User Group";
$lang["preference_label_allow_user_profiles"]="Allow User Profiles";
$lang["preference_desc_allow_user_profiles"]="Allow User Profiles";
$lang["preference_label_min_password_length"]="Min Password Length";
$lang["preference_desc_min_password_length"]="Min Password Length";
$lang["preference_label_email_protocol"]="Email Protocol";
$lang["preference_desc_email_protocol"]="Email Protocol";
$lang["preference_label_category"]="Category";
$lang["preference_desc_category"]="Category";
$lang["preference_label_customers"]="Customers";
$lang["preference_desc_customers"]="Customers";
$lang["preference_label_filemanager"]="File Manager";
$lang["preference_desc_filemanager"]="File Manager";
$lang["preference_label_languages"]="Languages";
$lang["preference_desc_languages"]="Languages";
$lang["preference_label_menus"]="Menus";
$lang["preference_desc_menus"]="Menus";
$lang["preference_label_messages"]="Messages";
$lang["preference_desc_messages"]="Messages";
$lang["preference_label_orders"]="Orders";
$lang["preference_desc_orders"]="Orders";
$lang["preference_label_pages"]="Pages";
$lang["preference_desc_pages"]="Pages";
$lang["preference_label_products"]="Products";
$lang["preference_desc_products"]="Products";
$lang["preference_label_slideshow"]="Slideshow";
$lang["preference_desc_slideshow"]="Slideshow";
$lang["preference_label_subscribers"]="Subscribers";
$lang["preference_desc_subscribers"]="Subscribers";
$lang["preference_label_customer_registration"]="Customer Registration";
$lang["preference_desc_customer_registration"]="Customer Registration";


/**
 *     BELOW HERE DEFINE ANY LANGUAGE STRINGS FOR YOUR APPLICATIONS
 *
 *     Format:
 *     For a preference label name:
 *     $lang['preference_label_{preference_name}'] = '';
 *
 *     For a preference description:
 *     $lang['preference_desc_{preference_desc}'] = '';
 */

/* End of file preferences_lang.php */
/* Location: ./modules/preferences/language/english/preferences_lang.php */