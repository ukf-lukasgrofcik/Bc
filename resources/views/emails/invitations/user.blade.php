@component('mail::message')
# Pozvánka do evidenčného systému

Dobrý deň,
<br>
boli ste pozvaný do Evidenčného systému pre odbornú prax Univerzity Konštantína Filozofa v Nitre.
<br>
Vaše pozvanie bolo realizované používateľom {{ $inviter }}.
<br>
Pre prijatie pozvania sa prosím zaregistrujte pomocou tlačidla pod týmto textom.

@component('mail::button', ['url' => $url])
Registrácia
@endcomponent

V prípade nefunkčnosti tlačidla Vás poprosíme o použitie tejto URL <a href="{{ $url }}">{{ $url }}</a>
<br>
S pozdravom,
<br>
Univerzita Konštantína Filozofa v Nitre

@endcomponent
