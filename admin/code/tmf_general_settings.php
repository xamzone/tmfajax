<?php
require_once('../config/tce_config.php');

$pagelevel = K_AUTH_ADMIN_USERS;
require_once('../../shared/code/tce_authorization.php');
require_once('../../shared/config/tce_user_registration.php');


/* if(isset($_GET['imglogo'])){
	foreach(glob(K_PATH_CACHE.'logo/*') as $filename){
		echo '<option value="'.basename($filename).'" ';
		if(basename($filename)===$json['logoImg']){
			echo ' selected="selected"';
		}
		echo '>'.basename($filename).'</option>'.K_NEWLINE;
		// echo basename($filename);
	}
	die();	
} */

$thispage_title = "General Settings";
$thispage_title_icon = "<i class='fas fa-cogs'></i> ";

require_once('tce_page_header.php');
require_once('../../shared/code/tce_functions_form.php');

/**
<script>

	function getImgLogo(){
		$.ajax({
				'url': 'tmf_general_settings.php?imglogo',
				'type': 'GET',
				'beforeSend': function(result){
					$('#logoImg').html('<option>Loading... Please wait!</option>');
				},
				'success': function(result){
					$('#logoImg').html(result);
				}		
		});
	}	


</script>
**/

// var_dump($_POST);
if (!isset($_POST['answer_all_questions']) or (empty($_POST['answer_all_questions']))) {
    $answer_all_questions = false;
} else {
    $answer_all_questions = F_getBoolean($_REQUEST['answer_all_questions']);
}

if (!isset($_POST['show_terminate_when_all_answered']) or (empty($_POST['show_terminate_when_all_answered']))) {
    $show_terminate_when_all_answered = false;
} else {
    $show_terminate_when_all_answered = F_getBoolean($_REQUEST['show_terminate_when_all_answered']);
}

if (!isset($_POST['show_save_button']) or (empty($_POST['show_save_button']))) {
    $show_save_button = false;
} else {
    $show_save_button = F_getBoolean($_REQUEST['show_save_button']);
}

if (!isset($_POST['chat_feature']) or (empty($_POST['chat_feature']))) {
    $chat_feature = false;
} else {
    $chat_feature = F_getBoolean($_REQUEST['chat_feature']);
}

if (!isset($_POST['display_test_desc']) or (empty($_POST['display_test_desc']))) {
    $display_test_desc = false;
} else {
    $display_test_desc = F_getBoolean($_REQUEST['display_test_desc']);
}

if (!isset($_POST['jsonFile']) or (empty($_POST['jsonFile']))) {
    $jsonFile = false;
} else {
    $jsonFile = F_getBoolean($_REQUEST['jsonFile']);
}

if (!isset($_POST['createAllJsonFileOnStartup']) or (empty($_POST['createAllJsonFileOnStartup']))) {
    $createAllJsonFileOnStartup = false;
} else {
    $createAllJsonFileOnStartup = F_getBoolean($_REQUEST['createAllJsonFileOnStartup']);
}

if (!isset($_POST['cacheFeature']) or (empty($_POST['cacheFeature']))) {
    $cacheFeature = false;
} else {
    $cacheFeature = F_getBoolean($_REQUEST['cacheFeature']);
}

if (!isset($_POST['clearStorageOnLogin']) or (empty($_POST['clearStorageOnLogin']))) {
    $clearStorageOnLogin = false;
} else {
    $clearStorageOnLogin = F_getBoolean($_REQUEST['clearStorageOnLogin']);
}

if (!isset($_POST['hideExpTest']) or (empty($_POST['hideExpTest']))) {
    $hideExpTest = false;
} else {
    $hideExpTest = F_getBoolean($_REQUEST['hideExpTest']);
}

if (!isset($_POST['PDFResult']) or (empty($_POST['PDFResult']))) {
    $PDFResult = false;
} else {
    $PDFResult = F_getBoolean($_REQUEST['PDFResult']);
}

if (!isset($_POST['pubPageHelp']) or (empty($_POST['pubPageHelp']))) {
    $pubPageHelp = false;
} else {
    $pubPageHelp = F_getBoolean($_REQUEST['pubPageHelp']);
}

if (!isset($_POST['logoImg']) or (empty($_POST['logoImg']))) {
    $logoImg = false;
} else {
    $logoImg = F_getBoolean($_REQUEST['logoImg']);
}

if (!isset($_POST['SSGenJSON']) or (empty($_POST['SSGenJSON']))) {
    $SSGenJSON = false;
} else {
    $SSGenJSON = F_getBoolean($_REQUEST['SSGenJSON']);
}

if (!isset($_POST['triggerCacheAllFromServer']) or (empty($_POST['triggerCacheAllFromServer']))) {
    $triggerCacheAllFromServer = false;
} else {
    $triggerCacheAllFromServer = F_getBoolean($_REQUEST['triggerCacheAllFromServer']);
}

if (!isset($_POST['forgotPass']) or (empty($_POST['forgotPass']))) {
    $forgotPass = false;
} else {
    $forgotPass = F_getBoolean($_REQUEST['forgotPass']);
}

if (!isset($_POST['userReg']) or (empty($_POST['userReg']))) {
    $userReg = false;
} else {
    $userReg = F_getBoolean($_REQUEST['userReg']);
}

if (!isset($_POST['enable_greeting']) or (empty($_POST['enable_greeting']))) {
    $enable_greeting = false;
} else {
    $enable_greeting = F_getBoolean($_REQUEST['enable_greeting']);
}

if (!isset($_POST['enable_delay']) or (empty($_POST['enable_delay']))) {
    $enable_delay = false;
} else {
    $enable_delay = F_getBoolean($_REQUEST['enable_delay']);
}

