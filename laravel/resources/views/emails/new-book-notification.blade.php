@component('mail::message')
<style>
@import url('{{ asset('css/email.css') }}');
</style>
# Biblioteca Virtual

Olá meu querido, estamos entrando em contato para informa-lo,
que um novo livro foi adicionado a nossa base, venha conferir.


@component('mail::button', ['url' => 'http://localhost:8080/'])
Acesse aqui
@endcomponent

Obrigado,<br>
{{ config('Biblioteca Virtual') }}
@endcomponent
