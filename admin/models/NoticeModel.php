<?php
class NoticeModel extends Model{

	public function Index(){

    // prijem unosa u polja, provera i unos u bazu
    if(isset($_POST['submit'])){

    	if(
    		(isset($_POST['author_id']) && is_string($_POST['author_id']) && !(empty($_POST['author_id'] )) )&&
    		(isset($_POST['notice_title']) && is_string($_POST['notice_title']) && !(empty($_POST['notice_title'])) ) &&
        (isset($_POST['notice_body']) && is_string($_POST['notice_body']) && !(empty($_POST['notice_body'])) )
    	)
    	{
    		$postArray = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    		$userId = $postArray['author_id'];
    		$userName = $postArray['author_name'];
    		$noticeTitle = $postArray['notice_title'];
        $noticeBody = $_POST['notice_body'];


    		//brojanje koliko je uneto i provera da li je sve uneto
    		$nr1 = strlen($noticeTitle);
    		$nr2 = strlen($noticeBody);

    		if($nr1 < 3 or $nr2 < 17){

    			Messages::setMsg('Problem sa unosom. Naslov mora imati 3 i više karaktera, tekst poruke mora imati više od 10 karaktera.', 'error');
    			return;
    		}
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $emailText = 'Poruka poslata od korisnika: '. $userName. ' ID: '.$userId. " tekst poruke glasi: \n".$noticeBody;

    		$this->query("SELECT user_email FROM users WHERE status IN (1,2)");
    		$results = $this->resultSet();

        foreach ($results as $result) {
            mail($result['user_email'],$noticeTitle,$emailText,$headers);
        }

        $numberRecipiens = count($results);

        	Messages::setMsg('Uspešno poslata poruka administratorima!! <br>Vaša poruka je poslata na: '. $numberRecipiens . ' email adresa', 'success');

    	}else{
    		Messages::setMsg('Sva polja moraju biti popunjena', 'error');
    	}


    }	//end if submit


	}
}