if (!isset($_POST['enable_langsel']) or (empty($_POST['enable_langsel']))) {
    $enable_langsel = false;
} else {
    $enable_langsel = F_getBoolean($_REQUEST['enable_langsel']);
}

if (!isset($_POST['enable_ccs']) or (empty($_POST['enable_ccs']))) {
    $enable_ccs = false;
} else {
    $enable_ccs = F_getBoolean($_REQUEST['enable_ccs']);
}

if(isset($_POST['update'])){
	$arr = array();
	$arr['siteName'] = urlencode(stripcslashes(strip_tags($_POST['siteName'])));
	$arr['siteDesc'] = urlencode(stripcslashes(strip_tags($_POST['siteDesc'])));
	$arr['siteAuthor'] = urlencode(stripcslashes(strip_tags($_POST['siteAuthor'])));
	$arr['siteReplyTo'] = urlencode(stripcslashes(strip_tags($_POST['siteReplyTo'])));
	$arr['siteKeyword'] = urlencode(stripcslashes(strip_tags($_POST['siteKeyword'])));
	$arr['defLang'] = strip_tags($_POST['defLang']);
	$arr['logoutURL'] = urlencode(strip_tags($_POST['logoutURL']));
	$arr['jsWarn'] = urlencode(stripcslashes($_POST['jsWarn']));
	$arr['clientDisMsg'] = urlencode(stripcslashes($_POST['clientDisMsg']));
	$arr['timezone'] = strip_tags($_POST['timezone']);
	$arr['clientUA'] = strip_tags($_POST['clientUA']);
	$arr['clientVer'] = strip_tags($_POST['clientVer']);
	$arr['appName'] = stripcslashes(strip_tags($_POST['appName']));
	$arr['appShortName'] = stripcslashes(strip_tags($_POST['appShortName']));
	$arr['institutionName'] = stripcslashes(strip_tags($_POST['institutionName']));
	$arr['endtest_page'] = strip_tags($_POST['endtest_page']);
	$arr['addrLine1'] = stripcslashes(strip_tags($_POST['addrLine1']));
	$arr['addrLine2'] = stripcslashes(strip_tags($_POST['addrLine2']));
	$arr['addrLine3'] = stripcslashes(strip_tags($_POST['addrLine3']));
	// $arr['institutionLogo'] = strip_tags($_POST['institutionLogo']);
	$arr['answer_all_questions'] = $answer_all_questions;
	$arr['show_terminate_when_all_answered'] = $show_terminate_when_all_answered;
	$arr['show_save_button'] = $show_save_button;
	$arr['hideExpTest'] = $hideExpTest;
	$arr['PDFResult'] = $PDFResult;
	$arr['pubPageHelp'] = $pubPageHelp;
	$arr['jsonFile'] = $jsonFile;
	$arr['SSGenJSON'] = $SSGenJSON;
	$arr['triggerCacheAllFromServer'] = $triggerCacheAllFromServer;
	$arr['forgotPass'] = $forgotPass;
	$arr['userReg'] = $userReg;
	$arr['enable_langsel'] = $enable_langsel;
	$arr['createAllJsonFileOnStartup'] = $createAllJsonFileOnStartup;
	$arr['cacheFeature'] = $cacheFeature;
	$arr['enable_delay'] = $enable_delay;
	$arr['clearStorageOnLogin'] = $clearStorageOnLogin;
	$arr['chat_feature'] = $chat_feature;
	$arr['display_test_desc'] = $display_test_desc;
	$arr['loginBg'] = strip_tags($_POST['loginBg']);
	$arr['loginBgPosition'] = strip_tags($_POST['loginBgPosition']);
	$arr['defFont'] = strip_tags($_POST['defFont']);
	$arr['logoImg'] = strip_tags($_POST['logoImg']);
	$arr['loginBgSize'] = strip_tags($_POST['loginBgSize']);
	$arr['loginBgBlend'] = strip_tags($_POST['loginBgBlend']);

	$gsfile = K_PATH_MAIN.'shared/config/tmf_general_settings.json';
	chmod($gsfile, 0777);
	$fp = fopen($gsfile, 'w');
	fwrite($fp, serialize($arr));
	// fwrite($fp, json_encode($qblock_arr));
	fclose($fp);
	
	$manifest_arr = array(
		"background_color"=>"white",
		"description"=>strip_tags($_POST['appName']),
		"name"=>stripcslashes(strip_tags($_POST['appName']." - ".$_POST['institutionName'])),
		"short_name"=>stripcslashes(strip_tags($_POST['appShortName']." ".$_POST['institutionName'])),
		"display"=>"standalone",
		"icons" => [
			array(
				"src"=>"android-icon-36x36.png",
				"sizes"=>"36x36",
				"type"=>"image/png",
				"density"=>"0.75"
			),
			array(
				   "src"=>"android-icon-48x48.png",
				   "sizes"=>"48x48",
				   "type"=>"image/png",
				   "density"=>"1.0"
			),
			array(
			   "src"=>"android-icon-72x72.png",
			   "sizes"=>"72x72",
			   "type"=>"image/png",
			   "density"=>"1.5"
			),
			array(
				   "src"=>"android-icon-96x96.png",
				   "sizes"=>"96x96",
				   "type"=>"image/png",
				   "density"=>"2.0"
			),
			array(
				   "src"=>"android-icon-144x144.png",
				   "sizes"=>"144x144",
				   "type"=>"image/png",
				   "density"=>"3.0"
			),
			array(
				   "src"=>"android-icon-192x192.png",
				   "sizes"=>"192x192",
				   "type"=>"image/png",
				   "density"=>"4.0"
			)],
		"start_url"=>K_PATH_HOST.K_PATH_TCEXAM."public/code/index.php?utm_source=homescreen"	
		);
		
	$fpm = fopen(K_PATH_MAIN.'a2hs/site.webmanifest', 'w');
	fwrite($fpm, stripcslashes(json_encode($manifest_arr)));
	fclose($fpm);
	chmod($gsfile, 0444);
}

