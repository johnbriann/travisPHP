<?php
class Push_notification extends CI_Model{
    public function __construct(){
        parent:: __construct();
        ob_start();
    }
	function notification($id = NULL, $type = NULL, $data = NULL){
		// echo "here";
		$fields = array();
		// $fields['registration_ids'] = $id;
		$messagebody = $data['message'];
		// unset($data['message']);
		$fields['to'] = $id[0];
		$fields['data'] = $data;
		if($type == 'ios'){
			$fields['content_available'] = true;
			$fields['mutable_content'] = true;
			$fields['notification'] = array(
				"body" => $messagebody,
				'sound' => 'default',
			);
		}
		// echo "<pre>";print_r($fields);echo "</pre>";exit;
		$send = $this->send($fields);
		if($send){
			return true;
		}else{
			return false;
		}
	}
	public function send($fields = NULL){
		// echo "<pre>";print_r($fields);echo "</pre>";exit;
		$url = 'https://fcm.googleapis.com/fcm/send';
		$headers = array(
			'Authorization:key = AAAA7s4w0QQ:APA91bEEfqNOPq3JKRQIwHtd7YZxsNaruc2F2wYcAvUouGzdUxcdQtFg-aSxRxJKAAOazm_m_kX-lJHsGM_kbXHt7jdK-TlUyf7-_8kUEp8VE2Lp-EDI5hHNkjo4zbMVsST3NDImpuFI',
			'Content-Type: application/json'
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);           
		if ($result === FALSE) {
			// return false;
			die('Curl failed: ' . curl_error($ch));
		}
		curl_close($ch);
		// echo "<pre>";print_r($result);echo "</pre>";
		// echo $result;
		return $result;
		
	}
}