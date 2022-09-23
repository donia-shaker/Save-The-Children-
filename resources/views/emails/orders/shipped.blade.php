@component('mail::message')

# اعادة ضبط كلمة المرور 

يمكنك استعادة حسابك عند الضغط على الزر بالاسفل الذي سينقلك لتعبئه بياناتك

@component('mail::button', ['url' => $data['activation_url'] ])
تغيير كلمة المرور 
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