if(isset($_POST['update-greeting'])){
	$arr = array();
	$arr['enable_greeting'] = $enable_greeting;
	$arr['greetLine1'] = strip_tags($_POST['greetLine1']);
	$arr['greetLine2'] = strip_tags($_POST['greetLine2']);
	
	$grfile = K_PATH_MAIN.'public/config/tmf_greetings.json';
	chmod($grfile, 0777);
	
	$fp = fopen($grfile, 'w');
	fwrite($fp, serialize($arr));
	// fwrite($fp, json_encode($qblock_arr));
	fclose($fp);
	chmod($grfile, 0444);
}

if(isset($_POST['update-addinfologin'])){
	$arr = array();
	$arr['ail_beforefield'] = strip_tags($_POST['ail_beforefield']);
	$arr['ail_afterfield'] = strip_tags($_POST['ail_afterfield']);
	
	$ailfile = K_PATH_MAIN.'public/config/tmf_additional_info_login.json';
	chmod($ailfile, 0777);
	
	$fp = fopen($ailfile, 'w');
	fwrite($fp, serialize($arr));
	// fwrite($fp, json_encode($qblock_arr));
	fclose($fp);
	chmod($ailfile, 0444);
}

if(isset($_POST['update-timerwarning'])){
	$arr = array();
	$arr['almostend1_time'] = strip_tags($_POST['almostend1_time']);
	$arr['almostend1_msg'] = strip_tags($_POST['almostend1_msg']);
	$arr['almostend1_bg'] = strip_tags($_POST['almostend1_bg']);
	$arr['almostend1_col'] = strip_tags($_POST['almostend1_col']);
	$arr['almostend2_time'] = strip_tags($_POST['almostend2_time']);
	$arr['almostend2_msg'] = strip_tags($_POST['almostend2_msg']);
	$arr['almostend2_bg'] = strip_tags($_POST['almostend2_bg']);
	$arr['almostend2_col'] = strip_tags($_POST['almostend2_col']);
	
	$arr['lastsec_msg'] = strip_tags($_POST['lastsec_msg']);
	$arr['lastsec_bg'] = strip_tags($_POST['lastsec_bg']);
	$arr['lastsec_col'] = strip_tags($_POST['lastsec_col']);
	
	$twfile = K_PATH_MAIN.'public/config/tmf_timer_warning.json';
	chmod($twfile, 0777);
	
	$fp = fopen($twfile, 'w');
	fwrite($fp, serialize($arr));
	// fwrite($fp, json_encode($qblock_arr));
	fclose($fp);
	
	chmod($twfile, 0444);
}

if(isset($_POST['update-colorscheme'])){
	$arr = array();
	$arr['enable_ccs'] = $enable_ccs;
	$arr['--link'] = strip_tags($_POST['--link']);
	$arr['--header'] = strip_tags($_POST['--header']);
	$arr['--col-1'] = strip_tags($_POST['--col-1']);
	$arr['--col-1t'] = strip_tags($_POST['--col-1t']);
	$arr['--col-2'] = strip_tags($_POST['--col-2']);
	$arr['--col-2t'] = strip_tags($_POST['--col-2t']);
	$arr['--col-3'] = strip_tags($_POST['--col-3']);
	$arr['--col-3t'] = strip_tags($_POST['--col-3t']);
	$arr['--col-4'] = strip_tags($_POST['--col-4']);
	$arr['--col-4t'] = strip_tags($_POST['--col-4t']);
	$arr['--col-5'] = strip_tags($_POST['--col-5']);
	$arr['--col-5l'] = strip_tags($_POST['--col-5l']);
	$arr['--col-5a'] = strip_tags($_POST['--col-5a']);
	$arr['--col-6'] = strip_tags($_POST['--col-6']);
	$arr['--col-7'] = strip_tags($_POST['--col-7']);
	$arr['--col-7t'] = strip_tags($_POST['--col-7t']);
	$arr['--col-8'] = strip_tags($_POST['--col-8']);
	$arr['--col-9'] = strip_tags($_POST['--col-9']);
	$arr['--col-9t'] = strip_tags($_POST['--col-9t']);
	$arr['--col-10'] = strip_tags($_POST['--col-10']);
	$arr['--col-10t'] = strip_tags($_POST['--col-10t']);
	$arr['--col-11'] = strip_tags($_POST['--col-11']);
	$arr['--col-12'] = strip_tags($_POST['--col-12']);
	$arr['--col-13'] = strip_tags($_POST['--col-13']);
	$arr['--col-14'] = strip_tags($_POST['--col-14']);
	$arr['--col-15'] = strip_tags($_POST['--col-15']);
	$arr['--col-15t'] = strip_tags($_POST['--col-15t']);
	$arr['--bor-1'] = strip_tags($_POST['--bor-1']);
	$arr['--bor-col1'] = strip_tags($_POST['--bor-col1']);
	
	$csfile = K_PATH_MAIN.'public/config/colorscheme.json';
	chmod($csfile, 0777);
	
	$fp = fopen($csfile, 'w');
	fwrite($fp, serialize($arr));
	// fwrite($fp, json_encode($qblock_arr));
	fclose($fp);

	chmod($csfile, 0444);
}
$json = unserialize(file_get_contents(K_PATH_MAIN.'shared/config/tmf_general_settings.json'));
$jsonGreetings = unserialize(file_get_contents(K_PATH_MAIN.'public/config/tmf_greetings.json'));
$lbam = unserialize(file_get_contents(K_PATH_MAIN.'public/config/tmf_additional_info_login.json'));
$tm = unserialize(file_get_contents(K_PATH_MAIN.'public/config/tmf_timer_warning.json'));
$cscheme = unserialize(file_get_contents(K_PATH_MAIN.'public/config/colorscheme.json'));
//var_dump(is_array($json));

