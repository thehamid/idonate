<?php

add_shortcode('iDonate_form','idonate_form_function');

function idonate_form_function(){

    if (isset($_POST['idonate_form_pay'])){

	    $error_message='';
        $data=[
            'name'=>sanitize_text_field($_POST['idonate_form_name']),
            'family'=>sanitize_text_field($_POST['idonate_form_family']),
            'amount'=>intval($_POST['idonate_form_amount']),
            'email'=>sanitize_text_field($_POST['idonate_form_email']),
            'mobile'=>$_POST['idonate_form_mobile'],
            'address'=>sanitize_text_field($_POST['idonate_form_address']),
            'city'=>sanitize_text_field($_POST['idonate_form_city']),
            'country'=>sanitize_text_field($_POST['idonate_form_country']),
            'zipcode'=>sanitize_text_field($_POST['idonate_form_zipcode']),
            'description'=>sanitize_text_field($_POST['idonate_form_description']),
            'date'=>date('Y/m/d  H:i:s'),
            'order_id'=>date('Ymd').rand(1000,9999),
        ];

        if (empty($data['name']) || empty($data['family']) || empty($data['amount']) || empty($data['email']) || empty($data['mobile']) || empty($data['address']) ||
            empty($data['city']) || empty($data['country']) || empty($data['zipcode'])){
            $error_message='* Please filled all field!';
        }else{
	            if (filter_var($data['email'].FILTER_VALIDATE_EMAIL)){
					global $wpdb, $table_prefix;

					$data_result=[
						'name'=>$data['name'],
						'email'=>$data['email'],
						'mobile'=>$data['mobile'],
						'description'=>$data['description'],
						'amount'=>$data['amount'],
						'order_id'=>$data['order_id'],
						'date'=>$data['date'],
					];

					$wpdb->insert($table_prefix.'idonate_doners',$data_result,array('%s','%s','%s','%s','%d','%s','%s',));

		        }else{
			        $error_message='* Please  enter email corrected!';
		        }

	        }
        }

	$active_idonate=get_option('active_idonate');

	if($active_idonate) {

		$content = '

    <div id="idonate_form_message">
            <p class="alert">' . $error_message . '</p>
    </div>
    <form action="" method="post" id="idonate_form">
    <p>
   <label>Donor Name</label>
   <input type="text" placeholder="First name" name="idonate_form_name"/>
   <input type="text" placeholder="Last name" name="idonate_form_family"/>
   </p>
   
    <p>
   <label>Donate amount</label>
   <input type="number" placeholder="Donate amount between 5 and 2000 Dollar" name="idonate_form_amount"/>
   </p>
    
    <p>
   <label>Email</label>
   <input type="email" placeholder="Ex:email@email.com" name="idonate_form_email"/>
   </p>
   
    <p>
   <label>Mobile</label>
   <input type="number" placeholder="Ex:+989123456789" name="idonate_form_mobile"/>
   </p>
    
     <p>
   <label>Address</label>
   <input type="text" placeholder="Address" name="idonate_form_address"/>
   <input type="text" placeholder="City" name="idonate_form_city"/>
   <input type="text" placeholder="Country" name="idonate_form_country"/>
   <input type="text" placeholder="Postal code" name="idonate_form_zipcode"/>
   </p>
    
    <p>
   <label>Description Donate</label>
   <input type="text" placeholder="Description" name="idonate_form_description"/>
   </p>
    
' . wp_nonce_field() . '
    <p>
   <input type="submit" value="Pay Now" name="idonate_form_pay"/>
   </p>
   
    </form>
        
    
    ';
	}
	else{
		$content='<center><h2>iDonate Form Not Active</h2></center>';
	}

    return $content;
}

