# cocounutmoney
Página para llevar cuentas de el dinero que guardas.

Codigo SQL:


CREATE TABLE users (
  id int(11) PRIMARY KEY AUTO_INCREMENT,
  user varchar(180) NOT NULL,
  pwd varchar(180) NOT NULL,
  usermoney` double
)

CREATE TABLE movements (
  id int(11) PRIMARY KEY AUTO_INCREMENT,
  amount double NOT NULL,
  note varchar(600) NOT NULL,
  fecha date NOT NULL,
  userid int(11) NOT NULL,
  hora time(6) NOT NULL
)