echo '<div class="container">'.K_NEWLINE;
echo '<div class="tceformbox">'.K_NEWLINE;
echo '<form action="'.$_SERVER['SCRIPT_NAME'].'" method="POST">';

echo '<fieldset>';
echo '<legend>Site Settings</legend>';
echo getFormRowTextInput('appName', 'Application Description', 'Application Description', '', $json['appName'], '', 255, false, false, false);
echo getFormRowTextInput('appShortName', 'Application Short Description', 'Application Short Description', '', $json['appShortName'], '', 255, false, false, false);
echo getFormRowTextInput('siteName', 'Site Name', 'Site Name', '', urldecode(stripcslashes($json['siteName'])), '', 255, false, false, false);
echo getFormRowTextInput('siteDesc', 'Site Description', 'Site Description', '', urldecode(stripcslashes($json['siteDesc'])), '', 255, false, false, false);
echo getFormRowTextInput('siteAuthor', 'Site Author', 'Site Author', '', urldecode(stripcslashes($json['siteAuthor'])), '', 255, false, false, false);
echo getFormRowTextInput('siteReplyTo', 'Site Reply-to', 'Site Reply-to', '', urldecode(stripcslashes($json['siteReplyTo'])), '', 255, false, false, false);
echo getFormRowTextInput('siteKeyword', 'Site Keyword', 'Site Keyword', '', urldecode(stripcslashes($json['siteKeyword'])), '', 255, false, false, false);
echo getFormRowTextInput('timezone', 'Timezone Setting', 'Timezone Setting', 'Set your own timezone here.<br/>Possible values are listed on:<br/><a href="http://php.net/manual/en/timezones.php">http://php.net/manual/en/timezones.php</a>', $json['timezone'], '', 255, false, false, false);
echo getFormRowTextInput('defLang', 'Default Language', 'Default Language', '2-letters code for default language.<br/><i>example:</i> ar, az, bg, br, cn, de, el, en, es, fa, fr, he, hi, hu, id, it, jp, mr, ms, nl, pl, ro, ru, tr, ur, vn', $json['defLang'], '', 255, false, false, false);
echo getFormRowCheckBox('enable_langsel', 'Enable Language Selector', 'If enable, show language selector on top right of the page<br/><i>default value: enable</i>', 'If enable, show language selector on top right of the page<br/><i>default value: enable</i>', 1, $json['enable_langsel'], false, '');
echo getFormRowCheckBox('pubPageHelp', 'Public Page Help', 'If enable, display page help on the bottom of the page. default value: disable', 'If enable, display page help on the bottom of the page.<br/><i>default value: disable</i>', 1, $json['pubPageHelp'], false, '');
echo getFormRowCheckBox('forgotPass', 'Show Forgot Password Link', 'If enable, show link to reset user password<br/><i>default value: enable</i>', 'If enable, show link to reset user password<br/><i>default value: enable</i>', 1, $json['forgotPass'], false, '');
echo getFormRowCheckBox('userReg', 'Enable Self Registration', 'If enable, show self registration link<br/><i>default value: enable</i>', 'If enable, show self registration link<br/><i>default value: enable</i>', 1, $json['userReg'], false, '');
echo getFormRowTextInput('logoutURL', 'Logout URL', 'Logout URL', 'URL to be redirected at logout.<br/>Can be relative or absolute URL.<br/>example:<br/><a href="#">logout.html</a>, <a href="#">../../logout.html</a>, <a href="https://xamzonelinux.blogspot.com" target="blank">https://xamzonelinux.blogspot.com</a><br/>(leave empty for default).', urldecode($json['logoutURL']), '', 255, false, false, false);

echo '<div class="row">'.K_NEWLINE;
echo '<span class="label">'.K_NEWLINE;
echo '<label for="defFont">Global Font</label>'.K_NEWLINE;
echo '</span>'.K_NEWLINE;
echo '<span class="formw">'.K_NEWLINE;
echo '<select name="defFont" id="defFont" size="0">'.K_NEWLINE;
// echo '<option value="System Default">System Default</option>'.K_NEWLINE;
foreach(glob(K_PATH_MAIN.'fonts/external/*') as $filename){
	// echo $filename;
	echo '<option value="'.basename($filename).'" ';
	if(basename($filename)===$json['defFont']){
		echo ' selected="selected"';
	}
	echo '>'.basename($filename).'</option>'.K_NEWLINE;
}

// $listFonts = array('System Default','Roboto','OpenSans');
// echo '<option value=""></option>'.K_NEWLINE;
/* foreach($listFonts as $key => $value){
	echo '<option value="'.$value.'" ';
	if($value===$json['defFont']){
		echo ' selected="selected"';
	}
	echo '>'.$value.'</option>'.K_NEWLINE;
} */

