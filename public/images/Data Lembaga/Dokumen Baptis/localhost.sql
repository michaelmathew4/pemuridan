-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `elim` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `elim`;

DROP TABLE IF EXISTS `caches`;
CREATE TABLE `caches` (
  `name` varchar(191) NOT NULL,
  `data` mediumtext NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`name`),
  KEY `expires` (`expires`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `caches` (`name`, `data`, `expires`) VALUES
('FileCompiler__0c57fc4199247c6bd48bc0b3d9e0e95f',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/header.php\",\"hash\":\"028b3fc902a8501225ea0771bf6037dd\",\"size\":16044,\"time\":1658108824,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/header.php\",\"hash\":\"028b3fc902a8501225ea0771bf6037dd\",\"size\":16044,\"time\":1658108824}}',	'2010-04-08 03:10:10'),
('FileCompiler__0ceb8ad51fee8ca0d0987cf4ec4a85b6',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/admin-page.php\",\"hash\":\"be197a2c70feabd0b2d6e6717504522e\",\"size\":1078,\"time\":1657075500,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/admin-page.php\",\"hash\":\"370c3017895bcfd1b0648dea0c2b740b\",\"size\":1091,\"time\":1657075500}}',	'2010-04-08 03:10:10'),
('FileCompiler__109659a0e35daedbc2c5f2b140d5326d',	'{\"source\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/templates\\/sidebar.php\",\"hash\":\"2689dc44f878c57bc21f39807418c2fb\",\"size\":3429,\"time\":1666240145,\"ns\":\"\\\\\"},\"target\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/sidebar.php\",\"hash\":\"2689dc44f878c57bc21f39807418c2fb\",\"size\":3429,\"time\":1666240145}}',	'2010-04-08 03:10:10'),
('FileCompiler__11dc58b15fff9e9dc4c2c7d644d85029',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/footer.php\",\"hash\":\"d38a0b3c056d1376e542c65a0d822651\",\"size\":6136,\"time\":1667442752,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/footer.php\",\"hash\":\"d38a0b3c056d1376e542c65a0d822651\",\"size\":6136,\"time\":1667442752}}',	'2010-04-08 03:10:10'),
('FileCompiler__15014c4c15a3fdbd8633fa6d7c75f625',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/berita-dan-acara-children.php\",\"hash\":\"d388781b9bae0da92122e503b394c669\",\"size\":2611,\"time\":1657009207,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/berita-dan-acara-children.php\",\"hash\":\"3d37580f2186e51aebe99ab328d215c7\",\"size\":2963,\"time\":1657009207}}',	'2010-04-08 03:10:10'),
('FileCompiler__15a5e6ab701b48d9ea1b56258c8af291',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/register.php\",\"hash\":\"31699747925473ec934309516c3efb0e\",\"size\":8537,\"time\":1657683803,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/register.php\",\"hash\":\"82e8f51bf23931ceaf79d5c8f87eca55\",\"size\":8550,\"time\":1657683803}}',	'2010-04-08 03:10:10'),
('FileCompiler__24be54ef2888d8b36ec04d8152e5d3fb',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/spesialis.php\",\"hash\":\"5eb4454c9f240f993eedf324408dba88\",\"size\":1947,\"time\":1657003742,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/spesialis.php\",\"hash\":\"9bf1e7270f264598349f4803055435fe\",\"size\":2299,\"time\":1657003742}}',	'2010-04-08 03:10:10'),
('FileCompiler__27d05dfe90db23466c0a11684bc744b2',	'{\"source\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/templates\\/akun.php\",\"hash\":\"e04d254a22573079d0cd7fee6dd5386f\",\"size\":4595,\"time\":1668056041,\"ns\":\"\\\\\"},\"target\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/akun.php\",\"hash\":\"99b2cf26a3b3ced13ea91326587c5cbd\",\"size\":5111,\"time\":1668056041}}',	'2010-04-08 03:10:10'),
('FileCompiler__37710a4ae419ab516d0963b20b1c71af',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/search.php\",\"hash\":\"860eaa9f60ff7fef6076e1823c8adae0\",\"size\":645,\"time\":1657174739,\"ns\":\"ProcessWire\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/search.php\",\"hash\":\"860eaa9f60ff7fef6076e1823c8adae0\",\"size\":645,\"time\":1657174739}}',	'2010-04-08 03:10:10'),
('FileCompiler__3785676ce9dc458fe9e9865161240bb5',	'{\"source\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/templates\\/spesialis.php\",\"hash\":\"5eb4454c9f240f993eedf324408dba88\",\"size\":1947,\"time\":1657003742,\"ns\":\"\\\\\"},\"target\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/spesialis.php\",\"hash\":\"9bf1e7270f264598349f4803055435fe\",\"size\":2299,\"time\":1657003742}}',	'2010-04-08 03:10:10'),
('FileCompiler__3de89d43e872be546bd9a47eab58e52f',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/fasilitas-pelayanan-children.php\",\"hash\":\"dd7eed6a9ffd79a504f9cc05656d110a\",\"size\":2535,\"time\":1657003777,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/fasilitas-pelayanan-children.php\",\"hash\":\"61b112e9d9d92c3cabe231dd374fe87a\",\"size\":2887,\"time\":1657003777}}',	'2010-04-08 03:10:10'),
('FileCompiler__45ed6b5b6aa9cf2e3f9d0df7f81a31ae',	'{\"source\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/templates\\/dokter.php\",\"hash\":\"9dede556959de4a388d16c4dc9a07d8e\",\"size\":27659,\"time\":1668063184,\"ns\":\"\\\\\"},\"target\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/dokter.php\",\"hash\":\"0bc88c74789990638e02a2b230b98ec5\",\"size\":28050,\"time\":1668063184}}',	'2010-04-08 03:10:10'),
('FileCompiler__5056b9064728128691c3897eb3a2f204',	'{\"source\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/templates\\/fasilitas-pelayanan.php\",\"hash\":\"56c9cdb6242eccde189f862cf72231e9\",\"size\":2498,\"time\":1657003773,\"ns\":\"\\\\\"},\"target\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/fasilitas-pelayanan.php\",\"hash\":\"6fb821c7921bdcae4276c216672087d6\",\"size\":2850,\"time\":1657003773}}',	'2010-04-08 03:10:10'),
('FileCompiler__5cb26cf36bc4896aff8307c51d87bcbf',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/logout.php\",\"hash\":\"f6593f59bc474df01fd90f403ef206c3\",\"size\":137,\"time\":1657251813,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/logout.php\",\"hash\":\"f6593f59bc474df01fd90f403ef206c3\",\"size\":137,\"time\":1657251813}}',	'2010-04-08 03:10:10'),
('FileCompiler__600884adb489b01b6b2d81930da07ca8',	'{\"source\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/templates\\/janji-temu.php\",\"hash\":\"63bebf50236b666be72a618bbe4cd921\",\"size\":16156,\"time\":1668050837,\"ns\":\"\\\\\"},\"target\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/janji-temu.php\",\"hash\":\"4abcace255157badcd4b7776050916a0\",\"size\":16672,\"time\":1668050837}}',	'2010-04-08 03:10:10'),
('FileCompiler__6506a09465ceaa4705fb803c6b2899bd',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/selesai-login.php\",\"hash\":\"a5ec5f938622b951b6f47a084d20ebe1\",\"size\":57,\"time\":1657250003,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/selesai-login.php\",\"hash\":\"a5ec5f938622b951b6f47a084d20ebe1\",\"size\":57,\"time\":1657250003}}',	'2010-04-08 03:10:10'),
('FileCompiler__72a6751b44a92a8f17a482c6961dc198',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/keluarga.php\",\"hash\":\"dc85a85fb2475feea60e36b8f244f76e\",\"size\":39153,\"time\":1659415436,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/keluarga.php\",\"hash\":\"da4d8155ea00ddd959b49fe1e26ae838\",\"size\":39708,\"time\":1659415436}}',	'2010-04-08 03:10:10'),
('FileCompiler__734dacfaa65d21b8f564e01ee66b4c3f',	'{\"source\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/templates\\/about.php\",\"hash\":\"cf149de0f7ed463360258604e8892595\",\"size\":792,\"time\":1656052508,\"ns\":\"\\\\\"},\"target\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/about.php\",\"hash\":\"e082597686212345245948acf57ed330\",\"size\":1144,\"time\":1656052508}}',	'2010-04-08 03:10:10'),
('FileCompiler__73779af6952114fe6b05737f4ba83ee0',	'{\"source\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/templates\\/footer.php\",\"hash\":\"d38a0b3c056d1376e542c65a0d822651\",\"size\":6136,\"time\":1667442752,\"ns\":\"\\\\\"},\"target\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/footer.php\",\"hash\":\"d38a0b3c056d1376e542c65a0d822651\",\"size\":6136,\"time\":1667442752}}',	'2010-04-08 03:10:10'),
('FileCompiler__755eae0923de0ab0dba5ecbd14df1bfc',	'{\"source\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/templates\\/home.php\",\"hash\":\"5d274c2f0faca6835906d4210f8d995a\",\"size\":3748,\"time\":1658108888,\"ns\":\"\\\\\"},\"target\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/home.php\",\"hash\":\"0dfb335a58130daced1d5cbab18da69a\",\"size\":4101,\"time\":1658108888}}',	'2010-04-08 03:10:10'),
('FileCompiler__75dd52f1f696c63b722642ae2f7c5479',	'{\"source\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/templates\\/header.php\",\"hash\":\"028b3fc902a8501225ea0771bf6037dd\",\"size\":16044,\"time\":1658108824,\"ns\":\"\\\\\"},\"target\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/header.php\",\"hash\":\"028b3fc902a8501225ea0771bf6037dd\",\"size\":16044,\"time\":1658108824}}',	'2010-04-08 03:10:10'),
('FileCompiler__77ccd72d91c8e207b1fe9a6962799396',	'{\"source\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/templates\\/fasilitas-pelayanan-children.php\",\"hash\":\"dd7eed6a9ffd79a504f9cc05656d110a\",\"size\":2535,\"time\":1657003777,\"ns\":\"\\\\\"},\"target\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/fasilitas-pelayanan-children.php\",\"hash\":\"61b112e9d9d92c3cabe231dd374fe87a\",\"size\":2887,\"time\":1657003777}}',	'2010-04-08 03:10:10'),
('FileCompiler__7962b9b0de47ec6387b74c247912b290',	'{\"source\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/templates\\/admin.php\",\"hash\":\"1e0b59ea7b71052027a7c9dd37c55e85\",\"size\":479,\"time\":1630086528,\"ns\":\"ProcessWire\"},\"target\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/admin.php\",\"hash\":\"1e0b59ea7b71052027a7c9dd37c55e85\",\"size\":479,\"time\":1630086528}}',	'2010-04-08 03:10:10'),
('FileCompiler__7b054a2b32fe5741e07dc33c0ab670f6',	'{\"source\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/templates\\/login.php\",\"hash\":\"c82b1c7669916addd5bac2583887643c\",\"size\":6684,\"time\":1666684870,\"ns\":\"\\\\\"},\"target\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/login.php\",\"hash\":\"c82b1c7669916addd5bac2583887643c\",\"size\":6684,\"time\":1666684870}}',	'2010-04-08 03:10:10'),
('FileCompiler__80931c77fb1e1aba6315bc267ebb1ca7',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/admin.php\",\"hash\":\"1e0b59ea7b71052027a7c9dd37c55e85\",\"size\":479,\"time\":1630086528,\"ns\":\"ProcessWire\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/admin.php\",\"hash\":\"1e0b59ea7b71052027a7c9dd37c55e85\",\"size\":479,\"time\":1630086528}}',	'2010-04-08 03:10:10'),
('FileCompiler__82fda56cc12c189a92d55ad6db412c7e',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/dokter-children.php\",\"hash\":\"cdb5a1944f3e575129c2552406edd822\",\"size\":5150,\"time\":1656298308,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/dokter-children.php\",\"hash\":\"d31ece41a340b4036ba87f3588d66e8b\",\"size\":5502,\"time\":1656298308}}',	'2010-04-08 03:10:10'),
('FileCompiler__86b9e2d4e411d551cb6292196197855c',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/edit-data-account.php\",\"hash\":\"7d1c50d45e5d8b6dcbda13c59553a052\",\"size\":20339,\"time\":1659415452,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/edit-data-account.php\",\"hash\":\"76eefdf9f5936f5bca56ae1fa161fe5d\",\"size\":20868,\"time\":1659415452}}',	'2010-04-08 03:10:10'),
('FileCompiler__8990e699e1b2c79cd61752b5accff660',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/penawaran-khusus-children.php\",\"hash\":\"e86f32f7293ecaaa2d31bd5f3715179b\",\"size\":1756,\"time\":1656058501,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/penawaran-khusus-children.php\",\"hash\":\"142d338d5b3394b04d6e3051b0c14a8d\",\"size\":2108,\"time\":1656058501}}',	'2010-04-08 03:10:10'),
('FileCompiler__8b49afdc7926b3aabc971a49cd012549',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/akun.php\",\"hash\":\"e04d254a22573079d0cd7fee6dd5386f\",\"size\":4595,\"time\":1668056041,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/akun.php\",\"hash\":\"99b2cf26a3b3ced13ea91326587c5cbd\",\"size\":5111,\"time\":1668056041}}',	'2010-04-08 03:10:10'),
('FileCompiler__918dc3c47f85b8050e066910790f22c9',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/janji-temu.php\",\"hash\":\"63bebf50236b666be72a618bbe4cd921\",\"size\":16156,\"time\":1668050837,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/janji-temu.php\",\"hash\":\"4abcace255157badcd4b7776050916a0\",\"size\":16672,\"time\":1668050837}}',	'2010-04-08 03:10:10'),
('FileCompiler__9e41dd34d7aa848759ccec6fe2accd1b',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/home.php\",\"hash\":\"5d274c2f0faca6835906d4210f8d995a\",\"size\":3748,\"time\":1658108888,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/home.php\",\"hash\":\"0dfb335a58130daced1d5cbab18da69a\",\"size\":4101,\"time\":1658108888}}',	'2010-04-08 03:10:10'),
('FileCompiler__a439e6e60b3b72e8329b16ea4de4a849',	'{\"source\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/templates\\/index.php\",\"hash\":\"a47ca9787e30feb4b8c8ccf0d9521d25\",\"size\":13669,\"time\":1658108937,\"ns\":\"\\\\\"},\"target\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/index.php\",\"hash\":\"b783963b8f69c296de00707c6e6dbc30\",\"size\":14021,\"time\":1658108937}}',	'2010-04-08 03:10:10'),
('FileCompiler__b498603bf7cfad1ff588f3153c0509ed',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/dokter.php\",\"hash\":\"557b6f84bea072aad9c509d9fb04ae55\",\"size\":27636,\"time\":1668051092,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/dokter.php\",\"hash\":\"a5882f79fc77c360ec87236864fb1872\",\"size\":28027,\"time\":1668051092}}',	'2010-04-08 03:10:10'),
('FileCompiler__b90dee4f3c00039debbe6686468bdc09',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/sidebar.php\",\"hash\":\"2689dc44f878c57bc21f39807418c2fb\",\"size\":3429,\"time\":1666240145,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/sidebar.php\",\"hash\":\"2689dc44f878c57bc21f39807418c2fb\",\"size\":3429,\"time\":1666240145}}',	'2010-04-08 03:10:10'),
('FileCompiler__b95e1e9906afa4b387aba0650bf2620d',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/about.php\",\"hash\":\"cf149de0f7ed463360258604e8892595\",\"size\":792,\"time\":1656052508,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/about.php\",\"hash\":\"e082597686212345245948acf57ed330\",\"size\":1144,\"time\":1656052508}}',	'2010-04-08 03:10:10'),
('FileCompiler__bdf6911f09025daa6e3c3b13b3b6c39a',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/index.php\",\"hash\":\"a47ca9787e30feb4b8c8ccf0d9521d25\",\"size\":13669,\"time\":1658108937,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/index.php\",\"hash\":\"b783963b8f69c296de00707c6e6dbc30\",\"size\":14021,\"time\":1658108937}}',	'2010-04-08 03:10:10'),
('FileCompiler__c68c0fb8e960cb31ae79767ab3606f24',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/fasilitas-pelayanan.php\",\"hash\":\"56c9cdb6242eccde189f862cf72231e9\",\"size\":2498,\"time\":1657003773,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/fasilitas-pelayanan.php\",\"hash\":\"6fb821c7921bdcae4276c216672087d6\",\"size\":2850,\"time\":1657003773}}',	'2010-04-08 03:10:10'),
('FileCompiler__d9a2f3e408219d49847c01d2641c0455',	'{\"source\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/templates\\/logout.php\",\"hash\":\"f6593f59bc474df01fd90f403ef206c3\",\"size\":137,\"time\":1657251813,\"ns\":\"\\\\\"},\"target\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/logout.php\",\"hash\":\"f6593f59bc474df01fd90f403ef206c3\",\"size\":137,\"time\":1657251813}}',	'2010-04-08 03:10:10'),
('FileCompiler__df9fa3ff08307b407ae3d67d43a53d4d',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/penawaran-khusus.php\",\"hash\":\"a60cbfc65504fbd5385c68566b2fab33\",\"size\":2447,\"time\":1657003803,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/penawaran-khusus.php\",\"hash\":\"6945bcf516e6523532c7de53f84e9850\",\"size\":2799,\"time\":1657003803}}',	'2010-04-08 03:10:10'),
('FileCompiler__e10aa1cee3fa8e72c6ba41aed17d838a',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/basic-page.php\",\"hash\":\"db5828c7dd5a5123c7963c0fb016f7a7\",\"size\":419,\"time\":1630086528,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/basic-page.php\",\"hash\":\"db5828c7dd5a5123c7963c0fb016f7a7\",\"size\":419,\"time\":1630086528}}',	'2010-04-08 03:10:10'),
('FileCompiler__e1d61197e8ac2b0ef862272fbbe9e810',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/berita-dan-acara.php\",\"hash\":\"871b03270632e198b1d515ddd2beedcd\",\"size\":2447,\"time\":1657003811,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/berita-dan-acara.php\",\"hash\":\"4f4150ae1852658de670f5915cd49361\",\"size\":2799,\"time\":1657003811}}',	'2010-04-08 03:10:10'),
('FileCompiler__e73be282d4ceb8a741ea5b648cd21d9d',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/get-family-data.php\",\"hash\":\"cde4c2391eeb7b7fbd236399b6cea227\",\"size\":2558,\"time\":1665980260,\"ns\":\"ProcessWire\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/get-family-data.php\",\"hash\":\"cde4c2391eeb7b7fbd236399b6cea227\",\"size\":2558,\"time\":1665980260}}',	'2010-04-08 03:10:10'),
('FileCompiler__ede42f73aa5ee69a1c7b50e133a4e228',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/branch.php\",\"hash\":\"cf149de0f7ed463360258604e8892595\",\"size\":792,\"time\":1656052508,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/branch.php\",\"hash\":\"e082597686212345245948acf57ed330\",\"size\":1144,\"time\":1656052508}}',	'2010-04-08 03:10:10'),
('FileCompiler__f8c3fb4a0df03e982ad23f8c1328b0a6',	'{\"source\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/templates\\/login.php\",\"hash\":\"c82b1c7669916addd5bac2583887643c\",\"size\":6684,\"time\":1666684870,\"ns\":\"\\\\\"},\"target\":{\"file\":\"D:\\/xampp\\/htdocs\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/login.php\",\"hash\":\"c82b1c7669916addd5bac2583887643c\",\"size\":6684,\"time\":1666684870}}',	'2010-04-08 03:10:10'),
('FileCompiler__fb58b8da5f245aeae8e0f25371843692',	'{\"source\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/templates\\/penawaran-khusus.php\",\"hash\":\"a60cbfc65504fbd5385c68566b2fab33\",\"size\":2447,\"time\":1657003803,\"ns\":\"\\\\\"},\"target\":{\"file\":\"\\/srv\\/users\\/serverpilot\\/apps\\/main-site\\/public\\/elim\\/site\\/assets\\/cache\\/FileCompiler\\/site\\/templates\\/penawaran-khusus.php\",\"hash\":\"6945bcf516e6523532c7de53f84e9850\",\"size\":2799,\"time\":1657003803}}',	'2010-04-08 03:10:10'),
('Modules.info',	'{\"148\":{\"name\":\"AdminThemeDefault\",\"title\":\"Default\",\"version\":14,\"autoload\":\"template=admin\",\"created\":1651027397,\"configurable\":19,\"namespace\":\"ProcessWire\\\\\"},\"160\":{\"name\":\"AdminThemeUikit\",\"title\":\"Uikit\",\"version\":33,\"autoload\":\"template=admin\",\"created\":1651027416,\"configurable\":4,\"namespace\":\"ProcessWire\\\\\"},\"97\":{\"name\":\"FieldtypeCheckbox\",\"title\":\"Checkbox\",\"version\":101,\"singular\":1,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"28\":{\"name\":\"FieldtypeDatetime\",\"title\":\"Datetime\",\"version\":105,\"singular\":true,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\"},\"29\":{\"name\":\"FieldtypeEmail\",\"title\":\"E-Mail\",\"version\":101,\"singular\":true,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\"},\"106\":{\"name\":\"FieldtypeFieldsetClose\",\"title\":\"Fieldset (Close)\",\"version\":100,\"singular\":true,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"105\":{\"name\":\"FieldtypeFieldsetOpen\",\"title\":\"Fieldset (Open)\",\"version\":101,\"singular\":true,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"107\":{\"name\":\"FieldtypeFieldsetTabOpen\",\"title\":\"Fieldset in Tab (Open)\",\"version\":100,\"singular\":1,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"6\":{\"name\":\"FieldtypeFile\",\"title\":\"Files\",\"version\":107,\"singular\":true,\"created\":1651027397,\"configurable\":4,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"89\":{\"name\":\"FieldtypeFloat\",\"title\":\"Float\",\"version\":106,\"singular\":1,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"57\":{\"name\":\"FieldtypeImage\",\"title\":\"Images\",\"version\":102,\"singular\":true,\"created\":1651027397,\"configurable\":4,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"84\":{\"name\":\"FieldtypeInteger\",\"title\":\"Integer\",\"version\":102,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"27\":{\"name\":\"FieldtypeModule\",\"title\":\"Module Reference\",\"version\":101,\"singular\":true,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"4\":{\"name\":\"FieldtypePage\",\"title\":\"Page Reference\",\"version\":106,\"autoload\":true,\"singular\":true,\"created\":1651027397,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"111\":{\"name\":\"FieldtypePageTitle\",\"title\":\"Page Title\",\"version\":100,\"singular\":1,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"133\":{\"name\":\"FieldtypePassword\",\"title\":\"Password\",\"version\":101,\"singular\":true,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"3\":{\"name\":\"FieldtypeText\",\"title\":\"Text\",\"version\":102,\"singular\":1,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"1\":{\"name\":\"FieldtypeTextarea\",\"title\":\"Textarea\",\"version\":107,\"singular\":1,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"135\":{\"name\":\"FieldtypeURL\",\"title\":\"URL\",\"version\":101,\"singular\":1,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"25\":{\"name\":\"InputfieldAsmSelect\",\"title\":\"asmSelect\",\"version\":202,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"131\":{\"name\":\"InputfieldButton\",\"title\":\"Button\",\"version\":100,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"37\":{\"name\":\"InputfieldCheckbox\",\"title\":\"Checkbox\",\"version\":106,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"38\":{\"name\":\"InputfieldCheckboxes\",\"title\":\"Checkboxes\",\"version\":108,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"155\":{\"name\":\"InputfieldCKEditor\",\"title\":\"CKEditor\",\"version\":168,\"installs\":[\"MarkupHTMLPurifier\"],\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\"},\"94\":{\"name\":\"InputfieldDatetime\",\"title\":\"Datetime\",\"version\":107,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"80\":{\"name\":\"InputfieldEmail\",\"title\":\"Email\",\"version\":101,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\"},\"78\":{\"name\":\"InputfieldFieldset\",\"title\":\"Fieldset\",\"version\":101,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"55\":{\"name\":\"InputfieldFile\",\"title\":\"Files\",\"version\":126,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"90\":{\"name\":\"InputfieldFloat\",\"title\":\"Float\",\"version\":104,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"30\":{\"name\":\"InputfieldForm\",\"title\":\"Form\",\"version\":107,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"40\":{\"name\":\"InputfieldHidden\",\"title\":\"Hidden\",\"version\":101,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"162\":{\"name\":\"InputfieldIcon\",\"title\":\"Icon\",\"version\":3,\"created\":1651027424,\"namespace\":\"ProcessWire\\\\\"},\"56\":{\"name\":\"InputfieldImage\",\"title\":\"Images\",\"version\":124,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"85\":{\"name\":\"InputfieldInteger\",\"title\":\"Integer\",\"version\":105,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"79\":{\"name\":\"InputfieldMarkup\",\"title\":\"Markup\",\"version\":102,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"41\":{\"name\":\"InputfieldName\",\"title\":\"Name\",\"version\":100,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"60\":{\"name\":\"InputfieldPage\",\"title\":\"Page\",\"version\":107,\"created\":1651027397,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"15\":{\"name\":\"InputfieldPageListSelect\",\"title\":\"Page List Select\",\"version\":101,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"137\":{\"name\":\"InputfieldPageListSelectMultiple\",\"title\":\"Page List Select Multiple\",\"version\":102,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"86\":{\"name\":\"InputfieldPageName\",\"title\":\"Page Name\",\"version\":106,\"created\":1651027397,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"112\":{\"name\":\"InputfieldPageTitle\",\"title\":\"Page Title\",\"version\":102,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"122\":{\"name\":\"InputfieldPassword\",\"title\":\"Password\",\"version\":102,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"39\":{\"name\":\"InputfieldRadios\",\"title\":\"Radio Buttons\",\"version\":106,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"36\":{\"name\":\"InputfieldSelect\",\"title\":\"Select\",\"version\":102,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"43\":{\"name\":\"InputfieldSelectMultiple\",\"title\":\"Select Multiple\",\"version\":101,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"149\":{\"name\":\"InputfieldSelector\",\"title\":\"Selector\",\"version\":28,\"autoload\":\"template=admin\",\"created\":1651027397,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"addFlag\":32},\"32\":{\"name\":\"InputfieldSubmit\",\"title\":\"Submit\",\"version\":103,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"34\":{\"name\":\"InputfieldText\",\"title\":\"Text\",\"version\":106,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"35\":{\"name\":\"InputfieldTextarea\",\"title\":\"Textarea\",\"version\":103,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"163\":{\"name\":\"InputfieldTextTags\",\"title\":\"Text Tags\",\"version\":5,\"icon\":\"tags\",\"created\":1651031605,\"namespace\":\"ProcessWire\\\\\"},\"167\":{\"name\":\"InputfieldToggle\",\"title\":\"Toggle\",\"version\":1,\"created\":1651034572,\"namespace\":\"ProcessWire\\\\\"},\"108\":{\"name\":\"InputfieldURL\",\"title\":\"URL\",\"version\":102,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\"},\"116\":{\"name\":\"JqueryCore\",\"title\":\"jQuery Core\",\"version\":183,\"singular\":true,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"151\":{\"name\":\"JqueryMagnific\",\"title\":\"jQuery Magnific Popup\",\"version\":1,\"singular\":1,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\"},\"103\":{\"name\":\"JqueryTableSorter\",\"title\":\"jQuery Table Sorter Plugin\",\"version\":221,\"singular\":1,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\"},\"117\":{\"name\":\"JqueryUI\",\"title\":\"jQuery UI\",\"version\":196,\"singular\":true,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"45\":{\"name\":\"JqueryWireTabs\",\"title\":\"jQuery Wire Tabs Plugin\",\"version\":110,\"created\":1651027397,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"175\":{\"name\":\"FieldtypePageTitleLanguage\",\"title\":\"Page Title (Multi-Language)\",\"version\":100,\"requiresVersions\":{\"LanguageSupportFields\":[\">=\",0],\"FieldtypeTextLanguage\":[\">=\",0]},\"singular\":true,\"created\":1656985489,\"namespace\":\"ProcessWire\\\\\"},\"176\":{\"name\":\"FieldtypeTextareaLanguage\",\"title\":\"Textarea (Multi-language)\",\"version\":100,\"requiresVersions\":{\"LanguageSupportFields\":[\">=\",0]},\"singular\":true,\"created\":1656985489,\"namespace\":\"ProcessWire\\\\\"},\"174\":{\"name\":\"FieldtypeTextLanguage\",\"title\":\"Text (Multi-language)\",\"version\":100,\"requiresVersions\":{\"LanguageSupportFields\":[\">=\",0]},\"singular\":true,\"created\":1656985488,\"namespace\":\"ProcessWire\\\\\"},\"170\":{\"name\":\"LanguageSupport\",\"title\":\"Languages Support\",\"version\":103,\"installs\":[\"ProcessLanguage\",\"ProcessLanguageTranslator\"],\"autoload\":true,\"singular\":true,\"created\":1656985470,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"addFlag\":32},\"173\":{\"name\":\"LanguageSupportFields\",\"title\":\"Languages Support - Fields\",\"version\":101,\"requiresVersions\":{\"LanguageSupport\":[\">=\",0]},\"installs\":[\"FieldtypePageTitleLanguage\",\"FieldtypeTextareaLanguage\",\"FieldtypeTextLanguage\"],\"autoload\":true,\"singular\":true,\"created\":1656985487,\"namespace\":\"ProcessWire\\\\\"},\"177\":{\"name\":\"LanguageSupportPageNames\",\"title\":\"Languages Support - Page Names\",\"version\":10,\"requiresVersions\":{\"LanguageSupport\":[\">=\",0],\"LanguageSupportFields\":[\">=\",0]},\"autoload\":true,\"singular\":true,\"created\":1656985491,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\"},\"178\":{\"name\":\"LanguageTabs\",\"title\":\"Languages Support - Tabs\",\"version\":115,\"requiresVersions\":{\"LanguageSupport\":[\">=\",0]},\"autoload\":\"template=admin\",\"singular\":true,\"created\":1656985496,\"configurable\":4,\"namespace\":\"ProcessWire\\\\\"},\"171\":{\"name\":\"ProcessLanguage\",\"title\":\"Languages\",\"version\":103,\"icon\":\"language\",\"requiresVersions\":{\"LanguageSupport\":[\">=\",0]},\"permission\":\"lang-edit\",\"singular\":1,\"created\":1656985470,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"useNavJSON\":true},\"172\":{\"name\":\"ProcessLanguageTranslator\",\"title\":\"Language Translator\",\"version\":101,\"requiresVersions\":{\"LanguageSupport\":[\">=\",0]},\"permission\":\"lang-edit\",\"singular\":1,\"created\":1656985472,\"namespace\":\"ProcessWire\\\\\"},\"67\":{\"name\":\"MarkupAdminDataTable\",\"title\":\"Admin Data Table\",\"version\":107,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"156\":{\"name\":\"MarkupHTMLPurifier\",\"title\":\"HTML Purifier\",\"version\":496,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\"},\"113\":{\"name\":\"MarkupPageArray\",\"title\":\"PageArray Markup\",\"version\":100,\"autoload\":true,\"singular\":true,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\"},\"98\":{\"name\":\"MarkupPagerNav\",\"title\":\"Pager (Pagination) Navigation\",\"version\":105,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\"},\"114\":{\"name\":\"PagePermissions\",\"title\":\"Page Permissions\",\"version\":105,\"autoload\":true,\"singular\":true,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"115\":{\"name\":\"PageRender\",\"title\":\"Page Render\",\"version\":105,\"autoload\":true,\"singular\":true,\"created\":1651027397,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"48\":{\"name\":\"ProcessField\",\"title\":\"Fields\",\"version\":113,\"icon\":\"cube\",\"permission\":\"field-admin\",\"created\":1651027397,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true,\"useNavJSON\":true,\"addFlag\":32},\"87\":{\"name\":\"ProcessHome\",\"title\":\"Admin Home\",\"version\":101,\"permission\":\"page-view\",\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"76\":{\"name\":\"ProcessList\",\"title\":\"List\",\"version\":101,\"permission\":\"page-view\",\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"161\":{\"name\":\"ProcessLogger\",\"title\":\"Logs\",\"version\":2,\"icon\":\"tree\",\"permission\":\"logs-view\",\"singular\":1,\"created\":1651027424,\"namespace\":\"ProcessWire\\\\\",\"useNavJSON\":true},\"10\":{\"name\":\"ProcessLogin\",\"title\":\"Login\",\"version\":108,\"permission\":\"page-view\",\"created\":1651027397,\"configurable\":4,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"50\":{\"name\":\"ProcessModule\",\"title\":\"Modules\",\"version\":119,\"permission\":\"module-admin\",\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true,\"useNavJSON\":true,\"nav\":[{\"url\":\"?site#tab_site_modules\",\"label\":\"Site\",\"icon\":\"plug\",\"navJSON\":\"navJSON\\/?site=1\"},{\"url\":\"?core#tab_core_modules\",\"label\":\"Core\",\"icon\":\"plug\",\"navJSON\":\"navJSON\\/?core=1\"},{\"url\":\"?configurable#tab_configurable_modules\",\"label\":\"Configure\",\"icon\":\"gear\",\"navJSON\":\"navJSON\\/?configurable=1\"},{\"url\":\"?install#tab_install_modules\",\"label\":\"Install\",\"icon\":\"sign-in\",\"navJSON\":\"navJSON\\/?install=1\"},{\"url\":\"?new#tab_new_modules\",\"label\":\"New\",\"icon\":\"plus\"},{\"url\":\"?reset=1\",\"label\":\"Refresh\",\"icon\":\"refresh\"}]},\"17\":{\"name\":\"ProcessPageAdd\",\"title\":\"Page Add\",\"version\":108,\"icon\":\"plus-circle\",\"permission\":\"page-edit\",\"created\":1651027397,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true,\"useNavJSON\":true},\"7\":{\"name\":\"ProcessPageEdit\",\"title\":\"Page Edit\",\"version\":110,\"icon\":\"edit\",\"permission\":\"page-edit\",\"singular\":1,\"created\":1651027397,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true,\"useNavJSON\":true},\"129\":{\"name\":\"ProcessPageEditImageSelect\",\"title\":\"Page Edit Image\",\"version\":120,\"permission\":\"page-edit\",\"singular\":1,\"created\":1651027397,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"121\":{\"name\":\"ProcessPageEditLink\",\"title\":\"Page Edit Link\",\"version\":109,\"icon\":\"link\",\"permission\":\"page-edit\",\"singular\":1,\"created\":1651027397,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"12\":{\"name\":\"ProcessPageList\",\"title\":\"Page List\",\"version\":123,\"icon\":\"sitemap\",\"permission\":\"page-edit\",\"created\":1651027397,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true,\"useNavJSON\":true},\"150\":{\"name\":\"ProcessPageLister\",\"title\":\"Lister\",\"version\":26,\"icon\":\"search\",\"permission\":\"page-lister\",\"created\":1651027397,\"configurable\":true,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true,\"useNavJSON\":true,\"addFlag\":32},\"104\":{\"name\":\"ProcessPageSearch\",\"title\":\"Page Search\",\"version\":106,\"permission\":\"page-edit\",\"singular\":1,\"created\":1651027397,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"14\":{\"name\":\"ProcessPageSort\",\"title\":\"Page Sort and Move\",\"version\":100,\"permission\":\"page-edit\",\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"109\":{\"name\":\"ProcessPageTrash\",\"title\":\"Page Trash\",\"version\":103,\"singular\":1,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"134\":{\"name\":\"ProcessPageType\",\"title\":\"Page Type\",\"version\":101,\"singular\":1,\"created\":1651027397,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true,\"useNavJSON\":true,\"addFlag\":32},\"83\":{\"name\":\"ProcessPageView\",\"title\":\"Page View\",\"version\":104,\"permission\":\"page-view\",\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"136\":{\"name\":\"ProcessPermission\",\"title\":\"Permissions\",\"version\":101,\"icon\":\"gear\",\"permission\":\"permission-admin\",\"singular\":1,\"created\":1651027397,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true,\"useNavJSON\":true},\"138\":{\"name\":\"ProcessProfile\",\"title\":\"User Profile\",\"version\":105,\"permission\":\"profile-edit\",\"singular\":1,\"created\":1651027397,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"159\":{\"name\":\"ProcessRecentPages\",\"title\":\"Recent Pages\",\"version\":2,\"icon\":\"clock-o\",\"permission\":\"page-edit-recent\",\"singular\":1,\"created\":1651027416,\"namespace\":\"ProcessWire\\\\\",\"useNavJSON\":true,\"nav\":[{\"url\":\"?edited=1\",\"label\":\"Edited\",\"icon\":\"users\",\"navJSON\":\"navJSON\\/?edited=1\"},{\"url\":\"?added=1\",\"label\":\"Created\",\"icon\":\"users\",\"navJSON\":\"navJSON\\/?added=1\"},{\"url\":\"?edited=1&me=1\",\"label\":\"Edited by me\",\"icon\":\"user\",\"navJSON\":\"navJSON\\/?edited=1&me=1\"},{\"url\":\"?added=1&me=1\",\"label\":\"Created by me\",\"icon\":\"user\",\"navJSON\":\"navJSON\\/?added=1&me=1\"},{\"url\":\"another\\/\",\"label\":\"Add another\",\"icon\":\"plus-circle\",\"navJSON\":\"anotherNavJSON\\/\"}]},\"68\":{\"name\":\"ProcessRole\",\"title\":\"Roles\",\"version\":104,\"icon\":\"gears\",\"permission\":\"role-admin\",\"created\":1651027397,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true,\"useNavJSON\":true},\"47\":{\"name\":\"ProcessTemplate\",\"title\":\"Templates\",\"version\":114,\"icon\":\"cubes\",\"permission\":\"template-admin\",\"created\":1651027397,\"configurable\":4,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true,\"useNavJSON\":true},\"66\":{\"name\":\"ProcessUser\",\"title\":\"Users\",\"version\":107,\"icon\":\"group\",\"permission\":\"user-admin\",\"created\":1651027397,\"configurable\":\"ProcessUserConfig.php\",\"namespace\":\"ProcessWire\\\\\",\"permanent\":true,\"useNavJSON\":true},\"125\":{\"name\":\"SessionLoginThrottle\",\"title\":\"Session Login Throttle\",\"version\":103,\"autoload\":\"function\",\"singular\":true,\"created\":1651027397,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\"},\"139\":{\"name\":\"SystemUpdater\",\"title\":\"System Updater\",\"version\":19,\"singular\":true,\"created\":1651027397,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"permanent\":true},\"61\":{\"name\":\"TextformatterEntities\",\"title\":\"HTML Entity Encoder (htmlspecialchars)\",\"version\":100,\"created\":1651027397,\"namespace\":\"ProcessWire\\\\\"},\"166\":{\"name\":\"MinimalFieldset\",\"title\":\"Minimal Fieldset\",\"version\":\"0.1.7\",\"icon\":\"square-o\",\"requiresVersions\":{\"ProcessWire\":[\">=\",\"3.0.0\"],\"AdminThemeUikit\":[\">=\",0]},\"autoload\":\"template=admin\",\"created\":1651034202},\"168\":{\"name\":\"Pages2JSON\",\"title\":\"Pages to JSON\",\"version\":5,\"autoload\":true,\"singular\":true,\"created\":1656383350,\"configurable\":true},\"165\":{\"name\":\"ProcessHannaCode\",\"title\":\"Hanna Code\",\"version\":30,\"icon\":\"sun-o\",\"requiresVersions\":{\"TextformatterHannaCode\":[\">=\",0],\"ProcessWire\":[\">=\",\"3.0.133\"]},\"permission\":\"hanna-code\",\"singular\":1,\"created\":1651034179,\"configurable\":3,\"useNavJSON\":true},\"164\":{\"name\":\"TextformatterHannaCode\",\"title\":\"Hanna Code Text Formatter\",\"version\":30,\"icon\":\"sun-o\",\"requiresVersions\":{\"ProcessWire\":[\">=\",\"3.0.133\"]},\"installs\":[\"ProcessHannaCode\"],\"singular\":1,\"created\":1651034179,\"configurable\":3}}',	'2010-04-08 03:10:01'),
('Modules.site/modules/',	'FieldtypeURLLanguage-master/FieldtypeURLLanguage.module\nHelloworld/Helloworld.module\nMinimalFieldset/MinimalFieldset.module\nMyModule/MyModule.module\nPages2JSON/Pages2JSON.module\nTextformatterHannaCode/ProcessHannaCode.module\nTextformatterHannaCode/TextformatterHannaCode.module',	'2010-04-08 03:10:01'),
('Modules.wire/modules/',	'AdminTheme/AdminThemeDefault/AdminThemeDefault.module\nAdminTheme/AdminThemeReno/AdminThemeReno.module\nAdminTheme/AdminThemeUikit/AdminThemeUikit.module\nFieldtype/FieldtypeCache.module\nFieldtype/FieldtypeCheckbox.module\nFieldtype/FieldtypeComments/CommentFilterAkismet.module\nFieldtype/FieldtypeComments/FieldtypeComments.module\nFieldtype/FieldtypeComments/InputfieldCommentsAdmin.module\nFieldtype/FieldtypeDatetime.module\nFieldtype/FieldtypeDecimal.module\nFieldtype/FieldtypeEmail.module\nFieldtype/FieldtypeFieldsetClose.module\nFieldtype/FieldtypeFieldsetOpen.module\nFieldtype/FieldtypeFieldsetTabOpen.module\nFieldtype/FieldtypeFile/FieldtypeFile.module\nFieldtype/FieldtypeFloat.module\nFieldtype/FieldtypeImage/FieldtypeImage.module\nFieldtype/FieldtypeInteger.module\nFieldtype/FieldtypeModule.module\nFieldtype/FieldtypeOptions/FieldtypeOptions.module\nFieldtype/FieldtypePage.module\nFieldtype/FieldtypePageTable.module\nFieldtype/FieldtypePageTitle.module\nFieldtype/FieldtypePassword.module\nFieldtype/FieldtypeRepeater/FieldtypeFieldsetPage.module\nFieldtype/FieldtypeRepeater/FieldtypeRepeater.module\nFieldtype/FieldtypeRepeater/InputfieldRepeater.module\nFieldtype/FieldtypeSelector.module\nFieldtype/FieldtypeText.module\nFieldtype/FieldtypeTextarea.module\nFieldtype/FieldtypeToggle.module\nFieldtype/FieldtypeURL.module\nFileCompilerTags.module\nImage/ImageSizerEngineAnimatedGif/ImageSizerEngineAnimatedGif.module\nImage/ImageSizerEngineIMagick/ImageSizerEngineIMagick.module\nInputfield/InputfieldAsmSelect/InputfieldAsmSelect.module\nInputfield/InputfieldButton.module\nInputfield/InputfieldCheckbox/InputfieldCheckbox.module\nInputfield/InputfieldCheckboxes/InputfieldCheckboxes.module\nInputfield/InputfieldCKEditor/InputfieldCKEditor.module\nInputfield/InputfieldDatetime/InputfieldDatetime.module\nInputfield/InputfieldEmail.module\nInputfield/InputfieldFieldset.module\nInputfield/InputfieldFile/InputfieldFile.module\nInputfield/InputfieldFloat.module\nInputfield/InputfieldForm.module\nInputfield/InputfieldHidden.module\nInputfield/InputfieldIcon/InputfieldIcon.module\nInputfield/InputfieldImage/InputfieldImage.module\nInputfield/InputfieldInteger.module\nInputfield/InputfieldMarkup.module\nInputfield/InputfieldName.module\nInputfield/InputfieldPage/InputfieldPage.module\nInputfield/InputfieldPageAutocomplete/InputfieldPageAutocomplete.module\nInputfield/InputfieldPageListSelect/InputfieldPageListSelect.module\nInputfield/InputfieldPageListSelect/InputfieldPageListSelectMultiple.module\nInputfield/InputfieldPageName/InputfieldPageName.module\nInputfield/InputfieldPageTable/InputfieldPageTable.module\nInputfield/InputfieldPageTitle/InputfieldPageTitle.module\nInputfield/InputfieldPassword/InputfieldPassword.module\nInputfield/InputfieldRadios/InputfieldRadios.module\nInputfield/InputfieldSelect.module\nInputfield/InputfieldSelectMultiple.module\nInputfield/InputfieldSelector/InputfieldSelector.module\nInputfield/InputfieldSubmit/InputfieldSubmit.module\nInputfield/InputfieldText/InputfieldText.module\nInputfield/InputfieldTextarea.module\nInputfield/InputfieldTextTags/InputfieldTextTags.module\nInputfield/InputfieldToggle/InputfieldToggle.module\nInputfield/InputfieldURL.module\nJquery/JqueryCore/JqueryCore.module\nJquery/JqueryMagnific/JqueryMagnific.module\nJquery/JqueryTableSorter/JqueryTableSorter.module\nJquery/JqueryUI/JqueryUI.module\nJquery/JqueryWireTabs/JqueryWireTabs.module\nLanguageSupport/FieldtypePageTitleLanguage.module\nLanguageSupport/FieldtypeTextareaLanguage.module\nLanguageSupport/FieldtypeTextLanguage.module\nLanguageSupport/LanguageSupport.module\nLanguageSupport/LanguageSupportFields.module\nLanguageSupport/LanguageSupportPageNames.module\nLanguageSupport/LanguageTabs.module\nLanguageSupport/ProcessLanguage.module\nLanguageSupport/ProcessLanguageTranslator.module\nLazyCron.module\nMarkup/MarkupAdminDataTable/MarkupAdminDataTable.module\nMarkup/MarkupCache.module\nMarkup/MarkupHTMLPurifier/MarkupHTMLPurifier.module\nMarkup/MarkupPageArray.module\nMarkup/MarkupPageFields.module\nMarkup/MarkupPagerNav/MarkupPagerNav.module\nMarkup/MarkupRSS.module\nPage/PageFrontEdit/PageFrontEdit.module\nPagePathHistory.module\nPagePaths.module\nPagePermissions.module\nPageRender.module\nProcess/ProcessCommentsManager/ProcessCommentsManager.module\nProcess/ProcessField/ProcessField.module\nProcess/ProcessForgotPassword/ProcessForgotPassword.module\nProcess/ProcessHome.module\nProcess/ProcessList.module\nProcess/ProcessLogger/ProcessLogger.module\nProcess/ProcessLogin/ProcessLogin.module\nProcess/ProcessModule/ProcessModule.module\nProcess/ProcessPageAdd/ProcessPageAdd.module\nProcess/ProcessPageClone.module\nProcess/ProcessPageEdit/ProcessPageEdit.module\nProcess/ProcessPageEditImageSelect/ProcessPageEditImageSelect.module\nProcess/ProcessPageEditLink/ProcessPageEditLink.module\nProcess/ProcessPageList/ProcessPageList.module\nProcess/ProcessPageLister/ProcessPageLister.module\nProcess/ProcessPageSearch/ProcessPageSearch.module\nProcess/ProcessPagesExportImport/ProcessPagesExportImport.module\nProcess/ProcessPageSort.module\nProcess/ProcessPageTrash.module\nProcess/ProcessPageType/ProcessPageType.module\nProcess/ProcessPageView.module\nProcess/ProcessPermission/ProcessPermission.module\nProcess/ProcessProfile/ProcessProfile.module\nProcess/ProcessRecentPages/ProcessRecentPages.module\nProcess/ProcessRole/ProcessRole.module\nProcess/ProcessTemplate/ProcessTemplate.module\nProcess/ProcessUser/ProcessUser.module\nSession/SessionHandlerDB/ProcessSessionDB.module\nSession/SessionHandlerDB/SessionHandlerDB.module\nSession/SessionLoginThrottle/SessionLoginThrottle.module\nSystem/SystemNotifications/FieldtypeNotifications.module\nSystem/SystemNotifications/SystemNotifications.module\nSystem/SystemUpdater/SystemUpdater.module\nTextformatter/TextformatterEntities.module\nTextformatter/TextformatterMarkdownExtra/TextformatterMarkdownExtra.module\nTextformatter/TextformatterNewlineBR.module\nTextformatter/TextformatterNewlineUL.module\nTextformatter/TextformatterPstripper.module\nTextformatter/TextformatterSmartypants/TextformatterSmartypants.module\nTextformatter/TextformatterStripTags.module',	'2010-04-08 03:10:01'),
('ModulesUninstalled.info',	'{\"AdminThemeReno\":{\"name\":\"AdminThemeReno\",\"title\":\"Reno\",\"version\":17,\"versionStr\":\"0.1.7\",\"author\":\"Tom Reno (Renobird)\",\"summary\":\"Admin theme for ProcessWire 2.5+ by Tom Reno (Renobird)\",\"requiresVersions\":{\"AdminThemeDefault\":[\">=\",0]},\"autoload\":\"template=admin\",\"created\":1630086528,\"installed\":false,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"FieldtypeCache\":{\"name\":\"FieldtypeCache\",\"title\":\"Cache\",\"version\":102,\"versionStr\":\"1.0.2\",\"summary\":\"Caches the values of other fields for fewer runtime queries. Can also be used to combine multiple text fields and have them all be searchable under the cached field name.\",\"created\":1630086528,\"installed\":false,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"CommentFilterAkismet\":{\"name\":\"CommentFilterAkismet\",\"title\":\"Comment Filter: Akismet\",\"version\":200,\"versionStr\":\"2.0.0\",\"summary\":\"Uses the Akismet service to identify comment spam. Module plugin for the Comments Fieldtype.\",\"requiresVersions\":{\"FieldtypeComments\":[\">=\",0]},\"created\":1630086528,\"installed\":false,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"FieldtypeComments\":{\"name\":\"FieldtypeComments\",\"title\":\"Comments\",\"version\":109,\"versionStr\":\"1.0.9\",\"summary\":\"Field that stores user posted comments for a single Page\",\"installs\":[\"InputfieldCommentsAdmin\"],\"created\":1630086528,\"installed\":false,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"InputfieldCommentsAdmin\":{\"name\":\"InputfieldCommentsAdmin\",\"title\":\"Comments Admin\",\"version\":104,\"versionStr\":\"1.0.4\",\"summary\":\"Provides an administrative interface for working with comments\",\"requiresVersions\":{\"FieldtypeComments\":[\">=\",0]},\"created\":1630086528,\"installed\":false,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"FieldtypeDecimal\":{\"name\":\"FieldtypeDecimal\",\"title\":\"Decimal\",\"version\":1,\"versionStr\":\"0.0.1\",\"summary\":\"Field that stores a decimal number\",\"created\":1630086528,\"installed\":false,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"FieldtypeOptions\":{\"name\":\"FieldtypeOptions\",\"title\":\"Select Options\",\"version\":2,\"versionStr\":\"0.0.2\",\"summary\":\"Field that stores single and multi select options.\",\"created\":1630086528,\"installed\":false,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"FieldtypePageTable\":{\"name\":\"FieldtypePageTable\",\"title\":\"ProFields: Page Table\",\"version\":8,\"versionStr\":\"0.0.8\",\"summary\":\"A fieldtype containing a group of editable pages.\",\"installs\":[\"InputfieldPageTable\"],\"autoload\":true,\"created\":1630086528,\"installed\":false,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"FieldtypeFieldsetPage\":{\"name\":\"FieldtypeFieldsetPage\",\"title\":\"Fieldset (Page)\",\"version\":1,\"versionStr\":\"0.0.1\",\"summary\":\"Fieldset with fields isolated to separate namespace (page), enabling re-use of fields.\",\"requiresVersions\":{\"FieldtypeRepeater\":[\">=\",0]},\"autoload\":true,\"created\":1630086528,\"installed\":false,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"FieldtypeRepeater\":{\"name\":\"FieldtypeRepeater\",\"title\":\"Repeater\",\"version\":107,\"versionStr\":\"1.0.7\",\"summary\":\"Maintains a collection of fields that are repeated for any number of times.\",\"installs\":[\"InputfieldRepeater\"],\"autoload\":true,\"created\":1630086528,\"installed\":false,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"InputfieldRepeater\":{\"name\":\"InputfieldRepeater\",\"title\":\"Repeater\",\"version\":107,\"versionStr\":\"1.0.7\",\"summary\":\"Repeats fields from another template. Provides the input for FieldtypeRepeater.\",\"requiresVersions\":{\"FieldtypeRepeater\":[\">=\",0]},\"created\":1630086528,\"installed\":false,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"FieldtypeSelector\":{\"name\":\"FieldtypeSelector\",\"title\":\"Selector\",\"version\":13,\"versionStr\":\"0.1.3\",\"author\":\"Avoine + ProcessWire\",\"summary\":\"Build a page finding selector visually.\",\"created\":1630086528,\"installed\":false,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"FieldtypeToggle\":{\"name\":\"FieldtypeToggle\",\"title\":\"Toggle (Yes\\/No)\",\"version\":1,\"versionStr\":\"0.0.1\",\"summary\":\"Configurable yes\\/no, on\\/off toggle alternative to a checkbox, plus optional \\u201cother\\u201d option.\",\"requiresVersions\":{\"InputfieldToggle\":[\">=\",0]},\"created\":1630086528,\"installed\":false,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"FileCompilerTags\":{\"name\":\"FileCompilerTags\",\"title\":\"Tags File Compiler\",\"version\":1,\"versionStr\":\"0.0.1\",\"summary\":\"Enables {var} or {var.property} variables in markup sections of a file. Can be used with any API variable.\",\"created\":1630086528,\"installed\":false,\"configurable\":4,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"ImageSizerEngineAnimatedGif\":{\"name\":\"ImageSizerEngineAnimatedGif\",\"title\":\"Animated GIF Image Sizer\",\"version\":1,\"versionStr\":\"0.0.1\",\"author\":\"Horst Nogajski\",\"summary\":\"Upgrades image manipulations for animated GIFs.\",\"created\":1630086528,\"installed\":false,\"configurable\":4,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"ImageSizerEngineIMagick\":{\"name\":\"ImageSizerEngineIMagick\",\"title\":\"IMagick Image Sizer\",\"version\":3,\"versionStr\":\"0.0.3\",\"author\":\"Horst Nogajski\",\"summary\":\"Upgrades image manipulations to use PHP\'s ImageMagick library when possible.\",\"created\":1630086528,\"installed\":false,\"configurable\":4,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"InputfieldPageAutocomplete\":{\"name\":\"InputfieldPageAutocomplete\",\"title\":\"Page Auto Complete\",\"version\":112,\"versionStr\":\"1.1.2\",\"summary\":\"Multiple Page selection using auto completion and sorting capability. Intended for use as an input field for Page reference fields.\",\"created\":1630086528,\"installed\":false,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"InputfieldPageTable\":{\"name\":\"InputfieldPageTable\",\"title\":\"ProFields: Page Table\",\"version\":14,\"versionStr\":\"0.1.4\",\"summary\":\"Inputfield to accompany FieldtypePageTable\",\"requiresVersions\":{\"FieldtypePageTable\":[\">=\",0]},\"created\":1630086528,\"installed\":false,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"LazyCron\":{\"name\":\"LazyCron\",\"title\":\"Lazy Cron\",\"version\":103,\"versionStr\":\"1.0.3\",\"summary\":\"Provides hooks that are automatically executed at various intervals. It is called \'lazy\' because it\'s triggered by a pageview, so the interval is guaranteed to be at least the time requested, rather than exactly the time requested. This is fine for most cases, but you can make it not lazy by connecting this to a real CRON job. See the module file for details. \",\"href\":\"https:\\/\\/processwire.com\\/api\\/modules\\/lazy-cron\\/\",\"autoload\":true,\"singular\":true,\"created\":1630086528,\"installed\":false,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"MarkupCache\":{\"name\":\"MarkupCache\",\"title\":\"Markup Cache\",\"version\":101,\"versionStr\":\"1.0.1\",\"summary\":\"A simple way to cache segments of markup in your templates. \",\"href\":\"https:\\/\\/processwire.com\\/api\\/modules\\/markupcache\\/\",\"autoload\":true,\"singular\":true,\"created\":1630086528,\"installed\":false,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"MarkupPageFields\":{\"name\":\"MarkupPageFields\",\"title\":\"Markup Page Fields\",\"version\":100,\"versionStr\":\"1.0.0\",\"summary\":\"Adds $page->renderFields() and $page->images->render() methods that return basic markup for output during development and debugging.\",\"autoload\":true,\"singular\":true,\"created\":1630086528,\"installed\":false,\"namespace\":\"ProcessWire\\\\\",\"core\":true,\"permanent\":true},\"MarkupRSS\":{\"name\":\"MarkupRSS\",\"title\":\"Markup RSS Feed\",\"version\":104,\"versionStr\":\"1.0.4\",\"summary\":\"Renders an RSS feed. Given a PageArray, renders an RSS feed of them.\",\"icon\":\"rss-square\",\"created\":1630086528,\"installed\":false,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"PageFrontEdit\":{\"name\":\"PageFrontEdit\",\"title\":\"Front-End Page Editor\",\"version\":3,\"versionStr\":\"0.0.3\",\"author\":\"Ryan Cramer\",\"summary\":\"Enables front-end editing of page fields.\",\"icon\":\"cube\",\"permissions\":{\"page-edit-front\":\"Use the front-end page editor\"},\"autoload\":true,\"created\":1630086528,\"installed\":false,\"configurable\":\"PageFrontEditConfig.php\",\"namespace\":\"ProcessWire\\\\\",\"core\":true,\"license\":\"MPL 2.0\"},\"PagePathHistory\":{\"name\":\"PagePathHistory\",\"title\":\"Page Path History\",\"version\":6,\"versionStr\":\"0.0.6\",\"summary\":\"Keeps track of past URLs where pages have lived and automatically redirects (301 permament) to the new location whenever the past URL is accessed.\",\"autoload\":true,\"singular\":true,\"created\":1630086528,\"installed\":false,\"configurable\":4,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"PagePaths\":{\"name\":\"PagePaths\",\"title\":\"Page Paths\",\"version\":1,\"versionStr\":\"0.0.1\",\"summary\":\"Enables page paths\\/urls to be queryable by selectors. Also offers potential for improved load performance. Builds an index at install (may take time on a large site). Currently supports only single languages sites.\",\"autoload\":true,\"singular\":true,\"created\":1630086528,\"installed\":false,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"ProcessCommentsManager\":{\"name\":\"ProcessCommentsManager\",\"title\":\"Comments\",\"version\":10,\"versionStr\":\"0.1.0\",\"author\":\"Ryan Cramer\",\"summary\":\"Manage comments in your site outside of the page editor.\",\"icon\":\"comments\",\"requiresVersions\":{\"FieldtypeComments\":[\">=\",0]},\"permission\":\"comments-manager\",\"permissions\":{\"comments-manager\":\"Use the comments manager\"},\"created\":1630086528,\"installed\":false,\"searchable\":\"comments\",\"namespace\":\"ProcessWire\\\\\",\"core\":true,\"page\":{\"name\":\"comments\",\"parent\":\"setup\",\"title\":\"Comments\"},\"nav\":[{\"url\":\"?go=approved\",\"label\":\"Approved\"},{\"url\":\"?go=pending\",\"label\":\"Pending\"},{\"url\":\"?go=spam\",\"label\":\"Spam\"},{\"url\":\"?go=all\",\"label\":\"All\"}]},\"ProcessForgotPassword\":{\"name\":\"ProcessForgotPassword\",\"title\":\"Forgot Password\",\"version\":104,\"versionStr\":\"1.0.4\",\"summary\":\"Provides password reset\\/email capability for the Login process.\",\"permission\":\"page-view\",\"created\":1630086528,\"installed\":false,\"configurable\":4,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"ProcessPageClone\":{\"name\":\"ProcessPageClone\",\"title\":\"Page Clone\",\"version\":104,\"versionStr\":\"1.0.4\",\"summary\":\"Provides ability to clone\\/copy\\/duplicate pages in the admin. Adds a &quot;copy&quot; option to all applicable pages in the PageList.\",\"permission\":\"page-clone\",\"permissions\":{\"page-clone\":\"Clone a page\",\"page-clone-tree\":\"Clone a tree of pages\"},\"autoload\":\"template=admin\",\"created\":1630086528,\"installed\":false,\"namespace\":\"ProcessWire\\\\\",\"core\":true,\"page\":{\"name\":\"clone\",\"title\":\"Clone\",\"parent\":\"page\",\"status\":1024}},\"ProcessPagesExportImport\":{\"name\":\"ProcessPagesExportImport\",\"title\":\"Pages Export\\/Import\",\"version\":1,\"versionStr\":\"0.0.1\",\"author\":\"Ryan Cramer\",\"summary\":\"Enables exporting and importing of pages. Development version, not yet recommended for production use.\",\"icon\":\"paper-plane-o\",\"permission\":\"page-edit-export\",\"created\":1630086528,\"installed\":false,\"namespace\":\"ProcessWire\\\\\",\"core\":true,\"page\":{\"name\":\"export-import\",\"parent\":\"page\",\"title\":\"Export\\/Import\"}},\"ProcessSessionDB\":{\"name\":\"ProcessSessionDB\",\"title\":\"Sessions\",\"version\":5,\"versionStr\":\"0.0.5\",\"summary\":\"Enables you to browse active database sessions.\",\"icon\":\"dashboard\",\"requiresVersions\":{\"SessionHandlerDB\":[\">=\",0]},\"created\":1630086528,\"installed\":false,\"namespace\":\"ProcessWire\\\\\",\"core\":true,\"page\":{\"name\":\"sessions-db\",\"parent\":\"access\",\"title\":\"Sessions\"}},\"SessionHandlerDB\":{\"name\":\"SessionHandlerDB\",\"title\":\"Session Handler Database\",\"version\":6,\"versionStr\":\"0.0.6\",\"summary\":\"Installing this module makes ProcessWire store sessions in the database rather than the file system. Note that this module will log you out after install or uninstall.\",\"installs\":[\"ProcessSessionDB\"],\"created\":1630086528,\"installed\":false,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"FieldtypeNotifications\":{\"name\":\"FieldtypeNotifications\",\"title\":\"Notifications\",\"version\":4,\"versionStr\":\"0.0.4\",\"summary\":\"Field that stores user notifications.\",\"requiresVersions\":{\"SystemNotifications\":[\">=\",0]},\"created\":1630086528,\"installed\":false,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"SystemNotifications\":{\"name\":\"SystemNotifications\",\"title\":\"System Notifications\",\"version\":12,\"versionStr\":\"0.1.2\",\"summary\":\"Adds support for notifications in ProcessWire (currently in development)\",\"icon\":\"bell\",\"installs\":[\"FieldtypeNotifications\"],\"autoload\":true,\"created\":1630086528,\"installed\":false,\"configurable\":\"SystemNotificationsConfig.php\",\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"TextformatterMarkdownExtra\":{\"name\":\"TextformatterMarkdownExtra\",\"title\":\"Markdown\\/Parsedown Extra\",\"version\":180,\"versionStr\":\"1.8.0\",\"summary\":\"Markdown\\/Parsedown extra lightweight markup language by Emanuil Rusev. Based on Markdown by John Gruber.\",\"created\":1630086528,\"installed\":false,\"configurable\":4,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"TextformatterNewlineBR\":{\"name\":\"TextformatterNewlineBR\",\"title\":\"Newlines to XHTML Line Breaks\",\"version\":100,\"versionStr\":\"1.0.0\",\"summary\":\"Converts newlines to XHTML line break <br \\/> tags. \",\"created\":1630086528,\"installed\":false,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"TextformatterNewlineUL\":{\"name\":\"TextformatterNewlineUL\",\"title\":\"Newlines to Unordered List\",\"version\":100,\"versionStr\":\"1.0.0\",\"summary\":\"Converts newlines to <li> list items and surrounds in an <ul> unordered list. \",\"created\":1630086528,\"installed\":false,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"TextformatterPstripper\":{\"name\":\"TextformatterPstripper\",\"title\":\"Paragraph Stripper\",\"version\":100,\"versionStr\":\"1.0.0\",\"summary\":\"Strips paragraph <p> tags that may have been applied by other text formatters before it. \",\"created\":1630086528,\"installed\":false,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"TextformatterSmartypants\":{\"name\":\"TextformatterSmartypants\",\"title\":\"SmartyPants Typographer\",\"version\":171,\"versionStr\":\"1.7.1\",\"summary\":\"Smart typography for web sites, by Michel Fortin based on SmartyPants by John Gruber. If combined with Markdown, it should be applied AFTER Markdown.\",\"created\":1630086528,\"installed\":false,\"configurable\":4,\"namespace\":\"ProcessWire\\\\\",\"core\":true,\"url\":\"https:\\/\\/github.com\\/michelf\\/php-smartypants\"},\"TextformatterStripTags\":{\"name\":\"TextformatterStripTags\",\"title\":\"Strip Markup Tags\",\"version\":100,\"versionStr\":\"1.0.0\",\"summary\":\"Strips HTML\\/XHTML Markup Tags\",\"created\":1630086528,\"installed\":false,\"configurable\":3,\"namespace\":\"ProcessWire\\\\\",\"core\":true},\"FieldtypeURLLanguage\":{\"name\":\"FieldtypeURLLanguage\",\"title\":\"URL (Multi-language)\",\"version\":2,\"versionStr\":\"0.0.2\",\"summary\":\"Field that stores a URL in multiple languages\",\"requiresVersions\":{\"LanguageSupportFields\":[\">=\",0]},\"created\":1656475437,\"installed\":false},\"Helloworld\":{\"name\":\"Helloworld\",\"title\":\"Hello World\",\"version\":3,\"versionStr\":\"0.0.3\",\"summary\":\"An example module used for demonstration purposes.\",\"href\":\"https:\\/\\/processwire.com\",\"icon\":\"smile-o\",\"autoload\":true,\"singular\":true,\"created\":1651027397,\"installed\":false},\"MyModule\":{\"name\":\"MyModule\",\"title\":\"My Module\",\"version\":1,\"versionStr\":\"0.0.1\",\"autoload\":true,\"created\":1658723277,\"installed\":false}}',	'2010-04-08 03:10:01'),
('ModulesVerbose.info',	'{\"148\":{\"summary\":\"Minimal admin theme that supports all ProcessWire features.\",\"core\":true,\"versionStr\":\"0.1.4\"},\"160\":{\"summary\":\"Uikit v3 admin theme\",\"core\":true,\"versionStr\":\"0.3.3\"},\"97\":{\"summary\":\"This Fieldtype stores an ON\\/OFF toggle via a single checkbox. The ON value is 1 and OFF value is 0.\",\"core\":true,\"versionStr\":\"1.0.1\"},\"28\":{\"summary\":\"Field that stores a date and optionally time\",\"core\":true,\"versionStr\":\"1.0.5\"},\"29\":{\"summary\":\"Field that stores an e-mail address\",\"core\":true,\"versionStr\":\"1.0.1\"},\"106\":{\"summary\":\"Close a fieldset opened by FieldsetOpen. \",\"core\":true,\"versionStr\":\"1.0.0\"},\"105\":{\"summary\":\"Open a fieldset to group fields. Should be followed by a Fieldset (Close) after one or more fields.\",\"core\":true,\"versionStr\":\"1.0.1\"},\"107\":{\"summary\":\"Open a fieldset to group fields. Same as Fieldset (Open) except that it displays in a tab instead.\",\"core\":true,\"versionStr\":\"1.0.0\"},\"6\":{\"summary\":\"Field that stores one or more files\",\"core\":true,\"versionStr\":\"1.0.7\"},\"89\":{\"summary\":\"Field that stores a floating point number\",\"core\":true,\"versionStr\":\"1.0.6\"},\"57\":{\"summary\":\"Field that stores one or more GIF, JPG, or PNG images\",\"core\":true,\"versionStr\":\"1.0.2\"},\"84\":{\"summary\":\"Field that stores an integer\",\"core\":true,\"versionStr\":\"1.0.2\"},\"27\":{\"summary\":\"Field that stores a reference to another module\",\"core\":true,\"versionStr\":\"1.0.1\"},\"4\":{\"summary\":\"Field that stores one or more references to ProcessWire pages\",\"core\":true,\"versionStr\":\"1.0.6\"},\"111\":{\"summary\":\"Field that stores a page title\",\"core\":true,\"versionStr\":\"1.0.0\"},\"133\":{\"summary\":\"Field that stores a hashed and salted password\",\"core\":true,\"versionStr\":\"1.0.1\"},\"3\":{\"summary\":\"Field that stores a single line of text\",\"core\":true,\"versionStr\":\"1.0.2\"},\"1\":{\"summary\":\"Field that stores multiple lines of text\",\"core\":true,\"versionStr\":\"1.0.7\"},\"135\":{\"summary\":\"Field that stores a URL\",\"core\":true,\"versionStr\":\"1.0.1\"},\"25\":{\"summary\":\"Multiple selection, progressive enhancement to select multiple\",\"core\":true,\"versionStr\":\"2.0.2\"},\"131\":{\"summary\":\"Form button element that you can optionally pass an href attribute to.\",\"core\":true,\"versionStr\":\"1.0.0\"},\"37\":{\"summary\":\"Single checkbox toggle\",\"core\":true,\"versionStr\":\"1.0.6\"},\"38\":{\"summary\":\"Multiple checkbox toggles\",\"core\":true,\"versionStr\":\"1.0.8\"},\"155\":{\"summary\":\"CKEditor textarea rich text editor.\",\"core\":true,\"versionStr\":\"1.6.8\"},\"94\":{\"summary\":\"Inputfield that accepts date and optionally time\",\"core\":true,\"versionStr\":\"1.0.7\"},\"80\":{\"summary\":\"E-Mail address in valid format\",\"core\":true,\"versionStr\":\"1.0.1\"},\"78\":{\"summary\":\"Groups one or more fields together in a container\",\"core\":true,\"versionStr\":\"1.0.1\"},\"55\":{\"summary\":\"One or more file uploads (sortable)\",\"core\":true,\"versionStr\":\"1.2.6\"},\"90\":{\"summary\":\"Floating point number with precision\",\"core\":true,\"versionStr\":\"1.0.4\"},\"30\":{\"summary\":\"Contains one or more fields in a form\",\"core\":true,\"versionStr\":\"1.0.7\"},\"40\":{\"summary\":\"Hidden value in a form\",\"core\":true,\"versionStr\":\"1.0.1\"},\"162\":{\"summary\":\"Select an icon\",\"core\":true,\"versionStr\":\"0.0.3\"},\"56\":{\"summary\":\"One or more image uploads (sortable)\",\"core\":true,\"versionStr\":\"1.2.4\"},\"85\":{\"summary\":\"Integer (positive or negative)\",\"core\":true,\"versionStr\":\"1.0.5\"},\"79\":{\"summary\":\"Contains any other markup and optionally child Inputfields\",\"core\":true,\"versionStr\":\"1.0.2\"},\"41\":{\"summary\":\"Text input validated as a ProcessWire name field\",\"core\":true,\"versionStr\":\"1.0.0\"},\"60\":{\"summary\":\"Select one or more pages\",\"core\":true,\"versionStr\":\"1.0.7\"},\"15\":{\"summary\":\"Selection of a single page from a ProcessWire page tree list\",\"core\":true,\"versionStr\":\"1.0.1\"},\"137\":{\"summary\":\"Selection of multiple pages from a ProcessWire page tree list\",\"core\":true,\"versionStr\":\"1.0.2\"},\"86\":{\"summary\":\"Text input validated as a ProcessWire Page name field\",\"core\":true,\"versionStr\":\"1.0.6\"},\"112\":{\"summary\":\"Handles input of Page Title and auto-generation of Page Name (when name is blank)\",\"core\":true,\"versionStr\":\"1.0.2\"},\"122\":{\"summary\":\"Password input with confirmation field that doesn&#039;t ever echo the input back.\",\"core\":true,\"versionStr\":\"1.0.2\"},\"39\":{\"summary\":\"Radio buttons for selection of a single item\",\"core\":true,\"versionStr\":\"1.0.6\"},\"36\":{\"summary\":\"Selection of a single value from a select pulldown\",\"core\":true,\"versionStr\":\"1.0.2\"},\"43\":{\"summary\":\"Select multiple items from a list\",\"core\":true,\"versionStr\":\"1.0.1\"},\"149\":{\"summary\":\"Build a page finding selector visually.\",\"author\":\"Avoine + ProcessWire\",\"core\":true,\"versionStr\":\"0.2.8\"},\"32\":{\"summary\":\"Form submit button\",\"core\":true,\"versionStr\":\"1.0.3\"},\"34\":{\"summary\":\"Single line of text\",\"core\":true,\"versionStr\":\"1.0.6\"},\"35\":{\"summary\":\"Multiple lines of text\",\"core\":true,\"versionStr\":\"1.0.3\"},\"163\":{\"summary\":\"Enables input of user entered tags or selection of predefined tags.\",\"core\":true,\"versionStr\":\"0.0.5\"},\"167\":{\"summary\":\"A toggle providing similar input capability to a checkbox but much more configurable.\",\"core\":true,\"versionStr\":\"0.0.1\"},\"108\":{\"summary\":\"URL in valid format\",\"core\":true,\"versionStr\":\"1.0.2\"},\"116\":{\"summary\":\"jQuery Core as required by ProcessWire Admin and plugins\",\"href\":\"http:\\/\\/jquery.com\",\"core\":true,\"versionStr\":\"1.8.3\"},\"151\":{\"summary\":\"Provides lightbox capability for image galleries. Replacement for FancyBox. Uses Magnific Popup by @dimsemenov.\",\"href\":\"http:\\/\\/dimsemenov.com\\/plugins\\/magnific-popup\\/\",\"core\":true,\"versionStr\":\"0.0.1\"},\"103\":{\"summary\":\"Provides a jQuery plugin for sorting tables.\",\"href\":\"http:\\/\\/mottie.github.io\\/tablesorter\\/\",\"core\":true,\"versionStr\":\"2.2.1\"},\"117\":{\"summary\":\"jQuery UI as required by ProcessWire and plugins\",\"href\":\"http:\\/\\/ui.jquery.com\",\"core\":true,\"versionStr\":\"1.9.6\"},\"45\":{\"summary\":\"Provides a jQuery plugin for generating tabs in ProcessWire.\",\"core\":true,\"versionStr\":\"1.1.0\"},\"175\":{\"summary\":\"Field that stores a page title in multiple languages. Use this only if you want title inputs created for ALL languages on ALL pages. Otherwise create separate languaged-named title fields, i.e. title_fr, title_es, title_fi, etc. \",\"author\":\"Ryan Cramer\",\"core\":true,\"versionStr\":\"1.0.0\"},\"176\":{\"summary\":\"Field that stores a multiple lines of text in multiple languages\",\"core\":true,\"versionStr\":\"1.0.0\"},\"174\":{\"summary\":\"Field that stores a single line of text in multiple languages\",\"core\":true,\"versionStr\":\"1.0.0\"},\"170\":{\"summary\":\"ProcessWire multi-language support.\",\"author\":\"Ryan Cramer\",\"core\":true,\"versionStr\":\"1.0.3\"},\"173\":{\"summary\":\"Required to use multi-language fields.\",\"author\":\"Ryan Cramer\",\"core\":true,\"versionStr\":\"1.0.1\"},\"177\":{\"summary\":\"Required to use multi-language page names.\",\"author\":\"Ryan Cramer\",\"core\":true,\"versionStr\":\"0.1.0\"},\"178\":{\"summary\":\"Organizes multi-language fields into tabs for a cleaner easier to use interface.\",\"author\":\"adamspruijt, ryan\",\"core\":true,\"versionStr\":\"1.1.5\"},\"171\":{\"summary\":\"Manage system languages\",\"author\":\"Ryan Cramer\",\"core\":true,\"versionStr\":\"1.0.3\",\"permissions\":{\"lang-edit\":\"Administer languages and static translation files\"}},\"172\":{\"summary\":\"Provides language translation capabilities for ProcessWire core and modules.\",\"author\":\"Ryan Cramer\",\"core\":true,\"versionStr\":\"1.0.1\"},\"67\":{\"summary\":\"Generates markup for data tables used by ProcessWire admin\",\"core\":true,\"versionStr\":\"1.0.7\"},\"156\":{\"summary\":\"Front-end to the HTML Purifier library.\",\"core\":true,\"versionStr\":\"4.9.6\"},\"113\":{\"summary\":\"Adds renderPager() method to all PaginatedArray types, for easy pagination output. Plus a render() method to PageArray instances.\",\"core\":true,\"versionStr\":\"1.0.0\"},\"98\":{\"summary\":\"Generates markup for pagination navigation\",\"core\":true,\"versionStr\":\"1.0.5\"},\"114\":{\"summary\":\"Adds various permission methods to Page objects that are used by Process modules.\",\"core\":true,\"versionStr\":\"1.0.5\"},\"115\":{\"summary\":\"Adds a render method to Page and caches page output.\",\"core\":true,\"versionStr\":\"1.0.5\"},\"48\":{\"summary\":\"Edit individual fields that hold page data\",\"core\":true,\"versionStr\":\"1.1.3\",\"searchable\":\"fields\"},\"87\":{\"summary\":\"Acts as a placeholder Process for the admin root. Ensures proper flow control after login.\",\"core\":true,\"versionStr\":\"1.0.1\"},\"76\":{\"summary\":\"Lists the Process assigned to each child page of the current\",\"core\":true,\"versionStr\":\"1.0.1\"},\"161\":{\"summary\":\"View and manage system logs.\",\"author\":\"Ryan Cramer\",\"core\":true,\"versionStr\":\"0.0.2\",\"permissions\":{\"logs-view\":\"Can view system logs\",\"logs-edit\":\"Can manage system logs\"},\"page\":{\"name\":\"logs\",\"parent\":\"setup\",\"title\":\"Logs\"}},\"10\":{\"summary\":\"Login to ProcessWire\",\"core\":true,\"versionStr\":\"1.0.8\"},\"50\":{\"summary\":\"List, edit or install\\/uninstall modules\",\"core\":true,\"versionStr\":\"1.1.9\"},\"17\":{\"summary\":\"Add a new page\",\"core\":true,\"versionStr\":\"1.0.8\"},\"7\":{\"summary\":\"Edit a Page\",\"core\":true,\"versionStr\":\"1.1.0\"},\"129\":{\"summary\":\"Provides image manipulation functions for image fields and rich text editors.\",\"core\":true,\"versionStr\":\"1.2.0\"},\"121\":{\"summary\":\"Provides a link capability as used by some Fieldtype modules (like rich text editors).\",\"core\":true,\"versionStr\":\"1.0.9\"},\"12\":{\"summary\":\"List pages in a hierarchical tree structure\",\"core\":true,\"versionStr\":\"1.2.3\"},\"150\":{\"summary\":\"Admin tool for finding and listing pages by any property.\",\"author\":\"Ryan Cramer\",\"core\":true,\"versionStr\":\"0.2.6\",\"permissions\":{\"page-lister\":\"Use Page Lister\"}},\"104\":{\"summary\":\"Provides a page search engine for admin use.\",\"core\":true,\"versionStr\":\"1.0.6\"},\"14\":{\"summary\":\"Handles page sorting and moving for PageList\",\"core\":true,\"versionStr\":\"1.0.0\"},\"109\":{\"summary\":\"Handles emptying of Page trash\",\"core\":true,\"versionStr\":\"1.0.3\"},\"134\":{\"summary\":\"List, Edit and Add pages of a specific type\",\"core\":true,\"versionStr\":\"1.0.1\"},\"83\":{\"summary\":\"All page views are routed through this Process\",\"core\":true,\"versionStr\":\"1.0.4\"},\"136\":{\"summary\":\"Manage system permissions\",\"core\":true,\"versionStr\":\"1.0.1\"},\"138\":{\"summary\":\"Enables user to change their password, email address and other settings that you define.\",\"core\":true,\"versionStr\":\"1.0.5\"},\"159\":{\"summary\":\"Shows a list of recently edited pages in your admin.\",\"author\":\"Ryan Cramer\",\"href\":\"http:\\/\\/modules.processwire.com\\/\",\"core\":true,\"versionStr\":\"0.0.2\",\"permissions\":{\"page-edit-recent\":\"Can see recently edited pages\"},\"page\":{\"name\":\"recent-pages\",\"parent\":\"page\",\"title\":\"Recent\"}},\"68\":{\"summary\":\"Manage user roles and what permissions are attached\",\"core\":true,\"versionStr\":\"1.0.4\"},\"47\":{\"summary\":\"List and edit the templates that control page output\",\"core\":true,\"versionStr\":\"1.1.4\",\"searchable\":\"templates\"},\"66\":{\"summary\":\"Manage system users\",\"core\":true,\"versionStr\":\"1.0.7\",\"searchable\":\"users\"},\"125\":{\"summary\":\"Throttles login attempts to help prevent dictionary attacks.\",\"core\":true,\"versionStr\":\"1.0.3\"},\"139\":{\"summary\":\"Manages system versions and upgrades.\",\"core\":true,\"versionStr\":\"0.1.9\"},\"61\":{\"summary\":\"Entity encode ampersands, quotes (single and double) and greater-than\\/less-than signs using htmlspecialchars(str, ENT_QUOTES). It is recommended that you use this on all text\\/textarea fields except those using a rich text editor or a markup language like Markdown.\",\"core\":true,\"versionStr\":\"1.0.0\"},\"166\":{\"summary\":\"Adds a config option to fieldsets to render them without label or padding in Page Edit. Requires AdminThemeUikit.\",\"author\":\"Robin Sallis\",\"href\":\"https:\\/\\/github.com\\/Toutouwai\\/MinimalFieldset\",\"versionStr\":\"0.1.7\"},\"168\":{\"summary\":\"Adds method to several wire classes to output as JSON\",\"author\":\"IDT Media\",\"versionStr\":\"0.0.5\"},\"165\":{\"summary\":\"Easily insert any complex HTML, Javascript or PHP output in your ProcessWire content by creating your own Hanna code tags.\",\"versionStr\":\"0.3.0\",\"permissions\":{\"hanna-code\":\"List and view Hanna Codes\",\"hanna-code-edit\":\"Add\\/edit\\/delete Hanna Codes (text\\/html, javascript only)\",\"hanna-code-php\":\"Add\\/edit\\/delete Hanna Codes (text\\/html, javascript and PHP)\"}},\"164\":{\"summary\":\"Easily insert any complex HTML, Javascript or PHP output in your ProcessWire content by creating your own Hanna code tags.\",\"versionStr\":\"0.3.0\"}}',	'2010-04-08 03:10:01'),
('Permissions.names',	'{\"fluency-translate\":1060,\"hanna-code\":1019,\"hanna-code-edit\":1020,\"hanna-code-php\":1021,\"lang-edit\":1061,\"logs-edit\":1014,\"logs-view\":1013,\"page-delete\":34,\"page-edit\":32,\"page-edit-recent\":1011,\"page-lister\":1006,\"page-lock\":54,\"page-move\":35,\"page-sort\":50,\"page-template\":51,\"page-view\":36,\"profile-edit\":53,\"user-admin\":52}',	'2010-04-08 03:10:10');

DROP TABLE IF EXISTS `fieldgroups`;
CREATE TABLE `fieldgroups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET ascii NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `fieldgroups` (`id`, `name`) VALUES
(108,	'about'),
(2,	'admin'),
(124,	'admin-page'),
(128,	'akun'),
(105,	'banner'),
(102,	'banner-parent'),
(83,	'basic-page'),
(115,	'berita-dan-acara'),
(116,	'berita-dan-acara-children'),
(137,	'buat-janji'),
(120,	'dokter'),
(121,	'dokter-children'),
(133,	'edit-data-account'),
(111,	'fasilitas-pelayanan'),
(113,	'fasilitas-pelayanan-children'),
(136,	'get-family-data'),
(1,	'home'),
(97,	'index'),
(138,	'janji'),
(127,	'janji-temu'),
(134,	'keluarga'),
(126,	'language'),
(129,	'login'),
(132,	'logout'),
(135,	'my-template'),
(122,	'penawaran-khusus'),
(123,	'penawaran-khusus-children'),
(5,	'permission'),
(130,	'register'),
(4,	'role'),
(125,	'search'),
(117,	'spesialis'),
(118,	'spesialis-children'),
(3,	'user');

DROP TABLE IF EXISTS `fieldgroups_fields`;
CREATE TABLE `fieldgroups_fields` (
  `fieldgroups_id` int(10) unsigned NOT NULL DEFAULT '0',
  `fields_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sort` int(11) unsigned NOT NULL DEFAULT '0',
  `data` text,
  PRIMARY KEY (`fieldgroups_id`,`fields_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `fieldgroups_fields` (`fieldgroups_id`, `fields_id`, `sort`, `data`) VALUES
(1,	1,	0,	NULL),
(2,	1,	0,	NULL),
(2,	2,	1,	NULL),
(3,	3,	0,	NULL),
(3,	4,	2,	NULL),
(3,	92,	1,	NULL),
(3,	97,	3,	NULL),
(3,	116,	4,	NULL),
(4,	5,	0,	NULL),
(5,	1,	0,	NULL),
(83,	1,	0,	NULL),
(97,	1,	0,	NULL),
(102,	1,	0,	NULL),
(105,	1,	1,	'{\"label\":\"Judul\"}'),
(105,	98,	6,	'{\"label\":\"URL\"}'),
(105,	99,	2,	'{\"label\":\"Deskripsi\",\"rows\":9}'),
(105,	101,	5,	'{\"label\":\"Tanggal Dibuat\"}'),
(105,	103,	0,	'{\"columnWidth\":70}'),
(105,	104,	3,	'{\"columnWidth\":70}'),
(105,	105,	4,	'{\"columnWidth\":30}'),
(105,	106,	8,	'{\"columnWidth\":30}'),
(105,	107,	7,	'{\"label\":\"Gambar\",\"minHeight\":624,\"minWidth\":1640}'),
(108,	1,	1,	'{\"label\":\"Judul\"}'),
(108,	98,	6,	'{\"label\":\"Google Maps\"}'),
(108,	99,	2,	'{\"label\":\"Deskripsi\"}'),
(108,	101,	5,	'{\"label\":\"Tanggal Dibuat\"}'),
(108,	103,	0,	'{\"columnWidth\":70}'),
(108,	104,	3,	'{\"columnWidth\":70}'),
(108,	105,	4,	'{\"columnWidth\":30}'),
(108,	106,	8,	'{\"columnWidth\":30}'),
(108,	107,	7,	NULL),
(111,	1,	1,	'{\"label\":\"Judul\"}'),
(111,	99,	2,	'{\"label\":\"Deskripsi\"}'),
(111,	101,	5,	'{\"label\":\"Tanggal Dibuat\"}'),
(111,	103,	0,	'{\"columnWidth\":70}'),
(111,	104,	3,	'{\"columnWidth\":70}'),
(111,	105,	4,	'{\"columnWidth\":30}'),
(111,	106,	7,	'{\"columnWidth\":30}'),
(111,	108,	6,	NULL),
(113,	1,	1,	NULL),
(113,	99,	2,	'{\"rows\":9}'),
(113,	101,	5,	NULL),
(113,	103,	0,	'{\"columnWidth\":70}'),
(113,	104,	3,	'{\"columnWidth\":70}'),
(113,	105,	4,	'{\"columnWidth\":30}'),
(113,	106,	8,	'{\"columnWidth\":30}'),
(113,	107,	7,	'{\"label\":\"Gambar\"}'),
(113,	108,	6,	NULL),
(115,	1,	1,	'{\"label\":\"Judul\"}'),
(115,	99,	2,	'{\"label\":\"Deskripsi\"}'),
(115,	101,	5,	'{\"label\":\"Tanggal Dibuat\"}'),
(115,	103,	0,	'{\"columnWidth\":70}'),
(115,	104,	3,	'{\"columnWidth\":70}'),
(115,	105,	4,	'{\"columnWidth\":30}'),
(115,	106,	7,	'{\"columnWidth\":30}'),
(115,	107,	6,	'{\"label\":\"Gambar\"}'),
(116,	1,	1,	NULL),
(116,	99,	2,	NULL),
(116,	101,	5,	NULL),
(116,	103,	0,	'{\"columnWidth\":70}'),
(116,	104,	3,	'{\"columnWidth\":70}'),
(116,	105,	4,	'{\"columnWidth\":30}'),
(116,	106,	7,	'{\"columnWidth\":30}'),
(116,	107,	6,	NULL),
(117,	1,	1,	'{\"label\":\"Judul\"}'),
(117,	99,	2,	'{\"label\":\"Deskripsi\"}'),
(117,	101,	5,	'{\"label\":\"Tanggal Dibuat\"}'),
(117,	103,	0,	'{\"columnWidth\":70}'),
(117,	104,	3,	'{\"columnWidth\":70}'),
(117,	105,	4,	'{\"columnWidth\":30}'),
(117,	106,	7,	'{\"columnWidth\":30}'),
(117,	107,	6,	'{\"label\":\"Gambar\"}'),
(118,	1,	1,	NULL),
(118,	99,	2,	NULL),
(118,	101,	5,	NULL),
(118,	103,	0,	'{\"columnWidth\":70}'),
(118,	104,	3,	'{\"columnWidth\":70}'),
(118,	105,	4,	'{\"columnWidth\":30}'),
(118,	106,	7,	'{\"columnWidth\":30}'),
(118,	107,	6,	NULL),
(120,	1,	0,	NULL),
(121,	1,	1,	'{\"label\":\"Nama\"}'),
(121,	98,	2,	'{\"columnWidth\":50,\"label\":\"Spesialis\"}'),
(121,	99,	4,	'{\"label\":\"Jadwal\"}'),
(121,	100,	5,	'{\"label\":\"Profil Dokter\"}'),
(121,	101,	9,	'{\"label\":\"Tanggal Dibuat\"}'),
(121,	103,	0,	'{\"columnWidth\":70}'),
(121,	104,	7,	'{\"columnWidth\":70}'),
(121,	105,	8,	'{\"columnWidth\":30}'),
(121,	106,	11,	'{\"columnWidth\":30}'),
(121,	107,	10,	'{\"label\":\"Gambar\"}'),
(121,	109,	3,	'{\"columnWidth\":50,\"label\":\"Terima Janji\"}'),
(121,	113,	6,	'{\"label\":\"Artikel\"}'),
(122,	1,	1,	NULL),
(122,	99,	2,	NULL),
(122,	101,	5,	NULL),
(122,	103,	0,	'{\"columnWidth\":70}'),
(122,	104,	3,	'{\"columnWidth\":70}'),
(122,	105,	4,	'{\"columnWidth\":30}'),
(122,	106,	7,	'{\"columnWidth\":30}'),
(122,	107,	6,	NULL),
(123,	1,	1,	'{\"label\":\"Judul\"}'),
(123,	99,	2,	'{\"label\":\"Deskripsi\"}'),
(123,	101,	5,	'{\"label\":\"Tanggal Pembuatan\"}'),
(123,	103,	0,	'{\"columnWidth\":70}'),
(123,	104,	3,	'{\"columnWidth\":70}'),
(123,	105,	4,	'{\"columnWidth\":30}'),
(123,	106,	7,	'{\"columnWidth\":30}'),
(123,	107,	6,	'{\"label\":\"Gambar\"}'),
(124,	1,	0,	NULL),
(125,	1,	0,	NULL),
(126,	1,	0,	NULL),
(126,	114,	1,	NULL),
(126,	115,	2,	NULL),
(127,	1,	0,	NULL),
(128,	1,	1,	'{\"label\":\"Nama\",\"label1065\":\"Name\"}'),
(128,	92,	15,	'{\"columnWidth\":50}'),
(128,	98,	2,	'{\"columnWidth\":50,\"label\":\"Kota\",\"label1065\":\"City\"}'),
(128,	99,	4,	'{\"label\":\"Alamat\",\"label1065\":\"Address\"}'),
(128,	101,	8,	'{\"columnWidth\":50,\"label\":\"Tanggal Lahir\",\"label1065\":\"Birth Day\"}'),
(128,	103,	0,	'{\"columnWidth\":50}'),
(128,	104,	6,	'{\"columnWidth\":50}'),
(128,	105,	7,	'{\"columnWidth\":50}'),
(128,	106,	17,	'{\"columnWidth\":50}'),
(128,	107,	5,	'{\"label\":\"Gambar\"}'),
(128,	109,	3,	'{\"columnWidth\":50,\"label\":\"Golongan Darah\",\"label1065\":\"Blood Type\"}'),
(128,	110,	9,	'{\"columnWidth\":50,\"label\":\"NIK\",\"label1065\":\"NIK\"}'),
(128,	111,	10,	'{\"columnWidth\":50,\"label\":\"No Telepon\",\"label1065\":\"Phone Number\"}'),
(128,	112,	11,	'{\"columnWidth\":50,\"label\":\"No BPJS\",\"label1065\":\"BPJS Number\"}'),
(128,	117,	16,	'{\"columnWidth\":50}'),
(128,	118,	12,	'{\"columnWidth\":50,\"label\":\"Nama Ayah\",\"label1065\":\"Father\'s Name\"}'),
(128,	119,	13,	'{\"columnWidth\":50,\"label\":\"Nama Ibu\",\"label1065\":\"Mother\'s Name\"}'),
(128,	120,	14,	'{\"label\":\"Jenis Kelamin\",\"label1065\":\"Gender\"}'),
(129,	1,	0,	NULL),
(130,	1,	0,	NULL),
(132,	1,	0,	NULL),
(133,	1,	0,	NULL),
(134,	1,	1,	'{\"label\":\"Nama\"}'),
(134,	98,	2,	'{\"columnWidth\":50,\"label\":\"Kota\"}'),
(134,	99,	4,	'{\"label\":\"Alamat\"}'),
(134,	101,	8,	'{\"columnWidth\":50,\"label\":\"Tanggal Lahir\"}'),
(134,	103,	0,	'{\"columnWidth\":50}'),
(134,	104,	6,	'{\"columnWidth\":50}'),
(134,	105,	7,	'{\"columnWidth\":50}'),
(134,	106,	17,	'{\"columnWidth\":50}'),
(134,	107,	5,	NULL),
(134,	109,	3,	'{\"columnWidth\":50,\"label\":\"Golongan Darah\"}'),
(134,	110,	9,	'{\"columnWidth\":50,\"label\":\"NIK\"}'),
(134,	111,	10,	'{\"columnWidth\":50,\"label\":\"No Telepon\"}'),
(134,	112,	11,	'{\"columnWidth\":50,\"label\":\"No BPJS\"}'),
(134,	118,	12,	'{\"columnWidth\":50,\"label\":\"Nama Ayah\"}'),
(134,	119,	13,	'{\"columnWidth\":50,\"label\":\"Nama Ibu\"}'),
(134,	120,	14,	'{\"columnWidth\":50,\"label\":\"Jenis Kelamin\"}'),
(134,	121,	15,	'{\"columnWidth\":50,\"label\":\"ID Pemilik Akun\"}'),
(134,	122,	16,	'{\"label\":\"Sebagai\"}'),
(135,	1,	0,	NULL),
(136,	1,	0,	NULL),
(137,	1,	0,	'{\"label\":\"ID Appointment\"}'),
(137,	98,	1,	'{\"label\":\"ID Dokter\"}'),
(137,	109,	2,	'{\"label\":\"ID Pasien\"}'),
(137,	110,	3,	'{\"label\":\"Keluhan\"}'),
(137,	111,	4,	'{\"label\":\"Status\"}'),
(138,	1,	0,	NULL);

DROP TABLE IF EXISTS `fields`;
CREATE TABLE `fields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(128) CHARACTER SET ascii NOT NULL,
  `name` varchar(191) CHARACTER SET ascii NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `label` varchar(191) NOT NULL DEFAULT '',
  `data` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `fields` (`id`, `type`, `name`, `flags`, `label`, `data`) VALUES
(1,	'FieldtypePageTitleLanguage',	'title',	13,	'Judul',	'{\"required\":1,\"textformatters\":[\"TextformatterEntities\"],\"size\":0,\"maxlength\":255,\"label1065\":\"Title\",\"minlength\":0,\"showCount\":0}'),
(2,	'FieldtypeModule',	'process',	25,	'Process',	'{\"description\":\"The process that is executed on this page. Since this is mostly used by ProcessWire internally, it is recommended that you don\'t change the value of this unless adding your own pages in the admin.\",\"collapsed\":1,\"required\":1,\"moduleTypes\":[\"Process\"],\"permanent\":1}'),
(3,	'FieldtypePassword',	'pass',	24,	'Set Password',	'{\"collapsed\":1,\"size\":50,\"maxlength\":128}'),
(4,	'FieldtypePage',	'roles',	24,	'Roles',	'{\"derefAsPage\":0,\"parent_id\":30,\"labelFieldName\":\"name\",\"inputfield\":\"InputfieldCheckboxes\",\"description\":\"User will inherit the permissions assigned to each role. You may assign multiple roles to a user. When accessing a page, the user will only inherit permissions from the roles that are also assigned to the page\'s template.\"}'),
(5,	'FieldtypePage',	'permissions',	24,	'Permissions',	'{\"derefAsPage\":0,\"parent_id\":31,\"labelFieldName\":\"title\",\"inputfield\":\"InputfieldCheckboxes\"}'),
(92,	'FieldtypeEmail',	'email',	9,	'E-Mail Address',	'{\"size\":70,\"maxlength\":255}'),
(97,	'FieldtypeModule',	'admin_theme',	8,	'Admin Theme',	'{\"moduleTypes\":[\"AdminTheme\"],\"labelField\":\"title\",\"inputfieldClass\":\"InputfieldRadios\"}'),
(98,	'FieldtypeTextLanguage',	'text_1',	0,	'Teks 1',	'{\"textformatters\":[\"TextformatterEntities\"],\"minlength\":0,\"maxlength\":2048,\"showCount\":0,\"size\":0,\"label1065\":\"Text 1\"}'),
(99,	'FieldtypeTextareaLanguage',	'content_1',	0,	'Konten 1',	'{\"textformatters\":[\"TextformatterHannaCode\"],\"inputfieldClass\":\"InputfieldCKEditor\",\"contentType\":1,\"minlength\":0,\"maxlength\":0,\"showCount\":0,\"rows\":5,\"toolbar\":\"Format, Styles, -, Bold, Italic, -, RemoveFormat\\nNumberedList, BulletedList, -, Blockquote\\nPWLink, Unlink, Anchor\\nPWImage, Table, HorizontalRule, SpecialChar\\nPasteText, PasteFromWord\\nScayt, -, Sourcedialog\",\"inlineMode\":0,\"useACF\":1,\"usePurifier\":1,\"formatTags\":\"p;h1;h2;h3;h4;h5;h6;pre;address\",\"extraPlugins\":[\"pwimage\",\"pwlink\",\"sourcedialog\"],\"removePlugins\":\"image,magicline\",\"label1065\":\"Content 1\",\"langBlankInherit\":0,\"collapsed\":0,\"allowContexts\":[\"langBlankInherit\"]}'),
(100,	'FieldtypeTextareaLanguage',	'content_2',	0,	'Konten 2',	'{\"textformatters\":[\"TextformatterHannaCode\"],\"inputfieldClass\":\"InputfieldCKEditor\",\"contentType\":1,\"minlength\":0,\"maxlength\":0,\"showCount\":0,\"rows\":5,\"label1065\":\"Content 2\",\"toolbar\":\"Format, Styles, -, Bold, Italic, -, RemoveFormat\\nNumberedList, BulletedList, -, Blockquote\\nPWLink, Unlink, Anchor\\nPWImage, Table, HorizontalRule, SpecialChar\\nPasteText, PasteFromWord\\nScayt, -, Sourcedialog\",\"inlineMode\":0,\"useACF\":1,\"usePurifier\":1,\"formatTags\":\"p;h1;h2;h3;h4;h5;h6;pre;address\",\"extraPlugins\":[\"pwimage\",\"pwlink\",\"sourcedialog\"],\"removePlugins\":\"image,magicline\"}'),
(101,	'FieldtypeDatetime',	'date_1',	0,	'Date 1',	'{\"dateOutputFormat\":\"Y-m-d\",\"collapsed\":0,\"inputType\":\"text\",\"htmlType\":\"date\",\"dateSelectFormat\":\"yMd\",\"yearFrom\":1922,\"yearTo\":2042,\"yearLock\":0,\"datepicker\":3,\"timeInputSelect\":0,\"dateInputFormat\":\"Y-m-d\",\"size\":25,\"timeInputFormat\":\"H:i:s\"}'),
(102,	'FieldtypeDatetime',	'date_2',	0,	'Date 2',	'{\"dateOutputFormat\":\"Y-m-d\",\"collapsed\":0,\"inputType\":\"text\",\"htmlType\":\"date\",\"dateSelectFormat\":\"yMd\",\"yearFrom\":1922,\"yearTo\":2042,\"yearLock\":0,\"datepicker\":3,\"timeInputSelect\":0,\"dateInputFormat\":\"Y-m-d\",\"size\":25,\"timeInputFormat\":\"H:i:s\"}'),
(103,	'FieldtypeFieldsetOpen',	'fieldset_1',	0,	'',	'{\"closeFieldID\":104}'),
(104,	'FieldtypeFieldsetClose',	'fieldset_1_END',	0,	'Close an open fieldset',	'{\"description\":\"This field was added automatically to accompany fieldset \'fieldset_1\'.  It should be placed in your template\\/fieldgroup wherever you want the fieldset to end.\",\"openFieldID\":103}'),
(105,	'FieldtypeFieldsetOpen',	'fieldset_2',	0,	'',	'{\"closeFieldID\":106}'),
(106,	'FieldtypeFieldsetClose',	'fieldset_2_END',	0,	'Close an open fieldset',	'{\"description\":\"This field was added automatically to accompany fieldset \'fieldset_2\'.  It should be placed in your template\\/fieldgroup wherever you want the fieldset to end.\",\"openFieldID\":105}'),
(107,	'FieldtypeImage',	'images',	0,	'Images',	'{\"fileSchema\":270,\"extensions\":\"gif jpg jpeg png\",\"maxFiles\":0,\"outputFormat\":0,\"descriptionRows\":1,\"useTags\":0,\"gridMode\":\"grid\",\"focusMode\":\"on\",\"resizeServer\":0,\"clientQuality\":90,\"maxReject\":0,\"dimensionsByAspectRatio\":0,\"defaultValuePage\":0,\"inputfieldClass\":\"InputfieldImage\",\"collapsed\":0,\"allowContexts\":[\"maxWidth\",\"maxHeight\",\"minWidth\",\"minHeight\"]}'),
(108,	'FieldtypeImage',	'icon',	0,	'Icon',	'{\"fileSchema\":270,\"extensions\":\"gif jpg jpeg png\",\"maxFiles\":0,\"outputFormat\":0,\"descriptionRows\":1,\"useTags\":0,\"gridMode\":\"grid\",\"focusMode\":\"on\",\"resizeServer\":0,\"clientQuality\":90,\"defaultValuePage\":0,\"inputfieldClass\":\"InputfieldImage\",\"collapsed\":0,\"maxWidth\":200,\"maxHeight\":200}'),
(109,	'FieldtypeTextLanguage',	'text_2',	0,	'Teks 2',	'{\"textformatters\":[\"TextformatterEntities\"],\"minlength\":0,\"maxlength\":2048,\"showCount\":0,\"size\":0,\"label1065\":\"Text 2\"}'),
(110,	'FieldtypeTextLanguage',	'text_3',	0,	'Teks 3',	'{\"textformatters\":[\"TextformatterEntities\"],\"minlength\":0,\"maxlength\":2048,\"showCount\":0,\"size\":0,\"label1065\":\"Text 3\"}'),
(111,	'FieldtypeTextLanguage',	'text_4',	0,	'Teks 4',	'{\"textformatters\":[\"TextformatterEntities\"],\"minlength\":0,\"maxlength\":2048,\"showCount\":0,\"size\":0,\"label1065\":\"Text 4\"}'),
(112,	'FieldtypeTextLanguage',	'text_5',	0,	'Teks 5',	'{\"textformatters\":[\"TextformatterEntities\"],\"minlength\":0,\"maxlength\":2048,\"showCount\":0,\"size\":0,\"label1065\":\"Text 5\"}'),
(113,	'FieldtypeTextareaLanguage',	'content_3',	0,	'Konten 3',	'{\"textformatters\":[\"TextformatterHannaCode\"],\"inputfieldClass\":\"InputfieldCKEditor\",\"contentType\":1,\"minlength\":0,\"maxlength\":0,\"showCount\":0,\"rows\":5,\"toolbar\":\"Format, Styles, -, Bold, Italic, -, RemoveFormat\\nNumberedList, BulletedList, -, Blockquote\\nPWLink, Unlink, Anchor\\nPWImage, Table, HorizontalRule, SpecialChar\\nPasteText, PasteFromWord\\nScayt, -, Sourcedialog\",\"inlineMode\":0,\"useACF\":1,\"usePurifier\":1,\"formatTags\":\"p;h1;h2;h3;h4;h5;h6;pre;address\",\"extraPlugins\":[\"pwimage\",\"pwlink\",\"sourcedialog\"],\"removePlugins\":\"image,magicline\",\"label1065\":\"Content 3\"}'),
(114,	'FieldtypeFile',	'language_files_site',	24,	'Site Translation Files',	'{\"extensions\":\"json csv\",\"maxFiles\":0,\"inputfieldClass\":\"InputfieldFile\",\"unzip\":1,\"description\":\"Use this field for translations specific to your site (like files in \\/site\\/templates\\/ for example).\",\"descriptionRows\":0,\"fileSchema\":14}'),
(115,	'FieldtypeFile',	'language_files',	24,	'Core Translation Files',	'{\"extensions\":\"json csv\",\"maxFiles\":0,\"inputfieldClass\":\"InputfieldFile\",\"unzip\":1,\"description\":\"Use this field for [language packs](http:\\/\\/modules.processwire.com\\/categories\\/language-pack\\/). To delete all files, double-click the trash can for any file, then save.\",\"descriptionRows\":0,\"fileSchema\":14}'),
(116,	'FieldtypePage',	'language',	24,	'Language',	'{\"derefAsPage\":1,\"parent_id\":1062,\"labelFieldName\":\"title\",\"inputfield\":\"InputfieldRadios\",\"required\":1}'),
(117,	'FieldtypePassword',	'password',	0,	'Password',	'{\"requirements\":[\"letter\",\"digit\"],\"complexifyBanMode\":\"loose\",\"complexifyFactor\":0.7,\"minlength\":6,\"requireOld\":\"-1\",\"unmask\":0}'),
(118,	'FieldtypeTextLanguage',	'text_6',	0,	'Teks 6',	'{\"langBlankInherit\":0,\"collapsed\":0,\"minlength\":0,\"maxlength\":2048,\"showCount\":0,\"size\":0,\"textformatters\":[\"TextformatterEntities\"]}'),
(119,	'FieldtypeTextLanguage',	'text_7',	0,	'',	'{\"textformatters\":[\"TextformatterEntities\"],\"langBlankInherit\":0,\"collapsed\":0,\"minlength\":0,\"maxlength\":2048,\"showCount\":0,\"size\":0}'),
(120,	'FieldtypeTextLanguage',	'text_8',	0,	'',	'{\"textformatters\":[\"TextformatterEntities\"],\"langBlankInherit\":0,\"collapsed\":0,\"minlength\":0,\"maxlength\":2048,\"showCount\":0,\"size\":0}'),
(121,	'FieldtypeTextLanguage',	'text_9',	0,	'',	'{\"textformatters\":[\"TextformatterEntities\"],\"langBlankInherit\":0,\"collapsed\":0,\"minlength\":0,\"maxlength\":2048,\"showCount\":0,\"size\":0}'),
(122,	'FieldtypeTextLanguage',	'text_10',	0,	'',	'{\"textformatters\":[\"TextformatterEntities\"],\"langBlankInherit\":0,\"collapsed\":0,\"minlength\":0,\"maxlength\":2048,\"showCount\":0,\"size\":0}');

DROP TABLE IF EXISTS `field_admin_theme`;
CREATE TABLE `field_admin_theme` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` int(11) NOT NULL,
  PRIMARY KEY (`pages_id`),
  KEY `data` (`data`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `field_content_1`;
CREATE TABLE `field_content_1` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` mediumtext NOT NULL,
  `data1065` mediumtext,
  PRIMARY KEY (`pages_id`),
  KEY `data_exact` (`data`(191)),
  FULLTEXT KEY `data` (`data`),
  FULLTEXT KEY `data1065` (`data1065`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_content_1` (`pages_id`, `data`, `data1065`) VALUES
(1017,	'<p>ADAADAADAADAADAADAADAADAADAADAADAADAADAADAADAADAADAADAADAADAADAADAADAADAADAADAADAADAADA</p>',	NULL),
(1022,	'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget augue dui. Cras neque turpis, tristique a mi at, blandit hendrerit magna. Aliquam in interdum est. Fusce non iaculis ex, at tempus massa. Duis quam sem, convallis vitae hendrerit a, pellentesque at nunc. Nunc nec ullamcorper metus, non consectetur ligula. Maecenas gravida ornare consectetur. Ut egestas cursus vulputate. Etiam diam eros, sodales at lorem in, feugiat suscipit sem. Praesent venenatis volutpat nisl, ut congue est lobortis mollis. Integer vel viverra augue. Vestibulum ut varius tortor. Etiam venenatis, elit eget elementum ultrices, tortor metus dictum mi, sed placerat metus sem sit amet massa. Integer laoreet molestie ante sit amet blandit. Sed volutpat rhoncus arcu vel tempus.</p>\n\n<p>Praesent consectetur purus vel rutrum vulputate. Nunc elementum mauris eu vestibulum hendrerit. Vivamus ut mi eu augue congue tempor sit amet vel dui. Maecenas orci sapien, posuere vitae augue nec, tempor consequat libero. Aliquam posuere metus purus. Fusce elementum enim in dolor auctor, nec malesuada orci accumsan. Vivamus in ullamcorper metus, ut vestibulum tellus. Vivamus ac pellentesque velit.Praesent consectetur purus vel rutrum vulputate. Nunc elementum mauris eu vestibulum hendrerit. Vivamus ut mi eu augue congue tempor sit amet vel dui. Maecenas orci sapien, posuere vitae augue nec, tempor consequat libero. Aliquam posuere metus purus. Fusce elementum enim in dolor auctor, nec malesuada orci accumsan. Vivamus in ullamcorper metus, ut vestibulum tellus. Vivamus ac pellentesque velit.</p>',	NULL),
(1025,	'<p>Gejala</p>\n\n<p>Masing-masing orang memiliki respons yang berbeda terhadap COVID-19. Sebagian besar orang yang terpapar virus ini akan mengalami gejala ringan hingga sedang, dan akan pulih tanpa perlu dirawat di rumah sakit.</p>\n\n<hr />\n<p>Gejala yang paling umum:</p>\n\n<ul>\n	<li>demam</li>\n	<li>batuk</li>\n	<li>kelelahan</li>\n	<li>kehilangan rasa atau bau</li>\n	<li>Gejala yang sedikit tidak umum:</li>\n	<li>sakit tenggorokan</li>\n	<li>sakit kepala</li>\n	<li>sakit dan nyeri</li>\n	<li>diare</li>\n	<li>ruam pada kulit, atau perubahan warna pada jari tangan atau jari kaki</li>\n	<li>mata merah atau iritasi</li>\n</ul>\n\n<p>Gejala serius:</p>\n\n<ul>\n	<li>kesulitan bernapas atau sesak napas</li>\n	<li>kesulitan berbicara atau bergerak, atau bingung</li>\n	<li>nyeri dada</li>\n</ul>\n\n<p>Segera cari bantuan medis jika Anda mengalami gejala serius. Selalu hubungi dokter atau fasilitas kesehatan sebelum mengunjunginya.</p>\n\n<p>Orang dengan gejala ringan yang dinyatakan sehat harus melakukan perawatan mandiri di rumah.</p>\n\n<p>Rata-rata gejala akan muncul 5–6 hari setelah seseorang pertama kali terinfeksi virus ini, tetapi bisa juga sampai 14 hari setelah terinfeksi.</p>',	NULL),
(1026,	'<p><strong>Halodoc, </strong>Jakarta - Di Inggris penyakit liver (hati) umumnya disebabkan oleh kondisi yang sering terjadi di kehidupan masyarakatnya, yakni konsumsi alkohol yang berlebih. Menyoal penyakit liver ini, tentu berkaitan erat dengan hepatitis yang merupakan istilah untuk menggambarkan peradangan hati.</p>\n\n<p>Masalahnya, penyakit ini terkadang tak menyebabkan gejala sehingga orang-orang tak menyadari meski sudah mengidapnya. Dalam beberapa kasus, hepatitis bisa menyebabkan penyakit kuning (<em>jaundice</em>) dan gagal hati pada beberapa orang. Lalu, apa sih tanda hepatitis yang tak boleh diabaikan?</p>\n\n<p><strong>Amati Gejalanya</strong></p>\n\n<p>Kata ahli, hepatitis merupakan hasil dari kerusakan hati yang kebanyakan disebabkan oleh konsumsi alkohol berlebih. Beberapa jenis hepatitis memang bisa berlangsung tanpa menyebabkan masalah yang serius, tapi ada juga yang bisa bertahan lama hingga menimbulkan sederet masalah kesehatan lainnya.</p>\n\n<p>Misalnya, menyebabkan jaringan parut pada hati (sirosis), kehilangan fungsi hati, dan dalam beberapa kasus juga bisa menyebabkan kanker hati. Oleh sebab itu, kamu mesti waspada terhadap penyakit yang satu ini. Menurut ahli dari National Health Service (NHS) di Inggris seperti dilansir<em> Express, </em>gejala hepatitis juga bisa berkembang dan menimbulkan tanda-tanda seperti di bawah ini.</p>\n\n<p>1. Nyeri pada otot dan sendi.</p>\n\n<p>2. Suhu tubuh di atas 38 derajat celcius.</p>\n\n<p>3. Merasa haus sepanjang waktu.</p>\n\n<p>4. Merasa tidak enak badan dan diare.</p>\n\n<p>5. Kehilangan nafsu makan.</p>\n\n<p>6. Sakit perut.</p>\n\n<p>7. Urin berwarna gelap.</p>\n\n<p>8. Pucat.</p>\n\n<p>9. Kulit terasa gatal.</p>\n\n<p>10. Menguningnya mata dan kulit (<em>jaundice</em>).</p>\n\n<p>Ahli NHS juga menambahkan, hepatitis jangka panjang (kronis) terkadang tak memiliki gejala yang jelas sampai hati berhenti bekerja dengan baik (gagal hati). Pada tahap selanjutnya, kondisi ini bisa menimbulkan sakit kuning, pembengkakan di kaki atau pergelangan kaki, kebingungan, hingga keluarnya darah dari tinja atau muntahan.</p>\n\n<p>Dalam beberapa kasus, hepatitis juga bisa menimbulkan sirosis. Kondisi ini dapat menyebabkan gagal hati, yang pada akhirnya bisa membuat organ hati berhenti bekerja dan berakibat fatal. Kondisi ini biasanya memerlukan waktu bertahun-tahun untuk mencapai tahap ini. Masalahnya, kata ahli dari NHS, tak ada obat yang bisa mengobati kondisi medis ini, tapi beberapa metode pengobatan dapat membantu memperlambat pengembangannya. Lalu, bagaimana dengan gejala yang timbul?</p>\n\n<p>Para ahli dari NHS mengatakan, setidaknya ada empat hal yang muncul. Mulai dari merasa sangat lelah dan lemah, mual, kehilangan nafsu makan, hingga kehilangan dorongan seksual. Ketika kondisinya makin memburuk, sirosis dapat menimbulkan penyakit kuning, muntah darah, dan kulit menjadi gelap dan gatal.</p>\n\n<p>Yang perlu diingat, bila dirimu memiliki tanda hepatitis seperti di atas, segeralah berkunjung ke dokter untuk mendapatkan penanganan yang tepat.</p>\n\n<p><strong>Jenis-jenis Hepatitis</strong></p>\n\n<p>Kata ahli, virus merupakan penyebab paling umum hepatitis. Namun, infeksi hati atau liver karena zat beracun (seperti alkohol dan obat-obatan tertentu dan penyakit autoimun juga bisa menyebabkan peradangan hati ini.</p>\n\n<p>Nah, setidaknya ada lima jenis virus yang bisa menyebabkan hepatitis. Berikut penjelasannya:</p>\n\n<p><strong>1. Hepatitis A</strong></p>\n\n<p>Hepatitis A (HAV) berarti disebabkan oleh virus hepatitis tipe A yang ada di dalam tinja seseorang yang terinfeksi. Umumnya, hepatitis A sering ditularkan melalui konsumsi air atau makanan yang terkontaminasi. Umumnya, banyak orang di daerah dengan sanitasi buruk terinfeksi virus ini. Selain itu, kontak sesual juga bisa menjadi media penyebar HAV.</p>\n\n<p><strong>2. Hepatitis B</strong></p>\n\n<p>Hepatitis B (HBV) ditularkan dari virus hepatitis B melalui kontak dengan darah yang terinfeksi. Misalnya, melalui transfusi atau produk darah yang terkena virus, alat medis dan jarum suntik narkoba serta tato yang terkontaminasi, air mani, hingga cairan tubuh lainnya. HBV juga bisa ditularkan ibu yang terinfeksi pada bayi saat proses persalinan.</p>\n\n<p><strong>3. Hepatitis C</strong></p>\n\n<p>Yang satu ini ditularkan dari virus hepatitis C (HCV). Sebagian besar virus HCV ditularkan melalui paparan darah. Misalnya, melalui transfusi dan produk darah yang terkontaminasi. Selain itu, transmisi seksual juga bisa menyebarkan HVC meski jarang terjadi.</p>\n\n<p>4. <strong>Hepatitis D</strong></p>\n\n<p>Kata ahli, infeksi virus hepatitis (HDV) hanya terjadi pada mereka yang terinfeksi HBV. Infeksi ganda ini dapat mengakibatkan penyakit yang lebih serius. Meski begitu, vaksin hepatitis B bisa memberikan perlindungan terhadap HDV.</p>\n\n<p><strong>5. Hepatitis E</strong></p>\n\n<p>Virus hepatitis E (HEV kebanyakan ditularkan melalui konsumsi air atau makanan yang terkontaminasi. Kata ahli, hepatitis E merupakan penyebab umum dari wabah hepatitis di negara-negara berkembang.</p>\n\n<p>Nah, masih ingin tahu lebih jauh mengenai tanda hepatitis yang tak boleh diabaikan? Kamu bisa lo bertanya langsung pada dokter melalui aplikasi <a href=\"https://halodoc.onelink.me/cQvV/48975ec8\"><strong>Halodoc</strong></a>. Lewat fitur <em>Chat </em>dan<em> Voice/Video Call</em>, kamu bisa mengobrol dengan dokter ahli tanpa perlu ke luar rumah. Yuk, <a href=\"https://halodoc.onelink.me/cQvV/fb57ff40\"><em>download</em></a> aplikasi <strong>Halodoc</strong> sekarang juga di App Store dan Google Play!</p>',	'<p><strong>EN Halodoc, </strong>Jakarta - Di Inggris penyakit liver (hati) umumnya disebabkan oleh kondisi yang sering terjadi di kehidupan masyarakatnya, yakni konsumsi alkohol yang berlebih. Menyoal penyakit liver ini, tentu berkaitan erat dengan hepatitis yang merupakan istilah untuk menggambarkan peradangan hati.</p>\n\n<p>Masalahnya, penyakit ini terkadang tak menyebabkan gejala sehingga orang-orang tak menyadari meski sudah mengidapnya. Dalam beberapa kasus, hepatitis bisa menyebabkan penyakit kuning (<em>jaundice</em>) dan gagal hati pada beberapa orang. Lalu, apa sih tanda hepatitis yang tak boleh diabaikan?</p>\n\n<p><strong>Amati Gejalanya</strong></p>\n\n<p>Kata ahli, hepatitis merupakan hasil dari kerusakan hati yang kebanyakan disebabkan oleh konsumsi alkohol berlebih. Beberapa jenis hepatitis memang bisa berlangsung tanpa menyebabkan masalah yang serius, tapi ada juga yang bisa bertahan lama hingga menimbulkan sederet masalah kesehatan lainnya.</p>\n\n<p>Misalnya, menyebabkan jaringan parut pada hati (sirosis), kehilangan fungsi hati, dan dalam beberapa kasus juga bisa menyebabkan kanker hati. Oleh sebab itu, kamu mesti waspada terhadap penyakit yang satu ini. Menurut ahli dari National Health Service (NHS) di Inggris seperti dilansir<em> Express, </em>gejala hepatitis juga bisa berkembang dan menimbulkan tanda-tanda seperti di bawah ini.</p>\n\n<p>1. Nyeri pada otot dan sendi.</p>\n\n<p>2. Suhu tubuh di atas 38 derajat celcius.</p>\n\n<p>3. Merasa haus sepanjang waktu.</p>\n\n<p>4. Merasa tidak enak badan dan diare.</p>\n\n<p>5. Kehilangan nafsu makan.</p>\n\n<p>6. Sakit perut.</p>\n\n<p>7. Urin berwarna gelap.</p>\n\n<p>8. Pucat.</p>\n\n<p>9. Kulit terasa gatal.</p>\n\n<p>10. Menguningnya mata dan kulit (<em>jaundice</em>).</p>\n\n<p>Ahli NHS juga menambahkan, hepatitis jangka panjang (kronis) terkadang tak memiliki gejala yang jelas sampai hati berhenti bekerja dengan baik (gagal hati). Pada tahap selanjutnya, kondisi ini bisa menimbulkan sakit kuning, pembengkakan di kaki atau pergelangan kaki, kebingungan, hingga keluarnya darah dari tinja atau muntahan.</p>\n\n<p>Dalam beberapa kasus, hepatitis juga bisa menimbulkan sirosis. Kondisi ini dapat menyebabkan gagal hati, yang pada akhirnya bisa membuat organ hati berhenti bekerja dan berakibat fatal. Kondisi ini biasanya memerlukan waktu bertahun-tahun untuk mencapai tahap ini. Masalahnya, kata ahli dari NHS, tak ada obat yang bisa mengobati kondisi medis ini, tapi beberapa metode pengobatan dapat membantu memperlambat pengembangannya. Lalu, bagaimana dengan gejala yang timbul?</p>\n\n<p>Para ahli dari NHS mengatakan, setidaknya ada empat hal yang muncul. Mulai dari merasa sangat lelah dan lemah, mual, kehilangan nafsu makan, hingga kehilangan dorongan seksual. Ketika kondisinya makin memburuk, sirosis dapat menimbulkan penyakit kuning, muntah darah, dan kulit menjadi gelap dan gatal.</p>\n\n<p>Yang perlu diingat, bila dirimu memiliki tanda hepatitis seperti di atas, segeralah berkunjung ke dokter untuk mendapatkan penanganan yang tepat.</p>\n\n<p><strong>Jenis-jenis Hepatitis</strong></p>\n\n<p>Kata ahli, virus merupakan penyebab paling umum hepatitis. Namun, infeksi hati atau liver karena zat beracun (seperti alkohol dan obat-obatan tertentu dan penyakit autoimun juga bisa menyebabkan peradangan hati ini.</p>\n\n<p>Nah, setidaknya ada lima jenis virus yang bisa menyebabkan hepatitis. Berikut penjelasannya:</p>\n\n<p><strong>1. Hepatitis A</strong></p>\n\n<p>Hepatitis A (HAV) berarti disebabkan oleh virus hepatitis tipe A yang ada di dalam tinja seseorang yang terinfeksi. Umumnya, hepatitis A sering ditularkan melalui konsumsi air atau makanan yang terkontaminasi. Umumnya, banyak orang di daerah dengan sanitasi buruk terinfeksi virus ini. Selain itu, kontak sesual juga bisa menjadi media penyebar HAV.</p>\n\n<p><strong>2. Hepatitis B</strong></p>\n\n<p>Hepatitis B (HBV) ditularkan dari virus hepatitis B melalui kontak dengan darah yang terinfeksi. Misalnya, melalui transfusi atau produk darah yang terkena virus, alat medis dan jarum suntik narkoba serta tato yang terkontaminasi, air mani, hingga cairan tubuh lainnya. HBV juga bisa ditularkan ibu yang terinfeksi pada bayi saat proses persalinan.</p>\n\n<p><strong>3. Hepatitis C</strong></p>\n\n<p>Yang satu ini ditularkan dari virus hepatitis C (HCV). Sebagian besar virus HCV ditularkan melalui paparan darah. Misalnya, melalui transfusi dan produk darah yang terkontaminasi. Selain itu, transmisi seksual juga bisa menyebarkan HVC meski jarang terjadi.</p>\n\n<p>4. <strong>Hepatitis D</strong></p>\n\n<p>Kata ahli, infeksi virus hepatitis (HDV) hanya terjadi pada mereka yang terinfeksi HBV. Infeksi ganda ini dapat mengakibatkan penyakit yang lebih serius. Meski begitu, vaksin hepatitis B bisa memberikan perlindungan terhadap HDV.</p>\n\n<p><strong>5. Hepatitis E</strong></p>\n\n<p>Virus hepatitis E (HEV kebanyakan ditularkan melalui konsumsi air atau makanan yang terkontaminasi. Kata ahli, hepatitis E merupakan penyebab umum dari wabah hepatitis di negara-negara berkembang.</p>\n\n<p>Nah, masih ingin tahu lebih jauh mengenai tanda hepatitis yang tak boleh diabaikan? Kamu bisa lo bertanya langsung pada dokter melalui aplikasi <a href=\"https://halodoc.onelink.me/cQvV/48975ec8\"><strong>Halodoc</strong></a>. Lewat fitur <em>Chat </em>dan<em> Voice/Video Call</em>, kamu bisa mengobrol dengan dokter ahli tanpa perlu ke luar rumah. Yuk, <a href=\"https://halodoc.onelink.me/cQvV/fb57ff40\"><em>download</em></a> aplikasi <strong>Halodoc</strong> sekarang juga di App Store dan Google Play!</p>'),
(1027,	'<p><strong>Radang amandel atau tonsilitis adalah kondisi ketika amandel mengalami inflamasi atau peradangan. Kondisi ini umumnya dialami oleh anak usia 3–7 tahun. Meski begitu, radang amandel juga dapat terjadi pada orang dewasa, terutama lansia. </strong></p>\n\n<p><a href=\"https://www.alodokter.com/5-penyebab-amandel-bengkak-dan-cara-mengobatinya\" target=\"_blank\" rel=\"noreferrer noopener\">Amandel</a> atau tonsil adalah dua kelenjar kecil di tenggorokan yang berfungsi untuk mencegah infeksi, khususnya pada anak-anak. Namun, seiring bertambahnya usia dan makin kuatnya daya tahan tubuh, fungsi amandel mulai tergantikan dan ukurannya secara perlahan akan menyusut.</p>\n\n<h3><strong>Penyebab dan Gejala Radang Amandel </strong></h3>\n\n<p>Radang amandel disebabkan oleh infeksi virus atau <a href=\"https://www.alodokter.com/infeksi-bakteri\" target=\"_blank\" rel=\"noreferrer noopener\">bakteri</a>. Beberapa jenis virus yang menjadi penyebab radang amandel adalah virus yang juga menyebabkan <a href=\"https://www.alodokter.com/batuk-pilek\" target=\"_blank\" rel=\"noreferrer noopener\">batuk pilek</a> atau flu.</p>\n\n<p>Gejala utama radang amandel adalah pembengkakan amandel dan rasa sakit ketika menelan. Kondisi ini juga dapat menimbulkan gejala lain, seperti suara serak, demam, <a href=\"https://www.alodokter.com/bau-mulut-halitosis\" target=\"_blank\" rel=\"noreferrer noopener\">bau mulut</a>, batuk, dan sakit kepala.</p>\n\n<h3><strong>Pengobatan dan Pencegahan Radang Amandel </strong></h3>\n\n<p>Radang amandel dapat ditangani dengan terapi mandiri, pemberian obat, atau operasi. Dokter akan menentukan metode yang tepat, sesuai dengan hasil pemeriksaan kondisi pasien.</p>\n\n<p>Radang amandel merupakan kondisi yang dapat dicegah. Salah satu cara yang dapat dilakukan untuk mencegah penyakit ini adalah dengan menjaga kebersihan diri, agar infeksi tidak menular ke orang lain.</p>\n\n<p>Terakhir diperbarui: 26 Januari 2022</p>',	NULL),
(1034,	'<p><strong>Flu atau influenza adalah infeksi virus yang menyerang </strong><strong>hidung, tenggorokan, dan paru-paru</strong><strong>.</strong> <strong>Penderita flu dapat mengalami demam, sakit kepala, </strong><strong>pilek, hidung tersumbat, serta batuk. </strong></p>\n\n<p>Banyak orang mengira flu sama dengan batuk pilek biasa (<em>common cold</em>). Walaupun gejalanya mirip, kedua kondisi ini disebabkan oleh jenis virus yang berbeda. Gejala flu lebih parah dan menyerang secara mendadak, sedangkan gejala batuk pilek biasa cenderung ringan dan muncul secara bertahap.</p>\n\n<p>Flu merupakan penyakit yang mudah menular ke orang lain, terutama pada 3-4 hari pertama setelah penderita terinfeksi. Bahkan pada beberapa kasus, penderita flu dapat menularkan penyakitnya sebelum gejala muncul.</p>\n\n<h3><strong>Penyebab dan Gejala Flu</strong></h3>\n\n<p>Seseorang dapat tertular flu jika tidak sengaja menghirup percikan air liur di udara, yang dikeluarkan penderita ketika bersin atau batuk. Selain itu, menyentuh mulut atau hidung setelah memegang benda yang terkena percikan air liur penderita, juga bisa menjadi sarana penularan virus flu.</p>\n\n<p>Gejala flu antara lain demam, <a href=\"https://www.alodokter.com/pilek\" target=\"_blank\" rel=\"noreferrer noopener\">pilek</a>, hidung tersumbat, dan sakit kepala. Meskipun sama dengan gejala batuk pilek biasa, gejala flu terasa lebih parah dan sering kali menyerang tiba-tiba.</p>\n\n<p>Segeralah berobat ke dokter jika gejala di atas tidak kunjung membaik setelah dua minggu, atau membaik tetapi kemudian memburuk. Tindakan darurat perlu dilakukan bila gejala flu disertai sesak napas atau <a href=\"https://www.alodokter.com/penurunan-kesadaran\" target=\"_blank\" rel=\"noreferrer noopener\">penurunan kesadaran</a>.</p>\n\n<h3><strong>Pengobatan dan Pencegahan Flu</strong></h3>\n\n<p>Flu ringan bisa diatasi dengan banyak beristirahat, mengonsumsi makanan sehat yang mengandung <a href=\"https://www.alodokter.com/?p=1789436\" target=\"_blank\" rel=\"noreferrer noopener\">vitamin C</a>, dan banyak minum. Namun, bila gejalanya berat, segera lakukan pemeriksaan ke dokter agar diberikan obat untuk mempercepat kesembuhan dan mencegah komplikasi.</p>\n\n<p>Cara mencegah flu yang paling efektif adalah dengan menjalani <a href=\"https://www.alodokter.com/vaksin-influenza-kenali-manfaat-hingga-efek-sampingnya\" target=\"_blank\" rel=\"noreferrer noopener\">vaksinasi influenza</a>. Selain itu, Anda juga diajurkan untuk rajin <a href=\"https://www.alodokter.com/cuci-tangan-dulu\" target=\"_blank\" rel=\"noreferrer noopener\">cuci tangan</a> dan tidak berdekatan dengan penderita flu.</p>\n\n<h3><strong>Komplikasi Flu</strong></h3>\n\n<p>Flu yang sembuh kemudian kambuh dan memburuk bisa menjadi tanda komplikasi serius, seperti paru-paru basah, gangguan jantung, <a href=\"https://www.alodokter.com/meningitis\" target=\"_blank\" rel=\"noreferrer noopener\">meningitis</a>, atau infeksi virus pada otak. Komplikasi tersebut bisa lebih berisiko terjadi pada <a href=\"https://www.alodokter.com/penanganan-dan-obat-flu-pada-ibu-hamil\" target=\"_blank\" rel=\"noreferrer noopener\">ibu hamil</a> dan orang yang memiliki daya tahan tubuh lemah.</p>',	NULL),
(1044,	'<table class=\"table table-responsive\">\n	<tbody>\n		<tr>\n			<th>Hari</th>\n			<th>Pukul</th>\n		</tr>\n		<tr>\n			<td>Senin</td>\n			<td>07.00 - 10.00</td>\n		</tr>\n		<tr>\n			<td>Selasa</td>\n			<td>-</td>\n		</tr>\n		<tr>\n			<td>Rabu</td>\n			<td>12.30 - 14.00</td>\n		</tr>\n		<tr>\n			<td>Kamis</td>\n			<td>10.45 - 11.45</td>\n		</tr>\n		<tr>\n			<td>Jumat</td>\n			<td>15.00 - 16.00</td>\n		</tr>\n		<tr>\n			<td>Sabtu</td>\n			<td>-</td>\n		</tr>\n		<tr>\n			<td>Minggu</td>\n			<td>-</td>\n		</tr>\n	</tbody>\n</table>',	''),
(1054,	'<p>Klinik Utama Elim kini dilengkapi dengan Laboratorium</p>',	NULL),
(1066,	'<p>Ini bahasa Indonesia</p>',	'<p>This is English Language</p>'),
(1067,	'<p>Ini bahasa Indonesia</p>',	'<p>This is English Language</p>'),
(1071,	'',	''),
(1072,	'',	''),
(1075,	'',	''),
(1079,	'',	''),
(1083,	'<p>Pojok</p>',	''),
(1086,	'',	''),
(1089,	'Pojoks',	''),
(1091,	'Pojoks',	''),
(1093,	'Ini bahasa Indonesia',	'This is English Language');

DROP TABLE IF EXISTS `field_content_2`;
CREATE TABLE `field_content_2` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` mediumtext NOT NULL,
  `data1065` mediumtext,
  PRIMARY KEY (`pages_id`),
  KEY `data_exact` (`data`(191)),
  FULLTEXT KEY `data` (`data`),
  FULLTEXT KEY `data1065` (`data1065`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_content_2` (`pages_id`, `data`, `data1065`) VALUES
(1044,	'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel sollicitudin sapien. Nulla varius facilisis laoreet. Nullam tempor facilisis leo eu imperdiet. Sed in consectetur lectus. Vestibulum sit amet tortor enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus justo.</p>\n\n<p>Cras nec quam luctus, fringilla lectus ut, consequat sem. Duis et fermentum orci, a accumsan lorem. Phasellus tempor sem at mauris ultrices, nec imperdiet ligula ultricies. Suspendisse imperdiet accumsan ipsum non consequat. Curabitur volutpat, lacus nec vestibulum feugiat, neque dui auctor dui, quis accumsan diam felis et mauris. Donec posuere nulla a vulputate egestas. In hac habitasse platea dictumst. Fusce euismod tincidunt mi sed fringilla. Aenean lacinia neque vitae congue commodo. Sed non orci dapibus, vehicula arcu eget, rhoncus enim. Praesent ac neque nisi. Aliquam viverra justo nulla, ut mollis mauris tincidunt sed.</p>\n\n<p>Donec luctus eleifend commodo. Praesent eleifend enim id suscipit feugiat. Duis eu dictum eros. Donec volutpat augue ut felis iaculis efficitur. Integer vulputate bibendum augue, eu aliquet sem viverra ut. Cras at lorem vel dui viverra molestie. Phasellus nibh velit, mollis at nisl eu, tincidunt dapibus nisl. Nunc et dui vitae metus placerat placerat. Donec placerat libero ut felis lacinia, a auctor nisl vulputate. Praesent urna dui, congue vitae imperdiet a, auctor et ex. Sed eu tincidunt leo. Curabitur pellentesque risus sit amet lectus iaculis, varius bibendum ante efficitur. Etiam suscipit justo ac est pulvinar, at dictum erat pulvinar. Proin suscipit porttitor diam id volutpat. Quisque eget sollicitudin nibh. Fusce vel lectus libero.</p>\n\n<p>Nam non placerat metus. Nam accumsan nulla nec purus pulvinar imperdiet. In tempus in velit sed feugiat. Morbi consectetur tempor diam sed aliquam. Vivamus id ipsum quis velit dignissim lacinia. Integer tincidunt mauris non lorem scelerisque maximus. Maecenas eu lorem in orci bibendum auctor. Donec aliquam vehicula ipsum, sodales lacinia purus scelerisque sed. Pellentesque cursus risus egestas accumsan auctor. Cras euismod lacus ut sodales ultrices. Ut pretium quis dui vel dapibus. Vestibulum vel ligula vitae nisi accumsan tempus.</p>\n\n<p>Nunc a tortor enim. Integer elementum consequat enim et sollicitudin. Curabitur elementum, augue sit amet faucibus commodo, elit ante aliquet nisi, sollicitudin pretium neque nunc eget purus. Aliquam erat volutpat. Suspendisse non mauris lobortis, scelerisque orci porta, tempor odio. Praesent mattis varius tortor at condimentum. Cras posuere velit arcu. Maecenas semper hendrerit nunc, in facilisis augue luctus eu. Cras ac nisl blandit, convallis ipsum ac, accumsan ligula.</p>',	''),
(1066,	'',	''),
(1067,	'',	''),
(1093,	'',	'');

DROP TABLE IF EXISTS `field_content_3`;
CREATE TABLE `field_content_3` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` mediumtext NOT NULL,
  `data1065` mediumtext,
  PRIMARY KEY (`pages_id`),
  KEY `data_exact` (`data`(191)),
  FULLTEXT KEY `data` (`data`),
  FULLTEXT KEY `data1065` (`data1065`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_content_3` (`pages_id`, `data`, `data1065`) VALUES
(1044,	'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel sollicitudin sapien. Nulla varius facilisis laoreet. Nullam tempor facilisis leo eu imperdiet. Sed in consectetur lectus. Vestibulum sit amet tortor enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec purus justo.</p>\n\n<p>Cras nec quam luctus, fringilla lectus ut, consequat sem. Duis et fermentum orci, a accumsan lorem. Phasellus tempor sem at mauris ultrices, nec imperdiet ligula ultricies. Suspendisse imperdiet accumsan ipsum non consequat. Curabitur volutpat, lacus nec vestibulum feugiat, neque dui auctor dui, quis accumsan diam felis et mauris. Donec posuere nulla a vulputate egestas. In hac habitasse platea dictumst. Fusce euismod tincidunt mi sed fringilla. Aenean lacinia neque vitae congue commodo. Sed non orci dapibus, vehicula arcu eget, rhoncus enim. Praesent ac neque nisi. Aliquam viverra justo nulla, ut mollis mauris tincidunt sed.</p>\n\n<p>Donec luctus eleifend commodo. Praesent eleifend enim id suscipit feugiat. Duis eu dictum eros. Donec volutpat augue ut felis iaculis efficitur. Integer vulputate bibendum augue, eu aliquet sem viverra ut. Cras at lorem vel dui viverra molestie. Phasellus nibh velit, mollis at nisl eu, tincidunt dapibus nisl. Nunc et dui vitae metus placerat placerat. Donec placerat libero ut felis lacinia, a auctor nisl vulputate. Praesent urna dui, congue vitae imperdiet a, auctor et ex. Sed eu tincidunt leo. Curabitur pellentesque risus sit amet lectus iaculis, varius bibendum ante efficitur. Etiam suscipit justo ac est pulvinar, at dictum erat pulvinar. Proin suscipit porttitor diam id volutpat. Quisque eget sollicitudin nibh. Fusce vel lectus libero.</p>\n\n<p>Nam non placerat metus. Nam accumsan nulla nec purus pulvinar imperdiet. In tempus in velit sed feugiat. Morbi consectetur tempor diam sed aliquam. Vivamus id ipsum quis velit dignissim lacinia. Integer tincidunt mauris non lorem scelerisque maximus. Maecenas eu lorem in orci bibendum auctor. Donec aliquam vehicula ipsum, sodales lacinia purus scelerisque sed. Pellentesque cursus risus egestas accumsan auctor. Cras euismod lacus ut sodales ultrices. Ut pretium quis dui vel dapibus. Vestibulum vel ligula vitae nisi accumsan tempus.</p>\n\n<p>Nunc a tortor enim. Integer elementum consequat enim et sollicitudin. Curabitur elementum, augue sit amet faucibus commodo, elit ante aliquet nisi, sollicitudin pretium neque nunc eget purus. Aliquam erat volutpat. Suspendisse non mauris lobortis, scelerisque orci porta, tempor odio. Praesent mattis varius tortor at condimentum. Cras posuere velit arcu. Maecenas semper hendrerit nunc, in facilisis augue luctus eu. Cras ac nisl blandit, convallis ipsum ac, accumsan ligula.</p>',	''),
(1066,	'',	''),
(1067,	'',	''),
(1093,	'',	'');

DROP TABLE IF EXISTS `field_date_1`;
CREATE TABLE `field_date_1` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`pages_id`),
  KEY `data` (`data`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_date_1` (`pages_id`, `data`) VALUES
(1083,	'2021-07-13 00:00:00'),
(1089,	'2021-07-13 00:00:00'),
(1017,	'2022-04-27 00:00:00'),
(1022,	'2022-04-27 00:00:00'),
(1023,	'2022-04-27 00:00:00'),
(1027,	'2022-05-08 00:00:00'),
(1025,	'2022-05-09 00:00:00'),
(1026,	'2022-05-10 00:00:00'),
(1029,	'2022-05-11 00:00:00'),
(1030,	'2022-05-12 00:00:00'),
(1034,	'2022-05-18 00:00:00'),
(1035,	'2022-05-24 00:00:00'),
(1036,	'2022-05-24 00:00:00'),
(1042,	'2022-06-20 00:00:00'),
(1044,	'2022-06-22 00:00:00'),
(1050,	'2022-06-22 00:00:00'),
(1048,	'2022-06-23 00:00:00'),
(1055,	'2022-06-23 00:00:00'),
(1046,	'2022-06-24 00:00:00'),
(1049,	'2022-06-24 00:00:00'),
(1045,	'2022-06-25 00:00:00'),
(1047,	'2022-06-25 00:00:00'),
(1051,	'2022-06-25 00:00:00'),
(1052,	'2022-06-25 00:00:00'),
(1054,	'2022-06-25 00:00:00'),
(1066,	'2022-07-06 00:00:00'),
(1067,	'2022-07-06 00:00:00'),
(1071,	'2022-07-13 00:00:00'),
(1091,	'2022-07-21 00:00:00');

DROP TABLE IF EXISTS `field_date_2`;
CREATE TABLE `field_date_2` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`pages_id`),
  KEY `data` (`data`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `field_email`;
CREATE TABLE `field_email` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` varchar(191) NOT NULL DEFAULT '',
  PRIMARY KEY (`pages_id`),
  KEY `data_exact` (`data`),
  FULLTEXT KEY `data` (`data`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_email` (`pages_id`, `data`) VALUES
(41,	'akunincoba@gmail.com'),
(1075,	'akunincoba@gmail.com'),
(1083,	'akunincobas@gmail.com'),
(1079,	'alvin@gmail.com'),
(1072,	'alwin09@gmail.com'),
(1071,	'mathew98786@gmail.com');

DROP TABLE IF EXISTS `field_fieldset_1`;
CREATE TABLE `field_fieldset_1` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` int(11) NOT NULL,
  PRIMARY KEY (`pages_id`),
  KEY `data` (`data`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `field_fieldset_1_end`;
CREATE TABLE `field_fieldset_1_end` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` int(11) NOT NULL,
  PRIMARY KEY (`pages_id`),
  KEY `data` (`data`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `field_fieldset_2`;
CREATE TABLE `field_fieldset_2` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` int(11) NOT NULL,
  PRIMARY KEY (`pages_id`),
  KEY `data` (`data`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `field_fieldset_2_end`;
CREATE TABLE `field_fieldset_2_end` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` int(11) NOT NULL,
  PRIMARY KEY (`pages_id`),
  KEY `data` (`data`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `field_icon`;
CREATE TABLE `field_icon` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` varchar(191) NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  `description` text NOT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `filedata` mediumtext,
  `filesize` int(11) DEFAULT NULL,
  `created_users_id` int(10) unsigned NOT NULL DEFAULT '0',
  `modified_users_id` int(10) unsigned NOT NULL DEFAULT '0',
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `ratio` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`pages_id`,`sort`),
  KEY `data` (`data`),
  KEY `modified` (`modified`),
  KEY `created` (`created`),
  KEY `filesize` (`filesize`),
  KEY `width` (`width`),
  KEY `height` (`height`),
  KEY `ratio` (`ratio`),
  FULLTEXT KEY `description` (`description`),
  FULLTEXT KEY `filedata` (`filedata`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_icon` (`pages_id`, `data`, `sort`, `description`, `modified`, `created`, `filedata`, `filesize`, `created_users_id`, `modified_users_id`, `width`, `height`, `ratio`) VALUES
(1017,	'gigi.png',	0,	'',	'2022-04-27 16:19:33',	'2022-04-27 16:19:33',	'',	15699,	41,	41,	251,	201,	1.25),
(1022,	'eyes.png',	0,	'',	'2022-04-27 16:40:45',	'2022-04-27 16:40:45',	'',	8458,	41,	41,	192,	142,	1.35),
(1023,	'body.png',	0,	'',	'2022-04-27 16:54:30',	'2022-04-27 16:54:30',	'',	10073,	41,	41,	165,	200,	0.83);

DROP TABLE IF EXISTS `field_images`;
CREATE TABLE `field_images` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` varchar(191) NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  `description` text NOT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `filedata` mediumtext,
  `filesize` int(11) DEFAULT NULL,
  `created_users_id` int(10) unsigned NOT NULL DEFAULT '0',
  `modified_users_id` int(10) unsigned NOT NULL DEFAULT '0',
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `ratio` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`pages_id`,`sort`),
  KEY `data` (`data`),
  KEY `modified` (`modified`),
  KEY `created` (`created`),
  KEY `filesize` (`filesize`),
  KEY `width` (`width`),
  KEY `height` (`height`),
  KEY `ratio` (`ratio`),
  FULLTEXT KEY `description` (`description`),
  FULLTEXT KEY `filedata` (`filedata`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_images` (`pages_id`, `data`, `sort`, `description`, `modified`, `created`, `filedata`, `filesize`, `created_users_id`, `modified_users_id`, `width`, `height`, `ratio`) VALUES
(1017,	'1.jpg',	0,	'',	'2022-06-08 14:51:22',	'2022-06-08 14:51:22',	'',	7624902,	41,	41,	5472,	3648,	1.50),
(1022,	'18.jpg',	0,	'',	'2022-06-03 11:36:42',	'2022-06-03 11:36:42',	'',	5534365,	41,	41,	5472,	3648,	1.50),
(1022,	'9.jpg',	1,	'',	'2022-06-03 16:00:02',	'2022-06-03 16:00:02',	'',	7158276,	41,	41,	3648,	5472,	0.67),
(1023,	'3.jpg',	0,	'',	'2022-06-08 14:51:40',	'2022-06-08 14:51:40',	'',	6740030,	41,	41,	5472,	3648,	1.50),
(1025,	'imagess.jpg',	0,	'',	'2022-05-09 14:39:45',	'2022-05-09 14:39:45',	'',	12460,	41,	41,	300,	168,	1.79),
(1026,	'hepatitis.jpg',	0,	'',	'2022-05-09 15:47:20',	'2022-05-09 15:47:20',	'',	8137,	41,	41,	300,	168,	1.79),
(1027,	'amandel.jpg',	0,	'',	'2022-05-09 16:31:29',	'2022-05-09 16:31:29',	'',	4428,	41,	41,	318,	159,	2.00),
(1029,	'banner2-min.jpg',	0,	'',	'2022-05-11 13:26:33',	'2022-05-11 13:26:33',	'',	125339,	41,	41,	1640,	624,	2.63),
(1030,	'banner3-min.jpg',	0,	'',	'2022-05-11 14:35:51',	'2022-05-11 14:35:51',	'',	138930,	41,	41,	1640,	624,	2.63),
(1034,	'flu.jpg',	0,	'',	'2022-05-18 15:39:00',	'2022-05-18 15:39:00',	'',	6936,	41,	41,	257,	196,	1.31),
(1035,	'banner2-min.jpg',	0,	'',	'2022-05-23 14:08:00',	'2022-05-23 14:08:00',	'',	125339,	41,	41,	1640,	624,	2.63),
(1036,	'gedungelim.jpg',	0,	'',	'2022-05-24 14:19:10',	'2022-05-24 14:19:10',	'',	5692168,	41,	41,	4368,	2912,	1.50),
(1042,	'1.jpg',	0,	'',	'2022-06-20 14:07:22',	'2022-06-20 14:07:22',	'',	7624902,	41,	41,	5472,	3648,	1.50),
(1044,	'placeholder-user.png',	0,	'dd',	'2022-06-28 13:20:38',	'2022-06-22 13:44:35',	'',	22606,	41,	41,	720,	720,	1.00),
(1045,	'19.jpg',	0,	'',	'2022-06-27 11:38:53',	'2022-06-27 11:38:52',	'',	9078860,	41,	41,	3648,	5472,	0.67),
(1046,	'4.jpg',	0,	'',	'2022-06-27 11:39:09',	'2022-06-27 11:39:09',	'',	7740884,	41,	41,	3648,	5472,	0.67),
(1047,	'2.jpg',	0,	'',	'2022-06-27 11:39:40',	'2022-06-27 11:39:40',	'',	6804306,	41,	41,	5472,	3648,	1.50),
(1048,	'5.jpg',	0,	'',	'2022-06-27 11:39:57',	'2022-06-27 11:39:57',	'',	7837225,	41,	41,	3648,	5472,	0.67),
(1049,	'20.jpg',	0,	'',	'2022-06-27 11:40:15',	'2022-06-27 11:40:15',	'',	7620152,	41,	41,	5472,	3648,	1.50),
(1050,	'19.jpg',	0,	'',	'2022-06-24 10:01:42',	'2022-06-24 10:01:41',	'',	9078860,	41,	41,	3648,	5472,	0.67),
(1051,	'9.jpg',	0,	'',	'2022-06-24 10:02:30',	'2022-06-24 10:02:29',	'',	7158276,	41,	41,	3648,	5472,	0.67),
(1052,	'16.jpg',	0,	'',	'2022-06-24 14:12:37',	'2022-06-24 14:12:37',	'',	8798644,	41,	41,	3548,	5472,	0.65),
(1054,	'9.jpg',	0,	'',	'2022-06-24 15:13:20',	'2022-06-24 15:13:20',	'',	7158276,	41,	41,	3648,	5472,	0.67),
(1055,	'20.jpg',	0,	'',	'2022-06-24 16:24:35',	'2022-06-24 16:24:34',	'',	7620152,	41,	41,	5472,	3648,	1.50),
(1066,	'2.jpg',	0,	'[\"\"]',	'2022-07-06 09:35:58',	'2022-07-06 09:35:58',	'',	6804306,	41,	41,	5472,	3648,	1.50),
(1067,	'11.jpg',	0,	'[\"\"]',	'2022-07-06 09:46:01',	'2022-07-06 09:46:01',	'',	9477725,	41,	41,	5472,	3648,	1.50),
(1089,	'engelina_sutejo_batununggal.jpg',	0,	'[\"\"]',	'2022-10-18 08:26:26',	'2022-10-18 08:26:26',	'',	4883,	41,	41,	128,	181,	0.71),
(1091,	'team-1-1.jpg',	0,	'[\"\"]',	'2022-07-18 16:39:48',	'2022-07-18 16:39:48',	'',	17752,	41,	41,	500,	450,	1.11),
(1091,	'team-5.jpg',	1,	'[\"\"]',	'2022-07-21 10:54:34',	'2022-07-21 10:54:34',	'',	20516,	41,	41,	500,	450,	1.11);

DROP TABLE IF EXISTS `field_language`;
CREATE TABLE `field_language` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` int(11) NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  PRIMARY KEY (`pages_id`,`sort`),
  KEY `data` (`data`,`pages_id`,`sort`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_language` (`pages_id`, `data`, `sort`) VALUES
(40,	1063,	0),
(41,	1063,	0);

DROP TABLE IF EXISTS `field_language_files`;
CREATE TABLE `field_language_files` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` varchar(191) NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  `description` text NOT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `filedata` mediumtext,
  `filesize` int(11) DEFAULT NULL,
  `created_users_id` int(10) unsigned NOT NULL DEFAULT '0',
  `modified_users_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`pages_id`,`sort`),
  KEY `data` (`data`),
  KEY `modified` (`modified`),
  KEY `created` (`created`),
  KEY `filesize` (`filesize`),
  FULLTEXT KEY `description` (`description`),
  FULLTEXT KEY `filedata` (`filedata`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `field_language_files_site`;
CREATE TABLE `field_language_files_site` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` varchar(191) NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  `description` text NOT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `filedata` mediumtext,
  `filesize` int(11) DEFAULT NULL,
  `created_users_id` int(10) unsigned NOT NULL DEFAULT '0',
  `modified_users_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`pages_id`,`sort`),
  KEY `data` (`data`),
  KEY `modified` (`modified`),
  KEY `created` (`created`),
  KEY `filesize` (`filesize`),
  FULLTEXT KEY `description` (`description`),
  FULLTEXT KEY `filedata` (`filedata`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `field_pass`;
CREATE TABLE `field_pass` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` char(40) NOT NULL,
  `salt` char(32) NOT NULL,
  PRIMARY KEY (`pages_id`),
  KEY `data` (`data`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

INSERT INTO `field_pass` (`pages_id`, `data`, `salt`) VALUES
(40,	'',	''),
(41,	'bA8HhqVpm/YZ.lg3dUOUOdAkOq0.ufC',	'$2y$11$3xoj5AgBs4Gsr4eog92ATO');

DROP TABLE IF EXISTS `field_password`;
CREATE TABLE `field_password` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` char(40) NOT NULL,
  `salt` char(32) NOT NULL,
  PRIMARY KEY (`pages_id`),
  KEY `data` (`data`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

INSERT INTO `field_password` (`pages_id`, `data`, `salt`) VALUES
(1071,	'tNc29.StUrFEdPXTRPNEMQyHDs6lrxS',	'$2y$11$oDhawxwcADAX30.jRN9FyO'),
(1072,	'Wdf66ktN02WOBcKpy0TTxXuKs9EkGu6',	'$2y$11$IjwamRsFf.ayPfFF/.Iy1O'),
(1083,	'1YI5oe6iVWblB6vPUkzJWij7sDRhkiS',	'$2y$11$DaqC9t8kEOeZL.uBvjbJfO'),
(1086,	'',	'$2y$11$1cgt8vEq3w2o6MbEszoy9E$');

DROP TABLE IF EXISTS `field_permissions`;
CREATE TABLE `field_permissions` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` int(11) NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  PRIMARY KEY (`pages_id`,`sort`),
  KEY `data` (`data`,`pages_id`,`sort`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_permissions` (`pages_id`, `data`, `sort`) VALUES
(38,	32,	1),
(1100,	32,	1),
(38,	34,	2),
(1100,	34,	2),
(38,	35,	3),
(37,	36,	0),
(38,	36,	0),
(1100,	36,	0),
(38,	50,	4),
(38,	51,	5),
(1100,	51,	4),
(38,	52,	7),
(38,	53,	8),
(1100,	53,	5),
(38,	54,	6),
(1100,	1011,	3);

DROP TABLE IF EXISTS `field_process`;
CREATE TABLE `field_process` (
  `pages_id` int(11) NOT NULL DEFAULT '0',
  `data` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pages_id`),
  KEY `data` (`data`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_process` (`pages_id`, `data`) VALUES
(10,	7),
(23,	10),
(3,	12),
(8,	12),
(9,	14),
(6,	17),
(11,	47),
(16,	48),
(21,	50),
(29,	66),
(30,	68),
(22,	76),
(28,	76),
(2,	87),
(300,	104),
(301,	109),
(302,	121),
(303,	129),
(31,	136),
(304,	138),
(1007,	150),
(1010,	159),
(1012,	161),
(1018,	165),
(1059,	169),
(1062,	171),
(1064,	172);

DROP TABLE IF EXISTS `field_roles`;
CREATE TABLE `field_roles` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` int(11) NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  PRIMARY KEY (`pages_id`,`sort`),
  KEY `data` (`data`,`pages_id`,`sort`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_roles` (`pages_id`, `data`, `sort`) VALUES
(40,	37,	0),
(41,	37,	0),
(41,	38,	1),
(41,	1100,	2);

DROP TABLE IF EXISTS `field_text_1`;
CREATE TABLE `field_text_1` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  `data1065` text,
  PRIMARY KEY (`pages_id`),
  KEY `data_exact` (`data`(191)),
  KEY `data_exact1065` (`data1065`(191)),
  FULLTEXT KEY `data` (`data`),
  FULLTEXT KEY `data1065` (`data1065`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_text_1` (`pages_id`, `data`, `data1065`) VALUES
(1036,	'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15843.025246153402!2d107.5971942!3d-6.9197094!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcdcd7de1a37173d!2sKlinik%20Utama%20Elim!5e0!3m2!1sid!2sid!4v1653361021136!5m2!1sid!2sid',	NULL),
(1044,	'Gigi',	NULL),
(1045,	'Penyakit Dalam',	NULL),
(1046,	'Spesialis Anak',	NULL),
(1047,	'Spesialis Saraf',	NULL),
(1048,	'Spesialis Kandungan dan Ginekologi',	NULL),
(1049,	'Spesialis Kulit dan Kelamin',	NULL),
(1050,	'Spesialis THT',	NULL),
(1051,	'Spesialis Mata',	NULL),
(1055,	'Obat',	NULL),
(1066,	'Jantung',	'Heart'),
(1067,	'Ginjal',	'Kidney'),
(1071,	'',	''),
(1072,	'',	''),
(1075,	'',	''),
(1079,	'',	''),
(1083,	'Cimahi',	''),
(1086,	'',	''),
(1089,	'Cimahi s',	''),
(1091,	'Cimahi',	''),
(1093,	'Ginjal',	'Kidney'),
(1096,	'1044',	''),
(1097,	'1050',	''),
(1101,	'1044',	'');

DROP TABLE IF EXISTS `field_text_10`;
CREATE TABLE `field_text_10` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  `data1065` text,
  PRIMARY KEY (`pages_id`),
  KEY `data_exact` (`data`(191)),
  KEY `data_exact1065` (`data1065`(191)),
  FULLTEXT KEY `data` (`data`),
  FULLTEXT KEY `data1065` (`data1065`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_text_10` (`pages_id`, `data`, `data1065`) VALUES
(1089,	'Saudara Kandung (Kakak)',	''),
(1091,	'Saudara (Keponakan)',	'');

DROP TABLE IF EXISTS `field_text_2`;
CREATE TABLE `field_text_2` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  `data1065` text,
  PRIMARY KEY (`pages_id`),
  KEY `data_exact` (`data`(191)),
  KEY `data_exact1065` (`data1065`(191)),
  FULLTEXT KEY `data` (`data`),
  FULLTEXT KEY `data1065` (`data1065`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_text_2` (`pages_id`, `data`, `data1065`) VALUES
(1044,	'Ya',	NULL),
(1045,	'Ya',	NULL),
(1046,	'Tidak',	NULL),
(1047,	'Ya',	NULL),
(1048,	'Tidak',	NULL),
(1049,	'Ya',	NULL),
(1050,	'Ya',	NULL),
(1051,	'Ya',	NULL),
(1055,	'Tidak',	NULL),
(1066,	'Ya',	'Yes'),
(1067,	'Tidak',	'No'),
(1071,	'',	''),
(1072,	'',	''),
(1075,	'',	''),
(1079,	'',	''),
(1083,	'B',	''),
(1086,	'',	''),
(1089,	'A',	''),
(1091,	'AB',	''),
(1093,	'Tidak',	'No'),
(1096,	'1083',	''),
(1097,	'1089',	''),
(1101,	'1091',	'');

DROP TABLE IF EXISTS `field_text_3`;
CREATE TABLE `field_text_3` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  `data1065` text,
  PRIMARY KEY (`pages_id`),
  KEY `data_exact` (`data`(191)),
  KEY `data_exact1065` (`data1065`(191)),
  FULLTEXT KEY `data` (`data`),
  FULLTEXT KEY `data1065` (`data1065`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_text_3` (`pages_id`, `data`, `data1065`) VALUES
(1071,	'',	''),
(1072,	'',	''),
(1075,	'',	''),
(1079,	'',	''),
(1083,	'',	''),
(1086,	'',	''),
(1089,	'',	''),
(1091,	'',	''),
(1096,	'Sakit Pinggang',	''),
(1097,	'Sakit Kaki',	''),
(1101,	'Sakit kaki',	'');

DROP TABLE IF EXISTS `field_text_4`;
CREATE TABLE `field_text_4` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  `data1065` text,
  PRIMARY KEY (`pages_id`),
  KEY `data_exact` (`data`(191)),
  KEY `data_exact1065` (`data1065`(191)),
  FULLTEXT KEY `data` (`data`),
  FULLTEXT KEY `data1065` (`data1065`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_text_4` (`pages_id`, `data`, `data1065`) VALUES
(1071,	'',	''),
(1072,	'',	''),
(1075,	'',	''),
(1079,	'',	''),
(1083,	'11',	''),
(1086,	'',	''),
(1089,	'',	''),
(1091,	'',	''),
(1096,	'Selesai',	''),
(1097,	'Selesai',	''),
(1101,	'Selesai',	'');

DROP TABLE IF EXISTS `field_text_5`;
CREATE TABLE `field_text_5` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  `data1065` text,
  PRIMARY KEY (`pages_id`),
  KEY `data_exact` (`data`(191)),
  KEY `data_exact1065` (`data1065`(191)),
  FULLTEXT KEY `data` (`data`),
  FULLTEXT KEY `data1065` (`data1065`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_text_5` (`pages_id`, `data`, `data1065`) VALUES
(1071,	'',	''),
(1072,	'',	''),
(1075,	'',	''),
(1079,	'',	''),
(1083,	'22',	''),
(1086,	'',	''),
(1089,	'',	''),
(1091,	'',	'');

DROP TABLE IF EXISTS `field_text_6`;
CREATE TABLE `field_text_6` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  `data1065` text,
  PRIMARY KEY (`pages_id`),
  KEY `data_exact` (`data`(191)),
  KEY `data_exact1065` (`data1065`(191)),
  FULLTEXT KEY `data` (`data`),
  FULLTEXT KEY `data1065` (`data1065`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_text_6` (`pages_id`, `data`, `data1065`) VALUES
(1071,	'',	''),
(1072,	'',	''),
(1075,	'',	''),
(1079,	'',	''),
(1083,	'bb',	''),
(1086,	'',	''),
(1089,	'',	''),
(1091,	'',	'');

DROP TABLE IF EXISTS `field_text_7`;
CREATE TABLE `field_text_7` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  `data1065` text,
  PRIMARY KEY (`pages_id`),
  KEY `data_exact` (`data`(191)),
  KEY `data_exact1065` (`data1065`(191)),
  FULLTEXT KEY `data` (`data`),
  FULLTEXT KEY `data1065` (`data1065`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_text_7` (`pages_id`, `data`, `data1065`) VALUES
(1071,	'',	''),
(1072,	'',	''),
(1075,	'',	''),
(1079,	'',	''),
(1083,	'vv',	''),
(1086,	'',	''),
(1089,	'',	''),
(1091,	'',	'');

DROP TABLE IF EXISTS `field_text_8`;
CREATE TABLE `field_text_8` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  `data1065` text,
  PRIMARY KEY (`pages_id`),
  KEY `data_exact` (`data`(191)),
  KEY `data_exact1065` (`data1065`(191)),
  FULLTEXT KEY `data` (`data`),
  FULLTEXT KEY `data1065` (`data1065`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_text_8` (`pages_id`, `data`, `data1065`) VALUES
(1071,	'',	''),
(1083,	'Laki-laki',	''),
(1086,	'',	''),
(1089,	'Perempuan',	''),
(1091,	'Laki-laki',	'');

DROP TABLE IF EXISTS `field_text_9`;
CREATE TABLE `field_text_9` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  `data1065` text,
  PRIMARY KEY (`pages_id`),
  KEY `data_exact` (`data`(191)),
  KEY `data_exact1065` (`data1065`(191)),
  FULLTEXT KEY `data` (`data`),
  FULLTEXT KEY `data1065` (`data1065`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_text_9` (`pages_id`, `data`, `data1065`) VALUES
(1089,	'1083',	''),
(1091,	'1083',	'');

DROP TABLE IF EXISTS `field_title`;
CREATE TABLE `field_title` (
  `pages_id` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  `data1065` text,
  PRIMARY KEY (`pages_id`),
  KEY `data_exact` (`data`(191)),
  KEY `data_exact1065` (`data1065`(191)),
  FULLTEXT KEY `data` (`data`),
  FULLTEXT KEY `data1065` (`data1065`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `field_title` (`pages_id`, `data`, `data1065`) VALUES
(1,	'Home',	NULL),
(2,	'Admin',	NULL),
(3,	'Pages',	NULL),
(6,	'Add Page',	NULL),
(7,	'Trash',	NULL),
(8,	'Tree',	NULL),
(9,	'Save Sort',	NULL),
(10,	'Edit',	NULL),
(11,	'Templates',	NULL),
(16,	'Fields',	NULL),
(21,	'Modules',	NULL),
(22,	'Setup',	NULL),
(23,	'Login',	NULL),
(27,	'404 Not Found',	NULL),
(28,	'Access',	NULL),
(29,	'Users',	NULL),
(30,	'Roles',	NULL),
(31,	'Permissions',	NULL),
(32,	'Edit pages',	NULL),
(34,	'Delete pages',	NULL),
(35,	'Move pages (change parent)',	NULL),
(36,	'View pages',	NULL),
(50,	'Sort child pages',	NULL),
(51,	'Change templates on pages',	NULL),
(52,	'Administer users',	NULL),
(53,	'User can update profile/password',	NULL),
(54,	'Lock or unlock a page',	NULL),
(300,	'Search',	NULL),
(301,	'Empty Trash',	NULL),
(302,	'Insert Link',	NULL),
(303,	'Insert Image',	NULL),
(304,	'Profile',	NULL),
(1006,	'Use Page Lister',	NULL),
(1007,	'Find',	NULL),
(1010,	'Recent',	NULL),
(1011,	'Can see recently edited pages',	NULL),
(1012,	'Logs',	NULL),
(1013,	'Can view system logs',	NULL),
(1014,	'Can manage system logs',	NULL),
(1015,	'Klinik Utama Elim',	NULL),
(1017,	'Gigi',	NULL),
(1018,	'Hanna Code',	NULL),
(1019,	'List and view Hanna Codes',	NULL),
(1020,	'Add/edit/delete Hanna Codes (text/html, javascript only)',	NULL),
(1021,	'Add/edit/delete Hanna Codes (text/html, javascript and PHP)',	NULL),
(1022,	'Mata',	NULL),
(1023,	'Badan',	NULL),
(1025,	'Covid-19',	NULL),
(1026,	'Hepatitis',	NULL),
(1027,	'Amandel',	NULL),
(1028,	'Spanduk',	'Banner'),
(1029,	'App',	NULL),
(1030,	'Apps',	NULL),
(1034,	'Flu',	NULL),
(1035,	'Appp',	NULL),
(1036,	'Tentang Kami',	'About Us'),
(1037,	'Fasilitas Pelayanan',	'Service Facilities'),
(1039,	'Berita dan Acara',	'News and Events'),
(1040,	's',	NULL),
(1041,	'Spesialis',	'Specialist'),
(1042,	'Tambal Gigi',	'Tooth Filling'),
(1043,	'Dokter',	'Doctor'),
(1044,	'drg. Michael Mathew',	NULL),
(1045,	'Sp.pD. Jason',	NULL),
(1046,	'Sp.A Mella',	NULL),
(1047,	'Sp.N Rina',	NULL),
(1048,	'Sp.OG Michelle',	NULL),
(1049,	'Sp.KK Roger',	NULL),
(1050,	'Sp.THT',	NULL),
(1051,	'Sp.M Andrey',	NULL),
(1052,	'THT',	'Otorhinolaryngology'),
(1053,	'Penawaran Khusus',	'Special Offer'),
(1054,	'Laboratorium',	NULL),
(1055,	'dr.O Luke',	NULL),
(1057,	'Admin Page',	NULL),
(1058,	'Cari',	'Search'),
(1059,	'Translation',	NULL),
(1060,	'Use Fluency translation',	NULL),
(1061,	'Administer languages and static translation files',	NULL),
(1062,	'Languages',	NULL),
(1063,	'Indonesia',	'Indonesia'),
(1064,	'Language Translator',	NULL),
(1065,	'English',	'English'),
(1066,	'dr. Maya',	'dr Maya'),
(1067,	'dr. Alwin',	'dr Alwin'),
(1068,	'Masuk',	'Login'),
(1069,	'Akun',	'Account'),
(1070,	'Daftar',	'Register'),
(1071,	'Michael Mathew',	''),
(1072,	'Alwina',	''),
(1074,	'Keluar',	'Logout'),
(1075,	'Mathew',	''),
(1079,	'Alvin',	''),
(1080,	'Data',	''),
(1081,	'd',	''),
(1082,	'Ubah Data',	'Edit Data'),
(1083,	'sasdd',	''),
(1084,	'Keluarga',	''),
(1086,	'd',	''),
(1089,	'Michelle',	''),
(1091,	'Mathew yaaas',	''),
(1092,	'Janji Temu',	''),
(1093,	'dr. Alwin',	'dr Alwin'),
(1094,	'My Page',	''),
(1095,	'Get Family Data',	''),
(1096,	'123456789',	''),
(1097,	'1234567891',	''),
(1101,	'1668052040',	'');

DROP TABLE IF EXISTS `hanna_code`;
CREATE TABLE `hanna_code` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `code` text,
  `modified` int(10) unsigned NOT NULL DEFAULT '0',
  `accessed` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class` varchar(128) CHARACTER SET ascii NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `class` (`class`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `modules` (`id`, `class`, `flags`, `data`, `created`) VALUES
(1,	'FieldtypeTextarea',	1,	'',	'2022-04-27 02:43:17'),
(3,	'FieldtypeText',	1,	'',	'2022-04-27 02:43:17'),
(4,	'FieldtypePage',	3,	'',	'2022-04-27 02:43:17'),
(6,	'FieldtypeFile',	1,	'',	'2022-04-27 02:43:17'),
(7,	'ProcessPageEdit',	1,	'',	'2022-04-27 02:43:17'),
(10,	'ProcessLogin',	0,	'',	'2022-04-27 02:43:17'),
(12,	'ProcessPageList',	0,	'{\"pageLabelField\":\"title\",\"paginationLimit\":25,\"limit\":50}',	'2022-04-27 02:43:17'),
(14,	'ProcessPageSort',	0,	'',	'2022-04-27 02:43:17'),
(15,	'InputfieldPageListSelect',	0,	'',	'2022-04-27 02:43:17'),
(17,	'ProcessPageAdd',	0,	'',	'2022-04-27 02:43:17'),
(25,	'InputfieldAsmSelect',	0,	'',	'2022-04-27 02:43:17'),
(27,	'FieldtypeModule',	1,	'',	'2022-04-27 02:43:17'),
(28,	'FieldtypeDatetime',	1,	'',	'2022-04-27 02:43:17'),
(29,	'FieldtypeEmail',	1,	'',	'2022-04-27 02:43:17'),
(30,	'InputfieldForm',	0,	'',	'2022-04-27 02:43:17'),
(32,	'InputfieldSubmit',	0,	'',	'2022-04-27 02:43:17'),
(34,	'InputfieldText',	0,	'',	'2022-04-27 02:43:17'),
(35,	'InputfieldTextarea',	0,	'',	'2022-04-27 02:43:17'),
(36,	'InputfieldSelect',	0,	'',	'2022-04-27 02:43:17'),
(37,	'InputfieldCheckbox',	0,	'',	'2022-04-27 02:43:17'),
(38,	'InputfieldCheckboxes',	0,	'',	'2022-04-27 02:43:17'),
(39,	'InputfieldRadios',	0,	'',	'2022-04-27 02:43:17'),
(40,	'InputfieldHidden',	0,	'',	'2022-04-27 02:43:17'),
(41,	'InputfieldName',	0,	'',	'2022-04-27 02:43:17'),
(43,	'InputfieldSelectMultiple',	0,	'',	'2022-04-27 02:43:17'),
(45,	'JqueryWireTabs',	0,	'',	'2022-04-27 02:43:17'),
(47,	'ProcessTemplate',	0,	'',	'2022-04-27 02:43:17'),
(48,	'ProcessField',	32,	'',	'2022-04-27 02:43:17'),
(50,	'ProcessModule',	0,	'',	'2022-04-27 02:43:17'),
(55,	'InputfieldFile',	0,	'',	'2022-04-27 02:43:17'),
(56,	'InputfieldImage',	0,	'',	'2022-04-27 02:43:17'),
(57,	'FieldtypeImage',	1,	'',	'2022-04-27 02:43:17'),
(60,	'InputfieldPage',	0,	'{\"inputfieldClasses\":[\"InputfieldSelect\",\"InputfieldSelectMultiple\",\"InputfieldCheckboxes\",\"InputfieldRadios\",\"InputfieldAsmSelect\",\"InputfieldPageListSelect\",\"InputfieldPageListSelectMultiple\"]}',	'2022-04-27 02:43:17'),
(61,	'TextformatterEntities',	0,	'',	'2022-04-27 02:43:17'),
(66,	'ProcessUser',	0,	'{\"showFields\":[\"name\",\"email\",\"roles\"]}',	'2022-04-27 02:43:17'),
(67,	'MarkupAdminDataTable',	0,	'',	'2022-04-27 02:43:17'),
(68,	'ProcessRole',	0,	'{\"showFields\":[\"name\"]}',	'2022-04-27 02:43:17'),
(76,	'ProcessList',	0,	'',	'2022-04-27 02:43:17'),
(78,	'InputfieldFieldset',	0,	'',	'2022-04-27 02:43:17'),
(79,	'InputfieldMarkup',	0,	'',	'2022-04-27 02:43:17'),
(80,	'InputfieldEmail',	0,	'',	'2022-04-27 02:43:17'),
(83,	'ProcessPageView',	0,	'',	'2022-04-27 02:43:17'),
(84,	'FieldtypeInteger',	0,	'',	'2022-04-27 02:43:17'),
(85,	'InputfieldInteger',	0,	'',	'2022-04-27 02:43:17'),
(86,	'InputfieldPageName',	0,	'',	'2022-04-27 02:43:17'),
(87,	'ProcessHome',	0,	'',	'2022-04-27 02:43:17'),
(89,	'FieldtypeFloat',	1,	'',	'2022-04-27 02:43:17'),
(90,	'InputfieldFloat',	0,	'',	'2022-04-27 02:43:17'),
(94,	'InputfieldDatetime',	0,	'',	'2022-04-27 02:43:17'),
(97,	'FieldtypeCheckbox',	1,	'',	'2022-04-27 02:43:17'),
(98,	'MarkupPagerNav',	0,	'',	'2022-04-27 02:43:17'),
(103,	'JqueryTableSorter',	1,	'',	'2022-04-27 02:43:17'),
(104,	'ProcessPageSearch',	1,	'{\"searchFields\":\"title\",\"displayField\":\"title path\"}',	'2022-04-27 02:43:17'),
(105,	'FieldtypeFieldsetOpen',	1,	'',	'2022-04-27 02:43:17'),
(106,	'FieldtypeFieldsetClose',	1,	'',	'2022-04-27 02:43:17'),
(107,	'FieldtypeFieldsetTabOpen',	1,	'',	'2022-04-27 02:43:17'),
(108,	'InputfieldURL',	0,	'',	'2022-04-27 02:43:17'),
(109,	'ProcessPageTrash',	1,	'',	'2022-04-27 02:43:17'),
(111,	'FieldtypePageTitle',	1,	'',	'2022-04-27 02:43:17'),
(112,	'InputfieldPageTitle',	0,	'',	'2022-04-27 02:43:17'),
(113,	'MarkupPageArray',	3,	'',	'2022-04-27 02:43:17'),
(114,	'PagePermissions',	3,	'',	'2022-04-27 02:43:17'),
(115,	'PageRender',	3,	'{\"clearCache\":1}',	'2022-04-27 02:43:17'),
(116,	'JqueryCore',	1,	'',	'2022-04-27 02:43:17'),
(117,	'JqueryUI',	1,	'',	'2022-04-27 02:43:17'),
(121,	'ProcessPageEditLink',	1,	'',	'2022-04-27 02:43:17'),
(122,	'InputfieldPassword',	0,	'',	'2022-04-27 02:43:17'),
(125,	'SessionLoginThrottle',	11,	'',	'2022-04-27 02:43:17'),
(129,	'ProcessPageEditImageSelect',	1,	'',	'2022-04-27 02:43:17'),
(131,	'InputfieldButton',	0,	'',	'2022-04-27 02:43:17'),
(133,	'FieldtypePassword',	1,	'',	'2022-04-27 02:43:17'),
(134,	'ProcessPageType',	33,	'{\"showFields\":[]}',	'2022-04-27 02:43:17'),
(135,	'FieldtypeURL',	1,	'',	'2022-04-27 02:43:17'),
(136,	'ProcessPermission',	1,	'{\"showFields\":[\"name\",\"title\"]}',	'2022-04-27 02:43:17'),
(137,	'InputfieldPageListSelectMultiple',	0,	'',	'2022-04-27 02:43:17'),
(138,	'ProcessProfile',	1,	'{\"profileFields\":[\"pass\",\"email\",\"admin_theme\",\"language\"]}',	'2022-04-27 02:43:17'),
(139,	'SystemUpdater',	1,	'{\"systemVersion\":19,\"coreVersion\":\"3.0.184\"}',	'2022-04-27 02:43:17'),
(148,	'AdminThemeDefault',	10,	'{\"colors\":\"classic\"}',	'2022-04-27 02:43:17'),
(149,	'InputfieldSelector',	42,	'',	'2022-04-27 02:43:17'),
(150,	'ProcessPageLister',	32,	'',	'2022-04-27 02:43:17'),
(151,	'JqueryMagnific',	1,	'',	'2022-04-27 02:43:17'),
(155,	'InputfieldCKEditor',	0,	'',	'2022-04-27 02:43:17'),
(156,	'MarkupHTMLPurifier',	0,	'',	'2022-04-27 02:43:17'),
(159,	'ProcessRecentPages',	1,	'',	'2022-04-27 02:43:36'),
(160,	'AdminThemeUikit',	10,	'',	'2022-04-27 02:43:36'),
(161,	'ProcessLogger',	1,	'',	'2022-04-27 02:43:44'),
(162,	'InputfieldIcon',	0,	'',	'2022-04-27 02:43:44'),
(163,	'InputfieldTextTags',	0,	'',	'2022-04-27 03:53:25'),
(164,	'TextformatterHannaCode',	1,	'',	'2022-04-27 04:36:19'),
(165,	'ProcessHannaCode',	1,	'',	'2022-04-27 04:36:19'),
(166,	'MinimalFieldset',	10,	'',	'2022-04-27 04:36:42'),
(167,	'InputfieldToggle',	0,	'',	'2022-04-27 04:42:52'),
(168,	'Pages2JSON',	3,	'{\"globalFields\":[\"title\",\"url\",\"images\",\"text_1\",\"text_9\"],\"uninstall\":\"\",\"submit_save_module\":\"Submit\"}',	'2022-06-28 02:29:10'),
(170,	'LanguageSupport',	35,	'{\"languagesPageID\":1062,\"defaultLanguagePageID\":1063,\"otherLanguagePageIDs\":[1065],\"languageTranslatorPageID\":1064,\"uninstall\":\"\",\"submit_save_module\":\"Submit\"}',	'2022-07-05 01:44:30'),
(171,	'ProcessLanguage',	1,	'',	'2022-07-05 01:44:30'),
(172,	'ProcessLanguageTranslator',	1,	'',	'2022-07-05 01:44:32'),
(173,	'LanguageSupportFields',	3,	'',	'2022-07-05 01:44:47'),
(174,	'FieldtypeTextLanguage',	1,	'',	'2022-07-05 01:44:48'),
(175,	'FieldtypePageTitleLanguage',	1,	'',	'2022-07-05 01:44:49'),
(176,	'FieldtypeTextareaLanguage',	1,	'',	'2022-07-05 01:44:49'),
(177,	'LanguageSupportPageNames',	3,	'{\"moduleVersion\":10,\"pageNumUrlPrefix1063\":\"hal\",\"useHomeSegment\":\"1\",\"uninstall\":\"\",\"submit_save_module\":\"Submit\",\"pageNumUrlPrefix1065\":\"page\"}',	'2022-07-05 01:44:51'),
(178,	'LanguageTabs',	11,	'{\"tabField\":\"title\",\"uninstall\":\"\",\"submit_save_module\":\"Submit\"}',	'2022-07-05 01:44:56');

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `templates_id` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(128) CHARACTER SET ascii NOT NULL,
  `status` int(10) unsigned NOT NULL DEFAULT '1',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_users_id` int(10) unsigned NOT NULL DEFAULT '2',
  `created` timestamp NOT NULL DEFAULT '2015-12-17 23:09:00',
  `created_users_id` int(10) unsigned NOT NULL DEFAULT '2',
  `published` datetime DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `name1065` varchar(128) CHARACTER SET ascii DEFAULT NULL,
  `status1065` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_parent_id` (`name`,`parent_id`),
  UNIQUE KEY `name1065_parent_id` (`name1065`,`parent_id`),
  KEY `parent_id` (`parent_id`),
  KEY `templates_id` (`templates_id`),
  KEY `modified` (`modified`),
  KEY `created` (`created`),
  KEY `status` (`status`),
  KEY `published` (`published`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pages` (`id`, `parent_id`, `templates_id`, `name`, `status`, `modified`, `modified_users_id`, `created`, `created_users_id`, `published`, `sort`, `name1065`, `status1065`) VALUES
(1,	0,	1,	'id',	9,	'2022-07-08 03:35:10',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	0,	'en',	1),
(2,	1,	2,	'manage',	1035,	'2022-04-27 02:44:10',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	11,	NULL,	1),
(3,	2,	2,	'page',	21,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	0,	NULL,	1),
(6,	3,	2,	'add',	21,	'2022-04-27 02:43:49',	40,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	1,	NULL,	1),
(7,	1,	2,	'trash',	1039,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	12,	NULL,	1),
(8,	3,	2,	'list',	21,	'2022-04-27 02:43:52',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	0,	NULL,	1),
(9,	3,	2,	'sort',	1047,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	3,	NULL,	1),
(10,	3,	2,	'edit',	1045,	'2022-04-27 02:43:50',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	4,	NULL,	1),
(11,	22,	2,	'template',	21,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	0,	NULL,	1),
(16,	22,	2,	'field',	21,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	2,	NULL,	1),
(21,	2,	2,	'module',	21,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	2,	NULL,	1),
(22,	2,	2,	'setup',	21,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	1,	NULL,	1),
(23,	2,	2,	'login',	1035,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	4,	NULL,	1),
(27,	1,	29,	'http404',	1035,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	3,	'2022-04-27 09:43:17',	10,	NULL,	1),
(28,	2,	2,	'access',	13,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	3,	NULL,	1),
(29,	28,	2,	'users',	29,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	0,	NULL,	1),
(30,	28,	2,	'roles',	29,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	1,	NULL,	1),
(31,	28,	2,	'permissions',	29,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	2,	NULL,	1),
(32,	31,	5,	'page-edit',	25,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	2,	NULL,	1),
(34,	31,	5,	'page-delete',	25,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	3,	NULL,	1),
(35,	31,	5,	'page-move',	25,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	4,	NULL,	1),
(36,	31,	5,	'page-view',	25,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	0,	NULL,	1),
(37,	30,	4,	'guest',	25,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	0,	NULL,	1),
(38,	30,	4,	'superuser',	25,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	1,	NULL,	1),
(40,	29,	3,	'guest',	25,	'2022-07-05 01:44:33',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	1,	NULL,	1),
(41,	29,	3,	'admin',	1,	'2022-11-09 08:11:43',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	0,	NULL,	1),
(50,	31,	5,	'page-sort',	25,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	41,	'2022-04-27 09:43:17',	5,	NULL,	1),
(51,	31,	5,	'page-template',	25,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	41,	'2022-04-27 09:43:17',	6,	NULL,	1),
(52,	31,	5,	'user-admin',	25,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	41,	'2022-04-27 09:43:17',	10,	NULL,	1),
(53,	31,	5,	'profile-edit',	1,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	41,	'2022-04-27 09:43:17',	13,	NULL,	1),
(54,	31,	5,	'page-lock',	1,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	41,	'2022-04-27 09:43:17',	8,	NULL,	1),
(300,	3,	2,	'search',	1045,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	6,	NULL,	1),
(301,	3,	2,	'trash',	1047,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	6,	NULL,	1),
(302,	3,	2,	'link',	1041,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	7,	NULL,	1),
(303,	3,	2,	'image',	1041,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	2,	'2022-04-27 09:43:17',	8,	NULL,	1),
(304,	2,	2,	'profile',	1025,	'2022-04-27 02:43:17',	41,	'2022-04-27 02:43:17',	41,	'2022-04-27 09:43:17',	5,	NULL,	1),
(1006,	31,	5,	'page-lister',	1,	'2022-04-27 02:43:17',	40,	'2022-04-27 02:43:17',	40,	'2022-04-27 09:43:17',	9,	NULL,	1),
(1007,	3,	2,	'lister',	1,	'2022-04-27 02:43:17',	40,	'2022-04-27 02:43:17',	40,	'2022-04-27 09:43:17',	9,	NULL,	1),
(1010,	3,	2,	'recent-pages',	1,	'2022-04-27 02:43:36',	40,	'2022-04-27 02:43:36',	40,	'2022-04-27 09:43:36',	10,	NULL,	1),
(1011,	31,	5,	'page-edit-recent',	1,	'2022-04-27 02:43:36',	40,	'2022-04-27 02:43:36',	40,	'2022-04-27 09:43:36',	10,	NULL,	1),
(1012,	22,	2,	'logs',	1,	'2022-04-27 02:43:44',	40,	'2022-04-27 02:43:44',	40,	'2022-04-27 09:43:44',	2,	NULL,	1),
(1013,	31,	5,	'logs-view',	1,	'2022-04-27 02:43:44',	40,	'2022-04-27 02:43:44',	40,	'2022-04-27 09:43:44',	11,	NULL,	1),
(1014,	31,	5,	'logs-edit',	1,	'2022-04-27 02:43:44',	40,	'2022-04-27 02:43:44',	40,	'2022-04-27 09:43:44',	12,	NULL,	1),
(1015,	1,	43,	'klinik-utama-elim',	1,	'2022-07-07 06:17:09',	41,	'2022-04-27 03:50:52',	41,	'2022-04-27 10:50:52',	3,	NULL,	1),
(1017,	1037,	59,	'gigi',	1,	'2022-06-08 07:51:22',	41,	'2022-04-27 03:57:00',	41,	'2022-04-27 10:57:00',	0,	NULL,	1),
(1018,	22,	2,	'hanna-code',	1,	'2022-04-27 04:36:19',	41,	'2022-04-27 04:36:19',	41,	'2022-04-27 11:36:19',	3,	NULL,	1),
(1019,	31,	5,	'hanna-code',	1,	'2022-04-27 04:36:19',	41,	'2022-04-27 04:36:19',	41,	'2022-04-27 11:36:19',	13,	NULL,	1),
(1020,	31,	5,	'hanna-code-edit',	1,	'2022-04-27 04:36:19',	41,	'2022-04-27 04:36:19',	41,	'2022-04-27 11:36:19',	14,	NULL,	1),
(1021,	31,	5,	'hanna-code-php',	1,	'2022-04-27 04:36:19',	41,	'2022-04-27 04:36:19',	41,	'2022-04-27 11:36:19',	15,	NULL,	1),
(1022,	1037,	59,	'mata',	1,	'2022-06-03 09:00:02',	41,	'2022-04-27 09:37:44',	41,	'2022-04-27 16:40:45',	1,	NULL,	1),
(1023,	1037,	59,	'badan',	1,	'2022-06-08 07:51:40',	41,	'2022-04-27 09:41:23',	41,	'2022-04-27 16:44:17',	2,	NULL,	1),
(1025,	1039,	62,	'covid-19',	1,	'2022-06-07 02:35:56',	41,	'2022-05-09 07:36:25',	41,	'2022-05-19 16:08:17',	0,	NULL,	1),
(1026,	1039,	62,	'hepatitis',	1,	'2022-07-05 07:32:48',	41,	'2022-05-09 08:46:47',	41,	'2022-06-07 09:30:31',	2,	NULL,	1),
(1027,	1039,	62,	'amandel',	1,	'2022-06-07 02:36:03',	41,	'2022-05-09 09:30:30',	41,	'2022-06-07 09:30:39',	1,	NULL,	1),
(1028,	1015,	48,	'spanduk',	1,	'2022-07-05 04:31:41',	41,	'2022-05-11 06:23:45',	41,	'2022-05-11 13:23:45',	1,	'banner',	1),
(1029,	1028,	51,	'app',	1,	'2022-06-24 01:49:18',	41,	'2022-05-11 06:25:13',	41,	'2022-05-11 13:26:33',	0,	NULL,	1),
(1030,	1028,	51,	'apps',	1,	'2022-05-11 07:35:51',	41,	'2022-05-11 07:35:39',	41,	'2022-05-11 14:35:51',	1,	NULL,	1),
(1034,	1039,	62,	'flu',	1,	'2022-06-07 02:36:17',	41,	'2022-05-18 08:38:13',	41,	'2022-06-07 09:30:48',	3,	NULL,	1),
(1035,	1028,	51,	'appp',	1,	'2022-05-23 07:08:00',	41,	'2022-05-23 07:01:52',	41,	'2022-05-23 14:02:11',	2,	NULL,	1),
(1036,	1015,	54,	'tentang-kami',	1,	'2022-07-05 04:29:54',	41,	'2022-05-24 02:46:01',	41,	'2022-05-24 09:46:01',	0,	'about-us',	1),
(1037,	1015,	57,	'fasilitas-pelayanan',	1,	'2022-07-05 04:33:17',	41,	'2022-05-24 07:53:05',	41,	'2022-05-24 14:53:09',	4,	'service-facilities',	1),
(1039,	1015,	61,	'berita-dan-acara',	1,	'2022-07-05 04:32:43',	41,	'2022-06-07 02:34:44',	41,	'2022-06-07 09:34:51',	3,	'news-and-events',	1),
(1040,	7,	61,	'1040.1039.4_s',	10241,	'2022-06-07 02:35:44',	41,	'2022-06-07 02:35:15',	41,	NULL,	4,	NULL,	1),
(1041,	1015,	63,	'spesialis',	1,	'2022-07-05 04:32:05',	41,	'2022-06-20 07:05:45',	41,	'2022-06-20 14:05:49',	2,	'specialist',	1),
(1042,	1041,	64,	'tambal-gigi',	1,	'2022-07-05 04:37:38',	41,	'2022-06-20 07:06:32',	41,	'2022-06-20 14:07:22',	0,	'tooth-filling',	1),
(1043,	1015,	66,	'dokter',	1,	'2022-07-05 04:33:41',	41,	'2022-06-22 06:41:03',	41,	'2022-06-22 13:41:03',	5,	'doctor',	1),
(1044,	1043,	67,	'drg-michael-mathew',	1,	'2022-11-08 04:58:16',	41,	'2022-06-22 06:41:35',	41,	'2022-06-22 13:44:35',	0,	NULL,	1),
(1045,	1043,	67,	'sp.pd-jason',	1,	'2022-06-27 04:38:52',	41,	'2022-06-24 02:24:58',	41,	'2022-06-24 09:48:56',	1,	NULL,	1),
(1046,	1043,	67,	'sp.a-mella',	1,	'2022-06-27 04:39:09',	41,	'2022-06-24 02:49:17',	41,	'2022-06-24 09:49:32',	2,	NULL,	1),
(1047,	1043,	67,	'sp.n-richard',	1,	'2022-06-27 04:39:40',	41,	'2022-06-24 02:49:53',	41,	'2022-06-24 09:50:12',	3,	NULL,	1),
(1048,	1043,	67,	'sp.og-michelle',	1,	'2022-06-27 04:39:57',	41,	'2022-06-24 02:50:29',	41,	'2022-06-24 09:51:00',	4,	NULL,	1),
(1049,	1043,	67,	'sp.kk-roger',	1,	'2022-06-27 04:40:15',	41,	'2022-06-24 02:51:24',	41,	'2022-06-24 09:51:43',	5,	NULL,	1),
(1050,	1043,	67,	'sp.tht',	1,	'2022-06-27 02:28:33',	41,	'2022-06-24 03:00:46',	41,	'2022-06-24 10:01:41',	6,	NULL,	1),
(1051,	1043,	67,	'sp.m',	1,	'2022-06-27 02:28:37',	41,	'2022-06-24 03:01:50',	41,	'2022-06-24 10:02:29',	7,	NULL,	1),
(1052,	1041,	64,	'tht',	1,	'2022-07-05 04:39:40',	41,	'2022-06-24 07:12:06',	41,	'2022-06-24 14:12:37',	1,	'otorhinolaryngology',	1),
(1053,	1015,	68,	'penawaran-khusus',	1,	'2022-07-05 04:34:13',	41,	'2022-06-24 08:12:23',	41,	'2022-06-24 15:12:26',	6,	'special-offer',	1),
(1054,	1053,	69,	'laboratorium',	1,	'2022-06-24 08:13:20',	41,	'2022-06-24 08:12:46',	41,	'2022-06-24 15:13:20',	0,	NULL,	1),
(1055,	1043,	67,	'dr.o-luke',	1,	'2022-06-27 02:28:42',	41,	'2022-06-24 09:24:14',	41,	'2022-06-24 16:24:34',	8,	NULL,	1),
(1057,	1,	70,	'admin-page',	1,	'2022-06-27 04:14:22',	41,	'2022-06-27 04:14:22',	41,	'2022-06-27 11:14:22',	7,	NULL,	1),
(1058,	1,	71,	'cari',	1,	'2022-07-05 04:34:31',	41,	'2022-06-28 02:34:05',	41,	'2022-06-28 09:34:05',	8,	NULL,	1),
(1059,	7,	2,	'1059.2.6_fluency',	8193,	'2022-07-06 08:24:00',	41,	'2022-06-29 03:53:02',	41,	'2022-06-29 10:53:02',	6,	NULL,	1),
(1060,	31,	5,	'fluency-translate',	1,	'2022-06-29 03:53:02',	41,	'2022-06-29 03:53:02',	41,	'2022-06-29 10:53:02',	16,	NULL,	1),
(1061,	31,	5,	'lang-edit',	1,	'2022-07-05 01:44:30',	41,	'2022-07-05 01:44:30',	41,	'2022-07-05 08:44:30',	17,	NULL,	1),
(1062,	22,	2,	'languages',	16,	'2022-07-05 01:44:31',	41,	'2022-07-05 01:44:31',	41,	'2022-07-05 08:44:31',	4,	NULL,	1),
(1063,	1062,	72,	'default',	16,	'2022-07-05 06:21:17',	41,	'2022-07-05 01:44:32',	41,	'2022-07-05 08:44:32',	0,	NULL,	1),
(1064,	22,	2,	'language-translator',	1040,	'2022-07-05 01:44:33',	41,	'2022-07-05 01:44:33',	41,	'2022-07-05 08:44:33',	5,	NULL,	1),
(1065,	1062,	72,	'english',	1,	'2022-07-05 06:21:27',	41,	'2022-07-05 01:46:20',	41,	'2022-07-05 08:46:20',	1,	NULL,	1),
(1066,	1043,	67,	'dr-maya',	1,	'2022-07-06 02:43:01',	41,	'2022-07-06 02:08:16',	41,	'2022-07-06 09:08:16',	9,	NULL,	1),
(1067,	1043,	67,	'dr-alwin',	1,	'2022-07-06 02:46:01',	41,	'2022-07-06 02:45:05',	41,	'2022-07-06 09:45:05',	10,	NULL,	1),
(1068,	1,	75,	'masuk',	1,	'2022-07-07 06:17:35',	41,	'2022-07-06 09:19:29',	41,	'2022-07-06 16:19:29',	5,	'login',	1),
(1069,	1,	74,	'akun',	1,	'2022-07-12 08:58:04',	41,	'2022-07-06 09:26:01',	41,	'2022-07-06 16:26:01',	4,	'account',	1),
(1070,	1,	76,	'daftar',	1,	'2022-07-07 08:09:52',	41,	'2022-07-07 08:09:44',	41,	'2022-07-07 15:09:44',	6,	'register',	1),
(1071,	1080,	74,	'michael-mathew',	1,	'2022-07-13 02:28:39',	41,	'2022-07-08 01:24:01',	41,	'2022-07-08 08:29:05',	0,	NULL,	1),
(1072,	1080,	74,	'alwina',	1,	'2022-07-12 09:47:35',	41,	'2022-07-08 01:48:44',	41,	'2022-07-08 08:49:09',	1,	NULL,	1),
(1074,	1,	78,	'keluar',	1,	'2022-07-08 03:42:30',	41,	'2022-07-08 03:42:21',	41,	'2022-07-08 10:42:21',	10,	'logout',	1),
(1075,	1080,	74,	'mathew',	1,	'2022-07-12 06:19:22',	41,	'2022-07-08 06:27:02',	41,	'2022-07-08 13:27:02',	2,	NULL,	0),
(1079,	1080,	74,	'alvin',	1,	'2022-07-12 06:19:25',	41,	'2022-07-08 06:37:13',	41,	'2022-07-08 13:37:13',	3,	NULL,	0),
(1080,	1069,	29,	'data',	1,	'2022-07-15 02:40:25',	41,	'2022-07-12 06:18:47',	41,	'2022-07-12 13:18:47',	1,	NULL,	1),
(1081,	7,	29,	'1081.1080.4_d',	10241,	'2022-07-12 06:19:27',	41,	'2022-07-12 06:19:06',	41,	NULL,	4,	NULL,	1),
(1082,	1069,	79,	'ubah-data',	1,	'2022-07-12 08:54:20',	41,	'2022-07-12 08:52:31',	41,	'2022-07-12 15:52:31',	2,	'edit-data',	1),
(1083,	1080,	74,	'bb',	1,	'2022-11-10 03:33:02',	41,	'2022-07-13 03:43:26',	41,	'2022-07-13 10:43:26',	4,	NULL,	0),
(1084,	1069,	80,	'keluarga',	1,	'2022-07-15 01:37:28',	41,	'2022-07-14 08:41:54',	41,	'2022-07-14 15:41:54',	2,	NULL,	1),
(1086,	7,	74,	'1086.1083.1_d',	10241,	'2022-07-15 02:40:42',	41,	'2022-07-15 02:40:30',	41,	NULL,	1,	NULL,	0),
(1089,	1083,	80,	'michelle',	1,	'2022-10-21 08:55:28',	41,	'2022-07-18 01:51:19',	41,	'2022-10-21 15:55:28',	0,	NULL,	0),
(1091,	1083,	80,	'mathew-yaaas',	1,	'2022-10-21 08:55:30',	41,	'2022-07-18 09:39:48',	41,	'2022-10-21 15:55:30',	1,	NULL,	0),
(1092,	1069,	73,	'janji-temu',	1,	'2022-10-20 04:28:25',	41,	'2022-07-22 03:49:41',	41,	'2022-07-22 10:49:41',	3,	'janji-temu',	1),
(1093,	7,	67,	'1093.1043.11_dr-alwin-1',	8193,	'2022-07-22 04:22:09',	41,	'2022-07-22 04:21:24',	41,	'2022-07-22 11:21:24',	11,	NULL,	1),
(1094,	1,	81,	'my-page',	1,	'2022-07-25 04:28:52',	41,	'2022-07-25 04:28:52',	41,	'2022-07-25 11:28:52',	10,	NULL,	0),
(1095,	1,	82,	'get-family-data',	1,	'2022-10-14 09:41:04',	41,	'2022-10-14 09:41:04',	41,	'2022-10-14 16:41:04',	11,	NULL,	1),
(1096,	1044,	83,	'123456789',	1,	'2022-11-03 01:39:51',	41,	'2022-10-20 04:23:23',	41,	'2022-10-20 11:24:42',	0,	NULL,	1),
(1097,	1050,	83,	'1234567891',	1,	'2022-11-10 03:41:01',	41,	'2022-10-27 02:30:10',	41,	'2022-10-27 09:30:30',	0,	NULL,	1),
(1100,	30,	4,	'doctor',	1,	'2022-11-08 01:33:26',	41,	'2022-11-07 08:44:41',	41,	'2022-11-08 08:33:26',	2,	NULL,	1),
(1101,	1044,	83,	'1668052040',	1,	'2022-11-10 03:36:28',	41,	'2022-11-10 03:29:09',	41,	'2022-11-10 10:29:09',	1,	NULL,	0);

DROP TABLE IF EXISTS `pages_access`;
CREATE TABLE `pages_access` (
  `pages_id` int(11) NOT NULL,
  `templates_id` int(11) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pages_id`),
  KEY `templates_id` (`templates_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pages_access` (`pages_id`, `templates_id`, `ts`) VALUES
(32,	2,	'2022-04-27 02:43:17'),
(34,	2,	'2022-04-27 02:43:17'),
(35,	2,	'2022-04-27 02:43:17'),
(36,	2,	'2022-04-27 02:43:17'),
(37,	2,	'2022-04-27 02:43:17'),
(38,	2,	'2022-04-27 02:43:17'),
(50,	2,	'2022-04-27 02:43:17'),
(51,	2,	'2022-04-27 02:43:17'),
(52,	2,	'2022-04-27 02:43:17'),
(53,	2,	'2022-04-27 02:43:17'),
(54,	2,	'2022-04-27 02:43:17'),
(1006,	2,	'2022-04-27 02:43:17'),
(1011,	2,	'2022-04-27 02:43:36'),
(1013,	2,	'2022-04-27 02:43:44'),
(1014,	2,	'2022-04-27 02:43:44'),
(1015,	1,	'2022-04-27 03:50:52'),
(1017,	1,	'2022-05-24 07:46:13'),
(1019,	2,	'2022-04-27 04:36:19'),
(1020,	2,	'2022-04-27 04:36:19'),
(1021,	2,	'2022-04-27 04:36:19'),
(1022,	1,	'2022-05-24 07:46:16'),
(1023,	1,	'2022-05-24 07:46:19'),
(1025,	1,	'2022-06-07 02:29:47'),
(1026,	1,	'2022-06-07 02:29:53'),
(1027,	1,	'2022-06-07 02:29:58'),
(1028,	1,	'2022-05-11 06:23:45'),
(1034,	1,	'2022-05-18 08:38:13'),
(1035,	1,	'2022-05-23 07:01:52'),
(1036,	1,	'2022-05-24 02:46:01'),
(1037,	1,	'2022-05-24 07:53:05'),
(1039,	1,	'2022-06-07 02:34:44'),
(1040,	2,	'2022-06-07 02:35:44'),
(1041,	1,	'2022-06-20 07:05:46'),
(1042,	1,	'2022-06-20 07:06:32'),
(1043,	1,	'2022-06-22 06:41:03'),
(1044,	1,	'2022-06-22 06:41:35'),
(1045,	1,	'2022-06-24 02:24:58'),
(1046,	1,	'2022-06-24 02:49:17'),
(1047,	1,	'2022-06-24 02:49:53'),
(1048,	1,	'2022-06-24 02:50:29'),
(1049,	1,	'2022-06-24 02:51:24'),
(1050,	1,	'2022-06-24 03:00:46'),
(1051,	1,	'2022-06-24 03:01:50'),
(1052,	1,	'2022-06-24 07:12:06'),
(1053,	1,	'2022-06-24 08:12:23'),
(1054,	1,	'2022-06-24 08:12:47'),
(1055,	1,	'2022-06-24 09:24:14'),
(1057,	1,	'2022-06-27 04:14:22'),
(1058,	1,	'2022-06-28 02:34:05'),
(1060,	2,	'2022-06-29 03:53:02'),
(1061,	2,	'2022-07-05 01:44:30'),
(1063,	2,	'2022-07-05 01:44:32'),
(1065,	2,	'2022-07-05 01:46:20'),
(1066,	1,	'2022-07-06 02:08:16'),
(1067,	1,	'2022-07-06 02:45:05'),
(1068,	1,	'2022-07-06 09:19:29'),
(1069,	1,	'2022-07-06 09:26:01'),
(1070,	1,	'2022-07-07 08:09:44'),
(1071,	1,	'2022-07-12 06:19:15'),
(1072,	1,	'2022-07-12 06:19:19'),
(1074,	1,	'2022-07-08 03:42:21'),
(1075,	1,	'2022-07-08 06:27:02'),
(1079,	1,	'2022-07-08 06:37:13'),
(1080,	1,	'2022-07-12 06:18:48'),
(1081,	2,	'2022-07-12 06:19:28'),
(1082,	1,	'2022-07-12 08:52:31'),
(1083,	1,	'2022-07-13 03:43:27'),
(1084,	1,	'2022-07-14 08:41:54'),
(1086,	2,	'2022-07-15 02:40:42'),
(1089,	1,	'2022-07-18 01:51:19'),
(1091,	1,	'2022-07-18 09:39:48'),
(1092,	1,	'2022-07-22 03:49:41'),
(1093,	2,	'2022-07-22 04:22:09'),
(1094,	1,	'2022-07-25 04:28:52'),
(1095,	1,	'2022-10-14 09:41:04'),
(1096,	1,	'2022-10-20 04:23:23'),
(1097,	1,	'2022-10-27 02:30:10'),
(1100,	2,	'2022-11-07 08:44:41'),
(1101,	1,	'2022-11-10 03:29:09');

DROP TABLE IF EXISTS `pages_parents`;
CREATE TABLE `pages_parents` (
  `pages_id` int(10) unsigned NOT NULL,
  `parents_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`pages_id`,`parents_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pages_parents` (`pages_id`, `parents_id`) VALUES
(3,	2),
(22,	2),
(28,	2),
(29,	2),
(29,	28),
(30,	2),
(30,	28),
(31,	2),
(31,	28),
(1028,	1015),
(1037,	1015),
(1039,	1015),
(1041,	1015),
(1043,	1015),
(1044,	1015),
(1044,	1043),
(1050,	1015),
(1050,	1043),
(1053,	1015),
(1062,	2),
(1062,	22),
(1080,	1069),
(1083,	1069),
(1083,	1080);

DROP TABLE IF EXISTS `pages_sortfields`;
CREATE TABLE `pages_sortfields` (
  `pages_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sortfield` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`pages_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `session_login_throttle`;
CREATE TABLE `session_login_throttle` (
  `name` varchar(128) NOT NULL,
  `attempts` int(10) unsigned NOT NULL DEFAULT '0',
  `last_attempt` int(10) unsigned NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `session_login_throttle` (`name`, `attempts`, `last_attempt`) VALUES
('admin',	1,	1668063499);

DROP TABLE IF EXISTS `templates`;
CREATE TABLE `templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET ascii NOT NULL,
  `fieldgroups_id` int(10) unsigned NOT NULL DEFAULT '0',
  `flags` int(11) NOT NULL DEFAULT '0',
  `cache_time` mediumint(9) NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `fieldgroups_id` (`fieldgroups_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `templates` (`id`, `name`, `fieldgroups_id`, `flags`, `cache_time`, `data`) VALUES
(1,	'home',	1,	0,	0,	'{\"useRoles\":1,\"noParents\":1,\"slashUrls\":1,\"compile\":3,\"modified\":1667871206,\"ns\":\"\\\\\",\"roles\":[37,1100]}'),
(2,	'admin',	2,	8,	0,	'{\"useRoles\":1,\"parentTemplates\":[2],\"allowPageNum\":1,\"redirectLogin\":23,\"slashUrls\":1,\"noGlobal\":1,\"compile\":3,\"modified\":1630086528,\"ns\":\"ProcessWire\"}'),
(3,	'user',	3,	8,	0,	'{\"useRoles\":1,\"noChildren\":1,\"parentTemplates\":[2],\"slashUrls\":1,\"pageClass\":\"User\",\"noGlobal\":1,\"noMove\":1,\"noTrash\":1,\"noSettings\":1,\"noChangeTemplate\":1,\"nameContentTab\":1}'),
(4,	'role',	4,	8,	0,	'{\"noChildren\":1,\"parentTemplates\":[2],\"slashUrls\":1,\"pageClass\":\"Role\",\"noGlobal\":1,\"noMove\":1,\"noTrash\":1,\"noSettings\":1,\"noChangeTemplate\":1,\"nameContentTab\":1}'),
(5,	'permission',	5,	8,	0,	'{\"noChildren\":1,\"parentTemplates\":[2],\"slashUrls\":1,\"guestSearchable\":1,\"pageClass\":\"Permission\",\"noGlobal\":1,\"noMove\":1,\"noTrash\":1,\"noSettings\":1,\"noChangeTemplate\":1,\"nameContentTab\":1}'),
(29,	'basic-page',	83,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1630086528,\"ns\":\"\\\\\"}'),
(43,	'index',	97,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1658108937,\"ns\":\"\\\\\"}'),
(48,	'banner-parent',	102,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1652250447}'),
(51,	'banner',	105,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1656034710}'),
(54,	'about',	108,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1656995145,\"ns\":\"\\\\\"}'),
(57,	'fasilitas-pelayanan',	111,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1657003773,\"ns\":\"\\\\\"}'),
(59,	'fasilitas-pelayanan-children',	113,	0,	0,	'{\"slashUrls\":1,\"pageLabelField\":\"{title} | {date_1}\",\"compile\":3,\"modified\":1657003777,\"ns\":\"\\\\\"}'),
(61,	'berita-dan-acara',	115,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1657003811,\"ns\":\"\\\\\"}'),
(62,	'berita-dan-acara-children',	116,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1657009207,\"ns\":\"\\\\\"}'),
(63,	'spesialis',	117,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1657003742,\"ns\":\"\\\\\"}'),
(64,	'spesialis-children',	118,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1655708691,\"ns\":\"\\\\\"}'),
(66,	'dokter',	120,	0,	0,	'{\"allowPageNum\":1,\"slashUrls\":1,\"compile\":3,\"modified\":1668063184,\"ns\":\"\\\\\"}'),
(67,	'dokter-children',	121,	0,	0,	'{\"allowPageNum\":1,\"slashUrls\":1,\"compile\":3,\"modified\":1656299637,\"ns\":\"\\\\\"}'),
(68,	'penawaran-khusus',	122,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1657003803,\"ns\":\"\\\\\"}'),
(69,	'penawaran-khusus-children',	123,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1656058501,\"ns\":\"\\\\\"}'),
(70,	'admin-page',	124,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1667984998,\"ns\":\"\\\\\"}'),
(71,	'search',	125,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1657174739,\"ns\":\"ProcessWire\"}'),
(72,	'language',	126,	8,	0,	'{\"parentTemplates\":[2],\"slashUrls\":1,\"pageClass\":\"Language\",\"pageLabelField\":\"name\",\"noGlobal\":1,\"noMove\":1,\"noTrash\":1,\"noChangeTemplate\":1,\"noUnpublish\":1,\"compile\":3,\"nameContentTab\":1,\"modified\":1656985472}'),
(73,	'janji-temu',	127,	0,	0,	'{\"allowPageNum\":1,\"slashUrls\":1,\"compile\":3,\"modified\":1668050837,\"ns\":\"\\\\\"}'),
(74,	'akun',	128,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1668056041,\"ns\":\"\\\\\"}'),
(75,	'login',	129,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1666684870,\"ns\":\"\\\\\"}'),
(76,	'register',	130,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1657683803,\"ns\":\"\\\\\"}'),
(78,	'logout',	132,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1657251813,\"ns\":\"\\\\\"}'),
(79,	'edit-data-account',	133,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1659415452,\"ns\":\"\\\\\"}'),
(80,	'keluarga',	134,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1659415436,\"ns\":\"\\\\\"}'),
(81,	'my-template',	135,	0,	0,	'{\"slashUrls\":1,\"compile\":0,\"label\":\"My Template\",\"modified\":1658742522,\"noPrependTemplateFile\":true,\"noAppendTemplateFile\":true,\"ns\":\"ProcessWire\"}'),
(82,	'get-family-data',	136,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1665980260,\"ns\":\"ProcessWire\"}'),
(83,	'buat-janji',	137,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1666239775}'),
(84,	'janji',	138,	0,	0,	'{\"slashUrls\":1,\"compile\":3,\"modified\":1666239504}');

-- 2023-04-14 09:05:26
