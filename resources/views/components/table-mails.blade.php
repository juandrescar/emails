@props(['mails'])

<table class="table-fixed">
  <thead>
    <tr>
        <th class="w-1/2 ...">Asunto</th>
        <th class="w-1/2 ...">Enviado a</th>
        <th class="w-1/2 ...">Status</th>
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
        </tr>
    @endforeach
  </tbody>
</table>