echo '</select>'.K_NEWLINE;
echo '<span class="labeldesc">System Default font is less consistent across device, because each user may change default font. For consistent look you can choose non-system default provided here.<br/><br/>If you paste the text from Microsoft Word, it may contain non-websafe font like Symbol or Wingdings. This font may unreadable correctly if the test taker access the test from non-Microsoft platform, like Android. To solve this problem, please provide font Symbol or Wingdings, and put on <b>fonts</b> directory. The Symbol font must be renamed to: <b><u>symbol.ttf</u></b>, and the Wingdings font must be renamed to: <b><u>wingdings.ttf</u></b>.<br/><br/>Sorry, we are not provide this font because of licensing term.</span></span>'.K_NEWLINE;
echo '</div>'.K_NEWLINE;
// $field_name, $name, $description = '', $value = '', $disabled = false, $prefix = ''
echo getFormRowTextBox('jsWarn', 'Javascript Warning if disabled (you can use HTML tag)', 'Javascript Warning', urldecode(stripcslashes($json['jsWarn'])), false, '');
echo getFormRowTextInput('clientUA', 'Client User Agent', 'Client User Agent', 'Leave empty to accept all client user agent', $json['clientUA'], '', 255, false, false, false);
echo getFormRowTextInput('clientVer', 'Client Min. Ver', 'Client Min. Ver', 'Minimum version of client browser.<br/>eg: if you intended your client access the site from Chrome ver. 61 or higher, please type 60 in this form', $json['clientVer'], '', 255, false, false, false);
echo getFormRowTextBox('clientDisMsg', 'Message if client blocked (you can use HTML tag)', 'Message if client blocked (you can use HTML tag)', urldecode(stripcslashes($json['clientDisMsg'])), false, '');
echo '</fieldset>';

echo '<fieldset>';
echo '<legend class="bg-indigo">Institution Data</legend>';
echo getFormRowTextInput('institutionName', 'Institution Name', 'Institution Name', '', stripcslashes($json['institutionName']), '', 255, false, false, false);
echo getFormRowTextInput('addrLine1', 'Address Line 1', 'Address Line 1', '', $json['addrLine1'], '', 255, false, false, false);
echo getFormRowTextInput('addrLine2', 'Address Line 2', 'Address Line 2', '', $json['addrLine2'], '', 255, false, false, false);
echo getFormRowTextInput('addrLine3', 'Address Line 3', 'Address Line 3', '', $json['addrLine3'], '', 255, false, false, false);
// echo getFormRowTextInput('institutionLogo', 'Institution Logo', 'Institution Logo', '', $json['institutionLogo'], '', 255, false, false, false);

echo '<div class="row">'.K_NEWLINE;
echo '<span class="label">'.K_NEWLINE;
echo '<label for="logoImg">Logo Image</label>'.K_NEWLINE;
echo '</span>'.K_NEWLINE;
echo '<span class="formw">'.K_NEWLINE;
echo '<select name="logoImg" id="logoImg" size="0">'.K_NEWLINE;
foreach(glob(K_PATH_CACHE.'logo/*') as $filename){
	echo '<option value="'.basename($filename).'" ';
	if(basename($filename)===$json['logoImg']){
		echo ' selected="selected"';
	}
	echo '>'.basename($filename).'</option>'.K_NEWLINE;
	// echo basename($filename);
}
echo '</select>'.K_NEWLINE;
echo '<span class="labeldesc">upload your institution logo image from <a href="tce_filemanager.php?d='.urlencode(K_PATH_CACHE).'logo%2F&v=1" target="blank">File Manager</a></span></span>'.K_NEWLINE;
echo '</div>'.K_NEWLINE;

echo '</fieldset>';
echo '<fieldset>';
echo '<legend class="bg-purple">Test Settings</legend>';
echo getFormRowCheckBox('answer_all_questions', 'Answer all questions', 'If enable all questions must be answered before stopping the test. <i>default value: enable</i>', 'If enable all questions must be answered before stopping the test. <i>default value: enable</i>', 1, $json['answer_all_questions'], false, '');
echo getFormRowCheckBox('show_terminate_when_all_answered', 'Show Terminate button only when all answered', 'If enable, show terminate button only when all question has been marked answered.<br/><i>default value: disable</i>', 'If enable, show terminate button only when all question has been marked answered.<br/><i>default value: disable</i>', 1, $json['show_terminate_when_all_answered'], false, '');
echo getFormRowCheckBox('show_save_button', 'Show Save Button', 'If enable, show save button below question navigation.<br/><i>default value: enable</i>', 'If enable, show save button below question navigation.<br/><i>default value: enable</i>', 1, $json['show_save_button'], false, '');
echo getFormRowCheckBox('display_test_desc', 'Test Description', 'If enable show test description before executing the test.<br/><i>default value: enable</i>', 'If enable show test description before executing the test.<br/><i>default value: enable</i>', 1, $json['display_test_desc'], false, '');
echo getFormRowCheckBox('hideExpTest', 'Hide Expired Test', 'If enable hide expired test.<br/><i>default value: disable</i>', 'If enable hide expired test.<br/><i>default value: disable</i>', 1, $json['hideExpTest'], false, '');
echo getFormRowCheckBox('PDFResult', 'PDF Result', 'If enable, user can export result test to PDF.<br/><i>default value: enable</i>', 'If enable, user can export result test to PDF.<br/><i>default value: enable</i>', 1, $json['PDFResult'], false, '');
echo getFormRowTextInput('endtest_page', 'Custom page after user stopping test', 'Custom page after user stopping test', 'leave empty to default', $json['endtest_page'], '', 255, false, false, false);

// echo getFormRowCheckBox('fileUpload', 'File Upload', 'If enable, add ability to upload specific file on text question type', 'If enable, add ability to upload specific file on text question type', 1, $json['fileUpload'], false, '');
echo '</fieldset>';

echo '<fieldset>';
echo '<legend class="bg-teal">Login Background</legend>';
echo getFormRowTextInput('loginBg', 'Login Background Image', 'Login Background Image', 'Can be path to image or image URL Address. Leave blank to disable.<br/>Example: https://source.unsplash.com/lI1z94nf0RM/1600x900<br/>or ../../images/background.jpg', $json['loginBg'], '', 255, false, false, false);

