	README

O sistema � uma ferramenta para gerenciamento de testes de primeiro clique.
Os testes de primeiro clique serve para examinar o que o participante de teste clicaria primeiro na interface para completar a tarefa pretendida.
A posi��o do clique � armazenado, e ap�s gerado um mapa de calor para melhor visualiza��o da posi��o dos cliques realizados pelos participantes.


*** Instala��o ***

Crie o banco de dados conforme o arquivo de mesmo nome em anexo.
configure o acesso ao banco no arquivo dbConecta.php.
Coloque todos os arquivos no mesmo servidor de hospedagem que se encontra o website a ser testado.

configure os arquivos: 

tarefa.php => 		location.replace("https://nomedoseusite.com/salvaClick.php...

testeTarefa.php => 	location.replace("https://nomedoseusite.com/salvaClick.php...

Login da ferramenta = voc� pode configur�-la com as medidas de seguran�a de acesso j� utilizadas em seu website ou usar a que foi implementada na ferramenta.
		

*** Depend�ncias ***

Para que ocorra a captura das coordenadas do clique dentro do elemento iframe � necess�rio que as p�ginas testadas estejam no mesmo dom�nio 
da ferramenta.



*** Observa��o ***

Menus com efeito dropdown (que ficam vis�veis ao passar o cursor do mouse sobre eles): se o local do clique for em uma parte desse menu 
a zona de calor aparentar� que foi realizada no local errado. O aplicador do teste dever� estar ciente que necessitar� de comparar, 
lado a lado, o mapa de calor com o site com o menu de alguma forma vis�vel. 



*** Utiliza��o ***

Crie um teste dando um nome a ele.
No teste criado inclua tarefas. A tarefa tem que ter uma descri��o informando o que o participante ter� que fazer. Ex.: Acesse o forum do site.
Inclua o link da p�gina web a ser testada.
Convide participantes para realizarem o teste de primeiro clique, enviando via email o link do teste de primeiro clique; 
ou crie em seu site um convite com o link para que os participantes acessem.
