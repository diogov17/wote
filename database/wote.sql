-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 02-Fev-2018 às 18:55
-- Versão do servidor: 5.5.58-0ubuntu0.14.04.1
-- versão do PHP: 7.1.13-1+ubuntu14.04.1+deb.sury.org+1

USE woteDB;
SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET time_zone = '+00:00';


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `woteDB`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `idPerfil` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilizador` int(11) NOT NULL,
  `tipoUtilizador` int(11) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `observacoes` text,
  `estiloPrincipal` varchar(300) DEFAULT NULL,
  `feedbackGeral` float NOT NULL DEFAULT '0',
  `nrSeguidoresTotal` int(11) DEFAULT '0',
  `nomeArtistico` varchar(200) DEFAULT NULL,
  `nomeEmpresaOrganiza` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idPerfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `idUtilizador`, `tipoUtilizador`, `descricao`, `observacoes`, `estiloPrincipal`, `feedbackGeral`, `nrSeguidoresTotal`, `nomeArtistico`, `nomeEmpresaOrganiza`) VALUES
(1, 1, 1, 'Inspirado na música romântica, popular e principalmente na música country é notório o amadurecimento do artista em todas as suas letras e músicas e a influência de todos os seus espectáculos em Portugal ou pelas comunidades portuguesas em torno do mundo, trazendo para as suas canções a alegria e o carinho de todos com quem se cruzou. O primeiro single tirado do álbum também se intitula, Obrigado Fãs, e tal como o nome indica é uma sentida homenagem de Zé Amaro a todos aqueles que o acompanharam neste já longo percurso.', '', 'Country', 4.2, 200, 'Zé Amaro', ''),
(2, 2, 1, 'Rosinha, na maioria dos espectáculos faz-se acompanhar pela sua banda composta por 4 músicos e pelas suas 2 bailarinas (a quem gosta de chamar carinhosamente de Bailarocas) canta e toca sempre ao vivo e segundo as suas palavras, ... não podia ser de outra maneira pois o melhor dos espectáculos é a interacção constante com o público...', '', 'Popular', 4.6, 366, 'Rosinha', ''),
(3, 3, 1, 'D.A.M.A. é uma banda portuguesa de pop/rap, oriunda de Lisboa, formada oficialmente em 2006. A banda atualmente é constituída por Francisco Maria Pereira (Kasha), Miguel Coimbra e Miguel Cristovinho.', '', 'Pop/Rap', 4.1, 685, 'D.A.M.A.', ''),
(4, 4, 1, 'A Tuna Universitária do Minho é uma tuna ligada à Universidade do Minho, no Norte de Portugal. Foi fundada em 1990, por estudantes dessa universidade. Sendo a primeira tuna sedeada na Universidade do Minho, é considerada a sua embaixatriz cultural. A T.U.M., como é também conhecida, pertence à ARCUM (Associação Recreativa e Cultural da Universidade do Minho), da qual também fazem parte grupos estudantis como os Bomboémia e o Grupo de Música Popular da Universidade do Minho. Tendo já um álbum editado, em 2000, e reeditado em 2009, a Tuna do Minho realiza anualmente o Festival Internacional de Tunas Universitárias, apelidado de Bracara Avgvsta.', '', 'Tradicional', 4.7, 34, 'Tuna Universitária do Minho', ''),
(5, 5, 1, 'O Coro Académico da Universidade do Minho (CAUM) é uma associação cultural sem fins lucrativos. Este grupo cultural da Universidade do Minho é um dos mais antigos, tendo iniciado as suas atividades em janeiro de 1989 e, desde então, tem desenvolvido um trabalho de prática e divulgação da música de todas as épocas, em especial da música portuguesa.', '', 'Tradicional/Pop/Clássico', 0, 0, 'Coro Académico da Universidade do Minho', ''),
(6, 6, 1, 'UHF é uma banda portuguesa de rock formada na Costa de Caparica, em Almada, em 1978. São os fundadores do movimento de renovação musical denominado rock português e os responsáveis pelo surgimento do boom do rock em Portugal em 1980. São uma das bandas nacionais mais prestigiadas e a mais antiga em atividade. A formação inicial era composta por António Manuel Ribeiro (vocal e guitarra), Renato Gomes (guitarra), Carlos Peres (baixo) e Américo Manuel (bateria). Atualmente são formados por António Manuel Ribeiro (vocal e guitarra), António Côrte-Real (guitarra), Luís Cebola Simões (baixo), Fernando Rodrigues (teclas e guitarra) e Ivan Cristiano (bateria e percussão).', '', 'Rock', 3.9, 610, 'UHF', ''),
(7, 7, 1, 'Marisa dos Reis Nunes Ferreira tem sido presença regular em palcos como o Carnegie Hall, em Nova Iorque, o Walt Disney Concert Hall, em Los Angeles, o Lobero Theater, em Santa Bárbara, a Salle Pleyel, em Paris, a Ópera de Sydney ou o Royal Albert Hall. O jornal britânico The Guardian considerou-a uma diva da música do mundo. Ao longo de sua carreira vendeu um milhão de discos no mundo todo, sendo uma das recordistas de vendas de discos em Portugal.', '', 'Fado', 4.8, 92, 'Mariza', ''),
(8, 8, 1, 'O Grupo POPados é um projeto que iniciou em Novembro 2016, atualmente foca-se na interpretação de covers de bandas Nacionais e Internacionais. Sendo o seu slogan, O Baile noutra dimensão, têm como principal objetivo ser arrojado no mercado das bandas de baile através de alguns arranjos originais bem como na sua particular interpretação. Com a sua boa disposição, pela sua qualidade instrumental e vocal promete proporcionar espetáculos até 3h com muito humor, boa música e muita emoção. Uma escolha perfeita para o seu evento!', '', 'Popular', 2.9, 14, 'POPados', ''),
(9, 9, 2, 'TOCA - Trabalho de uma Oficina Cultural e Associativa. Projeto criado pelo SYnergia, associação juvenil sediada em Braga, apresenta-se como um espaço sem fins lucrativos com o objetivo de prestar apoio e dinamizar várias atividades a nível associativo, juvenil, artístico, inovador, entre outros. Este espaço está a ser desenvolvido nas antigas salas de cinema do Centro Comercial Avenida, em Braga.', '', '', 3.3, 54, '', 'TOCA'),
(10, 10, 2, 'Situado no centro histórico da cidade perto da Sé, o SETRA URBAN and COCKTAIL é um bar com um conceito diferente onde pode usufruir de um serão muito agradável ao som de uma boa música.', '', 'Jazz', 4.0, 213, '', 'SETRA'),
(11, 11, 2, 'O Theatro Circo é hoje uma referência no meio artístico, não apenas por possuir uma das mais carismáticas salas de espetáculos do país, mas porque a escolha da sua programação obedece a critérios de qualidade e ecletismo, refletindo os objetivos estratégicos que foram propostos pelo acionista maioritário para este magnífico espaço.', '', '', 4.7, 640, '', 'Theatro Circo'),
(12, 12, 2, 'O Parque de Exposições de Braga conhecido por PEB é um Centro de convenções, localizado na cidade de Braga, Portugal. É uma estrutura vocacionada para a realização de feiras, exposições, congressos e outros eventos de carácter sócio-cultural, científico, recreativo e desportivo.', '', '', 2.4, 52, '', 'Parque de Exposições de Braga'),
(13, 13, 2, 'A dimensão do edifício da autoria do Arquitecto Rodrigues Lima, o jardim e a situação no centro da cidade, tornaram possível a disponibilização de espaços para actividades culturais complementares ao Museu.', '', '', 3.4, 124, '', 'Museu Nogueira da Silva'),
(14, 14, 2, 'Um espaço público destinado a ti que és jovem, que disponibiliza informações, serviços, programas e outros do teu interesse. Vem visitar-nos, estamos à tua espera!', '', '', 2.3, 67, '', 'IPDJ - Braga'),
(15, 15, 3, '', '', 'Rock', 0, 0, '', ''),
(16, 16, 3, '', '', 'Popular', 0, 0, '', ''),
(17, 17, 3, '', '', 'Pop', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usersEstado`
--

CREATE TABLE IF NOT EXISTS `usersEstado` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `designacaoEstado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `usersEstado`
--

INSERT INTO `usersEstado` (`idEstado`, `designacaoEstado`) VALUES
(1, 'Ativo'),
(2, 'Expirado'),
(3, 'Bloqueado'),
(4, 'Pendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `idPais` int(11) NOT NULL,
  `descricaoPais` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPais`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `paises`
--

