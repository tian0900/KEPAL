@component('mail::message')
# ACTIVATION EMAIL

Halo, {{$user->name}}

Berikut Kode Verifikasi Anda <b>{{$user->token_activation}}</b><br>
Silahkan Masukkan kode OTP tersebut untuk verifikasi

@component('mail::button', ['url' => ''])
    Active 
@endcomponent

Thanks,<br>
Das Bogas
@endcomponent
