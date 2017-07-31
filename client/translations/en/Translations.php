<?php
/*
 * Edit this file only in UTF-8 format
 *
 */
class Translations {

    static $trans = null;

    public function translations(){
    // Terms of authentication pages
        self::$trans["authentication"]["MY_VHL"] = 'My VHL';
        self::$trans["authentication"]["MY_VHL_SUMMARY"] = '
<p>The My VHL service records users\' information and search preferences in the VHL Network databases, providing personalized services to VHL users.</p>
<p>This means you can:</p>
<ul>
    <li>Select documents of interest</li>
    <li>Create your own collection</li>
    <li>Access documents related to topics of your interest</li>
    <li>Save the history of searches performed in the VHL</li>
    <li>Organize links to your favorite sites</li>
    <li>Access your publications through ORCID</li>
    <li>Have your own space/dashboard to save all your search preferences</li>
</ul>
<p>Have free access to My VHL\'s information products and services. <a href="javascript:;" class="decor" data-toggle="modal" data-target=".bs-modal-lg">Read more</a></p>';
        self::$trans["authentication"]["MY_VHL_DESCRIPTION"] = '
<h4>Overview of My VHL</h4>
<p>The My VHL service records users\' information and search preferences in the VHL Network databases, providing personalized services to VHL users.</p>
<p>This means you can:</p>
<ul>
    <li>Select documents of interest</li>
    <li>Create your own collection</li>
    <li>Access documents related to topics of your interest</li>
    <li>Save the history of searches performed in the VHL</li>
    <li>Organize links to your favorite sites</li>
    <li>Access your publications through ORCID</li>
    <li>Have your own space/dashboard to save all your search preferences</li>
</ul>';
        self::$trans["authentication"]["NOTICE"] = 'Are you new here?';
        self::$trans["authentication"]["BUTTON_CLOSE"] = 'Close';
        self::$trans["authentication"]["RECOVER_ACCOUNTS"] = 'If you are part of the BVS Network as a Cooperating Center and are already registered with BIREME Accounts as a user of the FI-Admin Information Sources Administration System, click on the link below and recover your password.';
        self::$trans["authentication"]["RECOVER_ACCOUNTS_LINK"] = 'Reset the FI-ADMIN user password';
        self::$trans["authentication"]["RECOVER_PASSWORD"] = 'If you are a regular user and want to use the My VHL service and forgot your password, click the link below to redefine it.';
        self::$trans["authentication"]["RECOVER_PASSWORD_LINK"] = 'Reset your password';
        self::$trans["authentication"]["TITLE"] = 'User Authentication';
        self::$trans["authentication"]["NOREGISTRY"] = 'New users registration temporarily unavailable';
        self::$trans["authentication"]["EMAIL"] = 'e-mail';
        self::$trans["authentication"]["HOME"] = 'home';
        self::$trans["authentication"]["LOGIN_FIELD"] = 'e-mail or user';
        self::$trans["authentication"]["LOGIN"] = 'Sign in';
        self::$trans["authentication"]["USER"] = 'user';
        self::$trans["authentication"]["PASSWORD"] = 'password';
        self::$trans["authentication"]["PRESS_HERE"] = 'click here';
        self::$trans["authentication"]["INVALID_LOGIN"] = 'password/user not valid';
        self::$trans["authentication"]["INVALID_LOGIN_MAIL"] = '
<div>Authentication Failure</div>
<ol>
<li>Try to authenticate with your "SciELO login"</li>
<li>Use "remember password" function</li>
<li>Create a new account</li>
<li>Ask for help, HELP_FORM</li>
</ol>
';
        self::$trans["authentication"]["INVALID_LOGIN_UNAME"] = '
<div>Authentication Failure</div>
<ol>
<li>Try to authenticate with your e-mail</li>
<li>Use "remember password" function</li>
<li>Create a new account</li>
<li>Ask for help, HELP_FORM</li>
</ol>
';
        self::$trans["authentication"]["BIREME_LOGIN_LDAP"] = 'Use the user and password from BIREME network';
        self::$trans["authentication"]["FORGOT_MY_PASSWORD"] = 'Forgot password?';
        self::$trans["authentication"]["REGISTRY"] = 'Register yourself';
        self::$trans["authentication"]["HELPLOGINMESSAGE"] = 'From now on, personalized services are integrated through the password to access the VHL and SciELO network. The SciELO login is valid for this authentication.';
        self::$trans["authentication"]["KNOWMORE"] = 'Learn more';
        self::$trans["authentication"]["ACCESS_DENIED"] = 'Access denied';
        self::$trans["authentication"]["OR"] = 'or';
        self::$trans["authentication"]["LOGIN_WITH"] = 'Sign in with';
        self::$trans["authentication"]["LOGIN_MESSAGE"] = 'Sign in to My VHL';
        self::$trans["authentication"]["LOGIN_ACCESS_MESSAGE"] = 'Access directly to My VHL';

    // Terms of the Request Authentication Page
        self::$trans["requestauth"]["LOGIN"] = 'Sign in';
        self::$trans["requestauth"]["FOR_SERVICES"] = 'for services<br />on demand';
        self::$trans["requestauth"]["NOREGISTRY"] = 'New users registration temporarily unavailable';

    // Terms of the new password page
        self::$trans["new_pass"]["TITLE"] = 'Send password by e-mail';
        self::$trans["new_pass"]["LOGIN"] = 'Sign in';
        self::$trans["new_pass"]["SUBMIT"] = 'send';
        self::$trans["new_pass"]["CANCEL"] = 'cancel';

    // Terms of the menu pages
        self::$trans["menu"]["FEATURE"] = 'Overview';
        self::$trans["menu"]["MY_VHL"] = 'My VHL';
        self::$trans["menu"]["SERVPLAT"] = 'Service Platform';
        self::$trans["menu"]["DASHBOARD"] = 'My Content';
        self::$trans["menu"]["HOME"] = 'Overview';
        self::$trans["menu"]["WELCOME"] = 'Welcome';
        self::$trans["menu"]["USERS_SERVICES"] = 'Custom Services';
        self::$trans["menu"]["OLA"] = 'Hello';
        self::$trans["menu"]["LOGOUT"] = 'Sign out';
        self::$trans["menu"]["MY_PROFILE_DOCUMENTS"] = 'Temas de Interesse';
        self::$trans["menu"]["MY_SHELF"] = 'Favorite Documents';
        self::$trans["menu"]["MY_LINKS"] = 'Favorite Links';
        self::$trans["menu"]["MY_NEWS"] = 'My News';
        self::$trans["menu"]["FORGOT_MY_PASSWORD"] = 'I forgot my password';
        self::$trans["menu"]["CHANGE_PASSWORD"] = 'Change Password';
        self::$trans["menu"]["MY_DATA"] = 'Edit Profile';
        self::$trans["menu"]["MY_ALERTS"] = 'My Alerts';
        self::$trans["menu"]["SEARCH"] = 'Search';
        self::$trans["menu"]["SEARCH_FOR"] = 'Search for...';
        self::$trans["menu"]["MY_SEARCHES"] = 'VHL Search History';
        self::$trans["menu"]["KEYWORDS"] = 'Keywords';
        self::$trans["menu"]["SUGGESTED_DOCS"] = 'Related Documents';
        self::$trans["menu"]["ORCID_WORKS"] = 'ORCID - My Publications';
        self::$trans["menu"]["RECENT_ACTIVITIES"] = 'Recent Activities';
        self::$trans["menu"]["SEE_ALL_DOCS"] = 'View all documents';
        self::$trans["menu"]["SEE_ALL_LINKS"] = 'View all links';
        self::$trans["menu"]["SEE_ALL_PROFILES"] = 'View all topics';
        self::$trans["menu"]["ADD_COLLECTION"] = 'Collection added';
        self::$trans["menu"]["UPDATE_COLLECTION"] = 'Collection updated';
        self::$trans["menu"]["REMOVE_COLLECTION"] = 'Collection removed';
        self::$trans["menu"]["ADD_PROFILE"] = 'Topic added';
        self::$trans["menu"]["UPDATE_PROFILE"] = 'Topic updated';
        self::$trans["menu"]["REMOVE_PROFILE"] = 'Topic removed';
        self::$trans["menu"]["ADD_LINK"] = 'Link adicionado';
        self::$trans["menu"]["UPDATE_LINK"] = 'Link updated';
        self::$trans["menu"]["REMOVE_LINK"] = 'Link removed';
        self::$trans["menu"]["QUERY"] = 'Query';
        self::$trans["menu"]["VIEW"] = 'Display';
        self::$trans["menu"]["SEARCH_WIDGET"] = 'VHL Search';
        self::$trans["menu"]["PROFILE_WIDGET"] = 'Topics of Interest';
        self::$trans["menu"]["SHELF_WIDGET"] = 'Favorite Documents';
        self::$trans["menu"]["START_TOUR"] = 'Start Tour';
        self::$trans["menu"]["NEXT_PAGE"] = 'Next feature';
        self::$trans["menu"]["BACK"] = '&larr; Back';
        self::$trans["menu"]["NEXT"] = 'Next &rarr;';
        self::$trans["menu"]["SKIP"] = 'Skip';
        self::$trans["menu"]["DONE"] = 'Finish';
        self::$trans["menu"]["FOOTER_MESSAGE"] = '
<p><strong>BIREME - PAHO - WHO</strong><br/>
Latin American and Caribbean Center on Health Sciences Information<br />
Knowledge Management, Bioethics and Research Area - KBR<br />
Rua Vergueiro, 1759 | cep: 04101-000 | São Paulo - SP | Phone: (55 11) 5576-9800 | Fax: (55 11) 5575-8868<br />
<a href="http://new.paho.org/bireme" title="My VHL">http://www.paho.org/bireme</a><br /></p>
';

    // Terms of mysearches pages
        self::$trans["mysearches"]["FEATURE"] = 'VHL Search History';
        self::$trans["mysearches"]["MY_SEARCHES"] = 'VHL Search History';
        self::$trans["mysearches"]["PAGE"] = 'Page';
        self::$trans["mysearches"]["MY_SEARCHES_NO_REGISTERS_FOUND"] = 'No registers found';
        self::$trans["mysearches"]["NEXT"] = 'Next';
        self::$trans["mysearches"]["PREVIOUS"] = 'Previous';
        self::$trans["mysearches"]["QUERY"] = 'Query';
        self::$trans["mysearches"]["FILTERS"] = 'Filters';
        self::$trans["mysearches"]["ACTIONS"] = 'Actions';
        self::$trans["mysearches"]["VIEW"] = 'Display';
        self::$trans["mysearches"]["COMBINE"] = 'Combine';
        self::$trans["mysearches"]["ORIGIN_SITE"] = 'Initial site';
        self::$trans["mysearches"]["BRASIL"] = 'VHL Brazil';

    // Terms of suggesteddocs pages
        self::$trans["suggesteddocs"]["FEATURE"] = 'Similars';
        self::$trans["suggesteddocs"]["PAGE"] = 'Page';
        self::$trans["suggesteddocs"]["NEXT"] = 'Next';
        self::$trans["suggesteddocs"]["PREVIOUS"] = 'Previous';
        self::$trans["suggesteddocs"]["SUGGESTED_DOCS"] = 'Related Documents';
        self::$trans["suggesteddocs"]["SUGGESTED_DOCS_NO_REGISTERS_FOUND"] = 'No suggested documents';
        self::$trans["suggesteddocs"]["REFERENCE"] = 'Choose reference documents for suggestions:';
        self::$trans["suggesteddocs"]["NO_REFERENCES"] = 'No documents found with this reference';
        self::$trans["suggesteddocs"]["ADD_COLLECTION"] = 'Add to Favorites';
        self::$trans["suggesteddocs"]["CONFIG"] = 'Settings';
        self::$trans["suggesteddocs"]["DOCS"] = 'Documents';
        self::$trans["suggesteddocs"]["DOCS_SOURCE"] = 'Source of documents';
        self::$trans["suggesteddocs"]["ORCID"] = 'ORCID - My Publications';
        self::$trans["suggesteddocs"]["COLLECTIONS"] = 'Favorite Documents';
        self::$trans["suggesteddocs"]["PROFILES"] = 'Topics of Interest';
        self::$trans["suggesteddocs"]["INCOMING_FOLDER"] = 'Inbox';
        self::$trans["suggesteddocs"]["FOLDERS_LIST"] = 'Choose a folder:';
        self::$trans["suggesteddocs"]["PROFILES_LIST"] = 'Choose a topic:';
        self::$trans["suggesteddocs"]["LOADING"] = 'Loading...';
        self::$trans["suggesteddocs"]["SELECTED_DOCS"] = 'Selected documents';
        self::$trans["suggesteddocs"]["SEND"] = 'Enviar';
        self::$trans["suggesteddocs"]["RELATED_DOCS"] = 'Related documents';
        self::$trans["suggesteddocs"]["RELATED_DOCS_ALERT"] = 'No related documents';

    // Terms of orcidworks pages
        self::$trans["orcidworks"]["FEATURE"] = 'My Publications';
        self::$trans["orcidworks"]["PAGE"] = 'Page';
        self::$trans["orcidworks"]["NEXT"] = 'Next';
        self::$trans["orcidworks"]["PREVIOUS"] = 'Previous';
        self::$trans["orcidworks"]["ORCID_WORKS"] = 'My Publications';
        self::$trans["orcidworks"]["ORCID_WORKS_NO_REGISTERS_FOUND"] = 'No publication found. To view your publications, please inform the ORCID ID in your registration.';
        self::$trans["orcidworks"]["GOOGLE_SCHOLAR"] = 'View on Google Scholar';

    // General Terms
        self::$trans["general"]["IDENTIFICATION"] = 'Virtual Health Library';
        self::$trans["general"]["LOGO"] = 'en/logobvs.gif';

    // Tems of mydocuments pages
        self::$trans["mydocuments"]["FEATURE"] = 'Favorite Documents';
        self::$trans["mydocuments"]["MY_COLLECTION"] = 'Favorite Documents';
        self::$trans["mydocuments"]["BY_DATE"] = 'by Date';
        self::$trans["mydocuments"]["INCOMING_FOLDER"] = 'Inbox';
        self::$trans["mydocuments"]["ADD_FOLDER"] = 'Add Collection';
        self::$trans["mydocuments"]["MY_FOLDERS"] = 'My Collections';
        self::$trans["mydocuments"]["SHOW_BY"] = 'View List by';
        self::$trans["mydocuments"]["DATE"] = 'Date';
        self::$trans["mydocuments"]["MY_RANK"] = 'My ranking';
        self::$trans["mydocuments"]["MOVE"] = 'move';
        self::$trans["mydocuments"]["MOVE_TO"] = 'move to';
        self::$trans["mydocuments"]["MOVE_DOCUMENT_TO"] = 'move to';
        self::$trans["mydocuments"]["FULL_TEXT"] = 'full text';
        self::$trans["mydocuments"]["REMOVE_FROM_COLLECTION"] = 'remove from collection';
        self::$trans["mydocuments"]["MONITOR_CITATION"] = 'monitored citations';
        self::$trans["mydocuments"]["MONITOR_ACCESS"] = 'monitored access';
        self::$trans["mydocuments"]["ACCESS_LIST_NO_REGISTERS_FOUND"] = 'No registers found';
        self::$trans["mydocuments"]["EDIT_FOLDER"] = 'Edit Collection';
        self::$trans["mydocuments"]["REMOVE_FOLDER"] = 'Remove Collection';
        self::$trans["mydocuments"]["PUBLISH_FOLDER"] = 'Make public';
        self::$trans["mydocuments"]["MAKE_FOLDER_PRIVATE"] = 'Make private';
        self::$trans["mydocuments"]["PAGE"] = 'Page';
        self::$trans["mydocuments"]["NEXT"] = 'Next';
        self::$trans["mydocuments"]["PREVIOUS"] = 'Previous';
        self::$trans["mydocuments"]["BULK_ACTIONS"] = 'Bulk actions';
        self::$trans["mydocuments"]["BULK_REMOVE_DOCS"] = 'Remove documents';
        self::$trans["mydocuments"]["BULK_MOVE_DOCS"] = 'Move documents';

    // Tems of directories pages
        self::$trans["directories"]["FEATURE"] = 'Favorite Documents';
        self::$trans["directories"]["FOLDER_NAME"] = 'Collection Name';
        self::$trans["directories"]["ADD_FOLDER"] = 'Add collection';
        self::$trans["directories"]["EDIT_FOLDER"] = 'Edit collection';
        self::$trans["directories"]["SAVE"] = 'Create';
        self::$trans["directories"]["CANCEL"] = 'Cancel';
        self::$trans["directories"]["REMOVE"] = 'Remove';
        self::$trans["directories"]["REMOVE_FOLDER"] = 'Remove collection';
        self::$trans["directories"]["REMOVE_CONTENT"] = 'Remove content';
        self::$trans["directories"]["MOVE"] = 'Move';
        self::$trans["directories"]["MOVE_TO"] = 'Move to';
        self::$trans["directories"]["MOVE_DOCUMENT_TO"] = 'Move to';
        self::$trans["directories"]["MOVE_CONTENT_TO_OTHER_FOLDER"] = 'Move content to another collection';
        self::$trans["directories"]["INCOMING_FOLDER"] = 'Inbox';
        self::$trans["directories"]["ADD_DIR_SUCESS"] = 'Operation succeeded';
        self::$trans["directories"]["REMOVE_DIR_SUCESS"] = 'Operation succeeded';
        self::$trans["directories"]["MOVE_DOC_SUCESS"] = 'Operation succeeded';
        self::$trans["directories"]["ADD_DIR_ERROR"] = 'There was an error adding the collection';
        self::$trans["directories"]["REMOVE_DIR_ERROR"] = 'There was an error removing the collection';
        self::$trans["directories"]["MOVE_DOC_ERROR"] = 'There was an error moving the collection';

    // Tems of mylinks pages
        self::$trans["mylinks"]["FEATURE"] = 'My Links';
        self::$trans["mylinks"]["SHOW_BY"] = 'View List by';
        self::$trans["mylinks"]["DATE"] = 'Date';
        self::$trans["mylinks"]["MY_RANK"] = 'My ranking';
        self::$trans["mylinks"]["TOOLS"] = 'Tools';
        self::$trans["mylinks"]["ADD_LINK"] = 'Add Link';
        self::$trans["mylinks"]["MY_LINKS"] = 'My Links';
        self::$trans["mylinks"]["REMOVE_LINK"] = 'Remove link';
        self::$trans["mylinks"]["EDIT_LINK"] = 'Edit link';
        self::$trans["mylinks"]["HIDE_FROM_HOME"] = 'Remove from home';
        self::$trans["mylinks"]["SHOW_IN_HOME"] = 'Publish in home';
        self::$trans["mylinks"]["LINK_TITLE"] = 'Title';
        self::$trans["mylinks"]["LINK_URL"] = 'URL';
        self::$trans["mylinks"]["LINK_DESCRIPTION"] = 'Description';
        self::$trans["mylinks"]["LINK_IN_HOME"] = 'Publish in home';
        self::$trans["mylinks"]["SAVE"] = 'Save';
        self::$trans["mylinks"]["CANCEL"] = 'Cancel';
        self::$trans["mylinks"]["MY_LINKS_NO_REGISTERS_FOUND"] = 'No registers found';
        self::$trans["mylinks"]["ADD_LINK_SUCESS"] = 'Operation succeeded';
        self::$trans["mylinks"]["PAGE"] = 'Page';
        self::$trans["mylinks"]["ADD_LINK_ERROR"] = 'There was an error adding the link';
        self::$trans["mylinks"]["NEXT"] = 'Next';
        self::$trans["mylinks"]["PREVIOUS"] = 'Previous';

    // Tems of mylinks pages
        self::$trans["mynews"]["SHOW_BY"] = 'View List by';
        self::$trans["mynews"]["DATE"] = 'Date';
        self::$trans["mynews"]["MY_RANK"] = 'My ranking';
        self::$trans["mynews"]["TOOLS"] = 'Tools';
        self::$trans["mynews"]["ADD_NEWS"] = 'Add RSS Feed';
        self::$trans["mynews"]["MY_NEWS"] = 'My News';
        self::$trans["mynews"]["REMOVE_NEWS"] = 'Remove rss feed';
        self::$trans["mynews"]["EDIT_NEWS"] = 'Edit rss feed';
        self::$trans["mynews"]["HIDE_FROM_HOME"] = 'Remove from home';
        self::$trans["mynews"]["SHOW_IN_HOME"] = 'Publish in home';
        self::$trans["mynews"]["NEWS_TITLE"] = 'Title';
        self::$trans["mynews"]["NEWS_URL"] = 'URL';
        self::$trans["mynews"]["NEWS_DESCRIPTION"] = 'Description';
        self::$trans["mynews"]["NEWS_IN_HOME"] = 'Publish in home';
        self::$trans["mynews"]["SAVE"] = 'Save';
        self::$trans["mynews"]["CANCEL"] = 'Cancel';
        self::$trans["mynews"]["MY_NEWS_NO_REGISTERS_FOUND"] = 'No registers found';
        self::$trans["mynews"]["ADD_news_SUCESS"] = 'Operation succeeded';
        self::$trans["mynews"]["PAGE"] = 'Page';

    // Tems of myalerts pages
        self::$trans["myalerts"]["TOOLS"] = 'Tools';
        self::$trans["myalerts"]["MY_ALERTS"] = 'My Alerts';
        self::$trans["myalerts"]["ACCESS_LIST"] = 'Access Statistics';
        self::$trans["myalerts"]["CITED_LIST"] = 'Citation';
        self::$trans["myalerts"]["REMOVE_ALERT"] = 'Remove alert';
        self::$trans["myalerts"]["FULL_TEXT"] = 'Full text';
        self::$trans["myalerts"]["SHOW_ACCESS_LIST"] = 'Show Access Statistics';
        self::$trans["myalerts"]["SHOW_CITED_LIST"] = 'Show Citations';
        self::$trans["myalerts"]["SHOW_ALL"] = 'Show Both';
        self::$trans["myalerts"]["ACCESS_LIST_NO_REGISTERS_FOUND"] = 'No registers found';
        self::$trans["myalerts"]["CITED_LIST_NO_REGISTERS_FOUND"] = 'No registers found';

    // Terms of myprofiledocuments pages
        self::$trans["myprofiledocuments"]["FEATURE"] = 'Interest Topics';
        self::$trans["myprofiledocuments"]["LILACS.orgiahx"] = 'LILACS Database';
        self::$trans["myprofiledocuments"]["SciELO.orgiahx"] = 'SciELO Network';
        self::$trans["myprofiledocuments"]["MY_PROFILES"] = 'Topics of Interest';
        self::$trans["myprofiledocuments"]["VIEW_RESULTS_IN"] = 'View results in';
        self::$trans["myprofiledocuments"]["REMOVE_PROFIVE"] = 'Remove topic';
        self::$trans["myprofiledocuments"]["EDIT_PROFILE"] = 'Edit topic';
        self::$trans["myprofiledocuments"]["ADD_PROFILE"] = 'Add topic';
        self::$trans["myprofiledocuments"]["TOOLS"] = 'Tools';
        self::$trans["myprofiledocuments"]["SIMILARS_IN"] = 'Similars in';
        self::$trans["myprofiledocuments"]["PROFILE_KEYWORDS"] = 'Topics keywords';
        self::$trans["myprofiledocuments"]["PROFILES"] = 'Topics';
        self::$trans["myprofiledocuments"]["REMOVE_PROFILE"] = 'Remove topic';
        self::$trans["myprofiledocuments"]["PROFILE_NAME"] = 'Topic Name';
        self::$trans["myprofiledocuments"]["PROFILE_TEXT"] = 'Keywords';
        self::$trans["myprofiledocuments"]["PROFILE_TEXT_HELP"] = 'The terms must be separated by commas.';
        self::$trans["myprofiledocuments"]["PROFILE_DEFAULT"] = 'Define as default';
        self::$trans["myprofiledocuments"]["SAVE"] = 'Save';
        self::$trans["myprofiledocuments"]["CANCEL"] = 'Cancel';
        self::$trans["myprofiledocuments"]["MY_PROFILES_NO_REGISTERS_FOUND"] = 'No registers found';
        self::$trans["myprofiledocuments"]["MY_PROFILES_NO_SUGGESTIONS_FOUND"] = 'No documents found. Try updating topic by <code>edit topic > save</code> or change your keywords.';
        self::$trans["myprofiledocuments"]["SERVICE_TEMPORARY_UNAVAILABLE"] = 'Service temporarily unavailable';
        self::$trans["myprofiledocuments"]["ADD_PROFILE_SUCESS"] = 'Operation succeeded';
        self::$trans["myprofiledocuments"]["ADD_PROFILE_ERROR"] = 'There was an error adding the topic';
        self::$trans["myprofiledocuments"]["PAGE"] = 'Page';
        self::$trans["myprofiledocuments"]["NEXT"] = 'Next';
        self::$trans["myprofiledocuments"]["PREVIOUS"] = 'Previous';
        self::$trans["myprofiledocuments"]["ADD_COLLECTION"] = 'Add to Favorites';
        self::$trans["myprofiledocuments"]["INCOMING_FOLDER"] = 'Inbox';

    // Terms of mig_id_confirmation pages
        self::$trans["mig_id_confirmation"]["TITLE"] = 'Login Confirmation';
        self::$trans["mig_id_confirmation"]["LOGIN"] = 'Login';
        self::$trans["mig_id_confirmation"]["CONFIRM"] = 'Confirm';
        self::$trans["mig_id_confirmation"]["ALERT"] = 'After confirmation, use this e-mail account to access the SciELO portal and other applications of the Network.';

    // Terms of step-by-step guide
        self::$trans["tour"]["TOUR_EXAMPLE"] = '(Exclusive tour example)';
        self::$trans["tour"]["INTRO"] = 'Welcome to the <b>My VHL</b> Tour. Get to know the features of this personalized service by navigating the Next and Back buttons. At any time you can leave the Tour and, if you wish, restart it through your profile menu.';
        self::$trans["tour"]["FIRST"] = 'The <b>My VHL</b> registers user information and search preferences performed in the VHL Network databases.';
        self::$trans["tour"]["STEP_1"] = 'User picture when logged in through Social Networks.';
        self::$trans["tour"]["STEP_2"] = 'Your content is organized by this Menu.';
        self::$trans["tour"]["STEP_3"] = '<b>Overview</b><br /> displays the Service Homepage with a summary of your actions performed.';
        self::$trans["tour"]["STEP_4"] = 'Perform your search in the VHL Regional Portal.';
        self::$trans["tour"]["STEP_5"] = 'Change the interface language.';
        self::$trans["tour"]["STEP_6"] = 'Update your Profile.';
        self::$trans["tour"]["STEP_7"] = 'Access the list of documents saved as favorites.';
        self::$trans["tour"]["STEP_8"] = 'Access the list of your favorite links.';
        self::$trans["tour"]["STEP_9"] = 'Access the list of your topics of interest.';
        self::$trans["tour"]["STEP_10"] = 'List of your favorite documents added by searches performed at the VHL.';
        self::$trans["tour"]["STEP_11"] = 'Click on the topic to see the documents that were automatically uploaded from the keywords.';
        self::$trans["tour"]["STEP_12"] = 'Direct access to your favorite links.';
        self::$trans["tour"]["STEP_13"] = 'History of your last completed activities.';
        self::$trans["tour"]["STEP_14"] = 'History of the searches carried out in the VHL with links to the results.';

        self::$trans["tour"]["STEP_15"] = '<b>Favorite Documents</b><br/>Stores the documents that have been saved from searches carried out in the VHL.';
        self::$trans["tour"]["STEP_16"] = 'List of documents added to your Library. You can delete, move to another collection, or view related documents.';
        self::$trans["tour"]["STEP_17"] = 'Use this feature to delete or move multiple documents to another collection.';
        self::$trans["tour"]["STEP_18"] = 'Organize your favorite documents into collections.';
        self::$trans["tour"]["STEP_19"] = 'Documents can be listed by date or by the rank assigned by you to each document.';

        self::$trans["tour"]["STEP_20"] = '<b>Topics of Interest</b><br />Your topics of interest with keywords to search for and retrieve new VHL documents related to each topic.';
        self::$trans["tour"]["STEP_21"] = 'List of the last documents retrieved from the VHL for the respective topic of interest. You can edit or delete the topic, add documents to Favorites, or view related documents.';
        self::$trans["tour"]["STEP_22"] = 'Create topics and define keywords to receive VHL related documents.';
        self::$trans["tour"]["STEP_23"] = 'Click on your topics of interest to view documents retrieved from the VHL.';

        self::$trans["tour"]["STEP_24"] = '<b>VHL Search History</b><br />Stores your search queries in the VHL whenever you are logged in to My VHL.';
        self::$trans["tour"]["STEP_25"] = 'List of the last search queries carried out in the VHL.';
        self::$trans["tour"]["STEP_26"] = 'Terms that were used in the search.';
        self::$trans["tour"]["STEP_27"] = 'Filters that were applied in the search.';

        self::$trans["tour"]["STEP_28"] = 'You can display the result of each search in the VHL or combine the search by indicating the combination operator.';
        self::$trans["tour"]["STEP_29"] = '<b>Favorite Links</b><br />Organizes and facilitates direct access to your Favorite Links.';
        self::$trans["tour"]["STEP_30"] = 'List your Favorite Links, with options to remove or edit each link.';
        self::$trans["tour"]["STEP_31"] = 'Add new Favorite Link and create your own link library.';
        self::$trans["tour"]["STEP_32"] = 'Order your links by date or by the ranking assigned by you to each link.';
        self::$trans["tour"]["STEP_33"] = '<b>My Publications</b><br />View your publications from the ORCID ID you entered in your Profile.';
        self::$trans["tour"]["STEP_34"] = 'List of publications retrieved from your ORCID ID. You can access each document in Google Scholar and know how many times your publication was cited. See also VHL documents related to your publication.';
        self::$trans["tour"]["LAST"] = 'Congratulations! You have completed the Tour and already know how <b>My VHL</b> custom services work. Use and disseminate this service. Send your questions and suggestions to the <a style="text-decoration: underline;" href="http://feedback.bireme.org/feedback/?application=my-vhl&version=1.0&lang='.$_SESSION['lang'].'">Feedback Service</a>';
    }


/**
 * @param <type> $term
 * @return <type>
 */
    public function getTrans($page,$term){
        $output=self::$trans[$page][$term];
        if (trim($output) == ""){
            $output = "translate_".$term;
        }
        return $output;
    }
}

?>