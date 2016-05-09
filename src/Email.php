<?php

namespace FNVi;

/**
 * A really basic class to encapsulate the mail function provided by php
 *
 * @author Joe Wheatley <joew@fnvi.co.uk>
 */
class Email {
    
    private $to;
    private $from;
    private $message;
    private $replyTo;
    private $subject;
    
    /**
     * The email details can be passed directly into the constructor, or can optionaly be set using method chaining
     * 
     * @param string $recipient
     * @param string $from
     * @param string $subject
     * @param string $message
     */
    public function __construct($recipient = "", $from = "", $subject = "", $message = "") {
        $this->to = $recipient;
        $this->from = $from;
        $this->subject = $subject;
        $this->message = $message;
        $this->replyTo = $from;
    }
    
    /**
     * Sets the from field
     * 
     * @param string $email
     * @return \FNVi\Email
     */
    public function from($email){
        $this->from = $email;
        return $this;
    }
    
    /**
     * Sets the to field
     * 
     * @param string $email
     * @return \FNVi\Email
     */
    public function to($email){
        $this->to = $email;
        return $this;
    }
    
    /**
     * Sets the subject 
     * 
     * @param string $subject
     * @return \FNVi\Email
     */
    public function subject($subject){
        $this->subject = $subject;
        return $this;
    }
    
    /**
     * Sets the body of the email
     * 
     * @param string $message
     * @return \FNVi\Email
     */
    public function message($message){
        $this->message = $message;
        return $this;
    }
    
    /**
     * Sets a different email address to reply to (if required)
     * 
     * @param string $email
     * @return \FNVi\Email
     */
    public function replyTo($email){
        $this->replyTo = $email;
        return $this;
    }

    /**
     * Sets the headers for the message.
     * 
     * This has been put into a separate function in order to keep things tidy.
     * @return string
     */
    private function headers(){
        return "From: ".$this->from."\r\n".
                "Reply-To: ".$this->replyTo."\r\n". 
                "MIME-Version: 1.0\r\n". 
                "Content-Type: text/html; charset=ISO-8859-1\r\n". 
                "X-Mailer: PHP/".  phpversion(); 
    }
    
    /**
     * Calls the mail method to send the email
     * 
     * This should be last in the chain.
     * @return bool Returns TRUE if accepted for delivery
     */
    public function send(){
        return mail($this->to, $this->subject, $this->message, $this->headers());
    }
}
