var amount = document.querySelector('#total').innerHTML.slice(1,document.querySelector('#total').innerHTML.length);

const baseRequest = {
  apiVersion: 2,
  apiVersionMinor: 0
};
const tokenizationSpecification = {
  type: 'PAYMENT_GATEWAY',
  parameters: {
  "gateway": "stripe",
  "stripe:version": "2018-10-31",
  "stripe:publishableKey": "pk_test_51IvXVMBICnQv0mUKXmIAjOEzsm6fsPmLnodmfnZ8XhAXr15Db7Lf5cWZoIreOSfalKjdOtDprMptg6hAIUZmcJAu00tGcEQyRd"  
}
};
const allowedCardNetworks = ["AMEX", "DISCOVER", "INTERAC", "JCB", "MASTERCARD", "VISA"];
const allowedCardAuthMethods = ["PAN_ONLY", "CRYPTOGRAM_3DS"];
const baseCardPaymentMethod = {
  type: 'CARD',
  parameters: {
    allowedAuthMethods: allowedCardAuthMethods,
    allowedCardNetworks: allowedCardNetworks
  }
};
const cardPaymentMethod = Object.assign(
  {},
  baseCardPaymentMethod,
  {
    tokenizationSpecification: tokenizationSpecification
  }
);
let paymentsClient = null;
function getGoogleIsReadyToPayRequest() {
	return Object.assign(
	{},
	baseRequest,
	{
		allowedPaymentMethods: [baseCardPaymentMethod]
	}
	);
}

/**
 * Configure support for the Google Pay API
 *
 * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#PaymentDataRequest|PaymentDataRequest}
 * @returns {object} PaymentDataRequest fields
 */
function getGooglePaymentDataRequest() {
	const paymentDataRequest = Object.assign({}, baseRequest);
	paymentDataRequest.allowedPaymentMethods = [cardPaymentMethod];
	paymentDataRequest.transactionInfo = getGoogleTransactionInfo();
	paymentDataRequest.merchantInfo = {
	merchantId:'BCR2DN6TR6VOZBCW',
	merchantName:'IGotNext'
};

	paymentDataRequest.callbackIntents = ["PAYMENT_AUTHORIZATION"];

	return paymentDataRequest;
}

/**
 * Return an active PaymentsClient or initialize
 *
 * @see {@link https://developers.google.com/pay/api/web/reference/client#PaymentsClient|PaymentsClient constructor}
 * @returns {google.payments.api.PaymentsClient} Google Pay API client
 */
function getGooglePaymentsClient() {
	if ( paymentsClient === null ) {
		paymentsClient = new google.payments.api.PaymentsClient({
		environment: 'TEST',
		paymentDataCallbacks: {
		onPaymentAuthorized: onPaymentAuthorized
		}
		});
	}
	return paymentsClient;
}

/**
 * Handles authorize payments callback intents.
 *
 * @param {object} paymentData response from Google Pay API after a payer approves payment through user gesture.
 * @see {@link https://developers.google.com/pay/api/web/reference/response-objects#PaymentData object reference}
 *
 * @see {@link https://developers.google.com/pay/api/web/reference/response-objects#PaymentAuthorizationResult}
 * @returns Promise<{object}> Promise of PaymentAuthorizationResult object to acknowledge the payment authorization status.
 */
function onPaymentAuthorized(paymentData) {
  return new Promise(function(resolve, reject){
	// handle the response
	processPayment(paymentData)
      .then(function() {
        resolve({transactionState: 'SUCCESS'});
	console.log(paymentData);
      })
      .catch(function() {
        resolve({
          transactionState: 'ERROR',
          error: {
            intent: 'PAYMENT_AUTHORIZATION',
            message: 'Insufficient funds, try again. Next attempt should work.',
            reason: 'PAYMENT_DATA_INVALID'
          }
        });
	    });
	});
}

/**
 * Initialize Google PaymentsClient after Google-hosted JavaScript has loaded
 *
 * Display a Google Pay payment button after confirmation of the viewer's
 * ability to pay.
 */
function onGooglePayLoaded() {
	const paymentsClient = getGooglePaymentsClient();
	paymentsClient.isReadyToPay(getGoogleIsReadyToPayRequest())
    .then(function(response) {
      if (response.result) {
        addGooglePayButton();
      }
    })
    .catch(function(err) {
      // show error in developer console for debugging
      console.error(err);
    });
}

/**
 * Add a Google Pay purchase button alongside an existing checkout button
 *
 * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#ButtonOptions|Button options}
 * @see {@link https://developers.google.com/pay/api/web/guides/brand-guidelines|Google Pay brand guidelines}
 */
function addGooglePayButton() {
	const paymentsClient = getGooglePaymentsClient();
	const button =
	paymentsClient.createButton({onClick: onGooglePaymentButtonClicked, buttonSizeMode: 'fill',});
	document.getElementById('containerGoogle').appendChild(button);
}

/**
 * Provide Google Pay API with a payment amount, currency, and amount status
 *
 * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#TransactionInfo|TransactionInfo}
 * @returns {object} transaction info, suitable for use as transactionInfo property of PaymentDataRequest
 */
function getGoogleTransactionInfo() {
	return {
	displayItems: [
	{
		label: "Subtotal",
		type: "SUBTOTAL",
		price: amount,
	},
	{
		label: "Tax",
		type: "TAX",
		price: "1.00",
	}
	],
	countryCode: 'US',
	currencyCode: "USD",
	totalPriceStatus: "FINAL",
	totalPrice: amount,
	totalPriceLabel: "Total"
	};
}


/**
 * Show Google Pay payment sheet when Google Pay payment button is clicked
 */
function onGooglePaymentButtonClicked() {
	const paymentDataRequest = getGooglePaymentDataRequest();
	paymentDataRequest.transactionInfo = getGoogleTransactionInfo();

	const paymentsClient = getGooglePaymentsClient();
	paymentsClient.loadPaymentData(paymentDataRequest);
}

let attempts = 0;
/**
 * Process payment data returned by the Google Pay API
 *
 * @param {object} paymentData response from Google Pay API after user approves payment
 * @see {@link https://developers.google.com/pay/api/web/reference/response-objects#PaymentData|PaymentData object reference}
 */
function processPayment(paymentData) {
  return new Promise(function(resolve, reject) {
    setTimeout(function() {
      // @todo pass payment token to your gateway to process payment
      paymentToken = paymentData.paymentMethodData.tokenizationData.token;

			if (attempts++ % 2 == 0) {
	      reject(new Error('Every other attempt fails, next one should succeed'));      
      } else {
	      resolve({});      
      }
	}, 500);
	});
}
