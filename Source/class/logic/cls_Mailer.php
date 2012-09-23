<? 
/**
 * Mailer.php
 * 
 * class cls_Mailer
 */
 
class Mailer
{

	/**
	 * cls_Controler_Account constructor
	 *
	 * @param 
	 */
	function __construct() {

	}
	
   /**
    * sendWelcome - Sends a welcome message to the newly
    * registered user, also supplying the username and
    * password.
    */
   public function sendWelcome($user, $email, $pass){
      $from = "From: ".EMAIL_FROM_ADDR." <".EMAIL_FROM_ADDR.">";
      $subject = "HTW 11-02X-XX Registrierung";
      $body = "Hallo ".$user.",\n\n"
             ."du wurdest registriert.\n\n"
             ."http://www.HTW-DD-11-02X-XX.info.tm\n\n"
             ."Der User-Account wurde mit folgenden Daten erstellt:\n\n"
             ."Benutzername: ".$user."\n"
             ."Passwort: ".$pass."\n\n"
             ."Viel Erfolg beim lernen.";
	  
	  /* ------------------------------------- */

      //return mail(EMAIL_FROM_ADDR,$subject,$body,$from);
      return mail($email,$subject,$body,$from);
	  
	  /* ------------------------------------- */
   }
   
   /**
    * sendNewPass - Sends the newly generated password
    * to the user's email address that was specified at
    * sign-up.
    */
   public function sendNewPass($user, $email, $pass){
      $from = "From: ".EMAIL_FROM_ADDR." <".EMAIL_FROM_ADDR.">";
      $subject = "HTW 11-02X-XX Passwortäderung";
      $body = "Hallo ".$user.",\n\n"
             ."Es wurde ein neues Passwort erstellt.\n\n"
             ."http://www.HTW-DD-11-02X-XX.info.tm\n\n"
             ."Benutzername: ".$user."\n"
             ."Passwort: ".$pass."\n\n"
             ."";
             
      //return mail(EMAIL_FROM_ADDR,$subject,$body,$from);
      return mail($email,$subject,$body,$from);
   } 
   
   /**
    * sendNewUserName - Sends the newly generated password
    * to the user's email address that was specified at
    * sign-up.
    */
   public function sendNewUserName($user, $email){
      $from = "From: ".EMAIL_FROM_ADDR." <".EMAIL_FROM_ADDR.">";
      $subject = "HTW 11-02X-XX Benutzernamesänderung";
      $body = "Hallo ".$user.",\n\n"
             ."Benutzername wurde geändert.\n\n"
             ."http://www.HTW-DD-11-02X-XX.info.tm\n\n"
             ."Benutzername: ".$user."\n"
             ."";
             
      //return mail(EMAIL_FROM_ADDR,$subject,$body,$from);
      return mail($email,$subject,$body,$from);
   }  
   
   /**
    * sendFormKontakt - Sends the newly generated password
    * to the user's email address that was specified at
    * sign-up.
    */
   public function sendFormKontakt($user, $uemail, $mailtext ){
	  $mailtext = addslashes($mailtext);
	  $user = addslashes($user);
      $from = "From: ".$uemail;
      $subject = "Kontaktformular HTW Vorlesungen";
      $body = "Kontaktformular HTW Vorlesungen\n\n"
			 .$user." ---- ".$uemail.",\n\n"
             ."\n\n"
             .$mailtext;
             
      return mail(EMAIL_FROM_ADDR,$subject,$body,$from);
   }
}
 
?>
