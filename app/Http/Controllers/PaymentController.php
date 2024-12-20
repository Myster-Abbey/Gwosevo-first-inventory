<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\Registrars;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function hubtel_payment()
    {
        $transaction_id =  random_int(100000000000, 9999999999999);
        $clientid = "3KVXVkp";
        $secret = "f4dc3b2da02f49f791057ecc265e0c87";

        $api_url = "https://rmp.hubtel.com/merchantaccount/merchants/2023100/receive/mobilemoney";

        try
        {
            $body = [
                "Amount" => request('actual_amount'),
                "ClientReference" => (string) $transaction_id,
                "Description" => "Payment for Calabash Color Festival",
                "PrimaryCallbackUrl" => "https://calabash.txtghana.com/api/hubtel/callback",
                "CustomerMsisdn" => request('msisdn'),
                "Channel" => request('network'),
            ];

            $response = Http::withHeaders([
                "Cache-Control" => "no-cache",
                "Content-Type" => "application/json",
                "Authorization" => "Basic " . base64_encode("$clientid:$secret"),
            ])
            ->post($api_url, $body)
            ->json();

            Transaction::create([
                "msisdn" => request('msisdn'),
                "network" => request('network'),
                "transaction_id" => $transaction_id,
                "actual_amount" => request('actual_amount'),
                "approved_amount" => request('actual_amount'),
                "transaction_status" => "pending",
                "payment_provider" => "hubtel"
            ]);

            Log::info("Hubtel Payment Response :", $response);
            return $response;
        }
        catch (\Exception $ex)
        {
            Log::error('Payment API request failed: ' . $ex->getMessage());
        }
    }


    public function check_hubtel_transaction($clientReference)
    {
        $api_url = "https://api-txnstatus.hubtel.com/transactions/2023100/status?clientReference=$clientReference";
        $clientid = "57xmz9x";
        $secret = "5cfffe743dbe408b80ec51a374c113dc";

        $response = Http::withHeaders([
            "Cache-Control" => "no-cache",
            "Content-Type" => "application/json",
            "Authorization" => "Basic " . base64_encode("$clientid:$secret"),
        ])
        ->get($api_url)
        ->json();

        Log::info("Hubtel check Transaction Response :", $response);
        return $response;
    }


    public function payment()
    {
        $transaction_id =  random_int(100000000000, 9999999999999);
        $clientid = "calabash665f22c6cd97b";
        $secret = "YWU0OWVmMDdlMDZmNjUxN2NkMmY1MzM0MWQ0ZjMzZjY=";

        $api_url = "https://prod2.theteller.net/process/transaction/async";

        try
        {
            Log::info(request()->all());
            $body = [
                "amount" => request('actual_amount'),
                "processing_code" => "000200",
                "transaction_id" => (string) $transaction_id,
                "desc" => "Payment for Calabash Color Festival",
                "merchant_id" => "TTM-00009289",
                "callback_url" => "https://calabash.txtghana.com/api/payment/callback",
                "subscriber_number" => request('msisdn'),
                "r-switch" => request('network'),
                "reference" => "Calabash Ticket Payment",
                "merchant_data" => json_encode(request("user_data")),
            ];

            $response = Http::withHeaders([
                "Cache-Control" => "no-cache",
                "Content-Type" => "application/json",
                "request-id" =>  $transaction_id,
                "Authorization" => "Basic " . base64_encode("$clientid:$secret"),
            ])
            ->post($api_url, $body)
            ->json();

            Log::info("Pyament Request", $body);
            Log::info("Payment Response :", $response);
        }
        catch (\Exception $ex)
        {
            Log::error('Payment API request failed: ' . $ex->getMessage());
        }
    }


    public function payment_callback()
    {
        $response = file_get_contents("php://input");
        Log::info($response);

        $response = json_decode($response, true);
        $user = json_decode($response['merchant_data'], true);

        if($response["status"] == "Approved")
        {
            Transaction::create([
                "msisdn" => $user['msisdn'],
                "network" => $user['network'],
                "transaction_id" => $response['transaction_id'],
                "actual_amount" => $user['actual_amount'],
                "approved_amount" => $user["approved_amount"],
                "transaction_status" => "success",
            ]);

            $code = Code::where("status", "unused")->first();

            Registrars::create([
                "msisdn" => $user['msisdn'],
                "network" => $user['network'],
                "actual_amount" => $user['actual_amount'],
                "approved_amount" => $user["approved_amount"],
                "package_quantity" => $user["package_quantity"],
                "code" => $code->code
            ]);

            $code->update([
                "status" => "used"
            ]);

            $package_quantity = $user["package_quantity"];

            $msg = "Congrats! You have successfully gained access to the festival grounds for $package_quantity people. You have also gained " . ($package_quantity * 2) . " color pouches. Your entry code is $code->code";

            $this->send_sms($user['msisdn'], $msg);

            return;
        }

        Transaction::create([
            "msisdn" => $user['msisdn'],
            "network" => $user['network'],
            "transaction_id" => $response['transaction_id'],
            "actual_amount" => $user['actual_amount'],
            "approved_amount" => $user["approved_amount"],
            "transaction_status" => "failed",
        ]);

        return;
    }

    private function send_sms($msisdn, $msg)
    {
        $payload = [
            "to" => $msisdn,
            "from" => "CalabashFST",
            "unicode" => 1,
            "sms" => $msg
        ];

        try {
            $url = "https://txtconnect.net/dev/api/sms/send";
            $token = "urwiw9U7GQAqgByiaaD0UAc08YICadSbctCisjQcWHVX9d52SD";

            Http::withToken($token)->post($url, $payload);
        }
        catch (\Exception $e)
        {
            Log::error('SMS sending failed: ' . $e->getMessage());
        }
    }
}
