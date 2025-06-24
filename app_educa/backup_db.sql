/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.8.1-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: fuerzas_armadas_db
-- ------------------------------------------------------
-- Server version	11.8.1-MariaDB-4

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `archivos`
--

DROP TABLE IF EXISTS `archivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `archivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_archivo` varchar(255) NOT NULL,
  `tipo_archivo` varchar(100) NOT NULL,
  `tamano_archivo` int(11) NOT NULL,
  `datos_archivo` longblob NOT NULL,
  `fecha_subida` timestamp NULL DEFAULT current_timestamp(),
  `subido_por` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subido_por` (`subido_por`),
  CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`subido_por`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivos`
--

LOCK TABLES `archivos` WRITE;
/*!40000 ALTER TABLE `archivos` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `archivos` VALUES
(1,'passwords.txt','text/plain',529,'12345\n123456\n123456789\ntest1\n12345678\nzinch\ng_czechout\nasdf\nqwerty\n1234567890\n1234567\nAa123456.\niloveyou\n1234\nabc123\n111111\n123123\ndubsmash\ntest\nprincess\nqwertyuiop\nsunshine\nBvtTest123\n11111\nashley\n00000\n000000\npassword1\nmonkey\nlivetest\n55555\nsoccer\ncharlie\nasdfghjkl\n654321\nfamily\nmichael\n123321\nfootball\npassword\nbaseball\nq1w2e3r4t5y6\nnicole\njessica\npurple\nshadow\nadmin\nhannah\nchocolate\nmichelle\ntecsup\ndreams\nmaxwell\nmusic\nrush2112\nadminpass\nrussia\nscorpion\nrebecca\ntester\nmistress\npassword\nphantom\nbilly\n6666\nalbert\nincorrect','2025-06-19 20:42:30',1),
(2,'hosts.txt','text/plain',2018,'Metasploit tip: To save all commands executed since start up to a file, use the \nmakerc command\n[0m[36m[37mCall trans opt: received. 2-19-98 13:24:18 REC:Loc\n\n     Trace program: running\n\n           wake up, Neo...\n        [1mthe matrix has you[0m\n      follow the white rabbit.\n\n          knock, knock, Neo.\n\n                        (`.         ,-,\n                        ` `.    ,;\' /\n                         `.  ,\'/ .\'\n                          `. X /.\'\n                .-;--\'\'--.._` ` (\n              .\'            /   `\n             ,           ` \'   Q \'\n             ,         ,   `._    \\\n          ,.|         \'     `-.;_\'\n          :  . `  ;    `  ` --,.._;\n           \' `    ,   )   .\'\n              `._ ,  \'   /_\n                 ; ,\'\'-,;\' ``-\n                  ``-..__``--`\n\n                             https://metasploit.com[0m\n[0m\n\n       =[ [33mmetasploit v6.4.34-dev[0m                          ]\n+ -- --=[ 2461 exploits - 1267 auxiliary - 431 post       ]\n+ -- --=[ 1468 payloads - 49 encoders - 11 nops           ]\n+ -- --=[ 9 evasion                                       ]\n\nMetasploit Documentation: https://docs.metasploit.com/\n\n[0m[1m[34m[*][0m Workspace: espacio1\n[0m\nHosts\n=====\n\naddres  mac      name  os_name   os_flav  os_sp  purpose  info  comments\ns                                or\n------  ---      ----  -------   -------  -----  -------  ----  --------\n10.0.2  52:54:0\n.1      0:12:35\n        :00\n10.0.2  52:54:0\n.2      0:12:35\n        :00\n10.0.2  08:00:2\n.3      7:7C:2D\n        :85\n10.0.2  08:00:2        Linux              2.6.X  server         metasplotaible\n.5      7:94:21\n        :b4\n10.0.2  08:00:2        Linux              2.6.X  server         vulnOs\n.6      7:43:06\n        :19\n10.0.2  08:00:2        Windows                   client         windows-xp\n.7      7:0e:e4        XP\n        :6c\n10.0.2                                                          kali-linux\n.15\n192.16                                                          nueva-ip\n8.9.10\n\n[0m','2025-06-19 22:13:56',2);
/*!40000 ALTER TABLE `archivos` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `usuarios` VALUES
(1,'admin','$2y$12$biHkAFlF9mA9tlnDaTRJAuJWNG3JfiratnUJIR1BRmio/WvVcmDU.','2025-06-19 19:41:15'),
(2,'Coronel-f1','$2y$12$bj8.GBg.eh9NwEkeOPpYIumeqCejLHGy8CuAEkosGnunJxpAFCoMi','2025-06-19 22:00:45');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
commit;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2025-06-19 19:11:56
