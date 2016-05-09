<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Email example</title>
                
        <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
        <link href="style.css" rel="stylesheet" type="text/css"/>
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" type="text/javascript"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
            include '../vendor/autoload.php';
            
            use FNVi\Email;
                        
            $args = [
                "from"=>FILTER_SANITIZE_EMAIL,
                "to"=>FILTER_SANITIZE_EMAIL,
                "replyTo"=>FILTER_SANITIZE_EMAIL,
                "subject"=>FILTER_SANITIZE_STRING,
                "message"=>FILTER_SANITIZE_STRING
            ];
            
            $post_vars = filter_input_array(INPUT_POST,$args);
            
            if(!empty($_POST)){
                $mail = new Email();
                
                $mail
                        ->from($post_vars["from"])
                        ->to($post_vars["to"])
                        ->replyTo($post_vars["replyTo"])
                        ->subject($post_vars["sunject"])
                        ->message($post_vars["message"])
                        ->send();
            }
        ?>
        <div class="container">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <h2>Send an email!</h2>
                        <form method="post">
                            <div class="form-group">
                                <label for="from">
                                    From:
                                </label>
                                <input class="form-control" id="from" name="from" value="test@testemail.com">
                            </div>
                            <div class="form-group">
                                <label for="to">
                                    To:
                                </label>
                                <input class="form-control" id="to" name="to">
                            </div>
                            <div class="form-group">
                                <label for="reply">
                                    Return address:
                                </label>
                                <input class="form-control" id="reply" name="replyTo" value="test@testemail.com">
                            </div>
                            <div class="form-group">
                                <label for="subject">
                                    Subject:
                                </label>
                                <input class="form-control" id="subject" name="subject" value="Test email">
                            </div>
                            <div class="form-group">
                                <label for="message">
                                    Message:
                                </label>
                                <textarea class="form-control" id="message" name="message" rows="4" style="">This is a test!</textarea>
                            </div>
                            <button class="btn btn-success">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
