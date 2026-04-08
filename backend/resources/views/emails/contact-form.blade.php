<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Neue Kontaktanfrage</title>
    <style>
        body { font-family: 'Helvetica Neue', Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f5f5f5; }
        .container { max-width: 600px; margin: 20px auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .header { background-color: #002C63; color: #fff; padding: 24px 32px; }
        .header h1 { margin: 0; font-size: 20px; }
        .body { padding: 32px; }
        .field { margin-bottom: 16px; }
        .field-label { font-weight: 600; color: #002C63; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px; }
        .field-value { font-size: 15px; color: #333; }
        .message-box { background: #f9fafb; border-left: 4px solid #D4AF37; padding: 16px; margin-top: 8px; white-space: pre-wrap; }
        .footer { background: #f9fafb; padding: 16px 32px; font-size: 12px; color: #888; border-top: 1px solid #eee; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Neue Kontaktanfrage – B&U BundU</h1>
        </div>
        <div class="body">
            <div class="field">
                <div class="field-label">Name</div>
                <div class="field-value">{{ $formData['name'] }}</div>
            </div>
            <div class="field">
                <div class="field-label">E-Mail</div>
                <div class="field-value"><a href="mailto:{{ $formData['email'] }}">{{ $formData['email'] }}</a></div>
            </div>
            @if(!empty($formData['phone']))
            <div class="field">
                <div class="field-label">Telefon</div>
                <div class="field-value">{{ $formData['phone'] }}</div>
            </div>
            @endif
            @if(!empty($formData['service']))
            <div class="field">
                <div class="field-label">Gewünschte Leistung</div>
                <div class="field-value">{{ $formData['service'] }}</div>
            </div>
            @endif
            <div class="field">
                <div class="field-label">Betreff</div>
                <div class="field-value">{{ $formData['subject'] }}</div>
            </div>
            <div class="field">
                <div class="field-label">Nachricht</div>
                <div class="message-box">{{ $formData['message'] }}</div>
            </div>
        </div>
        <div class="footer">
            Diese Nachricht wurde über das Kontaktformular auf bundu.ch gesendet.
        </div>
    </div>
</body>
</html>