// echo getFormRowTextInput('loginBgPosition', 'Position', 'Position', '', $json['loginBgPosition'], '', 255, false, false, false);
echo '<div class="row">'.K_NEWLINE;
echo '<span class="label">'.K_NEWLINE;
echo '<label for="loginBgPosition">Position</label>'.K_NEWLINE;
echo '</span>'.K_NEWLINE;
echo '<span class="formw">'.K_NEWLINE;
echo '<select name="loginBgPosition" id="loginBgPosition" size="0">'.K_NEWLINE;
$loginBgPosition = array('bottom','center','left','right','top','revert','unset','inherit','initial');
// echo '<option value=""></option>'.K_NEWLINE;
foreach($loginBgPosition as $key => $value){
	echo '<option value="'.$value.'" ';
	if($value===$json['loginBgPosition']){
		echo ' selected="selected"';
	}
	echo '>'.$value.'</option>'.K_NEWLINE;
}
echo '</select>'.K_NEWLINE;
echo '</span>'.K_NEWLINE;
echo '</div>'.K_NEWLINE;

// echo getFormRowTextInput('loginBgSize', 'Size', 'Size', '', $json['loginBgSize'], '', 255, false, false, false);
echo '<div class="row">'.K_NEWLINE;
echo '<span class="label">'.K_NEWLINE;
echo '<label for="loginBgSize">Size</label>'.K_NEWLINE;
echo '</span>'.K_NEWLINE;
echo '<span class="formw">'.K_NEWLINE;
echo '<select name="loginBgSize" id="loginBgSize" size="0">'.K_NEWLINE;
$loginBgSize = array('auto','contain','cover','inherit','initial','revert','unset');
// echo '<option value=""></option>'.K_NEWLINE;
foreach($loginBgSize as $key => $value){
	echo '<option value="'.$value.'" ';
	if($value===$json['loginBgSize']){
		echo ' selected="selected"';
	}
	echo '>'.$value.'</option>'.K_NEWLINE;
}
echo '</select>'.K_NEWLINE;
echo '</span>'.K_NEWLINE;
echo '</div>'.K_NEWLINE;

// echo getFormRowTextInput('loginBgBlend', 'Blending Mode', 'Blending Mode', '', $json['loginBgBlend'], '', 255, false, false, false);

echo '<div class="row">'.K_NEWLINE;
echo '<span class="label">'.K_NEWLINE;
echo '<label for="loginBgBlend">Blend Mode</label>'.K_NEWLINE;
echo '</span>'.K_NEWLINE;
echo '<span class="formw">'.K_NEWLINE;
echo '<select name="loginBgBlend" id="loginBgBlend" size="0">'.K_NEWLINE;
$blendMode = array('color','color-burn','color-dodge','darken','difference','exclusion','hard-light','hue','inherit','initial','lighten','luminosity','multiply','normal','overlay','revert','saturation','screen','soft-light','unset');
// echo '<option value=""></option>'.K_NEWLINE;
foreach($blendMode as $key => $value){
	echo '<option value="'.$value.'" ';
	if($value===$json['loginBgBlend']){
		echo ' selected="selected"';
	}
	echo '>'.$value.'</option>'.K_NEWLINE;
}
echo '</select>'.K_NEWLINE;
echo '</span>'.K_NEWLINE;
echo '</div>'.K_NEWLINE;
echo '</fieldset>';

echo '<fieldset>';
echo '<legend class="bg-dark">Performance</legend>';
// SSGenJSON
echo getFormRowCheckBox('SSGenJSON', 'Create JSON File on Server Side', 'If enable, server generate all question (testlogid) in JSON File on first question load. It also help other features below.<br/><i>default value: enable</i>', 'If enable, server generate all question (testlogid) in JSON File on first question load. It also help other features below.<br/><i>default value: disable</i>', 1, $json['SSGenJSON'], false, '');
echo getFormRowCheckBox('triggerCacheAllFromServer', 'Triggering Cache All From Server', 'Triggering load all cache after generating JSON File from server side<br/><i>default value: disable</i>', 'Triggering load all cache after generating JSON File from server side<br/><i>default value: disable</i>', 1, $json['triggerCacheAllFromServer'], false, '');
echo getFormRowCheckBox('jsonFile', 'Create JSON File', 'If enable, all displayed question will be stored in JSON File for faster loading in the next time. This JSON File triggered from client side when question has been displayed. If the JSON File was created before, then it will cache question block in client device on second visit if Cache Feature below enabled.<br/><i>default value: enable</i>', 'If enable, all displayed question will be stored in JSON File for faster loading in the next time. This JSON File triggered from client side when question has been displayed. If the JSON File was created before, then it will cache question block in client device on second visit if Cache Feature below enabled.<br/><i>default value: disable</i>', 1, $json['jsonFile'], false, '');
echo getFormRowCheckBox('createAllJsonFileOnStartup', 'Create JSON File on Startup (Cache All Question Block)', 'If enable, all question in current test will be stored in JSON File when first question load on client side. If JSON File was created before, then it will cache all question in client device if Cache Feature below enabled. WARNING! This feature will request all testlogid on first load question on client side through AJAX. It will increase client-server network usage.<br/><i>default value: enable</i>', 'If enable, all question in current test will be stored in JSON File when first question load on client side. If JSON File was created before, then it will cache all question in client device if Cache Feature below enabled. WARNING! This feature will request all testlogid on first load question on client side through AJAX. It will increase client-server network usage.<br/><i>default value: disable</i>', 1, $json['createAllJsonFileOnStartup'], false, '');
echo getFormRowCheckBox('cacheFeature', 'Cache Feature', 'If enable, browser will cache the question block, so user can navigate question in offline mode.<br/><i>default value: enable</i>', 'If enable, browser will cache the question block, so user can navigate question in offline mode. Cache Feature may use a lot of user\'s storage depend on the amount of questions size. To use this feature, make sure your site protocol is HTTPS and warn your user to spare diskspace if you enable this feature.<br/><i>default value: disable</i>', 1, $json['cacheFeature'], false, '');
echo getFormRowCheckBox('clearStorageOnLogin', 'Clear Local Storage on Login', 'If enable, local storage and cache storage will be cleared on login screen page.<br/><i>default value: enable</i>', 'If enable, local storage and cache storage will be cleared on login screen page.<br/><i>default value: enable</i>', 1, $json['clearStorageOnLogin'], false, '');
echo getFormRowCheckBox('enable_delay', 'Enable delay before starting test', 'If enable, add some random delay before executing new test.<br/><i>default value: disable</i>', 'If enable, add some random delay before executing new test.<br/><i>default value: disable</i>', 1, $json['enable_delay'], false, '');
echo '</fieldset>';

