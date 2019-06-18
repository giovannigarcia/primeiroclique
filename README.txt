	README

O sistema é uma ferramenta para gerenciamento de testes de primeiro clique.
Os testes de primeiro clique serve para examinar o que o participante de teste clicaria primeiro na interface para completar a tarefa pretendida.
A posição do clique é armazenado, e após gerado um mapa de calor para melhor visualização da posição dos cliques realizados pelos participantes.


*** Instalação ***

Crie o banco de dados conforme o arquivo de mesmo nome em anexo.
configure o acesso ao banco no arquivo dbConecta.php.
Coloque todos os arquivos no mesmo servidor de hospedagem que se encontra o website a ser testado.

configure os arquivos: 

tarefa.php => 		location.replace("https://nomedoseusite.com/salvaClick.php...

testeTarefa.php => 	location.replace("https://nomedoseusite.com/salvaClick.php...

Login da ferramenta = você pode configurá-la com as medidas de segurança de acesso já utilizadas em seu website ou usar a que foi implementada na ferramenta.
		

*** Dependências ***

Para que ocorra a captura das coordenadas do clique dentro do elemento iframe é necessário que as páginas testadas estejam no mesmo domínio 
da ferramenta.



*** Observação ***

Menus com efeito dropdown (que ficam visíveis ao passar o cursor do mouse sobre eles): se o local do clique for em uma parte desse menu 
a zona de calor aparentará que foi realizada no local errado. O aplicador do teste deverá estar ciente que necessitará de comparar, 
lado a lado, o mapa de calor com o site com o menu de alguma forma visível. 



*** Utilização ***

Crie um teste dando um nome a ele.
No teste criado inclua tarefas. A tarefa tem que ter uma descrição informando o que o participante terá que fazer. Ex.: Acesse o forum do site.
Inclua o link da página web a ser testada.
Convide participantes para realizarem o teste de primeiro clique, enviando via email o link do teste de primeiro clique; 
ou crie em seu site um convite com o link para que os participantes acessem.
