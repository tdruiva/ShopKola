<?php
	header('Content-type: text/html; charset=utf-8');
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$email = $_POST['email'];
		$return = false;
		if ($email and preg_match('/^(?!(?>"?(?>\\\[ -~]|[^"])"?){255,})(?!"?(?>\\\[ -~]|[^"]){65,}"?@)(?>([!#-\'*+\/-9=?^-~-]+)(?>\.(?1))*|"(?>[ !#-\[\]-~]|\\\[ -~])*")@(?!.*[^.]{64,})(?>([a-z0-9](?>[a-z0-9-]*[a-z0-9])?)(?>\.(?2)){0,126}|\[(?:(?>IPv6:(?>([a-f0-9]{1,4})(?>:(?3)){7}|(?!(?:.*[a-f0-9][:\]]){7,})((?3)(?>:(?3)){0,5})?::(?4)?))|(?>(?>IPv6:(?>(?3)(?>:(?3)){5}:|(?!(?:.*[a-f0-9]:){5,})(?5)?::(?>((?3)(?>:(?3)){0,3}):)?))?(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9]?[0-9])(?>\.(?6)){3}))\])$/iD', $email)){
			
			$fileEmails = fopen('emails.csv', 'r+');

			while(($data = fgetcsv($fileEmails, 0, ",")) !== FALSE){
				foreach ($data as $d) {
					if ($d == $email){
						echo json_encode(array('message'=>'Este endereço de e-mail já está participando!', 'status'=>'fail'));
						$return = true;
						break 2;
					}
				}
			}

			if (!$return){
				$field = sprintf("%s\n", $email);
				if (fwrite($fileEmails, $field)){
					fclose($fileEmails);
					echo json_encode(array('message'=>"E-mail cadastrado com sucesso!", 'status'=> 'success'));
				}
				else {
					echo json_encode(array('message'=> "Ocorreu um erro!", 'status'=> 'fail'));
				}
			}
						
		} else{
			echo json_encode(array('message'=>"E-mail inválido!", 'status'=> 'fail'));
		}
	}
?>