Este repositório fornece uma solução alternativa para o uso do plugin do EditorJS "Unsplash Inline Image Tool" sem a necessidade de um proxy para a API do Unsplash. A abordagem proposta aqui utiliza a biblioteca cURL em PHP para acessar diretamente a API do Unsplash, eliminando assim a exposição da chave de acesso do Unsplash no lado do cliente.

Motivação
Ao integrar o plugin do EditorJS "Unsplash Inline Image Tool" em uma aplicação web, muitas vezes é necessário acessar a API do Unsplash para recuperar imagens de forma dinâmica. No entanto, expor a chave de acesso do Unsplash no lado do cliente pode representar um risco de segurança, além de violar as práticas recomendadas de segurança.

Solução Proposta
Esta solução proposta utiliza PHP para acessar a API do Unsplash, mantendo a chave de acesso do Unsplash do lado do servidor, sem expô-la no lado do cliente. Ao receber uma solicitação do EditorJS para recuperar imagens, o servidor utiliza a biblioteca cURL para fazer uma solicitação à API do Unsplash, retornando os resultados de forma segura para o cliente.

Como Usar
Clone ou faça o download deste repositório.

Configuração do Servidor:

Certifique-se de que seu servidor tenha suporte ao PHP e à extensão cURL.
Configure o servidor para permitir solicitações ao arquivo PHP fornecido neste repositório.
Integração com o EditorJS:

No lado do cliente, configure o plugin do EditorJS "Unsplash Inline Image Tool" para enviar solicitações para o arquivo PHP fornecido neste repositório.
Personalização (Opcional):

Personalize o arquivo PHP conforme necessário para atender às suas especificações, como manipulação de parâmetros de consulta, filtragem de resultados, etc.
Contribuição
Contribuições são bem-vindas! Sinta-se à vontade para enviar pull requests para melhorar este projeto.

Licença
Este projeto é licenciado sob a Licença MIT.
