@props(['mails'])

<table class="table-auto w-full">
  <thead>
    <tr>
        <th>Asunto</th>
        <th>Enviado a</th>
        <th>Status</th>
        <th>Fecha de envio</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($mails as $mail)
        @if ($loop->iteration % 2 == 0)
            <tr>
        @else
            <tr class="bg-blue-200">
        @endif
    
        <td>{{$mail->subject}}</td>
        <td>{{$mail->to}}</td>
        <td>{{$mail->statusText}}</td>
        <td>{{$mail->emailSentAtFormat}}</td>
        </tr>
    @endforeach
  </tbody>
</table>
