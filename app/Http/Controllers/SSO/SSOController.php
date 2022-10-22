<?php

namespace App\Http\Controllers\SSO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
Use App\Models\User;

class SSOController extends Controller
{
    public function getLogin(Request $request)
    {
        $request->session()->put('state', $state = Str::random(40));

        $query = http_build_query([
            'client_id' => '968b13a6-2ff9-4c11-906c-58d1ced8bdbf',
            'redirect_uri' => 'http://kelompok6.live/callback',
            'response_type' => 'code',
            'scope' => 'user-view',
            'state' => $state,
        ]);

        return redirect('http://20.227.138.204/oauth/authorize?'.$query);
    }
    public function getCallback(Request $request)
    {
        $state = $request->session()->pull('state');

        throw_unless(
            strlen($state) > 0 && $state === $request->state,
            InvalidArgumentException::class
        );

        $response = Http::asForm()->post('http://20.227.138.204/oauth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => '968b13a6-2ff9-4c11-906c-58d1ced8bdbf',
            'client_secret' => 'an9hHdNFaMIUFAYQ7h4DoWDMzUe2NoOR8nvZmJp1',
            'redirect_uri' => 'http://kelompok6.live/callback',
            'code' => $request->code,
        ]);
        $request->session()->put($response->json());
        // return $response->json();
        return redirect(route('sso.connect'));
    }
    public function connectUser(Request $request)
    {
        $accessToken = $request->session()->get('access_token');
        // $accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5NjI1MzkxOC0wZThhLTRkMmItYjAxMC02NGZmZTk3NzE3NzMiLCJqdGkiOiIxMDk0OTM1OWIxM2UzYjQ1MDFkNGRmMmQ5YzFjMzJkYWEyZDJjYzZlYTNjMTcxMzQwNmVjOTI3MmM4ZmYwMjc1MWViMzI2N2Q4MTBkN2U3MSIsImlhdCI6MTY1MDg2Njc2OC41NzU5MzksIm5iZiI6MTY1MDg2Njc2OC41NzU5NDUsImV4cCI6MTY1MjE2Mjc2OC4yMDQ3MDMsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.XiOHcHVjTc3xTA6ZmmK7AeMwtrnrqsL6hbUowT5ijPl4vYpOjEXNBEP3PwH_j2tcyY2FWZLt0oAdX0gpyiOIdCMMsYU6xhwuv53S9YFl4FASxLbhBNY3xa1oUFTw8niFnieYLHJiLbkJbUhGkaW76BlfAsTMQlZCBiGWFF5Hr9aFirfLrm0SF861uEIwcS-AGaoDyRRSU976KVuj7HyqF8cpQQdcibthWNPS4FToZMRx_BX2RFonD_J6jCDEzuwLF7jv7Jt3tFPsQW1hxPzbRIyfcs-5Y0ZcFeOcf4_7-NMG9x_HEsVelGEjR84Lnz0TYkEPKtGG6w58rycjQMZaZ92s0afxJm9grwh_nGxjpoxUaPAoZaSpB6ykF-ObswOwUW73qc-jaAMP7pWtvika1Ybr-oDVYD2O9y_BBwjYDLP1Px4q96v8K2Xro_8jP9r0bnuaqmFJFtpMPM5ato5V7YHakyJMBwfSNe1c69iQQQHUTESUp4_yzncPMn2Bma9hbCcRFulcgwAZXZ30o2zeT7T0gouuLrm4N4oq3a-nODE7MerKOOZk8mY5Y0ntcIyaUNgYsq-uDzjr4lKMeqENlTW2LFtJU0EEZ7jJKJfdCZT6Cw5eriAnqBIoUFVRWsL_aQnwVbifOiSyiVwn56nL4K9LgVevIwfMiTfsLyWDpKM';
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$accessToken,
        ])->get('http://20.227.138.204/api/user');

        $userArray =  $response->json();
        // dd($userArray);
       // echo $userArray[][1];
       try {
           $email = $userArray['data']['user']['email'];
       } catch (\Throwable $th) {
           return redirect('login')->withError('Failed to Get Login Information, Try Again');
       }

       $user = User::where('email',$email)->first();
        if(!$user)
        {
            $user = new User;
            $user->name = $userArray['data']['user']['name'];
            $user->email = $userArray['data']['user']['email'];
            $user->password = encrypt('12345678');
            $user->save();
        }
        $user->assignRole('Sales');
        Auth::login($user);
        return redirect(route('home'));
    }
}