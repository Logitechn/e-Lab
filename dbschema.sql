create database e-lab

CREATE TABLE IF NOT EXISTS `players` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `vardas` varchar(255) NOT NULL,
  `pavarde` varchar(255) NOT NULL,
  `automobilio_nr` varchar(6) NOT NULL,
  `telefono_nr` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `miestas` varchar(50) NOT NULL,
  `registracijos_data` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE admin
(
id int(11) not NULL AUTO_INCREMENT,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `players` ADD UNIQUE( `automobilio_nr`, `telefono_nr`, `email`) 

INSERT INTO admin (username, password)
VALUES
(
'admin', 'admin'
)