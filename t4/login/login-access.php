<?php

   /* Basic TERMINALFOUR Site Manager Access Control PHP Code
    *
    * Copyright (C) All Rights Reserved 2013, TERMINALFOUR Solutions Ltd.
    * http://www.terminalfour.com
    *
    * Author: Barry Flannery, Senior Client Support Engineer 
    * Version: 1.1.0001
    *  
    * Requirements:
    *       - PHP 5.2 or higher
    *       - PHP cURL Module
    *       - Access to TERMINALFOUR Site Manager
    * 
    * Release Notes:  
    *       - 2013, July 23 : Inital release
    * 
    * Updates:
    *       - 2018, July 25 : Added setting failedLogin session valriable - Anthony - line 701+
    */
    
   /* Set Web Services Admin Username, Password, and URL here
    *
    * The username and password MUST login as a local account
    * within TERMINALFOUR Site Manager.
    * 
    * The URL specified for Web Services is your Site Manager 
    * URL with 'services/' replaceing the 'SiteManager' part 
    * 
    * Example:
    *
    *   // Site Manager Web Services Username, Password & URL
    *   $s_ws_user = 't4wsuser';
    *   $s_ws_pass = 'password';
    *   $s_ws_url  = 'http://www.mydomain.com/terminalfour/services/';
    *
    */

    // Site Manager Web Services Username, Password & URL
    $s_ws_user = 'PrivateAdmin';
    $s_ws_pass = 'private';
    $s_ws_url  = 'https://myweb.ufv.ca/terminalfour/services/';

   /* Set the important locations for this site:
    *    - These must have a trailing slash
    *    - Do not include the page names
    *    - Do not include the hostname, ip, or protocol
    *    - Ensure settings for each site have a unique number as shown below
    * 
    * Examples:
    *
    *   // Student Portal 
    *   $aa_s_sites_info[0]['site_root'] = '/students/portal/';
    *   $aa_s_sites_info[0]['login_url'] = '/students/portal/login/';
    *   $aa_s_sites_info[0]['no_access'] = '/students/portal/noaccess/';
    *
    *   // Staff Extranet
    *   $aa_s_sites_info[1]['site_root'] = '/staff/extranet/';
    *   $aa_s_sites_info[1]['login_url'] = '/staff/extranet/login/';
    *   $aa_s_sites_info[1]['no_access'] = '/staff/extranet/noaccess/';
    */
    // ITS Manager Site 
    $aa_s_sites_info[0]['site_root'] = '/its/tasks/';
    $aa_s_sites_info[0]['login_url'] = '/its/tasks/login/';
    $aa_s_sites_info[0]['no_access'] = '/its/tasks/noaccess/';

    // JCAC Access
    $aa_s_sites_info[1]['site_root'] = '/hr/staff/jcac/job_desc/';
    $aa_s_sites_info[1]['login_url'] = '/hr/staff/jcac/job_desc/login/';
    $aa_s_sites_info[1]['no_access'] = '/hr/staff/jcac/job_desc/noaccess/'; 

    // ITS Services Request 
    $aa_s_sites_info[2]['site_root'] = '/its/forms/';
    $aa_s_sites_info[2]['login_url'] = '/its/forms/login/';
    $aa_s_sites_info[2]['no_access'] = '/its/forms/noaccess/';


    // _Web Team Testing Password Protect
    $aa_s_sites_info[3]['site_root'] = '/_web/secure/';
    $aa_s_sites_info[3]['login_url'] = '/_web/secure/login/';
    $aa_s_sites_info[3]['no_access'] = '/_web/secure/noaccess/';

    // Institutional Research
    $aa_s_sites_info[4]['site_root'] = '/irp/internal-documents/';
    $aa_s_sites_info[4]['login_url'] = '/irp/internal-documents/login/';
    $aa_s_sites_info[4]['no_access'] = '/irp/internal-documents/noaccess/';

    // Marcom Templates and Downloads for internal only
    $aa_s_sites_info[5]['site_root'] = '/university-relations/marcom/marketing-materials/templates/';
    $aa_s_sites_info[5]['login_url'] = '/university-relations/marcom/marketing-materials/templates/login/';
    $aa_s_sites_info[5]['no_access'] = '/university-relations/marcom/marketing-materials/templates/noaccess/';

    // College of Arts meeting minutes
    $aa_s_sites_info[6]['site_root'] = '/arts/password-protected/';
    $aa_s_sites_info[6]['login_url'] = '/arts/password-protected/login/';
    $aa_s_sites_info[6]['no_access'] = '/arts/password-protected/noaccess/';

   // BTO - Engage the BTO
    $aa_s_sites_info[7]['site_root'] = '/bto/engage-the-bto/';
    $aa_s_sites_info[7]['login_url'] = '/bto/engage-the-bto/login/';
    $aa_s_sites_info[7]['no_access'] = '/bto/engage-the-bto/noaccess/';

   // Assessment Services - Faculty exam submission form
    $aa_s_sites_info[8]['site_root'] = '/assessment/faculty-exam-submission-form/';
    $aa_s_sites_info[8]['login_url'] = '/assessment/faculty-exam-submission-form/login/';
    $aa_s_sites_info[8]['no_access'] = '/assessment/faculty-exam-submission-form/noaccess/';

   // Campus Planning & Facilities Management - Status
    $aa_s_sites_info[9]['site_root'] = '/campusplanning/status/';
    $aa_s_sites_info[9]['login_url'] = '/campusplanning/status/login/';
    $aa_s_sites_info[9]['no_access'] = '/campusplanning/status/noaccess/';

   // HUMAN Resources - Job description library
    $aa_s_sites_info[10]['site_root'] = '/hr/compensation-benefits/compensation/job-descriptions/';
    $aa_s_sites_info[10]['login_url'] = '/hr/compensation-benefits/compensation/job-descriptions/login/';
    $aa_s_sites_info[10]['no_access'] = '/hr/compensation-benefits/compensation/job-descriptions/noaccess/';

   // Assessment Services - Accuplacer exam request form
    $aa_s_sites_info[11]['site_root'] = '/assessment/accuplacer-exam-request-form/';
    $aa_s_sites_info[11]['login_url'] = '/assessment/accuplacer-exam-request-form/login/';
    $aa_s_sites_info[11]['no_access'] = '/assessment/accuplacer-exam-request-form/noaccess/';

    /*
    * _____________________________________________________________
    *                                                           
    *  YOU SHOULD NOT HAVE TO CHANGE ANYTHING BELOW THIS LINE! 
    * _____________________________________________________________
    *
    * If you do have to, and you think it's a change that will 
    * benefit the masses, please email TERMINALFOUR Client Support
    * with your change, and why you made it. It may then be included
    * with future updates of this code by default. 
    * 
    * E-Mail : clientsupport@terminalfour.com 
    *
    */
 
    // Get the current page URL
    $s_location = strtolower(strtok(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), '?'));    

    // Loop through each of the defined sites...
    foreach ($aa_s_sites_info as $a_s_site_info) 
    {       
        // If the page were on contains the site_root for one of the sites...
        if( strpos( $s_location, $a_s_site_info['site_root'] ) !== false)
        {
            // Define the important locations for this site
            define(SITE_ROOT_URL ,  $a_s_site_info['site_root'] );
            define(LOGIN_URL     ,  $a_s_site_info['login_url'] );
            define(NO_ACCESS_URL ,  $a_s_site_info['no_access'] );

            // Stop looking; we have the right site settings
            break;
        }
    }

    // Start a new session    
    session_start();

    // Get a list of the access control groups for this page / section
    define ('T4_ACCESS_GROUPS', '<t4 type="accesscontrol" output="groupnames" />');

    // Define the locations of the "No Access Page" and the "Login Page"
    define('IS_LOGIN_PAGE',    ($s_location == strtolower(LOGIN_URL)     || $s_location == strtolower(LOGIN_URL     . 'index.php')));
    define('IS_NOACCESS_PAGE', ($s_location == strtolower(NO_ACCESS_URL) || $s_location == strtolower(NO_ACCESS_URL . 'index.php')));    
   
    // Check to see if the user should be logged out
    fn_v_check_for_logout();

    // If a username and password have been sent 
    if(isset($_POST['uname'], $_POST['pwd']))
    {
        // Create a new WebServicesLogin Object
        $o_ws_login = new WebServicesLogin($s_ws_user, $s_ws_pass, $s_ws_url);

        // Unset sensitive information (they're not private in the class)
        unset($s_ws_user, $s_ws_pass, $s_ws_url);

        // Was the user loged in?
        $b_logged_in = $o_ws_login->fn_b_check_user_credentials();

        // If the user was logged in and there is a request URI set for them ...
        if($b_logged_in && isset($_SESSION['requestedURI'][SITE_ROOT_URL]) && FALSE !== strpos($_SESSION['requestedURI'][SITE_ROOT_URL], SITE_ROOT_URL))
        {
            // Send them there
            fn_v_redirect($_SESSION['requestedURI'][SITE_ROOT_URL]);
        }
        // otherwise, if they have logged in to this site
        else if($b_logged_in && FALSE !== strpos($_SESSION['requestedURI'][SITE_ROOT_URL], SITE_ROOT_URL))
        {       
            // Send them to the main page of the site
            fn_v_redirect(SITE_ROOT_URL);
        }
        else
        {
            fn_v_redirect_to_login_page();
        }
    }
    // Else, if this is the login page, and we're already logged in...
    else if(IS_LOGIN_PAGE && is_array($_SESSION['validSiteRoots']) && in_array(SITE_ROOT_URL, $_SESSION['validSiteRoots']))
    {
        // Set this as a warning
        $_SESSION['auth_errors'][SITE_ROOT_URL] = $_SESSION['auth_errors'][SITE_ROOT_URL] . 'alreadyLoggedIn=true&';

        // Redirect to the site root to prevent multiple logins to the site
        fn_v_redirect(SITE_ROOT_URL);
    }
    else 
    {
        // Send the user to the login page; they're not logged in nor are they trying to login
        fn_v_redirect_to_login_page();
    }
    
    // If this isn't the loging page, nor is the no access page, and the user shouldn't be here...
    if(!IS_LOGIN_PAGE && !IS_NOACCESS_PAGE && !fn_b_has_user_got_access())
    {
        // Send them to the no access page or die
        fn_v_redirect(NO_ACCESS_URL . '?no_access=' . urlencode($_SERVER["REQUEST_URI"])); die;
    }





   /*
    * Redirect Function
    *
    * Redirects user to a page
    *
    * Inputs: 
    *   String: URL to redirect to
    *
    * Returns:
    *   Nothing; void
    */
    function fn_v_redirect($s_uri)
    {
        // If any errors were noted for this site's login...
        if(isset($_SESSION['auth_errors'][SITE_ROOT_URL]))
        {
            // Add them to the URL
            $s_uri .= '?' . $_SESSION['auth_errors'][SITE_ROOT_URL]; 
        }

        // Remove any errors from last go
        unset($_SESSION['auth_errors'][SITE_ROOT_URL]);

        // If no headers have been sent...
        if(!headers_sent())
        {
            // Trigger a PHP Redirect to the location (or die)
            header('Location: ' . $s_uri ); die;
        }
        // If headers have been set...
        else
        {
            // Carry out a META Redirect to the location (or die)
            echo '<script>window.location.href = "' . $s_uri . '";</script><noscript>
                  <meta http-equiv="refresh" content="0;url=' . $s_uri . '" />
                  </noscript>'; die;
        }
    }

   /*
    * Redirect to Login Page Function
    *
    * Redirects user to the login page if they're not there already
    *
    * Inputs: 
    *   None
    *
    * Returns:
    *   Nothing; void
    */
    function fn_v_redirect_to_login_page()
    {
        // If this isn't the login page, nor is there a user session...
        if (!IS_LOGIN_PAGE && !isset($_SESSION['userID']))
        {
            // If this isn't the "No Access" page
            if(!IS_NOACCESS_PAGE)
            {  
                // Store the location we're at so the user can be sent there when logged in
                $_SESSION['requestedURI'][SITE_ROOT_URL] = strtok($_SERVER["REQUEST_URI"], '?');            
            }
        
            // Redirect to login page
            fn_v_redirect(LOGIN_URL);
        }        
        else if (isset($_SESSION['auth_errors'][SITE_ROOT_URL]))
        {            
            // Redirect to login page
            fn_v_redirect(LOGIN_URL);
        }
    }

   /*
    * Check for Logout Function
    *
    * Logout a user out by destroying their session
    *
    * Inputs: 
    *   None
    *
    * Returns:
    *   Nothing; void
    */
    function fn_v_check_for_logout()
    {
        
        // If there is a user session, and the request is to logout...
        if(isset($_SESSION["userID"]) && isset($_REQUEST['logout']))
        {
            // If we have only one valid site root
            if(isset($_SESSION["validSiteRoots"]) && 1 == count($_SESSION["validSiteRoots"]))
            {
                // Unset session variables and kill the session
                session_unset();
                session_destroy();
            }
            // otherwise
            else
            {
                // Delete this site from the valid sites list
                if(($o_key = array_search(SITE_ROOT_URL, $_SESSION["validSiteRoots"])) !== FALSE) {
                    unset($_SESSION["validSiteRoots"][$o_key]);
                }
            }

            // Redirect the user to the main site page (or die)
            fn_v_redirect (SITE_ROOT_URL); die;
        }
        // Othrwise, if there is a user session, and valid sites ahave been set in that session
        else if (isset($_SESSION["userID"]) && isset($_SESSION["validSiteRoots"]))
        {
            // Check to see if they should be on this page (will be boolean FALSE if they're not)
            $b_okay_to_be_here = in_array(SITE_ROOT_URL, $_SESSION["validSiteRoots"]);

            // If it isn't okay for them to be here, and this isn't a login page...
            if(FALSE === $b_okay_to_be_here && !IS_LOGIN_PAGE)  
            {
                // Store the loaction of the page they were trying to get to 
                $_SESSION['requestedURI'][SITE_ROOT_URL] = $_SERVER["REQUEST_URI"];

                // And bounce them to the login screen
                fn_v_redirect(LOGIN_URL);
            }
        }
    }


   /*
    * "Has User Got Access" Function
    *
    * Checks to see if a user has access to the current page or not
    *
    * Inputs: 
    *   None
    *
    * Returns:
    *   Boolen, true for access, false for no access
    */
    function fn_b_has_user_got_access()
    {
        // If the list of users with access to the page is defined...
        if(defined('T4_ACCESS_GROUPS'))
        {
            // Explode out the list of groups (ignore empty things) and if it's not empty... 
            if(0 < count($a_groups_with_access = array_filter(explode (',' , T4_ACCESS_GROUPS))))
            {
                // Check if the user in question is in any of the groups allowed view the page. Return true if they are; false otherwise        
                return (is_array($_SESSION['user_groups']) && array_intersect($_SESSION['user_groups'], $a_groups_with_access));
            }
            // otherwise nothing has been set...
            else
            {
                // Let anyone in 
                return TRUE;
            }
        }
        // No groups have been defined for access so...
        else
        {
            // Let anyone in
            return TRUE;
        }

        // Return False to be on the safe side
        return FALSE;
    }

    /*
    * ------------------------------------------------------------------------
    *  Class 'WebServicesLogin'
    * ------------------------------------------------------------------------
    *
    * Controls User Authentication via TERMINALFOUR Site Mangaer Web Services
    *
    * 
    * 
    */

    class WebServicesLogin
    {
       
       /*
        * Define Class Variables
        */

        // Array of Web Services settings
        private $a_ws_settings;

        // A cURL object
        private $o_curl;

        // To record if we have an Admin Login to Web Services already
        private $b_has_ws_admin_session = false;

       /*
        * Constructor
        *
        * Inputs: 
        *   None
        *
        * Returns:
        *   Nothing; void
        */
        public function __construct($s_ws_user, $s_ws_pass, $s_ws_url)
        {
            // Set Web Services parameters 
            $this->a_ws_settings['ws_user'] = $s_ws_user;
            $this->a_ws_settings['ws_pass'] = $s_ws_pass;             
            $this->a_ws_settings['ws_url']  = $s_ws_url;

            // Create Curl object
            $this->o_curl = curl_init();

            // Set Curl options
            curl_setopt($this->o_curl, CURLOPT_HTTPHEADER, Array("Content-Type: application/json", 'Connection: Keep-Alive', 'Keep-Alive: 300'));
            curl_setopt($this->o_curl, CURLOPT_POST, true);
            curl_setopt($this->o_curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($this->o_curl, CURLOPT_COOKIEFILE, "cookies.txt");
            curl_setopt($this->o_curl, CURLOPT_COOKIEJAR, "cookies.txt");
            //curl_setopt($this->o_curl, CURLOPT_SSLVERSION, 3);
            curl_setopt($this->o_curl, CURLOPT_SSL_VERIFYPEER, FALSE);           
        }

       /*
        * Destructor
        *
        * Inputs: 
        *   None
        *
        * Returns:
        *   Nothing; void
        */
        public function __destruct()
        {
            // Destroy the curl object if it exists
            if($this->o_curl)             
                curl_close($this->o_curl);                        
        }

       /*
        * "Get Cleaned POST VAR" Function 
        *
        * Gets an HTML escaped copy of a post variable if it's set
        *
        * Inputs: 
        *   $s_key : String : POST variable key
        *
        * Returns:
        *   String: The POST variable 
        */
        protected function fn_s_get_cleaned_post_var($s_key)
        {
            // Return the requested post variable, or an empty string if it's not been set
            return isset($_POST[$s_key]) ? htmlentities($_POST[$s_key]) : '';
        }


       /*
        * "Do Web Services Call" Function 
        *
        * Makes a call to Site Manager's Web Services via CURL
        *
        * Inputs: 
        *   $s_date          : String : JSON Data to send via CURL
        *   $s_function_name : String : The Web Service to call via CURL
        *
        * Returns:
        *   String: HTML code for the login form
        */
        protected function fn_s_do_ws_call($s_data, $s_function_name)
        {
            // Set the URL to hit with this call & add the JSON data to that call
            curl_setopt($this->o_curl, CURLOPT_URL , $this->a_ws_settings["ws_url"] . $s_function_name);
            curl_setopt($this->o_curl, CURLOPT_POSTFIELDS, $s_data);
            
            // Make the call and get the output
            $s_response = curl_exec($this->o_curl);            

            // Get the response code from the WS call
            $i_response_code = curl_getinfo($this->o_curl, CURLINFO_HTTP_CODE);

            // If the response is anthing other than 200 (okay)...
            if( 200 != $i_response_code )
            {
                // Add an error with the appropriate response code
                $_SESSION['auth_errors'][SITE_ROOT_URL] = $_SESSION['auth_errors'][SITE_ROOT_URL] . 'webServicesError=true&errorCode='.$i_response_code.'&';
            }

            // Return the response
            return $s_response;
        }


       /*
        * "End Admin Session" Function 
        *
        * Terminates the login session for the Web Services user 
        *
        * Inputs: 
        *   None
        *
        * Returns:
        *   Nothing; void
        */        
        protected function fn_v_end_admin_session()
        {
            // Set nothing for be sent on the WS call
            $s_data = '{"request":{}}';
    
            // Terminate the admin session
            $this->fn_s_do_ws_call($s_data, "authentication/logout");

            // Note that the admin session is logged out
            $this->b_has_ws_admin_session = FALSE;
        }


       /*
        * "Start Admin Session" Function 
        *
        * Logs the Web Services user into Site Manager
        *
        * Inputs: 
        *   None
        *
        * Returns:
        *   Boolean: Was the admin user logged in or not?
        */  
        protected function fn_b_start_admin_session()
        {
            // If the user is already logged in...
            if($this->b_has_ws_admin_session)
            {
                // Return TRUE. No need to check further
                return TRUE;
            }

            // Set JSON data string to make a login request for the Web Services user
            $s_data = '{"request":{"@username":"'.$this->a_ws_settings['ws_user'].'","@password":"'.$this->a_ws_settings['ws_pass'].'"}}';

            // If the Web Services call goes through...
            if($s_result = $this->fn_s_do_ws_call($s_data, "authentication/login"))        
            {
                // JSON decode the results from the Web Services call
                $s_result = json_decode($s_result, TRUE);

                // Check if the Web Services user has been logged in, note if it has or not and return the value
                $b_admin_login_okay = $this->b_has_ws_admin_session = (is_array($s_result) && isset($s_result['response']['user']['@id']));

                // If the admin login fails, and we didn't record an error code 500 for the Web Services check
                if(!$b_admin_login_okay &&   ( FALSE === strpos($_SESSION['auth_errors'][SITE_ROOT_URL], 'errorCode') 
                                            || FALSE !== strpos($_SESSION['auth_errors'][SITE_ROOT_URL], 'errorCode=500')))
                {
                    // Add an error to say that the specified admin account was not valid
                    $_SESSION['auth_errors'][SITE_ROOT_URL] = $_SESSION['auth_errors'][SITE_ROOT_URL] . 'badWSAdminAccount=true&';
                }

                // Return results
                return $b_admin_login_okay;
            }

            // To be on the safe side, return false
            return FALSE; 
        }       
    
       /*
        * "Get User Information from Username" Function 
        *
        * Makes a Web Services call to Site Manager to get the user details assoicated with the username
        *
        * Inputs: 
        *   $s_username : String : The Username to look up
        *
        * Returns:
        *      Array   : Array of user details
        *   OR Boolean : If the lookup fails
        */  
        protected function fn_a_get_user_information_from_username($s_username)
        {
            // Set the data for the Web Services Requect
            $s_data = '{request:{"@username" : "'.$s_username.'" , "@extensible" : "true" }}';

            // If the Web Service call fails... 
            if(!$s_result = $this->fn_s_do_ws_call($s_data, "user/getUserByUserName"))
            {            
                // Return FALSE; Web Service call failed
                return FALSE; 
            }

            // JSON decode the results from the Web Services call
            $s_result = json_decode($s_result, TRUE);

            // Return an array of user information if present in the results set; otherwise return FALSE
            return is_array($s_result) && isset($s_result['response']['user']['@id']) ? $s_result['response']['user'] : FALSE;
        }

       /*
        * "Check if User Account is Valid and Enabled" Function 
        *
        * Checks to see if the user's account is both valid (ie: Username & Password are correct)
        * And also checks to make sure their account is marked "enabled" in Site Manager
        *
        * Inputs: 
        *   $s_result : String : JSON string of results from authentication check on username & password
        *
        * Returns:
        *   Boolean   : If their account is valid and enabled this is true; otherwise false
        */  
        protected function fn_b_check_is_user_account_valid_and_enabled($s_result)
        {
            // JSON decode the results
            $s_result = json_decode($s_result, true);

            // If the results set is valid, and the user's account is enabled and their username
            // and password were correct, this will return TRUE. If anything part is wrong, FALSE
            return (is_array($s_result)
                      && isset($s_result['response']['@valid'], $s_result['response']['@enabled'])
                      && $s_result['response']['@valid'] == 'true'
                      && $s_result['response']['@enabled'] == 'true');      
        }        


       /*
        * "Check User Credentials" Function 
        *
        * Creates a login for the Web Services Admin user, then, using that login 
        * looks up the username & password provided by the user to see if they're correct
        * If the user's credentials are okay, and their account is enabled then the 
        * function will return TRUE to indicate they're logged in; otherwise FALSE
        *
        * Inputs: 
        *   None
        *
        * Returns:
        *   Boolean   : Is the user logged in?
        */ 
        public function fn_b_check_user_credentials()
        {
            // If we cannot create an Admin session...
            if(!$this->fn_b_start_admin_session())
            {               
                // return false; we cannot check user details
                return FALSE; 
            }
            
            // Data to pass to Web Services to check for a 'local' user account
            $s_data = '{"request":{"@username":"'.$_POST['uname'].'","@password":"'.$_POST['pwd'].'"}}';
           
            // If we get nothing back from the Web Services call...
            if(!$s_result = $this->fn_s_do_ws_call($s_data, "authentication/validateLogin"))
            {
                // Note that we didn't reach the Validate Login Web Service
                $_SESSION['auth_errors'][SITE_ROOT_URL] = $_SESSION['auth_errors'][SITE_ROOT_URL] . 'validateLoginWSUnreachableLocalUser=true&';

                // then return FALSE
                return FALSE;                      
            }
            
            // Check if the user's account is valid and enabled
            $b_login_success = $this->fn_b_check_is_user_account_valid_and_enabled($s_result);

            // If the account wasn't sucessful... 
            if(!$b_login_success)
            {
                // Then set up the same data request, but this time for an LDAP user account
                $s_data = '{"request":{"@username":"'.$_POST['uname'].'","@password":"'.$_POST['pwd'].'", "@is_ldap":"TRUE"}}';
           
                // If we get nothing back from the Web Services call...
                if(!$s_result = $this->fn_s_do_ws_call($s_data, "authentication/validateLogin"))
                {                   
                    // Add an error to note that the LDAP lookup failed
                    $_SESSION['auth_errors'][SITE_ROOT_URL] = $_SESSION['auth_errors'][SITE_ROOT_URL] . 'validateLoginWSUnreachableLDAPUser=true&';

                    // then return FALSE
                    return FALSE;                    
                }

                // Check if the LDAP user's account is valid and enabled
                $b_login_success = $this->fn_b_check_is_user_account_valid_and_enabled($s_result);
            }    
          
            // If it is valid & enabled then get their user details from the username
            if($b_login_success && $s_details = $this->fn_a_get_user_information_from_username($_POST['uname']))
            {
                // Store their details in the session
                $this->fn_v_store_session_details($s_details);
            }

            // Log the admin user out of Site Manager
            $this->fn_v_end_admin_session();

            // If the login failed, note the error for this site 
            if(!$b_login_success)
            {
                // Add javascript alert
                echo '<script> alert("UFV.ca - Invalid login details, please try again."); </script>';

                // Add an error to say we couldn't login in, bad username & password
                $_SESSION['auth_errors'][SITE_ROOT_URL] = $_SESSION['auth_errors'][SITE_ROOT_URL] . 'badUserAccount=true&';

                // Anthony 2018-07-25
                // on page checks for session variable, setting it here
                $_SESSION['failedLogin'] = 1;

            }

            // Send back the results
            return $b_login_success;
        }


       /*
        * "Store Session Details" Function 
        *
        * Stores the user's details from Site Manager into their session
        *
        * Inputs: 
        *   $s_details : String : JSON string of user information
        *
        * Returns:
        *   Nothing; void
        */ 
        protected function fn_v_store_session_details($s_details)
        {
            // Set their user ID in their session
            $_SESSION['userID'] = $s_details['@id'];

            // If there is an array of valid sites...
            if(is_array($_SESSION['validSiteRoots']))
            {
                // If it's not in there already (precautionary check) ...
                if(!in_array(SITE_ROOT_URL, $_SESSION['validSiteRoots']))
                {
                    // Record that they are now validly logged into this site
                    $_SESSION['validSiteRoots'][] = SITE_ROOT_URL;
                }
            }
            // otherwise... 
            else
            {
                // Record that they are now validly logged into this site
                $_SESSION['validSiteRoots'][] = SITE_ROOT_URL;        
            }

            // Get the groups ther user is in
            $a_groups = isset($s_details["groups"]["group"]) ? $s_details["groups"]["group"] : FALSE;

            // If we have an array of groups for the user
            if(is_array($a_groups))
            {
                // If they're only in one group (ie: this isn't a 2D array)...
                if(isset($a_groups['@group_name']))
                { 
                    // Set the group in their session
                    $_SESSION['user_groups'][] = $a_groups['@group_name'];
                }
                // Otherwise...
                else
                {
                    // Loop through each sub-array...
                    foreach($a_groups as $a_group)
                    {
                        // and if there is a group set...
                        if(isset($a_group['@group_name']))
                        {
                            // Note it on their session
                            $_SESSION['user_groups'][] = $a_group['@group_name'];
                        }
                    }
                }
            }

            // Store the rest of the user's information in their session
            $_SESSION['user_name'] = $_POST['uname'];
            $_SESSION['full_name'] = isset($s_details['@firstname'], $s_details['@lastname']) ? $s_details['@firstname'].' '.$s_details['@lastname'] : '';
        }
    }  
       
?>
<?php

   /* Basic TERMINALFOUR Site Manager Access Control PHP Code
    *
    * Copyright (C) All Rights Reserved 2013, TERMINALFOUR Solutions Ltd.
    * http://www.terminalfour.com
    *
    * Author: Barry Flannery, Senior Client Support Engineer 
    * Version: 1.1.0001
    *  
    * Requirements:
    *       - PHP 5.2 or higher
    *       - PHP cURL Module
    *       - Access to TERMINALFOUR Site Manager
    * 
    * Release Notes:  
    *       - 2013, July 23 : Inital release
    * 
    * Updates:
    *       - 2018, July 25 : Added setting failedLogin session valriable - Anthony - line 701+
    */
    
   /* Set Web Services Admin Username, Password, and URL here
    *
    * The username and password MUST login as a local account
    * within TERMINALFOUR Site Manager.
    * 
    * The URL specified for Web Services is your Site Manager 
    * URL with 'services/' replaceing the 'SiteManager' part 
    * 
    * Example:
    *
    *   // Site Manager Web Services Username, Password & URL
    *   $s_ws_user = 't4wsuser';
    *   $s_ws_pass = 'password';
    *   $s_ws_url  = 'http://www.mydomain.com/terminalfour/services/';
    *
    */

    // Site Manager Web Services Username, Password & URL
    $s_ws_user = 'PrivateAdmin';
    $s_ws_pass = 'private';
    $s_ws_url  = 'https://myweb.ufv.ca/terminalfour/services/';

   /* Set the important locations for this site:
    *    - These must have a trailing slash
    *    - Do not include the page names
    *    - Do not include the hostname, ip, or protocol
    *    - Ensure settings for each site have a unique number as shown below
    * 
    * Examples:
    *
    *   // Student Portal 
    *   $aa_s_sites_info[0]['site_root'] = '/students/portal/';
    *   $aa_s_sites_info[0]['login_url'] = '/students/portal/login/';
    *   $aa_s_sites_info[0]['no_access'] = '/students/portal/noaccess/';
    *
    *   // Staff Extranet
    *   $aa_s_sites_info[1]['site_root'] = '/staff/extranet/';
    *   $aa_s_sites_info[1]['login_url'] = '/staff/extranet/login/';
    *   $aa_s_sites_info[1]['no_access'] = '/staff/extranet/noaccess/';
    */
    // ITS Manager Site 
    $aa_s_sites_info[0]['site_root'] = '/its/tasks/';
    $aa_s_sites_info[0]['login_url'] = '/its/tasks/login/';
    $aa_s_sites_info[0]['no_access'] = '/its/tasks/noaccess/';

    // JCAC Access
    $aa_s_sites_info[1]['site_root'] = '/hr/staff/jcac/job_desc/';
    $aa_s_sites_info[1]['login_url'] = '/hr/staff/jcac/job_desc/login/';
    $aa_s_sites_info[1]['no_access'] = '/hr/staff/jcac/job_desc/noaccess/'; 

    // ITS Services Request 
    $aa_s_sites_info[2]['site_root'] = '/its/forms/';
    $aa_s_sites_info[2]['login_url'] = '/its/forms/login/';
    $aa_s_sites_info[2]['no_access'] = '/its/forms/noaccess/';


    // _Web Team Testing Password Protect
    $aa_s_sites_info[3]['site_root'] = '/_web/secure/';
    $aa_s_sites_info[3]['login_url'] = '/_web/secure/login/';
    $aa_s_sites_info[3]['no_access'] = '/_web/secure/noaccess/';

    // Institutional Research
    $aa_s_sites_info[4]['site_root'] = '/irp/internal-documents/';
    $aa_s_sites_info[4]['login_url'] = '/irp/internal-documents/login/';
    $aa_s_sites_info[4]['no_access'] = '/irp/internal-documents/noaccess/';

    // Marcom Templates and Downloads for internal only
    $aa_s_sites_info[5]['site_root'] = '/university-relations/marcom/marketing-materials/templates/';
    $aa_s_sites_info[5]['login_url'] = '/university-relations/marcom/marketing-materials/templates/login/';
    $aa_s_sites_info[5]['no_access'] = '/university-relations/marcom/marketing-materials/templates/noaccess/';

    // College of Arts meeting minutes
    $aa_s_sites_info[6]['site_root'] = '/arts/password-protected/';
    $aa_s_sites_info[6]['login_url'] = '/arts/password-protected/login/';
    $aa_s_sites_info[6]['no_access'] = '/arts/password-protected/noaccess/';

   // BTO - Engage the BTO
    $aa_s_sites_info[7]['site_root'] = '/bto/engage-the-bto/';
    $aa_s_sites_info[7]['login_url'] = '/bto/engage-the-bto/login/';
    $aa_s_sites_info[7]['no_access'] = '/bto/engage-the-bto/noaccess/';

   // Assessment Services - Faculty exam submission form
    $aa_s_sites_info[8]['site_root'] = '/assessment/faculty-exam-submission-form/';
    $aa_s_sites_info[8]['login_url'] = '/assessment/faculty-exam-submission-form/login/';
    $aa_s_sites_info[8]['no_access'] = '/assessment/faculty-exam-submission-form/noaccess/';

   // Campus Planning & Facilities Management - Status
    $aa_s_sites_info[9]['site_root'] = '/campusplanning/status/';
    $aa_s_sites_info[9]['login_url'] = '/campusplanning/status/login/';
    $aa_s_sites_info[9]['no_access'] = '/campusplanning/status/noaccess/';

   // HUMAN Resources - Job description library
    $aa_s_sites_info[10]['site_root'] = '/hr/compensation-benefits/compensation/job-descriptions/';
    $aa_s_sites_info[10]['login_url'] = '/hr/compensation-benefits/compensation/job-descriptions/login/';
    $aa_s_sites_info[10]['no_access'] = '/hr/compensation-benefits/compensation/job-descriptions/noaccess/';

   // Assessment Services - Accuplacer exam request form
    $aa_s_sites_info[11]['site_root'] = '/assessment/accuplacer-exam-request-form/';
    $aa_s_sites_info[11]['login_url'] = '/assessment/accuplacer-exam-request-form/login/';
    $aa_s_sites_info[11]['no_access'] = '/assessment/accuplacer-exam-request-form/noaccess/';

    /*
    * _____________________________________________________________
    *                                                           
    *  YOU SHOULD NOT HAVE TO CHANGE ANYTHING BELOW THIS LINE! 
    * _____________________________________________________________
    *
    * If you do have to, and you think it's a change that will 
    * benefit the masses, please email TERMINALFOUR Client Support
    * with your change, and why you made it. It may then be included
    * with future updates of this code by default. 
    * 
    * E-Mail : clientsupport@terminalfour.com 
    *
    */
 
    // Get the current page URL
    $s_location = strtolower(strtok(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), '?'));    

    // Loop through each of the defined sites...
    foreach ($aa_s_sites_info as $a_s_site_info) 
    {       
        // If the page were on contains the site_root for one of the sites...
        if( strpos( $s_location, $a_s_site_info['site_root'] ) !== false)
        {
            // Define the important locations for this site
            define(SITE_ROOT_URL ,  $a_s_site_info['site_root'] );
            define(LOGIN_URL     ,  $a_s_site_info['login_url'] );
            define(NO_ACCESS_URL ,  $a_s_site_info['no_access'] );

            // Stop looking; we have the right site settings
            break;
        }
    }

    // Start a new session    
    session_start();

    // Get a list of the access control groups for this page / section
    define ('T4_ACCESS_GROUPS', '<t4 type="accesscontrol" output="groupnames" />');

    // Define the locations of the "No Access Page" and the "Login Page"
    define('IS_LOGIN_PAGE',    ($s_location == strtolower(LOGIN_URL)     || $s_location == strtolower(LOGIN_URL     . 'index.php')));
    define('IS_NOACCESS_PAGE', ($s_location == strtolower(NO_ACCESS_URL) || $s_location == strtolower(NO_ACCESS_URL . 'index.php')));    
   
    // Check to see if the user should be logged out
    fn_v_check_for_logout();

    // If a username and password have been sent 
    if(isset($_POST['uname'], $_POST['pwd']))
    {
        // Create a new WebServicesLogin Object
        $o_ws_login = new WebServicesLogin($s_ws_user, $s_ws_pass, $s_ws_url);

        // Unset sensitive information (they're not private in the class)
        unset($s_ws_user, $s_ws_pass, $s_ws_url);

        // Was the user loged in?
        $b_logged_in = $o_ws_login->fn_b_check_user_credentials();

        // If the user was logged in and there is a request URI set for them ...
        if($b_logged_in && isset($_SESSION['requestedURI'][SITE_ROOT_URL]) && FALSE !== strpos($_SESSION['requestedURI'][SITE_ROOT_URL], SITE_ROOT_URL))
        {
            // Send them there
            fn_v_redirect($_SESSION['requestedURI'][SITE_ROOT_URL]);
        }
        // otherwise, if they have logged in to this site
        else if($b_logged_in && FALSE !== strpos($_SESSION['requestedURI'][SITE_ROOT_URL], SITE_ROOT_URL))
        {       
            // Send them to the main page of the site
            fn_v_redirect(SITE_ROOT_URL);
        }
        else
        {
            fn_v_redirect_to_login_page();
        }
    }
    // Else, if this is the login page, and we're already logged in...
    else if(IS_LOGIN_PAGE && is_array($_SESSION['validSiteRoots']) && in_array(SITE_ROOT_URL, $_SESSION['validSiteRoots']))
    {
        // Set this as a warning
        $_SESSION['auth_errors'][SITE_ROOT_URL] = $_SESSION['auth_errors'][SITE_ROOT_URL] . 'alreadyLoggedIn=true&';

        // Redirect to the site root to prevent multiple logins to the site
        fn_v_redirect(SITE_ROOT_URL);
    }
    else 
    {
        // Send the user to the login page; they're not logged in nor are they trying to login
        fn_v_redirect_to_login_page();
    }
    
    // If this isn't the loging page, nor is the no access page, and the user shouldn't be here...
    if(!IS_LOGIN_PAGE && !IS_NOACCESS_PAGE && !fn_b_has_user_got_access())
    {
        // Send them to the no access page or die
        fn_v_redirect(NO_ACCESS_URL . '?no_access=' . urlencode($_SERVER["REQUEST_URI"])); die;
    }





   /*
    * Redirect Function
    *
    * Redirects user to a page
    *
    * Inputs: 
    *   String: URL to redirect to
    *
    * Returns:
    *   Nothing; void
    */
    function fn_v_redirect($s_uri)
    {
        // If any errors were noted for this site's login...
        if(isset($_SESSION['auth_errors'][SITE_ROOT_URL]))
        {
            // Add them to the URL
            $s_uri .= '?' . $_SESSION['auth_errors'][SITE_ROOT_URL]; 
        }

        // Remove any errors from last go
        unset($_SESSION['auth_errors'][SITE_ROOT_URL]);

        // If no headers have been sent...
        if(!headers_sent())
        {
            // Trigger a PHP Redirect to the location (or die)
            header('Location: ' . $s_uri ); die;
        }
        // If headers have been set...
        else
        {
            // Carry out a META Redirect to the location (or die)
            echo '<script>window.location.href = "' . $s_uri . '";</script><noscript>
                  <meta http-equiv="refresh" content="0;url=' . $s_uri . '" />
                  </noscript>'; die;
        }
    }

   /*
    * Redirect to Login Page Function
    *
    * Redirects user to the login page if they're not there already
    *
    * Inputs: 
    *   None
    *
    * Returns:
    *   Nothing; void
    */
    function fn_v_redirect_to_login_page()
    {
        // If this isn't the login page, nor is there a user session...
        if (!IS_LOGIN_PAGE && !isset($_SESSION['userID']))
        {
            // If this isn't the "No Access" page
            if(!IS_NOACCESS_PAGE)
            {  
                // Store the location we're at so the user can be sent there when logged in
                $_SESSION['requestedURI'][SITE_ROOT_URL] = strtok($_SERVER["REQUEST_URI"], '?');            
            }
        
            // Redirect to login page
            fn_v_redirect(LOGIN_URL);
        }        
        else if (isset($_SESSION['auth_errors'][SITE_ROOT_URL]))
        {            
            // Redirect to login page
            fn_v_redirect(LOGIN_URL);
        }
    }

   /*
    * Check for Logout Function
    *
    * Logout a user out by destroying their session
    *
    * Inputs: 
    *   None
    *
    * Returns:
    *   Nothing; void
    */
    function fn_v_check_for_logout()
    {
        
        // If there is a user session, and the request is to logout...
        if(isset($_SESSION["userID"]) && isset($_REQUEST['logout']))
        {
            // If we have only one valid site root
            if(isset($_SESSION["validSiteRoots"]) && 1 == count($_SESSION["validSiteRoots"]))
            {
                // Unset session variables and kill the session
                session_unset();
                session_destroy();
            }
            // otherwise
            else
            {
                // Delete this site from the valid sites list
                if(($o_key = array_search(SITE_ROOT_URL, $_SESSION["validSiteRoots"])) !== FALSE) {
                    unset($_SESSION["validSiteRoots"][$o_key]);
                }
            }

            // Redirect the user to the main site page (or die)
            fn_v_redirect (SITE_ROOT_URL); die;
        }
        // Othrwise, if there is a user session, and valid sites ahave been set in that session
        else if (isset($_SESSION["userID"]) && isset($_SESSION["validSiteRoots"]))
        {
            // Check to see if they should be on this page (will be boolean FALSE if they're not)
            $b_okay_to_be_here = in_array(SITE_ROOT_URL, $_SESSION["validSiteRoots"]);

            // If it isn't okay for them to be here, and this isn't a login page...
            if(FALSE === $b_okay_to_be_here && !IS_LOGIN_PAGE)  
            {
                // Store the loaction of the page they were trying to get to 
                $_SESSION['requestedURI'][SITE_ROOT_URL] = $_SERVER["REQUEST_URI"];

                // And bounce them to the login screen
                fn_v_redirect(LOGIN_URL);
            }
        }
    }


   /*
    * "Has User Got Access" Function
    *
    * Checks to see if a user has access to the current page or not
    *
    * Inputs: 
    *   None
    *
    * Returns:
    *   Boolen, true for access, false for no access
    */
    function fn_b_has_user_got_access()
    {
        // If the list of users with access to the page is defined...
        if(defined('T4_ACCESS_GROUPS'))
        {
            // Explode out the list of groups (ignore empty things) and if it's not empty... 
            if(0 < count($a_groups_with_access = array_filter(explode (',' , T4_ACCESS_GROUPS))))
            {
                // Check if the user in question is in any of the groups allowed view the page. Return true if they are; false otherwise        
                return (is_array($_SESSION['user_groups']) && array_intersect($_SESSION['user_groups'], $a_groups_with_access));
            }
            // otherwise nothing has been set...
            else
            {
                // Let anyone in 
                return TRUE;
            }
        }
        // No groups have been defined for access so...
        else
        {
            // Let anyone in
            return TRUE;
        }

        // Return False to be on the safe side
        return FALSE;
    }

    /*
    * ------------------------------------------------------------------------
    *  Class 'WebServicesLogin'
    * ------------------------------------------------------------------------
    *
    * Controls User Authentication via TERMINALFOUR Site Mangaer Web Services
    *
    * 
    * 
    */

    class WebServicesLogin
    {
       
       /*
        * Define Class Variables
        */

        // Array of Web Services settings
        private $a_ws_settings;

        // A cURL object
        private $o_curl;

        // To record if we have an Admin Login to Web Services already
        private $b_has_ws_admin_session = false;

       /*
        * Constructor
        *
        * Inputs: 
        *   None
        *
        * Returns:
        *   Nothing; void
        */
        public function __construct($s_ws_user, $s_ws_pass, $s_ws_url)
        {
            // Set Web Services parameters 
            $this->a_ws_settings['ws_user'] = $s_ws_user;
            $this->a_ws_settings['ws_pass'] = $s_ws_pass;             
            $this->a_ws_settings['ws_url']  = $s_ws_url;

            // Create Curl object
            $this->o_curl = curl_init();

            // Set Curl options
            curl_setopt($this->o_curl, CURLOPT_HTTPHEADER, Array("Content-Type: application/json", 'Connection: Keep-Alive', 'Keep-Alive: 300'));
            curl_setopt($this->o_curl, CURLOPT_POST, true);
            curl_setopt($this->o_curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($this->o_curl, CURLOPT_COOKIEFILE, "cookies.txt");
            curl_setopt($this->o_curl, CURLOPT_COOKIEJAR, "cookies.txt");
            //curl_setopt($this->o_curl, CURLOPT_SSLVERSION, 3);
            curl_setopt($this->o_curl, CURLOPT_SSL_VERIFYPEER, FALSE);           
        }

       /*
        * Destructor
        *
        * Inputs: 
        *   None
        *
        * Returns:
        *   Nothing; void
        */
        public function __destruct()
        {
            // Destroy the curl object if it exists
            if($this->o_curl)             
                curl_close($this->o_curl);                        
        }

       /*
        * "Get Cleaned POST VAR" Function 
        *
        * Gets an HTML escaped copy of a post variable if it's set
        *
        * Inputs: 
        *   $s_key : String : POST variable key
        *
        * Returns:
        *   String: The POST variable 
        */
        protected function fn_s_get_cleaned_post_var($s_key)
        {
            // Return the requested post variable, or an empty string if it's not been set
            return isset($_POST[$s_key]) ? htmlentities($_POST[$s_key]) : '';
        }


       /*
        * "Do Web Services Call" Function 
        *
        * Makes a call to Site Manager's Web Services via CURL
        *
        * Inputs: 
        *   $s_date          : String : JSON Data to send via CURL
        *   $s_function_name : String : The Web Service to call via CURL
        *
        * Returns:
        *   String: HTML code for the login form
        */
        protected function fn_s_do_ws_call($s_data, $s_function_name)
        {
            // Set the URL to hit with this call & add the JSON data to that call
            curl_setopt($this->o_curl, CURLOPT_URL , $this->a_ws_settings["ws_url"] . $s_function_name);
            curl_setopt($this->o_curl, CURLOPT_POSTFIELDS, $s_data);
            
            // Make the call and get the output
            $s_response = curl_exec($this->o_curl);            

            // Get the response code from the WS call
            $i_response_code = curl_getinfo($this->o_curl, CURLINFO_HTTP_CODE);

            // If the response is anthing other than 200 (okay)...
            if( 200 != $i_response_code )
            {
                // Add an error with the appropriate response code
                $_SESSION['auth_errors'][SITE_ROOT_URL] = $_SESSION['auth_errors'][SITE_ROOT_URL] . 'webServicesError=true&errorCode='.$i_response_code.'&';
            }

            // Return the response
            return $s_response;
        }


       /*
        * "End Admin Session" Function 
        *
        * Terminates the login session for the Web Services user 
        *
        * Inputs: 
        *   None
        *
        * Returns:
        *   Nothing; void
        */        
        protected function fn_v_end_admin_session()
        {
            // Set nothing for be sent on the WS call
            $s_data = '{"request":{}}';
    
            // Terminate the admin session
            $this->fn_s_do_ws_call($s_data, "authentication/logout");

            // Note that the admin session is logged out
            $this->b_has_ws_admin_session = FALSE;
        }


       /*
        * "Start Admin Session" Function 
        *
        * Logs the Web Services user into Site Manager
        *
        * Inputs: 
        *   None
        *
        * Returns:
        *   Boolean: Was the admin user logged in or not?
        */  
        protected function fn_b_start_admin_session()
        {
            // If the user is already logged in...
            if($this->b_has_ws_admin_session)
            {
                // Return TRUE. No need to check further
                return TRUE;
            }

            // Set JSON data string to make a login request for the Web Services user
            $s_data = '{"request":{"@username":"'.$this->a_ws_settings['ws_user'].'","@password":"'.$this->a_ws_settings['ws_pass'].'"}}';

            // If the Web Services call goes through...
            if($s_result = $this->fn_s_do_ws_call($s_data, "authentication/login"))        
            {
                // JSON decode the results from the Web Services call
                $s_result = json_decode($s_result, TRUE);

                // Check if the Web Services user has been logged in, note if it has or not and return the value
                $b_admin_login_okay = $this->b_has_ws_admin_session = (is_array($s_result) && isset($s_result['response']['user']['@id']));

                // If the admin login fails, and we didn't record an error code 500 for the Web Services check
                if(!$b_admin_login_okay &&   ( FALSE === strpos($_SESSION['auth_errors'][SITE_ROOT_URL], 'errorCode') 
                                            || FALSE !== strpos($_SESSION['auth_errors'][SITE_ROOT_URL], 'errorCode=500')))
                {
                    // Add an error to say that the specified admin account was not valid
                    $_SESSION['auth_errors'][SITE_ROOT_URL] = $_SESSION['auth_errors'][SITE_ROOT_URL] . 'badWSAdminAccount=true&';
                }

                // Return results
                return $b_admin_login_okay;
            }

            // To be on the safe side, return false
            return FALSE; 
        }       
    
       /*
        * "Get User Information from Username" Function 
        *
        * Makes a Web Services call to Site Manager to get the user details assoicated with the username
        *
        * Inputs: 
        *   $s_username : String : The Username to look up
        *
        * Returns:
        *      Array   : Array of user details
        *   OR Boolean : If the lookup fails
        */  
        protected function fn_a_get_user_information_from_username($s_username)
        {
            // Set the data for the Web Services Requect
            $s_data = '{request:{"@username" : "'.$s_username.'" , "@extensible" : "true" }}';

            // If the Web Service call fails... 
            if(!$s_result = $this->fn_s_do_ws_call($s_data, "user/getUserByUserName"))
            {            
                // Return FALSE; Web Service call failed
                return FALSE; 
            }

            // JSON decode the results from the Web Services call
            $s_result = json_decode($s_result, TRUE);

            // Return an array of user information if present in the results set; otherwise return FALSE
            return is_array($s_result) && isset($s_result['response']['user']['@id']) ? $s_result['response']['user'] : FALSE;
        }

       /*
        * "Check if User Account is Valid and Enabled" Function 
        *
        * Checks to see if the user's account is both valid (ie: Username & Password are correct)
        * And also checks to make sure their account is marked "enabled" in Site Manager
        *
        * Inputs: 
        *   $s_result : String : JSON string of results from authentication check on username & password
        *
        * Returns:
        *   Boolean   : If their account is valid and enabled this is true; otherwise false
        */  
        protected function fn_b_check_is_user_account_valid_and_enabled($s_result)
        {
            // JSON decode the results
            $s_result = json_decode($s_result, true);

            // If the results set is valid, and the user's account is enabled and their username
            // and password were correct, this will return TRUE. If anything part is wrong, FALSE
            return (is_array($s_result)
                      && isset($s_result['response']['@valid'], $s_result['response']['@enabled'])
                      && $s_result['response']['@valid'] == 'true'
                      && $s_result['response']['@enabled'] == 'true');      
        }        


       /*
        * "Check User Credentials" Function 
        *
        * Creates a login for the Web Services Admin user, then, using that login 
        * looks up the username & password provided by the user to see if they're correct
        * If the user's credentials are okay, and their account is enabled then the 
        * function will return TRUE to indicate they're logged in; otherwise FALSE
        *
        * Inputs: 
        *   None
        *
        * Returns:
        *   Boolean   : Is the user logged in?
        */ 
        public function fn_b_check_user_credentials()
        {
            // If we cannot create an Admin session...
            if(!$this->fn_b_start_admin_session())
            {               
                // return false; we cannot check user details
                return FALSE; 
            }
            
            // Data to pass to Web Services to check for a 'local' user account
            $s_data = '{"request":{"@username":"'.$_POST['uname'].'","@password":"'.$_POST['pwd'].'"}}';
           
            // If we get nothing back from the Web Services call...
            if(!$s_result = $this->fn_s_do_ws_call($s_data, "authentication/validateLogin"))
            {
                // Note that we didn't reach the Validate Login Web Service
                $_SESSION['auth_errors'][SITE_ROOT_URL] = $_SESSION['auth_errors'][SITE_ROOT_URL] . 'validateLoginWSUnreachableLocalUser=true&';

                // then return FALSE
                return FALSE;                      
            }
            
            // Check if the user's account is valid and enabled
            $b_login_success = $this->fn_b_check_is_user_account_valid_and_enabled($s_result);

            // If the account wasn't sucessful... 
            if(!$b_login_success)
            {
                // Then set up the same data request, but this time for an LDAP user account
                $s_data = '{"request":{"@username":"'.$_POST['uname'].'","@password":"'.$_POST['pwd'].'", "@is_ldap":"TRUE"}}';
           
                // If we get nothing back from the Web Services call...
                if(!$s_result = $this->fn_s_do_ws_call($s_data, "authentication/validateLogin"))
                {                   
                    // Add an error to note that the LDAP lookup failed
                    $_SESSION['auth_errors'][SITE_ROOT_URL] = $_SESSION['auth_errors'][SITE_ROOT_URL] . 'validateLoginWSUnreachableLDAPUser=true&';

                    // then return FALSE
                    return FALSE;                    
                }

                // Check if the LDAP user's account is valid and enabled
                $b_login_success = $this->fn_b_check_is_user_account_valid_and_enabled($s_result);
            }    
          
            // If it is valid & enabled then get their user details from the username
            if($b_login_success && $s_details = $this->fn_a_get_user_information_from_username($_POST['uname']))
            {
                // Store their details in the session
                $this->fn_v_store_session_details($s_details);
            }

            // Log the admin user out of Site Manager
            $this->fn_v_end_admin_session();

            // If the login failed, note the error for this site 
            if(!$b_login_success)
            {
                // Add javascript alert
                echo '<script> alert("UFV.ca - Invalid login details, please try again."); </script>';

                // Add an error to say we couldn't login in, bad username & password
                $_SESSION['auth_errors'][SITE_ROOT_URL] = $_SESSION['auth_errors'][SITE_ROOT_URL] . 'badUserAccount=true&';

                // Anthony 2018-07-25
                // on page checks for session variable, setting it here
                $_SESSION['failedLogin'] = 1;

            }

            // Send back the results
            return $b_login_success;
        }


       /*
        * "Store Session Details" Function 
        *
        * Stores the user's details from Site Manager into their session
        *
        * Inputs: 
        *   $s_details : String : JSON string of user information
        *
        * Returns:
        *   Nothing; void
        */ 
        protected function fn_v_store_session_details($s_details)
        {
            // Set their user ID in their session
            $_SESSION['userID'] = $s_details['@id'];

            // If there is an array of valid sites...
            if(is_array($_SESSION['validSiteRoots']))
            {
                // If it's not in there already (precautionary check) ...
                if(!in_array(SITE_ROOT_URL, $_SESSION['validSiteRoots']))
                {
                    // Record that they are now validly logged into this site
                    $_SESSION['validSiteRoots'][] = SITE_ROOT_URL;
                }
            }
            // otherwise... 
            else
            {
                // Record that they are now validly logged into this site
                $_SESSION['validSiteRoots'][] = SITE_ROOT_URL;        
            }

            // Get the groups ther user is in
            $a_groups = isset($s_details["groups"]["group"]) ? $s_details["groups"]["group"] : FALSE;

            // If we have an array of groups for the user
            if(is_array($a_groups))
            {
                // If they're only in one group (ie: this isn't a 2D array)...
                if(isset($a_groups['@group_name']))
                { 
                    // Set the group in their session
                    $_SESSION['user_groups'][] = $a_groups['@group_name'];
                }
                // Otherwise...
                else
                {
                    // Loop through each sub-array...
                    foreach($a_groups as $a_group)
                    {
                        // and if there is a group set...
                        if(isset($a_group['@group_name']))
                        {
                            // Note it on their session
                            $_SESSION['user_groups'][] = $a_group['@group_name'];
                        }
                    }
                }
            }

            // Store the rest of the user's information in their session
            $_SESSION['user_name'] = $_POST['uname'];
            $_SESSION['full_name'] = isset($s_details['@firstname'], $s_details['@lastname']) ? $s_details['@firstname'].' '.$s_details['@lastname'] : '';
        }
    }  
       
?>
