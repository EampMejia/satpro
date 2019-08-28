USE satpro;
DROP TABLE IF EXISTS tbl_cargos;
CREATE TABLE tbl_cargos (
  idFactura INT(11) NOT NULL AUTO_INCREMENT,
  numeroFactura INT(11) NOT NULL,
  tipoFactura TINYINT(1) NOT NULL,
  numeroRecibo INT(11) NOT NULL,
  codigoCliente VARCHAR(6) NOT NULL,
  cuotaCable DOUBLE DEFAULT NULL,
  cuotaInternet DOUBLE DEFAULT NULL,
  saldoCable DOUBLE DEFAULT NULL,
  saldoInternet DOUBLE DEFAULT NULL,
  fechaCobro DATE DEFAULT NULL,
  fechaFactura DATE DEFAULT NULL,
  fechaVencimiento DATE DEFAULT NULL,
  /*montoCancelado DOUBLE DEFAULT 0,*/
  fechaAbonado DATE DEFAULT NULL,
  mesCargo VARCHAR(3) DEFAULT '',
  formaPago VARCHAR(10) DEFAULT '',
  tipoServicio CHAR NOT NULL,
  estado VARCHAR(9) DEFAULT '',
  /*anticipado TINYINT(1) DEFAULT 0,*/
  cargoImpuesto DOUBLE NOT NULL,
  anulada TINYINT(1) DEFAULT FALSE,
  PRIMARY KEY(idFactura)
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
