# Trabalho Final SWE - Front-End
Front-end simples para testar um serviço web criado como atividade final na disciplina de Serviços Web - CTDS/IFSC - 2023.1

## Consumo de APIs com PHP

### Método file_get_contents() 
Para consumo de APIs funciona com requisições get simples, que não precisam de envio de dados

Referência: https://www.w3schools.com/php/func_filesystem_file_get_contents.asp 

`'$response = file_get_contents(url_da_api)`

### Métodos cURL
Para consumo de quaisquer APIs que necessitam de envio de dados

Referência no manual do PHP: https://www.php.net/manual/en/book.curl.php

PARA CADA ENDPOINT DE SUA API, SERÁ NECESSÁRIA UMA REQUISIÇÃO CURL DIFERENTE, QUE ATENDA AS CONFIGURAÇÕES DE URL, MÉTODO E DADOS ESPERADOS

O uso é mais complexo, mas existem duas ferramentas que nos auxiliam no início:

a) Para transformar o endpoint da API em um cURL: https://curlbuilder.com/ 

b) Para gerar o código PHP para cada requisição: https://codebeautify.org/curl-to-php-online 


## Instruções de Uso

a) Criar as APIs da atividade no SpringBoot e testar com o Postman

b) Se suas APIs estiverem diferentes das minhas (endpoints e tipos de entrada e saída esperados), será necessário:

b.1) criar os cURLs dos seus endpoints manualmente ou usando o site: https://curlbuilder.com/

b.2) Criar as requisições cURL do PHP manualmentre ou usando o site: https://codebeautify.org/curl-to-php-online

b.3) Atualizar a classe models/Requisicao para os seus endpoints

c) Rodar o servidor do SpringBoot pelo localhost na porta 8081. Se for em outra porta, precisa atualizar no arquivo models/Requisicao.php

d) Rodar a aplicação php pelo localhost em qualquer outra porta (geralmente 8000) (não esqueça de executar o WAMP ou ao menos o Apache e o PHP. Sem necessidade de abrir o servidor MySql, já que os dados virão da API)