echo '<fieldset>';
echo '<legend class="bg-red">Chat Feature (Experimental)</legend>';
echo getFormRowCheckBox('chat_feature', 'Chat Feature', 'Chat Feature', '<i>default value: disable</i>', 1, $json['chat_feature'], false, '');
echo '</fieldset>';

echo '<div class="row jc-center">';
F_submit_button('update', $l['w_update'].'" class="bg-dark mb-10" style="width:100%', $l['h_update']);
echo '</div>';
echo F_getCSRFTokenField().K_NEWLINE;
echo '</form>';

echo '<form action="'.$_SERVER['SCRIPT_NAME'].'" method="POST">';
echo '<fieldset>';
echo '<legend class="bg-teal">After Login Greeting</legend>';
echo getFormRowCheckBox('enable_greeting', 'Enable Greeting', 'Enable Greeting', '<i>default value: disable</i>', 1, $jsonGreetings['enable_greeting'], false, '');
echo getFormRowTextInput('greetLine1', 'Greeting Line 1', 'Greeting Line 1', '', $jsonGreetings['greetLine1'], '', 255, false, false, false);
echo getFormRowTextInput('greetLine2', 'Greeting Line 2', 'Greeting Line 2', '', $jsonGreetings['greetLine2'], '', 255, false, false, false);
echo '</fieldset>';
echo '<div class="row jc-center">';
F_submit_button('update-greeting', $l['w_update'].'" class="bg-teal mb-10" style="width:100% ', $l['h_update']);
echo '</div>';
echo F_getCSRFTokenField().K_NEWLINE;
echo '</form>';

echo '<form action="'.$_SERVER['SCRIPT_NAME'].'" method="POST">';
echo '<fieldset>';
echo '<legend class="bg-indigo">Login Box Additional Message</legend>';
echo getFormRowTextInput('ail_beforefield', 'Message before Login Field', 'Message before Login Field', 'Leave blank to disable', $lbam['ail_beforefield'], '', 255, false, false, false);
echo getFormRowTextInput('ail_afterfield', 'Message after Login Field', 'Message after Login Field', 'Leave blank to disable', $lbam['ail_afterfield'], '', 255, false, false, false);
echo '</fieldset>';
echo '<div class="row jc-center">';
F_submit_button('update-addinfologin', $l['w_update'].'" class="bg-indigo mb-10" style="width:100%', $l['h_update']);
echo '</div>';
echo F_getCSRFTokenField().K_NEWLINE;
echo '</form>';

echo '<form action="'.$_SERVER['SCRIPT_NAME'].'" method="POST">';
echo '<fieldset>';
echo '<legend class="bg-yellow ft-black">Timer Warning</legend>';
echo getFormRowTextInput('almostend1_time', 'Show first warning on', 'Show first warning on', 'last minute', $tm['almostend1_time'], '', 255, false, false, false);
echo getFormRowTextInput('almostend1_msg', 'First warning message', 'First warning message', 'Leave blank to disable', $tm['almostend1_msg'], '', 255, false, false, false);
echo getFormRowTextInput('almostend1_bg', 'First warning background color', 'First warning background color', 'Leave blank to disable', $tm['almostend1_bg'], '', 255, false, false, false);
echo getFormRowTextInput('almostend1_col', 'First warning text color', 'First warning text color', 'Leave blank to disable', $tm['almostend1_col'], '', 255, false, false, false);

echo getFormRowTextInput('almostend2_time', 'Show second warning on', 'Show second warning on', 'last minute', $tm['almostend2_time'], '', 255, false, false, false);
echo getFormRowTextInput('almostend2_msg', 'Second warning message', 'Second warning message', 'Leave blank to disable', $tm['almostend2_msg'], '', 255, false, false, false);
echo getFormRowTextInput('almostend2_bg', 'Second warning background color', 'Second warning background color', 'Leave blank to disable', $tm['almostend2_bg'], '', 255, false, false, false);
echo getFormRowTextInput('almostend2_col', 'Second warning text color', 'Second warning text color', 'Leave blank to disable', $tm['almostend2_col'], '', 255, false, false, false);
echo getFormRowTextInput('lastsec_msg', '10 last second message', '10 last second message', 'Leave blank to disable', $tm['lastsec_msg'], '', 255, false, false, false);
echo getFormRowTextInput('lastsec_bg', '10 last second background color', '10 last second background color', 'Leave blank to disable', $tm['lastsec_bg'], '', 255, false, false, false);
echo getFormRowTextInput('lastsec_col', '10 last second text color', '10 last second text color', 'Leave blank to disable', $tm['lastsec_col'], '', 255, false, false, false);
echo '</fieldset>';
echo '<div class="row jc-center">';
F_submit_button('update-timerwarning', $l['w_update'].'" class="ft-black mb-10" style="width:100%;background:#fbc02d', $l['h_update']);
echo '</div>';
echo F_getCSRFTokenField().K_NEWLINE;
echo '</form>';


