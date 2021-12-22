
<!-- This login.jsp filee has been marked up with comments identifying sections to make it easier to make changees to the default login page for Blackboard Learn with the Ultra Expeerience enabled. This marked up template was downloaded from a Blackboard Learn environment running release 3800.19.0 on Thursday, October 15, 2020. The file was marked up by Santiago Vanegas from Blackboard. To ask questions and get support, please visit the Blackboard Community Site at https://community.blackboard.com/-->

<!-- This section below calls various servlets from the Learn environment  and other things you don't want to touch. Do not delete anything in this section -->
<%@ include file="/webapis/ui/doctype.jspf" %>
<%@ page import="blackboard.servlet.util.CourseCatalogUtil" %>
<%@ taglib uri="/bbNG" prefix="bbNG" %>
<%@ taglib uri="/loginUI" prefix="loginUI" %>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
<%@ taglib uri="http://java.sun.com/jsp/jstl/fmt" prefix="fmt"%>

<c:set var="productName" value="${ loginUI:getProductName() }" />

<fmt:message var="viewCourseCatalogLinkText" key="gatewayButtons.view.course.catalog" bundle="${bundles.tags}"/>

<!-- Calls CSS and js files for elements appearing in the page -->
<bbNG:genericPage authentication="N" wrapper="false" onLoad="loadLoginPage()" bodyClass="bb-login hide-focus-outline" globalNavigation="false" skipCoreCss="true" allowScale="true">
  <bbNG:cssFile href="/ui-ultra/css/ultra.css" />
  <bbNG:jsFile href="/ui-ultra/js/hide-focus-outline.js" />
  <bbNG:jsFile href="/ui-ultra/js/login-page.js" />

<!-- If you wanted to call your own css file and keep the css outside of the login.jsp file you could call it from here -->

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- The jsBlock contains the js you would add in an html header. If you wanted to change the fonts on the page or insert js elements such as the countdown time you would insert them here -->

  <bbNG:jsBlock>
    <script type="text/javascript">
      function loadLoginPage() {
        if(document.forms.login.user_id != undefined)
        {
          verify_username_password(document.forms.login);
        }
        setTimeout("triggerScreenreaderAlert()", 500);
      }

      function triggerScreenreaderAlert() {
        if (document.getElementById('loginErrorMessage')) {
          $('loginErrorMessage').update($('loginErrorMessage').innerHTML);
        }
      }
    </script>
  </bbNG:jsBlock>
<!-- INSERT YOUR CUSTOM CSS IN THIS SECTION IF PROVIDING INLINE CSS. The bbng:cssBlock tag does not come in the default template file. You need to add it separately -->
 <bbNG:cssBlock>

<style type="text/css">

/*------------main quick changes-----------*/
/*login button*/
input#entry-login {
    background-color: #f9a21d;
}
/*background image*/
body#learn-oe-body {
    background: url(https://temas.s3.amazonaws.com/Blackboard/coverBlack.jpg) no-repeat center center fixed;
}
/*background color left block*/
div#loginblockmain {
    background-color: white;
}
/*Background color right block*/
div#contentblock {
    background-color: rgba(71, 118, 189, 0.6);
}
/*Create a new account*/
.trial-registration a {
    color: #4776bd;
}
/*Hide or show Forgot Password*/
.collapse:not(.show) {
    display: block !important;
}
.login-form-footer .text-right a {
    color:#4776bd;
}
/*Course Catalogue Button*/
div#ultraCourseCatalogLink a {
    color: black !important;
    background-color: #f8a21e;
}
/*-----------main body blocks-----------*/
div#mainblocks {
    max-width: 800px;
    margin: 15% auto;
}
div#mainblocks .row {
    margin: 0;
}
div#loginblockmain, div#contentblock {
    padding: 2em;
}
body#learn-oe-body {
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
/*-------------Login block-------------*/
.bb-login #login-block {
    margin: 0 auto;
    min-width: 15rem;
    max-width: 20rem;
}

.bb-login .login-form ul input[type='text'], .bb-login .login-form ul input[type='password'] {
    border: 1px solid black;
    border-radius: 2em;
}
.bb-login .login-form ul input[type='text']:focus, .bb-login .login-form ul input[type='password']:focus {
    border-bottom-color: black;
}
.bb-login .login-form ul label.float-above {
    margin-top: -6px;
    color: #272726;
}
.bb-login .login-form ul label {
    margin-left: 10px;
    width: 100%;
    margin-top: 6px;
    left: 0;
}

input#entry-login {
  margin-bottom: 2em;
    border-radius: 2em;
    margin-top: 1em;
    width: 100%;
    max-width: 70%;
    color: black;
    border: 0px;
    box-shadow: 0 0 0 0px #fff inset;
}
div#loginblockmain {
    margin: -20px 0;
}