INSERT INTO `paises` (`idPais`, `descricaoPais`) VALUES
(1, 'Portugal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `distritos`
--

CREATE TABLE IF NOT EXISTS `distritos` (
  `idDistrito` int(11) NOT NULL,
  `descricaoDistrito` varchar(200) NOT NULL,
  `idPais` int(11) NOT NULL,
  PRIMARY KEY (`idDistrito`),
  KEY `fk_distritos_paises1_idx` (`idPais`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `distritos`
--

INSERT INTO `distritos` (`idDistrito`, `descricaoDistrito`, `idPais`) VALUES
(1, 'Aveiro', 1),
(2, 'Beja', 1),
(3, 'Braga', 1),
(4, 'Bragança', 1),
(5, 'Castelo Branco', 1),
(6, 'Coimbra', 1),
(7, 'Évora', 1),
(8, 'Faro', 1),
(9, 'Guarda', 1),
(10, 'Leiria', 1),
(11, 'Lisboa', 1),
(12, 'Portalegre', 1),
(13, 'Porto', 1),
(14, 'Santarém', 1),
(15, 'Setúbal', 1),
(16, 'Viana do Castelo', 1),
(17, 'Vila Real', 1),
(18, 'Viseu', 1),
(31, 'Ilha da Madeira', 1),
(32, 'Ilha de Porto Santo', 1),
(41, 'Ilha de Santa Maria', 1),
(42, 'Ilha de São Miguel', 1),
(43, 'Ilha Terceira', 1),
(44, 'Ilha da Graciosa', 1),
(45, 'Ilha de São Jorge', 1),
(46, 'Ilha do Pico', 1),
(47, 'Ilha do Faial', 1),
(48, 'Ilha das Flores', 1),
(49, 'Ilha do Corvo', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `concelhos`
--

CREATE TABLE IF NOT EXISTS `concelhos` (
  `idConcelho` int(11) NOT NULL AUTO_INCREMENT,
  `idConcelhoAux` int(11) NOT NULL,
  `descricaoConcelho` varchar(300) NOT NULL,
  `idDistrito` int(11) NOT NULL,
  PRIMARY KEY (`idConcelho`),
  KEY `fk_concelhos_distritos_idx` (`idDistrito`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=309 ;

--
-- Extraindo dados da tabela `concelhos`
--

INSERT INTO `concelhos` (`idConcelho`, `idConcelhoAux`, `descricaoConcelho`, `idDistrito`) VALUES
(1, 1, 'Águeda', 1),
(2, 1, 'Aljustrel', 2),
(3, 1, 'Amares', 3),
(4, 1, 'Alfândega da Fé', 4),
(5, 1, 'Belmonte', 5),
(6, 1, 'Arganil', 6),
(7, 1, 'Alandroal', 7),
(8, 1, 'Albufeira', 8),
(9, 1, 'Aguiar da Beira', 9),
(10, 1, 'Alcobaça', 10),
(11, 1, 'Alenquer', 11),
(12, 1, 'Alter do Chão', 12),
(13, 1, 'Amarante', 13),
(14, 1, 'Abrantes', 14),
(15, 1, 'Alcácer do Sal', 15),
(16, 1, 'Arcos de Valdevez', 16),
(17, 1, 'Alijó', 17),
(18, 1, 'Armamar', 18),
(19, 1, 'Calheta (Madeira)', 31),
(20, 1, 'Porto Santo', 32),
(21, 1, 'Vila do Porto', 41),
(22, 1, 'Lagoa (São Miguel)', 42),
(23, 1, 'Angra do Heroísmo', 43),
(24, 1, 'Santa Cruz da Graciosa', 44),
(25, 1, 'Calheta (São Jorge)', 45),
(26, 1, 'Lajes do Pico', 46),
(27, 1, 'Horta', 47),
(28, 1, 'Lajes das Flores', 48),
(29, 1, 'Corvo', 49),
(30, 2, 'Albergaria-a-Velha', 1),
(31, 2, 'Almodôvar', 2),
(32, 2, 'Barcelos', 3),
(33, 2, 'Bragança', 4),
(34, 2, 'Castelo Branco', 5),
(35, 2, 'Cantanhede', 6),
(36, 2, 'Arraiolos', 7),
(37, 2, 'Alcoutim', 8),
(38, 2, 'Almeida', 9),
(39, 2, 'Alvaiázere', 10),
(40, 2, 'Arruda dos Vinhos', 11),
(41, 2, 'Arronches', 12),
(42, 2, 'Baião', 13),
(43, 2, 'Alcanena', 14),
(44, 2, 'Alcochete', 15),
(45, 2, 'Caminha', 16),
(46, 2, 'Boticas', 17),
(47, 2, 'Carregal do Sal', 18),
(48, 2, 'Câmara de Lobos', 31),
(49, 2, 'Nordeste', 42),
(50, 2, 'Praia da Vitória', 43),
(51, 2, 'Velas', 45),
(52, 2, 'Madalena', 46),
(53, 2, 'Santa Cruz das Flores', 48),
(54, 3, 'Anadia', 1),
(55, 3, 'Alvito', 2),
(56, 3, 'Braga', 3),
(57, 3, 'Carrazeda de Ansiães', 4),
(58, 3, 'Covilhã', 5),
(59, 3, 'Coimbra', 6),
(60, 3, 'Borba', 7),
(61, 3, 'Aljezur', 8),
(62, 3, 'Celorico da Beira', 9),
(63, 3, 'Ansião', 10),
(64, 3, 'Azambuja', 11),
(65, 3, 'Avis', 12),
(66, 3, 'Felgueiras', 13),
(67, 3, 'Almeirim', 14),
(68, 3, 'Almada', 15),
(69, 3, 'Melgaço', 16),
(70, 3, 'Chaves', 17),
(71, 3, 'Castro Daire', 18),
(72, 3, 'Funchal', 31),
(73, 3, 'Ponta Delgada', 42),
(74, 3, 'São Roque do Pico', 46),
(75, 4, 'Arouca', 1),
(76, 4, 'Barrancos', 2),
(77, 4, 'Cabeceiras de Basto', 3),
(78, 4, 'Freixo de Espada à Cinta', 4),
(79, 4, 'Fundão', 5),
(80, 4, 'Condeixa-a-Nova', 6),
(81, 4, 'Estremoz', 7),
(82, 4, 'Castro Marim', 8),
(83, 4, 'Figueira de Castelo Rodrigo', 9),
(84, 4, 'Batalha', 10),
(85, 4, 'Cadaval', 11),
(86, 4, 'Campo Maior', 12),
(87, 4, 'Gondomar', 13),
(88, 4, 'Alpiarça', 14),
(89, 4, 'Barreiro', 15),
(90, 4, 'Monção', 16),
(91, 4, 'Mesão Frio', 17),
(92, 4, 'Cinfães', 18),
(93, 4, 'Machico', 31),
(94, 4, 'Povoação', 42),
(95, 5, 'Aveiro', 1),
(96, 5, 'Beja', 2),
(97, 5, 'Celorico de Basto', 3),
(98, 5, 'Macedo de Cavaleiros', 4),
(99, 5, 'Idanha-a-Nova', 5),
(100, 5, 'Figueira da Foz', 6),
(101, 5, 'Évora', 7),
(102, 5, 'Faro', 8),
(103, 5, 'Fornos de Algodres', 9),
(104, 5, 'Bombarral', 10),
(105, 5, 'Cascais', 11),
(106, 5, 'Castelo de Vide', 12),
(107, 5, 'Lousada', 13),
(108, 5, 'Benavente', 14),
(109, 5, 'Grândola', 15),
(110, 5, 'Paredes de Coura', 16),
(111, 5, 'Mondim de Basto', 17),
(112, 5, 'Lamego', 18),
(113, 5, 'Ponta do Sol', 31),
(114, 5, 'Ribeira Grande', 42),
(115, 6, 'Castelo de Paiva', 1),
(116, 6, 'Castro Verde', 2),
(117, 6, 'Esposende', 3),
(118, 6, 'Miranda do Douro', 4),
(119, 6, 'Oleiros', 5),
(120, 6, 'Góis', 6),
(121, 6, 'Montemor-o-Novo', 7),
(122, 6, 'Lagoa (Algarve)', 8),
(123, 6, 'Gouveia', 9),
(124, 6, 'Caldas da Rainha', 10),
(125, 6, 'Lisboa', 11),
(126, 6, 'Crato', 12),
(127, 6, 'Maia', 13),
(128, 6, 'Cartaxo', 14),
(129, 6, 'Moita', 15),
(130, 6, 'Ponte da Barca', 16),
(131, 6, 'Montalegre', 17),
(132, 6, 'Mangualde', 18),
(133, 6, 'Porto Moniz', 31),
(134, 6, 'Vila Franca do Campo', 42),
(135, 7, 'Espinho', 1),
(136, 7, 'Cuba', 2),
(137, 7, 'Fafe', 3),
(138, 7, 'Mirandela', 4),
(139, 7, 'Penamacor', 5),
(140, 7, 'Lousã', 6),
(141, 7, 'Mora', 7),
(142, 7, 'Lagos', 8),
(143, 7, 'Guarda', 9),
(144, 7, 'Castanheira de Pêra', 10),
(145, 7, 'Loures', 11),
(146, 7, 'Elvas', 12),
(147, 7, 'Marco de Canaveses', 13),
(148, 7, 'Chamusca', 14),
(149, 7, 'Montijo', 15),
(150, 7, 'Ponte de Lima', 16),
(151, 7, 'Murça', 17),
(152, 7, 'Moimenta da Beira', 18),
(153, 7, 'Ribeira Brava', 31),
(154, 8, 'Estarreja', 1),
(155, 8, 'Ferreira do Alentejo', 2),
(156, 8, 'Guimarães', 3),
(157, 8, 'Mogadouro', 4),
(158, 8, 'Proença-a-Nova', 5),
(159, 8, 'Mira', 6),
(160, 8, 'Mourão', 7),
(161, 8, 'Loulé', 8),
(162, 8, 'Manteigas', 9),
(163, 8, 'Figueiró dos Vinhos', 10),
(164, 8, 'Lourinhã', 11),
(165, 8, 'Fronteira', 12),
(166, 8, 'Matosinhos', 13),
(167, 8, 'Constância', 14),
(168, 8, 'Palmela', 15),
(169, 8, 'Valença', 16),
(170, 8, 'Peso da Régua', 17),
(171, 8, 'Mortágua', 18),
(172, 8, 'Santa Cruz', 31),
(173, 9, 'Santa Maria da Feira', 1),
(174, 9, 'Mértola', 2),
(175, 9, 'Póvoa de Lanhoso', 3),
(176, 9, 'Torre de Moncorvo', 4),
(177, 9, 'Sertã', 5),
(178, 9, 'Miranda do Corvo', 6),
(179, 9, 'Portel', 7),
(180, 9, 'Monchique', 8),
(181, 9, 'Meda', 9),
(182, 9, 'Leiria', 10),
(183, 9, 'Mafra', 11),
(184, 9, 'Gavião', 12),
(185, 9, 'Paços de Ferreira', 13),
(186, 9, 'Coruche', 14),
(187, 9, 'Santiago do Cacém', 15),
(188, 9, 'Viana do Castelo', 16),
(189, 9, 'Ribeira de Pena', 17),
(190, 9, 'Nelas', 18),
(191, 9, 'Santana', 31),
(192, 10, 'Ílhavo', 1),
(193, 10, 'Moura', 2),
(194, 10, 'Terras de Bouro', 3),
(195, 10, 'Vila Flor', 4),
(196, 10, 'Vila de Rei', 5),
(197, 10, 'Montemor-o-Velho', 6),
(198, 10, 'Redondo', 7),
(199, 10, 'Olhão', 8),
(200, 10, 'Pinhel', 9),
(201, 10, 'Marinha Grande', 10),
(202, 10, 'Oeiras', 11),
(203, 10, 'Marvão', 12),
(204, 10, 'Paredes', 13),
(205, 10, 'Entroncamento', 14),
(206, 10, 'Seixal', 15),
(207, 10, 'Vila Nova de Cerveira', 16),
(208, 10, 'Sabrosa', 17),
(209, 10, 'Oliveira de Frades', 18),
(210, 10, 'São Vicente', 31),
(211, 11, 'Mealhada', 1),
(212, 11, 'Odemira', 2),
(213, 11, 'Vieira do Minho', 3),
(214, 11, 'Vimioso', 4),
(215, 11, 'Vila Velha de Ródão', 5),
(216, 11, 'Oliveira do Hospital', 6),
(217, 11, 'Reguengos de Monsaraz', 7),
(218, 11, 'Portimão', 8),
(219, 11, 'Sabugal', 9),
(220, 11, 'Nazaré', 10),
(221, 11, 'Sintra', 11),
(222, 11, 'Monforte', 12),
(223, 11, 'Penafiel', 13),
(224, 11, 'Ferreira do Zêzere', 14),
(225, 11, 'Sesimbra', 15),
(226, 11, 'Santa Marta de Penaguião', 17),
(227, 11, 'Penalva do Castelo', 18),
(228, 12, 'Murtosa', 1),
(229, 12, 'Ourique', 2),
(230, 12, 'Vila Nova de Famalicão', 3),
(231, 12, 'Vinhais', 4),
(232, 12, 'Pampilhosa da Serra', 6),
(233, 12, 'Vendas Novas', 7),
(234, 12, 'São Brás de Alportel', 8),
(235, 12, 'Seia', 9),
(236, 12, 'Óbidos', 10),
(237, 12, 'Sobral de Monte Agraço', 11),
(238, 12, 'Nisa', 12),
(239, 12, 'Porto', 13),
(240, 12, 'Golegã', 14),
(241, 12, 'Setúbal', 15),
(242, 12, 'Valpaços', 17),
(243, 12, 'Penedono', 18),
(244, 13, 'Oliveira de Azeméis', 1),
(245, 13, 'Serpa', 2),
(246, 13, 'Vila Verde', 3),
(247, 13, 'Penacova', 6),
(248, 13, 'Viana do Alentejo', 7),
(249, 13, 'Silves', 8),
(250, 13, 'Trancoso', 9),
(251, 13, 'Pedrógão Grande', 10),
(252, 13, 'Torres Vedras', 11),
(253, 13, 'Ponte de Sor', 12),
(254, 13, 'Póvoa de Varzim', 13),
(255, 13, 'Mação', 14),
(256, 13, 'Sines', 15),
(257, 13, 'Vila Pouca de Aguiar', 17),
(258, 13, 'Resende', 18),
(259, 14, 'Oliveira do Bairro', 1),
(260, 14, 'Vidigueira', 2),
(261, 14, 'Vizela', 3),
(262, 14, 'Penela', 6),
(263, 14, 'Vila Viçosa', 7),
(264, 14, 'Tavira', 8),
(265, 14, 'Vila Nova de Foz Côa', 9),
(266, 14, 'Peniche', 10),
(267, 14, 'Vila Franca de Xira', 11),
(268, 14, 'Portalegre', 12),
(269, 14, 'Santo Tirso', 13),
(270, 14, 'Rio Maior', 14),
(271, 14, 'Vila Real', 17),
(272, 14, 'Santa Comba Dão', 18),
(273, 15, 'Ovar', 1),
(274, 15, 'Soure', 6),
(275, 15, 'Vila do Bispo', 8),
(276, 15, 'Pombal', 10),
(277, 15, 'Amadora', 11),
(278, 15, 'Sousel', 12),
(279, 15, 'Valongo', 13),
(280, 15, 'Salvaterra de Magos', 14),
(281, 15, 'São João da Pesqueira', 18),
(282, 16, 'São João da Madeira', 1),
(283, 16, 'Tábua', 6),
(284, 16, 'Vila Real de Santo António', 8),
(285, 16, 'Porto de Mós', 10),
(286, 16, 'Odivelas', 11),
(287, 16, 'Vila do Conde', 13),
(288, 16, 'Santarém', 14),
(289, 16, 'São Pedro do Sul', 18),
(290, 17, 'Sever do Vouga', 1),
(291, 17, 'Vila Nova de Poiares', 6),
(292, 17, 'Vila Nova de Gaia', 13),
(293, 17, 'Sardoal', 14),
(294, 17, 'Sátão', 18),
(295, 18, 'Vagos', 1),
(296, 18, 'Trofa', 13),
(297, 18, 'Tomar', 14),
(298, 18, 'Sernancelhe', 18),
(299, 19, 'Vale de Cambra', 1),
(300, 19, 'Torres Novas', 14),
(301, 19, 'Tabuaço', 18),
(302, 20, 'Vila Nova da Barquinha', 14),
(303, 20, 'Tarouca', 18),
(304, 21, 'Ourém', 14),
(305, 21, 'Tondela', 18),
(306, 22, 'Vila Nova de Paiva', 18),
(307, 23, 'Viseu', 18),
(308, 24, 'Vouzela', 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `email` varchar(200) NOT NULL,
  `morada` varchar(500) NOT NULL,
  `urlLogotipo` varchar(300) DEFAULT NULL,
  `codigoPostal1` varchar(12) DEFAULT NULL,
  `codigoPostal2` varchar(12) DEFAULT NULL,
  `codigoPostalDesignacao` varchar(100) DEFAULT NULL,
  `idConcelho` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `contribuinte` varchar(15) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `telemovel` varchar(15) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `nrCreditos` int(11) DEFAULT '0',
  `precoHora` decimal(12,2) DEFAULT '0.00',
  `precoDia` decimal(12,2) DEFAULT '0.00',
  `precoDeslocacao` decimal(12,2) DEFAULT NULL,
  `precoMinimoAtuacao` decimal(12,2) DEFAULT NULL,
  `dataExpiracaoConta` datetime DEFAULT NULL,
  `dataRegisto` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `ultimaHashVerificacao` varchar(400) DEFAULT NULL,
  `pedidoRecuperacaoPass` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_users_concelhos1_idx` (`idConcelho`),
  KEY `fk_users_usersEstado1_idx` (`estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`				, `email`							, `morada`																		, `urlLogotipo`																																			, `codigoPostal1`, `codigoPostal2`, `codigoPostalDesignacao`, `idConcelho`, `estado`, `contribuinte`, `telefone`, `telemovel`, `password`, `nrCreditos`, `precoHora`, `precoDia`, `precoDeslocacao`, `precoMinimoAtuacao`, `dataExpiracaoConta`, `dataRegisto`, `created_at`, `updated_at`, `remember_token`, `ultimaHashVerificacao`, `pedidoRecuperacaoPass`) VALUES
(1, 'José Amaro'								, 'geral@zeamaro.com'				, 'Travessa dos Chouriços, Curral dos Porcos'									, 'http://www.zeamaro.com/images/logo.png'																												, '2870', '324', 'Alcácer do Sal'							, 15	, 1, '129420439', '253601275', '925800362', 'password', 0, 0.0, 0.0, 0.0, 0.0, '2018-03-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', NULL, '', 0),
(2, 'Rosa Maria'								, 'rosinha@rosinha.net'				, 'Av. 5 de Outubro 26, Sarilhos Grandes'										, 'http://www.rosinha.net/img/logo.png'																													, '2870', '515', 'Montijo'									, 149	, 1, '908432687', '210992877', '935043931', 'password', 0, 0.0, 0.0, 0.0, 0.0, '2018-03-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', NULL, '', 0),
(3, 'Joaquim Fonseca'							, 'joaquimfonseca@glam.com.pt'		, 'Rua Francisco Ribeiro, Riba Acima'											, 'https://scontent.fopo2-2.fna.fbcdn.net/v/t1.0-9/23380414_1638037429575122_4611484161764329108_n.jpg?oh=a086da5208d495027f97b78c9f519aac&oe=5B1821C6'	, '4322', '434', 'Lisboa'									, 125	, 1, '908321098', '210992877', '934236685', 'password', 0, 0.0, 0.0, 0.0, 0.0, '2018-03-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', NULL, '', 0),
(4, 'Tuna Universitária do Minho'				, 'tum@arcum.pt'					, 'R. Dom Pedro V 88'															, 'https://scontent.fopo2-2.fna.fbcdn.net/v/t1.0-9/26112085_10155955397676322_2732530873385670875_n.jpg?oh=9435c18d38b3b530939eb8bdeeca1719&oe=5AE49C20', '4710', '374', 'Braga'									, 56	, 1, '129420439', '253601275', '933585056', 'password', 0, 0.0, 0.0, 0.0, 0.0, '2018-03-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', NULL, '', 0),
(5, 'Coro Académico da Universidade do Minho'	, 'mail@caum.pt'					, 'Sala 220, Complexo Pedagógico 2, Campus de Gualtar, Universidade do Minho'	, 'https://upload.wikimedia.org/wikipedia/commons/d/d0/Caumlogo.png'																					, '4710', '057', 'Braga'									, 56	, 1, '502619082', '253601275', '938446702', 'password', 0, 0.0, 0.0, 0.0, 0.0, '2018-03-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', NULL, '', 0),
(6, 'UHF'										, 'booking@uhfrock.com'				, 'Apartado 518'																, 'http://uhfrock.com/wp-content/uploads/2015/11/uhf_logo_baranco.png'																					, '2821', '901', 'Charneca da Caparica'						, 68	, 1, '908432687', '210992877', '925800362', 'password', 0, 0.0, 0.0, 0.0, 0.0, '2018-03-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', NULL, '', 0),
(7, 'Marisa dos Reis Nunes Ferreira'			, 'ruibraga@ruelamusic.com'			, 'Lugar do Desassossego, Facas Afiadas' 										, 'https://meanycenter.org/sites/default/files/Images/Mariza-kampagnenfoto_dsc_5707final_0.jpg'															, '2870', '765', 'Amares'									, 3		, 1, '502619082', '219249249', '966781126', 'password', 0, 0.0, 0.0, 0.0, 0.0, '2018-03-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', NULL, '', 0),
(8, 'POPados'									, 'bandapopados@gmail.com'			, 'Rua Guilhermina Josepha, Portugal dos Pequeninos'							, 'https://scontent.fopo2-2.fna.fbcdn.net/v/t1.0-9/16427365_1450166488350891_1201065681281707396_n.png?oh=737b329f6fe90c5e05c9fc9644e7e9e4&oe=5AE3546A'	, '4321', '284', 'Braga'									, 56	, 2, '908432687', '253601275', '969149456', 'password', 0, 0.0, 0.0, 0.0, 0.0, '2018-03-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', NULL, '', 0),
(9, 'TOCA'										, 'toca.braga@gmail.com'			, 'Avenida Central 33, Bragashopping, 2º piso'									, 'https://scontent.fopo2-2.fna.fbcdn.net/v/t1.0-9/1459867_842593505770307_289709564_n.jpg?oh=994c44b445e6eec0681335620f110a83&oe=5B19D384'				, '4710', '228', 'Braga'									, 56	, 1, '502619082', '253299230', '966781126', 'password', 0, 0.0, 0.0, 0.0, 0.0, '2018-03-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', NULL, '', 0),
(10, 'SETRA'									, 'setrabarbraga@gmail.com'			, 'Rua de São João, 15, 1 andar'												, 'https://scontent.fopo2-2.fna.fbcdn.net/v/t1.0-9/26166661_791197511081445_7384628648437398021_n.jpg?oh=33a1282e807a0611b37d6fcbdfbd5c3a&oe=5B1B6360'	, '4700', '424', 'Braga'									, 56	, 1, '129420439', '210992877', '911128423', 'password', 0, 0.0, 0.0, 0.0, 0.0, '2018-03-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', NULL, '', 0),
(11, 'Theatro Circo'							, 'theatrocirco@theatrocirco.com'	, 'Avenida da Liberdade, 697'													, 'https://scontent.fopo2-2.fna.fbcdn.net/v/t1.0-9/395226_10151164963079781_1821446440_n.jpg?oh=4add102832df396e8d4522c6a6779e3f&oe=5B2126A2'			, '4710', '251', 'Braga'									, 56	, 1, '908432687', '253203800', '966781126', 'password', 0, 0.0, 0.0, 0.0, 0.0, '2018-03-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', NULL, '', 0),
(12, 'PEB'										, 'geral@investbraga.com'			, 'Av. Dr. Francisco Pires Gonçalves, Apartado 60'								, 'http://www.investbraga.com/peb/resources/images/branding/logo2x.png'																					, '4711', '909', 'Braga'									, 56	, 1, '502619082', '253208230', '925800362', 'password', 0, 0.0, 0.0, 0.0, 0.0, '2018-03-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', NULL, '', 0),
(13, 'MNS'										, 'sec@mns.uminho.pt'				, 'Av. Central 61'																, 'http://www.mns.uminho.pt/logo_mns3.png'																												, '4710', '228', 'Braga'									, 56	, 1, '129420439', '253601275', '966781126', 'password', 0, 0.0, 0.0, 0.0, 0.0, '2018-03-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', NULL, '', 0),
(14, 'IPDJ Braga'								, 'mailbraga@ipdj.pt'				, 'Rua de Santa Margarida 6'													, 'https://www.ipdj.pt/docs/Logo_IPDJ.jpg'																												, '4710', '306', 'Braga'									, 56	, 1, '908321098', '253204250', '925800362', 'password', 0, 0.0, 0.0, 0.0, 0.0, '2018-03-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', NULL, '', 0),
(15, 'Armando Queirós'							, 'armandomtq@hotmail.com'			, 'Rua da Paz 4, Lomar'															, 'http://www.knowledgelost.org/art/guernica-picassos-masterpiece/'																						, '4705', '218', 'Braga'									, 56	, 1, '502619082', '210992877', '915382192', 'password', 0, 0.0, 0.0, 0.0, 0.0, '2018-03-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', NULL, '', 0),
(16, 'Hugo Miguel'								, 'hugorodrigues@telepecas.com'		, 'Praça do Chocolate Quente, OMundoÉLindo'										, 'https://www.cat-world.com.au/wp-content/uploads/2009/07/chocolate-toxicity-in-cat111.jpg'															, '2870', '547', 'Alcácer do Sal'							, 15	, 1, '129420439', '253601275', '964895105', 'password', 0, 0.0, 0.0, 0.0, 0.0, '2018-03-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', NULL, '', 0),
(17, 'André'									, 'andreoflight@gmail.com'			, 'Rua PSD é vida, Coração do Povo'												, 'https://cdn2.iconfinder.com/data/icons/Qetto___icons_by_ampeross-d4njobq/256/psd.png'																, '4800', '133', 'Guimarães'								, 156	, 3, '502619082', '210992877', '962281900', 'password', 0, 0.0, 0.0, 0.0, 0.0, '2018-03-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', '2018-02-01 19:52:30', NULL, '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios`
--

CREATE TABLE IF NOT EXISTS `anuncios` (
  `idAnuncio` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilizador` int(11) NOT NULL,
  `idPerfil` int(11) NOT NULL,
  `dataCriacaoAnuncio` datetime DEFAULT NULL,
  `estadoAnuncio` int(11) DEFAULT NULL,
  `dataExpiracaoAnuncio` datetime DEFAULT NULL,
  `textoAnuncio` text,
  `urlImagemAnuncio` varchar(200) DEFAULT NULL,
  `patrocinado` int(11) NOT NULL DEFAULT '0',
  `nrVisualizacoes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idAnuncio`),
  KEY `fk_anuncios_users1_idx` (`idUtilizador`),
  KEY `idPerfil` (`idPerfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `anuncios`
--

INSERT INTO `anuncios` (`idAnuncio`, `idUtilizador`, `idPerfil`, `dataCriacaoAnuncio`, `estadoAnuncio`, `dataExpiracaoAnuncio`, `textoAnuncio`, `urlImagemAnuncio`, `patrocinado`, `nrVisualizacoes`) VALUES
(1, 1, 1, '2018-02-01 19:52:30', 1, '2018-03-01 19:52:30', 'Inspirado na música romântica, popular e principalmente na música country é notório o amadurecimento do artista em todas as suas letras e músicas e a influência de todos os seus espectáculos em Portugal ou pelas comunidades portuguesas em torno do mundo.', 'http://www.zeamaro.com/images/logo.png', 1, 0),
(2, 9, 9, '2018-02-01 20:21:44', 1, '2028-02-01 20:21:44', 'Este espaço está a ser desenvolvido nas antigas salas de cinema do Centro Comercial Avenida, em Braga.', 'https://scontent.fopo2-2.fna.fbcdn.net/v/t1.0-9/1459867_842593505770307_289709564_n.jpg?oh=994c44b445e6eec0681335620f110a83&oe=5B19D384', 0, 0),
(3, 5, 5, '2018-02-01 20:27:36', 1, '2018-03-01 20:27:35', 'Este grupo cultural da Universidade do Minho é um dos mais antigos, tendo iniciado as suas atividades em janeiro de 1989 e, desde então, tem desenvolvido um trabalho de prática e divulgação da música de todas as épocas, em especial da música portuguesa.', 'https://upload.wikimedia.org/wikipedia/commons/d/d0/Caumlogo.png', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `anunciosEstados`
--

CREATE TABLE IF NOT EXISTS `anunciosEstados` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `descricaoEstado` varchar(300) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `anunciosEstados`
--

INSERT INTO `anunciosEstados` (`idEstado`, `descricaoEstado`) VALUES
(1, 'Ativo'),
(2, 'Pendente'),
(3, 'Expirado'),
(4, 'Removido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `codigosPostais`
--

CREATE TABLE IF NOT EXISTS `codigosPostais` (
  `idCodigoPostal` int(11) NOT NULL,
  `idDistrito` int(11) NOT NULL,
  `idConcelho` int(11) NOT NULL,
  `codLocalidade` varchar(200) NOT NULL,
  `nomeLocalidade` varchar(500) NOT NULL,
  `codPostal1` varchar(200) NOT NULL,
  `codPostal2` varchar(200) NOT NULL,
  `codPostalDesignacao` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `duvidasContactos`
--

CREATE TABLE IF NOT EXISTS `duvidasContactos` (
  `idDuvida` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(300) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(300) NOT NULL,
  `mensagem` text NOT NULL,
  `estado` int(11) NOT NULL,
  `tipoForm` int(11) NOT NULL DEFAULT '1',
  `dataHoraRegisto` datetime NOT NULL,
  `dataHoraTratada` datetime DEFAULT NULL,
  PRIMARY KEY (`idDuvida`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `duvidasContactos`
--

INSERT INTO `duvidasContactos` (`idDuvida`, `nome`, `telefone`, `email`, `mensagem`, `estado`, `tipoForm`, `dataHoraRegisto`, `dataHoraTratada`) VALUES
(1, 'Hugo Rodrigues Teste', '918804120', 'correiohugomiguel@gmail.com', 'Que site bacana!', 1, 2, '2018-02-02 16:45:50', NULL);


-- --------------------------------------------------------

--
-- Estrutura da tabela `freguesias`
--

CREATE TABLE IF NOT EXISTS `freguesias` (
  `idFreguesia` int(11) NOT NULL,
  `descricaoFreguesia` varchar(200) NOT NULL,
  `idConcelho` int(11) NOT NULL,
  PRIMARY KEY (`idFreguesia`),
  KEY `fk_freguesias_concelhos1_idx` (`idConcelho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `freguesias`
--

INSERT INTO `freguesias` (`idFreguesia`, `descricaoFreguesia`, `idConcelho`) VALUES
(1, 'Abrantes (São Vicente e São João) e Alferrarede', 14),
(2, 'Aldeia do Mato e Souto', 14),
(3, 'Alvega e Concavada', 14),
(4, 'Bemposta', 14),
(5, 'Carvalhal', 14),
(6, 'Fontes', 14),
(7, 'Martinchel', 14),
(8, 'Mouriscas', 14),
(9, 'Pego', 14),
(10, 'Rio de Moinhos', 14),
(11, 'São Facundo e Vale das Mós', 14),
(12, 'São Miguel do Rio Torto e Rossio ao Sul do Tejo', 14),
(13, 'Tramagal', 14),
(14, 'Aguada de Cima', 1),
(15, 'Águeda e Borralha', 1),
(16, 'Barrô e Aguada de Baixo', 1),
(17, 'Belazaima do Chão, Castanheira do Vouga e Agadão', 1),
(18, 'Fermentelos', 1),
(19, 'Macinhata do Vouga', 1),
(20, 'Préstimo e Macieira de Alcoba', 1),
(21, 'Recardães e Espinhel', 1),
(22, 'Travassô e Óis da Ribeira', 1),
(23, 'Trofa, Segadães e Lamas do Vouga', 1),
(24, 'Valongo do Vouga', 1),
(25, 'Aguiar da Beira e Coruche', 9),
(26, 'Carapito', 9),
(27, 'Cortiçada', 9),
(28, 'Dornelas', 9),
(29, 'Eirado', 9),
(30, 'Forninhos', 9),
(31, 'Pena Verde', 9),
(32, 'Pinheiro', 9),
(33, 'Sequeiros e Gradiz', 9),
(34, 'Souto de Aguiar da Beira e Valverde', 9),
(35, 'Alandroal (Nossa Senhora da Conceição), São Brás dos Matos (Mina do Bugalho) e Juromenha (Nossa Senhora do Loreto)', 7),
(36, 'Capelins (Santo António)', 7),
(37, 'Santiago Maior', 7),
(38, 'Terena (São Pedro)', 7),
(40, 'Albergaria-a-Velha e Valmaior', 30),
(41, 'Alquerubim', 30),
(42, 'Angeja', 30),
(43, 'Branca', 30),
(44, 'Ribeira de Fráguas', 30),
(45, 'São João de Loure e Frossos', 30),
(46, 'Albufeira e Olhos de Água', 8),
(47, 'Ferreiras', 8),
(48, 'Guia', 8),
(49, 'Paderne', 8),
(50, 'Alcácer do Sal (Santa Maria do Castelo e Santiago) e Santa Susana', 15),
(51, 'Comporta', 15),
(52, 'São Martinho', 15),
(53, 'Torrão', 15),
(54, 'Alcanena e Vila Moreira', 43),
(55, 'Bugalhos', 43),
(56, 'Malhou, Louriceira e Espinheiro', 43),
(57, 'Minde', 43),
(58, 'Moitas Venda', 43),
(59, 'Monsanto', 43),
(60, 'Serra de Santo António', 43),
(61, 'Alcobaça e Vestiaria', 10),
(62, 'Alfeizerão', 10),
(63, 'Aljubarrota', 10),
(64, 'Bárrio', 10),
(65, 'Benedita', 10),
(66, 'Cela', 10),
(67, 'Coz, Alpedriz e Montes', 10),
(68, 'Évora de Alcobaça', 10),
(69, 'Maiorga', 10),
(70, 'Pataias e Martingança', 10),
(71, 'São Martinho do Porto', 10),
(72, 'Turquel', 10),
(73, 'Vimeiro', 10),
(74, 'Adaúfe', 56),
(75, 'Arentim e Cunha', 56),
(76, 'Braga (Maximinos, Sé e Cividade)', 56),
(77, 'Braga (São José de São Lázaro e São João do Souto)', 56),
(78, 'Braga (São Vicente)', 56),
(79, 'Braga (São Vítor)', 56),
(80, 'Cabreiros e Passos (São Julião)', 56),
(81, 'Celeirós, Aveleda e Vimieiro', 56),
(82, 'Crespos e Pousada', 56),
(83, 'Escudeiros e Penso (Santo Estêvão e São Vicente)', 56),
(84, 'Espinho', 56),
(85, 'Esporões', 56),
(86, 'Este (São Pedro e São Mamede)', 56),
(87, 'Ferreiros e Gondizalves', 56),
(88, 'Figueiredo', 56),
(89, 'Gualtar', 56),
(90, 'Guisande e Oliveira (São Pedro)', 56),
(91, 'Lamas', 56),
(92, 'Lomar e Arcos', 56),
(93, 'Merelim (São Paio), Panoias e Parada de Tibães', 56),
(94, 'Merelim (São Pedro) e Frossos', 56),
(95, 'Mire de Tibães', 56),
(96, 'Morreira e Trandeiras', 56),
(97, 'Nogueira, Fraião e Lamaçães', 56),
(98, 'Nogueiró e Tenões', 56),
(99, 'Padim da Graça', 56),
(100, 'Palmeira', 56),
(101, 'Pedralva', 56),
(102, 'Priscos', 56),
(103, 'Real, Dume e Semelhe', 56),
(104, 'Ruilhe', 56),
(105, 'Santa Lucrécia de Algeriz e Navarra', 56),
(106, 'Sequeira', 56),
(107, 'Sobreposta', 56),
(108, 'Tadim', 56),
(109, 'Tebosa', 56),
(110, 'Vilaça e Fradelos', 56);

-- --------------------------------------------------------

--
-- Estrutura da tabela `localEventos`
--

CREATE TABLE IF NOT EXISTS `localEventos` (
  `idLocal` int(11) NOT NULL AUTO_INCREMENT,
  `descricaoLocal` varchar(100) NOT NULL,
  `moradaLocal` varchar(300) DEFAULT NULL,
  `codigoPostal1` varchar(20) DEFAULT NULL,
  `codigoPostal2` varchar(20) DEFAULT NULL,
  `idFreguesia` int(11) NOT NULL,
  `coordenadaX` varchar(100) DEFAULT NULL,
  `coordenadaY` varchar(100) DEFAULT NULL,
  `localidade` varchar(100) DEFAULT NULL,
  `lotacaoMax` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLocal`),
  KEY `fk_localEventos_freguesias1_idx` (`idFreguesia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------
--
-- Extraindo dados da tabela `localEventos`
--

INSERT INTO `localEventos` (`idLocal`, `descricaoLocal`, `moradaLocal`, `codigoPostal1`, `codigoPostal2`, `idFreguesia`) VALUES
(1, 'Largo Festas da Ribeira', 'Largo Festas da Ribeira', '4739', '324', 93),
(2, 'Praça do Convívio', 'Praça do Convívio', '4636', '643', 88),
(3, 'TOCA', 'Avenida Central 33, Bragashopping, 2º piso', '4710', '228', 77),
(4, 'SETRA', 'Rua de São João, nº 15 - 1ºandar', '4700', '424', 56),
(5, 'Theatro Circo', 'Avenida da Liberdade, n.º 697', '4710', '251', 77);

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `idEvento` int(11) NOT NULL AUTO_INCREMENT,
  `tituloEvento` varchar(200) NOT NULL,
  `idUtilizador` int(11) NOT NULL,
  `descricaoEvento` varchar(250) DEFAULT NULL,
  `dataInicioEvento` datetime DEFAULT NULL,
  `dataFimEvento` datetime DEFAULT NULL,
  `dataCriacaoEvento` datetime DEFAULT NULL,
  `dataLimiteInscricao` datetime DEFAULT NULL,
  `nrMaxParticipantes` int(11) NOT NULL DEFAULT '0',
  `nrPessoasInscritas` int(11) NOT NULL DEFAULT '0',
  `idLocal` int(11) NOT NULL,
  `urlImagemEvento` varchar(300) NOT NULL,
  `patrocinado` tinyint(4) NOT NULL DEFAULT '0',
  `dataExpiracaoPatrocinio` datetime DEFAULT NULL,
  `estadoEvento` int(11) DEFAULT NULL,
  `nrGostos` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idEvento`),
  KEY `fk_evento_users1_idx` (`idUtilizador`),
  KEY `fk_evento_localEventos1_idx` (`idLocal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`idEvento`, `tituloEvento`, `idUtilizador`, `idLocal`, `urlImagemEvento`) VALUES
(1, 'Festa da Nossa Senhora da Agonia', 14, 1, 'https://www.eventbriz.com/wp-content/uploads/2017/09/NOWLIVE.jpg'),
(2, 'Festa da Salxixeira', 14, 1, 'https://www.eventbriz.com/wp-content/uploads/2017/09/NOWLIVE.jpg'),
(3, 'Queima das Fitas', 14, 1, 'https://www.eventbriz.com/wp-content/uploads/2017/09/NOWLIVE.jpg'),
(4, 'Enterro do Cão', 14, 1, 'https://www.eventbriz.com/wp-content/uploads/2017/09/NOWLIVE.jpg'),
(5, 'Pingo Doce Festival', 14, 1, 'https://www.eventbriz.com/wp-content/uploads/2017/09/NOWLIVE.jpg'),
(6, 'JazzCuzi', 14, 1, 'https://www.eventbriz.com/wp-content/uploads/2017/09/NOWLIVE.jpg'),
(7, 'Whose Blues Blue', 14, 1, 'https://www.eventbriz.com/wp-content/uploads/2017/09/NOWLIVE.jpg'),
(8, 'Aniversário TOCA', 9, 3, 'https://scontent.fopo2-2.fna.fbcdn.net/v/t1.0-9/1459867_842593505770307_289709564_n.jpg?oh=994c44b445e6eec0681335620f110a83&oe=5B19D384');


-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidosOrcamentos`
--

CREATE TABLE IF NOT EXISTS `pedidosOrcamentos` (
  `idOrcamento` int(11) NOT NULL AUTO_INCREMENT,
  `precoTotal` decimal(12,2) DEFAULT NULL,
  `precoDeslocacao` decimal(12,2) DEFAULT NULL,
  `descricaoOrcamento` text,
  `ivaIncluido` int(11) DEFAULT NULL,
  `adjudicado` int(11) DEFAULT NULL,
  `idArtista` int(11) NOT NULL,
  `idOrganizador` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  PRIMARY KEY (`idOrcamento`),
  KEY `fk_pedidosOrcamentos_users1_idx` (`idArtista`),
  KEY `fk_pedidosOrcamentos_users2_idx` (`idOrganizador`),
  KEY `fk_pedidosOrcamentos_evento1_idx` (`idEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------
--
-- Extraindo dados da tabela `pedidosOrcamentos`
--

INSERT INTO `pedidosOrcamentos` (`idOrcamento`, `precoTotal`, `precoDeslocacao`, `descricaoOrcamento`, `ivaIncluido`, `adjudicado`, `idArtista`, `idOrganizador`, `idEvento`) VALUES
(1, 1000.00, 50.00, 'A TOCA quer o Zé Amaro no Dia de São Nunca, à noite. Vai ser cabeça de cartaz do nosso aniversário.', 1, 1, 1, 9, 8);


-- --------------------------------------------------------

--
-- Estrutura da tabela `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `idEmail` int(11) NOT NULL AUTO_INCREMENT,
  `idRemetente` int(11) DEFAULT NULL,
  `idDestinatario` int(11) DEFAULT NULL,
  `idPasta` int(11) DEFAULT NULL,
  `dataHoraCriacao` datetime DEFAULT NULL,
  `visto` int(11) DEFAULT NULL,
  `mensagem` text,
  `idPedidoOrcamento` int(11) NOT NULL,
  `idEmailResposta` int(11) DEFAULT '0',
  PRIMARY KEY (`idEmail`),
  KEY `fk_emails_pedidosOrcamentos1_idx` (`idPedidoOrcamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `emails`
--

INSERT INTO `emails` (`idEmail`, `idRemetente`, `idDestinatario`, `idPasta`, `dataHoraCriacao`, `visto`, `mensagem`, `idPedidoOrcamento`, `idEmailResposta`) VALUES
(1, 9, 1, 0, '2018-02-02 16:45:50', 1, 'Mano Zé! Comé? Podes vir aqui dar música ao pessoal?', 1, 2),
(2, 1, 9, 0, '2018-02-03 16:45:50', 1, 'Claro! Pagas bem?', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `emaisDocumentos`
--

CREATE TABLE IF NOT EXISTS `emaisDocumentos` (
  `idEmailDocumento` int(11) NOT NULL AUTO_INCREMENT,
  `idEmail` int(11) NOT NULL,
  `urlDocumento` varchar(400) NOT NULL,
  `valido` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idEmailDocumento`),
  KEY `fk_emaislDocumentos_emails1_idx` (`idEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresasPatrocinio`
--

CREATE TABLE IF NOT EXISTS `empresasPatrocinio` (
  `idEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `nomeEmpresa` varchar(200) NOT NULL,
  `urlEmpresa` varchar(200) DEFAULT NULL,
  `logoEmpresa` varchar(200) DEFAULT NULL,
  `descricaoEmpresa` varchar(300) DEFAULT NULL,
  `tipoDestaque` int(11) DEFAULT '1',
  PRIMARY KEY (`idEmpresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estadoUtilizadoresEvento`
--

CREATE TABLE IF NOT EXISTS `estadoUtilizadoresEvento` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `descricaoEstado` varchar(100) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventoEmpresasQuePatrocinam`
--

CREATE TABLE IF NOT EXISTS `eventoEmpresasQuePatrocinam` (
  `idEmpresa` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  `tipoDestaque` int(11) NOT NULL DEFAULT '1',
  `valido` int(11) DEFAULT '1',
  PRIMARY KEY (`idEmpresa`,`idEvento`),
  KEY `fk_eventoEmpresasQuePatrocinam_evento1_idx` (`idEvento`),
  KEY `fk_eventoEmpresasQuePatrocinam_empresasPatrocinio1_idx` (`idEmpresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventoEstados`
--

CREATE TABLE IF NOT EXISTS `eventoEstados` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `descricaoEstado` varchar(100) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `eventoEstados`
--

INSERT INTO `eventoEstados` (`idEstado`, `descricaoEstado`) VALUES
(1, 'Ativo'),
(2, 'Removido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `EventosArtistasContratados`
--

CREATE TABLE IF NOT EXISTS `EventosArtistasContratados` (
  `idEvento` int(11) NOT NULL,
  `idArtista` int(11) NOT NULL,
  `dataHoraContratacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valido` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idEvento`,`idArtista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
--
-- Extraindo dados da tabela `EventpsArtistasContratados`
--

INSERT INTO `EventosArtistasContratados` (`idEvento`, `idArtista`) VALUES
(1, 1),
(2, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `EventosTipos`
--

CREATE TABLE IF NOT EXISTS `EventosTipos` (
  `idEvento` int(11) NOT NULL,
  `tipoEvento` int(11) NOT NULL,
  PRIMARY KEY (`idEvento`,`tipoEvento`),
  KEY `fk_evento_has_tipoEventos_tipoEventos1_idx` (`tipoEvento`),
  KEY `fk_evento_has_tipoEventos_evento1_idx` (`idEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcaoEventoUtilizadores`
--

CREATE TABLE IF NOT EXISTS `funcaoEventoUtilizadores` (
  `idFuncao` int(11) NOT NULL AUTO_INCREMENT,
  `descricaoFuncao` varchar(100) NOT NULL,
  PRIMARY KEY (`idFuncao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gostosPerfilCalendario`
--

CREATE TABLE IF NOT EXISTS `gostosPerfilCalendario` (
  `idGostoCalendario` int(11) NOT NULL AUTO_INCREMENT,
  `idMarcacao` int(11) NOT NULL,
  `idClienteMeteuGosto` int(11) NOT NULL,
  PRIMARY KEY (`idGostoCalendario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `LocalVisitadosPorUtilizadores`
--

CREATE TABLE IF NOT EXISTS `LocalVisitadosPorUtilizadores` (
  `idLocal` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idLocal`,`idUser`),
  KEY `fk_localEventos_has_users_users1_idx` (`idUser`),
  KEY `fk_localEventos_has_users_localEventos1_idx` (`idLocal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE IF NOT EXISTS `pagamentos` (
  `idPagamento` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `dataPagamento` datetime NOT NULL,
  `quantia` decimal(12,2) NOT NULL DEFAULT '0.00',
  `metodoPagamento` int(11) DEFAULT NULL,
  `idServico` int(11) DEFAULT NULL,
  `dataExpiracaoAtual` datetime DEFAULT NULL,
  `dataExpiracaoApos` datetime DEFAULT NULL,
  PRIMARY KEY (`idPagamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfilCalendario`
--

CREATE TABLE IF NOT EXISTS `perfilCalendario` (
  `idMarcacao` int(11) NOT NULL AUTO_INCREMENT,
  `diaInicio` int(11) NOT NULL,
  `mesInicio` int(11) NOT NULL,
  `anoInicio` int(11) NOT NULL,
  `horaInicio` int(11) NOT NULL,
  `minutosInicio` int(11) NOT NULL,
  `diaFim` int(11) NOT NULL,
  `mesFim` int(11) NOT NULL,
  `anoFim` int(11) NOT NULL,
  `horaFim` int(11) NOT NULL,
  `minutosFim` int(11) NOT NULL,
  `tipoMarcacao` int(11) DEFAULT NULL,
  `observacoesMarcacao` text,
  `idClienteCalendario` int(11) NOT NULL,
  `idEvento` int(11) DEFAULT NULL,
  `dataHoraInicio` datetime DEFAULT NULL,
  `dataHoraFim` datetime DEFAULT NULL,
  PRIMARY KEY (`idMarcacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfilComentarios`
--

CREATE TABLE IF NOT EXISTS `perfilComentarios` (
  `idComentario` int(11) NOT NULL AUTO_INCREMENT,
  `idPerfil` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `valido` int(11) NOT NULL DEFAULT '1',
  `idUtilizadorComentou` int(11) NOT NULL DEFAULT '0',
  `dataHoraRegisto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idComentario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfilFeedback`
--

CREATE TABLE IF NOT EXISTS `perfilFeedback` (
  `idFeedback` int(11) NOT NULL AUTO_INCREMENT,
  `idPerfil` int(11) NOT NULL,
  `feedbackDado` float NOT NULL DEFAULT '0',
  `texto` text NOT NULL,
  `idClienteDeuFeedback` int(11) NOT NULL DEFAULT '0',
  `dataHoraRegisto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valido` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idFeedback`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfilGaleria`
--

CREATE TABLE IF NOT EXISTS `perfilGaleria` (
  `idGaleria` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilizador` int(11) DEFAULT NULL,
  `posicaoGaleria` int(11) DEFAULT NULL,
  `urlGaleria` varchar(200) DEFAULT NULL,
  `valido` int(11) DEFAULT '1',
  PRIMARY KEY (`idGaleria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `perfilGaleria`
--

INSERT INTO `perfilGaleria` (`idGaleria`, `idUtilizador`, `urlGaleria`) VALUES
(1, 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/220px-User_icon_2.svg.png'),
(2, 2, 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/220px-User_icon_2.svg.png'),
(3, 3, 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/220px-User_icon_2.svg.png'),
(4, 4, 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/220px-User_icon_2.svg.png'),
(5, 5, 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/220px-User_icon_2.svg.png'),
(6, 6, 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/220px-User_icon_2.svg.png'),
(7, 7, 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/220px-User_icon_2.svg.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfilSeguidores`
--

CREATE TABLE IF NOT EXISTS `perfilSeguidores` (
  `idSeguir` int(11) NOT NULL AUTO_INCREMENT,
  `idPerfilArtista` int(11) NOT NULL,
  `idQuemGostou` int(11) NOT NULL,
  `valido` int(11) NOT NULL,
  `dataHoraRegisto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idSeguir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfilTempoMarcados`
--

CREATE TABLE IF NOT EXISTS `perfilTempoMarcados` (
  `idTempoMarcado` int(11) NOT NULL AUTO_INCREMENT,
  `hora` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `dataCorrespondente` datetime NOT NULL,
  `idCliente` int(11) NOT NULL,
  PRIMARY KEY (`idTempoMarcado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoEspetaculos`
--

CREATE TABLE IF NOT EXISTS `tipoEspetaculos` (
  `idTipoEspetaculo` int(11) NOT NULL AUTO_INCREMENT,
  `descricaoTipoEspetaculo` varchar(200) NOT NULL,
  `estado` int(11) DEFAULT '1',
  PRIMARY KEY (`idTipoEspetaculo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Extraindo dados da tabela `tipoEspetaculos`
--

INSERT INTO `tipoEspetaculos` (`idTipoEspetaculo`, `descricaoTipoEspetaculo`, `estado`) VALUES
(1, 'Acusticas', 1),
(2, 'Africanas', 1),
(3, 'Alternativas', 1),
(4, 'Ambiente', 1),
(5, 'Animação', 1),
(6, 'Anos 50', 1),
(7, 'Anos 60', 1),
(8, 'Anos 70', 1),
(9, 'Anos 80', 1),
(10, 'Anos 90', 1),
(11, 'Baile', 1),
(12, 'Beatbox', 1),
(13, 'Brasileiras', 1),
(14, 'CDs Editados', 1),
(15, 'Celebridades', 1),
(16, 'Celtas', 1),
(17, 'Cordas', 1),
(18, 'Covers', 1),
(19, 'Cubana', 1),
(20, 'Entertainers', 1),
(21, 'Espectaculos', 1),
(22, 'Fado', 1),
(23, 'Fusão', 1),
(24, 'Guitarra', 1),
(25, 'Hip-Hop', 1),
(26, 'Instrumentos a solo', 1),
(27, 'Internacionais', 1),
(28, 'Jazz', 1),
(29, 'Karaoke', 1),
(30, 'Latinas', 1),
(31, 'Ligeira', 1),
(32, 'Metais', 1),
(33, 'Musica Romantica', 1),
(34, 'Novos Talentos', 1),
(35, 'Ópera', 1),
(36, 'Orgão', 1),
(37, 'Percussionistas', 1),
(38, 'Piano', 1),
(39, 'Piano Digital', 1),
(40, 'Portugueses', 1),
(41, 'Portugueses tradicional', 1),
(42, 'Reggae', 1),
(43, 'Rock and Roll', 1),
(44, 'Salsa', 1),
(45, 'Saxofonista', 1),
(46, 'Sopro', 1),
(47, 'Tango', 1),
(48, 'Tributo', 1),
(49, 'Trompetistas', 1),
(50, 'Variadas', 1),
(51, 'Violinistas', 1),
(52, 'Violoncelo', 1),
(53, 'Voz Solistas', 1),
(54, 'World Music', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfilTiposEspetaculos`
--

CREATE TABLE IF NOT EXISTS `perfilTiposEspetaculos` (
  `idTipoEspetaculo` int(11) NOT NULL,
  `idPerfil` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `nrHorasDisponivel` int(11) DEFAULT NULL,
  `precoHora` decimal(12,2) DEFAULT NULL,
  `idConcelho` int(11) DEFAULT NULL,
  `configGeral` varchar(45) DEFAULT NULL,
  `descricaoTrabalhos` text,
  `sobConsulta` int(11) DEFAULT NULL,
  `precoDia` decimal(12,2) DEFAULT NULL,
  `precoDeslocacao` decimal(12,2) DEFAULT NULL,
  `tipoEspetaculoPrincipal` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTipoEspetaculo`,`idPerfil`),
  KEY `fk_users_has_tipoEspetaculos_tipoEspetaculos1_idx` (`idTipoEspetaculo`),
  KEY `fk_users_has_tipoEspetaculos_users1_idx` (`idUser`),
  KEY `idPerfil` (`idPerfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfilTiposEspetaculos`
--

INSERT INTO `perfilTiposEspetaculos` (`idTipoEspetaculo`, `idPerfil`, `idUser`, `nrHorasDisponivel`, `precoHora`, `idConcelho`, `configGeral`, `descricaoTrabalhos`, `sobConsulta`, `precoDia`, `precoDeslocacao`, `tipoEspetaculoPrincipal`) VALUES
(2, 3, 3, 0, '0.00', 0, '0', '', 1, '0.00', '0.00', 1),
(2, 6, 5, 0, '0.00', 0, '0', '', 1, '0.00', '0.00', 0),
(3, 7, 6, 0, '0.00', 0, '0', '', 1, '0.00', '0.00', 0),
(3, 1, 7, 0, '0.00', 0, '0', '', 1, '0.00', '0.00', 0),
(4, 6, 5, 0, '0.00', 0, '0', '', 1, '0.00', '0.00', 0),
(9, 7, 6, 0, '0.00', 0, '0', '', 1, '0.00', '0.00', 0),
(11, 7, 6, 0, '0.00', 0, '0', '', 1, '0.00', '0.00', 0),
(13, 2, 2, 0, '0.00', 0, '0', '', 1, '0.00', '0.00', 1),
(13, 7, 6, 0, '0.00', 0, '0', '', 1, '0.00', '0.00', 0),
(13, 6, 7, 0, '0.00', 0, '0', '', 1, '0.00', '0.00', 0),
(30, 1, 1, 0, '0.00', 0, '0', '', 1, '0.00', '0.00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfilTiposEventos`
--

CREATE TABLE IF NOT EXISTS `perfilTiposEventos` (
  `idTipoEvento` int(11) NOT NULL,
  `idPerfil` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `tipoEventoPrincipal` int(11) NOT NULL DEFAULT '0',
  `valido` int(11) NOT NULL DEFAULT '1',
  `observacoes` text NOT NULL,
  PRIMARY KEY (`idTipoEvento`,`idPerfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfilTiposEventos`
--

INSERT INTO `perfilTiposEventos` (`idTipoEvento`, `idPerfil`, `idUser`, `tipoEventoPrincipal`, `valido`, `observacoes`) VALUES
(1, 5, 4, 0, 1, ''),
(2, 5, 4, 0, 1, ''),
(7, 8, 7, 0, 1, ''),
(10, 7, 6, 0, 1, ''),
(17, 7, 6, 0, 1, ''),
(17, 8, 7, 0, 1, ''),
(18, 7, 6, 0, 1, ''),
(23, 7, 6, 0, 1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfilZonasAtuacao`
--

CREATE TABLE IF NOT EXISTS `perfilZonasAtuacao` (
  `idPerfilZona` int(11) NOT NULL AUTO_INCREMENT,
  `idPerfil` int(11) NOT NULL,
  `idConcelho` int(11) NOT NULL,
  `valido` int(11) NOT NULL DEFAULT '1',
  `dataHoraRegisto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idPerfilZona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoesSeguranca`
--

CREATE TABLE IF NOT EXISTS `questoesSeguranca` (
  `idQuestao` int(11) NOT NULL AUTO_INCREMENT,
  `valor1` int(11) NOT NULL,
  `valor2` int(11) NOT NULL,
  `resultado` int(11) NOT NULL,
  PRIMARY KEY (`idQuestao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `questoesSeguranca`
--

INSERT INTO `questoesSeguranca` (`idQuestao`, `valor1`, `valor2`, `resultado`) VALUES
(1, 10, 2, 12),
(2, 2, 2, 4),
(3, 15, 3, 18),
(4, 1, 3, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoEventos`
--

CREATE TABLE IF NOT EXISTS `tipoEventos` (
  `idTipoEvento` int(11) NOT NULL AUTO_INCREMENT,
  `descricaoTipoEvento` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idTipoEvento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Extraindo dados da tabela `tipoEventos`
--

INSERT INTO `tipoEventos` (`idTipoEvento`, `descricaoTipoEvento`, `estado`) VALUES
(1, 'Aberturas', 1),
(2, 'Animações de Rua', 1),
(3, 'Aniversários Adultos', 1),
(4, 'Aniversarios Infantis', 1),
(5, 'Arraiais', 1),
(6, 'Baptizados', 1),
(7, 'Bares', 1),
(8, 'Bodas de Prata/Ouro', 1),
(9, 'Casamentos', 1),
(10, 'Casinos', 1),
(11, 'Celebrações', 1),
(12, 'Cocktail''s', 1),
(13, 'Concertos', 1),
(14, 'Congressos', 1),
(15, 'Convenções', 1),
(16, 'Cruzeiros', 1),
(17, 'Debutantes', 1),
(18, 'Despedida de Casado/a', 1),
(19, 'Despedida de Solteira', 1),
(20, 'Despedida de Solteiro', 1),
(21, 'Desportivos', 1),
(22, 'Discotecas', 1),
(23, 'Eventos Culturais', 1),
(24, 'Feiras', 1),
(25, 'Festa de Empresa', 1),
(26, 'Festa de Finalista', 1),
(27, 'Festa de Natal', 1),
(28, 'Festas Académicas', 1),
(29, 'Festas Infantis', 1),
(30, 'Festas Motard', 1),
(31, 'Festas Particulares', 1),
(32, 'Festas Populares', 1),
(33, 'Festas Temáticas', 1),
(34, 'Festival', 1),
(35, 'Funerais', 1),
(36, 'Hoteis', 1),
(37, 'Inaugurações', 1),
(38, 'Incentivos', 1),
(39, 'Jantares de Empresas', 1),
(40, 'Jantares de Gala', 1),
(41, 'Jantares Particulares', 1),
(42, 'Lançamentos', 1),
(43, 'Outros', 1),
(44, 'Passagem de Ano', 1),
(45, 'Promoções', 1),
(46, 'Publicidade', 1),
(47, 'Reuniões Anuais', 1),
(48, 'Team Building', 1),
(49, 'Televisão', 1),
(50, 'Outro', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usersSubTipologia`
--

CREATE TABLE IF NOT EXISTS `usersSubTipologia` (
  `idSubTipologia` int(11) NOT NULL AUTO_INCREMENT,
  `descricaoSubTipologia` varchar(100) NOT NULL,
  PRIMARY KEY (`idSubTipologia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usersSubTipologia`
--

INSERT INTO `usersSubTipologia` (`idSubTipologia`, `descricaoSubTipologia`) VALUES
(1, 'Base'),
(2, 'Premium');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usersTipologia`
--

CREATE TABLE IF NOT EXISTS `usersTipologia` (
  `idTipoConta` int(11) NOT NULL AUTO_INCREMENT,
  `descricaoTipoConta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTipoConta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `usersTipologia`
--

INSERT INTO `usersTipologia` (`idTipoConta`, `descricaoTipoConta`) VALUES
(1, 'Artista'),
(2, 'Organizador'),
(3, 'Fã'),
(4, 'Admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `UtilizadoresGostamEvento`
--

CREATE TABLE IF NOT EXISTS `UtilizadoresGostamEvento` (
  `idEvento` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `estado` int(11) DEFAULT '1',
  `dataRegisto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUser`,`idEvento`),
  KEY `fk_UtilizadoresGostamEvento_users1_idx` (`idUser`),
  KEY `fk_UtilizadoresGostamEvento_evento1_idx` (`idEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `UtilizadoresTiposConta`
--

CREATE TABLE IF NOT EXISTS `UtilizadoresTiposConta` (
  `idUser` int(11) NOT NULL,
  `idTipologia` int(11) NOT NULL,
  `idSubTipologia` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idUser`,`idTipologia`),
  KEY `fk_users_has_usersTipologia_usersTipologia1_idx` (`idTipologia`),
  KEY `fk_users_has_usersTipologia_users1_idx` (`idUser`),
  KEY `idSubTipologia` (`idSubTipologia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `UtilizadoresTiposConta`
--

INSERT INTO `UtilizadoresTiposConta` (`idUser`, `idTipologia`, `idSubTipologia`) VALUES
(2, 1, 1),
(4, 2, 1),
(5, 1, 1),
(6, 3, 1),
(7, 3, 1),
(1, 1, 2),
(3, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `UtilizadoresVaoEvento`
--

CREATE TABLE IF NOT EXISTS `UtilizadoresVaoEvento` (
  `idUser` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  `dataRegisto` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `idFuncaoNoEvento` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUser`,`idEvento`),
  KEY `fk_users_has_evento_evento1_idx` (`idEvento`),
  KEY `fk_users_has_evento_users1_idx` (`idUser`),
  KEY `fk_UtilizadoresVaoEvento_estadoUtilizadoresEvento1_idx` (`estado`),
  KEY `fk_UtilizadoresVaoEvento_funcaoEventoUtilizadores1_idx` (`idFuncaoNoEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `anuncios`
--
/*ALTER TABLE `anuncios`
  ADD CONSTRAINT `fk_anuncios_perfil1` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_anuncios_users1` FOREIGN KEY (`idUtilizador`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `concelhos`
--
ALTER TABLE `concelhos`
  ADD CONSTRAINT `fk_concelhos_distritos` FOREIGN KEY (`idDistrito`) REFERENCES `distritos` (`idDistrito`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `distritos`
--
ALTER TABLE `distritos`
  ADD CONSTRAINT `fk_distritos_paises1` FOREIGN KEY (`idPais`) REFERENCES `paises` (`idPais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `fk_emails_pedidosOrcamentos1` FOREIGN KEY (`idPedidoOrcamento`) REFERENCES `pedidosOrcamentos` (`idOrcamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `emaisDocumentos`
--
ALTER TABLE `emaisDocumentos`
  ADD CONSTRAINT `fk_emaislDocumentos_emails1` FOREIGN KEY (`idEmail`) REFERENCES `emails` (`idEmail`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_evento_localEventos1` FOREIGN KEY (`idLocal`) REFERENCES `localEventos` (`idLocal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evento_users1` FOREIGN KEY (`idUtilizador`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `eventoEmpresasQuePatrocinam`
--
ALTER TABLE `eventoEmpresasQuePatrocinam`
  ADD CONSTRAINT `fk_eventoEmpresasQuePatrocinam_empresasPatrocinio1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresasPatrocinio` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_eventoEmpresasQuePatrocinam_evento1` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `EventosTipos`
--
ALTER TABLE `EventosTipos`
  ADD CONSTRAINT `fk_evento_has_tipoEventos_evento1` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evento_has_tipoEventos_tipoEventos1` FOREIGN KEY (`tipoEvento`) REFERENCES `tipoEventos` (`idTipoEvento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `freguesias`
--
ALTER TABLE `freguesias`
  ADD CONSTRAINT `fk_freguesias_concelhos1` FOREIGN KEY (`idConcelho`) REFERENCES `concelhos` (`idConcelho`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `localEventos`
--
ALTER TABLE `localEventos`
  ADD CONSTRAINT `fk_localEventos_freguesias1` FOREIGN KEY (`idFreguesia`) REFERENCES `freguesias` (`idFreguesia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `LocalVisitadosPorUtilizadores`
--
ALTER TABLE `LocalVisitadosPorUtilizadores`
  ADD CONSTRAINT `fk_localEventos_has_users_localEventos1` FOREIGN KEY (`idLocal`) REFERENCES `localEventos` (`idLocal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_localEventos_has_users_users1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedidosOrcamentos`
--
ALTER TABLE `pedidosOrcamentos`
  ADD CONSTRAINT `fk_pedidosOrcamentos_evento1` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidosOrcamentos_users1` FOREIGN KEY (`idArtista`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidosOrcamentos_users2` FOREIGN KEY (`idOrganizador`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `perfilTiposEspetaculos`
--
ALTER TABLE `perfilTiposEspetaculos`
  ADD CONSTRAINT `fk_perfil1` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_tipoEspetaculos_tipoEspetaculos1` FOREIGN KEY (`idTipoEspetaculo`) REFERENCES `tipoEspetaculos` (`idTipoEspetaculo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_tipoEspetaculos_users1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_concelhos1` FOREIGN KEY (`idConcelho`) REFERENCES `concelhos` (`idConcelho`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_usersEstado1` FOREIGN KEY (`estado`) REFERENCES `usersEstado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `UtilizadoresGostamEvento`
--
ALTER TABLE `UtilizadoresGostamEvento`
  ADD CONSTRAINT `fk_UtilizadoresGostamEvento_evento1` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_UtilizadoresGostamEvento_users1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `UtilizadoresTiposConta`
--
ALTER TABLE `UtilizadoresTiposConta`
  ADD CONSTRAINT `fk_users_has_usersTipologia_usersSubTipologia1` FOREIGN KEY (`idSubTipologia`) REFERENCES `usersSubTipologia` (`idSubTipologia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_usersTipologia_users1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_usersTipologia_usersTipologia1` FOREIGN KEY (`idTipologia`) REFERENCES `usersTipologia` (`idTipoConta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `UtilizadoresVaoEvento`
--
ALTER TABLE `UtilizadoresVaoEvento`
  ADD CONSTRAINT `fk_users_has_evento_evento1` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_evento_users1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_UtilizadoresVaoEvento_estadoUtilizadoresEvento1` FOREIGN KEY (`estado`) REFERENCES `estadoUtilizadoresEvento` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_UtilizadoresVaoEvento_funcaoEventoUtilizadores1` FOREIGN KEY (`idFuncaoNoEvento`) REFERENCES `funcaoEventoUtilizadores` (`idFuncao`) ON DELETE NO ACTION ON UPDATE NO ACTION;
*/
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
