# O serviço está indisponível devido ao SINESP ter mudado a chamada da consulta. Assim que tivermos alguma novidade, vamos atualizar o código para que a consulta volte ao normal!


# Consulta Placa de Veículo SINESP Cidadão

Exemplo básico para realizar consulta de placas de veículos na base de dados do SINESP Cidadão. O script pesquisa no serviço SOAP do SINESP e retorna os dados do veículo

## Como funciona?

Basta você passar via GET a placa do veículo "placa" e opcionalmente o tipo de retorno (xml, json ou html - padrão) via "type".

* JSON: http://placa.hol.es/?placa=AFT0017&type=json

```json
{
"codigoRetorno": "0",
"mensagemRetorno": "Sem erros.",
"codigoSituacao": "0",
"situacao": "Sem restrição",
"modelo": "I/FERRARI 360 MODENA",
"marca": "I/FERRARI 360 MODENA",
"cor": "VERMELHA",
"ano": "1999",
"anoModelo": "2000",
"placa": "AFT0017",
"data": "12/09/2015 00:01:42",
"uf": "PR",
"municipio": "QUATRO BARRAS",
"chassi": "************15765"
}
```

* XML: http://placa.hol.es/?placa=FTR2828&type=xml

```xml
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
<soap:Body>
<ns2:getStatusResponse xmlns:ns2="http://soap.ws.placa.service.sinesp.serpro.gov.br/">
<return>
<codigoRetorno>0</codigoRetorno>
<mensagemRetorno>Sem erros.</mensagemRetorno>
<codigoSituacao>0</codigoSituacao>
<situacao>Sem restrição</situacao>
<modelo>I/LAMBORGHINI GALLARDO S</modelo>
<marca>I/LAMBORGHINI GALLARDO S</marca>
<cor>BRANCA</cor>
<ano>2012</ano>
<anoModelo>2012</anoModelo>
<placa>FTR2828</placa>
<data>12/09/2015 00:18:57</data>
<uf>SP</uf>
<municipio>SAO PAULO</municipio>
<chassi>************11812</chassi>
</return>
</ns2:getStatusResponse>
</soap:Body>
</soap:Envelope>
```

* HTML: http://placa.hol.es/?placa=FFF0012
```html
codigoRetorno = 0
mensagemRetorno = Sem erros.
codigoSituacao = 1
situacao = Roubo/Furto
modelo = I/MMC L200 4X4
marca = I/MMC L200 4X4
cor = INDEFINIDA
ano = 1992
anoModelo = 0
placa = FFF0012
data = 12/09/2015 00:22:40
uf = SP
municipio = SAO PAULO
chassi = ************01561
```

## Referências
* https://paoloo.wordpress.com/2014/03/05/minha-primeira-tentativa-de-decodificar-um-apk-android-e-usar-seu-servico/
* https://github.com/paoloo/servicos/blob/master/placa.py
* https://github.com/bbarreto/sinesp-api
* https://gist.github.com/ronanrodrigo/5d4b1ee84ee2bb9e711f
* https://gist.github.com/putyoe/7c0ad6999419ffbfa77b
* http://pt.stackoverflow.com/questions/58860/consulta-ve%C3%ADculo-pela-placa-no-site-sinesp-via-php

## Melhorias!
O script tem muita coisa para melhorar. Se quiser ajudar, faça um fork do projeto e envie um pull request.

## Site SINESP
https://www.sinesp.gov.br/sinesp-cidadao
