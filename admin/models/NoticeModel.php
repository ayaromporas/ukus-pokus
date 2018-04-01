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

    		if($nr1 < 3 or $nr2 < 18){

    			Messages::setMsg('Problem sa unosom. Nedovoljan broj unetih slova, naslov ili tekst poruke suviše kratak. '. $nr2, 'error');
    			return;
    		}

        $emailText = 'Poruka poslata od: '. $userName. ' ID: '.$userId. "tekst poruke: \n".$noticeBody;

    		$this->query("SELECT user_email FROM users WHERE status IN (1,2)");
    		$results = $this->resultSet();

        foreach ($results as $result) {
            mail($result['user_email'],$noticeTitle,$emailText);
        }

        $numberRecipiens = count($results);

        	Messages::setMsg('Uspešno poslata poruka administratorima!! <br>Vaša poruka je poslata na: '. $numberRecipiens . ' email adresa', 'success');

    	}else{
    		Messages::setMsg('Sva polja moraju biti popunjena', 'error');
    	}


    }	//end if submit


	}
}