.bb-login .login-form ul label {
    color: black;
}
input[type="text"], input[type="password"], input[type="date"], input[type="datetime"], input[type="datetime-local"], input[type="month"], input[type="week"], input[type="email"], input[type="number"], input[type="search"], input[type="tel"], input[type="time"], input[type="url"], input[type="color"], textarea {
padding: 1rem;
}
.bb-login .login-form ul input[type='text'], .bb-login .login-form ul input[type='password'] {
    color: black;
}
.trial-registration {
    margin-top: 0;
}
.login-form-footer .small-6 {
    width: 100% !important;
}
.login-form-footer .text-right a {
    text-align: center;
    display: block;
    font-size: 16px;
    width: 100%;
    margin-bottom: 10px;
}
div#ultraCourseCatalogLink a {
    text-decoration: none !important;
    padding: 1em 2em;
    margin-bottom: 10px;
    border-radius: 2em;
    font-size: 14px !important;
}
div#ultraCourseCatalogLink {
    margin-bottom: 2em;
}
/*------------logo-----------------*/
h1.login-logo.new-logo.customized-logo {
    margin: 5% 0;
}
.bb-login .new-logo.customized-logo img {
    width: 100%;
    height: auto;
    border-radius: 0;
    max-width: 70%;
}
/*-------------Announcements------------*/
.bb-login .login-page-announcements {
    margin-top: 0;
    margin-bottom: 2em;
}
.bb-login .login-page-announcements #loginAnnouncements>ul>li {
    border-radius: 2px;
    background-color: transparent;
    color: white;
    border: 1px solid white;
    border-radius: 2em;
    max-width: 350px;
    padding: 1.5em !important;
}
.bb-login .login-page-announcements #loginAnnouncements>ul>li strong {
    padding: 0;
}
div#loginAnnouncements {
    max-height: 210px;
}
/*------------Footer-----------*/
.bb-login #gatewayButtons {
    margin-bottom: 0;
}
div#gatewayButtons ul {
    margin-bottom: 0;
}
div#gatewayButtons ul li a {
    color: white !important;
    font-weight: bold;
}
.bb-login #copyright {
    margin-top: 0;
    color: white;
}
#footernew {
    bottom: 0;
    text-align: center;
}
div#loginOptions, div#copyright {
    margin: 0 auto;
}
/*---------Browser Edits-------*/
.row:before, .row:after {
display: flex !important;
}
/*-----------media queries-----------*/
@media (max-width: 576px){
  div#loginblockmain {
    margin: 0;
}
}
</style>

</bbNG:cssBlock>
<!-- END OF CUSTOM CSS -->

<!-- This is the call for the cookie disclosure statement which appears when you first arrive at the login page. -->
  <%@ include file="/webapis/ui/cookie-disclosure-login.jspf"%>

<!-- This controls the login lang select button that appears on the top left of the page by default. Don't remove it unless you don't want it to be available. -->
  <div id="loginLang" class="clearfix">
    <loginUI:localePicker />
  </div>

<div class="container" id="mainblocks">
  <div class="row">
  <div class="col-lg-6 col-md-6 col-sm-12" id="loginblockmain">
    <div id="login-block" class="loginblocks small-11 small-centered medium-12 medium-centered text-center columns">

<!-- This is the default Blackboard logo which appears in/above the login block -->
  		<loginUI:loginHeaderIcon loginCssClass="login-logo new-logo" customizedCssClass="customized-logo" headerText="${productName}" />
  		<loginUI:errorMessage />

  		<c:if test="${ ( param.isSuccessfulPasswordUpdate eq 'true' ) && ( param.action eq 'relogin' )  }">
  	      <%@ include file="/passwordSuccessConfirmationReceipt.jspf"%>
  		</c:if>

<!-- the "login-form" contains the username and password fields in the login block -->
  		<div id="login-form" class="login-form">
  			<loginUI:loginForm />
  		</div>
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12" id="contentblock">
    <!-- login-page-announcements contains system announcements displayed on the login page. This appears below the "login-block" by default. -->
    <div class="login-page-announcements">
      <loginUI:systemAnnouncements maxItems="5" />
    </div>

    <!-- this class contains the course catalog styling if course catalog is enabled. --> 
   <div class="container" id="footernew">
    <div class="small-12 small-centered text-center columns">
      <c:if test="${ CourseCatalogUtil.getAllowCatalog() }">
        <div id="ultraCourseCatalogLink">
          <a href="${ CourseCatalogUtil.getCatalogUrl( CourseCatalogUtil.getAllowCatalog() ) }">${viewCourseCatalogLinkText}</a>
        </div>
	    </c:if>
<!-- this calls the copyright notice --> 
      <bbNG:copyright />
      <div id="loginOptions">
        <loginUI:gatewayButtons />
     </div>
      </div>
    </div>

  </div>
</div>

</div>

</bbNG:genericPage>
