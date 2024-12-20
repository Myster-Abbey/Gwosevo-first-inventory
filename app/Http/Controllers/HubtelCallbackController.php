<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\Registrars;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HubtelCallbackController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $response = file_get_contents("php://input");
        Log::channel("hubtel_callbacks")->info($response);

        $response = json_decode($response, true);
        $payment_data = $response['Data'];

        if($response["Message"] == "success")
        {
            $transaction = Transaction::where("transaction_id", $payment_data["ClientReference"])->first();

            $transaction->update([
                "transaction_status" => "success",
                "hubtel_transaction_id" =>  $payment_data["TransactionId"],
            ]);

            $code = Code::where("status", "unused")->first();
            $package_quantity = (int) $payment_data["AmountAfterCharges"] / 50;

            Registrars::create([
                "msisdn" => $transaction->msisdn,
                "network" => $transaction->network,
                "actual_amount" => $payment_data["AmountAfterCharges"],
                "approved_amount" => $payment_data["AmountAfterCharges"],
                "package_quantity" => $package_quantity,
                "code" => $code->code
            ]);

            $code->update([
                "status" => "used"
            ]);

            $msg = "Congrats! You have successfully gained access to the festival grounds for $package_quantity people. You have also gained " . ($package_quantity * 2) . " color pouches. Your entry code is $code->code";

            $this->send_sms($transaction->msisdn, $msg);

            return response()->json([
                "data" => [
                    "status" => "OK"
                ]
            ]);
        }
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
