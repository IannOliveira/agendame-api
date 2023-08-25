<p>Olá {{ $user->first_name }} ,</p>
<p>Seja bem-vindo ao AgendaMe</p>
<a href="{{ config('app.site_url') }}/verificar-email?token={{ $user->token }}">Verificar Email</a>
