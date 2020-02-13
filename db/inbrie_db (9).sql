-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20-Dez-2019 às 15:09
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inbrie_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `postcomentariofotografia`
--

CREATE TABLE IF NOT EXISTS `postcomentariofotografia` (
  `comentarioID` int(11) NOT NULL AUTO_INCREMENT,
  `id_fotografiaPost` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentarioConteudo` varchar(500) COLLATE utf8_bin NOT NULL,
  `comentarioData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comentarioID`),
  KEY `original_fotografia_post_coment_idx` (`id_fotografiaPost`),
  KEY `original_fotografia_usuario_coment_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `postcomentariofotografia`
--

INSERT INTO `postcomentariofotografia` (`comentarioID`, `id_fotografiaPost`, `id_usuario`, `comentarioConteudo`, `comentarioData`) VALUES
(1, 7, 11, 'test', '2019-12-20 05:51:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postcomentarioilustracao`
--

CREATE TABLE IF NOT EXISTS `postcomentarioilustracao` (
  `comentarioID` int(11) NOT NULL AUTO_INCREMENT,
  `id_ilustracaoPost` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentarioConteudo` varchar(500) COLLATE utf8_bin NOT NULL,
  `comentarioData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comentarioID`),
  KEY `original_ilustracao_post_coment_idx` (`id_ilustracaoPost`),
  KEY `original_ilustracao_usuario_coment_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `postcomentarioilustracao`
--

INSERT INTO `postcomentarioilustracao` (`comentarioID`, `id_ilustracaoPost`, `id_usuario`, `comentarioConteudo`, `comentarioData`) VALUES
(2, 17, 11, 'Muito bom! Gostei do traço.', '2019-12-20 05:46:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postcomentarioliteratura`
--

CREATE TABLE IF NOT EXISTS `postcomentarioliteratura` (
  `comentarioID` int(11) NOT NULL AUTO_INCREMENT,
  `id_literaturaPost` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentarioConteudo` varchar(500) COLLATE utf8_bin NOT NULL,
  `comentarioData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comentarioID`),
  KEY `original_literatura_post_coment_idx` (`id_literaturaPost`),
  KEY `original_literatura_usuario_coment_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `postcomentarioliteratura`
--

INSERT INTO `postcomentarioliteratura` (`comentarioID`, `id_literaturaPost`, `id_usuario`, `comentarioConteudo`, `comentarioData`) VALUES
(1, 6, 11, 'Comentário teste', '2019-12-20 05:50:10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postcomentariomusica`
--

CREATE TABLE IF NOT EXISTS `postcomentariomusica` (
  `comentarioID` int(11) NOT NULL AUTO_INCREMENT,
  `id_musicaPost` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentarioConteudo` varchar(500) COLLATE utf8_bin NOT NULL,
  `comentarioData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comentarioID`),
  KEY `original_musica_post_coment_idx` (`id_musicaPost`),
  KEY `original_musica_usuario_coment_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postconteudofotografia`
--

CREATE TABLE IF NOT EXISTS `postconteudofotografia` (
  `postConteudoID` int(11) NOT NULL AUTO_INCREMENT,
  `id_fotografiaPost` int(11) NOT NULL,
  `conteudoIndice` int(11) NOT NULL,
  `conteudoDiretorio` varchar(500) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`postConteudoID`),
  KEY `id_contentFotografia_idx` (`id_fotografiaPost`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `postconteudofotografia`
--

INSERT INTO `postconteudofotografia` (`postConteudoID`, `id_fotografiaPost`, `conteudoIndice`, `conteudoDiretorio`) VALUES
(6, 7, 2, '../arquivos/fotografia/7/5dfc5973ba9346.97395069.png'),
(7, 7, 1, '../arquivos/fotografia/7/5dfc5973d806e7.29379407.png'),
(8, 7, 3, '../arquivos/fotografia/7/5dfc5973ee68f6.35244437.png'),
(9, 8, 1, '../arquivos/fotografia/8/5dfc5b24bbec51.19735210.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postconteudoilustracao`
--

CREATE TABLE IF NOT EXISTS `postconteudoilustracao` (
  `postConteudoID` int(11) NOT NULL AUTO_INCREMENT,
  `id_ilustracaoPost` int(11) NOT NULL,
  `conteudoIndice` int(11) NOT NULL,
  `conteudoDiretorio` varchar(500) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`postConteudoID`),
  KEY `id_contentIlustracao_idx` (`id_ilustracaoPost`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `postconteudoilustracao`
--

INSERT INTO `postconteudoilustracao` (`postConteudoID`, `id_ilustracaoPost`, `conteudoIndice`, `conteudoDiretorio`) VALUES
(19, 12, 1, '../arquivos/ilustracao/12/5dfc5367c94d58.26405248.png'),
(20, 13, 1, '../arquivos/ilustracao/13/5dfc55e9838434.27727388.png'),
(21, 14, 1, '../arquivos/ilustracao/14/5dfc57096e86d0.66773785.png'),
(22, 15, 1, '../arquivos/ilustracao/15/5dfc58fb09ea52.44429609.png'),
(23, 16, 1, '../arquivos/ilustracao/16/5dfc5be999c2a6.06873898.png'),
(24, 17, 1, '../arquivos/ilustracao/17/5dfc5ceeca2809.80653809.png'),
(25, 17, 2, '../arquivos/ilustracao/17/5dfc5ceed42112.06951436.jpg'),
(26, 17, 3, '../arquivos/ilustracao/17/5dfc5ceee85f35.90047088.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postconteudoliteratura`
--

CREATE TABLE IF NOT EXISTS `postconteudoliteratura` (
  `postConteudoID` int(11) NOT NULL AUTO_INCREMENT,
  `id_literaturaPost` int(11) NOT NULL,
  `conteudoIndice` int(11) NOT NULL,
  `conteudo` mediumtext CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`postConteudoID`),
  KEY `id_contentLiteratura_idx` (`id_literaturaPost`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `postconteudoliteratura`
--

INSERT INTO `postconteudoliteratura` (`postConteudoID`, `id_literaturaPost`, `conteudoIndice`, `conteudo`) VALUES
(6, 6, 1, '<div><div style="text-align: center;"><span style="text-align: initial;"><font style="font-size: 40px;" face="Comic Sans MS"><b style="">Jisoo</b></font></span></div><br>Jisoo sempre foi uma ótima garota; e uma ótima namorada, principalmente.</div><div><br></div><div>Uma menina muito bondosa e muito gentil, sem contar que também muito engraçada; uma menina que quem a olha de longe, vê o brilho em seus olhos que mostram o quanto ela é única. Veem o quão essa menina é preciosa, veem o quão é especial para aqueles que a conhecem. E, bem, eu sou uma dessas pessoas que a conhecem, e eu posso confirmar tudo isso. Jisoo era muito especial para mim.</div><div><br></div><div>Eu me apaixonei por Jisoo quando nós duas tínhamos apenas quinze anos de idade, e estranhamente ela também sentia o mesmo por mim. Nós tínhamos muito medo de sermos julgadas, afinal, éramos duas garotas e isso para a sociedade é um erro. Um erro que precisa ser excluído, que precisa ser apagado; uma sujeirinha que precisa ser limpada; um vírus de computador que deve ser removido. Porém nós tentamos... Tentamos não ligar para essas pessoas. E, então, decidimos ir a uma lanchonete de casais nova que tinha aberto há uns dias.</div><div><br></div><div>Eu disse que passaria na casa dela para pegá-la às oito horas da noite. Como nos seriados, sabe? E, bem, quando fui encontrá-la, tive a bela visão de Jisoo usando um vestido preto e rodado em seu corpo. Era a primeira vez que a via usando um vestido. Ela estava tão linda.</div><div><br></div><div>Eu me lembro perfeitamente de seu grande e envergonhado sorriso quando me viu. Eu levei minha mão, com a palma para cima, em sua direção, como se estivesse a chamando para uma dança de salão. Ela segurou em minha mão e desceu cuidadosamente — com a minha ajuda — os degraus que ficavam em frente à sua casa.</div><div><br></div><div>Não demorou muito para que já estivéssemos estacionando meu carro na garagem do restaurante. Após desligar o carro e retirar a chave, a coloquei no bolso de minha calça jeans e abri a porta do automóvel rapidamente, fechando-a logo depois. Corri para o lado do passageiro, querendo abrir a porta para a minha namorada; e assim o fiz. Ela gargalhou por achar engraçado o modo com que eu estava a tratando. Estava tratando-a como uma dama, uma princesa — que é exatamente o que ela é e como merece ser tratada.</div><div><br></div><div>Enfim, estávamos à porta do restaurante. Nossos olhos se encontraram e nossas mãos se entrelaçaram. Haviam sorrisos largos e animados em nossos rostos. Porém toda essa alegria desmanchou-se mais tarde quando fomos atingidas com piadinhas de mal gosto e quando expulsaram-nos do restaurante. Eu não podia acreditar no que estava acontecendo.</div><div><br></div><div><b>"Saiam daqui, suas lésbicas!"</b></div><div><br></div><div><b>"Vocês não estão vendo que aqui há crianças também?"</b></div><div><br></div><div><b>"Vocês são uma aberração!"</b></div><div><br></div><div>Meu coração se partiu. Eu não imaginava que amar minha namorada doeria tanto. Não sabia que seria tão difícil, não sabia que teríamos que comer lámen em casa, porque não éramos "dignas" de comer em um restaurante de casais como um casal.</div><div><br></div><div>O que há de errado em eu ser uma garota e amar uma garota?</div><div><br></div><div>Devemos amar uns aos outros, não devemos?</div><div><br></div><div>Nós saímos dali e fomos para o carro, partindo logo em seguida. Jisoo chorava muito, e isso me fazia chorar também.</div><div><br></div><div>Bem, os dias se passaram e continuamos vivendo nossas vidas, mas eu podia ver, podia enxergar que Jisoo não estava feliz.</div><div><br></div><div>"Por que está com essa carinha, meu amor?", passei as costas da minha mão em seu rosto, acariciando sua bochecha.</div><div><br></div><div>"Não é nada demais. Não se importe com isso."</div><div><br></div><div>Eu implorei e implorei. E até que, enfim, ela me disse o que tanto estava a deixando triste.</div><div><br></div><div>"Eu perdi meu emprego, perdi meus pais, perdi meus amigos... Eu perdi tudo, Lisa."</div><div><br></div><div>"Tudo?", questionei e ela assentiu. "Eu estou aqui, não estou?"</div><div><br></div><div>Ela novamente assentiu e enterrou sua cabeça na curvatura do meu pescoço, envolvendo seus braços em mim e, assim, me abraçando.</div><div><br></div><div>Era ótimo deitar com a minha namorada no nosso sofá.</div><div><br></div><div>Era também ótimo chegar do meu trabalho, e encontrá-la cozinhando alguma comida bem gostosa — já que ela era uma mestre na cozinha — ou até mesmo encontrá-la dormindo como um anjinho, no tapete de veludo vermelho da sala, ao lado do nosso cachorrinho, o felpudo. Ela sempre dormia fazendo carinho nele.</div><div><br></div><div>Eu amava quando tínhamos nossas noites sozinhas. Nós podíamos fazer o que quiséssemos. E, inclusive, isso que você provavelmente está pensando agora.</div><div><br></div><div>Teve uma vez que a encontrei cortando seus próprios pulsos com uma faca, e eu corri até ela. Ela chorava muito e de seus braços saía muito sangue. Eu perguntava a ela o que estava passando naquela cabecinha, mas ela nunca quis me falar. Eu apenas sabia que Jisoo estava sofrendo... e muito.</div><div><br></div><div>Ela queria se livrar da vida, mas eu ainda não tinha notado isso. Eu me sinto culpada por não ter descoberto que ela queria tirar a própria vida. Eu poderia ter impedido, não podia? Mas eu estava ocupada demais com o meu trabalho e/ou saindo com os meus amigos.</div><div><br></div><div>Qual é? Ela era a minha namorada. Eu devia estar com ela quando tal estivesse precisando de mim, não é? Pensando bem agora... Eu fui muito egoísta. Eu deveria ter dado mais atenção à Jisoo, deveria ter confortado seu coração quando ela estava passando por suas dificuldades e suas recaídas drásticas emocionais. Afinal, mesmo que nós tenhamos sido somente namoradas, era como se fossemos apenas uma. Era o que eu mais acreditava e acredito. Minha namorada estava sofrendo de uma depressão profunda e eu estava na boate dançando? É, eu realmente fui muito egoísta.</div><div><br></div><div>Mas sabe de uma coisa? Suicidar-se? Era realmente tão necessário assim? Nós ainda tínhamos tanta coisa para viver juntas e, agora, tudo foi por água a baixo.&nbsp;</div><div><br></div><div>Tudo acabou.</div><div><br></div><div>Bem, agora eu estou aqui, sentada na cabine da roda-gigante em que nós duas tivemos nosso primeiro encontro. Eu lembro muito bem como foi engraçado ver Jisoo morrendo de medo de cair daqui de cima. Ela estava tão nervosa.</div><div><br></div><div>O mínimo que eu posso fazer agora é me jogar daqui.</div><div><br></div><div>Por que continuar viva? Eu não tenho mais nada para fazer mesmo. Jisoo não está aqui; meu amor não está aqui.</div><div><br></div><div>"Jisoo, por que fez isso comigo? Sabe que eu não posso viver sem você...", gritei, olhando para as estrelas, enquanto muitas e muitas lágrimas rolavam desesperadas pelo meu rosto.</div><div><br></div><div>E, enfim, eu dei meu último suspiro antes de me jogar daquela cabine.</div><div><br></div><div>"Apenas tolos se apaixonam por Jisoo. Apenas tolos caem por ela.", e essa foi a última coisa que se passou pela minha cabeça antes de eu me entregar para a morte.</div>'),
(7, 7, 1, '<div style="text-align: center;"><font style="font-size: 40px;">IMERSO</font></div><div style="text-align: center;"><br></div><div><br></div><div>Conteúdo:</div><div><br></div><div>Intensamente, não consigo parar pensar em ti. Quando penso que tenho uma imagem sua formada, quebra-a como um pedaço de vidro frágil. Assim que passo a pensar que és uma pessoa delicada, me violenta com ações e palavras brutas. E quando penso que és uma pessoa violenta, me conforta com tuas belas palavras reconfortantes.&nbsp;</div><div><br></div><div>Me perco em tuas palavras, em teus olhares, teus gestos, no seu completo ser. Canso de magoar-me com a forma que faz parecer que sou um desconhecido para ti, em como me faz ser apenas um entre mil, mas acima de tudo estou cansado de como me deixa completamente imerso em sua pessoa.</div><div><br></div><div>Estou a beira de um colapso interno, tentando correlacionar nosso relacionamento com algo que não seja meramente superficial e mal desenvolvido como uma novela das sete. Somos mais que isso, não somos?&nbsp;</div><div><br></div><div>Raros são os teus sorrisos em minha direção, talvez eu não seja o suficiente. Park Jimin, para onde tanto olhas? Por que não foca teus olhos em mim? Serei tudo o que ela é e mais um pouco, eu te prometo. Te farei sentir a pessoa mais importante do mundo, pois farei de ti o meu.</div><div><br></div><div>Sobre ti escrevo, pois você é o motivo da minha inspiração, Jimin. Tu me faz ser completamente imerso em ti, de forma que tu és a última coisa que penso antes de dormir e a primeira que penso ao acordar.</div><div><br></div><div>Oh céus, Park Jimin! Faça de mim o motivo do teu sorriso, eu te suplico.</div><div><br></div>'),
(8, 8, 1, '<div style="text-align: center;"><b><font style="font-size: 40px;" face="Times New Roman">[Em meio ao caos]</font></b></div><div><br></div><div><br></div><div>Caos. Era a palavra perfeita para descrever onde eu me encontrava, gritos, sangue e o terrível fragor de morte preenchiam meus arredores, neste momento eu estava em uma frenesi de adrenalina continua, já estava horas a fio funcionando em modo automático. Ataque após ataque eu não me dava o luxo de parar, naquele momento já havia perdido meu elmo fazia horas e minha couraça já se encontrava em frangalhos, mas pouco me importava, afinal, poucos naquele campo poderiam realmente me ferir.</div><div><br></div><div>De repente caio. Não, sou praticamente jogado contra o chão, quando tento me levantar para voltar a batalha sinto uma dor se alastrando pelo meu abdômen, em seguida sinto algo quente e viscoso escorrendo. Após alguns segundos finalmente sou capaz de tomar a coragem para abrir meus olhos e ver a lança que me prendia ao chão, solto o ar de uma forma brusca ao tentar me mover com aquele objeto atravessando meu corpo. Levo minhas mãos até a arma pronto para retira-la de mim, mas acabo reparando no acabamento completamente preto e familiar adornando com meu sangue dourado que prendeu minha atenção de forma que não vi a silhueta que se aproximava, quando finalmente tento puxar de forma brusca a lança para fora de meu corpo não consigo evitar um urro de dor escapar de minha garganta me fazendo jogar a cabeça para trás e solta-la não sendo capaz de supoetsr a dor.</div><div><br></div><div>Solto um suspiro sôfrego antes de levar novamente minhas mãos, que agora tremiam, até a lança apertando a mesma com certa força antes de tentar tira-la mais uma vez de meu corpo já enfraquecido, neste ponto já era capaz de sentir a tontura pela considerável perda de sangue fora a falta de ar que começava a se fazer presente. Tinha que tirar aquilo de meu corpo, então rapidamente voltei a puxar aquela ferramenta para cima, a dor era insuportável e, a este ponto, já era capaz de sentir o gosto metálico do sangue enchendo minha boca, mas mesmo assim prosseguia em tentar tirar aquela arma de meu abdômen, se eu conseguisse tira-la eu seria capaz se me curar e, portanto, voltar a batalha, senão... que Hades me aguardasse.</div><div><br></div><div>Quando finalmente fui capaz de levantar alguns poucos centímetros daquela arma que me empalava ao chão sinto uma força a empurrando para baixo novamente fazendo-a se enterrar na terra abaixo de mim, rasgando carne e pele sem a mínima misericórdia arrancando outro urro de dor de minha garganta enquanto eu tentava com todas minhas forças remanescentes impedir que a lança atravessasse ainda mais meu corpo, apertava aquele maldito pedaço de madeira com o maximo de força que era capaz de usar naquele momento em um ato desesperado em me segurar ao ultimo fio de vida que me prendia aquele plano.</div><div><br></div><div>Era capaz de sentir sangue viscoso e com o gosto metálico escorrendo pela minha boca enquanto observava a silhueta tão familiar que insistia intensamente em acabar com minha vida, sentia minha visão embaçando enquanto continuava com o aperto na lança negra a empurrando para cima lutando diretamente contra aquele homem que demorei longos e imensuravelmente dolorosos momentos para finalmente reconhecer.</div><div><br></div><div>Ares.</div><div><br></div><div>Antes que eu fosse sequer capaz de pronunciar uma palavra a lança é retirada bruscamente de meu abdômen me fazendo cair para trás sem forças para me levantar, naquele ponto não tinha forças para sequer gritar. Levei uma de minhas mãos, já frias e trêmulas, até meu ferimento tentando inutilmente estancar o sangramento. Levantei meu olhar uma ultima vez a Ares sendo capaz de ver a lança sendo apontada para mim, diretamente para meu coração.</div><div><br></div><div>Não havia nada para fazer que conseguisse me fazer escapar daquela batalha com vida, apenas fechei os olhos e aguardei o impacto.</div><div><br></div><div>E, de repente, não havia mais nada.</div>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postconteudomusica`
--

CREATE TABLE IF NOT EXISTS `postconteudomusica` (
  `postConteudoID` int(11) NOT NULL AUTO_INCREMENT,
  `id_musicaPost` int(11) NOT NULL,
  `conteudoTitulo` varchar(120) CHARACTER SET latin1 NOT NULL,
  `conteudoIndice` int(11) NOT NULL,
  `conteudoDiretorio` varchar(500) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`postConteudoID`),
  KEY `id_contentMusica_idx` (`id_musicaPost`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `postconteudomusica`
--

INSERT INTO `postconteudomusica` (`postConteudoID`, `id_musicaPost`, `conteudoTitulo`, `conteudoIndice`, `conteudoDiretorio`) VALUES
(9, 4, 'Carta feat. Vitória Biral', 1, '../arquivos/musica/4/5dfc64555654a1.90152741.mp3'),
(10, 4, 'Primeiro Passo', 2, '../arquivos/musica/4/5dfc645568a971.98931769.mp3'),
(11, 4, 'Gabigol', 3, '../arquivos/musica/4/5dfc64556ec2d1.19486243.mp3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postcurtidafotografia`
--

CREATE TABLE IF NOT EXISTS `postcurtidafotografia` (
  `curtidaID` int(11) NOT NULL AUTO_INCREMENT,
  `id_fotografiaPost` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `curtidaTipo` tinyint(4) NOT NULL,
  `curtidaData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`curtidaID`),
  KEY `original_fotografia_post_curtida_idx` (`id_fotografiaPost`),
  KEY `original_fotografia_user_curtida_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postcurtidailustracao`
--

CREATE TABLE IF NOT EXISTS `postcurtidailustracao` (
  `curtidaID` int(11) NOT NULL AUTO_INCREMENT,
  `id_ilustracaoPost` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `curtidaTipo` tinyint(4) NOT NULL,
  `curtidaData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`curtidaID`),
  KEY `original_ilustracao_post_curtida_idx` (`id_ilustracaoPost`),
  KEY `original_ilustracao_user_curtida_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `postcurtidailustracao`
--

INSERT INTO `postcurtidailustracao` (`curtidaID`, `id_ilustracaoPost`, `id_usuario`, `curtidaTipo`, `curtidaData`) VALUES
(14, 17, 11, 1, '2019-12-20 05:42:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postcurtidaliteratura`
--

CREATE TABLE IF NOT EXISTS `postcurtidaliteratura` (
  `curtidaID` int(11) NOT NULL AUTO_INCREMENT,
  `id_literaturaPost` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `curtidaTipo` tinyint(4) NOT NULL,
  `curtidaData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`curtidaID`),
  KEY `original_literatura_post_curtida_idx` (`id_literaturaPost`),
  KEY `original_literatura_user_curtida_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postcurtidamusica`
--

CREATE TABLE IF NOT EXISTS `postcurtidamusica` (
  `curtidaID` int(11) NOT NULL AUTO_INCREMENT,
  `id_musicaPost` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `curtidaTipo` tinyint(4) NOT NULL,
  `curtidaData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`curtidaID`),
  KEY `original_musica_post_curtida_idx` (`id_musicaPost`),
  KEY `original_musica_user_curtida_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posttagfotografia`
--

CREATE TABLE IF NOT EXISTS `posttagfotografia` (
  `tagID` int(11) NOT NULL AUTO_INCREMENT,
  `id_fotografiaPost` int(11) NOT NULL,
  `tag` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`tagID`),
  KEY `original_post_idx` (`id_fotografiaPost`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=34 ;

--
-- Extraindo dados da tabela `posttagfotografia`
--

INSERT INTO `posttagfotografia` (`tagID`, `id_fotografiaPost`, `tag`) VALUES
(24, 7, 'praia'),
(25, 7, 'prédio'),
(26, 7, 'urbano'),
(27, 7, 'cidade'),
(28, 7, 'rio'),
(29, 7, 'de'),
(30, 7, 'janeiro'),
(31, 7, 'Rio de Janeiro'),
(32, 8, 'minimalismo'),
(33, 8, 'Transição');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posttagilustracao`
--

CREATE TABLE IF NOT EXISTS `posttagilustracao` (
  `tagID` int(11) NOT NULL AUTO_INCREMENT,
  `id_ilustracaoPost` int(11) NOT NULL,
  `tag` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`tagID`),
  KEY `original_post_idx` (`id_ilustracaoPost`),
  KEY `original_post_ilustracao` (`id_ilustracaoPost`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=73 ;

--
-- Extraindo dados da tabela `posttagilustracao`
--

INSERT INTO `posttagilustracao` (`tagID`, `id_ilustracaoPost`, `tag`) VALUES
(50, 12, 'desenho'),
(51, 12, 'ilustracao'),
(52, 12, 'rosa'),
(53, 12, 'Silenced Woman'),
(54, 13, 'vampira'),
(55, 13, 'desenho'),
(56, 13, 'digital'),
(57, 13, 'colorido'),
(58, 13, 'Desenho random :p'),
(59, 14, 'frança'),
(60, 14, 'cabelo'),
(61, 14, 'rosa'),
(62, 14, 'manga'),
(63, 14, 'Cheveux roses'),
(64, 15, 'desenho'),
(65, 15, 'caricatura'),
(66, 15, 'Caricatura minha'),
(67, 16, 'abstrato'),
(68, 16, 'Duas faces.'),
(69, 17, 'sanji'),
(70, 17, 'japonês'),
(71, 17, 'colorido'),
(72, 17, 'Ilustrações digitais');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posttagliteratura`
--

CREATE TABLE IF NOT EXISTS `posttagliteratura` (
  `tagID` int(11) NOT NULL AUTO_INCREMENT,
  `id_literaturaPost` int(11) NOT NULL,
  `tag` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`tagID`),
  KEY `original_post_literatura_idx` (`id_literaturaPost`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=24 ;

--
-- Extraindo dados da tabela `posttagliteratura`
--

INSERT INTO `posttagliteratura` (`tagID`, `id_literaturaPost`, `tag`) VALUES
(17, 6, 'romance'),
(18, 6, 'Jisoo'),
(19, 7, 'poesia'),
(20, 7, ''),
(21, 7, 'IMERSO'),
(22, 8, 'caos'),
(23, 8, 'Em meio ao caos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posttagmusica`
--

CREATE TABLE IF NOT EXISTS `posttagmusica` (
  `tagID` int(11) NOT NULL AUTO_INCREMENT,
  `id_musicaPost` int(11) NOT NULL,
  `tag` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`tagID`),
  KEY `original_post_musica_idx` (`id_musicaPost`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `posttagmusica`
--

INSERT INTO `posttagmusica` (`tagID`, `id_musicaPost`, `tag`) VALUES
(14, 4, 'rap'),
(15, 4, 'gabigol'),
(16, 4, 'primeiro'),
(17, 4, 'passo'),
(18, 4, 'carta'),
(19, 4, 'Jxao - Minhas primeiras músicas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posttipofotografia`
--

CREATE TABLE IF NOT EXISTS `posttipofotografia` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `postTitulo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `postDescricao` varchar(500) CHARACTER SET latin1 NOT NULL,
  `postData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`postID`),
  KEY `id_fotografo_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `posttipofotografia`
--

INSERT INTO `posttipofotografia` (`postID`, `id_usuario`, `postTitulo`, `postDescricao`, `postData`) VALUES
(7, 12, 'Rio de Janeiro', 'Cidade de praias e prédios.', '2019-12-20 05:17:39'),
(8, 14, 'Transição', 'Foto minimalista.', '2019-12-20 05:24:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posttipoilustracao`
--

CREATE TABLE IF NOT EXISTS `posttipoilustracao` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `postTitulo` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'Sem título',
  `postDescricao` varchar(500) CHARACTER SET latin1 NOT NULL DEFAULT 'Sem descrição',
  `postData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`postID`),
  KEY `id_ilustrationOP` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `posttipoilustracao`
--

INSERT INTO `posttipoilustracao` (`postID`, `id_usuario`, `postTitulo`, `postDescricao`, `postData`) VALUES
(12, 6, 'Silenced Woman', 'Ilustração digital que fiz.', '2019-12-20 04:51:51'),
(13, 8, 'Desenho random :p', 'Fiz um desenho no computador de uma vampira', '2019-12-20 05:02:33'),
(14, 9, 'Cheveux roses', 'Mulher de cabelos rosas tomando café, na França.', '2019-12-20 05:07:21'),
(15, 11, 'Caricatura minha', 'Fiz um desenho meu no papel mesmo, gostei do resultado, comentem aí o que acharam.', '2019-12-20 05:15:39'),
(16, 15, 'Duas faces.', 'Desenho abstrato, duas faces.', '2019-12-20 05:28:09'),
(17, 16, 'Ilustrações digitais', 'Ilustrações que fiz esse mês.', '2019-12-20 05:32:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posttipoliteratura`
--

CREATE TABLE IF NOT EXISTS `posttipoliteratura` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `postTitulo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `postDescricao` varchar(500) CHARACTER SET latin1 NOT NULL,
  `miniaturaDiretorio` varchar(500) CHARACTER SET latin1 NOT NULL,
  `postData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`postID`),
  KEY `id_escritor_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `posttipoliteratura`
--

INSERT INTO `posttipoliteratura` (`postID`, `id_usuario`, `postTitulo`, `postDescricao`, `miniaturaDiretorio`, `postData`) VALUES
(6, 7, 'Jisoo', 'Romance de Jisso e sua namorada.', '../arquivos/literatura/6/5dfc5513143962.04487274.jpg', '2019-12-20 04:58:59'),
(7, 10, 'IMERSO', 'Para onde tanto direciona o teu sorriso senão para mim, meu amor? Céus, Jimin! Não me deixe afogar de amores por ti sem ao menos ser o motivo de teu sorriso uma vez.', '../arquivos/literatura/7/5dfc5879b16680.04756390.jpg', '2019-12-20 05:13:29'),
(8, 13, 'Em meio ao caos', 'Caos. Era a palavra perfeita para descrever onde eu me encontrava.', '../arquivos/literatura/8/5dfc5a9bf2b226.01079758.jpg', '2019-12-20 05:22:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posttipomusica`
--

CREATE TABLE IF NOT EXISTS `posttipomusica` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `postTitulo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `postDescricao` varchar(500) CHARACTER SET latin1 NOT NULL,
  `tipoMusica` varchar(11) CHARACTER SET latin1 NOT NULL,
  `generoMusica` varchar(32) CHARACTER SET latin1 NOT NULL,
  `miniaturaDiretorio` varchar(500) CHARACTER SET latin1 NOT NULL,
  `postData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`postID`),
  KEY `id_musico_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `posttipomusica`
--

INSERT INTO `posttipomusica` (`postID`, `id_usuario`, `postTitulo`, `postDescricao`, `tipoMusica`, `generoMusica`, `miniaturaDiretorio`, `postData`) VALUES
(4, 17, 'Jxao - Minhas primeiras músicas', 'Minhas músicas até agora', 'EP', 'Rap', '../arquivos/musica/4/5dfc64552deaf0.88591220.webp', '2019-12-20 06:04:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usuarioID` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioNome` varchar(16) CHARACTER SET latin1 NOT NULL,
  `usuarioBio` varchar(1000) DEFAULT 'Sem biografia.',
  `usuarioEmail` varchar(36) CHARACTER SET latin1 NOT NULL,
  `usuarioSenha` varchar(62) CHARACTER SET latin1 NOT NULL,
  `usuarioFotoPerfil` varchar(500) CHARACTER SET latin1 NOT NULL,
  `usuarioDataRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`usuarioID`),
  UNIQUE KEY `userName_UNIQUE` (`usuarioNome`),
  UNIQUE KEY `userEmail_UNIQUE` (`usuarioEmail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuarioID`, `usuarioNome`, `usuarioBio`, `usuarioEmail`, `usuarioSenha`, `usuarioFotoPerfil`, `usuarioDataRegistro`) VALUES
(6, 'Isabelle', '♢♡ Isa ♡♢', 'isabelle@gmail.com', '$2y$10$jPvimwWOHlUqb7tKjO69pu2m.Nsfp4qyueYNsmstyMIzOCnSq5NCC', '../imagens/profilePics/5dfc52bd35ac62.59710146.png', '2019-12-20 04:49:01'),
(7, 'Giovana', 'Oi, eu sou a Giovanna, gosto de escrever :)', 'giovana@gmail.com', '$2y$10$eDzIdnv6VAvK.g.KFvXe9OHEkU7daU90M6rxyVPN.Lj8WgYJqP0Ey', '../imagens/profilePics/5dfc53ea094f67.37603162.png', '2019-12-20 04:54:02'),
(8, 'Beatriz', 'Beatriz.', 'beatriz@gmail.com', '$2y$10$G1934BbchwwLqprdaApZSe6Mf9h2VUpdzUjafvPHc.MCuj6VLxwUG', '../imagens/profilePics/5dfc5579ebd1a4.84611945.png', '2019-12-20 05:00:41'),
(9, 'Carlos', 'Sem bio.', 'carlos@gmail.com', '$2y$10$aNZ4QCqOniXIgkf5G0DYSugtsbXowy2SAF9wrDxxOT.9cd6Wl.8N.', '../imagens/profilePics/5dfc5619812237.94682392.png', '2019-12-20 05:03:21'),
(10, 'Julia', 'Meu nome é Julia, tenho 14 anos, comecei a escrever desde os meus oito anos, e não parei desde então. Espero que gostem.', 'julia@gmail.com', '$2y$10$wnvfUmACYu9ETrqAMi/1Vu0MZWHhhkf3Z9L3dXCrKAM0VetCmP3aS', '../imagens/profilePics/5dfc57d72e8b46.41338951.png', '2019-12-20 05:10:47'),
(11, 'Giovanni', 'Gosto de desenhar caricaturas, quadrinhos, e afins.', 'giovanni@gmail.com', '$2y$10$CAavZ15xQ6gLlRlBhxwVIuDEtRjVx8T54wUzDtOSa9p4XRx8VPBPu', '../imagens/profilePics/5dfc58c31b39d6.88060201.png', '2019-12-20 05:14:43'),
(12, 'Tifanny', 'Fotógrafa.', 'tifanny@gmail.com', '$2y$10$4nsL8pkhOPcsVfOkYhP1GOXYLj05fry7QKC7Vtrm3X9Zx.nWVLcMi', '../imagens/profilePics/5dfc592daf1150.27554732.png', '2019-12-20 05:16:29'),
(13, 'Victoria', 'Sem bio.', 'victoria@gmail.com', '$2y$10$dWjBEddL3.gu93HFbaSq/uR9aDUS90xtpC2MMpu/ZwuGoF3jI6Vym', '../imagens/profilePics/5dfc59cb5d4e32.75028520.png', '2019-12-20 05:19:07'),
(14, 'Alexandre Lopes', 'Alê.', 'alexandre@gmail.com', '$2y$10$0tvChYBkUeZ85j.cwn7MzuzwjJtKZf09DGpKVmQHC8iwaepkxxMIe', '../imagens/profilePics/5dfc5adc5a1ad2.51800791.png', '2019-12-20 05:23:40'),
(15, 'Tiago', 'Sem bio.', 'tiago@gmail.com', '$2y$10$mvQt486tRZ0AJXxQc0NnDugHZ/FEgmMFeZKbatsRtLi2BibGwTPy.', '../imagens/profilePics/5dfc5b4984aa43.36935431.png', '2019-12-20 05:25:29'),
(16, 'eevee', 'eve, não a do pokemon.', 'eve@gmail.com', '$2y$10$/Il/.xetjr.ABHQKq.p/I.Tf0gIj34OwbXUqeKvZzGqbIZvnG0Iui', '../imagens/profilePics/5dfc5cabdb9d98.41081527.jpg', '2019-12-20 05:31:23'),
(17, 'Jxao', 'Rapper', 'jxao@gmail.com', '$2y$10$n13t7C.DfsWs2loISQDTLuSnLOcdctfu460P2rhws4JTbndPl9Zwm', '../imagens/profilePics/5dfc5d7a1ba088.41248231.jpg', '2019-12-20 05:34:50');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `postcomentariofotografia`
--
ALTER TABLE `postcomentariofotografia`
  ADD CONSTRAINT `original_fotografia_post_coment` FOREIGN KEY (`id_fotografiaPost`) REFERENCES `posttipofotografia` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `original_fotografia_usuario_coment` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postcomentarioilustracao`
--
ALTER TABLE `postcomentarioilustracao`
  ADD CONSTRAINT `original_ilustracao_post_coment` FOREIGN KEY (`id_ilustracaoPost`) REFERENCES `posttipoilustracao` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `original_ilustracao_usuario_coment` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postcomentarioliteratura`
--
ALTER TABLE `postcomentarioliteratura`
  ADD CONSTRAINT `original_literatura_post_coment` FOREIGN KEY (`id_literaturaPost`) REFERENCES `posttipoliteratura` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `original_literatura_usuario_coment` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postcomentariomusica`
--
ALTER TABLE `postcomentariomusica`
  ADD CONSTRAINT `original_musica_post_coment` FOREIGN KEY (`id_musicaPost`) REFERENCES `posttipomusica` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `original_musica_usuario_coment` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postconteudofotografia`
--
ALTER TABLE `postconteudofotografia`
  ADD CONSTRAINT `id_contentFotografia` FOREIGN KEY (`id_fotografiaPost`) REFERENCES `posttipofotografia` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postconteudoilustracao`
--
ALTER TABLE `postconteudoilustracao`
  ADD CONSTRAINT `id_contentIlustracao` FOREIGN KEY (`id_ilustracaoPost`) REFERENCES `posttipoilustracao` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postconteudoliteratura`
--
ALTER TABLE `postconteudoliteratura`
  ADD CONSTRAINT `id_contentLiteratura` FOREIGN KEY (`id_literaturaPost`) REFERENCES `posttipoliteratura` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postconteudomusica`
--
ALTER TABLE `postconteudomusica`
  ADD CONSTRAINT `id_contentMusica` FOREIGN KEY (`id_musicaPost`) REFERENCES `posttipomusica` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postcurtidafotografia`
--
ALTER TABLE `postcurtidafotografia`
  ADD CONSTRAINT `original_fotografia_post_curtida` FOREIGN KEY (`id_fotografiaPost`) REFERENCES `posttipofotografia` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `original_fotografia_user_curtida` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postcurtidailustracao`
--
ALTER TABLE `postcurtidailustracao`
  ADD CONSTRAINT `original_ilustracao_post_curtida` FOREIGN KEY (`id_ilustracaoPost`) REFERENCES `posttipoilustracao` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `original_ilustracao_user_curtida` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postcurtidaliteratura`
--
ALTER TABLE `postcurtidaliteratura`
  ADD CONSTRAINT `original_literatura_post_curtida` FOREIGN KEY (`id_literaturaPost`) REFERENCES `posttipoliteratura` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `original_literatura_user_curtida` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postcurtidamusica`
--
ALTER TABLE `postcurtidamusica`
  ADD CONSTRAINT `original_musica_post_curtida` FOREIGN KEY (`id_musicaPost`) REFERENCES `posttipomusica` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `original_musica_user_curtida` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `posttagfotografia`
--
ALTER TABLE `posttagfotografia`
  ADD CONSTRAINT `original_post` FOREIGN KEY (`id_fotografiaPost`) REFERENCES `posttipofotografia` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `posttagilustracao`
--
ALTER TABLE `posttagilustracao`
  ADD CONSTRAINT `original_post_ilustracao` FOREIGN KEY (`id_ilustracaoPost`) REFERENCES `posttipoilustracao` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `posttagliteratura`
--
ALTER TABLE `posttagliteratura`
  ADD CONSTRAINT `original_post_literatura` FOREIGN KEY (`id_literaturaPost`) REFERENCES `posttipoliteratura` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `posttagmusica`
--
ALTER TABLE `posttagmusica`
  ADD CONSTRAINT `original_post_musica` FOREIGN KEY (`id_musicaPost`) REFERENCES `posttipomusica` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `posttipofotografia`
--
ALTER TABLE `posttipofotografia`
  ADD CONSTRAINT `id_fotografo` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `posttipoilustracao`
--
ALTER TABLE `posttipoilustracao`
  ADD CONSTRAINT `id_ilustrador` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `posttipoliteratura`
--
ALTER TABLE `posttipoliteratura`
  ADD CONSTRAINT `id_escritor` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `posttipomusica`
--
ALTER TABLE `posttipomusica`
  ADD CONSTRAINT `id_musico` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
