<div style="padding: 19px;margin-bottom: 20px;
    background-color: #f5f5f5;border: 1px solid #e3e3e3;border-radius: 4px;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);">
    <h1>Falha de conexão MySQL {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</h1>

    <p>Erro: {{ $error }}</p>
</div>