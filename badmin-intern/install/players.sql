CREATE TABLE  `bln_manager`.`mgr_players` (
`license` INT( 11 ) NOT NULL ,
`name` VARCHAR( 100 ) NOT NULL ,
`firstname` VARCHAR( 100 ) NOT NULL ,
`gender` BOOLEAN NOT NULL ,
`birthdate` DATE NOT NULL ,
`category` VARCHAR( 30 ) NOT NULL ,
`rank_simple` INT NOT NULL ,
`rank_double` INT NOT NULL ,
`rank_mixed` INT NOT NULL ,
`email` VARCHAR( 255 ) NOT NULL ,
`phone` VARCHAR( 10 ) NOT NULL ,
UNIQUE (
`license`
)
) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;