echo '<form action="'.$_SERVER['SCRIPT_NAME'].'" method="POST">';
echo '<fieldset>';
echo '<legend class="ft-black" style="background:red;background:-webkit-linear-gradient(left, #f8bbd0, #fff59d, #b2ebf2);background:-o-linear-gradient(right, #f8bbd0, #fff59d, #b2ebf2);background:-moz-linear-gradient(right, #f8bbd0, #fff59d, #b2ebf2);background:linear-gradient(to right, #f8bbd0, #fff59d, #b2ebf2)">Custom Color Scheme for Public</legend>';
echo getFormRowCheckBox('enable_ccs', 'Enable', 'Enable', '<i>default value: disable</i>', 1, $cscheme['enable_ccs'], false, '');	
echo getFormRowTextInput('--header', 'Header Color', 'Header Color', '', $cscheme['--header'], '', 255, false, false, 'color');
echo getFormRowTextInput('--link', 'Link Color', 'Link Color', '', $cscheme['--link'], '', 255, false, false, 'color');
echo getFormRowTextInput('--col-1', 'Color 1', 'Color 1', 'Primary Color', $cscheme['--col-1'], '', 255, false, false, 'color');
echo getFormRowTextInput('--col-2', 'Color 2', 'Color 2', '', $cscheme['--col-2'], '', 255, false, false, 'color');
echo getFormRowTextInput('--col-3', 'Color 3', 'Color 3', '', $cscheme['--col-3'], '', 255, false, false, 'color');
echo getFormRowTextInput('--col-4', 'Color 4', 'Color 4', '', $cscheme['--col-4'], '', 255, false, false, 'color');
echo getFormRowTextInput('--col-5', 'Color 5', 'Color 5', '', $cscheme['--col-5'], '', 255, false, false, 'color');
echo getFormRowTextInput('--col-5l', 'Color 5l', 'Color 5l', '', $cscheme['--col-5l'], '', 255, false, false, 'color');
echo getFormRowTextInput('--col-5a', 'Color 5a', 'Color 5a', '', $cscheme['--col-5a'], '', 255, false, false, 'color');
echo getFormRowTextInput('--col-6', 'Color 6', 'Color 6', '', $cscheme['--col-6'], '', 255, false, false, 'color');
echo getFormRowTextInput('--col-7', 'Color 7', 'Color 7', '', $cscheme['--col-7'], '', 255, false, false, 'color');
echo getFormRowTextInput('--col-8', 'Color 8', 'Color 8', '', $cscheme['--col-8'], '', 255, false, false, 'color');
echo getFormRowTextInput('--col-9', 'Color 9', 'Color 9', '', $cscheme['--col-9'], '', 255, false, false, 'color');
echo getFormRowTextInput('--col-10', 'Color 10', 'Color 10', '', $cscheme['--col-10'], '', 255, false, false, 'color');
echo getFormRowTextInput('--col-11', 'Color 11', 'Color 11', '', $cscheme['--col-11'], '', 255, false, false, 'color');
echo getFormRowTextInput('--col-12', 'Color 12', 'Color 12', '', $cscheme['--col-12'], '', 255, false, false, 'color');
echo getFormRowTextInput('--col-13', 'Color 13', 'Color 13', '', $cscheme['--col-13'], '', 255, false, false, 'color');
echo getFormRowTextInput('--col-14', 'Color 14', 'Color 14', '', $cscheme['--col-14'], '', 255, false, false, 'color');
echo getFormRowTextInput('--col-15', 'Color 15', 'Color 15', '', $cscheme['--col-15'], '', 255, false, false, 'color');
echo getFormRowTextInput('--bor-1', 'Border Color', 'Border Color', '', $cscheme['--bor-1'], '', 255, false, false, 'color');
echo '<input type="hidden" id="--col-1t" name="--col-1t" value="'.$cscheme['--col-1'].'33"/>';
echo '<input type="hidden" id="--col-2t" name="--col-2t" value="'.$cscheme['--col-2'].'33"/>';
echo '<input type="hidden" id="--col-3t" name="--col-3t" value="'.$cscheme['--col-3'].'33"/>';
echo '<input type="hidden" id="--col-4t" name="--col-4t" value="'.$cscheme['--col-4'].'33"/>';
echo '<input type="hidden" id="--col-7t" name="--col-7t" value="'.$cscheme['--col-7'].'33"/>';
echo '<input type="hidden" id="--col-9t" name="--col-9t" value="'.$cscheme['--col-9'].'33"/>';
echo '<input type="hidden" id="--col-9t" name="--col-9t" value="'.$cscheme['--col-9'].'33"/>';
echo '<input type="hidden" id="--col-10t" name="--col-10t" value="'.$cscheme['--col-10'].'33"/>';
echo '<input type="hidden" id="--col-15t" name="--col-15t" value="'.$cscheme['--col-15'].'33"/>';
echo '<input type="hidden" id="--bor-col1" name="--bor-col1" value="'.$cscheme['--bor-1'].'"/>';

echo '</fieldset>';
echo '<div class="row jc-center">';
F_submit_button('update-colorscheme', $l['w_update'].'" class="ft-black mb-10" style="width:100%;background:red;background:-webkit-linear-gradient(left, #f8bbd0, #fff59d, #b2ebf2);background:-o-linear-gradient(right, #f8bbd0, #fff59d, #b2ebf2);background:-moz-linear-gradient(right, #f8bbd0, #fff59d, #b2ebf2);background:linear-gradient(to right, #f8bbd0, #fff59d, #b2ebf2)', $l['h_update']);
echo '</div>';
echo F_getCSRFTokenField().K_NEWLINE;
echo '</form>';


echo '</div>';
echo '</div>';


require_once('../code/tce_page_footer.php');

// echo ''.K_NEWLINE;

// echo '</script>'.K_NEWLINE;

?>