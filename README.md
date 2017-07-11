## Update 3 (10/06/17)
Existem alguns sites que disponivilizam consultas de teste gratuitas:

https://www.checkmeucarro.com.br
- https://www.checkmeucarro.com.br/minha-conta/pesquisaGratis/pesquisar/?placa=FTR2828

https://www.historicar.com.br
- https://www.historicar.com.br/admin/iniciar_fluxo/FTR2828

***


## Update 2 (20/05/16)
O SINESP, faz questão de bloquear as consultas no servidor. Infelizmente não dá para consultar, as vezes derrubam a conexão ou forçam a chamada com valicação captcha.

Um serviço que deveria ser público para todos utilizarem, mas eles dificultam 100%. Só no Brasil mesmo!

***


## Update 1 (20/05/16)
Segue abaixo alguns exemplos que implementamos no nosso servidor.

### Placa existente (sem restrição):

[http://consultaplaca-wgenial.rhcloud.com/?placa=AFT0017](http://consultaplaca-wgenial.rhcloud.com/?placa=AFT0017)

```javascript
{
  chassis: "************21376",
  model: "I/HYUNDAI I30 2.0",
  color: "PRETA",
  brand: "I/HYUNDAI I30 2.0",
  date: "20/05/2016 às 15:34:51",
  return_message: "Sem erros.",
  city: "SAO PAULO",
  return_code: "0",
  state: "SP",
  model_year: "2011",
  plate: "AFT0017",
  year: "2010",
  status_code: "0",
  status_message: "Sem restrição"
}
```

### Placa existente (Roubo/Furto):
[http://consultaplaca-wgenial.rhcloud.com/?placa=FFF0012](http://consultaplaca-wgenial.rhcloud.com/?placa=FFF0012)

```javascript
{
  return_code: "0",
  model: "I/MMC L200 4X4",
  model_year: "1993",
  state: "SP",
  status_message: "Roubo/Furto",
  year: "1992",
  color: "PRETA",
  status_code: "1",
  plate: "FFF0012",
  date: "20/05/2016 às 15:54:21",
  chassis: "************01561",
  brand: "I/MMC L200 4X4",
  return_message: "Sem erros.",
  city: "SAO PAULO"
}
```


### Placa não encontrada:

[http://consultaplaca-wgenial.rhcloud.com/?placa=AAA0000](http://consultaplaca-wgenial.rhcloud.com/?placa=AAA0000)

```javascript
{
  chassis: null,
  model: null,
  color: null,
  brand: null,
  date: null,
  return_message: "Veículo não encontrado.",
  city: null,
  return_code: "3",
  state: null,
  model_year: null,
  plate: null,
  year: null,
  status_code: null,
  status_message: null
}
```

### Outras placas de exemplo

[http://consultaplaca-wgenial.rhcloud.com/?placa=EXJ1969](http://consultaplaca-wgenial.rhcloud.com/?placa=EXJ1969)

[http://consultaplaca-wgenial.rhcloud.com/?placa=FVI3690](http://consultaplaca-wgenial.rhcloud.com/?placa=FVI3690)

[http://consultaplaca-wgenial.rhcloud.com/?placa=FTR2828](http://consultaplaca-wgenial.rhcloud.com/?placa=FTR2828)

Obs.: Para saber como fazer essa implementação, consulte esse [Wiki] (https://github.com/victor-torres/sinesp-client/wiki/Como-executar-o-c%C3%B3digo-Python-no-PHP).

***

## Update (22/02/16)
Segue 2 scripts simples que criamos para fazer uma chamada via PHP para o script em Python que o Victor Torres criou.

https://gist.github.com/giovanigenerali/17666843767f0796042b

Lembre-se que é necessário ter o módulo instalado no seu servidor, sigam as instruções do respositório informado Update (11/02/16) abaixo.

***

## Update (11/02/16)
Contribuimos com melhorias no parse do xml no projeto https://github.com/victor-torres/sinesp-client

***


## Update (10/02/16)
Encontramos um código escrito em python que está funcionando https://github.com/victor-torres/sinesp-client

***


## Update (28/01/16)
Infelizmente não temos previsão de retorno do sistema que possibilida a consulta diretamente no SINESP.
Caso alguém tenha uma solução ou recomendação para consultas desse tipo, nos avisem ou compartilhem aqui.
Obrigado

***


## Update (02/12/15)
Sem novidades até o momento para a consulta do SINESP, existe um outro serviço parecido que retorna apenas algumas informações https://www.carcheck.com.br/exibirdadosveiculos?placa=AFT0017
Lembro que por ser uma serviço teoricamente pago, eles devem monitorar os acessos e restringirem com o uso, portanto não tem garantia.

***

# Consulta Placa de Veículo SINESP Cidadão (não funciona)

Exemplo básico para realizar consulta de placas de veículos na base de dados do SINESP Cidadão. O script pesquisa no serviço SOAP do SINESP e retorna os dados do veículo

## Como funciona?

Basta você passar via GET a placa do veículo "placa" e opcionalmente o tipo de retorno (xml, json ou html - padrão) via "type".

* JSON

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

* XML

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

* HTML
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
