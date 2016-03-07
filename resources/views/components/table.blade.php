<div class="card">
    <div class="item item-divider">
        Relatório de Ordens de Venda / Ordens de Compra
    </div>
    <div class="item item-text-wrap">
        <ion-list>
            <ion-refresher pulling-text="Deslize para Atualizar" on-refresh="doRefresh()"></ion-refresher>
            <ion-item class="item item-avatar" ng-repeat="item in products | filter: query">
                <img ng-hide="item.imagem==null" src="http://delivery.ilhanet.com/images/@{{ item.imagem }}">
                <h2>@{{ item.nome }}</h2>
            </ion-item>
        </ion-list>
        @if (count($matriz)>0)
            @foreach($matriz as $linha => $dadoLinha)
                <div class="row responsive-sm">
                    <div class="col col-33">{{ $matriz[$linha]['nomes'] }}</div>
                    <div class="col col-10">{{ (new \NumberFormatter(config('app.locale'), \NumberFormatter::CURRENCY))->format( isset($matriz[$linha][1])?$matriz[$linha][1]:0 ) }}</div>
                    <div class="col col-10">{{ (new \NumberFormatter(config('app.locale'), \NumberFormatter::CURRENCY))->format( isset($matriz[$linha][2])?$matriz[$linha][2]:0 ) }}</div>
                </div>
            @endforeach
        @endif

        @if (count($somaMatriz)>1)
            <div class="row responsive-sm">
                <div class="col col-33">Totais ({{ (new \NumberFormatter(config('app.locale'), \NumberFormatter::CURRENCY))->format(array_sum($somaMatriz)) }} / {{ (new \NumberFormatter(config('app.locale'), \NumberFormatter::CURRENCY))->format($somaMatriz[1]-$somaMatriz[2]) }})</div>
                <div class="col col-10">{{ (new \NumberFormatter(config('app.locale'), \NumberFormatter::CURRENCY))->format( $somaMatriz[1] ) }}</div>
                <div class="col col-10">{{ (new \NumberFormatter(config('app.locale'), \NumberFormatter::CURRENCY))->format( $somaMatriz[2] ) }}</div>
            </div>
        @endif

    </div>
</div>