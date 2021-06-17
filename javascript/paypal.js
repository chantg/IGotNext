var amount = document.querySelector('#total').innerHTML.slice(1,document.querySelector('#total').innerHTML.length);
function getCookie1(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');

  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
	//alert(c.substring(name.length, c.length));
      return c.substring(name.length, c.length);
    }
  }
  return "";
}


function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'pill',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"USD","value":amount}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            console.log(details);
	    
	    $.ajax({
            url: "invoice.php",
            type: "post",
	    dataType: "JSON",
            data: {"ID": details.purchase_units[0].payments.captures[0].id,
			"Name": details.payer.name.given_name +" "+details.payer.name.surname,
		     "Price":details.purchase_units[0].payments.captures[0].amount.value ,
		     "Address":details.purchase_units[0].shipping.address.address_line_1 + " "+
			details.purchase_units[0].shipping.address.admin_area_1 + ", "+
			details.purchase_units[0].shipping.address.admin_area_2 + ", "+
			details.purchase_units[0].shipping.address.country_code + ", "+
			details.purchase_units[0].shipping.address.postal_code,
			"Email":details.payer.email_address},
	    success: function(response){
		console.log("Success");
		console.log(response.Name);
		}
        });
	    window.location.replace("http://192.168.1.210/success.php?ID="+details.purchase_units[0].payments.captures[0].id);
		//console.log();
		//console.log();
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');

    }
    initPayPalButton();
