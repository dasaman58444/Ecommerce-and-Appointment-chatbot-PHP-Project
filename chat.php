<?php
class Bot
{
    private $name = "Alicia";
    private $gender = "Female";

    public function getName()
    {
        return $this->name;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function hears($message, callable $call)
    {
        $call(new Bot);
        return $message;
    }

    public function reply($response)
    {
        echo $response;
    }

    public function ask($question, array $questionDictionary)
    {
        $question = trim($question);
        foreach ($questionDictionary as $questions => $value) {
            if ($question == $questions) {
                return $value;
            }
        }
    }
}
$bot = new Bot;
$questions = [
    "please send contact number" => "Please feel free to contact us  !! choose one of them</br>- Local Team </br>-  customer service  </br>-  sales department  </br>- technical support  </br>- queries team ",
     "contact number" => "Please feel free to contact us  !! choose one of them</br>- Local Team </br>-  customer service  </br>-  sales department  </br>- technical support  </br>- queries team ",
    "contact no." => "Please feel free to contact us  !! choose one of them</br>- Local Team </br>-  customer service  </br>-  sales department  </br>- technical support  </br>- queries team ",
     "contact no" => "Please feel free to contact us  !! choose one of them</br>- Local Team </br>-  customer service  </br>-  sales department  </br>- technical support  </br>- queries team ",
    "contact no" => "Please feel free to contact us  !! choose one of them</br>- Local Team </br>-  customer service  </br>-  sales department  </br>- technical support  </br>- queries team ",
    "contact detail" => "Please feel free to contact us  !! choose one of them</br>- Local Team </br>-  customer service  </br>-  sales department  </br>- technical support  </br>- queries team ",
      "contact" => "Please feel free to contact us  !! choose one of them</br>- Local Team </br>-  customer service  </br>-  sales department  </br>- technical support  </br>- queries team ",
    "contact details" => "Please feel free to contact us  !! choose one of them </br>- Local Team </br>-  customer service  </br>-  sales department  </br>- technical support  </br>- queries team ",
      "contactno" => "Please feel free to contact us  !! choose one of them </br>- Local Team </br>-  customer service  </br>-  sales department  </br>- technical support  </br>- queries team ",
    
    
    "local team" => "Local Team Contact Details !! </br>9876565447 (Ravi shah) </br>8768765435 (Aman Sukla) </br>9865465234 ( Priya Rani)",
        "customer service" => "Customer Service  Contact Details !! </br>9876565447 (Ravi shah) </br>8768765435 (Aman Sukla) </br>9865465234 ( Priya Rani)",
    "sales department" => "Sales Department  Contact Details !! </br>9876565447 (Ravi shah) </br>8768765435 (Aman Sukla) </br>9865465234 ( Priya Rani)",
        "technical support" => "Technical support  Contact Details !! </br>9876565447 (Ravi shah) </br>8768765435 (Aman Sukla) </br>9865465234 ( Priya Rani)",
    "queries team" => "Queries Team  Contact Details !! </br>9876565447 (Ravi shah) </br>8768765435 (Aman Sukla) </br>9865465234 ( Priya Rani)",
    
    
        "medicine info" => "Please type the exact name of medicine product which are avilable in our medicine store to get information </br> For medicine store click here : <a href=http://localhost/hospitals/medicinestore.php>Link</a>",
    
    "paracetamol 500mg" => "Paracetamol 500mg</br></br>common painkiller used to treat aches and pain. It can also be used to reduce a high temperature. It's available combined with other painkillers and anti-sickness medicines. It's also an ingredient in a wide range of cold and flu remedies.</br> For more info Click here :<a href=https://www.medicines.org.uk/emc/product/5164/pil#gref>Link</a>",
    "benylin" => "Benylin</br></br>temporary relief of coughs without phlegm that are caused by certain infections of the air passages (such as sinusitis, common cold).</br> For more info Click here :<a href=https://www.webmd.com/drugs/2/drug-54040-8238/benylin-oral/dextromethorphan-liquid-oral/details#:~:text=This%20medication%20is%20used%20for,as%20sinusitis%2C%20common%20cold).>Link</a> ",
    
    "discount info" => "you can have 20% discount for CG company mediciine </br> promocode : FIRSTUSER for flat off for new user",
     "discount" => "you can have 20% discount for CG company mediciine </br> promocode : FIRSTUSER for flat 50% off new user",
     "discount offer" => "you can have 20% discount for CG company mediciine </br> promocode : FIRSTUSER for flat 50% off for new user",
    
       "return" => "your order will be replaced within 7 days </br> The delivery boy will come to pick the product next day of replacement request. ",
     "replace" => "your order will be replaced within 7 days </br> The delivery boy will come to pick the product next day of replacement request. ",
     "replacement" => "your order will be replaced within 7 days </br> The delivery boy will come to pick the product next day of replacement request. ",
    
     "cancel" => "If you paid through a credit card,</br> you will receive your refund back within 7 to 10 calendar days from the date of cancellation to the same credit card which was used to make the initial payment." ,
       "refund" => "If you paid through a credit card,</br> you will receive your refund back within 7 to 10 calendar days from the date of cancellation to the same credit card which was used to make the initial payment.",
    
    
    "what is your name" => "My name is " . $bot->getName(),
    "what is your gender" => "I am a " . $bot->getGender(),
    "what is covid" => "Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus.",
    "how to contact you" => "Go to contact us page and there you can see a form, fill that and submit it we will soon reply to your queries."
];

if (isset($_GET['msg'])) {
    $msg = strtolower($_GET['msg']);
    $bot->hears($msg, function (Bot $botty) {
        global $msg;
        global $questions;
        if ($msg == 'hi'|| $msg == "hlo" || $msg == "hello") {
            $botty->reply('Hello there! How can i help you ?</br> here are some options </br>Use these keywords for our customer support</br> </br> 
            - Ambulance   (for contact details of ambulance) </br>    
            - Medicine info (medicine store medicine information)</br>
            - location    (locationlink for visting our office) </br> 
            - Reschedule  (to reschedule date and time) </br>
            - Payment isuue  ( problems during payment) </br>
            - return or cancel  (if any issue for cancel or return order ) </br>
            - discount info  (regarding discount policies) </br>
            - contact details  (for other relevant contact no) </br>
            </br>
            </br>
            Have U Checked our Free Service !!</br>
           
            click here : <a href="http://localhost/hospitals/Freeservice.php">Link</a>
            
            
             ');
        } elseif ($botty->ask($msg, $questions) == "") {
            $botty->reply("Can't respond to that </br> Please type the Keywords correctly");
        } else {
            $botty->reply($botty->ask($msg, $questions));
        }
    });
}

