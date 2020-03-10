CREATE TABLE `php-pdo-excercise`.tb_a (
	pk_a BIGINT auto_increment NOT NULL,
	foo varchar(100) NULL,
	CONSTRAINT tb_a_PK PRIMARY KEY (pk_a)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `php-pdo-excercise`.tb_b (
	pk_b BIGINT auto_increment NOT NULL,
	bar varchar(100) NOT NULL,
	CONSTRAINT tb_b_PK PRIMARY KEY (pk_b)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `php-pdo-excercise`.tb_ab (
	pk_ab BIGINT auto_increment NOT NULL,
	foobar VARCHAR(200) NOT NULL,
	fk_a BIGINT NOT NULL,
	fk_b BIGINT NOT NULL,
	CONSTRAINT tb_ab_PK PRIMARY KEY (pk_ab),
	CONSTRAINT tb_ab_FK FOREIGN KEY (fk_a) REFERENCES `php-pdo-excercise`.tb_a(pk_a),
	CONSTRAINT tb_ab_FK_1 FOREIGN KEY (fk_b) REFERENCES `php-pdo-excercise`.tb_b(pk_b)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;
