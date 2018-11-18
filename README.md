# SIAC
Proyecto Sistemas de Información

## Ejecutar el siguite código para poder ingresar a la página
```
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` char(60) NOT NULL,
  `admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`user_id`, `username`, `password`, `admin`) VALUES
(1, 'admin', '$2y$10$Zz/NOeAqcvmF2kzMcaemBOA5VKty8e1GsrqWZKSieN7DrokWXRSqK', 1);
```
